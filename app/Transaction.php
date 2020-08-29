<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $table = 'cn_transaksi';

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
        return $this->belongsToMany(ShippingAddress::class, 'cn_transaksi', 'id');
    }

    /* public function parentable()
    {
        return $this->morphTo();
    } */
}
