<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Transaction;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    public function index(){
        // $transactions = Transaction::all();
        $customers = Customer::all();
        $transactions = Transaction::with('customer')->get();
        return view('components.templates.transaksi', [
            'title' => 'Transaction',
            'transactions' => $transactions,
            'customers' => $customers
        ]);
    }

    public function create(){

    }

    public function update(Request $request, $id){

    }

    public function delete($id){
        $transaction = Transaction::findOrFail($id);
        if($transaction != null){
            $transaction->delete();
        }else{
            return to_route('transaksi.index')->with('gagal', 'Transaksi gagal dihapus');
        }

        return to_route('transaksi.index')->with('success', 'Transaksi berhasil dihapus');

    }



}
