<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\DetailTransaction;
use App\Models\Transaction;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    public function index(){
        $customers = Customer::all();
        $transactions = Transaction::with('customer')->get();
        return view('components.templates.transaksi', [
            'title' => 'Transaksi',
            'transactions' => $transactions,
            'customers' => $customers
        ]);
    }

    public function show($id){
        $detailTransactions = DetailTransaction::where('id_transaction', $id)->get();
        $transaction = Transaction::with('customer')->where('id', $id)->first();
        $itemCount = $detailTransactions->count();
        return view('components.templates.showtransaksi',[
            'title' => 'Detail Transaksi',
            'transaction' => $transaction,
            'detailTransactions' => $detailTransactions,
            'itemCount' => $itemCount
        ]);
    }

    public function create(Request $request){

        $request->validate([
            'inputCustomer' => 'required',
            'dateInput' => 'required',
            'productNameInput' => 'required',
            'colorInput' => 'required',
            'gramasiInput' => 'required',
            'inputNopol' => 'required'
        ]);

        $transaksi = Transaction::create([
            'date' => $request->dateInput,
            'id_customer' => $request->inputCustomer,
            'product_name' => $request->productNameInput,
            'color' => $request->colorInput,
            'gramasi' => $request->gramasiInput,
            'status' => 1,
            'nopol' => $request->inputNopol
        ]);

        for ($i = 0; $i < $request->quantityInput; $i++) {
            DetailTransaction::create([
                'weight' => 25,
                'id_transaction' => $transaksi->id
            ]);
        }

        return to_route('transaksi.index')->with('success', 'Transaksi berhasil ditambahkan');
    }

    public function createDetail(Request $request, $id){
        $request->validate([
            'weightInput' => 'required'
        ]);

        DetailTransaction::create([
            'weight' => $request->weightInput,
            'id_transaction' => $id
        ]);
        return to_route('transaksi.show', $id)->with('success', 'Item berhasil ditambahkan');
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
        ]);
        $transaction->update([
            'date' => $request->dateInput,
            'id_customer' => $request->inputCustomer,
            'product_name' => $request->productNameInput,
            'color' => $request->colorInput,
            'status' => $request->statusInput,
            'gramasi' => $request->gramasiInput,
        ]);
        return to_route('transaksi.index')->with('successEdit', 'Transaksi berhasil diubah');
    }

    public function updateDetails(Request $request, $id){
        $Detailtransaction = DetailTransaction::findOrFail($id);
        $getTransaction = $Detailtransaction->id_transaction;
        $request->validate([
            'weightInput' => 'required',
        ]);
        $Detailtransaction->update([
            'weight' => $request->weightInput,
        ]);
        return to_route('transaksi.show', $getTransaction)->with('successEdit', 'Item berhasil diubah');
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

    public function deleteDetails($id){
        $detailTransactions = DetailTransaction::findOrFail($id);
        $getTransaction = $detailTransactions->id_transaction;
        if($detailTransactions!= null){
            $detailTransactions->delete();
        }else{
            return to_route('transaksi.show', $getTransaction)->with('gagalDelete', 'Item gagal dihapus');
        }
        return to_route('transaksi.show', $getTransaction)->with('successDelete', 'Item berhasil dihapus');
    }

}
