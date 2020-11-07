<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CouponByProduct extends Model
{
    protected $table = 'tb_coupon_by_product';

    protected $guarded = [ 
        'id'
    ];
}
