<?php

namespace App\Http\Controllers;

use App\Http\Classes\Collector;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function signatureReq(Request $request)
    {
        return Collector::Student()->signatureReq($request);
    }

    public function getLecturer(Request $request)
    {
        return Collector::Student()->getLecturer($request);
    }
}
