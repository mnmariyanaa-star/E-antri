<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Ambil Antrian - E-Antri</title>
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

        .navbar a:hover { color: #f2b705; }

        .page {
            padding: 55px 70px;
            display: grid;
            grid-template-columns: 0.9fr 1.1fr;
            gap: 36px;
            align-items: start;
        }

        .info-box {
            background: #0f3b63;
            color: white;
            border-radius: 24px;
            padding: 36px;
            box-shadow: 0 12px 28px rgba(0,0,0,0.12);
        }

        .info-box h1 {
            margin-top: 0;
            font-size: 38px;
        }

        .info-box p {
            line-height: 1.8;
            color: #eef2f7;
        }

        .info-list {
            margin-top: 24px;
            display: grid;
            gap: 14px;
        }

        .info-item {
            background: rgba(255,255,255,0.13);
            padding: 15px;
            border-radius: 14px;
            font-weight: bold;
        }

        .form-card {
            background: white;
            border-radius: 24px;
            padding: 34px;
            box-shadow: 0 12px 28px rgba(0,0,0,0.10);
        }

        .form-card h2 {
            color: #0f3b63;
            margin-top: 0;
            font-size: 32px;
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

        .form-group { margin-bottom: 18px; }

        label {
            display: block;
            font-weight: bold;
            margin-bottom: 8px;
            color: #0f3b63;
        }

        input, select, textarea {
            width: 100%;
            padding: 14px 15px;
            border-radius: 10px;
            border: 1px solid #d1d9e6;
            font-size: 15px;
            outline: none;
            font-family: Arial, sans-serif;
        }

        input:focus, select:focus, textarea:focus {
            border-color: #0f3b63;
            box-shadow: 0 0 0 3px rgba(15,59,99,0.10);
        }

        textarea {
            height: 105px;
            resize: vertical;
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
            margin-left: 10px;
        }

        @media (max-width: 900px) {
            .page {
                grid-template-columns: 1fr;
                padding: 35px 24px;
            }

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
            <a href="{{ route('antrian.cek') }}">Cek Status</a>
            <a href="{{ route('petugas.login') }}">Login Petugas</a>
        </div>
    </div>

    <div class="page">
        <div class="info-box">
            <h1>Ambil Nomor Antrian</h1>
            <p>
                Warga Kecamatan Limbangan dapat mengambil nomor antrian secara online tanpa login.
                Setelah formulir dikirim, nomor antrian akan langsung muncul pada halaman cek status.
            </p>

            <div class="info-list">
                <div class="info-item">1. Pilih jenis layanan.</div>
                <div class="info-item">2. Isi nama, NIK, dan nomor HP.</div>
                <div class="info-item">3. Klik Ambil Nomor.</div>
                <div class="info-item">4. Simpan nomor antrian yang muncul.</div>
            </div>
        </div>

        <div class="form-card">
            <h2>Formulir Antrian</h2>

            @if ($errors->any())
                <div class="error-box">
                    @foreach ($errors->all() as $error)
                        <div>{{ $error }}</div>
                    @endforeach
                </div>
            @endif

            <form method="POST" action="{{ route('antrian.store') }}">
                @csrf

                <div class="form-group">
                    <label>Nama Lengkap</label>
                    <input type="text" name="nama" value="{{ old('nama') }}" placeholder="Masukkan nama lengkap" required>
                </div>

                <div class="form-group">
                    <label>NIK</label>
                    <input type="text" name="nik" value="{{ old('nik') }}" placeholder="Masukkan NIK 16 digit" maxlength="16" required>
                </div>

                <div class="form-group">
                    <label>No HP</label>
                    <input type="text" name="no_hp" value="{{ old('no_hp') }}" placeholder="Masukkan nomor HP" required>
                </div>

                <div class="form-group">
                    <label>Pilih Layanan</label>
                    <select name="layanan_id" required>
                        <option value="">-- Pilih Layanan --</option>
                        @foreach ($layanans as $layanan)
                            <option value="{{ $layanan->id }}"
                                {{ old('layanan_id', $selectedLayananId) == $layanan->id ? 'selected' : '' }}>
                                {{ $layanan->nama_layanan }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label>Keperluan</label>
                    <textarea name="keperluan" placeholder="Contoh: Mengurus perubahan data KTP" required>{{ old('keperluan') }}</textarea>
                </div>

                <button type="submit" class="btn btn-primary">Ambil Nomor</button>
                <a href="/" class="btn btn-secondary">Kembali</a>
            </form>
        </div>
    </div>

</body>
</html>