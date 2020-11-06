<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ShoppingCart extends Model
{
    protected $table = 'tb_shoppingcart';

    protected $fillable = [
        'users_id', 'kode_barang', 'qty', 'note'
    ];
}
