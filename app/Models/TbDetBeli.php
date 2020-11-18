<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TbDetBeli extends Model
{
    protected $table = 'tb_det_beli';
    protected $primaryKey = 'no_po';

    protected $fillable = [
        'no_po',
        'kode_barang',
        'jenis',
        'jumlah',
        'harga',
        'total'
    ];

    // =============================Relation=================================
    public function headBeli()
    {
        return $this->belongsTo(TbHeadBeli::class, 'no_po');
    }
}
