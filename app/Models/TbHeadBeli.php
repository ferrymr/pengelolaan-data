<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TbHeadBeli extends Model
{
    protected $table = 'tb_head_beli';
    protected $primaryKey = 'id';

    protected $fillable = [
        'no_po',
        'tanggal',
        'kode_supp',
        'nama',
        'sub_total',
        'note'
    ];

    // ================================== methods ==================================

    public function addData($input)
    {
        return TbHeadBeli::create($input);
    }

    // =========================Relation===================================
    public function supplier()
    {
        return $this->hasOne(Supplier::class, 'kode_supp', 'kode_supp');
    }

    public function detbeli()
    {
        return $this->hasOne(TbDetBeli::class, 'tb_head_beli_id');
    }

    public function items()
    {
        return $this->hasMany(TbDetBeli::class, 'tb_head_beli_id');
    }
}
