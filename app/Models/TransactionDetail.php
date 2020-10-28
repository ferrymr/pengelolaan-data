<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TransactionDetail extends Model
{
    protected $table = 'cn_transaksi_detail';
    
    public function transaction()
    {
        return $this->belongsTo(Transaction::class, 'transaksi_id');
    }

    public function itemDetail()
    {
        // to do refactoring
        return $this->belongsTo(Product::class, 'kode_barang');
    }
}
