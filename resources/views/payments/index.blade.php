```blade
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pembayaran - DF-Pay</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <style>
        :root {
            --navy: #101b3c;
            --blue: #3867f4;
            --green: #20c997;
            --bg: #f3f6fc;
            --muted: #8490a8;
        }

        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            background: var(--bg);
            color: #18233f;
            font-family: 'Plus Jakarta Sans', sans-serif;
        }

        .sidebar {
            width: 250px;
            position: fixed;
            inset: 0 auto 0 0;
            z-index: 1000;
            padding: 27px 18px;
            color: white;
            background: linear-gradient(180deg, #111d40, #10172f);
        }

        .brand {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 0 10px;
            margin-bottom: 42px;
            color: white;
            text-decoration: none;
            font-size: 23px;
            font-weight: 800;
        }

        .brand-icon {
            width: 43px;
            height: 43px;
            display: grid;
            place-items: center;
            border-radius: 14px;
            color: white;
            background: linear-gradient(135deg, #4778ff, #20c997);
        }

        .menu-label {
            padding: 0 12px;
            margin: 22px 0 12px;
            color: #7886a8;
            font-size: 10px;
            font-weight: 800;
            letter-spacing: 1.5px;
        }

        .nav-link-custom {
            display: flex;
            align-items: center;
            gap: 13px;
            padding: 13px 14px;
            margin-bottom: 7px;
            border-radius: 12px;
            color: #aab5d0;
            text-decoration: none;
            font-size: 13px;
            font-weight: 600;
            transition: .2s;
        }

        .nav-link-custom i {
            font-size: 18px;
        }

        .nav-link-custom:hover {
            color: white;
            background: #202e52;
        }

        .nav-link-custom.active {
            color: white;
            background: linear-gradient(110deg, #416cf4, #5285ff);
            box-shadow: 0 8px 20px #315ce544;
        }

        .sidebar-bottom {
            position: absolute;
            right: 18px;
            bottom: 22px;
            left: 18px;
        }

        .main {
            min-height: 100vh;
            margin-left: 250px;
            padding: 30px 35px;
        }

        .topbar {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 15px;
            margin-bottom: 28px;
        }

        .page-title {
            margin: 0;
            font-size: 25px;
            font-weight: 800;
        }

        .page-subtitle {
            margin-top: 6px;
            color: var(--muted);
            font-size: 12px;
        }

        .profile {
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 8px 13px;
            border: 1px solid #e9edf5;
            border-radius: 14px;
            background: white;
        }

        .avatar {
            width: 38px;
            height: 38px;
            display: grid;
            place-items: center;
            border-radius: 12px;
            color: white;
            background: linear-gradient(135deg, #4778ff, #20c997);
            font-weight: 800;
        }

        .profile-name {
            font-size: 12px;
            font-weight: 800;
        }

        .profile-role {
            color: var(--muted);
            font-size: 10px;
        }

        .hero {
            position: relative;
            overflow: hidden;
            padding: 28px;
            margin-bottom: 25px;
            border-radius: 22px;
            color: white;
            background: linear-gradient(115deg, #315eea, #397cf7 58%, #20c997);
            box-shadow: 0 14px 30px #376af329;
        }

        .hero::after {
            content: '';
            position: absolute;
            width: 230px;
            height: 230px;
            top: -115px;
            right: -45px;
            border: 35px solid #ffffff12;
            border-radius: 50%;
        }

        .hero h2 {
            position: relative;
            z-index: 1;
            margin-bottom: 10px;
            font-size: 23px;
            font-weight: 800;
        }

        .hero p {
            position: relative;
            z-index: 1;
            max-width: 520px;
            margin: 0;
            color: #edf2ff;
            font-size: 12px;
            line-height: 1.8;
        }

        .balance-card,
        .content-card,
        .service-card,
        .info-card {
            border: 1px solid #edf0f7;
            border-radius: 19px;
            background: white;
            box-shadow: 0 5px 20px #17294d05;
        }

        .balance-card {
            padding: 23px;
            margin-bottom: 24px;
        }

        .balance-label {
            color: var(--muted);
            font-size: 12px;
            font-weight: 600;
        }

        .balance-value {
            margin: 9px 0 0;
            font-size: 27px;
            font-weight: 800;
            letter-spacing: -.7px;
        }

        .balance-icon {
            width: 50px;
            height: 50px;
            display: grid;
            place-items: center;
            border-radius: 15px;
            color: #3867f4;
            background: #edf2ff;
            font-size: 23px;
        }

        .section-title {
            margin: 0;
            font-size: 16px;
            font-weight: 800;
        }

        .section-desc {
            margin-top: 5px;
            color: var(--muted);
            font-size: 11px;
        }

        .service-grid {
            display: grid;
            grid-template-columns: repeat(4, minmax(0, 1fr));
            gap: 14px;
            margin: 20px 0 25px;
        }

        .service-card {
            padding: 20px 12px;
            text-align: center;
            cursor: pointer;
            transition: .2s;
        }

        .service-card:hover,
        .service-card.selected {
            border-color: var(--blue);
            box-shadow: 0 8px 22px #3867f41c;
            transform: translateY(-2px);
        }

        .service-icon {
            width: 54px;
            height: 54px;
            display: grid;
            place-items: center;
            margin: 0 auto 12px;
            border-radius: 17px;
            font-size: 24px;
        }

        .service-card strong {
            display: block;
            font-size: 12px;
        }

        .service-card small {
            display: block;
            margin-top: 5px;
            color: var(--muted);
            font-size: 10px;
        }

        .content-card {
            padding: 25px;
        }

        .form-label {
            margin-bottom: 8px;
            font-size: 12px;
            font-weight: 700;
        }

        .form-control,
        .form-select {
            min-height: 48px;
            border-color: #e5eaf3;
            border-radius: 11px;
            font-size: 13px;
        }

        .form-control:focus,
        .form-select:focus {
            border-color: #7798ff;
            box-shadow: 0 0 0 3px #3867f415;
        }

        .input-group-text {
            border-color: #e5eaf3;
            border-radius: 11px 0 0 11px;
            background: #f7f9fd;
            font-size: 13px;
        }

        .input-group .form-control {
            border-radius: 0 11px 11px 0;
        }

        .btn-pay {
            min-height: 49px;
            border: 0;
            border-radius: 12px;
            color: white;
            background: linear-gradient(110deg, #3867f4, #20b994);
            font-size: 13px;
            font-weight: 800;
        }

        .btn-pay:hover {
            color: white;
            opacity: .92;
        }

        .info-card {
            padding: 20px;
            margin-top: 20px;
        }

        .info-icon {
            width: 42px;
            height: 42px;
            display: grid;
            flex-shrink: 0;
            place-items: center;
            border-radius: 13px;
            color: #219c7c;
            background: #e7faf3;
            font-size: 20px;
        }

        .info-card p {
            margin: 5px 0 0;
            color: var(--muted);
            font-size: 11px;
            line-height: 1.8;
        }

        .alert {
            border: 0;
            border-radius: 12px;
            font-size: 12px;
        }

        .mobile-toggle {
            display: none;
            border: 0;
            border-radius: 10px;
            padding: 8px 12px;
            background: white;
            font-size: 20px;
        }

        @media (max-width: 1000px) {
            .sidebar {
                transform: translateX(-100%);
                transition: .25s;
            }

            .sidebar.show {
                transform: translateX(0);
            }

            .main {
                margin-left: 0;
                padding: 23px;
            }

            .mobile-toggle {
                display: inline-block;
            }

            .service-grid {
                grid-template-columns: repeat(2, minmax(0, 1fr));
            }
        }

        @media (max-width: 576px) {
            .main {
                padding: 17px;
            }

            .topbar {
                align-items: flex-start;
            }

            .page-title {
                font-size: 20px;
            }

            .profile {
                padding: 6px;
            }

            .profile-info {
                display: none;
            }

            .hero {
                padding: 23px;
            }

            .hero h2 {
                font-size: 20px;
            }

            .balance-value {
                font-size: 23px;
            }

            .content-card {
                padding: 19px;
            }
        }
    </style>
</head>
<body>

@php
    $user = auth()->user();
    $initial = strtoupper(substr($user->name ?? 'U', 0, 1));
@endphp

<aside class="sidebar" id="sidebar">
    <a href="{{ route('dashboard') }}" class="brand">
        <span class="brand-icon"><i class="bi bi-wallet2"></i></span>
        <span>DF-Pay</span>
    </a>

    <div class="menu-label">MENU UTAMA</div>

    <a href="{{ route('dashboard') }}" class="nav-link-custom">
        <i class="bi bi-grid-1x2"></i> Dashboard
    </a>

    <a href="{{ route('wallet.index') }}" class="nav-link-custom">
        <i class="bi bi-wallet2"></i> Dompet Saya
    </a>

    <a href="{{ route('transfers.create') }}" class="nav-link-custom">
        <i class="bi bi-arrow-left-right"></i> Transfer
    </a>

    <a href="{{ route('payments.index') }}" class="nav-link-custom active">
        <i class="bi bi-receipt"></i> Pembayaran
    </a>

    <a href="{{ route('transactions.index') }}" class="nav-link-custom">
        <i class="bi bi-clock-history"></i> Riwayat
    </a>

    <div class="menu-label">AKUN</div>

    <a href="{{ url('/profil') }}" class="nav-link-custom">
        <i class="bi bi-person"></i> Profil
    </a>

    <div class="sidebar-bottom">
        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit"
                class="nav-link-custom w-100 border-0"
                style="background:transparent;text-align:left;">
                <i class="bi bi-box-arrow-right"></i> Keluar
            </button>
        </form>
    </div>
</aside>

<main class="main">
    <div class="topbar">
        <div class="d-flex align-items-start gap-3">
            <button class="mobile-toggle" id="mobileToggle" type="button">
                <i class="bi bi-list"></i>
            </button>
            <div>
                <h1 class="page-title">Pembayaran</h1>
                <div class="page-subtitle">
                    Bayar berbagai kebutuhan dengan saldo demo DF-Pay.
                </div>
            </div>
        </div>

        <div class="profile">
            <div class="avatar">{{ $initial }}</div>
            <div class="profile-info">
                <div class="profile-name">{{ $user->name }}</div>
                <div class="profile-role">Pengguna DF-Pay</div>
            </div>
        </div>
    </div>

    <section class="hero">
        <h2>Semua Pembayaran, Lebih Praktis.</h2>
        <p>
            Pilih layanan yang lo butuhkan, masukkan nomor tujuan dan nominal,
            lalu lakukan pembayaran menggunakan saldo demo.
        </p>
    </section>

    @if (session('success'))
        <div class="alert alert-success mb-4">
            <i class="bi bi-check-circle-fill me-2"></i>
            {{ session('success') }}
        </div>
    @endif

    @if ($errors->any())
        <div class="alert alert-danger mb-4">
            <i class="bi bi-exclamation-circle-fill me-2"></i>
            <strong>Pembayaran belum berhasil.</strong>
            <ul class="mb-0 mt-2">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <section class="balance-card">
        <div class="d-flex align-items-center justify-content-between gap-3">
            <div>
                <div class="balance-label">
                    <i class="bi bi-wallet2 me-1"></i> Saldo Demo Tersedia
                </div>
                <div class="balance-value">
                    Rp{{ number_format($balance, 0, ',', '.') }}
                </div>
                <div class="text-secondary mt-2" style="font-size:10px;">
                    Saldo simulasi untuk mencoba fitur pembayaran.
                </div>
            </div>
            <div class="balance-icon">
                <i class="bi bi-cash-stack"></i>
            </div>
        </div>
    </section>

    <section>
        <h2 class="section-title">Pilih Layanan</h2>
        <p class="section-desc">Pilih salah satu kategori pembayaran di bawah.</p>

        <div class="service-grid">
            <div class="service-card selected" data-category="Listrik (PLN)">
                <div class="service-icon" style="color:#e5a000;background:#fff5d8;">
                    <i class="bi bi-lightning-charge-fill"></i>
                </div>
                <strong>Listrik PLN</strong>
                <small>Token / tagihan demo</small>
            </div>

            <div class="service-card" data-category="Pulsa">
                <div class="service-icon" style="color:#3867f4;background:#edf2ff;">
                    <i class="bi bi-phone-fill"></i>
                </div>
                <strong>Pulsa</strong>
                <small>Isi pulsa demo</small>
            </div>

            <div class="service-card" data-category="Internet">
                <div class="service-icon" style="color:#8a55dc;background:#f3eaff;">
                    <i class="bi bi-wifi"></i>
                </div>
                <strong>Internet</strong>
                <small>Paket / tagihan demo</small>
            </div>

            <div class="service-card" data-category="Air (PDAM)">
                <div class="service-icon" style="color:#168fce;background:#e4f6ff;">
                    <i class="bi bi-droplet-fill"></i>
                </div>
                <strong>Air PDAM</strong>
                <small>Tagihan air demo</small>
            </div>
        </div>
    </section>

    <section class="content-card">
        <h2 class="section-title">Form Pembayaran</h2>
        <p class="section-desc mb-4">
            Pastikan kategori, nomor tujuan, dan nominal sudah benar.
        </p>

        <form action="{{ route('payments.store') }}" method="POST"
              onsubmit="return confirm('Yakin ingin memproses pembayaran demo ini?');">
            @csrf

            <div class="mb-4">
                <label for="category" class="form-label">Kategori Pembayaran</label>
                <select name="category" id="category" class="form-select" required>
                    <option value="Listrik (PLN)" @selected(old('category', 'Listrik (PLN)') === 'Listrik (PLN)')>
                        Listrik (PLN)
                    </option>
                    <option value="Pulsa" @selected(old('category') === 'Pulsa')>
                        Pulsa
                    </option>
                    <option value="Internet" @selected(old('category') === 'Internet')>
                        Internet
                    </option>
                    <option value="Air (PDAM)" @selected(old('category') === 'Air (PDAM)')>
                        Air (PDAM)
                    </option>
                </select>
            </div>

            <div class="mb-4">
                <label for="customer_number" class="form-label">
                    Nomor Pelanggan / Nomor Tujuan
                </label>
                <input
                    type="text"
                    name="customer_number"
                    id="customer_number"
                    class="form-control"
                    placeholder="Contoh: 081234567890 atau nomor pelanggan"
                    value="{{ old('customer_number') }}"
                    minlength="5"
                    maxlength="30"
                    required
                >
                <div class="form-text" style="font-size:10px;">
                    Gunakan nomor contoh untuk simulasi. Tidak ada tagihan asli yang diperiksa.
                </div>
            </div>

            <div class="mb-4">
                <label for="amount" class="form-label">Nominal Pembayaran</label>
                <div class="input-group">
                    <span class="input-group-text">Rp</span>
                    <input
                        type="number"
                        name="amount"
                        id="amount"
                        class="form-control"
                        placeholder="Masukkan nominal"
                        value="{{ old('amount') }}"
                        min="1000"
                        max="10000000"
                        step="1000"
                        required
                    >
                </div>
                <div class="form-text" style="font-size:10px;">
                    Minimal Rp1.000 dan maksimal Rp10.000.000 per transaksi demo.
                </div>
            </div>

            <button type="submit" class="btn btn-pay w-100">
                <i class="bi bi-shield-check me-2"></i>
                Konfirmasi Pembayaran Demo
            </button>
        </form>
    </section>

    <section class="info-card">
        <div class="d-flex align-items-start gap-3">
            <div class="info-icon">
                <i class="bi bi-info-circle-fill"></i>
            </div>
            <div>
                <strong style="font-size:12px;">Informasi Pembayaran</strong>
                <p>
                    Fitur ini merupakan simulasi untuk project DF-Pay.
                    Jika transaksi berhasil, saldo demo akan berkurang dan
                    catatannya muncul di menu Riwayat. Fitur ini belum terhubung
                    ke PLN, operator pulsa, penyedia internet, maupun PDAM.
                </p>
            </div>
        </div>
    </section>
</main>

<script>
    const sidebar = document.getElementById('sidebar');
    const mobileToggle = document.getElementById('mobileToggle');
    const categorySelect = document.getElementById('category');
    const serviceCards = document.querySelectorAll('.service-card');

    mobileToggle.addEventListener('click', function () {
        sidebar.classList.toggle('show');
    });

    serviceCards.forEach(function (card) {
        card.addEventListener('click', function () {
            const category = card.dataset.category;

            categorySelect.value = category;

            serviceCards.forEach(function (item) {
                item.classList.remove('selected');
            });

            card.classList.add('selected');
            document.getElementById('customer_number').focus();
        });
    });

    categorySelect.addEventListener('change', function () {
        serviceCards.forEach(function (card) {
            card.classList.toggle(
                'selected',
                card.dataset.category === categorySelect.value
            );
        });
    });
</script>

</body>
</html>
```