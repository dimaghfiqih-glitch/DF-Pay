```php
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Riwayat Transaksi | DF-Pay</title>

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
            --border: #e9eef6;
            --red: #e45468;
        }

        * { box-sizing: border-box; }

        body {
            margin: 0;
            background: var(--bg);
            color: #172743;
            font-family: 'Plus Jakarta Sans', sans-serif;
            font-size: 13px;
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

        .logout-link {
            width: 100%;
            border: 0;
            background: transparent;
            text-align: left;
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

        .topbar-left {
            display: flex;
            align-items: flex-start;
            gap: 10px;
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
            flex-shrink: 0;
            border-radius: 13px;
            display: grid;
            place-items: center;
            background: #dcf8ef;
            color: #07865e;
            font-weight: 800;
        }

        .user-name { font-size: 12px; font-weight: 700; }
        .user-label { font-size: 10px; color: var(--muted); margin-top: 3px; }

        .hero {
            position: relative;
            overflow: hidden;
            border-radius: 23px;
            padding: 29px 30px;
            color: white;
            background: linear-gradient(115deg, #0875dc 0%, #087fa7 42%, #08b981 100%);
            box-shadow: 0 16px 35px #087eaa20;
            margin-bottom: 24px;
        }

        .hero::before, .hero::after {
            content: "";
            position: absolute;
            border: 30px solid #ffffff12;
            border-radius: 50%;
            pointer-events: none;
        }

        .hero::before {
            width: 260px;
            height: 260px;
            right: -65px;
            top: -155px;
        }

        .hero::after {
            width: 190px;
            height: 190px;
            right: 150px;
            bottom: -150px;
        }

        .hero-content {
            position: relative;
            z-index: 1;
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 20px;
        }

        .hero-label { font-size: 12px; opacity: .88; margin-bottom: 8px; }

        .hero h2 {
            font-size: clamp(21px, 2.2vw, 27px);
            font-weight: 800;
            letter-spacing: -.7px;
            margin: 0 0 10px;
        }

        .hero p {
            color: #e7f9ff;
            margin: 0;
            line-height: 1.8;
            max-width: 580px;
            font-size: 12px;
        }

        .hero-icon {
            width: 65px;
            height: 65px;
            flex-shrink: 0;
            display: grid;
            place-items: center;
            border: 1px solid #ffffff35;
            border-radius: 19px;
            background: #ffffff22;
            font-size: 30px;
        }

        .stats-grid {
            display: grid;
            grid-template-columns: repeat(3, minmax(0, 1fr));
            gap: 15px;
            margin-bottom: 24px;
        }

        .stat-card {
            padding: 19px;
            border: 1px solid var(--border);
            border-radius: 17px;
            background: white;
            box-shadow: 0 7px 20px #1b355506;
            min-width: 0;
            transition: .2s;
        }

        .stat-card:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 24px #1b355510;
        }

        .stat-top {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 8px;
            margin-bottom: 15px;
        }

        .stat-icon {
            width: 39px;
            height: 39px;
            display: grid;
            place-items: center;
            border-radius: 13px;
            font-size: 19px;
        }

        .stat-icon.blue { background: #e2efff; color: #1677f2; }
        .stat-icon.green { background: #ddf8ed; color: #08a567; }
        .stat-icon.red { background: #fff0f2; color: #e45468; }

        .stat-label { color: var(--muted); font-size: 10px; font-weight: 700; }
        .stat-value {
            font-size: clamp(14px, 1.5vw, 19px);
            font-weight: 800;
            letter-spacing: -.4px;
            margin-top: 6px;
            overflow-wrap: anywhere;
        }

        .stat-note { color: var(--muted); font-size: 10px; margin-top: 7px; }

        .panel {
            background: white;
            border: 1px solid var(--border);
            border-radius: 19px;
            box-shadow: 0 8px 25px #1b355508;
            margin-bottom: 20px;
            overflow: hidden;
        }

        .panel-heading {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 15px;
            padding: 22px 23px;
            border-bottom: 1px solid var(--border);
        }

        .section-title { font-size: 16px; font-weight: 800; margin: 0; }
        .section-caption { color: var(--muted); font-size: 11px; margin-top: 5px; }

        .count-pill {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            white-space: nowrap;
            padding: 8px 11px;
            border-radius: 10px;
            background: #e2efff;
            color: #1677f2;
            font-size: 10px;
            font-weight: 800;
        }

        .filter-area {
            padding: 19px 23px;
            background: #fbfcff;
            border-bottom: 1px solid var(--border);
        }

        .filter-form {
            display: grid;
            grid-template-columns: minmax(160px, 1.5fr) minmax(120px, .8fr) minmax(120px, .8fr) auto auto;
            gap: 10px;
            align-items: end;
        }

        .form-label { font-size: 11px; font-weight: 700; margin-bottom: 7px; }

        .form-control, .form-select {
            min-height: 43px;
            border: 1px solid #dfe7f1;
            border-radius: 11px;
            font-family: inherit;
            font-size: 11px;
            box-shadow: none !important;
        }

        .form-control:focus, .form-select:focus {
            border-color: #5ca4ff;
            box-shadow: 0 0 0 3px #1677f212 !important;
        }

        .search-wrap { position: relative; }
        .search-wrap i {
            position: absolute;
            top: 14px;
            left: 13px;
            color: #91a0b7;
        }
        .search-wrap input { padding-left: 37px; }

        .btn-primary-custom {
            min-height: 43px;
            padding: 0 15px;
            border: 0;
            border-radius: 11px;
            background: linear-gradient(100deg, #1478f5, #08b981);
            color: white;
            font-family: inherit;
            font-size: 11px;
            font-weight: 800;
            white-space: nowrap;
            transition: .2s;
        }

        .btn-primary-custom:hover { color: white; filter: brightness(1.05); }

        .btn-reset {
            min-height: 43px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            padding: 0 13px;
            border: 1px solid #dfe7f1;
            border-radius: 11px;
            color: #64748b;
            background: white;
            font-size: 11px;
            font-weight: 700;
            white-space: nowrap;
        }

        .table-responsive { width: 100%; }

        .transaction-table {
            width: 100%;
            border-collapse: collapse;
            white-space: nowrap;
        }

        .transaction-table thead { background: #f8faff; }

        .transaction-table th {
            padding: 15px 19px;
            color: #8795ab;
            font-size: 10px;
            letter-spacing: .5px;
            font-weight: 800;
            text-transform: uppercase;
            border-bottom: 1px solid var(--border);
        }

        .transaction-table td {
            padding: 16px 19px;
            border-bottom: 1px solid #eef2f7;
            vertical-align: middle;
        }

        .transaction-table tbody tr:last-child td { border-bottom: 0; }
        .transaction-table tbody tr:hover { background: #f8fbff; }

        .transaction-info {
            display: flex;
            align-items: center;
            gap: 11px;
            min-width: 210px;
        }

        .transaction-icon {
            width: 41px;
            height: 41px;
            flex-shrink: 0;
            display: grid;
            place-items: center;
            border-radius: 13px;
            font-size: 17px;
        }

        .transaction-icon.income { background: #ddf8ed; color: #08a567; }
        .transaction-icon.expense { background: #fff0f2; color: #e45468; }

        .transaction-name {
            color: #172743;
            font-size: 11px;
            font-weight: 800;
            white-space: normal;
            overflow-wrap: anywhere;
            margin-bottom: 5px;
        }

        .transaction-id { color: #94a1b5; font-size: 10px; }

        .type-badge, .status-badge {
            display: inline-flex;
            align-items: center;
            gap: 5px;
            padding: 7px 9px;
            border-radius: 9px;
            font-size: 10px;
            font-weight: 800;
        }

        .type-in, .status-success { background: #ddf8ed; color: #07865e; }
        .type-out, .status-failed { background: #fff0f2; color: #d9445a; }
        .status-pending { background: #fff6df; color: #a8730a; }

        .date-main { color: #465670; font-size: 11px; font-weight: 700; margin-bottom: 5px; }
        .date-time { color: #94a1b5; font-size: 10px; }

        .amount-in { color: #08a567; font-size: 12px; font-weight: 800; }
        .amount-out { color: #25344c; font-size: 12px; font-weight: 800; }

        .empty-state { padding: 55px 20px; text-align: center; }

        .empty-icon {
            width: 65px;
            height: 65px;
            display: grid;
            place-items: center;
            margin: 0 auto 17px;
            border-radius: 20px;
            background: #e2efff;
            color: #1677f2;
            font-size: 28px;
        }

        .empty-state h3 { font-size: 15px; font-weight: 800; margin-bottom: 8px; }
        .empty-state p { color: var(--muted); font-size: 11px; margin-bottom: 18px; }

        .pagination-area {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 12px;
            flex-wrap: wrap;
            padding: 17px 23px;
            border-top: 1px solid var(--border);
        }

        .pagination-area .pagination { margin: 0; }
        .pagination .page-link {
            border-color: #e4eaf3;
            color: #64748b;
            border-radius: 9px;
            margin: 0 2px;
            font-size: 11px;
            box-shadow: none;
        }

        .pagination .active .page-link {
            background: #1677f2;
            border-color: #1677f2;
            color: white;
        }

        .pagination .disabled .page-link { color: #b6c0ce; }

        .alert { font-size: 12px; }
        .footer { text-align: center; color: #97a4b9; font-size: 10px; padding: 20px 0 5px; }

        @media (max-width: 1250px) {
            .main { padding: 25px 22px; }
            .filter-form { grid-template-columns: repeat(2, minmax(0, 1fr)); }
            .filter-search { grid-column: 1 / -1; }
        }

        @media (max-width: 950px) {
            .sidebar { transform: translateX(-100%); }
            .sidebar.show { transform: translateX(0); }
            .main { margin-left: 0; padding: 20px 15px; }
            .mobile-toggle { display: inline-grid; place-items: center; flex-shrink: 0; }
            .topbar { align-items: flex-start; }
            .page-title { font-size: 22px; }
        }

        @media (max-width: 650px) {
            .user-chip { padding: 6px; }
            .user-chip > div:not(.avatar) { display: none; }
            .hero { padding: 23px 20px; border-radius: 19px; }
            .hero-icon { width: 51px; height: 51px; font-size: 24px; }
            .stats-grid { grid-template-columns: 1fr; gap: 10px; }
            .stat-card { padding: 16px; }
            .stat-top { margin-bottom: 10px; }
            .filter-form { grid-template-columns: 1fr; }
            .filter-search { grid-column: auto; }
            .panel-heading, .filter-area { padding: 18px 15px; }
            .transaction-table th, .transaction-table td { padding: 13px 14px; }
            .pagination-area { padding: 16px 15px; }
            .panel-heading { align-items: flex-start; }
        }

        @media (max-width: 420px) {
            .hero-content { align-items: flex-start; }
            .hero h2 { font-size: 20px; }
            .hero-icon { width: 44px; height: 44px; border-radius: 13px; }
            .page-title { font-size: 20px; }
        }
    </style>
</head>

<body>

@php
    $user = auth()->user();
    $totalShown = $transactions->total();
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

    <a href="{{ route('transfers.create') }}" class="side-link">
        <i class="bi bi-arrow-left-right"></i> Transfer
    </a>

    <a href="{{ route('transactions.index') }}" class="side-link active">
        <i class="bi bi-clock-history"></i> Riwayat
    </a>

    <a href="{{ route('payments.index') }}" class="side-link">
    <i class="bi bi-qr-code-scan"></i> Pembayaran
</a>

    <a href="{{ url('/profil') }}" class="side-link">
        <i class="bi bi-person-circle"></i> Profil
    </a>

    <div class="sidebar-bottom">
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="side-link logout-link">
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
                <div class="eyebrow">Pantau aktivitas keuangan digital lo</div>
                <h1 class="page-title">Riwayat Transaksi</h1>
                <div class="subtitle">Lihat seluruh pemasukan dan pengeluaran akun lo.</div>
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

    <section class="hero">
        <div class="hero-content">
            <div>
                <div class="hero-label"><i class="bi bi-shield-check me-2"></i>AKTIVITAS DOMPET DIGITAL</div>
                <h2>Semua transaksi tercatat dengan rapi.</h2>
                <p>Pantau uang masuk dan keluar, cari transaksi tertentu, dan periksa statusnya dalam satu halaman.</p>
            </div>
            <div class="hero-icon"><i class="bi bi-clock-history"></i></div>
        </div>
    </section>

    @php
        $summaryQuery = \App\Models\Transaction::where('user_id', $user->id);

        if (request()->filled('search')) {
            $summaryQuery->where('description', 'like', '%' . request('search') . '%');
        }

        if (in_array(request('type'), ['income', 'expense'], true)) {
            $summaryQuery->where('type', request('type'));
        }

        if (in_array(request('status'), ['success', 'pending', 'failed'], true)) {
            $summaryQuery->where('status', request('status'));
        }

        $totalIncome = (clone $summaryQuery)->where('type', 'income')
            ->where('status', 'success')->sum('amount');

        $totalExpense = (clone $summaryQuery)->where('type', 'expense')
            ->where('status', 'success')->sum('amount');
    @endphp

    <section class="stats-grid">
        <div class="stat-card">
            <div class="stat-top">
                <div class="stat-icon blue"><i class="bi bi-arrow-left-right"></i></div>
                <span class="stat-label">JUMLAH TRANSAKSI</span>
            </div>
            <div class="stat-value">{{ number_format($totalShown, 0, ',', '.') }} transaksi</div>
            <div class="stat-note">Jumlah data sesuai filter yang dipilih.</div>
        </div>

        <div class="stat-card">
            <div class="stat-top">
                <div class="stat-icon green"><i class="bi bi-arrow-down-left"></i></div>
                <span class="stat-label">UANG MASUK</span>
            </div>
            <div class="stat-value">Rp {{ number_format($totalIncome, 0, ',', '.') }}</div>
            <div class="stat-note">Total pemasukan berhasil sesuai filter.</div>
        </div>

        <div class="stat-card">
            <div class="stat-top">
                <div class="stat-icon red"><i class="bi bi-arrow-up-right"></i></div>
                <span class="stat-label">UANG KELUAR</span>
            </div>
            <div class="stat-value">Rp {{ number_format($totalExpense, 0, ',', '.') }}</div>
            <div class="stat-note">Total pengeluaran berhasil sesuai filter.</div>
        </div>
    </section>

    <section class="panel">
        <div class="panel-heading">
            <div>
                <h2 class="section-title">Semua Aktivitas</h2>
                <div class="section-caption">Detail transaksi dari akun DF-Pay lo.</div>
            </div>
            <span class="count-pill">
                <i class="bi bi-list-check"></i>
                {{ $transactions->count() }} ditampilkan
            </span>
        </div>

        <div class="filter-area">
            <form action="{{ route('transactions.index') }}" method="GET" class="filter-form">
                <div class="filter-search">
                    <label class="form-label">Cari transaksi</label>
                    <div class="search-wrap">
                        <i class="bi bi-search"></i>
                        <input
                            type="text"
                            name="search"
                            class="form-control"
                            placeholder="Cari keterangan transaksi..."
                            value="{{ request('search') }}"
                        >
                    </div>
                </div>

                <div>
                    <label class="form-label">Jenis transaksi</label>
                    <select name="type" class="form-select">
                        <option value="">Semua jenis</option>
                        <option value="income" @selected(request('type') === 'income')>Uang masuk</option>
                        <option value="expense" @selected(request('type') === 'expense')>Uang keluar</option>
                    </select>
                </div>

                <div>
                    <label class="form-label">Status</label>
                    <select name="status" class="form-select">
                        <option value="">Semua status</option>
                        <option value="success" @selected(request('status') === 'success')>Berhasil</option>
                        <option value="pending" @selected(request('status') === 'pending')>Menunggu</option>
                        <option value="failed" @selected(request('status') === 'failed')>Gagal</option>
                    </select>
                </div>

                <button type="submit" class="btn-primary-custom">
                    <i class="bi bi-funnel me-1"></i> Filter
                </button>

                <a href="{{ route('transactions.index') }}" class="btn-reset">
                    <i class="bi bi-arrow-counterclockwise me-1"></i> Reset
                </a>
            </form>
        </div>

        @if ($transactions->count())
            <div class="table-responsive">
                <table class="transaction-table">
                    <thead>
                        <tr>
                            <th>Transaksi</th>
                            <th>Jenis</th>
                            <th>Tanggal</th>
                            <th>Status</th>
                            <th class="text-end">Nominal</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($transactions as $transaction)
                            @php
                                $isIncome = $transaction->type === 'income';
                                $description = strtolower($transaction->description ?? '');

                                if (str_contains($description, 'transfer')) {
                                    $transactionIcon = 'bi-arrow-left-right';
                                } elseif (str_contains($description, 'isi saldo')) {
                                    $transactionIcon = 'bi-wallet2';
                                } elseif (str_contains($description, 'pembayaran')) {
                                    $transactionIcon = 'bi-receipt';
                                } else {
                                    $transactionIcon = $isIncome ? 'bi-arrow-down-left' : 'bi-arrow-up-right';
                                }

                                $status = strtolower($transaction->status ?? 'pending');
                                $statusLabel = [
                                    'success' => 'Berhasil',
                                    'pending' => 'Menunggu',
                                    'failed' => 'Gagal',
                                ][$status] ?? ucfirst($status);
                            @endphp

                            <tr>
                                <td>
                                    <div class="transaction-info">
                                        <div class="transaction-icon {{ $isIncome ? 'income' : 'expense' }}">
                                            <i class="bi {{ $transactionIcon }}"></i>
                                        </div>
                                        <div>
                                            <div class="transaction-name">{{ $transaction->description }}</div>
                                            <div class="transaction-id">
                                                ID #{{ str_pad((string) $transaction->id, 6, '0', STR_PAD_LEFT) }}
                                            </div>
                                        </div>
                                    </div>
                                </td>

                                <td>
                                    <span class="type-badge {{ $isIncome ? 'type-in' : 'type-out' }}">
                                        <i class="bi {{ $isIncome ? 'bi-arrow-down-left' : 'bi-arrow-up-right' }}"></i>
                                        {{ $isIncome ? 'Masuk' : 'Keluar' }}
                                    </span>
                                </td>

                                <td>
                                    <div class="date-main">{{ $transaction->created_at?->format('d M Y') ?? '-' }}</div>
                                    <div class="date-time">{{ $transaction->created_at?->format('H:i') ?? '' }} WIB</div>
                                </td>

                                <td>
                                    <span class="status-badge status-{{ in_array($status, ['success', 'pending', 'failed']) ? $status : 'pending' }}">
                                        <i class="bi {{ $status === 'success' ? 'bi-check-circle-fill' : ($status === 'failed' ? 'bi-x-circle-fill' : 'bi-clock-fill') }}"></i>
                                        {{ $statusLabel }}
                                    </span>
                                </td>

                                <td class="text-end">
                                    <span class="{{ $isIncome ? 'amount-in' : 'amount-out' }}">
                                        {{ $isIncome ? '+' : '-' }} Rp {{ number_format($transaction->amount, 0, ',', '.') }}
                                    </span>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div class="pagination-area">
                <div class="text-secondary small">
                    Menampilkan
                    <strong>{{ $transactions->firstItem() ?? 0 }}–{{ $transactions->lastItem() ?? 0 }}</strong>
                    dari <strong>{{ $transactions->total() }}</strong> transaksi
                </div>

                {{ $transactions->onEachSide(1)->links() }}
            </div>
        @else
            <div class="empty-state">
                <div class="empty-icon"><i class="bi bi-receipt"></i></div>
                <h3>Belum ada transaksi ditemukan</h3>
                <p>Transaksi belum tersedia atau tidak cocok dengan filter pencarian lo.</p>
                <a href="{{ route('transactions.index') }}" class="btn-primary-custom d-inline-flex align-items-center justify-content-center">
                    <i class="bi bi-arrow-counterclockwise me-2"></i> Tampilkan Semua
                </a>
            </div>
        @endif
    </section>

    <footer class="footer">
        © {{ date('Y') }} DF-Pay · Riwayat transaksi dompet digital simulasi.
    </footer>
</main>

<script>
    function toggleSidebar() {
        document.getElementById('sidebar').classList.toggle('show');
    }

    document.addEventListener('click', function (event) {
        const sidebar = document.getElementById('sidebar');
        const toggle = document.querySelector('.mobile-toggle');

        if (
            window.innerWidth <= 950 &&
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
```