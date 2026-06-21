<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Penilaian extends Model
{
    protected $fillable = [
        'antrian_id',
        'rating',
        'komentar',
    ];

    public function antrian()
    {
        return $this->belongsTo(Antrian::class);
    }
}