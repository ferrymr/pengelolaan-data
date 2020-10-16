<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TbBarang extends Model
{
    protected $table    = 'tb_barang';
    public $incrementing = false;
    protected $primaryKey = 'kode_barang';
    protected $guarded = [];


    public function detjual()
    {
        return $this->hasMany('App\Models\TbDetJual', 'kode_barang', 'kode_barang');
    }
}
