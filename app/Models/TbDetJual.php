<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TbDetJual extends Model
{
    protected $table = 'tb_det_jual';

    protected $primaryKey = 'no_do';

    protected $fillable = [
        'no_do',
        'kode_barang',
        'jumlah',
        'harga',
        'nama'
    ];

    // public function headjual()
    // {
    //    return $this->belongsTo('App\Models\TbHeadJual','no_do'); 
    // }
}
