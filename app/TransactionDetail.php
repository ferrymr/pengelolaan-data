<?php

namespace App;

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
        return $this->belongsTo(Product::class, 'kode_barang');
    }
}
