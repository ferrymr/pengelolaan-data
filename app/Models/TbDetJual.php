<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TbDetJual extends Model
{
    protected $table = 'tb_det_jual';
    public $incrementing = false;
    protected $primaryKey = 'no_do';

    protected $fillable = [
        'no_do',
        'kode_barang',
        'jenis',
        'jumlah',
        'harga',
        'nama',
        'total'
    ];

    public function headjual()
    {
       return $this->belongsTo(TbHeadJual::class,'kode_barang'); 
    }
}
