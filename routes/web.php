<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\TransactionController;
use Illuminate\Support\Facades\Route;

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

Route::get('/calendar/{year}/{month}', [DashboardController::class, 'calendar'])->name('calendar');

Route::resource('transactions', TransactionController::class);