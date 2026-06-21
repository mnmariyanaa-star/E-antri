<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Dashboard Petugas - E-Antri</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <style>
        * { box-sizing: border-box; }

        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background: #f4f7fb;
            color: #102033;
        }

        .navbar {
            background: #0f3b63;
            color: white;
            padding: 16px 70px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            position: sticky;
            top: 0;
            z-index: 999;
            box-shadow: 0 4px 14px rgba(0,0,0,0.15);
        }

        .brand {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .logo {
            width: 45px;
            height: 45px;
            border-radius: 50%;
            background: #f2b705;
            color: #0f3b63;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: bold;
        }

        .brand h2 {
            margin: 0;
            font-size: 24px;
            line-height: 1.1;
        }

        .brand small {
            color: #e5e7eb;
            font-size: 12px;
        }

        .nav-right {
            display: flex;
            align-items: center;
            gap: 12px;
            flex-wrap: wrap;
        }

        .btn {
            display: inline-block;
            border: none;
            padding: 11px 16px;
            border-radius: 9px;
            font-weight: bold;
            cursor: pointer;
            text-decoration: none;
            font-size: 13px;
            font-family: Arial, sans-serif;
            transition: 0.25s;
        }

        .btn:hover { transform: translateY(-2px); }

        .btn-yellow { background: #f2b705; color: #0f3b63; }
        .btn-white { background: white; color: #0f3b63; }
        .btn-blue { background: #0f3b63; color: white; }
        .btn-green { background: #e8f7ef; color: #147d43; }
        .btn-red { background: #ffe8e8; color: #b42318; }
        .btn-gray { background: #eef2f7; color: #0f3b63; }

        .page {
            padding: 42px 70px 70px;
        }

        .hero {
            background:
                linear-gradient(90deg, rgba(15,59,99,0.94), rgba(15,59,99,0.76)),
                url('https://images.unsplash.com/photo-1551836022-d5d88e9218df?auto=format&fit=crop&w=1600&q=80');
            background-size: cover;
            background-position: center;
            color: white;
            border-radius: 26px;
            padding: 36px;
            margin-bottom: 28px;
            display: grid;
            grid-template-columns: 1.2fr 0.8fr;
            gap: 24px;
            align-items: center;
            box-shadow: 0 14px 30px rgba(0,0,0,0.16);
        }

        .hero h1 {
            margin: 0 0 12px;
            font-size: 38px;
        }

        .hero p {
            color: #eef2f7;
            line-height: 1.7;
            margin: 0;
        }

        .filter-card {
            background: rgba(255,255,255,0.14);
            border: 1px solid rgba(255,255,255,0.22);
            border-radius: 20px;
            padding: 22px;
        }

        .filter-card label {
            display: block;
            color: #f2b705;
            font-weight: bold;
            margin-bottom: 8px;
        }

        .filter-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 12px;
        }

        select {
            width: 100%;
            padding: 13px 14px;
            border-radius: 10px;
            border: none;
            font-size: 14px;
            outline: none;
        }

        .filter-card .btn {
            width: 100%;
            margin-top: 12px;
            text-align: center;
        }

        .alert-success {
            background: #e8f7ef;
            color: #147d43;
            padding: 14px;
            border-radius: 14px;
            margin-bottom: 20px;
            font-weight: bold;
        }

        .alert-info {
            background: #eef6ff;
            color: #0f3b63;
            padding: 14px;
            border-radius: 14px;
            margin-bottom: 20px;
            font-weight: bold;
        }

        .summary-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 18px;
            margin-bottom: 26px;
        }

        .summary-card {
            background: white;
            border-radius: 18px;
            padding: 22px;
            box-shadow: 0 10px 25px rgba(0,0,0,0.07);
            border-left: 6px solid #f2b705;
            min-height: 125px;
        }

        .summary-card small {
            color: #6b7280;
            font-weight: bold;
            line-height: 1.4;
        }

        .summary-card strong {
            display: block;
            margin-top: 8px;
            color: #0f3b63;
            font-size: 30px;
        }

        .summary-card span {
            color: #4b5563;
            display: block;
            margin-top: 8px;
            font-size: 13px;
            line-height: 1.4;
        }

        .dashboard-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 24px;
            margin-bottom: 26px;
        }

        .panel {
            background: white;
            border-radius: 24px;
            padding: 28px;
            box-shadow: 0 12px 28px rgba(0,0,0,0.10);
        }

        .panel h2 {
            color: #0f3b63;
            margin: 0 0 20px;
            font-size: 26px;
        }

        .chart-list {
            display: grid;
            gap: 13px;
        }

        .chart-row {
            display: grid;
            grid-template-columns: 90px 1fr 45px;
            gap: 12px;
            align-items: center;
        }

        .service-row {
            display: grid;
            grid-template-columns: 140px 1fr 45px;
            gap: 12px;
            align-items: center;
        }

        .chart-label {
            color: #4b5563;
            font-weight: bold;
            font-size: 13px;
        }

        .chart-track {
            background: #eef2f7;
            border-radius: 30px;
            height: 18px;
            overflow: hidden;
        }

        .chart-bar {
            background: #f2b705;
            height: 100%;
            border-radius: 30px;
            min-width: 4px;
        }

        .chart-value {
            color: #0f3b63;
            font-weight: bold;
            text-align: right;
        }

        .daily-wrap {
            display: flex;
            align-items: flex-end;
            gap: 8px;
            min-height: 210px;
            padding: 14px 4px 0;
            overflow-x: auto;
        }

        .daily-item {
            min-width: 28px;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: flex-end;
            gap: 7px;
        }

        .daily-bar {
            width: 18px;
            background: #f2b705;
            border-radius: 10px 10px 0 0;
            min-height: 5px;
        }

        .daily-label {
            font-size: 11px;
            color: #6b7280;
        }

        .data-panel {
            background: white;
            border-radius: 24px;
            padding: 28px;
            box-shadow: 0 12px 28px rgba(0,0,0,0.10);
            margin-bottom: 26px;
        }

        .panel-header {
            display: flex;
            justify-content: space-between;
            gap: 20px;
            align-items: center;
            margin-bottom: 24px;
            flex-wrap: wrap;
        }

        .panel-header h2 {
            margin: 0;
            color: #0f3b63;
            font-size: 30px;
        }

        .action-group {
            display: flex;
            gap: 10px;
            flex-wrap: wrap;
        }

        .current-box {
            background: #0f3b63;
            color: white;
            border-radius: 22px;
            padding: 26px;
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 18px;
            margin-bottom: 24px;
            align-items: center;
        }

        .current-box small {
            color: #e5e7eb;
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
        }

        .current-number {
            font-size: 58px;
            color: #f2b705;
            font-weight: bold;
        }

        .current-info {
            text-align: right;
        }

        .current-info strong {
            display: block;
            font-size: 20px;
            margin-bottom: 6px;
        }

        .table-wrap {
            width: 100%;
            overflow-x: auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            min-width: 1050px;
        }

        th {
            background: #0f3b63;
            color: white;
            text-align: left;
            padding: 15px;
            font-size: 14px;
        }

        td {
            background: white;
            border-bottom: 1px solid #e5edf5;
            padding: 14px 15px;
            color: #263445;
            vertical-align: middle;
            font-size: 14px;
        }

        tr:hover td { background: #f8fafc; }

        .nomor {
            font-weight: bold;
            color: #f2b705;
            font-size: 19px;
        }

        .badge {
            display: inline-block;
            padding: 8px 12px;
            border-radius: 30px;
            font-weight: bold;
            font-size: 12px;
        }

        .badge-menunggu { background: #fff7df; color: #6b4d00; }
        .badge-dipanggil { background: #e8f1ff; color: #0f3b63; }
        .badge-selesai { background: #e8f7ef; color: #147d43; }
        .badge-tidak { background: #ffe8e8; color: #b42318; }

        .empty {
            text-align: center;
            background: #f8fafc;
            padding: 36px;
            border-radius: 18px;
            color: #5b6572;
            line-height: 1.7;
        }

        .empty strong {
            color: #0f3b63;
        }

        .inline-form {
            display: inline-block;
            margin: 2px;
        }

        .comment-card {
            background: #f8fafc;
            border: 1px solid #e5edf5;
            border-radius: 16px;
            padding: 18px;
            margin-bottom: 14px;
        }

        .comment-top {
            display: flex;
            justify-content: space-between;
            gap: 16px;
            margin-bottom: 10px;
            flex-wrap: wrap;
        }

        .comment-top strong {
            color: #0f3b63;
        }

        .stars {
            color: #f2b705;
            font-weight: bold;
        }

        .comment-card p {
            color: #4b5563;
            line-height: 1.7;
            margin: 0;
        }

        @media (max-width: 1100px) {
            .summary-grid {
                grid-template-columns: repeat(2, 1fr);
            }

            .dashboard-grid {
                grid-template-columns: 1fr;
            }
        }

        @media (max-width: 850px) {
            .navbar {
                padding: 16px 24px;
                flex-direction: column;
                align-items: flex-start;
                gap: 12px;
            }

            .page {
                padding: 32px 24px 55px;
            }

            .hero,
            .current-box {
                grid-template-columns: 1fr;
            }

            .current-info {
                text-align: left;
            }
        }

        @media (max-width: 550px) {
            .summary-grid {
                grid-template-columns: 1fr;
            }

            .filter-grid {
                grid-template-columns: 1fr;
            }

            .hero h1 {
                font-size: 30px;
            }
        }
    </style>
</head>

<body>

    <div class="navbar">
        <div class="brand">
            <div class="logo">EA</div>
            <div>
                <h2>E-Antri</h2>
                <small>Dashboard Petugas Kecamatan Limbangan</small>
            </div>
        </div>

        <div class="nav-right">
            <span>{{ session('petugas_nama') }}</span>
            <a href="/" class="btn btn-white">Beranda</a>

            <form method="POST" action="{{ route('petugas.logout') }}">
                @csrf
                <button type="submit" class="btn btn-yellow">Keluar</button>
            </form>
        </div>
    </div>

    <div class="page">
        <section class="hero">
            <div>
                <h1>Dashboard Petugas</h1>
                <p>
                    Kelola nomor antrian masyarakat, lihat rekap bulanan, pantau layanan paling banyak,
                    dan lihat penilaian masyarakat. Data sudah tersimpan di database MySQL.
                </p>
            </div>

            <div class="filter-card">
                <form method="GET" action="{{ route('petugas.dashboard') }}">
                    <div class="filter-grid">
                        <div>
                            <label>Bulan</label>
                            <select name="bulan">
                                @foreach ($namaBulan as $nomorBulan => $nama)
                                    <option value="{{ $nomorBulan }}" {{ $bulanDipilih == $nomorBulan ? 'selected' : '' }}>
                                        {{ $nama }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div>
                            <label>Tahun</label>
                            <select name="tahun">
                                @foreach ($tahunOptions as $tahun)
                                    <option value="{{ $tahun }}" {{ $tahunDipilih == $tahun ? 'selected' : '' }}>
                                        {{ $tahun }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-yellow">Tampilkan Rekap</button>
                </form>
            </div>
        </section>

        @if (session('success'))
            <div class="alert-success">{{ session('success') }}</div>
        @endif

        @if (session('info'))
            <div class="alert-info">{{ session('info') }}</div>
        @endif

        <section class="summary-grid">
            <div class="summary-card">
                <small>Total Bulan Ini</small>
                <strong>{{ $totalAntrian }}</strong>
                <span>{{ $namaBulan[$bulanDipilih] }} {{ $tahunDipilih }}</span>
            </div>

            <div class="summary-card">
                <small>Antrian Hari Ini</small>
                <strong>{{ $totalHariIni }}</strong>
                <span>Total semua layanan hari ini</span>
            </div>

            <div class="summary-card">
                <small>Selesai</small>
                <strong>{{ $totalSelesai }}</strong>
                <span>Sudah selesai dilayani</span>
            </div>

            <div class="summary-card">
                <small>Tidak Hadir</small>
                <strong>{{ $totalTidakHadir }}</strong>
                <span>Warga tidak datang</span>
            </div>

            <div class="summary-card">
                <small>Layanan Terbanyak</small>
                <strong style="font-size: 22px;">
                    {{ $layananTerbanyak && $layananTerbanyak['total'] > 0 ? $layananTerbanyak['nama'] : '-' }}
                </strong>
                <span>{{ $layananTerbanyak ? $layananTerbanyak['total'] : 0 }} antrian</span>
            </div>

            <div class="summary-card">
                <small>Jumlah Penilaian</small>
                <strong>{{ $totalPenilaian }}</strong>
                <span>Penilaian masyarakat bulan ini</span>
            </div>

            <div class="summary-card">
                <small>Rata-rata Rating</small>
                <strong>{{ $rataRating }}</strong>
                <span>Dari skala 1 sampai 5</span>
            </div>

            <div class="summary-card">
                <small>Rating Baik</small>
                <strong>{{ $persenRatingBagus }}%</strong>
                <span>Rating 4 sampai 5</span>
            </div>
        </section>

        <section class="dashboard-grid">
            <div class="panel">
                <h2>Grafik Antrian per Bulan {{ $tahunDipilih }}</h2>

                <div class="chart-list">
                    @foreach ($rekapBulanan as $bulan)
                        @php
                            $lebar = ($bulan['total'] / $maxBulanan) * 100;
                        @endphp

                        <div class="chart-row">
                            <div class="chart-label">{{ substr($bulan['nama'], 0, 3) }}</div>
                            <div class="chart-track">
                                <div class="chart-bar" style="width: {{ $lebar }}%;"></div>
                            </div>
                            <div class="chart-value">{{ $bulan['total'] }}</div>
                        </div>
                    @endforeach
                </div>
            </div>

            <div class="panel">
                <h2>Grafik Layanan {{ $namaBulan[$bulanDipilih] }}</h2>

                <div class="chart-list">
                    @foreach ($rekapLayanan as $layanan)
                        @php
                            $lebar = ($layanan['total'] / $maxLayanan) * 100;
                        @endphp

                        <div class="service-row">
                            <div class="chart-label">{{ $layanan['nama'] }}</div>
                            <div class="chart-track">
                                <div class="chart-bar" style="width: {{ $lebar }}%;"></div>
                            </div>
                            <div class="chart-value">{{ $layanan['total'] }}</div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>

        <section class="dashboard-grid">
            <div class="panel">
                <h2>Grafik Harian {{ $namaBulan[$bulanDipilih] }} {{ $tahunDipilih }}</h2>

                <div class="daily-wrap">
                    @foreach ($rekapHarian as $hari)
                        @php
                            $tinggi = ($hari['total'] / $maxHarian) * 170;
                        @endphp

                        <div class="daily-item">
                            <div style="font-size: 11px; color: #0f3b63; font-weight: bold;">
                                {{ $hari['total'] }}
                            </div>
                            <div class="daily-bar" style="height: {{ max($tinggi, 5) }}px;"></div>
                            <div class="daily-label">{{ $hari['hari'] }}</div>
                        </div>
                    @endforeach
                </div>
            </div>

            <div class="panel">
                <h2>Grafik Rating Masyarakat</h2>

                <div class="chart-list">
                    @foreach ($rekapRating as $rating)
                        @php
                            $lebar = ($rating['jumlah'] / $maxRating) * 100;
                        @endphp

                        <div class="chart-row">
                            <div class="chart-label">{{ $rating['rating'] }} ⭐</div>
                            <div class="chart-track">
                                <div class="chart-bar" style="width: {{ $lebar }}%;"></div>
                            </div>
                            <div class="chart-value">{{ $rating['jumlah'] }}</div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>

        <section class="data-panel">
            <div class="panel-header">
                <h2>Data Antrian {{ $namaBulan[$bulanDipilih] }} {{ $tahunDipilih }}</h2>

                <div class="action-group">
                    <form method="POST" action="{{ route('petugas.panggil') }}">
                        @csrf
                        <button type="submit" class="btn btn-yellow">Panggil Berikutnya</button>
                    </form>

                    <a href="{{ route('petugas.dashboard', ['bulan' => $bulanDipilih, 'tahun' => $tahunDipilih]) }}" class="btn btn-gray">Refresh Data</a>

                    <form method="POST" action="{{ route('petugas.hapusSemua') }}" onsubmit="return confirm('Yakin ingin menghapus semua data antrian?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-red">Hapus Semua</button>
                    </form>
                </div>
            </div>

            <div class="current-box">
                <div>
                    <small>Sedang Dipanggil</small>
                    <div class="current-number">
                        {{ $dipanggil ? $dipanggil->nomor_antrian : '-' }}
                    </div>
                </div>

                <div class="current-info">
                    <strong>{{ $dipanggil ? $dipanggil->nama : 'Belum ada antrian dipanggil' }}</strong>
                    <span>{{ $dipanggil ? $dipanggil->layanan->nama_layanan : 'Klik tombol Panggil Berikutnya untuk memulai.' }}</span>
                </div>
            </div>

            @if ($antrians->count() === 0)
                <div class="empty">
                    <strong>Belum ada data antrian pada bulan ini.</strong><br>
                    Silakan pilih bulan/tahun lain atau ambil nomor melalui menu Ambil Antrian.
                </div>
            @else
                <div class="table-wrap">
                    <table>
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nomor</th>
                                <th>Nama</th>
                                <th>NIK</th>
                                <th>No HP</th>
                                <th>Layanan</th>
                                <th>Tanggal</th>
                                <th>Jam Ambil</th>
                                <th>Status</th>
                                <th>Penilaian</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($antrians as $index => $item)
                                @php
                                    $statusClass = match($item->status) {
                                        'Menunggu' => 'badge-menunggu',
                                        'Dipanggil' => 'badge-dipanggil',
                                        'Selesai' => 'badge-selesai',
                                        default => 'badge-tidak',
                                    };
                                @endphp

                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td><span class="nomor">{{ $item->nomor_antrian }}</span></td>
                                    <td>{{ $item->nama }}</td>
                                    <td>{{ substr($item->nik, 0, 4) }}********{{ substr($item->nik, -4) }}</td>
                                    <td>{{ $item->no_hp }}</td>
                                    <td>{{ $item->layanan->nama_layanan }}</td>
                                    <td>{{ $item->tanggal->format('d-m-Y') }}</td>
                                    <td>{{ substr($item->jam, 0, 5) }}</td>
                                    <td><span class="badge {{ $statusClass }}">{{ $item->status }}</span></td>
                                    <td>
                                        @if ($item->penilaian)
                                            {{ $item->penilaian->rating }} ⭐
                                        @else
                                            -
                                        @endif
                                    </td>
                                    <td>
                                        <form class="inline-form" method="POST" action="{{ route('petugas.status', $item->id) }}">
                                            @csrf
                                            <input type="hidden" name="status" value="Dipanggil">
                                            <button type="submit" class="btn btn-blue">Panggil</button>
                                        </form>

                                        <form class="inline-form" method="POST" action="{{ route('petugas.status', $item->id) }}">
                                            @csrf
                                            <input type="hidden" name="status" value="Selesai">
                                            <button type="submit" class="btn btn-green">Selesai</button>
                                        </form>

                                        <form class="inline-form" method="POST" action="{{ route('petugas.status', $item->id) }}">
                                            @csrf
                                            <input type="hidden" name="status" value="Tidak Hadir">
                                            <button type="submit" class="btn btn-red">Tidak Hadir</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @endif
        </section>

        <section class="data-panel">
            <div class="panel-header">
                <h2>Penilaian Masyarakat</h2>
            </div>

            @if ($penilaians->count() === 0)
                <div class="empty">
                    <strong>Belum ada penilaian masyarakat pada bulan ini.</strong><br>
                    Penilaian akan muncul setelah warga menyelesaikan layanan dan mengisi rating.
                </div>
            @else
                @foreach ($penilaians as $penilaian)
                    <div class="comment-card">
                        <div class="comment-top">
                            <div>
                                <strong>{{ $penilaian->antrian->nama }}</strong>
                                <div style="color:#6b7280; margin-top:4px;">
                                    {{ $penilaian->antrian->nomor_antrian }} - {{ $penilaian->antrian->layanan->nama_layanan }}
                                </div>
                            </div>

                            <div class="stars">
                                {{ str_repeat('⭐', $penilaian->rating) }}
                            </div>
                        </div>

                        <p>
                            {{ $penilaian->komentar ?: 'Tidak ada komentar tambahan.' }}
                        </p>
                    </div>
                @endforeach
            @endif
        </section>
    </div>

</body>
</html>