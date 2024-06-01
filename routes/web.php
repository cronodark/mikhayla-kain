<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\TransactionController;
use Illuminate\Support\Facades\Route;



Route::middleware(['auth'])->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/transaksi', [TransactionController::class, 'index'])->name('transaksi.index');
    Route::post('/transaksi/store', [TransactionController::class, 'create'])->name('transaksi.create');
    Route::post('/transaksi/update/{param}', [TransactionController::class, 'update'])->name('transaksi.update');
    Route::get('/transaksi/delete/{param}', [TransactionController::class, 'delete'])->name('transaksi.delete');
    Route::get('/transaksi/show/{param}', [TransactionController::class, 'show'])->name('transaksi.show');
    Route::post('/transaksi/show/{param}', [TransactionController::class, 'createDetail'])->name('transaksi.show.create');
    Route::get('/transaksi/show/delete/{param}', [TransactionController::class, 'deleteDetails'])->name('transaksi.show.delete');
    Route::post('/transaksi/show/update/{param}', [TransactionController::class, 'updateDetails'])->name('transaksi.show.update');


    Route::get('/customer', [CustomerController::class, 'index'])->name('customer.index');
    Route::post('/customer/store', [CustomerController::class, 'create'])->name('customer.create');
    Route::post('/customer/update/{param}', [CustomerController::class, 'update'])->name('customer.update');
    Route::get('/customer/delete/{param}', [CustomerController::class, 'delete'])->name('customer.delete');
});



Route::get('/login', [AuthController::class, 'index'])->middleware('guest')->name('login');
Route::post('/login', [AuthController::class, 'authenticate'])->middleware('guest')->name('login.auth');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::fallback(function () {
    return redirect('/');
});
