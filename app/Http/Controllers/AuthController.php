<?php

namespace App\Http\Controllers;

use App\Http\Classes\Collector;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public $object;
    
    public function __construct()
    {
        $this->object = new Collector();
    }

    public function index()
    {
        if (Auth::user() == null) {
            return view('layout.guest');
        } else if (Auth::user()->role == 1) {
            return view('layout.student');
        } else if (Auth::user()->role == 2) {
            return view('layout.lecturer');
        }
    }

    public function loginPage()
    {
        return response(view('auth.login'), 200);
    }

    public function registerPage()
    {
        return response(view('auth.register'), 200);
    }
    
    public function authenticate(Request $request)
    {
        $this->object->User()->authenticate($request);
    }

    public function register(Request $request)
    {
        return $this->object->User()->register($request);  
    }

    public function logout(Request $request)
    {
        return $this->object->User()->logout($request);
    }

}
