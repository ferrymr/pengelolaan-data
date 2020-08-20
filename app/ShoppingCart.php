<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ShoppingCart extends Model
{
    protected $table = 'cn_shoppingcart';

    protected $fillable = [
        'users_id', 'kode_barang', 'qty', 'note'
    ];

    // protected $hidden = [

    // ];

    // public function product()
    // {
    //    return $this->hasMany(Product::class, 'kode_barang'); 
    // }
}
