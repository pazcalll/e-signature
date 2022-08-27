<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SignatureDetail extends Model
{
    use HasFactory;
    protected $fillable = ['hash', 'note', 'signature', 'qrcode'];

    public function signature()
    {
        $this->belongsTo(Signature::class);
    }
}
