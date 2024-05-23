<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailTransaction extends Model
{
    use HasFactory;
    protected $table = 'detail_transactions';
    protected $fillable = [
        'weight',
        'id_transaction',
    ];

    public function transaction(){
        return $this->belongsTo(Transaction::class, 'id_transaction');
    }
}
