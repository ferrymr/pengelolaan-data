<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CouponByUser extends Model
{
    protected $table = 'tb_coupon_by_user';

    protected $guarded = [ 
        'id'
    ];
}
