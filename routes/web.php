<?php

use App\Http\Controllers\CustomerController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\TransactionController;
use Illuminate\Support\Facades\Route;

Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

Route::get('/transaksi', [TransactionController::class, 'index'])->name('transaksi.index');
Route::post('/transaksi/store', [TransactionController::class, 'create'])->name('transaksi.create');
Route::post('/transaksi/update/{param}', [TransactionController::class, 'update'])->name('transaksi.update');
Route::get('/transaksi/delete/{param}', [TransactionController::class, 'delete'])->name('transaksi.delete');

Route::get('/customer', [CustomerController::class, 'index'])->name('customer.index');
Route::post('/customer/store', [CustomerController::class, 'create'])->name('customer.create');
Route::post('/customer/update/{param}', [CustomerController::class, 'update'])->name('customer.update');
Route::get('/customer/delete/{param}', [CustomerController::class, 'delete'])->name('customer.delete');
