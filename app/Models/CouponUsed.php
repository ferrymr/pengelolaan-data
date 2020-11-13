<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CouponUsed extends Model
{
    protected $table = 'tb_coupon_used';

    protected $guarded = [ 
        'id'
    ];
}
