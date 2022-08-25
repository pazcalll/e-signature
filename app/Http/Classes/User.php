<?php

namespace App\Http\Classes;

use App\Models\User as AppUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class User {

    public $user;

    public function __construct()
    {
        $this->user = Auth::user();
    }
    
    public function getUser()
    {
        return $this->user;
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'username' => ['required'],
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);
 
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
 
            return redirect()->intended('/');
        }
 
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }

    public function register(Request $request)
    {
        $credentials = $request->validate([
            'fullname' => ['required'],
            'username' => ['required'],
            'email' => ['required', 'email'],
            'password' => ['required'],
            'c_password' => ['required']
        ]);

        if (AppUser::where('email', $request['email']->orWhere('username', $request['username']))->first()) {
            return back()->withErrors([
                'message' => 'Pengguna ini sudah ada.',
            ]);
        }else if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
 
            return redirect()->intended('/');
        }
    }
}