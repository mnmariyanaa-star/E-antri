<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-Antri | Kecamatan Limbangan Garut</title>

    <style>
        * {
            box-sizing: border-box;
        }

        html {
            scroll-behavior: smooth;
        }

        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background: #f4f7fb;
            color: #102033;
        }

        .navbar {
            width: 100%;
            background: #0f3b63;
            color: white;
            padding: 14px 72px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            position: sticky;
            top: 0;
            z-index: 9999;
            box-shadow: 0 4px 14px rgba(0,0,0,0.16);
        }

        .brand {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .logo {
            width: 48px;
            height: 48px;
            border-radius: 50%;
            background: #f2b705;
            color: #0f3b63;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: bold;
            font-size: 17px;
        }

        .brand-text h2 {
            margin: 0;
            font-size: 25px;
            line-height: 1.1;
        }

        .brand-text small {
            color: #e5e7eb;
            font-size: 12px;
        }

        .menu {
            display: flex;
            align-items: center;
            gap: 20px;
        }

        .menu a {
            color: white;
            text-decoration: none;
            font-weight: bold;
            font-size: 15px;
        }

        .menu a:hover {
            color: #f2b705;
        }

        .dropbtn {
            background: none;
            border: none;
            color: white;
            font-weight: bold;
            font-size: 15px;
            cursor: pointer;
            padding: 0;
        }

        .dropbtn:hover {
            color: #f2b705;
        }

        .dropdown {
            position: relative;
        }

        .dropdown-content {
            display: none;
            position: absolute;
            top: 35px;
            right: 0;
            min-width: 245px;
            background: white;
            border-radius: 10px;
            box-shadow: 0 12px 26px rgba(0,0,0,0.18);
            overflow: hidden;
            z-index: 10000;
        }

        .dropdown-content.show {
            display: block;
        }

        .dropdown-content a {
            color: #0f3b63;
            display: block;
            padding: 14px 16px;
            border-bottom: 1px solid #eef2f7;
            font-size: 14px;
            text-decoration: none;
        }

        .dropdown-content a:hover {
            background: #f4f7fb;
            color: #0f3b63;
        }

        .info-strip {
            background: #f2b705;
            color: #0f3b63;
            font-weight: bold;
            padding: 10px 0;
            overflow: hidden;
            white-space: nowrap;
            position: relative;
            z-index: 50;
        }

        .info-strip span {
            display: inline-block;
            padding-left: 100%;
            animation: runningText 22s linear infinite;
        }

        @keyframes runningText {
            from { transform: translateX(0); }
            to { transform: translateX(-100%); }
        }

        .hero {
            position: relative;
            min-height: 560px;
            overflow: hidden;
            color: white;
        }

        .hero-slide {
            position: absolute;
            inset: 0;
            opacity: 0;
            transition: opacity 1s ease;
            background-size: cover;
            background-position: center;
        }

        .hero-slide.active {
            opacity: 1;
        }

        .hero-slide::before {
            content: "";
            position: absolute;
            inset: 0;
            background: linear-gradient(90deg, rgba(15,59,99,0.94), rgba(15,59,99,0.80), rgba(15,59,99,0.58));
        }

        .slide-1 {
            background-image: url('https://images.unsplash.com/photo-1573164713988-8665fc963095?auto=format&fit=crop&w=1600&q=80');
        }

        .slide-2 {
            background-image: url('https://images.unsplash.com/photo-1584515933487-779824d29309?auto=format&fit=crop&w=1600&q=80');
        }

        .slide-3 {
            background-image: url('https://images.unsplash.com/photo-1554224155-8d04cb21cd6c?auto=format&fit=crop&w=1600&q=80');
        }

        .slide-4 {
            background-image: url('https://images.unsplash.com/photo-1551836022-d5d88e9218df?auto=format&fit=crop&w=1600&q=80');
        }

        .hero-content {
            position: relative;
            z-index: 10;
            min-height: 560px;
            padding: 76px 72px;
            display: grid;
            grid-template-columns: 1.05fr 0.95fr;
            align-items: center;
            gap: 42px;
        }

        .tag {
            display: inline-block;
            background: rgba(242,183,5,0.96);
            color: #0f3b63;
            padding: 9px 15px;
            border-radius: 30px;
            font-weight: bold;
            margin-bottom: 18px;
            font-size: 14px;
        }

        .hero-text h1 {
            font-size: 52px;
            line-height: 1.2;
            margin: 0 0 18px;
        }

        .hero-text p {
            font-size: 18px;
            line-height: 1.8;
            color: #eef2f7;
            margin: 0;
        }

        .btn-group {
            margin-top: 30px;
        }

        .btn {
            display: inline-block;
            padding: 15px 26px;
            border-radius: 9px;
            text-decoration: none;
            font-weight: bold;
            margin-right: 12px;
            transition: 0.25s;
            border: none;
            cursor: pointer;
        }

        .btn:hover {
            transform: translateY(-3px);
        }

        .btn-primary {
            background: #f2b705;
            color: #0f3b63;
        }

        .btn-secondary {
            background: white;
            color: #0f3b63;
        }

        .queue-card {
            background: rgba(255,255,255,0.97);
            color: #102033;
            border-radius: 24px;
            padding: 30px;
            box-shadow: 0 20px 40px rgba(0,0,0,0.24);
        }

        .queue-top {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            gap: 18px;
            margin-bottom: 20px;
        }

        .queue-top h3 {
            color: #0f3b63;
            margin: 0;
            font-size: 24px;
        }

        .clock-box {
            background: #eef6ff;
            color: #0f3b63;
            padding: 10px 14px;
            border-radius: 14px;
            text-align: right;
            min-width: 115px;
        }

        .clock-box strong {
            display: block;
            font-size: 18px;
        }

        .clock-box small {
            font-size: 12px;
            color: #5b6572;
        }

        .queue-main {
            background: #f8fafc;
            border: 1px solid #e5edf5;
            border-radius: 18px;
            padding: 22px;
            margin-bottom: 18px;
        }

        .queue-label {
            color: #5b6572;
            margin: 0 0 8px;
            font-weight: bold;
        }

        .queue-number {
            font-size: 62px;
            font-weight: bold;
            color: #f2b705;
            margin: 0;
            line-height: 1;
        }

        .status {
            background: #e8f7ef;
            color: #147d43;
            padding: 9px 16px;
            border-radius: 30px;
            font-weight: bold;
            display: inline-block;
            font-size: 14px;
            margin-top: 12px;
        }

        .queue-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 12px;
            margin-bottom: 18px;
        }

        .mini-card {
            background: #f8fafc;
            border: 1px solid #e5edf5;
            border-radius: 16px;
            padding: 14px;
            text-align: center;
        }

        .mini-card small {
            color: #6b7280;
            display: block;
            margin-bottom: 6px;
        }

        .mini-card strong {
            color: #0f3b63;
            font-size: 19px;
        }

        .queue-note {
            color: #4b5563;
            line-height: 1.6;
            margin: 0 0 18px;
        }

        .queue-actions {
            display: flex;
            gap: 10px;
            flex-wrap: wrap;
        }

        .slider-control {
            position: absolute;
            z-index: 20;
            bottom: 24px;
            left: 72px;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .dot {
            width: 12px;
            height: 12px;
            border-radius: 50%;
            border: none;
            background: rgba(255,255,255,0.6);
            cursor: pointer;
        }

        .dot.active {
            background: #f2b705;
            width: 28px;
            border-radius: 20px;
        }

        .arrow {
            position: absolute;
            z-index: 20;
            top: 50%;
            transform: translateY(-50%);
            background: rgba(255,255,255,0.85);
            color: #0f3b63;
            border: none;
            width: 42px;
            height: 42px;
            border-radius: 50%;
            font-size: 22px;
            cursor: pointer;
            font-weight: bold;
        }

        .arrow.left {
            left: 22px;
        }

        .arrow.right {
            right: 22px;
        }

        .section {
            padding: 72px;
        }

        .section-title {
            text-align: center;
            margin-bottom: 40px;
        }

        .section-title h2 {
            color: #0f3b63;
            font-size: 36px;
            margin: 0 0 10px;
        }

        .section-title p {
            color: #606a78;
            margin: 0;
            font-size: 16px;
        }

        .grid-4 {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 24px;
        }

        .service-link {
            text-decoration: none;
            color: inherit;
            display: block;
        }

        .card {
            background: white;
            border-radius: 18px;
            padding: 28px;
            min-height: 245px;
            box-shadow: 0 10px 26px rgba(0,0,0,0.07);
            transition: 0.25s;
            cursor: pointer;
        }

        .card:hover {
            transform: translateY(-7px);
            box-shadow: 0 16px 34px rgba(0,0,0,0.13);
        }

        .icon {
            width: 58px;
            height: 58px;
            border-radius: 16px;
            background: #eef6ff;
            color: #0f3b63;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 26px;
            margin-bottom: 18px;
        }

        .card h3 {
            color: #0f3b63;
            margin: 0 0 14px;
            font-size: 20px;
        }

        .card p {
            color: #4b5563;
            line-height: 1.7;
            margin: 0;
        }

        .profil {
            display: grid;
            grid-template-columns: 0.95fr 1.05fr;
            gap: 38px;
            align-items: stretch;
        }

        .profil-box {
            background: #0f3b63;
            color: white;
            border-radius: 24px;
            padding: 40px;
        }

        .profil-box h2 {
            font-size: 35px;
            margin: 0 0 18px;
        }

        .profil-box p {
            color: #eef2f7;
            line-height: 1.8;
            margin-bottom: 16px;
        }

        .profil-list {
            display: grid;
            gap: 16px;
        }

        .profil-item {
            background: white;
            padding: 24px;
            border-radius: 18px;
            box-shadow: 0 10px 25px rgba(0,0,0,0.06);
        }

        .profil-item h3 {
            margin: 0 0 9px;
            color: #0f3b63;
        }

        .profil-item p {
            margin: 0;
            color: #4b5563;
            line-height: 1.7;
        }

        .map-section {
            margin-top: 26px;
            display: grid;
            grid-template-columns: 0.85fr 1.15fr;
            gap: 28px;
            align-items: stretch;
        }

        .map-info {
            background: white;
            border-radius: 24px;
            padding: 30px;
            box-shadow: 0 12px 28px rgba(0,0,0,0.08);
        }

        .map-info h3 {
            color: #0f3b63;
            font-size: 26px;
            margin: 0 0 14px;
        }

        .map-info p {
            color: #4b5563;
            line-height: 1.8;
            margin: 0 0 16px;
        }

        .map-list {
            display: grid;
            gap: 12px;
            margin-top: 20px;
        }

        .map-list div {
            background: #f8fafc;
            border: 1px solid #e5edf5;
            border-radius: 14px;
            padding: 14px;
            color: #0f3b63;
            font-weight: bold;
        }

        .map-box {
            background: white;
            border-radius: 24px;
            padding: 14px;
            box-shadow: 0 12px 28px rgba(0,0,0,0.08);
            min-height: 420px;
            overflow: hidden;
        }

        .map-box iframe {
            width: 100%;
            height: 100%;
            min-height: 420px;
            border: none;
            border-radius: 18px;
        }

        .announcement-wrap {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 24px;
        }

        .announcement {
            min-height: 210px;
            border-left: 6px solid #f2b705;
        }

        .announcement small {
            color: #6b7280;
            font-weight: bold;
        }

        .steps {
            display: grid;
            grid-template-columns: repeat(5, 1fr);
            gap: 18px;
        }

        .step {
            background: white;
            border-radius: 18px;
            padding: 24px;
            text-align: center;
            box-shadow: 0 10px 25px rgba(0,0,0,0.06);
        }

        .step-number {
            width: 44px;
            height: 44px;
            border-radius: 50%;
            background: #f2b705;
            color: #0f3b63;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: bold;
            margin: 0 auto 14px;
        }

        .step p {
            color: #4b5563;
            margin: 0;
            line-height: 1.6;
        }

        .footer {
            background: #0f3b63;
            color: white;
            padding: 44px 72px;
            display: grid;
            grid-template-columns: 1.2fr 0.8fr 0.8fr;
            gap: 34px;
        }

        .footer h3 {
            color: #f2b705;
            margin: 0 0 14px;
        }

        .footer p,
        .footer a {
            color: #e5e7eb;
            text-decoration: none;
            line-height: 1.8;
            margin: 4px 0;
        }

        .copyright {
            background: #092940;
            color: white;
            text-align: center;
            padding: 16px;
        }

        @media (max-width: 1000px) {
            .navbar {
                padding: 14px 24px;
                flex-direction: column;
                align-items: flex-start;
                gap: 14px;
            }

            .menu {
                flex-wrap: wrap;
                gap: 16px;
            }

            .hero-content {
                grid-template-columns: 1fr;
                padding: 56px 28px;
            }

            .hero-text h1 {
                font-size: 36px;
            }

            .queue-grid {
                grid-template-columns: 1fr;
            }

            .section {
                padding: 55px 24px;
            }

            .grid-4,
            .profil,
            .map-section,
            .announcement-wrap,
            .steps,
            .footer {
                grid-template-columns: 1fr;
            }

            .footer {
                padding: 40px 24px;
            }

            .slider-control {
                left: 28px;
            }
        }
    </style>
</head>

<body>

    <div class="navbar">
        <div class="brand">
            <div class="logo">EA</div>
            <div class="brand-text">
                <h2>E-Antri</h2>
                <small>Kecamatan Limbangan, Garut</small>
            </div>
        </div>

        <div class="menu">
            <a href="/">Beranda</a>

            <div class="dropdown">
                <button class="dropbtn" onclick="toggleDropdown('profilDropdown')">Profil ▾</button>
                <div class="dropdown-content" id="profilDropdown">
                    <a href="#profil">Tentang Kami</a>
                    <a href="#sejarah">Sejarah Singkat</a>
                    <a href="#wilayah">Wilayah Pelayanan</a>
                    <a href="#peta">Peta Wilayah</a>
                </div>
            </div>

            <div class="dropdown">
                <button class="dropbtn" onclick="toggleDropdown('layananDropdown')">Layanan ▾</button>
                <div class="dropdown-content" id="layananDropdown">
                    <a href="/ambil-antrian?layanan=ktp">Pembuatan KTP</a>
                    <a href="/ambil-antrian?layanan=kk">Kartu Keluarga</a>
                    <a href="/ambil-antrian?layanan=domisili">Surat Domisili</a>
                    <a href="/ambil-antrian?layanan=perizinan">Perizinan</a>
                </div>
            </div>

            <a href="/cek-antrian">Cek Status</a>

            <div class="dropdown">
                <button class="dropbtn" onclick="toggleDropdown('penilaianDropdown')">Penilaian ▾</button>
                <div class="dropdown-content" id="penilaianDropdown">
                    <a href="{{ route('penilaian.index') }}">Lihat Penilaian Masyarakat</a>
                    <a href="{{ route('antrian.cek') }}">Beri Penilaian</a>
                </div>
            </div>

            <a href="#panduan">Panduan</a>
            <a href="#pengumuman">Pengumuman</a>
            <a href="/login-petugas">Login Petugas</a>
        </div>
    </div>

    <div class="info-strip">
        <span>
            Informasi: Pelayanan administrasi Kecamatan Limbangan dibuka Senin–Jumat pukul 08.00–15.00 WIB. Warga dapat mengambil nomor antrian tanpa login melalui menu Ambil Antrian.
        </span>
    </div>

    <section class="hero">
        <div class="hero-slide slide-1 active"></div>
        <div class="hero-slide slide-2"></div>
        <div class="hero-slide slide-3"></div>
        <div class="hero-slide slide-4"></div>

        <button class="arrow left" onclick="prevSlide()">‹</button>
        <button class="arrow right" onclick="nextSlide()">›</button>

        <div class="hero-content">
            <div class="hero-text">
                <div class="tag" id="slideTag">Layanan Administrasi Online</div>

                <h1 id="slideTitle">
                    Pelayanan Antrian Online Kecamatan Limbangan
                </h1>

                <p id="slideDesc">
                    E-Antri membantu masyarakat Kecamatan Limbangan, Kabupaten Garut mengambil nomor antrian layanan administrasi secara online, mulai dari layanan KTP, Kartu Keluarga, surat keterangan, hingga perizinan.
                </p>

                <div class="btn-group">
                    <a href="/ambil-antrian" class="btn btn-primary">Ambil Antrian</a>
                    <a href="/cek-antrian" class="btn btn-secondary">Cek Status Antrian</a>
                </div>
            </div>

            <div class="queue-card">
                <div class="queue-top">
                    <div>
                        <h3>Antrian Pelayanan Hari Ini</h3>
                        <p style="margin: 7px 0 0; color:#5b6572;">Loket Pelayanan Administrasi</p>
                    </div>

                    <div class="clock-box">
                        <strong id="jamRealtime">00:00</strong>
                        <small id="tanggalRealtime">Hari ini</small>
                    </div>
                </div>

                <div class="queue-main">
                    <p class="queue-label">Sedang Dipanggil</p>
                    <p class="queue-number">A-001</p>
                    <span class="status">Sedang Berjalan</span>
                </div>

                <div class="queue-grid">
                    <div class="mini-card">
                        <small>Berikutnya</small>
                        <strong>A-002</strong>
                    </div>

                    <div class="mini-card">
                        <small>Menunggu</small>
                        <strong>12</strong>
                    </div>

                    <div class="mini-card">
                        <small>Selesai</small>
                        <strong>8</strong>
                    </div>
                </div>

                <p class="queue-note">
                    Warga tidak perlu login. Silakan klik Ambil Antrian, isi data diri, lalu simpan nomor antrian yang diperoleh.
                </p>

                <div class="queue-actions">
                    <a href="/ambil-antrian" class="btn btn-primary">Ambil Nomor</a>
                    <a href="/cek-antrian" class="btn btn-secondary">Cek Nomor</a>
                </div>
            </div>
        </div>

        <div class="slider-control">
            <button class="dot active" onclick="goToSlide(0)"></button>
            <button class="dot" onclick="goToSlide(1)"></button>
            <button class="dot" onclick="goToSlide(2)"></button>
            <button class="dot" onclick="goToSlide(3)"></button>
        </div>
    </section>

    <section class="section" id="layanan">
        <div class="section-title">
            <h2>Layanan Tersedia</h2>
            <p>Pilih layanan sesuai kebutuhan administrasi masyarakat.</p>
        </div>

        <div class="grid-4">
            <a href="/ambil-antrian?layanan=ktp" class="service-link">
                <div class="card">
                    <div class="icon">🪪</div>
                    <h3>Pembuatan KTP</h3>
                    <p>Layanan perekaman, perubahan data, dan pengurusan KTP elektronik bagi masyarakat Kecamatan Limbangan.</p>
                </div>
            </a>

            <a href="/ambil-antrian?layanan=kk" class="service-link">
                <div class="card">
                    <div class="icon">👨‍👩‍👧</div>
                    <h3>Kartu Keluarga</h3>
                    <p>Layanan perubahan data keluarga, penambahan anggota keluarga, dan penerbitan dokumen KK.</p>
                </div>
            </a>

            <a href="/ambil-antrian?layanan=domisili" class="service-link">
                <div class="card">
                    <div class="icon">📄</div>
                    <h3>Surat Domisili</h3>
                    <p>Layanan pengajuan surat keterangan domisili dan surat pengantar administrasi lainnya.</p>
                </div>
            </a>

            <a href="/ambil-antrian?layanan=perizinan" class="service-link">
                <div class="card">
                    <div class="icon">🏢</div>
                    <h3>Perizinan</h3>
                    <p>Layanan konsultasi dan pengajuan administrasi perizinan sesuai kebutuhan masyarakat.</p>
                </div>
            </a>
        </div>
    </section>

    <section class="section" id="profil">
        <div class="profil">
            <div class="profil-box">
                <h2>Tentang E-Antri Limbangan</h2>
                <p>
                    E-Antri Limbangan merupakan website layanan antrian online yang dirancang untuk membantu masyarakat mengambil nomor antrian sebelum datang ke kantor pelayanan.
                </p>
                <p>
                    Sistem ini mendukung pelayanan publik yang lebih tertib, transparan, dan efisien, sehingga masyarakat dapat menyesuaikan waktu kedatangan sesuai nomor antrian yang diperoleh.
                </p>
            </div>

            <div class="profil-list">
                <div class="profil-item" id="sejarah">
                    <h3>Sejarah Singkat</h3>
                    <p>
                        Kecamatan Limbangan merupakan salah satu wilayah di Kabupaten Garut yang memiliki aktivitas masyarakat cukup padat, sehingga pelayanan administrasi membutuhkan sistem antrian yang tertata.
                    </p>
                </div>

                <div class="profil-item">
                    <h3>Tujuan Website</h3>
                    <p>
                        Mempermudah pengambilan nomor antrian, mengurangi penumpukan masyarakat, dan membantu petugas dalam mengatur pelayanan harian.
                    </p>
                </div>

                <div class="profil-item" id="wilayah">
                    <h3>Wilayah Pelayanan</h3>
                    <p>
                        Website ini ditujukan untuk masyarakat di wilayah Kecamatan Limbangan, Kabupaten Garut, dan dapat disesuaikan untuk kelurahan atau unit pelayanan lainnya.
                    </p>
                </div>
            </div>
        </div>

        <div class="map-section" id="peta">
            <div class="map-info">
                <h3>Peta Wilayah Limbangan</h3>
                <p>
                    Peta ini membantu masyarakat mengetahui lokasi wilayah pelayanan Kecamatan Limbangan, Kabupaten Garut.
                    Peta dapat digunakan untuk melihat gambaran lokasi kantor pelayanan dan wilayah sekitar.
                </p>

                <div class="map-list">
                    <div>📍 Wilayah: Kecamatan Limbangan</div>
                    <div>🏛 Kabupaten: Garut</div>
                    <div>🗺 Provinsi: Jawa Barat</div>
                    <div>🧾 Layanan: Administrasi masyarakat dan antrian pelayanan</div>
                </div>
            </div>

            <div class="map-box">
                <iframe
                    src="https://www.google.com/maps?q=Kecamatan%20Limbangan%2C%20Garut%2C%20Jawa%20Barat&output=embed"
                    loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade">
                </iframe>
            </div>
        </div>
    </section>

    <section class="section" id="pengumuman">
        <div class="section-title">
            <h2>Informasi Masyarakat</h2>
            <p>Pengumuman dan informasi layanan publik terbaru.</p>
        </div>

        <div class="announcement-wrap">
            <div class="card announcement">
                <small>Info Pelayanan</small>
                <h3>Jam Pelayanan</h3>
                <p>Pelayanan administrasi dibuka setiap Senin sampai Jumat pukul 08.00–15.00 WIB.</p>
            </div>

            <div class="card announcement">
                <small>Info Kesehatan</small>
                <h3>Jaga Kebersihan Area Pelayanan</h3>
                <p>Masyarakat diimbau menjaga kebersihan, membuang sampah pada tempatnya, dan menjaga ketertiban saat berada di kantor pelayanan.</p>
            </div>

            <div class="card announcement">
                <small>Info Dokumen</small>
                <h3>Siapkan Berkas Sebelum Datang</h3>
                <p>Pastikan membawa KTP, KK, dan dokumen pendukung sesuai jenis layanan yang dipilih.</p>
            </div>
        </div>
    </section>

    <section class="section" id="panduan">
        <div class="section-title">
            <h2>Panduan Penggunaan</h2>
            <p>Warga dapat mengambil nomor antrian tanpa login.</p>
        </div>

        <div class="steps">
            <div class="step">
                <div class="step-number">1</div>
                <p>Buka website E-Antri.</p>
            </div>

            <div class="step">
                <div class="step-number">2</div>
                <p>Klik menu Ambil Antrian.</p>
            </div>

            <div class="step">
                <div class="step-number">3</div>
                <p>Pilih jenis layanan yang dibutuhkan.</p>
            </div>

            <div class="step">
                <div class="step-number">4</div>
                <p>Isi data diri dengan benar.</p>
            </div>

            <div class="step">
                <div class="step-number">5</div>
                <p>Simpan nomor antrian dan datang sesuai jadwal.</p>
            </div>
        </div>
    </section>

    <footer class="footer">
        <div>
            <h3>E-Antri Kecamatan Limbangan</h3>
            <p>
                Sistem antrian online untuk mendukung pelayanan publik yang cepat, tertib, dan mudah digunakan oleh masyarakat.
            </p>
        </div>

        <div>
            <h3>Menu</h3>
            <p><a href="/">Beranda</a></p>
            <p><a href="#profil">Profil</a></p>
            <p><a href="#layanan">Layanan</a></p>
            <p><a href="/cek-antrian">Cek Status</a></p>
            <p><a href="{{ route('penilaian.index') }}">Penilaian</a></p>
            <p><a href="#panduan">Panduan</a></p>
        </div>

        <div>
            <h3>Kontak</h3>
            <p>Kecamatan Limbangan</p>
            <p>Kabupaten Garut, Jawa Barat</p>
            <p>Email: pelayanan@limbangan.go.id</p>
        </div>
    </footer>

    <div class="copyright">
        © 2026 E-Antri Kecamatan Limbangan. All Rights Reserved.
    </div>

    <script>
        function toggleDropdown(id) {
            const dropdowns = document.querySelectorAll('.dropdown-content');

            dropdowns.forEach(function(dropdown) {
                if (dropdown.id !== id) {
                    dropdown.classList.remove('show');
                }
            });

            document.getElementById(id).classList.toggle('show');
        }

        window.addEventListener('click', function(event) {
            if (!event.target.matches('.dropbtn')) {
                const dropdowns = document.querySelectorAll('.dropdown-content');
                dropdowns.forEach(function(dropdown) {
                    dropdown.classList.remove('show');
                });
            }
        });

        const slides = document.querySelectorAll('.hero-slide');
        const dots = document.querySelectorAll('.dot');

        const slideText = [
            {
                tag: 'Layanan Administrasi Online',
                title: 'Pelayanan Antrian Online Kecamatan Limbangan',
                desc: 'E-Antri membantu masyarakat Kecamatan Limbangan, Kabupaten Garut mengambil nomor antrian layanan administrasi secara online, mulai dari layanan KTP, Kartu Keluarga, surat keterangan, hingga perizinan.'
            },
            {
                tag: 'Informasi Kesehatan Masyarakat',
                title: 'Datang Lebih Tertib, Pelayanan Lebih Nyaman',
                desc: 'Masyarakat diimbau menjaga kebersihan, menggunakan fasilitas pelayanan dengan tertib, serta menyiapkan dokumen sebelum datang ke kantor pelayanan.'
            },
            {
                tag: 'Siapkan Dokumen Sebelum Mengurus Layanan',
                title: 'Urus KTP, KK, dan Surat Keterangan Lebih Mudah',
                desc: 'Pastikan membawa dokumen pendukung seperti KTP, Kartu Keluarga, dan berkas lainnya sesuai jenis layanan agar proses administrasi berjalan lebih cepat.'
            },
            {
                tag: 'Pelayanan Publik Digital',
                title: 'Ambil Nomor Antrian Tanpa Harus Datang Lebih Awal',
                desc: 'Dengan E-Antri, masyarakat dapat mengambil nomor antrian dari rumah dan datang sesuai jadwal pelayanan yang telah dipilih.'
            }
        ];

        let currentSlide = 0;

        function showSlide(index) {
            slides.forEach(function(slide) {
                slide.classList.remove('active');
            });

            dots.forEach(function(dot) {
                dot.classList.remove('active');
            });

            slides[index].classList.add('active');
            dots[index].classList.add('active');

            document.getElementById('slideTag').innerText = slideText[index].tag;
            document.getElementById('slideTitle').innerText = slideText[index].title;
            document.getElementById('slideDesc').innerText = slideText[index].desc;

            currentSlide = index;
        }

        function nextSlide() {
            let next = currentSlide + 1;

            if (next >= slides.length) {
                next = 0;
            }

            showSlide(next);
        }

        function prevSlide() {
            let prev = currentSlide - 1;

            if (prev < 0) {
                prev = slides.length - 1;
            }

            showSlide(prev);
        }

        function goToSlide(index) {
            showSlide(index);
        }

        setInterval(function() {
            nextSlide();
        }, 5000);

        function updateClock() {
            const now = new Date();

            const jam = now.toLocaleTimeString('id-ID', {
                hour: '2-digit',
                minute: '2-digit',
                second: '2-digit'
            });

            const tanggal = now.toLocaleDateString('id-ID', {
                weekday: 'long',
                day: '2-digit',
                month: 'long'
            });

            document.getElementById('jamRealtime').innerText = jam;
            document.getElementById('tanggalRealtime').innerText = tanggal;
        }

        updateClock();
        setInterval(updateClock, 1000);
    </script>

</body>
</html>