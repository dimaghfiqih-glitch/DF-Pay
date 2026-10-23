<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Transaction;
use App\Http\Controllers\TransactionController;

Route::middleware('auth')->group(function () {


    // HALAMAN PEMBAYARAN
Route::get('/pembayaran', function () {
    $balance = request()->user()->demoBalance();

    return view('payments.index', compact('balance'));
})->name('payments.index');

// PROSES PEMBAYARAN DEMO
Route::post('/pembayaran', function (Request $request) {
    $validated = $request->validate([
        'category' => 'required|in:Listrik (PLN),Pulsa,Internet,Air (PDAM)',
        'customer_number' => 'required|string|min:5|max:30',
        'amount' => 'required|integer|min:1000|max:10000000',
    ]);

    $user = $request->user();
    $amount = (int) $validated['amount'];

    $success = DB::transaction(function () use (
        $user,
        $amount,
        $validated
    ) {
        $lockedUser = User::whereKey($user->id)
            ->lockForUpdate()
            ->firstOrFail();

        if ($amount > $lockedUser->demoBalance()) {
            return false;
        }

        $lockedUser->transactions()->create([
            'type' => 'expense',
            'description' => 'Pembayaran ' . $validated['category']
                . ' - ' . $validated['customer_number'],
            'amount' => $amount,
            'status' => 'success',
        ]);

        return true;
    });

    if (!$success) {
        return back()
            ->withInput()
            ->withErrors([
                'amount' => 'Saldo demo lo tidak mencukupi.',
            ]);
    }

    return redirect()
        ->route('payments.index')
        ->with('success', 'Pembayaran demo berhasil!');
})->name('payments.store');

    // DASHBOARD
    Route::get('/', function (Request $request) {
        $user = $request->user();

        $transactions = $user->transactions()
            ->latest()
            ->take(3)
            ->get();

        $balance = $user->demoBalance();

        return view('welcome', compact('transactions', 'balance'));
    })->name('dashboard');

    // RIWAYAT TRANSAKSI
    Route::get('/transaksi', [TransactionController::class, 'index'])
        ->name('transactions.index');

    Route::post('/transaksi', [TransactionController::class, 'store'])
        ->name('transactions.store');

    // DOMPET
    Route::get('/dompet', function (Request $request) {
        $balance = $request->user()->demoBalance();

        return view('wallet.index', compact('balance'));
    })->name('wallet.index');

    // ISI SALDO DEMO
    Route::post('/isi-saldo', function (Request $request) {
        $validated = $request->validate([
            'amount' => 'required|integer|min:10000|max:10000000',
        ]);

        $request->user()->transactions()->create([
            'type' => 'income',
            'description' => 'Isi Saldo Demo',
            'amount' => $validated['amount'],
            'status' => 'success',
        ]);

        return redirect()
            ->route('wallet.index')
            ->with('success', 'Saldo demo berhasil ditambahkan!');
    })->name('wallet.topup');

    // HALAMAN TRANSFER
    Route::get('/transfer', function () {
        return view('transfers.create');
    })->name('transfers.create');

    // PROSES TRANSFER DEMO
    Route::post('/transfer', function (Request $request) {
        $validated = $request->validate([
            'email' => 'required|email|exists:users,email',
            'amount' => 'required|integer|min:10000|max:10000000',
        ]);

        $sender = $request->user();
        $amount = (int) $validated['amount'];

        $recipient = User::where('email', $validated['email'])->firstOrFail();

        if ($sender->id === $recipient->id) {
            return back()
                ->withInput()
                ->withErrors([
                    'email' => 'Lo tidak bisa transfer ke akun sendiri.',
                ]);
        }

        $result = DB::transaction(function () use ($sender, $recipient, $amount) {
            // Kunci akun pengirim untuk mengurangi risiko transfer bersamaan.
            $lockedSender = User::whereKey($sender->id)
                ->lockForUpdate()
                ->firstOrFail();

            $balance = $lockedSender->demoBalance();

            if ($amount > $balance) {
                return false;
            }

            $lockedSender->transactions()->create([
                'type' => 'expense',
                'description' => 'Transfer ke ' . $recipient->name,
                'amount' => $amount,
                'status' => 'success',
            ]);

            $recipient->transactions()->create([
                'type' => 'income',
                'description' => 'Transfer dari ' . $lockedSender->name,
                'amount' => $amount,
                'status' => 'success',
            ]);

            return true;
        });

        if (!$result) {
            return back()
                ->withInput()
                ->withErrors([
                    'amount' => 'Saldo demo lo tidak mencukupi.',
                ]);
        }

        return redirect()
            ->route('transfers.create')
            ->with('success', 'Transfer demo berhasil dikirim ke ' . $recipient->name . '!');
    })->name('transfers.store');

});