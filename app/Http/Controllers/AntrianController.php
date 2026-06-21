<?php

namespace App\Http\Controllers;

use App\Models\Antrian;
use App\Models\Layanan;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class AntrianController extends Controller
{
    public function create(Request $request)
    {
        $layanans = Layanan::orderBy('id')->get();

        $kodeLayanan = $request->query('layanan');
        $selectedLayananId = null;

        if ($kodeLayanan) {
            if ($kodeLayanan === 'ktp') {
                $layananTerpilih = Layanan::where('kode', 'A')->first();
            } elseif ($kodeLayanan === 'kk') {
                $layananTerpilih = Layanan::where('kode', 'B')->first();
            } elseif ($kodeLayanan === 'domisili') {
                $layananTerpilih = Layanan::where('kode', 'C')->first();
            } elseif ($kodeLayanan === 'perizinan') {
                $layananTerpilih = Layanan::where('kode', 'D')->first();
            } else {
                $layananTerpilih = null;
            }

            $selectedLayananId = $layananTerpilih?->id;
        }

        return view('ambil-antrian', compact('layanans', 'selectedLayananId'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => ['required', 'string', 'max:255'],
            'nik' => ['required', 'digits:16'],
            'no_hp' => ['required', 'string', 'max:20'],
            'layanan_id' => ['required', 'exists:layanans,id'],
            'keperluan' => ['required', 'string'],
        ], [
            'nama.required' => 'Nama lengkap wajib diisi.',
            'nik.required' => 'NIK wajib diisi.',
            'nik.digits' => 'NIK harus 16 digit.',
            'no_hp.required' => 'Nomor HP wajib diisi.',
            'layanan_id.required' => 'Layanan wajib dipilih.',
            'keperluan.required' => 'Keperluan wajib diisi.',
        ]);

        $layanan = Layanan::findOrFail($request->layanan_id);

        $tanggalHariIni = Carbon::today()->toDateString();

        $jumlahAntrianHariIni = Antrian::whereDate('tanggal', $tanggalHariIni)
            ->where('layanan_id', $layanan->id)
            ->count();

        $nomorUrut = $jumlahAntrianHariIni + 1;
        $nomorAntrian = $layanan->kode . '-' . str_pad($nomorUrut, 3, '0', STR_PAD_LEFT);

        Antrian::create([
            'layanan_id' => $layanan->id,
            'nomor_antrian' => $nomorAntrian,
            'nama' => $request->nama,
            'nik' => $request->nik,
            'no_hp' => $request->no_hp,
            'keperluan' => $request->keperluan,
            'tanggal' => $tanggalHariIni,
            'jam' => Carbon::now()->format('H:i:s'),
            'status' => 'Menunggu',
        ]);

        return redirect()
            ->route('antrian.cek', ['nomor' => $nomorAntrian])
            ->with('success', 'Nomor antrian berhasil dibuat. Silakan simpan atau cetak bukti antrian Anda.');
    }

    public function cek(Request $request)
    {
        $keyword = $request->query('nomor') ?? $request->query('q');
        $hasil = null;

        if ($keyword) {
            $hasil = Antrian::with(['layanan', 'penilaian'])
                ->where('nomor_antrian', $keyword)
                ->orWhere('nik', $keyword)
                ->orWhere('no_hp', $keyword)
                ->latest()
                ->get();
        }

        return view('cek-antrian', compact('keyword', 'hasil'));
    }
}