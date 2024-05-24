<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){

        $totalTransactions = Transaction::count();
        $onProceedTransactions = Transaction::whereIn('status', [1, 2])->count();
        $finishedTransactions = Transaction::where('status', 3)->count();


        if($totalTransactions == null){
            $totalTransactions = 0;
        }

        if($onProceedTransactions == null){
            $onProceedTransactions = 0;
        }

        if($finishedTransactions == null){
            $finishedTransactions = 0;
        }

        return view('components.templates.dashboard', [
            'title' => 'Dashboard',
            'totalTransactions' => $totalTransactions,
            'onProceedTransactions' => $onProceedTransactions,
            'finishedTransactions' => $finishedTransactions
        ]);
    }
}
