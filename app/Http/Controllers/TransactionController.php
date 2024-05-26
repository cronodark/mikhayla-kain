<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Transaction;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    public function index(){
        $customers = Customer::all();
        $transactions = Transaction::with('customer')->get();
        return view('components.templates.transaksi', [
            'title' => 'Transaction',
            'transactions' => $transactions,
            'customers' => $customers
        ]);
    }

    public function create(Request $request){

        $request->validate([
            'inputCustomer' => 'required',
            'dateInput' => 'required',
            'productNameInput' => 'required',
            'colorInput' => 'required',
            'gramasiInput' => 'required',
            'quantityInput' => 'required',
            'inputNopol' => 'required'
        ]);

        Transaction::create([
            'date' => $request->dateInput,
            'id_customer' => $request->inputCustomer,
            'product_name' => $request->productNameInput,
            'color' => $request->colorInput,
            'quantity' => $request->quantityInput,
            'gramasi' => $request->gramasiInput,
            'status' => 1,
            'nopol' => $request->inputNopol
        ]);

        return to_route('transaksi.index')->with('success', 'Transaksi berhasil ditambahkan');

    }

    public function update(Request $request, $id){
        $transaction = Transaction::findOrFail($id);
        $request->validate([
            'dateInput' => 'required',
            'inputCustomer' => 'required',
            'productNameInput' => 'required',
            'colorInput' => 'required',
            'statusInput' => 'required',
            'gramasiInput' => 'required',
            'quantityInput' => 'required',
            'nopolInput' => 'required'
        ]);
        $transaction->update([
            'date' => $request->dateInput,
            'id_customer' => $request->inputCustomer,
            'product_name' => $request->productNameInput,
            'color' => $request->colorInput,
            'quantity' => $request->quantityInput,
            'status' => $request->statusInput,
            'gramasi' => $request->gramasiInput,
            'nopol' => $request->nopolInput
        ]);
        return to_route('transaksi.index')->with('successEdit', 'Transaksi berhasil diubah');
    }

    public function delete($id){
        $transaction = Transaction::findOrFail($id);
        if($transaction != null){
            $transaction->delete();
        }else{
            return to_route('transaksi.index')->with('gagalDelete', 'Transaksi gagal dihapus');
        }

        return to_route('transaksi.index')->with('successDelete', 'Transaksi berhasil dihapus');

    }



}
