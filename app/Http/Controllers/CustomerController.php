<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function index(){

        $customers = Customer::all();

        return view('components.templates.customer', [
            'title' => 'Customer',
            'customers' => $customers
        ]);
    }

    public function create(Request $request){
        $request->validate([
            'nameInput' => 'required',
            'phoneInput' => 'required',
            'addressInput' => 'required'
        ]);

        Customer::create([
            'name' => $request->nameInput,
            'phone_number' => $request->phoneInput,
            'address' => $request->addressInput
        ]);

        return to_route('customer.index')->with('success', 'Customer berhasil ditambahkan');
    }

    public function update(Request $request, $id){
        $customer = Customer::findOrFail($id);
        $customer->update([
            'name' => $request->nameInput,
            'phone_number' => $request->phoneInput,
            'address' => $request->addressInput
        ]);

        return to_route('customer.index')->with('successEdit', 'Customer berhasil diubah');
    }

    public function delete($id){
        $customer = Customer::findOrFail($id);
        if($customer != null){
            $customer->delete();
        }else{
            return to_route('customer.index')->with('gagalDelete', 'Customer gagal dihapus');
        }

        return to_route('customer.index')->with('successDelete', 'Customer berhasil dihapus');
    }

}
