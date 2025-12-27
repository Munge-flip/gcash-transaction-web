<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    public function index(Request $request)
    {
        $date = $request->query('date');

        $query = Transaction::query();

        if ($date) {
            $query->where('date', $date);
        }

        $transactions = $query->orderBy('created_at', 'desc')->get();

        return view('transactions.index', compact('transactions', 'date'));
    }
    public function create(Request $request)
    {
        $date = $request->query('date', date('Y-m-d'));

        return view('transactions.create', compact('date'));
    }
    public function store(Request $request)
    {
        $validated = $request->validate([
            'date' => ['required', 'date'],
            'time_period' => ['required', 'string'],
            'type' => ['required', 'string'],
            'amount' => ['required', 'numeric', 'min:0'],
            'status' => ['required', 'string'],
        ]);

        $fee = $this->calculateFee($validated['amount']);

        Transaction::create([
            'date' => $validated['date'],
            'time_period' => $validated['time_period'],
            'type' => $validated['type'],
            'amount' => $validated['amount'],
            'status' => $validated['status'],
            'fee' => $fee,
        ]);

        return redirect()->route('transactions.index', ['date' => $validated['date']]);
    }

    private function calculateFee($amount)
    {
        if ($amount < 100) {
            return 5;
        }
        if ($amount < 500) {
            return 10;
        }
        if ($amount < 1000) {
            return 20;
        }
        return floor($amount / 500) * 10;
    }
}
