<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Penilaian Masyarakat - E-Antri</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <style>
        * {
            box-sizing: border-box;
        }

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
        }

        .brand small {
            color: #e5e7eb;
            font-size: 12px;
        }

        .menu a {
            color: white;
            text-decoration: none;
            font-weight: bold;
            margin-left: 24px;
            font-size: 15px;
        }

        .menu a:hover {
            color: #f2b705;
        }

        .hero {
            background:
                linear-gradient(90deg, rgba(15,59,99,0.94), rgba(15,59,99,0.74)),
                url('https://images.unsplash.com/photo-1551836022-d5d88e9218df?auto=format&fit=crop&w=1600&q=80');
            background-size: cover;
            background-position: center;
            color: white;
            padding: 70px;
        }

        .hero h1 {
            margin: 0 0 14px;
            font-size: 44px;
        }

        .hero p {
            margin: 0;
            max-width: 780px;
            color: #eef2f7;
            line-height: 1.8;
            font-size: 17px;
        }

        .page {
            padding: 45px 70px 70px;
        }

        .summary-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 20px;
            margin-bottom: 32px;
        }

        .summary-card {
            background: white;
            border-radius: 20px;
            padding: 24px;
            box-shadow: 0 12px 28px rgba(0,0,0,0.08);
            border-left: 6px solid #f2b705;
        }

        .summary-card small {
            color: #6b7280;
            font-weight: bold;
        }

        .summary-card strong {
            display: block;
            color: #0f3b63;
            font-size: 34px;
            margin-top: 8px;
        }

        .summary-card span {
            display: block;
            margin-top: 8px;
            color: #4b5563;
            line-height: 1.5;
            font-size: 14px;
        }

        .info-box {
            background: #fff7df;
            color: #6b4d00;
            border-radius: 18px;
            padding: 20px;
            line-height: 1.7;
            margin-bottom: 28px;
        }

        .info-box strong {
            color: #0f3b63;
        }

        .btn {
            display: inline-block;
            border: none;
            padding: 13px 22px;
            border-radius: 10px;
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

        .btn-blue {
            background: #0f3b63;
            color: white;
        }

        .review-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 22px;
        }

        .review-card {
            background: white;
            border-radius: 22px;
            padding: 24px;
            box-shadow: 0 12px 28px rgba(0,0,0,0.08);
        }

        .review-top {
            display: flex;
            justify-content: space-between;
            gap: 15px;
            margin-bottom: 14px;
            align-items: flex-start;
        }

        .review-top h3 {
            margin: 0;
            color: #0f3b63;
            font-size: 20px;
        }

        .review-top small {
            color: #6b7280;
            display: block;
            margin-top: 4px;
        }

        .stars {
            color: #f2b705;
            font-weight: bold;
            white-space: nowrap;
        }

        .review-card p {
            color: #4b5563;
            line-height: 1.7;
            margin: 0;
        }

        .empty-card {
            background: white;
            border-radius: 22px;
            padding: 36px;
            text-align: center;
            box-shadow: 0 12px 28px rgba(0,0,0,0.08);
        }

        .empty-card h2 {
            color: #0f3b63;
            margin-top: 0;
        }

        .empty-card p {
            color: #4b5563;
            line-height: 1.7;
        }

        @media (max-width: 1000px) {
            .summary-grid,
            .review-grid {
                grid-template-columns: repeat(2, 1fr);
            }
        }

        @media (max-width: 700px) {
            .navbar {
                padding: 16px 24px;
                flex-direction: column;
                align-items: flex-start;
                gap: 12px;
            }

            .menu a {
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
                padding: 35px 24px 55px;
            }

            .summary-grid,
            .review-grid {
                grid-template-columns: 1fr;
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

        <div class="menu">
            <a href="/">Beranda</a>
            <a href="{{ route('antrian.create') }}">Ambil Antrian</a>
            <a href="{{ route('antrian.cek') }}">Cek Status</a>
            <a href="{{ route('petugas.login') }}">Login Petugas</a>
        </div>
    </div>

    <section class="hero">
        <h1>Penilaian Masyarakat</h1>
        <p>
            Halaman ini menampilkan penilaian dan masukan masyarakat terhadap layanan E-Antri Kecamatan Limbangan.
            Masyarakat dapat memberi penilaian setelah status antrian dinyatakan selesai oleh petugas.
        </p>
    </section>

    <main class="page">
        <section class="summary-grid">
            <div class="summary-card">
                <small>Total Penilaian</small>
                <strong>{{ $totalPenilaian }}</strong>
                <span>Jumlah seluruh penilaian masyarakat.</span>
            </div>

            <div class="summary-card">
                <small>Rata-rata Rating</small>
                <strong>{{ $rataRating }}</strong>
                <span>Dari skala 1 sampai 5.</span>
            </div>

            <div class="summary-card">
                <small>Rating Baik</small>
                <strong>{{ $ratingBaik }}</strong>
                <span>Jumlah rating 4 sampai 5.</span>
            </div>

            <div class="summary-card">
                <small>Persentase Rating Baik</small>
                <strong>{{ $persenRatingBaik }}%</strong>
                <span>Perbandingan rating baik dari total penilaian.</span>
            </div>
        </section>

        <div class="info-box">
            <strong>Ingin memberi penilaian?</strong><br>
            Silakan cek nomor antrian terlebih dahulu. Jika status pelayanan sudah <strong>Selesai</strong>, tombol
            <strong>Beri Penilaian</strong> akan muncul pada halaman cek status.
            <br><br>
            <a href="{{ route('antrian.cek') }}" class="btn btn-primary">Cek Nomor untuk Beri Penilaian</a>
        </div>

        @if ($penilaians->count() === 0)
            <div class="empty-card">
                <h2>Belum Ada Penilaian</h2>
                <p>
                    Penilaian masyarakat akan tampil setelah warga menyelesaikan pelayanan dan mengisi rating.
                </p>
                <a href="{{ route('antrian.cek') }}" class="btn btn-blue">Cek Status Antrian</a>
            </div>
        @else
            <section class="review-grid">
                @foreach ($penilaians as $penilaian)
                    <div class="review-card">
                        <div class="review-top">
                            <div>
                                <h3>{{ $penilaian->antrian->nama }}</h3>
                                <small>
                                    {{ $penilaian->antrian->nomor_antrian }}
                                    -
                                    {{ $penilaian->antrian->layanan->nama_layanan }}
                                </small>
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
            </section>
        @endif
    </main>

</body>
</html>