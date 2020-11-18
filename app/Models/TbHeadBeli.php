<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TbHeadBeli extends Model
{
    protected $table = 'tb_head_beli';
    protected $primaryKey = 'no_po';

    protected $fillable = [
        'no_po',
        'tanggal',
        'kode_supp',
        'nama',
        'sub_total',
        'note'
    ];

    // =========================Relation===================================

    public function detBeli()
    {
        return $this->hasOne(TbDetBeli::class, 'no_po');
    }

    public function items()
    {
        return $this->hasMany(TbDetBeli::class, 'no_po');
    }

    public function supplier()
    {
        return $this->hasOne(Supplier::class, 'kode_supp', 'kode_supp');
    }
}
