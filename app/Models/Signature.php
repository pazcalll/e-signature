<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Signature extends Model
{
    use HasFactory;
    protected $fillable = ['signature_detail_id', 'lecturer_id', 'student_id'];

    public function signatureDetail()
    {
        $this->hasOne(SignatureDetail::class);
    }

    public function student()
    {
        $this->belongsTo(User::class, 'student_id');
    }

    public function lecturer()
    {
        $this->belongsTo(User::class, 'lecturer_id');
    }
}
