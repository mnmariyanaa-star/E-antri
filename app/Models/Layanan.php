<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Layanan extends Model
{
    protected $fillable = [
        'nama_layanan',
        'kode',
        'kuota_harian',
    ];

    public function antrians()
    {
        return $this->hasMany(Antrian::class);
    }
}