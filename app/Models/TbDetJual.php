<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TbDetJual extends Model
{
    protected $table = 'tb_det_jual';
    protected $primaryKey = 'id';

    public function headjual()
    {
        return $this->belongsTo(TbHeadJual::class, 'tb_head_jual_id', 'id');
    }
}
