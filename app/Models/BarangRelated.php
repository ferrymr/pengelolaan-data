<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BarangRelated extends Model
{
    protected $table = 'tb_barang_related';

    protected $guarded = [ 
        'id'
    ];

    public function barangDetail() {
        return $this->belongsTo('App\Models\Barang', 'tb_barang_related_id');
    }
}
