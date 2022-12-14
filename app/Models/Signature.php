<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Signature extends Model
{
    use SoftDeletes;
    use HasFactory;
    protected $fillable = ['signature_detail_id', 'lecturer_id', 'student_id'];

    public function signatureDetail()
    {
        return $this->hasOne(SignatureDetail::class,'id','signature_detail_id')->withTrashed();
    }

    public function student()
    {
        return $this->belongsTo(User::class, 'student_id');
    }

    public function lecturer()
    {
        return $this->belongsTo(User::class, 'lecturer_id');
    }
}
