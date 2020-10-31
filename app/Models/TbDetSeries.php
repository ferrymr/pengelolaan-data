<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TbDetSeries extends Model
{
    protected $table = 'tb_det_series';
    protected $primaryKey = 'id';

    // no protection on field
    protected $guarded = ['id'];

    // ================================== relations ==================================

    public function barang()
    {
        return $this->belongsTo(Barang::class, 'tb_barang_id');
    }
}
