<?php

namespace App\Http\Classes;

use App\Models\Signature;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Lecturer {
    public function unsigned()
    {
        $data = Signature::with(['signatureDetail' => function($query){
                    return $query->select('id', 'hash', 'note');
                }, 'student' => function($query){
                    return $query->select('id', 'fullname');
                }
            ])
            ->where('lecturer_id', Auth::user()->id)
            ->get();
        return $data;
    }
}