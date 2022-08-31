<?php

namespace App\Http\Classes;

use App\Models\Signature;
use App\Models\SignatureDetail;
use Carbon\Carbon;
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
            ->whereHas('signatureDetail', function($query){
                return $query->where('signature', null);
            })
            ->where('lecturer_id', Auth::user()->id)
            ->get();
        return $data;
    }

    public function sign(Request $request)
    {
        $filename = time().'_'.$request->file('signature')->getClientOriginalName();
        $request->file('signature')->storeAs('public/response', $filename);
        $store = SignatureDetail::where('hash', $request->post('hash'))
            ->update([
                'signature' => 'response/'.$filename
            ]);
        return $store;
    }
}