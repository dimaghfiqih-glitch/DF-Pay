
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transfer | DF-Pay</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <style>
        :root {
            --navy: #111b30;
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
            margin-bottom: 27px;
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

        .transfer-hero {
            position: relative;
            overflow: hidden;
            padding: 27px 30px;
            border-radius: 22px;
            background: linear-gradient(115deg, #0875dc, #087fa7 45%, #08b981);
            color: white;
            margin-bottom: 23px;
            box-shadow: 0 16px 35px #087eaa20;
        }

        .transfer-hero::after {
            content: "";
            position: absolute;
            width: 250px;
            height: 250px;
            right: -75px;
            top: -145px;
            border: 40px solid #ffffff13;
            border-radius: 50%;
        }

        .hero-content {
            position: relative;
            z-index: 1;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 20px;
        }

        .hero-label { font-size: 12px; opacity: .88; }
        .hero-title { font-size: 22px; font-weight: 800; margin-top: 8px; }
        .hero-description { font-size: 11px; opacity: .82; margin-top: 7px; }

        .hero-balance {
            margin-top: 23px;
            font-size: 12px;
            opacity: .88;
        }

        .hero-balance strong {
            display: block;
            font-size: 28px;
            font-weight: 800;
            letter-spacing: -.7px;
            margin-top: 5px;
        }

        .hero-icon {
            width: 90px;
            height: 90px;
            display: grid;
            place-items: center;
            border-radius: 25px;
            background: #ffffff20;
            border: 1px solid #ffffff30;
            font-size: 45px;
            transform: rotate(-7deg);
        }

        .content-grid {
            display: grid;
            grid-template-columns: minmax(0, 1.3fr) minmax(270px, .7fr);
            gap: 20px;
            align-items: start;
        }

        .panel {
            background: white;
            border: 1px solid #e9eef6;
            border-radius: 19px;
            padding: 24px;
            box-shadow: 0 8px 25px #1b355508;
            margin-bottom: 20px;
        }

        .section-heading {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 12px;
            margin-bottom: 20px;
        }

        .section-title { font-size: 16px; font-weight: 800; margin: 0; }
        .section-caption { color: var(--muted); font-size: 11px; margin-top: 5px; }

        .heading-icon {
            width: 44px;
            height: 44px;
            display: grid;
            place-items: center;
            background: #e2efff;
            color: #1677f2;
            border-radius: 14px;
            font-size: 21px;
        }

        .form-label {
            font-size: 12px;
            font-weight: 700;
            margin-bottom: 9px;
        }

        .field-wrap {
            display: flex;
            align-items: center;
            gap: 11px;
            padding: 0 14px;
            border: 1px solid #e0e7f1;
            border-radius: 12px;
            background: white;
            transition: .2s;
        }

        .field-wrap:focus-within {
            border-color: #65a8ff;
            box-shadow: 0 0 0 4px #1677f212;
        }

        .field-wrap > i { color: #8797ae; font-size: 18px; }

        .field-wrap input {
            width: 100%;
            min-width: 0;
            padding: 14px 0;
            border: 0;
            outline: 0;
            background: transparent;
            color: #172743;
            font-family: inherit;
            font-size: 12px;
        }

        .field-wrap input::placeholder { color: #a9b4c5; }

        .input-note {
            font-size: 10px;
            color: var(--muted);
            margin-top: 8px;
        }

        .amount-wrap {
            display: flex;
            align-items: center;
            overflow: hidden;
            border: 1px solid #e0e7f1;
            border-radius: 12px;
            transition: .2s;
        }

        .amount-wrap:focus-within {
            border-color: #65a8ff;
            box-shadow: 0 0 0 4px #1677f212;
        }

        .amount-prefix {
            align-self: stretch;
            display: flex;
            align-items: center;
            padding: 0 16px;
            background: #f6f8fc;
            border-right: 1px solid #e5eaf2;
            font-size: 13px;
            font-weight: 800;
            color: #667791;
        }

        .amount-wrap input {
            width: 100%;
            min-width: 0;
            padding: 15px 13px;
            border: 0;
            outline: 0;
            font-family: inherit;
            font-size: 18px;
            font-weight: 800;
            color: #172743;
        }

        .amount-wrap input::placeholder {
            color: #b3bdcc;
            font-size: 13px;
            font-weight: 500;
        }

        .quick-label {
            color: var(--muted);
            font-size: 10px;
            font-weight: 700;
            letter-spacing: .5px;
            margin: 18px 0 10px;
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

        .transfer-summary {
            padding: 17px;
            border: 1px solid #e2eaf4;
            border-radius: 14px;
            background: #f8faff;
            margin-top: 22px;
        }

        .summary-heading {
            color: #52627a;
            font-size: 11px;
            font-weight: 700;
            margin-bottom: 13px;
        }

        .summary-row {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 12px;
            margin-top: 11px;
            font-size: 11px;
        }

        .summary-row span { color: var(--muted); }
        .summary-row strong { text-align: right; overflow-wrap: anywhere; }

        .summary-divider {
            border-top: 1px dashed #d9e2ef;
            margin-top: 14px;
            padding-top: 14px;
        }

        .summary-total {
            color: #126fe0;
            font-size: 16px;
            font-weight: 800;
        }

        .submit-btn {
            width: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 9px;
            margin-top: 19px;
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

        .submit-btn:hover { filter: brightness(1.04); transform: translateY(-1px); }

        .form-helper {
            display: flex;
            gap: 8px;
            margin-top: 14px;
            color: var(--muted);
            font-size: 10px;
            line-height: 1.7;
        }

        .form-helper i { color: #08a567; font-size: 14px; }

        .recipient-preview {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 14px;
            margin-top: 13px;
            border-radius: 13px;
            background: #f4f8ff;
            border: 1px solid #e6eef9;
        }

        .recipient-avatar {
            width: 42px;
            height: 42px;
            display: grid;
            place-items: center;
            border-radius: 14px;
            color: #1677f2;
            background: #e0ecff;
            font-size: 19px;
        }

        .recipient-name { font-size: 11px; font-weight: 800; }
        .recipient-caption { color: var(--muted); font-size: 10px; margin-top: 4px; }

        .info-card {
            border: 1px solid #dcecf8;
            border-radius: 17px;
            padding: 20px;
            background: linear-gradient(135deg, #eaf3ff, #edfff7);
            margin-bottom: 20px;
        }

        .info-card h3 { font-size: 13px; font-weight: 800; margin-bottom: 10px; }
        .info-card p { font-size: 11px; color: #657893; line-height: 1.8; margin-bottom: 0; }

        .info-row {
            display: flex;
            align-items: flex-start;
            gap: 10px;
            margin-top: 14px;
            color: #526781;
            font-size: 11px;
            line-height: 1.7;
        }

        .info-row i { color: #078d6b; font-size: 15px; }

        .side-stat {
            background: white;
            border: 1px solid #e9eef6;
            border-radius: 17px;
            padding: 20px;
            margin-bottom: 20px;
            box-shadow: 0 8px 25px #1b355508;
        }

        .stat-top { display: flex; justify-content: space-between; align-items: center; }
        .stat-label { font-size: 11px; color: var(--muted); }
        .stat-icon {
            width: 39px;
            height: 39px;
            display: grid;
            place-items: center;
            border-radius: 13px;
            color: #078d6b;
            background: #ddf8ed;
            font-size: 18px;
        }

        .stat-value {
            font-size: clamp(20px, 2vw, 27px);
            font-weight: 800;
            letter-spacing: -.7px;
            margin-top: 15px;
            overflow-wrap: anywhere;
        }

        .stat-foot { font-size: 10px; color: var(--muted); margin-top: 8px; }

        .security-card {
            background: white;
            border: 1px solid #e9eef6;
            border-radius: 17px;
            padding: 20px;
            box-shadow: 0 8px 25px #1b355508;
        }

        .security-icon {
            width: 43px;
            height: 43px;
            display: grid;
            place-items: center;
            border-radius: 14px;
            color: #08a567;
            background: #ddf8ed;
            font-size: 21px;
            margin-bottom: 13px;
        }

        .security-card h3 { font-size: 13px; font-weight: 800; }
        .security-card p { color: var(--muted); font-size: 11px; line-height: 1.8; }

        .back-link {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            padding: 12px;
            margin-top: 14px;
            border: 1px solid #e1e9f3;
            border-radius: 11px;
            color: #52627a;
            font-size: 11px;
            font-weight: 700;
            transition: .2s;
        }

        .back-link:hover { background: #f5f8fd; color: #1677f2; }

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
            .transfer-hero { padding: 23px 20px; }
            .hero-icon { width: 65px; height: 65px; font-size: 32px; }
            .panel { padding: 19px; }
        }

        @media (max-width: 420px) {
            .nominal-grid { grid-template-columns: repeat(2, minmax(0, 1fr)); }
            .hero-title { font-size: 19px; }
            .hero-balance strong { font-size: 24px; }
        }
    </style>
</head>

<body>

@php
    $user = auth()->user();
    $balance = $user->demoBalance();
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

    <a href="{{ route('wallet.index') }}" class="side-link">
        <i class="bi bi-wallet2"></i> Dompet Saya
    </a>

    <a href="{{ route('transfers.create') }}" class="side-link active">
        <i class="bi bi-arrow-left-right"></i> Transfer
    </a>

    <a href="{{ route('payments.index') }}" class="side-link">
    <i class="bi bi-qr-code-scan"></i> Pembayaran
</a>

    <a href="{{ route('transactions.index') }}" class="side-link">
        <i class="bi bi-clock-history"></i> Riwayat
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
                <div class="eyebrow">Kirim saldo dengan mudah</div>
                <h1 class="page-title">Transfer</h1>
                <div class="subtitle">Kirim saldo demo ke pengguna DF-Pay lainnya.</div>
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

    <section class="transfer-hero">
        <div class="hero-content">
            <div>
                <div class="hero-label">DOMPET DIGITAL DF-PAY</div>
                <div class="hero-title">Transfer saldo tanpa ribet.</div>
                <div class="hero-description">Pastikan email penerima dan nominal sudah benar.</div>

                <div class="hero-balance">
                    Saldo tersedia
                    <strong>Rp {{ number_format($balance, 0, ',', '.') }}</strong>
                </div>
            </div>

            <div class="hero-icon">
                <i class="bi bi-send"></i>
            </div>
        </div>
    </section>

    <section class="content-grid">
        <div class="panel">
            <div class="section-heading">
                <div>
                    <h2 class="section-title">Kirim Saldo</h2>
                    <div class="section-caption">Isi detail penerima dan jumlah transfer.</div>
                </div>
                <div class="heading-icon"><i class="bi bi-arrow-left-right"></i></div>
            </div>

            <form action="{{ route('transfers.store') }}" method="POST" id="transferForm">
                @csrf

                <div class="mb-4">
                    <label for="email" class="form-label">Email penerima</label>

                    <div class="field-wrap">
                        <i class="bi bi-envelope"></i>
                        <input
                            type="email"
                            name="email"
                            id="email"
                            placeholder="contoh@email.com"
                            value="{{ old('email') }}"
                            maxlength="255"
                            autocomplete="email"
                            required
                        >
                    </div>

                    <div class="input-note">
                        <i class="bi bi-info-circle me-1"></i>Gunakan email akun DF-Pay yang sudah terdaftar.
                    </div>
                </div>

                <div class="mb-3">
                    <label for="amount" class="form-label">Nominal transfer</label>

                    <div class="amount-wrap">
                        <span class="amount-prefix">Rp</span>
                        <input
                            type="number"
                            name="amount"
                            id="amount"
                            min="10000"
                            max="10000000"
                            step="1000"
                            placeholder="0"
                            value="{{ old('amount') }}"
                            required
                        >
                    </div>

                    <div class="input-note">Minimal Rp 10.000 · Maksimal Rp 10.000.000 per transfer.</div>
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

                <div class="transfer-summary">
                    <div class="summary-heading">
                        <i class="bi bi-receipt me-2"></i>Ringkasan transfer
                    </div>

                    <div class="summary-row">
                        <span>Pengirim</span>
                        <strong>{{ $user->name }}</strong>
                    </div>

                    <div class="summary-row">
                        <span>Email penerima</span>
                        <strong id="recipientEmailPreview">Belum diisi</strong>
                    </div>

                    <div class="summary-row">
                        <span>Biaya admin</span>
                        <strong class="text-success">Rp 0</strong>
                    </div>

                    <div class="summary-row summary-divider">
                        <span>Total transfer</span>
                        <strong class="summary-total" id="totalPreview">Rp 0</strong>
                    </div>

                    <div class="summary-row">
                        <span>Sisa saldo setelah transfer</span>
                        <strong id="remainingPreview">Rp {{ number_format($balance, 0, ',', '.') }}</strong>
                    </div>
                </div>

                <button type="submit" class="submit-btn" id="submitTransfer">
                    <i class="bi bi-send-fill"></i>
                    Kirim Transfer
                    <i class="bi bi-arrow-right ms-auto"></i>
                </button>

                <div class="form-helper">
                    <i class="bi bi-shield-lock-fill"></i>
                    <span>Periksa kembali email dan nominal sebelum mengirim. Transfer demo yang berhasil akan tercatat di akun pengirim dan penerima.</span>
                </div>
            </form>
        </div>

        <div>
            <div class="side-stat">
                <div class="stat-top">
                    <div class="stat-label">Saldo tersedia saat ini</div>
                    <div class="stat-icon"><i class="bi bi-wallet2"></i></div>
                </div>

                <div class="stat-value">Rp {{ number_format($balance, 0, ',', '.') }}</div>
                <div class="stat-foot"><i class="bi bi-check-circle-fill text-success me-1"></i>Saldo demo akun lo</div>
            </div>

            <div class="info-card">
                <h3><i class="bi bi-lightbulb-fill text-warning me-2"></i>Cara transfer</h3>
                <p>Ikuti langkah berikut agar transfer demo berhasil diproses.</p>

                <div class="info-row">
                    <i class="bi bi-1-circle-fill"></i>
                    <span>Masukkan email pengguna DF-Pay yang menerima saldo.</span>
                </div>

                <div class="info-row">
                    <i class="bi bi-2-circle-fill"></i>
                    <span>Pilih nominal cepat atau masukkan jumlah transfer.</span>
                </div>

                <div class="info-row">
                    <i class="bi bi-3-circle-fill"></i>
                    <span>Periksa ringkasan, kemudian tekan tombol Kirim Transfer.</span>
                </div>
            </div>

            <div class="security-card">
                <div class="security-icon"><i class="bi bi-shield-check"></i></div>
                <h3>Transfer lebih aman</h3>
                <p>Sistem memeriksa akun penerima, melarang transfer ke akun sendiri, dan memastikan saldo mencukupi sebelum mencatat transaksi.</p>

                <div class="info-row">
                    <i class="bi bi-check-circle-fill"></i>
                    <span>Saldo tidak mencukupi? Transfer akan ditolak.</span>
                </div>

                <div class="info-row">
                    <i class="bi bi-check-circle-fill"></i>
                    <span>Email tidak terdaftar? Sistem akan menampilkan validasi.</span>
                </div>

                <a href="{{ route('transactions.index') }}" class="back-link">
                    <i class="bi bi-clock-history"></i>
                    Lihat Riwayat Transaksi
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
    const emailInput = document.getElementById('email');
    const nominalButtons = document.querySelectorAll('.nominal-btn');

    const recipientPreview = document.getElementById('recipientEmailPreview');
    const totalPreview = document.getElementById('totalPreview');
    const remainingPreview = document.getElementById('remainingPreview');

    const currentBalance = Number(@json($balance));

    function rupiah(value) {
        return 'Rp ' + Math.max(0, value).toLocaleString('id-ID');
    }

    function updateTransferSummary() {
        const amount = Number(amountInput.value) || 0;

        recipientPreview.textContent = emailInput.value.trim() || 'Belum diisi';
        totalPreview.textContent = rupiah(amount);
        remainingPreview.textContent = rupiah(currentBalance - amount);

        remainingPreview.style.color =
            amount > currentBalance ? '#e84e58' : '#172743';
    }

    nominalButtons.forEach(function (button) {
        button.addEventListener('click', function () {
            amountInput.value = button.dataset.amount;

            nominalButtons.forEach(function (item) {
                item.classList.remove('selected');
            });

            button.classList.add('selected');
            updateTransferSummary();
        });
    });

    amountInput.addEventListener('input', function () {
        nominalButtons.forEach(function (button) {
            button.classList.toggle(
                'selected',
                amountInput.value !== '' &&
                Number(button.dataset.amount) === Number(amountInput.value)
            );
        });

        updateTransferSummary();
    });

    emailInput.addEventListener('input', updateTransferSummary);

    document.getElementById('transferForm').addEventListener('submit', function (event) {
        const amount = Number(amountInput.value);

        if (!emailInput.value.trim() || !Number.isFinite(amount) ||
            amount < 10000 || amount > 10000000 ||
            !Number.isInteger(amount) || amount > currentBalance) {
            event.preventDefault();

            if (amount > currentBalance) {
                alert('Saldo demo lo tidak mencukupi untuk nominal transfer ini.');
            } else {
                alert('Periksa kembali email dan nominal transfer. Nominal harus berupa bilangan bulat antara Rp 10.000 dan Rp 10.000.000.');
            }
        }
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

    updateTransferSummary();
</script>

</body>
</html>
