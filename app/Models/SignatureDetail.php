<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SignatureDetail extends Model
{
    use SoftDeletes;
    use HasFactory;
    protected $fillable = ['hash', 'note', 'signature', 'qrcode'];

    // public function signature()
    // {
    //     return $this->belongsTo(Signature::class);
    // }
}
