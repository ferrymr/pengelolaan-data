<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DetStom extends Model
{
    protected $table    = 'tb_det_stom';
    public $incrementing = false;
    protected $primaryKey = 'no_sm';

    protected $fillable = [
        'no_sm','kode_barang','nama_barang','jenis', 'jumlah'
    ];

}