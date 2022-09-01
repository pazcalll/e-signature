<?php

namespace App\Http\Classes;

use App\Models\Signature;
use App\Models\SignatureDetail;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
// use Illuminate\Support\Facades\Hash;

class Student {
    public function signatureReq(Request $request)
    {
        DB::beginTransaction();
        
        $signature_detail = SignatureDetail::create([
            'hash' => md5(Carbon::now()->toDateTimeString()),
            'note' => $request->post('note')
        ]);

        $signature = Signature::create([
            'signature_detail_id' => $signature_detail->id,
            'lecturer_id' => $request->post('lecturer_id'),
            'student_id' => Auth::user()->id
        ]);

        DB::commit();
        
        return $signature;
    }

    public function getLecturer($request)
    {
        $lecturer = User::where('role', 2)->where('fullname', "like", "%".$request->q."%")->get();
        return response($lecturer, 200);
    }

    public function getListPermohonan()
    {
        $data = Signature::with(['signatureDetail' => function($query){
                    return $query->select('id', 'hash', 'note', 'signature');
                }, 'student' => function($query){
                    return $query->select('id', 'fullname');
                }
            ])
            ->where('student_id', Auth::user()->id)
            ->get();
        return $data;
    }

    public function getImg($request)
    {
        $data = SignatureDetail::where('hash', $request->post('hash'))
            ->select('signature')
            ->first();
        return $data;
    }
}