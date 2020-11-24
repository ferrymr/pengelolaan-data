<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TbHeadJual extends Model
{
    protected $table    = 'tb_head_jual';
    protected $primaryKey = 'id';

    // no protection on field
    protected $guarded = ['id'];

    protected $fillable = [
        'no_do',
        'user_id',
        'tanggal',
        'no_member',
        'nama',
        'harga',
        'note',
        'trans',
        'bayar',
        'cc'
    ];
    // ================================== methods ==================================

    public function addData($input)
    {
        return TbHeadJual::create($input);
    }

    // ================================== relations ==================================

    public function detjual()
    {
        return $this->hasOne(TbDetJual::class, 'tb_head_jual_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function items()
    {
        return $this->hasMany(TbDetJual::class, 'tb_head_jual_id');
    }

    public function address()
    {
        return $this->belongsTo(ShippingAddress::class, 'shipping_address_id');
    }

    public function spb()
    {
        return $this->hasOne(Spb::class, 'code', 'kode_spb');
    }

    public function shippingAddress()
    {
        return $this->belongsToMany(ShippingAddress::class, 'tb_head_jual', 'id');
    }
}
