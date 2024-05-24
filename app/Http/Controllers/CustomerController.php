<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function index(){
        return view('components.templates.customer', [
            'title' => 'Customer',
        ]);
    }
}
