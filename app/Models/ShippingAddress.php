<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ShippingAddress extends Model
{
    protected $table = 'tb_shipping_address';

    public $timestamps = false;

    protected $fillable = [
        'user_id',
        'no_member',
        'nama', 
        'telepon', 
        'provinsi_id', 
        'provinsi_nama', 
        'kota_id', 
        'kota_nama', 
        'kecamatan_id', 
        'kecamatan_nama', 
        'alamat', 
        'kode_pos',
        'is_default'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function transaction()
    {
        return $this->hasMany(Transaction::class, 'shipping_address_id');
    }

}
