<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;
    protected $table = 'transactions';
    protected $fillable = [
        'date',
        'id_customer',
        'product_name',
        'color',
        'quantity',
        'gramasi',
        'status', // 1 = diproses, 2 = dikirim, 3 = selesai
        'nopol'
    ];

    public function customer(){
        return $this->belongsTo(Customer::class, 'id_customer');
    }
}
