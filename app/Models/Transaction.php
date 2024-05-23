<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;
    protected $table = 'transactions';
    protected $fillable = [
        'tanggal',
        'id_customer',
        'nama_barang',
        'jumlah',
        'gramasi',
        'status',
        'nopol',
    ];

    public function customer(){
        return $this->belongsTo(Customer::class, 'id_customer');
    }
}
