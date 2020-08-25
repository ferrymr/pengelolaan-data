<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ShippingAddress extends Model
{
    protected $table = 'cn_shipping_address';

    protected $fillable = [
        'customer_id',
        'nama', 
        'telepon', 
        'provinsi_id', 
        'provinsi_nama', 
        'kota_id', 
        'kota_nama', 
        'kecamatan_id', 
        'kecamatan_nama', 
        'alamat', 
        'kode_pos'
    ];

}
