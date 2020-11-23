<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TbDetBeli extends Model
{
    protected $table = 'tb_det_beli';
    protected $primaryKey = 'id';

    // no protection on field
    protected $guarded = ['id'];
    
    // =============================Relation=================================
    public function headbeli()
    {
        return $this->belongsTo(TbHeadBeli::class, 'tb_head_beli_id', 'id');
    }
}
