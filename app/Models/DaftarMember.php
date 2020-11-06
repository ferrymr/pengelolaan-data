<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DaftarMember extends Model
{
    protected $table    = 'tb_daftar_member';
    protected $primaryKey = 'id';

    // no protection on field
    protected $guarded = ['id'];

    // ================================== relations ==================================

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function tbHeadJual()
    {
        return $this->belongsTo(TbHeadJual::class, 'tb_head_jual_id');
    }
}
