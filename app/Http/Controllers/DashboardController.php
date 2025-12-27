<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaction;

class DashboardController extends Controller
{
    public function index()
    {
        return view('dashboard');
    }
    public function calendar($year, $month)
    {
        $transaction = Transaction::whereYear('created_at', $year)
            ->whereMonth('created_at', $month)
            ->get();
        return view('calendar', compact('transaction', 'year', 'month'));
    }
}
