<?php

namespace App\Http\Controllers;

use App\Http\Classes\Collector;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public $object;
    
    public function __construct()
    {
        $object = new Collector();
    }

    public function loginPage()
    {
        return view('auth.login');
    }

    public function registerPage()
    {
        return view('auth.register');
    }
    
    public function authenticate(Request $request)
    {
        return $this->object->authenticate($request);
    }

    public function register(Request $request)
    {
        return $this->object->register($request);
    }

}
