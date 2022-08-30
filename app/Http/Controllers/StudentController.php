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

    public function getHome()
    {
        return view("student.index");
    }

    public function getPermohonan()
    {
        return view("student.permohonan");
    }

    public function getListPermohonan()
    {
        $data = Collector::Student()->getListPermohonan();
        return datatables($data)->toJson();
    }
    
    public function getImg($hash)
    {
        $data = Collector::Student()->getImg($hash);
        return $data;
    }
}
