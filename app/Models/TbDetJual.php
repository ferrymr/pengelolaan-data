<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TbDetJual extends Model
{
    protected $table = 'tb_det_jual';

    protected $fillable = [
        'kode_barang',
        'jumlah',
        'harga',
        'nama'
    ];

    public function headjual()
    {
       return $this->belongsTo(TbHeadJual::class, 'no_do'); 
    }
}
