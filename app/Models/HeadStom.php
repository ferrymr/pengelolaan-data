<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HeadStom extends Model
{
    protected $table    = 'tb_head_stom';
    public $incrementing = false;
    protected $primaryKey = 'no_sm';

    protected $fillable = [
        'no_sm','no_member','nama','tgl_pinjam', 'tgl_kembai', 'keterangan','tipe_move','kassir','waktu'
    ];

    // public function detjual()
    // {
    //    return $this->hasMany(TbDetJual::class, 'no_do'); 
    // }
}