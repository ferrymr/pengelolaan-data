<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderHistory extends Model
{
    protected $table = 'tb_order_history';

    public function transaction()
    {
        return $this->belongsTo(Transaction::class, 'transaksi_id');
    }
}
