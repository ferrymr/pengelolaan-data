<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TbBarang extends Model
{
    protected $table    = 'tb_barang';
    public $incrementing = false;
    protected $primaryKey = 'kode_barang';
    protected $guarded = [];
    // protected $fillable = [
    //     'no_do','tanggal','no_member','name','trans','bayar','cc','sub_total','note'
    // ];

    // public function detjual()
    // {
    //    return $this->hasMany('App\Models\TbDetJual'); 
    // }
}
