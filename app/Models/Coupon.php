<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Coupon extends Model
{
    protected $table = 'tb_coupon';

    protected $guarded = [ 
        'id'
    ];

    // ======================= relations ========================
    public function couponUser() {
        return $this->hasMany('App\Models\CouponByUser', 'coupon_id');
    }

    public function couponProduct() {
        return $this->hasMany('App\Models\CouponByProduct', 'coupon_id');
    }

    public function getAll() {
        return Coupon::all();
    }

    public function addCoupon($request) {
        $data = Coupon::create($request);
        return $data;
    }

    public function deleteCoupon($id) {
        $data = Coupon::find($id);
        if(!empty($data)) {
            $data->delete();
            return $data;
        } else {
            return false;
        }
    }

    public function findId($id) {
        $data = Coupon::find($id);
        if(!empty($data)) {
            return $data;
        } else {
            return false;
        }
    }

    public function editCoupon($request, $id) {
        $data = Coupon::where('id', $id)
                    ->update($request);
        if(!empty($data)) {
            return $data;
        } else {
            return false;
        }
    }
}
