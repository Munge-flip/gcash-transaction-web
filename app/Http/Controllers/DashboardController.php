<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaction;
use Carbon\Carbon;

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
        $allTransactions = Transaction::whereYear('created_at', $year)
            ->whereMonth('created_at', $month)
            ->get();

        $daysInMonth = Carbon::createFromDate($year, $month)->daysInMonth;
        $days = [];

        for ($i = 1; $i <= $daysInMonth; $i++) {
            $currentDate = sprintf('%04d-%02d-%02d', $year, $month, $i);

            $dayTransactions = $allTransactions->where('date', $currentDate);

            $days[] = [
                'number' => $i,
                'date'   => $currentDate,
                'expenses' => $dayTransactions->sum('amount'),
                'profit'   => $dayTransactions->sum('fee'),
            ];
        }
        return view('calendar', compact('days', 'year', 'month'));
    }
}
