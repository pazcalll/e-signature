<?php

namespace App\Http\Classes;

use App\Models\Signature;
use App\Models\User as AppUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class User {

    public function getVerificationQrcode($hash)
    {
        $data = Signature::with(['signatureDetail' => function($query){
                    return $query->select('id', 'hash', 'note');
                }, 'student' => function($query)
                {
                    return $query->select('id', 'fullname');
                }, 'lecturer' => function($query)
                {
                    return $query->select('id', 'fullname');
                }
            ])
            ->whereHas('signatureDetail', function($query) use($hash){
                return $query->where('hash', $hash);
            })
            ->first();
        $view = view('public.validator')->with('data', $data);
        return $view;
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'userid' => ['required', 'min:4', 'max:16'],
            'password' => ['required', 'min:8', 'max:24']
        ],
        [
            'userid.required' => 'User ID tidak boleh kosong',
            'userid.min' => 'User ID minimal 8 digit',
            'userid.max' => 'User ID maximal 16 digit',
            'password.required' => 'Password tidak boleh kosong',
            'password.min' => 'Password anda kurang dari 8 digit',
            'password.max' => 'Password anda kurang dari 24 digit',
        ]);
        
        try {
            if (Auth::attempt($credentials)) {
                $request->session()->regenerate();
                return redirect()->back();
            }
            return response(["errors"=>Auth::attempt($credentials)], 422);
        } catch (\Throwable $th) {
            dd($th);
        }
    }

    public function register(Request $request)
    {
        $rules = [
            'fullname' => ['required', 'max:255'],
            'role' => ['required'],
            'userid' => ['required', 'unique:users', 'min:4', 'max:16'],
            'password' => ['required', 'min:8', 'max:24'],
            'email' => ['required', 'email', 'unique:users', 'min:8', 'max:32'],
            'c_password' => ['required', 'min:8', 'max:24', 'same:password']
        ];
        $messages = [
            'userid.required' => 'User ID tidak boleh kosong.',
            'userid.min' => 'User ID minimal 8 digit.',
            'userid.max' => 'User ID maximal 16 digit.',
            'userid.unique' => 'User ID telah dipakai.',
            'password.required' => 'Password tidak boleh kosong.',
            'password.min' => 'Password anda tidak boleh kurang dari 8 digit.',
            'password.max' => 'Password anda tidak boleh lebih dari 24 digit.',
            'c_password.required' => 'Konfirmasi kata sandi tidak boleh kosong.',
            'c_password.min' => 'Konfirmasi kata sandi anda tidak boleh kurang dari 8 digit.',
            'c_password.max' => 'Konfirmasi kata sandi anda tidak boleh lebih dari 24 digit.',
            'c_password.same' => 'Kata sandi tidak sama dengan konfirmasi.',
            'email.required' => 'E-mail tidak boleh kosong.',
            'email.min' => 'E-mail anda kurang dari 8 digit.',
            'email.max' => 'E-mail anda lebih dari 24 digit.',
            'email.unique' => 'E-mail telah dipakai.',
            'fullname.required' => 'Nama lengkap pengguna tidak boleh kosong.',
            'fullname.max' => 'Nama lengkap anda tidak boleh lebih dari 255 digit.',
            'role.required' => 'Peran pengguna tidak boleh kosong.'
        ];
        $validator = Validator::make($request->all(), $rules, $messages);
        if ($validator->fails()) {
            return response($validator->validate(), 400);
        }
        try {
            DB::beginTransaction();
            $newUser = AppUser::create([
                'fullname' => $request['fullname'],
                'userid' => $request['userid'],
                'role' => $request['role'],
                'email' => $request['email'],
                'password' => Hash::make($request['password'])
            ]);
            // dd($newUser);
            DB::commit();
            // dd("TRUE");
            if (Auth::attempt($request)) {
                $request->session()->regenerate();
                // return redirect()->back();
            }
        } catch (\Throwable $th) {
            return response($th, 400);
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}