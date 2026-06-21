<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Antrian extends Model
{
    protected $fillable = [
        'layanan_id',
        'nomor_antrian',
        'nama',
        'nik',
        'no_hp',
        'keperluan',
        'tanggal',
        'jam',
        'status',
    ];

    protected $casts = [
        'tanggal' => 'date',
    ];

    public function layanan()
    {
        return $this->belongsTo(Layanan::class);
    }

    public function penilaian()
    {
        return $this->hasOne(Penilaian::class);
    }
}