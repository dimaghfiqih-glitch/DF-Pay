<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Akun - DF-Pay</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            background: #f3f7f4;
            font-family: Arial, sans-serif;
        }
        .register-card {
            width: 100%;
            max-width: 430px;
            padding: 35px;
            background: white;
            border-radius: 22px;
            box-shadow: 0 12px 35px rgba(0,0,0,.07);
        }
        .brand {
            color: #159957;
            font-size: 28px;
            font-weight: 800;
        }
        .form-control {
            padding: 12px;
            border-radius: 10px;
        }
        .btn-green {
            padding: 12px;
            border: none;
            border-radius: 10px;
            background: #159957;
            color: white;
            font-weight: bold;
        }
        .btn-green:hover {
            background: #107844;
            color: white;
        }
    </style>
</head>
<body>

<div class="register-card">
    <div class="text-center mb-4">
        <div class="brand">DF-Pay</div>
        <h4 class="fw-bold mt-3">Buat Akun Baru</h4>
        <p class="text-muted">Mulai pengalaman dompet digital demo lo.</p>
    </div>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0 ps-3">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('register') }}">
        @csrf

        <div class="mb-3">
            <label for="name" class="form-label">Nama lengkap</label>
            <input
                id="name"
                type="text"
                name="name"
                class="form-control"
                value="{{ old('name') }}"
                autocomplete="name"
                required
                autofocus
            >
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input
                id="email"
                type="email"
                name="email"
                class="form-control"
                value="{{ old('email') }}"
                autocomplete="email"
                required
            >
        </div>

        <div class="mb-3">
            <label for="password" class="form-label">Kata sandi</label>
            <input
                id="password"
                type="password"
                name="password"
                class="form-control"
                autocomplete="new-password"
                required
            >
        </div>

        <div class="mb-4">
            <label for="password_confirmation" class="form-label">
                Konfirmasi kata sandi
            </label>
            <input
                id="password_confirmation"
                type="password"
                name="password_confirmation"
                class="form-control"
                autocomplete="new-password"
                required
            >
        </div>

        <button type="submit" class="btn btn-green w-100">
            Daftar Sekarang
        </button>
    </form>

    <p class="text-center text-muted mt-4 mb-0">
        Sudah punya akun?
        <a href="{{ route('login') }}" class="text-success fw-semibold">
            Masuk
        </a>
    </p>

    <p class="text-center text-muted small mt-3 mb-0">
        DF-Pay adalah proyek simulasi untuk pembelajaran.
    </p>
</div>

</body>
</html>
