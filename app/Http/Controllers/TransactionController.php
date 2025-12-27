<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    public function index()
    {
        return view('transactions.index');
    }
    public function create()
    {
        return view('transactions.create');
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

        $fee = 0;

        Transaction::create([
            'date' => $validated['date'],
            'time_period' => $validated['time_period'],
            'type' => $validated['type'],
            'amount' => $validated['amount'],
            'status' => $validated['status'],
            'fee' => $fee,
        ]);

        return redirect()->route('transactions.index');
    }
}
