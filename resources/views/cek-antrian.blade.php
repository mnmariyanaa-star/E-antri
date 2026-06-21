<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Cek Status Antrian - E-Antri</title>
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

        .brand h2 { margin: 0; font-size: 24px; }
        .brand small { color: #e5e7eb; font-size: 12px; }

        .navbar a {
            color: white;
            text-decoration: none;
            font-weight: bold;
            margin-left: 24px;
            font-size: 15px;
        }

        .navbar a:hover { color: #f2b705; }

        .hero {
            background: linear-gradient(90deg, rgba(15,59,99,0.94), rgba(15,59,99,0.78)),
                        url('https://images.unsplash.com/photo-1551836022-d5d88e9218df?auto=format&fit=crop&w=1600&q=80');
            background-size: cover;
            background-position: center;
            color: white;
            padding: 70px;
        }

        .hero h1 {
            margin: 0 0 14px;
            font-size: 42px;
        }

        .hero p {
            margin: 0;
            color: #eef2f7;
            line-height: 1.7;
            max-width: 750px;
            font-size: 17px;
        }

        .page {
            padding: 45px 70px 65px;
            display: grid;
            grid-template-columns: 0.85fr 1.15fr;
            gap: 30px;
            align-items: start;
        }

        .search-card, .result-card, .empty-card {
            background: white;
            border-radius: 24px;
            padding: 32px;
            box-shadow: 0 12px 28px rgba(0,0,0,0.10);
        }

        .search-card h2, .result-card h2, .empty-card h2 {
            color: #0f3b63;
            margin-top: 0;
            font-size: 30px;
        }

        .search-card p, .empty-card p {
            color: #4b5563;
            line-height: 1.7;
        }

        .success-box {
            background: #e8f7ef;
            color: #147d43;
            padding: 14px;
            border-radius: 14px;
            margin-bottom: 18px;
            font-weight: bold;
        }

        .info-box {
            background: #eef6ff;
            color: #0f3b63;
            padding: 14px;
            border-radius: 14px;
            margin-bottom: 18px;
            font-weight: bold;
        }

        .form-group { margin-bottom: 18px; }

        label {
            display: block;
            font-weight: bold;
            color: #0f3b63;
            margin-bottom: 8px;
        }

        input {
            width: 100%;
            padding: 14px 15px;
            border-radius: 10px;
            border: 1px solid #d1d9e6;
            font-size: 15px;
            outline: none;
        }

        input:focus {
            border-color: #0f3b63;
            box-shadow: 0 0 0 3px rgba(15,59,99,0.10);
        }

        .btn {
            display: inline-block;
            border: none;
            padding: 14px 24px;
            border-radius: 9px;
            font-weight: bold;
            cursor: pointer;
            text-decoration: none;
            font-size: 15px;
            font-family: Arial, sans-serif;
        }

        .btn-primary {
            background: #f2b705;
            color: #0f3b63;
        }

        .btn-secondary {
            background: #eef2f7;
            color: #0f3b63;
        }

        .btn-blue {
            background: #0f3b63;
            color: white;
        }

        .btn-green {
            background: #e8f7ef;
            color: #147d43;
        }

        .list-card {
            display: grid;
            gap: 18px;
        }

        .ticket-header {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            gap: 18px;
            margin-bottom: 24px;
        }

        .ticket-title h2 {
            margin-bottom: 8px;
        }

        .ticket-title p {
            margin: 0;
            color: #5b6572;
            line-height: 1.6;
        }

        .qr-box {
            background: #f8fafc;
            border: 1px solid #e5edf5;
            border-radius: 16px;
            padding: 12px;
            text-align: center;
            min-width: 138px;
        }

        .qr-box img {
            width: 110px;
            height: 110px;
            display: block;
            margin: 0 auto 6px;
        }

        .qr-box small {
            color: #6b7280;
            font-size: 11px;
        }

        .queue-main {
            background: #0f3b63;
            color: white;
            border-radius: 22px;
            padding: 30px;
            text-align: center;
            margin-bottom: 24px;
        }

        .queue-main small {
            display: block;
            color: #e5e7eb;
            margin-bottom: 8px;
        }

        .queue-main strong {
            color: #f2b705;
            font-size: 64px;
            display: block;
            letter-spacing: 2px;
        }

        .badge {
            display: inline-block;
            background: #e8f7ef;
            color: #147d43;
            padding: 10px 16px;
            border-radius: 30px;
            font-weight: bold;
            margin-top: 14px;
        }

        .detail-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 14px;
            margin-bottom: 20px;
        }

        .detail-item {
            background: #f8fafc;
            border: 1px solid #e5edf5;
            border-radius: 14px;
            padding: 15px;
        }

        .detail-item small {
            display: block;
            color: #6b7280;
            margin-bottom: 5px;
        }

        .detail-item strong {
            color: #0f3b63;
        }

        .info-status {
            background: #eef6ff;
            color: #0f3b63;
            padding: 16px;
            border-radius: 14px;
            line-height: 1.7;
            margin-bottom: 18px;
        }

        .rating-box {
            background: #fff7df;
            color: #6b4d00;
            padding: 16px;
            border-radius: 14px;
            line-height: 1.7;
            margin-bottom: 18px;
        }

        .button-row {
            display: flex;
            gap: 10px;
            flex-wrap: wrap;
        }

        @media print {
            body {
                background: white;
            }

            .navbar,
            .hero,
            .search-card,
            .button-row {
                display: none !important;
            }

            .page {
                display: block;
                padding: 0;
            }

            .result-card {
                box-shadow: none;
                border-radius: 0;
                padding: 30px;
                width: 100%;
            }

            .result-card::before {
                content: "E-Antri Kecamatan Limbangan, Garut";
                display: block;
                text-align: center;
                color: #0f3b63;
                font-size: 22px;
                font-weight: bold;
                margin-bottom: 20px;
            }
        }

        @media (max-width: 900px) {
            .navbar {
                padding: 16px 24px;
                flex-direction: column;
                align-items: flex-start;
                gap: 12px;
            }

            .navbar a {
                margin-left: 0;
                margin-right: 16px;
            }

            .hero {
                padding: 45px 24px;
            }

            .hero h1 {
                font-size: 34px;
            }

            .page {
                grid-template-columns: 1fr;
                padding: 35px 24px 55px;
            }

            .detail-grid {
                grid-template-columns: 1fr;
            }

            .ticket-header {
                flex-direction: column;
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
                <small>Kecamatan Limbangan, Garut</small>
            </div>
        </div>

        <div>
            <a href="/">Beranda</a>
            <a href="{{ route('antrian.create') }}">Ambil Antrian</a>
            <a href="{{ route('petugas.login') }}">Login Petugas</a>
        </div>
    </div>

    <section class="hero">
        <h1>Cek Status Antrian</h1>
        <p>
            Masukkan nomor antrian, NIK, atau nomor HP untuk melihat status antrian pelayanan.
            Warga tidak perlu login untuk mengecek nomor antrian.
        </p>
    </section>

    <div class="page">
        <div class="search-card">
            <h2>Cari Nomor Antrian</h2>

            @if (session('success'))
                <div class="success-box">
                    {{ session('success') }}
                </div>
            @endif

            @if (session('info'))
                <div class="info-box">
                    {{ session('info') }}
                </div>
            @endif

            <p>
                Gunakan nomor antrian seperti <strong>A-001</strong>, atau masukkan NIK/No HP yang digunakan saat mengambil nomor.
            </p>

            <form method="GET" action="{{ route('antrian.cek') }}">
                <div class="form-group">
                    <label>Nomor Antrian / NIK / No HP</label>
                    <input type="text" name="q" value="{{ $keyword }}" placeholder="Contoh: A-001 atau NIK atau No HP" required>
                </div>

                <button type="submit" class="btn btn-primary">Cek Status</button>
                <a href="{{ route('antrian.create') }}" class="btn btn-secondary">Ambil Antrian</a>
            </form>
        </div>

        <div>
            @if (!$keyword)
                <div class="empty-card">
                    <h2>Belum Ada Data Ditampilkan</h2>
                    <p>
                        Silakan masukkan nomor antrian, NIK, atau nomor HP pada kolom pencarian.
                        Setelah itu sistem akan menampilkan detail antrian yang sesuai.
                    </p>
                </div>
            @elseif ($hasil && $hasil->count() > 0)
                <div class="list-card">
                    @foreach ($hasil as $item)
                        <div class="result-card" id="buktiAntrian">
                            <div class="ticket-header">
                                <div class="ticket-title">
                                    <h2>Bukti Nomor Antrian</h2>
                                    <p>
                                        Simpan atau cetak bukti ini. QR dapat digunakan untuk membuka halaman cek status nomor antrian.
                                    </p>
                                </div>

                                <div class="qr-box">
                                    <img
                                        src="https://api.qrserver.com/v1/create-qr-code/?size=140x140&data={{ urlencode(route('antrian.cek', ['nomor' => $item->nomor_antrian])) }}"
                                        alt="QR Cek Status">
                                    <small>Scan untuk cek status</small>
                                </div>
                            </div>

                            <div class="queue-main">
                                <small>Nomor Antrian</small>
                                <strong>{{ $item->nomor_antrian }}</strong>
                                <span class="badge">{{ $item->status }}</span>
                            </div>

                            <div class="detail-grid">
                                <div class="detail-item">
                                    <small>Nama</small>
                                    <strong>{{ $item->nama }}</strong>
                                </div>

                                <div class="detail-item">
                                    <small>NIK</small>
                                    <strong>{{ substr($item->nik, 0, 4) }}********{{ substr($item->nik, -4) }}</strong>
                                </div>

                                <div class="detail-item">
                                    <small>No HP</small>
                                    <strong>{{ $item->no_hp }}</strong>
                                </div>

                                <div class="detail-item">
                                    <small>Layanan</small>
                                    <strong>{{ $item->layanan->nama_layanan }}</strong>
                                </div>

                                <div class="detail-item">
                                    <small>Tanggal Ambil</small>
                                    <strong>{{ $item->tanggal->format('d-m-Y') }}</strong>
                                </div>

                                <div class="detail-item">
                                    <small>Jam Ambil</small>
                                    <strong>{{ substr($item->jam, 0, 5) }}</strong>
                                </div>
                            </div>

                            <div class="info-status">
                                Status saat ini: <strong>{{ $item->status }}</strong>.
                                Silakan datang ke kantor pelayanan sesuai nomor antrian dan pastikan membawa dokumen pendukung.
                            </div>

                            @if ($item->status === 'Selesai' && !$item->penilaian)
                                <div class="rating-box">
                                    Pelayanan Anda sudah selesai. Silakan berikan penilaian untuk membantu peningkatan kualitas layanan.
                                </div>
                            @elseif ($item->penilaian)
                                <div class="rating-box">
                                    Terima kasih, penilaian sudah diberikan. Rating Anda:
                                    <strong>{{ $item->penilaian->rating }} dari 5</strong>.
                                </div>
                            @endif

                            <div class="button-row">
                                <button onclick="window.print()" class="btn btn-primary">
                                    Cetak / Simpan PDF
                                </button>

                                @if ($item->status === 'Selesai' && !$item->penilaian)
                                    <a href="{{ route('penilaian.create', $item->id) }}" class="btn btn-green">
                                        Beri Penilaian
                                    </a>
                                @endif

                                <a href="{{ route('antrian.create') }}" class="btn btn-secondary">
                                    Ambil Antrian Lagi
                                </a>

                                <a href="/" class="btn btn-blue">
                                    Kembali ke Beranda
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <div class="empty-card">
                    <h2>Data Tidak Ditemukan</h2>
                    <p>
                        Nomor antrian tidak ditemukan. Pastikan nomor yang dimasukkan benar,
                        atau ambil nomor antrian terlebih dahulu.
                    </p>
                    <a href="{{ route('antrian.create') }}" class="btn btn-primary">Ambil Antrian Sekarang</a>
                </div>
            @endif
        </div>
    </div>

</body>
</html>