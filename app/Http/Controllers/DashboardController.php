<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaction;

class DashboardController extends Controller
{
    public function index()
    {
        $months = [];
        for ($m = 1; $m <= 12; $m++) {
            $months[] = [
                'number' => str_pad($m, 2, '0', STR_PAD_LEFT),
                'name' => date('F', mktime(0, 0, 0, $m, 1)),
            ];
        }
        return view('dashboard', compact('months'));
    }
    public function calendar($year, $month)
    {
        $transaction = Transaction::whereYear('created_at', $year)
            ->whereMonth('created_at', $month)
            ->get();
        return view('calendar', compact('transaction', 'year', 'month'));
    }
}
