<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TbHeadJual extends Model
{
    protected $table    = 'tb_head_jual';
    public $incrementing = false;
    protected $primaryKey = 'no_do';

    protected $fillable = [
        'no_do','tanggal','no_member','name','trans','bayar','cc','sub_total','note'
    ];

    public function detjual()
    {
       return $this->hasMany(TbDetJual::class, 'no_do'); 
    }
}
