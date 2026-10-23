
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DF-Pay | Dashboard</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <style>
        :root {
            --navy: #111c32;
            --navy-light: #1d2c48;
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

        .brand-name { font-size: 24px; font-weight: 800; letter-spacing: -.8px; }
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
            padding: 28px 34px 20px;
            min-height: 100vh;
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
            gap: 11px;
            background: white;
            padding: 9px 15px 9px 9px;
            border: 1px solid #e8edf5;
            border-radius: 15px;
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
            font-size: 17px;
        }

        .user-name { font-size: 12px; font-weight: 700; }
        .user-label { font-size: 10px; color: var(--muted); margin-top: 3px; }

        .dashboard-grid {
            display: grid;
            grid-template-columns: minmax(0, 1.8fr) minmax(265px, .9fr);
            gap: 18px;
            margin-bottom: 26px;
        }

        .balance-card {
            min-height: 235px;
            padding: 27px 29px;
            border-radius: 22px;
            color: white;
            background:
                radial-gradient(circle at 88% 15%, #ffffff20 0 2px, transparent 3px),
                linear-gradient(115deg, #0875dc 0%, #087fa7 40%, #08b981 100%);
            box-shadow: 0 16px 35px #087eaa20;
            position: relative;
            overflow: hidden;
        }

        .balance-card::after {
            content: "";
            position: absolute;
            width: 230px;
            height: 230px;
            right: -70px;
            bottom: -145px;
            border: 35px solid #ffffff12;
            border-radius: 50%;
        }

        .balance-label { font-size: 12px; opacity: .9; }
        .balance-caption { font-size: 11px; opacity: .78; margin-top: 5px; }
        .balance-amount {
            font-size: clamp(27px, 3vw, 39px);
            font-weight: 800;
            letter-spacing: -1.4px;
            margin: 15px 0 20px;
            overflow-wrap: anywhere;
        }

        .balance-actions { display: flex; flex-wrap: wrap; gap: 10px; }

        .action-btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            padding: 11px 16px;
            border: 1px solid #ffffff60;
            border-radius: 11px;
            color: white;
            font-size: 12px;
            font-weight: 700;
            transition: .2s;
        }

        .action-btn:hover { transform: translateY(-2px); color: white; background: #ffffff20; }
        .action-btn.primary { background: white; color: #078b78; border-color: white; }
        .action-btn.primary:hover { background: #e9fff8; color: #06775f; }

        .balance-symbol {
            position: absolute;
            right: 35px;
            bottom: 25px;
            font-size: 84px;
            color: #ffffff32;
            transform: rotate(-12deg);
        }

        .summary-card, .panel {
            background: white;
            border: 1px solid #e9eef6;
            border-radius: 19px;
            padding: 21px;
            box-shadow: 0 8px 25px #1b355508;
        }

        .section-heading {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 12px;
            margin-bottom: 17px;
        }

        .section-title { font-size: 16px; font-weight: 800; margin: 0; }
        .section-link { color: var(--blue); font-size: 11px; font-weight: 700; }

        .summary-item {
            display: flex;
            align-items: center;
            gap: 11px;
            padding: 12px;
            border-radius: 12px;
            margin-bottom: 9px;
        }

        .summary-item.income { background: #edfbf5; }
        .summary-item.expense { background: #fff2f2; }

        .summary-icon {
            width: 37px;
            height: 37px;
            display: grid;
            place-items: center;
            border-radius: 12px;
            font-size: 17px;
        }

        .income .summary-icon { color: #06a76c; background: #d2f7e6; }
        .expense .summary-icon { color: #ed545b; background: #ffe0e2; }

        .summary-caption { font-size: 10px; color: var(--muted); }
        .summary-value { font-size: 13px; font-weight: 800; margin-top: 4px; }
        .income .summary-value { color: #08a567; }
        .expense .summary-value { color: #eb4e58; }

        .starting-balance {
            display: flex;
            justify-content: space-between;
            gap: 10px;
            border-top: 1px solid #edf0f5;
            padding-top: 15px;
            margin-top: 13px;
            font-size: 10px;
            color: var(--muted);
        }

        .quick-section { margin-bottom: 27px; }

        .quick-grid {
            display: grid;
            grid-template-columns: repeat(4, minmax(0, 1fr));
            gap: 14px;
        }

        .quick-card {
            min-height: 130px;
            padding: 19px;
            border-radius: 17px;
            background: white;
            border: 1px solid #e9eef6;
            color: #172743;
            transition: .2s;
            box-shadow: 0 7px 20px #1b355506;
        }

        .quick-card:hover {
            transform: translateY(-4px);
            border-color: #b8d9ff;
            box-shadow: 0 12px 25px #1b355510;
            color: #126fe0;
        }

        .quick-icon {
            display: grid;
            place-items: center;
            width: 42px;
            height: 42px;
            border-radius: 14px;
            margin-bottom: 12px;
            font-size: 19px;
        }

        .qi-green { color: #05a66b; background: #ddf8ed; }
        .qi-blue { color: #1476ee; background: #e1edff; }
        .qi-purple { color: #8b5ce5; background: #efe6ff; }
        .qi-orange { color: #e77a28; background: #fff0e2; }

        .quick-title { font-size: 12px; font-weight: 800; }
        .quick-desc { font-size: 10px; color: var(--muted); margin-top: 5px; }

        .bottom-grid {
            display: grid;
            grid-template-columns: minmax(0, 1.55fr) minmax(260px, .85fr);
            gap: 18px;
        }

        .transaction-list { display: flex; flex-direction: column; }

        .transaction-row {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 14px 0;
            border-bottom: 1px solid #edf0f5;
        }

        .transaction-row:last-child { border-bottom: 0; padding-bottom: 0; }

        .transaction-icon {
            width: 41px;
            height: 41px;
            flex-shrink: 0;
            display: grid;
            place-items: center;
            border-radius: 14px;
            font-size: 17px;
        }

        .transaction-icon.income { background: #dff8ed; color: #05a66b; }
        .transaction-icon.expense { background: #ffebec; color: #ed545b; }

        .transaction-info { flex: 1; min-width: 0; }
        .transaction-name {
            font-size: 11px;
            font-weight: 700;
            overflow-wrap: anywhere;
        }

        .transaction-date { color: var(--muted); font-size: 9px; margin-top: 5px; }

        .transaction-right { text-align: right; flex-shrink: 0; }
        .status-pill {
            display: inline-block;
            padding: 4px 8px;
            border-radius: 20px;
            font-size: 9px;
            font-weight: 700;
            background: #e0f8ed;
            color: #079e65;
            margin-bottom: 6px;
        }

        .transaction-amount { font-size: 11px; font-weight: 800; }
        .transaction-amount.income { color: #08a567; }
        .transaction-amount.expense { color: #e84e58; }

        .empty-state {
            text-align: center;
            padding: 32px 12px;
            color: var(--muted);
            font-size: 12px;
        }

        .empty-state i { display: block; font-size: 30px; margin-bottom: 10px; }

        .footer {
            text-align: center;
            color: #97a4b9;
            font-size: 10px;
            padding: 25px 0 5px;
        }

        .mobile-toggle { display: none; }

        @media (max-width: 1200px) {
            .main { padding: 25px 22px; }
            .dashboard-grid, .bottom-grid { grid-template-columns: 1fr; }
            .quick-grid { grid-template-columns: repeat(2, minmax(0, 1fr)); }
            .balance-symbol { font-size: 65px; }
        }

        @media (max-width: 768px) {
            .sidebar { width: 255px; transform: translateX(-100%); transition: transform .25s; }
            .sidebar.show { transform: translateX(0); }
            .main { margin-left: 0; padding: 20px 15px; }
            .mobile-toggle {
                display: inline-grid;
                place-items: center;
                width: 40px;
                height: 40px;
                border: 0;
                border-radius: 12px;
                background: white;
                color: #172743;
                font-size: 21px;
            }
            .topbar { align-items: flex-start; }
            .topbar-left { display: flex; align-items: flex-start; gap: 11px; }
            .page-title { font-size: 21px; }
            .user-chip { padding: 6px; }
            .user-chip > div:not(.avatar) { display: none; }
            .balance-card { padding: 23px 20px; }
            .balance-symbol { right: 16px; bottom: 22px; opacity: .6; }
            .balance-amount { font-size: 29px; }
            .summary-card, .panel { padding: 17px; }
        }

        @media (max-width: 420px) {
            .quick-grid { grid-template-columns: 1fr 1fr; gap: 10px; }
            .quick-card { padding: 14px; min-height: 120px; }
            .action-btn { padding: 10px 11px; font-size: 11px; }
            .transaction-row { gap: 8px; }
            .transaction-icon { width: 34px; height: 34px; }
            .transaction-amount { font-size: 10px; }
        }
    </style>
</head>
<body>

@php
    $user = auth()->user();

    $incomeTotal = $user->transactions()
        ->where('type', 'income')
        ->where('status', 'success')
        ->sum('amount');

    $expenseTotal = $user->transactions()
        ->where('type', 'expense')
        ->where('status', 'success')
        ->sum('amount');

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

    <a href="{{ route('dashboard') }}" class="side-link active">
        <i class="bi bi-grid-fill"></i> Dashboard
    </a>

    <a href="{{ route('wallet.index') }}" class="side-link">
        <i class="bi bi-wallet2"></i> Dompet Saya
    </a>

    <a href="{{ route('transfers.create') }}" class="side-link">
        <i class="bi bi-arrow-left-right"></i> Transfer
    </a>

    <a href="{{ route('payments.index') }}">Pembayaran</a>

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
                <div class="eyebrow">Selamat datang kembali,</div>
                <h1 class="page-title">{{ $user->name }} 👋</h1>
                <div class="subtitle">Kelola transaksi digital lo dengan mudah.</div>
            </div>
        </div>

        <a href="{{ url('/profil') }}" class="user-chip">
            <div class="avatar">{{ strtoupper(substr($user->name, 0, 1)) }}</div>
            <div>
                <div class="user-name">{{ $user->name }}</div>
                <div class="user-label">Akun DF-Pay</div>
            </div>
            <i class="bi bi-chevron-down text-secondary small ms-1"></i>
        </a>
    </header>

    @if (session('success'))
        <div class="alert alert-success rounded-4 border-0 shadow-sm">
            <i class="bi bi-check-circle me-2"></i>{{ session('success') }}
        </div>
    @endif

    @if ($errors->any())
        <div class="alert alert-danger rounded-4 border-0 shadow-sm">
            {{ $errors->first() }}
        </div>
    @endif

    <section class="dashboard-grid">
        <div class="balance-card">
            <div class="balance-label"><i class="bi bi-wallet2 me-2"></i>Total saldo tersedia</div>
            <div class="balance-caption">Saldo demo DF-Pay</div>
            <div class="balance-amount">Rp {{ number_format($balance, 0, ',', '.') }}</div>

            <div class="balance-actions">
                <a href="{{ route('wallet.index') }}" class="action-btn primary">
                    <i class="bi bi-plus-circle"></i> Isi Saldo
                </a>
                <a href="{{ route('transfers.create') }}" class="action-btn">
                    <i class="bi bi-send"></i> Transfer
                </a>
                <a href="{{ route('transactions.index') }}" class="action-btn">
                    <i class="bi bi-qr-code"></i> Bayar
                </a>
            </div>

            <i class="bi bi-wallet2 balance-symbol"></i>
        </div>

        <div class="summary-card">
            <div class="section-heading">
                <h2 class="section-title">Ringkasan Saldo</h2>
                <i class="bi bi-bar-chart-line text-secondary"></i>
            </div>

            <div class="summary-item income">
                <div class="summary-icon"><i class="bi bi-arrow-down-left-circle-fill"></i></div>
                <div>
                    <div class="summary-caption">Pemasukan berhasil</div>
                    <div class="summary-value">Rp {{ number_format($incomeTotal, 0, ',', '.') }}</div>
                </div>
            </div>

            <div class="summary-item expense">
                <div class="summary-icon"><i class="bi bi-arrow-up-right-circle-fill"></i></div>
                <div>
                    <div class="summary-caption">Pengeluaran berhasil</div>
                    <div class="summary-value">Rp {{ number_format($expenseTotal, 0, ',', '.') }}</div>
                </div>
            </div>

            <div class="starting-balance">
                <span><i class="bi bi-database me-1"></i>Saldo awal demo</span>
                <strong>Rp 2.500.000</strong>
            </div>
        </div>
    </section>

    <section class="quick-section">
        <div class="section-heading">
            <h2 class="section-title">Akses Cepat</h2>
            <a href="{{ route('transactions.index') }}" class="section-link">Semua menu <i class="bi bi-arrow-right"></i></a>
        </div>

        <div class="quick-grid">
            <a href="{{ route('wallet.index') }}" class="quick-card">
                <div class="quick-icon qi-green"><i class="bi bi-plus-circle"></i></div>
                <div class="quick-title">Isi Saldo</div>
                <div class="quick-desc">Tambah saldo akun lo</div>
            </a>

            <a href="{{ route('transfers.create') }}" class="quick-card">
                <div class="quick-icon qi-blue"><i class="bi bi-send"></i></div>
                <div class="quick-title">Transfer</div>
                <div class="quick-desc">Kirim ke akun lain</div>
            </a>

            <a href="{{ route('transactions.index') }}" class="quick-card">
                <div class="quick-icon qi-purple"><i class="bi bi-qr-code-scan"></i></div>
                <div class="quick-title">Scan & Bayar</div>
                <div class="quick-desc">Buka menu transaksi</div>
            </a>

            <a href="{{ route('transactions.index') }}" class="quick-card">
                <div class="quick-icon qi-orange"><i class="bi bi-receipt"></i></div>
                <div class="quick-title">Tagihan</div>
                <div class="quick-desc">Lihat riwayat transaksi</div>
            </a>
        </div>
    </section>

    <section class="bottom-grid">
        <div class="panel">
            <div class="section-heading">
                <div>
                    <h2 class="section-title">Transaksi Terakhir</h2>
                    <div class="subtitle">Aktivitas terbaru di akun lo</div>
                </div>
                <a href="{{ route('transactions.index') }}" class="section-link">Lihat semua <i class="bi bi-arrow-right"></i></a>
            </div>

            <div class="transaction-list">
                @forelse ($transactions as $transaction)
                    @php
                        $isIncome = $transaction->type === 'income';
                    @endphp

                    <div class="transaction-row">
                        <div class="transaction-icon {{ $isIncome ? 'income' : 'expense' }}">
                            <i class="bi {{ $isIncome ? 'bi-arrow-down-left' : 'bi-arrow-up-right' }}"></i>
                        </div>

                        <div class="transaction-info">
                            <div class="transaction-name">{{ $transaction->description }}</div>
                            <div class="transaction-date">
                                {{ $isIncome ? 'Uang masuk' : 'Uang keluar' }}
                                · {{ $transaction->created_at?->format('d/m/Y H:i') ?? '-' }}
                            </div>
                        </div>

                        <div class="transaction-right">
                            <div>
                                <span class="status-pill">
                                    {{ $transaction->status === 'success' ? 'Berhasil' : ucfirst($transaction->status) }}
                                </span>
                            </div>
                            <div class="transaction-amount {{ $isIncome ? 'income' : 'expense' }}">
                                {{ $isIncome ? '+' : '−' }} Rp {{ number_format($transaction->amount, 0, ',', '.') }}
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="empty-state">
                        <i class="bi bi-receipt"></i>
                        Belum ada transaksi.<br>Aktivitas lo akan muncul di sini.
                    </div>
                @endforelse
            </div>
        </div>

        <div class="panel">
            <div class="section-heading">
                <h2 class="section-title">Informasi Akun</h2>
                <i class="bi bi-person-check text-primary"></i>
            </div>

            <div class="d-flex align-items-center gap-3 mb-4">
                <div class="avatar" style="width:52px;height:52px;font-size:21px;">
                    {{ strtoupper(substr($user->name, 0, 1)) }}
                </div>
                <div>
                    <div class="fw-bold">{{ $user->name }}</div>
                    <div class="text-secondary small">{{ $user->email }}</div>
                </div>
            </div>

            <div class="d-flex justify-content-between py-3 border-top">
                <span class="text-secondary small">Status akun</span>
                <span class="small fw-bold text-success"><i class="bi bi-check-circle-fill me-1"></i>Aktif</span>
            </div>

            <div class="d-flex justify-content-between py-3 border-top">
                <span class="text-secondary small">Jenis akun</span>
                <span class="small fw-bold">Demo Wallet</span>
            </div>

            <div class="d-flex justify-content-between py-3 border-top">
                <span class="text-secondary small">Bergabung sejak</span>
                <span class="small fw-bold">{{ $user->created_at?->format('d M Y') ?? '-' }}</span>
            </div>

            <div class="rounded-3 p-3 mt-2" style="background:#edf6ff;">
                <div class="d-flex gap-2 align-items-start">
                    <i class="bi bi-info-circle-fill text-primary"></i>
                    <div class="small text-secondary" style="line-height:1.7;">
                        DF-Pay merupakan simulasi dompet digital untuk pembelajaran. Saldo dan transaksi bukan uang sungguhan.
                    </div>
                </div>
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
