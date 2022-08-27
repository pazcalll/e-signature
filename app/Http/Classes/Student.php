<?php

namespace App\Http\Classes;

use App\Models\Signature;
use App\Models\SignatureDetail;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class Student {
    public function signatureReq(Request $request)
    {
        DB::beginTransaction();
        
        $signature_detail = SignatureDetail::create([
            'hash' => Hash::make(Carbon::now()->toDateTimeString()),
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
}