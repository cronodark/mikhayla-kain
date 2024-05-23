<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('components.templates.dashboard');
})->name('dashboard');

Route::get('/transaksi', function () {
    return view('components.templates.transaksi');
})->name('transaksi.index');

Route::get('/customer', function () {
    return view('components.templates.customer');
})->name('customer.index');
