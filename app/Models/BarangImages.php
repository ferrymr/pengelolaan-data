<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BarangImages extends Model
{
    protected $table = 'tb_barang_images';

    protected $fillable = [ 
        'nama_file',
        'tb_barang_id',
        'flag',
        'alt'
    ];

    protected $this='';
}
