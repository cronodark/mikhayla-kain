<?php

use App\Http\Controllers\CustomerController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\TransactionController;
use Illuminate\Support\Facades\Route;

Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

Route::get('/transaksi', [TransactionController::class, 'index'])->name('transaksi.index');

Route::get('/customer', [CustomerController::class, 'index'])->name('customer.index');
