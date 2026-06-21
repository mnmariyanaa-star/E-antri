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

        .navbar a {
            color: white;
            text-decoration: none;
            font-weight: bold;
            margin-left: 24px;
            font-size: 15px;
        }

        .navbar a:hover {
            color: #f2b705;
        }

        .page {
            min-height: calc(100vh - 77px);
            padding: 55px 70px;
            display: grid;
            grid-template-columns: 0.9fr 1.1fr;
            gap: 36px;
            align-items: start;
        }

        .info-box {
            background:
                linear-gradient(90deg, rgba(15,59,99,0.94), rgba(15,59,99,0.76)),
                url('https://images.unsplash.com/photo-1551836022-d5d88e9218df?auto=format&fit=crop&w=1600&q=80');
            background-size: cover;
            background-position: center;
            color: white;
            border-radius: 24px;
            padding: 36px;
            box-shadow: 0 12px 28px rgba(0,0,0,0.12);
        }

        .info-box h1 {
            margin: 0 0 14px;
            font-size: 38px;
            line-height: 1.2;
        }

        .info-box p {
            color: #eef2f7;
            line-height: 1.8;
            margin-bottom: 22px;
        }

        .ticket-box {
            background: rgba(255,255,255,0.14);
            border: 1px solid rgba(255,255,255,0.20);
            border-radius: 18px;
            padding: 22px;
        }

        .ticket-box small {
            display: block;
            color: #e5e7eb;
            margin-bottom: 6px;
        }

        .ticket-number {
            color: #f2b705;
            font-size: 54px;
            font-weight: bold;
            margin-bottom: 14px;
        }

        .ticket-detail {
            display: grid;
            gap: 10px;
            color: #eef2f7;
        }

        .form-card {
            background: white;
            border-radius: 24px;
            padding: 34px;
            box-shadow: 0 12px 28px rgba(0,0,0,0.10);
        }

        .form-card h2 {
            color: #0f3b63;
            margin: 0 0 10px;
            font-size: 32px;
        }

        .form-card p {
            color: #4b5563;
            line-height: 1.7;
            margin-top: 0;
        }

        .success-box {
            background: #e8f7ef;
            color: #147d43;
            border-radius: 14px;
            padding: 16px;
            line-height: 1.7;
            margin-bottom: 20px;
            font-weight: bold;
        }

        .error-box {
            background: #ffe8e8;
            color: #b42318;
            border: 1px solid #ffbdbd;
            padding: 14px;
            border-radius: 12px;
            margin-bottom: 18px;
            line-height: 1.6;
        }

        .rating-options {
            display: grid;
            grid-template-columns: repeat(5, 1fr);
            gap: 12px;
            margin: 24px 0;
        }

        .rating-options input {
            display: none;
        }

        .rating-options label {
            background: #f8fafc;
            border: 2px solid #e5edf5;
            border-radius: 16px;
            padding: 18px 8px;
            text-align: center;
            cursor: pointer;
            transition: 0.25s;
            font-weight: bold;
            color: #0f3b63;
        }

        .rating-options label span {
            display: block;
            font-size: 30px;
            margin-bottom: 8px;
        }

        .rating-options input:checked + label {
            background: #fff7df;
            border-color: #f2b705;
            transform: translateY(-4px);
            box-shadow: 0 10px 22px rgba(242,183,5,0.20);
        }

        .form-group {
            margin-bottom: 18px;
        }

        label.form-label {
            display: block;
            color: #0f3b63;
            font-weight: bold;
            margin-bottom: 8px;
        }

        textarea {
            width: 100%;
            min-height: 130px;
            padding: 14px 15px;
            border-radius: 10px;
            border: 1px solid #d1d9e6;
            font-size: 15px;
            outline: none;
            font-family: Arial, sans-serif;
            resize: vertical;
        }

        textarea:focus {
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
            margin-left: 8px;
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

            .page {
                grid-template-columns: 1fr;
                padding: 35px 24px;
            }

            .rating-options {
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

        <div>
            <a href="/">Beranda</a>
            <a href="{{ route('antrian.create') }}">Ambil Antrian</a>
            <a href="{{ route('antrian.cek', ['nomor' => $antrian->nomor_antrian]) }}">Cek Status</a>
        </div>
    </div>

    <div class="page">
        <div class="info-box">
            <h1>Penilaian Masyarakat</h1>
            <p>
                Terima kasih telah menggunakan layanan E-Antri Kecamatan Limbangan.
                Penilaian Anda membantu petugas meningkatkan kualitas pelayanan publik.
            </p>

            <div class="ticket-box">
                <small>Nomor Antrian</small>
                <div class="ticket-number">{{ $antrian->nomor_antrian }}</div>

                <div class="ticket-detail">
                    <div><strong>Nama:</strong> {{ $antrian->nama }}</div>
                    <div><strong>Layanan:</strong> {{ $antrian->layanan->nama_layanan }}</div>
                    <div><strong>Status:</strong> {{ $antrian->status }}</div>
                </div>
            </div>
        </div>

        <div class="form-card">
            @if ($antrian->penilaian)
                <h2>Penilaian Sudah Dikirim</h2>

                <div class="success-box">
                    Nomor antrian ini sudah memberikan penilaian.
                    Rating: {{ $antrian->penilaian->rating }} dari 5.
                </div>

                <a href="{{ route('antrian.cek', ['nomor' => $antrian->nomor_antrian]) }}" class="btn btn-primary">
                    Kembali ke Cek Status
                </a>
            @else
                <h2>Beri Penilaian</h2>
                <p>
                    Pilih rating pelayanan dan tuliskan saran atau komentar Anda.
                </p>

                @if ($errors->any())
                    <div class="error-box">
                        @foreach ($errors->all() as $error)
                            <div>{{ $error }}</div>
                        @endforeach
                    </div>
                @endif

                <form method="POST" action="{{ route('penilaian.store', $antrian->id) }}">
                    @csrf

                    <div class="rating-options">
                        <input type="radio" name="rating" id="rating1" value="1" {{ old('rating') == 1 ? 'checked' : '' }}>
                        <label for="rating1">
                            <span>⭐</span>
                            1
                        </label>

                        <input type="radio" name="rating" id="rating2" value="2" {{ old('rating') == 2 ? 'checked' : '' }}>
                        <label for="rating2">
                            <span>⭐⭐</span>
                            2
                        </label>

                        <input type="radio" name="rating" id="rating3" value="3" {{ old('rating') == 3 ? 'checked' : '' }}>
                        <label for="rating3">
                            <span>⭐⭐⭐</span>
                            3
                        </label>

                        <input type="radio" name="rating" id="rating4" value="4" {{ old('rating') == 4 ? 'checked' : '' }}>
                        <label for="rating4">
                            <span>⭐⭐⭐⭐</span>
                            4
                        </label>

                        <input type="radio" name="rating" id="rating5" value="5" {{ old('rating') == 5 ? 'checked' : '' }}>
                        <label for="rating5">
                            <span>⭐⭐⭐⭐⭐</span>
                            5
                        </label>
                    </div>

                    <div class="form-group">
                        <label class="form-label">Komentar atau Saran</label>
                        <textarea name="komentar" placeholder="Contoh: Pelayanan cepat dan petugas ramah.">{{ old('komentar') }}</textarea>
                    </div>

                    <button type="submit" class="btn btn-primary">Kirim Penilaian</button>
                    <a href="{{ route('antrian.cek', ['nomor' => $antrian->nomor_antrian]) }}" class="btn btn-secondary">Kembali</a>
                </form>
            @endif
        </div>
    </div>

</body>
</html>