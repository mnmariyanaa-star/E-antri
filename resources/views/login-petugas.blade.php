<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Login Petugas - E-Antri</title>
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
        }

        .brand { display: flex; align-items: center; gap: 12px; }

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
        }

        .navbar a:hover {
            color: #f2b705;
        }

        .login-page {
            min-height: calc(100vh - 77px);
            display: grid;
            grid-template-columns: 1fr 1fr;
            background:
                linear-gradient(90deg, rgba(15,59,99,0.93), rgba(15,59,99,0.68)),
                url('https://images.unsplash.com/photo-1551836022-d5d88e9218df?auto=format&fit=crop&w=1600&q=80');
            background-size: cover;
            background-position: center;
        }

        .left-panel {
            color: white;
            padding: 80px 70px;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        .badge {
            width: fit-content;
            background: #f2b705;
            color: #0f3b63;
            padding: 9px 16px;
            border-radius: 30px;
            font-weight: bold;
            margin-bottom: 20px;
        }

        .left-panel h1 {
            font-size: 48px;
            margin: 0 0 18px;
            line-height: 1.2;
        }

        .left-panel p {
            font-size: 17px;
            line-height: 1.8;
            color: #eef2f7;
            max-width: 650px;
        }

        .right-panel {
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 60px;
        }

        .login-card {
            width: 100%;
            max-width: 460px;
            background: white;
            border-radius: 26px;
            padding: 38px;
            box-shadow: 0 20px 45px rgba(0,0,0,0.22);
        }

        .login-card h2 {
            color: #0f3b63;
            margin: 0 0 10px;
            font-size: 32px;
        }

        .login-card p {
            color: #5b6572;
            line-height: 1.6;
            margin-top: 0;
            margin-bottom: 26px;
        }

        .alert {
            background: #ffe8e8;
            color: #b42318;
            border: 1px solid #ffbdbd;
            padding: 13px 15px;
            border-radius: 12px;
            margin-bottom: 18px;
            font-weight: bold;
        }

        .form-group { margin-bottom: 18px; }

        label {
            display: block;
            color: #0f3b63;
            font-weight: bold;
            margin-bottom: 8px;
        }

        input {
            width: 100%;
            padding: 14px 15px;
            border: 1px solid #d1d9e6;
            border-radius: 11px;
            font-size: 15px;
            outline: none;
        }

        input:focus {
            border-color: #0f3b63;
            box-shadow: 0 0 0 3px rgba(15,59,99,0.10);
        }

        .btn {
            display: inline-block;
            width: 100%;
            border: none;
            padding: 15px 24px;
            border-radius: 11px;
            font-weight: bold;
            cursor: pointer;
            text-decoration: none;
            text-align: center;
            font-size: 15px;
            font-family: Arial, sans-serif;
        }

        .btn-primary {
            background: #f2b705;
            color: #0f3b63;
            margin-top: 8px;
        }

        .btn-secondary {
            background: #eef2f7;
            color: #0f3b63;
            margin-top: 12px;
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

            .login-page {
                grid-template-columns: 1fr;
            }

            .left-panel {
                padding: 50px 24px;
            }

            .left-panel h1 {
                font-size: 36px;
            }

            .right-panel {
                padding: 35px 24px;
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
            <a href="{{ route('antrian.cek') }}">Cek Status</a>
        </div>
    </div>

    <div class="login-page">
        <div class="left-panel">
            <div class="badge">Akses Khusus Petugas</div>
            <h1>Kelola Antrian Pelayanan dengan Mudah</h1>
            <p>
                Login ini digunakan oleh petugas untuk memantau data antrian,
                memanggil nomor berikutnya, memperbarui status pelayanan masyarakat,
                serta melihat rekap antrian dan penilaian masyarakat.
            </p>
        </div>

        <div class="right-panel">
            <div class="login-card">
                <h2>Login Petugas</h2>
                <p>Masukkan username dan password petugas untuk masuk ke dashboard E-Antri.</p>

                @if (session('error'))
                    <div class="alert">{{ session('error') }}</div>
                @endif

                <form method="POST" action="{{ route('petugas.prosesLogin') }}">
                    @csrf

                    <div class="form-group">
                        <label>Username</label>
                        <input type="text" name="username" placeholder="Masukkan username" required>
                    </div>

                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" name="password" placeholder="Masukkan password" required>
                    </div>

                    <button type="submit" class="btn btn-primary">Masuk Dashboard</button>
                    <a href="/" class="btn btn-secondary">Kembali ke Beranda</a>
                </form>
            </div>
        </div>
    </div>

</body>
</html>