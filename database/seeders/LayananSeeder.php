<?php

namespace Database\Seeders;

use App\Models\Layanan;
use Illuminate\Database\Seeder;

class LayananSeeder extends Seeder
{
    public function run(): void
    {
        $layanans = [
            [
                'nama_layanan' => 'Pembuatan KTP',
                'kode' => 'A',
                'kuota_harian' => 50,
            ],
            [
                'nama_layanan' => 'Kartu Keluarga',
                'kode' => 'B',
                'kuota_harian' => 50,
            ],
            [
                'nama_layanan' => 'Surat Domisili',
                'kode' => 'C',
                'kuota_harian' => 50,
            ],
            [
                'nama_layanan' => 'Perizinan',
                'kode' => 'D',
                'kuota_harian' => 50,
            ],
        ];

        foreach ($layanans as $layanan) {
            Layanan::updateOrCreate(
                ['kode' => $layanan['kode']],
                $layanan
            );
        }
    }
}