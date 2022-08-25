<?php

namespace App\Http\Classes;

use App\Models\User as AppUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class User {

    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'userid' => ['required'],
            'password' => ['required'],
        ]);
        
        try {
            if (Auth::attempt($credentials)) {
                $request->session()->regenerate();
                return redirect()->back();
            }
            dd(Auth::attempt($credentials));
     
        } catch (\Throwable $th) {
            dd($th);
        }
    }

    public function register(Request $request)
    {
        $credentials = $request->validate([
            'fullname' => ['required'],
            'role' => ['required'],
            'userid' => ['required'],
            'email' => ['required', 'email'],
            'password' => ['required'],
            'c_password' => ['required']
        ]);

        try {
            DB::beginTransaction();
            if (AppUser::where('email', $request['email'])->orWhere('userid', $request['userid'])->first()) {
                return back()->withErrors([
                    'message' => 'Pengguna ini sudah ada.',
                ]);
            }else if ($request['password'] != $request['c_password']) {
                return back()->withErrors('Password berbeda dengan konfirmasi, silakan cek lagi.');
            }
            $newUser = AppUser::create([
                'fullname' => $request['fullname'],
                'userid' => $request['userid'],
                'role' => $request['role'],
                'email' => $request['email'],
                'password' => Hash::make($request['password'])
            ]);
            // dd($newUser);
            DB::commit();
            return $this->authenticate($request);
        } catch (\Throwable $th) {
            dd($th);
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