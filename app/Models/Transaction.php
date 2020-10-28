<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $table = 'tb_head_jual';

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function items()
    {
        return $this->hasMany(TransactionDetail::class, 'transaksi_id');
    }

    public function history()
    {
        return $this->hasMany(OrderHistory::class, 'transaksi_id');
    }

    public function shippingAddress()
    {
        return $this->belongsToMany(ShippingAddress::class, 'tb_head_jual', 'id');
    }

    /* public function parentable()
    {
        return $this->morphTo();
    } */
}
