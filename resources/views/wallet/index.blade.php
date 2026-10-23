
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dompet Saya | DF-Pay</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <style>
        :root {
            --navy: #111c32;
            --blue: #1677f2;
            --green: #08b981;
            --muted: #8190a8;
            --bg: #f3f6fc;
        }

        * { box-sizing: border-box; }

        body {
            margin: 0;
            background: var(--bg);
            color: #172743;
            font-family: 'Plus Jakarta Sans', sans-serif;
        }

        a { text-decoration: none; }

        .sidebar {
            position: fixed;
            inset: 0 auto 0 0;
            width: 255px;
            padding: 30px 19px;
            background: linear-gradient(180deg, #111b30, #101a2e 75%, #0b2850);
            color: white;
            display: flex;
            flex-direction: column;
            z-index: 1000;
            transition: transform .25s;
        }

        .brand {
            display: flex;
            align-items: center;
            gap: 11px;
            padding: 0 10px;
            margin-bottom: 42px;
            color: white;
        }

        .brand-icon {
            width: 43px;
            height: 43px;
            display: grid;
            place-items: center;
            border-radius: 13px;
            background: linear-gradient(135deg, #40d8c0, #1680ff);
            font-size: 24px;
        }

        .brand-name {
            font-size: 24px;
            font-weight: 800;
            letter-spacing: -.8px;
        }

        .brand-name span { color: #20c9a2; }
        .brand small { display: block; color: #a5b6d1; font-size: 10px; }

        .nav-label {
            color: #8293b1;
            font-size: 10px;
            font-weight: 700;
            letter-spacing: 1.5px;
            padding: 0 13px;
            margin-bottom: 12px;
        }

        .side-link {
            display: flex;
            align-items: center;
            gap: 14px;
            padding: 14px 15px;
            margin-bottom: 7px;
            border-radius: 12px;
            color: #c8d3e5;
            font-size: 13px;
            font-weight: 600;
            transition: .2s;
        }

        .side-link i { font-size: 19px; }
        .side-link:hover { color: white; background: #1b2b47; }

        .side-link.active {
            color: white;
            background: linear-gradient(100deg, #1478f5, #0868db);
            box-shadow: 0 8px 22px #0877f333;
        }

        .sidebar-bottom {
            margin-top: auto;
            border-top: 1px solid #ffffff18;
            padding: 22px 10px 0;
        }

        .sidebar-bottom p {
            color: #9eb1d0;
            font-size: 11px;
            line-height: 1.8;
            margin: 15px 0 0;
        }

        .main {
            margin-left: 255px;
            padding: 30px 34px 20px;
            min-height: 100vh;
        }

        .mobile-toggle {
            display: none;
            width: 40px;
            height: 40px;
            border: 0;
            border-radius: 12px;
            background: white;
            color: #172743;
            font-size: 21px;
        }

        .topbar {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 15px;
            margin-bottom: 28px;
        }

        .eyebrow { color: var(--muted); font-size: 13px; margin-bottom: 5px; }
        .page-title { font-size: 27px; font-weight: 800; letter-spacing: -.8px; margin: 0; }
        .subtitle { color: var(--muted); font-size: 12px; margin-top: 6px; }

        .user-chip {
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 9px 14px 9px 9px;
            border: 1px solid #e8edf5;
            border-radius: 15px;
            background: white;
            color: #172743;
        }

        .avatar {
            width: 39px;
            height: 39px;
            border-radius: 13px;
            display: grid;
            place-items: center;
            background: #dcf8ef;
            color: #07865e;
            font-weight: 800;
        }

        .user-name { font-size: 12px; font-weight: 700; }
        .user-label { font-size: 10px; color: var(--muted); margin-top: 3px; }

        .wallet-hero {
            position: relative;
            overflow: hidden;
            border-radius: 23px;
            padding: 30px;
            color: white;
            background: linear-gradient(115deg, #0875dc 0%, #087fa7 42%, #08b981 100%);
            box-shadow: 0 16px 35px #087eaa20;
            margin-bottom: 24px;
        }

        .wallet-hero::before {
            content: "";
            position: absolute;
            width: 250px;
            height: 250px;
            border: 38px solid #ffffff12;
            border-radius: 50%;
            right: -80px;
            top: -125px;
        }

        .wallet-hero::after {
            content: "";
            position: absolute;
            width: 190px;
            height: 190px;
            border: 27px solid #ffffff10;
            border-radius: 50%;
            right: 95px;
            bottom: -145px;
        }

        .hero-top, .hero-balance, .hero-actions {
            position: relative;
            z-index: 1;
        }

        .hero-top {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            gap: 15px;
        }

        .hero-label {
            font-size: 12px;
            opacity: .88;
        }

        .hero-heading {
            font-size: 22px;
            font-weight: 800;
            margin-top: 7px;
        }

        .wallet-emblem {
            width: 51px;
            height: 51px;
            display: grid;
            place-items: center;
            background: #ffffff22;
            border: 1px solid #ffffff35;
            border-radius: 16px;
            font-size: 26px;
        }

        .hero-balance { margin-top: 28px; }

        .balance-label {
            font-size: 12px;
            opacity: .85;
            margin-bottom: 5px;
        }

        .balance-value {
            font-size: clamp(29px, 3.4vw, 42px);
            font-weight: 800;
            letter-spacing: -1.5px;
            overflow-wrap: anywhere;
        }

        .hero-actions {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
            margin-top: 24px;
        }

        .hero-btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            border-radius: 11px;
            border: 1px solid #ffffff65;
            padding: 11px 17px;
            color: white;
            font-size: 12px;
            font-weight: 700;
            transition: .2s;
        }

        .hero-btn:hover {
            color: white;
            background: #ffffff20;
            transform: translateY(-2px);
        }

        .hero-btn.light {
            background: white;
            color: #078b78;
            border-color: white;
        }

        .hero-btn.light:hover {
            background: #e9fff8;
            color: #06775f;
        }

        .section-heading {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 12px;
            margin-bottom: 16px;
        }

        .section-title {
            font-size: 16px;
            font-weight: 800;
            margin: 0;
        }

        .section-caption {
            color: var(--muted);
            font-size: 11px;
            margin-top: 5px;
        }

        .content-grid {
            display: grid;
            grid-template-columns: minmax(0, 1.2fr) minmax(280px, .8fr);
            gap: 20px;
            align-items: start;
        }

        .panel {
            padding: 23px;
            background: white;
            border: 1px solid #e9eef6;
            border-radius: 19px;
            box-shadow: 0 8px 25px #1b355508;
            margin-bottom: 20px;
        }

        .panel-icon {
            width: 43px;
            height: 43px;
            display: grid;
            place-items: center;
            border-radius: 14px;
            background: #e2efff;
            color: #1677f2;
            font-size: 20px;
            margin-bottom: 15px;
        }

        .form-label {
            font-size: 12px;
            font-weight: 700;
            margin-bottom: 8px;
        }

        .amount-wrap {
            display: flex;
            align-items: center;
            border: 1px solid #dfe7f1;
            border-radius: 12px;
            overflow: hidden;
            transition: .2s;
        }

        .amount-wrap:focus-within {
            border-color: #5ca4ff;
            box-shadow: 0 0 0 4px #1677f212;
        }

        .amount-prefix {
            padding: 14px 15px;
            background: #f6f8fc;
            color: #667791;
            font-size: 13px;
            font-weight: 800;
            border-right: 1px solid #e5eaf2;
        }

        .amount-input {
            min-width: 0;
            width: 100%;
            padding: 14px;
            border: 0;
            outline: 0;
            color: #172743;
            font-family: inherit;
            font-size: 17px;
            font-weight: 800;
        }

        .amount-input::placeholder {
            color: #b3bdcc;
            font-weight: 500;
        }

        .quick-label {
            color: var(--muted);
            font-size: 11px;
            margin: 17px 0 10px;
        }

        .nominal-grid {
            display: grid;
            grid-template-columns: repeat(3, minmax(0, 1fr));
            gap: 9px;
        }

        .nominal-btn {
            border: 1px solid #e2eaf4;
            border-radius: 10px;
            background: white;
            color: #52627a;
            padding: 12px 5px;
            font-size: 11px;
            font-weight: 700;
            transition: .2s;
        }

        .nominal-btn:hover, .nominal-btn.selected {
            color: #116fe3;
            background: #edf5ff;
            border-color: #91c1ff;
        }

        .submit-btn {
            width: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 9px;
            margin-top: 20px;
            padding: 14px;
            border: 0;
            border-radius: 12px;
            color: white;
            background: linear-gradient(100deg, #1478f5, #08b981);
            font-family: inherit;
            font-size: 13px;
            font-weight: 800;
            box-shadow: 0 8px 18px #1677f222;
            transition: .2s;
        }

        .submit-btn:hover {
            filter: brightness(1.04);
            transform: translateY(-1px);
        }

        .helper {
            display: flex;
            gap: 8px;
            margin-top: 14px;
            color: var(--muted);
            font-size: 10px;
            line-height: 1.7;
        }

        .helper i { color: #0ca879; font-size: 14px; }

        .stats-grid {
            display: grid;
            grid-template-columns: repeat(2, minmax(0, 1fr));
            gap: 12px;
            margin-bottom: 20px;
        }

        .stat-card {
            padding: 17px;
            border: 1px solid #e9eef6;
            border-radius: 16px;
            background: white;
            box-shadow: 0 7px 20px #1b355506;
            min-width: 0;
        }

        .stat-icon {
            width: 36px;
            height: 36px;
            display: grid;
            place-items: center;
            border-radius: 12px;
            font-size: 17px;
            margin-bottom: 13px;
        }

        .stat-icon.blue { background: #e2efff; color: #1677f2; }
        .stat-icon.green { background: #ddf8ed; color: #08a567; }

        .stat-label { color: var(--muted); font-size: 10px; }
        .stat-value { font-size: clamp(14px, 1.5vw, 18px); font-weight: 800; margin-top: 7px; overflow-wrap: anywhere; }

        .info-card {
            padding: 20px;
            border-radius: 17px;
            background: linear-gradient(135deg, #eaf3ff, #edfff7);
            border: 1px solid #dcecf8;
        }

        .info-card h3 { font-size: 13px; font-weight: 800; margin: 0 0 9px; }
        .info-card p { color: #657893; font-size: 11px; line-height: 1.8; margin: 0; }

        .info-row {
            display: flex;
            align-items: flex-start;
            gap: 10px;
            margin-top: 15px;
            color: #526781;
            font-size: 11px;
            line-height: 1.6;
        }

        .info-row i { color: #078d6b; font-size: 16px; }

        .history-link {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 10px;
            color: #1677f2;
            font-size: 11px;
            font-weight: 700;
            padding: 14px 0 0;
        }

        .footer {
            text-align: center;
            color: #97a4b9;
            font-size: 10px;
            padding: 20px 0 5px;
        }

        @media (max-width: 1100px) {
            .main { padding: 25px 22px; }
            .content-grid { grid-template-columns: 1fr; }
        }

        @media (max-width: 768px) {
            .sidebar { transform: translateX(-100%); }
            .sidebar.show { transform: translateX(0); }
            .main { margin-left: 0; padding: 20px 15px; }
            .mobile-toggle { display: inline-grid; place-items: center; flex-shrink: 0; }
            .topbar { align-items: flex-start; }
            .topbar-left { display: flex; align-items: flex-start; gap: 10px; }
            .page-title { font-size: 22px; }
            .user-chip { padding: 6px; }
            .user-chip > div:not(.avatar) { display: none; }
            .wallet-hero { padding: 24px 20px; }
            .panel { padding: 19px; }
        }

        @media (max-width: 420px) {
            .nominal-grid { grid-template-columns: repeat(2, minmax(0, 1fr)); }
            .hero-btn { padding: 10px 12px; font-size: 11px; }
        }
    </style>
</head>

<body>

@php
    $user = auth()->user();
    $balance = $balance ?? $user->demoBalance();
@endphp

<aside class="sidebar" id="sidebar">
    <a href="{{ route('dashboard') }}" class="brand">
        <div class="brand-icon"><i class="bi bi-wallet2"></i></div>
        <div>
            <div class="brand-name">DF-<span>Pay</span></div>
            <small>Digital Wallet</small>
        </div>
    </a>

    <div class="nav-label">MENU UTAMA</div>

    <a href="{{ route('dashboard') }}" class="side-link">
        <i class="bi bi-grid-fill"></i> Dashboard
    </a>

    <a href="{{ route('wallet.index') }}" class="side-link active">
        <i class="bi bi-wallet2"></i> Dompet Saya
    </a>

    <a href="{{ route('transfers.create') }}" class="side-link">
        <i class="bi bi-arrow-left-right"></i> Transfer
    </a>

<a href="{{ route('payments.index') }}">
    <i class="bi bi-receipt"></i>
    <span>Pembayaran</span>
</a>

<a href="{{ route('transactions.index') }}">
    <i class="bi bi-clock-history"></i>
    <span>Riwayat</span>
</a>


    <a href="{{ url('/profil') }}" class="side-link">
        <i class="bi bi-person-circle"></i> Profil
    </a>

    <div class="sidebar-bottom">
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="side-link w-100 border-0 bg-transparent text-start">
                <i class="bi bi-box-arrow-right"></i> Logout
            </button>
        </form>
        <p><i class="bi bi-shield-check me-1"></i> Transaksi lebih mudah,<br>hidup lebih praktis.</p>
    </div>
</aside>

<main class="main">
    <header class="topbar">
        <div class="topbar-left">
            <button class="mobile-toggle" type="button" onclick="toggleSidebar()" aria-label="Buka menu">
                <i class="bi bi-list"></i>
            </button>

            <div>
                <div class="eyebrow">Kelola keuangan digital lo</div>
                <h1 class="page-title">Dompet Saya</h1>
                <div class="subtitle">Pantau saldo dan isi saldo demo dengan mudah.</div>
            </div>
        </div>

        <a href="{{ route('dashboard') }}" class="user-chip">
            <div class="avatar">{{ strtoupper(substr($user->name, 0, 1)) }}</div>
            <div>
                <div class="user-name">{{ $user->name }}</div>
                <div class="user-label">Akun DF-Pay</div>
            </div>
            <i class="bi bi-chevron-down text-secondary small ms-1"></i>
        </a>
    </header>

    @if (session('success'))
        <div class="alert alert-success border-0 rounded-4 shadow-sm">
            <i class="bi bi-check-circle-fill me-2"></i>{{ session('success') }}
        </div>
    @endif

    @if ($errors->any())
        <div class="alert alert-danger border-0 rounded-4 shadow-sm">
            <i class="bi bi-exclamation-circle-fill me-2"></i>{{ $errors->first() }}
        </div>
    @endif

    <section class="wallet-hero">
        <div class="hero-top">
            <div>
                <div class="hero-label">TOTAL SALDO TERSEDIA</div>
                <div class="hero-heading">Saldo demo DF-Pay</div>
            </div>
            <div class="wallet-emblem"><i class="bi bi-wallet2"></i></div>
        </div>

        <div class="hero-balance">
            <div class="balance-label">Saldo akun lo saat ini</div>
            <div class="balance-value">Rp {{ number_format($balance, 0, ',', '.') }}</div>
        </div>

        <div class="hero-actions">
            <a href="#isi-saldo" class="hero-btn light">
                <i class="bi bi-plus-circle"></i> Isi Saldo
            </a>
            <a href="{{ route('transfers.create') }}" class="hero-btn">
                <i class="bi bi-send"></i> Transfer
            </a>
            <a href="{{ route('transactions.index') }}" class="hero-btn">
                <i class="bi bi-clock-history"></i> Riwayat
            </a>
        </div>
    </section>

    <section class="content-grid">
        <div>
            <div class="panel" id="isi-saldo">
                <div class="panel-icon"><i class="bi bi-plus-circle"></i></div>

                <div class="section-heading">
                    <div>
                        <h2 class="section-title">Isi Saldo Demo</h2>
                        <div class="section-caption">Pilih nominal atau masukkan jumlah sendiri.</div>
                    </div>
                </div>

                <form action="{{ route('wallet.topup') }}" method="POST" id="topupForm">
                    @csrf

                    <label for="amount" class="form-label">Nominal isi saldo</label>

                    <div class="amount-wrap">
                        <span class="amount-prefix">Rp</span>
                        <input
                            type="number"
                            name="amount"
                            id="amount"
                            class="amount-input"
                            min="10000"
                            max="10000000"
                            step="1000"
                            placeholder="Contoh: 100000"
                            value="{{ old('amount') }}"
                            required
                        >
                    </div>

                    <div class="quick-label">PILIH NOMINAL CEPAT</div>

                    <div class="nominal-grid">
                        <button type="button" class="nominal-btn" data-amount="50000">Rp 50.000</button>
                        <button type="button" class="nominal-btn" data-amount="100000">Rp 100.000</button>
                        <button type="button" class="nominal-btn" data-amount="200000">Rp 200.000</button>
                        <button type="button" class="nominal-btn" data-amount="500000">Rp 500.000</button>
                        <button type="button" class="nominal-btn" data-amount="1000000">Rp 1.000.000</button>
                        <button type="button" class="nominal-btn" data-amount="2000000">Rp 2.000.000</button>
                    </div>

                    <button type="submit" class="submit-btn">
                        <i class="bi bi-plus-circle"></i>
                        Tambahkan Saldo Demo
                        <i class="bi bi-arrow-right ms-auto"></i>
                    </button>

                    <div class="helper">
                        <i class="bi bi-shield-check"></i>
                        <span>Minimal Rp 10.000 dan maksimal Rp 10.000.000 per transaksi. Ini hanya simulasi untuk pembelajaran, bukan uang sungguhan.</span>
                    </div>
                </form>
            </div>

            <div class="panel">
                <div class="section-heading">
                    <div>
                        <h2 class="section-title">Informasi Dompet</h2>
                        <div class="section-caption">Hal yang perlu lo ketahui.</div>
                    </div>
                    <i class="bi bi-info-circle text-primary fs-5"></i>
                </div>

                <div class="info-row">
                    <i class="bi bi-check-circle-fill"></i>
                    <span>Setiap akun memiliki saldo awal demo sebesar Rp 2.500.000.</span>
                </div>

                <div class="info-row">
                    <i class="bi bi-arrow-left-right"></i>
                    <span>Transfer masuk dan keluar akan memengaruhi saldo sesuai transaksi yang berhasil.</span>
                </div>

                <div class="info-row">
                    <i class="bi bi-shield-lock-fill"></i>
                    <span>Data transaksi ditampilkan berdasarkan akun yang sedang login.</span>
                </div>
            </div>
        </div>

        <div>
            <div class="section-heading">
                <div>
                    <h2 class="section-title">Ringkasan Dompet</h2>
                    <div class="section-caption">Status saldo akun lo.</div>
                </div>
            </div>

            <div class="stats-grid">
                <div class="stat-card">
                    <div class="stat-icon blue"><i class="bi bi-wallet2"></i></div>
                    <div class="stat-label">Saldo saat ini</div>
                    <div class="stat-value">Rp {{ number_format($balance, 0, ',', '.') }}</div>
                </div>

                <div class="stat-card">
                    <div class="stat-icon green"><i class="bi bi-check-circle"></i></div>
                    <div class="stat-label">Status dompet</div>
                    <div class="stat-value text-success">Aktif</div>
                </div>
            </div>

            <div class="info-card">
                <h3><i class="bi bi-lightbulb-fill text-warning me-2"></i>Tips menggunakan DF-Pay</h3>
                <p>Pastikan nominal isi saldo sesuai kebutuhan pengujian. Setelah berhasil, saldo akan diperbarui dan tercatat sebagai transaksi pemasukan.</p>

                <div class="info-row">
                    <i class="bi bi-arrow-repeat"></i>
                    <span>Saldo diperbarui berdasarkan transaksi demo yang berstatus berhasil.</span>
                </div>
            </div>

            <div class="panel mt-4">
                <div class="panel-icon" style="background:#e0f8ed;color:#08a567;">
                    <i class="bi bi-clock-history"></i>
                </div>

                <h2 class="section-title">Butuh riwayat transaksi?</h2>
                <div class="section-caption mb-3">Lihat semua pemasukan dan pengeluaran akun lo.</div>

                <a href="{{ route('transactions.index') }}" class="history-link">
                    Buka Riwayat Transaksi
                    <i class="bi bi-arrow-up-right"></i>
                </a>
            </div>
        </div>
    </section>

    <footer class="footer">
        © {{ date('Y') }} DF-Pay · Dompet digital simulasi
    </footer>
</main>

<script>
    function toggleSidebar() {
        document.getElementById('sidebar').classList.toggle('show');
    }

    const amountInput = document.getElementById('amount');
    const nominalButtons = document.querySelectorAll('.nominal-btn');

    nominalButtons.forEach(function (button) {
        button.addEventListener('click', function () {
            amountInput.value = button.dataset.amount;

            nominalButtons.forEach(function (item) {
                item.classList.remove('selected');
            });

            button.classList.add('selected');
        });
    });

    amountInput.addEventListener('input', function () {
        nominalButtons.forEach(function (button) {
            button.classList.toggle(
                'selected',
                Number(button.dataset.amount) === Number(amountInput.value)
                    && amountInput.value !== ''
            );
        });
    });

    document.addEventListener('click', function (event) {
        const sidebar = document.getElementById('sidebar');
        const toggle = document.querySelector('.mobile-toggle');

        if (
            window.innerWidth <= 768 &&
            sidebar.classList.contains('show') &&
            !sidebar.contains(event.target) &&
            !toggle.contains(event.target)
        ) {
            sidebar.classList.remove('show');
        }
    });
</script>

</body>
</html>
