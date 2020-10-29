<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class TbDetJual extends Model
{
    protected $table = 'tb_det_jual';
    protected $primaryKey = 'id';

    // no protection on field
    protected $guarded = ['id'];

    // ================================== methods ==================================

    public function addData($input) 
    {
        return TbDetJual::insert($input);
    }

    // ================================== relations ==================================

    public function headjual()
    {
        return $this->belongsTo(TbHeadJual::class, 'tb_head_jual_id', 'id');
    }

    public function transaction()
    {
        return $this->belongsTo(TbHeadJual::class, 'tb_head_jual_id');
    }

    public function itemDetail()
    {
        // to do refactoring
        return $this->belongsTo(Product::class, 'kode_barang');
    }

    public function itemDetailHas()
    {
        // to do refactoring
        return $this->hasOne(Barang::class, 'kode_barang', 'kode_barang');
    }
}
