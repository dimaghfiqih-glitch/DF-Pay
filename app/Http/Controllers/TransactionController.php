<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    public function index(Request $request)
    {
        $query = Transaction::where(
            'user_id',
            $request->user()->id
        );

        // Pencarian keterangan
        if ($request->filled('search')) {
            $search = $request->input('search');

            $query->where(
                'description',
                'like',
                '%' . $search . '%'
            );
        }

        // Filter jenis transaksi
        if (in_array($request->input('type'), ['income', 'expense'], true)) {
            $query->where('type', $request->input('type'));
        }

        // Filter status transaksi
        if (in_array($request->input('status'), ['success', 'pending', 'failed'], true)) {
            $query->where('status', $request->input('status'));
        }

        $transactions = $query
            ->latest()
            ->paginate(10)
            ->withQueryString();

        return view('transactions.index', compact('transactions'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'type' => 'required|in:income,expense',
            'description' => 'required|string|max:255',
            'amount' => 'required|numeric|min:1|max:1000000000',
        ]);

        $request->user()->transactions()->create([
            'type' => $validated['type'],
            'description' => $validated['description'],
            'amount' => $validated['amount'],
            'status' => 'success',
        ]);

        return redirect()
            ->route('transactions.index')
            ->with('success', 'Transaksi demo berhasil ditambahkan!');
    }
}