<?php

namespace App\Http\Classes;

use App\Models\Signature;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Lecturer {
    public function unsigned()
    {
        $data = Signature::with('signatureDetail')
            ->where('lecturer_id', Auth::user()->id)
            ->get();
        return $data;
    }
}