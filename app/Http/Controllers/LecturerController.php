<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Classes\Collector;

class LecturerController extends Controller
{
    public function unsigned()
    {
        $data = Collector::Lecturer()->unsigned();
        return datatables($data)->toJson();

    }
    public function sign(Request $request)
    {
        $data = Collector::Lecturer()->sign($request);
        return response($data, 200);
    }
    public function getHistory()
    {
        return view('lecturer.history');
    }
    public function getHome()
    {
        return view('lecturer.index');
    }
    public function signatureHistory()
    {
        $data = Collector::Lecturer()->signatureHistory();
        return datatables($data)->toJson();
    }
}
