<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TbHeadJual extends Model
{
    protected $table    = 'tb_head_jual';
    protected $primaryKey = 'id';

    public function detjual()
    {
        return $this->hasOne(TbDetJual::class, 'tb_head_jual_id');
    }

    public function address()
    {
        return $this->belongsTo(ShippingAddress::class, 'id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'id');
    }
}
