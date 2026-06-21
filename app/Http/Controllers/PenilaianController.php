<?php

namespace App\Http\Controllers;

use App\Models\Antrian;
use App\Models\Penilaian;
use Illuminate\Http\Request;

class PenilaianController extends Controller
{
    public function index()
    {
        $penilaians = Penilaian::with(['antrian.layanan'])
            ->latest()
            ->get();

        $totalPenilaian = $penilaians->count();
        $rataRating = $totalPenilaian > 0 ? round($penilaians->avg('rating'), 1) : 0;
        $ratingBaik = $penilaians->where('rating', '>=', 4)->count();
        $persenRatingBaik = $totalPenilaian > 0 ? round(($ratingBaik / $totalPenilaian) * 100) : 0;

        return view('penilaian-masyarakat', compact(
            'penilaians',
            'totalPenilaian',
            'rataRating',
            'ratingBaik',
            'persenRatingBaik'
        ));
    }

    public function create(Antrian $antrian)
    {
        $antrian->load(['layanan', 'penilaian']);

        if ($antrian->status !== 'Selesai') {
            return redirect()
                ->route('antrian.cek', ['nomor' => $antrian->nomor_antrian])
                ->with('info', 'Penilaian hanya dapat diberikan setelah pelayanan selesai.');
        }

        return view('penilaian', compact('antrian'));
    }

    public function store(Request $request, Antrian $antrian)
    {
        $antrian->load('penilaian');

        if ($antrian->status !== 'Selesai') {
            return redirect()
                ->route('antrian.cek', ['nomor' => $antrian->nomor_antrian])
                ->with('info', 'Penilaian hanya dapat diberikan setelah pelayanan selesai.');
        }

        if ($antrian->penilaian) {
            return redirect()
                ->route('antrian.cek', ['nomor' => $antrian->nomor_antrian])
                ->with('success', 'Nomor antrian ini sudah memberikan penilaian.');
        }

        $request->validate([
            'rating' => ['required', 'integer', 'min:1', 'max:5'],
            'komentar' => ['nullable', 'string', 'max:1000'],
        ], [
            'rating.required' => 'Rating wajib dipilih.',
            'rating.min' => 'Rating minimal 1.',
            'rating.max' => 'Rating maksimal 5.',
            'komentar.max' => 'Komentar maksimal 1000 karakter.',
        ]);

        Penilaian::create([
            'antrian_id' => $antrian->id,
            'rating' => $request->rating,
            'komentar' => $request->komentar,
        ]);

        return redirect()
            ->route('antrian.cek', ['nomor' => $antrian->nomor_antrian])
            ->with('success', 'Terima kasih, penilaian Anda berhasil dikirim.');
    }
}