<?php

namespace Database\Seeders;

use App\Models\Signature;
use App\Models\SignatureDetail;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use DB;

class SignatureSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::beginTransaction();

        for ($i=0; $i < 1000; $i++) { 
            $signature_detail = SignatureDetail::create([
                'hash' => md5(Carbon::now()->toDateTimeString()).$i,
                'note' => "catatan ".$i
            ]);
    
            $signature = Signature::create([
                'signature_detail_id' => $signature_detail->id,
                'lecturer_id' => 3,
                'student_id' => 1
            ]);
        }

        DB::commit();

    }
}
