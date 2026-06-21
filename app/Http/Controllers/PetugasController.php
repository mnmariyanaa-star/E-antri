<?php

namespace App\Http\Controllers;

use App\Models\Antrian;
use App\Models\Layanan;
use App\Models\Penilaian;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class PetugasController extends Controller
{
    public function login()
    {
        if (session('petugas_login') === true) {
            return redirect()->route('petugas.dashboard');
        }

        return view('login-petugas');
    }

    public function prosesLogin(Request $request)
    {
        $request->validate([
            'username' => ['required'],
            'password' => ['required'],
        ]);

        if ($request->username === 'petugas' && $request->password === 'petugas123') {
            session([
                'petugas_login' => true,
                'petugas_nama' => 'Petugas Pelayanan',
            ]);

            return redirect()->route('petugas.dashboard');
        }

        return back()->with('error', 'Username atau password salah.');
    }

    public function logout()
    {
        session()->forget(['petugas_login', 'petugas_nama']);

        return redirect()->route('petugas.login');
    }

    public function dashboard(Request $request)
    {
        if (session('petugas_login') !== true) {
            return redirect()->route('petugas.login');
        }

        $tahunSekarang = Carbon::now()->year;
        $bulanSekarang = Carbon::now()->month;

        $tahunDipilih = (int) $request->query('tahun', $tahunSekarang);
        $bulanDipilih = (int) $request->query('bulan', $bulanSekarang);

        $namaBulan = [
            1 => 'Januari',
            2 => 'Februari',
            3 => 'Maret',
            4 => 'April',
            5 => 'Mei',
            6 => 'Juni',
            7 => 'Juli',
            8 => 'Agustus',
            9 => 'September',
            10 => 'Oktober',
            11 => 'November',
            12 => 'Desember',
        ];

        $tahunOptions = Antrian::selectRaw('YEAR(tanggal) as tahun')
            ->distinct()
            ->orderBy('tahun', 'desc')
            ->pluck('tahun')
            ->toArray();

        if (!in_array($tahunSekarang, $tahunOptions)) {
            $tahunOptions[] = $tahunSekarang;
        }

        rsort($tahunOptions);

        $antrians = Antrian::with(['layanan', 'penilaian'])
            ->whereYear('tanggal', $tahunDipilih)
            ->whereMonth('tanggal', $bulanDipilih)
            ->orderBy('created_at', 'asc')
            ->get();

        $dipanggil = Antrian::with('layanan')
            ->where('status', 'Dipanggil')
            ->first();

        $totalAntrian = $antrians->count();
        $totalMenunggu = $antrians->where('status', 'Menunggu')->count();
        $totalDipanggil = $antrians->where('status', 'Dipanggil')->count();
        $totalSelesai = $antrians->where('status', 'Selesai')->count();
        $totalTidakHadir = $antrians->where('status', 'Tidak Hadir')->count();

        $totalHariIni = Antrian::whereDate('tanggal', Carbon::today())->count();

        $rekapLayanan = Layanan::orderBy('id')->get()->map(function ($layanan) use ($tahunDipilih, $bulanDipilih) {
            $total = Antrian::where('layanan_id', $layanan->id)
                ->whereYear('tanggal', $tahunDipilih)
                ->whereMonth('tanggal', $bulanDipilih)
                ->count();

            return [
                'nama' => $layanan->nama_layanan,
                'kode' => $layanan->kode,
                'total' => $total,
            ];
        });

        $layananTerbanyak = $rekapLayanan->sortByDesc('total')->first();

        $rekapBulanan = [];

        for ($bulan = 1; $bulan <= 12; $bulan++) {
            $rekapBulanan[] = [
                'bulan' => $bulan,
                'nama' => $namaBulan[$bulan],
                'total' => Antrian::whereYear('tanggal', $tahunDipilih)
                    ->whereMonth('tanggal', $bulan)
                    ->count(),
            ];
        }

        $jumlahHariDalamBulan = Carbon::create($tahunDipilih, $bulanDipilih, 1)->daysInMonth;
        $rekapHarian = [];

        for ($hari = 1; $hari <= $jumlahHariDalamBulan; $hari++) {
            $tanggal = Carbon::create($tahunDipilih, $bulanDipilih, $hari)->toDateString();

            $rekapHarian[] = [
                'hari' => $hari,
                'total' => Antrian::whereDate('tanggal', $tanggal)->count(),
            ];
        }

        $maxBulanan = max(collect($rekapBulanan)->pluck('total')->max(), 1);
        $maxLayanan = max($rekapLayanan->pluck('total')->max(), 1);
        $maxHarian = max(collect($rekapHarian)->pluck('total')->max(), 1);

        $penilaians = Penilaian::with(['antrian.layanan'])
            ->whereHas('antrian', function ($query) use ($tahunDipilih, $bulanDipilih) {
                $query->whereYear('tanggal', $tahunDipilih)
                    ->whereMonth('tanggal', $bulanDipilih);
            })
            ->latest()
            ->get();

        $totalPenilaian = $penilaians->count();
        $rataRating = $totalPenilaian > 0 ? round($penilaians->avg('rating'), 1) : 0;

        $ratingBagus = $penilaians->where('rating', '>=', 4)->count();
        $persenRatingBagus = $totalPenilaian > 0 ? round(($ratingBagus / $totalPenilaian) * 100) : 0;

        $rekapRating = [];

        for ($rating = 5; $rating >= 1; $rating--) {
            $jumlah = $penilaians->where('rating', $rating)->count();

            $rekapRating[] = [
                'rating' => $rating,
                'jumlah' => $jumlah,
            ];
        }

        $maxRating = max(collect($rekapRating)->pluck('jumlah')->max(), 1);

        return view('dashboard-petugas', compact(
            'antrians',
            'dipanggil',
            'totalAntrian',
            'totalMenunggu',
            'totalDipanggil',
            'totalSelesai',
            'totalTidakHadir',
            'totalHariIni',
            'tahunDipilih',
            'bulanDipilih',
            'tahunOptions',
            'namaBulan',
            'rekapLayanan',
            'layananTerbanyak',
            'rekapBulanan',
            'rekapHarian',
            'maxBulanan',
            'maxLayanan',
            'maxHarian',
            'penilaians',
            'totalPenilaian',
            'rataRating',
            'ratingBagus',
            'persenRatingBagus',
            'rekapRating',
            'maxRating'
        ));
    }

    public function panggilBerikutnya()
    {
        if (session('petugas_login') !== true) {
            return redirect()->route('petugas.login');
        }

        Antrian::where('status', 'Dipanggil')->update([
            'status' => 'Selesai',
        ]);

        $antrianBerikutnya = Antrian::where('status', 'Menunggu')
            ->orderBy('created_at', 'asc')
            ->first();

        if (!$antrianBerikutnya) {
            return back()->with('info', 'Tidak ada antrian dengan status Menunggu.');
        }

        $antrianBerikutnya->update([
            'status' => 'Dipanggil',
        ]);

        return back()->with('success', 'Nomor ' . $antrianBerikutnya->nomor_antrian . ' sedang dipanggil.');
    }

    public function ubahStatus(Request $request, Antrian $antrian)
    {
        if (session('petugas_login') !== true) {
            return redirect()->route('petugas.login');
        }

        $request->validate([
            'status' => ['required', 'in:Menunggu,Dipanggil,Selesai,Tidak Hadir'],
        ]);

        if ($request->status === 'Dipanggil') {
            Antrian::where('status', 'Dipanggil')->update([
                'status' => 'Selesai',
            ]);
        }

        $antrian->update([
            'status' => $request->status,
        ]);

        return back()->with('success', 'Status antrian berhasil diperbarui.');
    }

    public function hapusSemua()
    {
        if (session('petugas_login') !== true) {
            return redirect()->route('petugas.login');
        }

        Antrian::truncate();

        return back()->with('success', 'Semua data antrian berhasil dihapus.');
    }
}