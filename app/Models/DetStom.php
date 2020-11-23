<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DetStom extends Model
{
    protected $table    = 'tb_det_stom';
    public $incrementing = false;
    protected $primaryKey = 'id';

    protected $fillable = [
        'no_sm', 'tb_head_stom_id', 'kode_barang','nama_barang','jenis', 'jumlah'
    ];

    public function getAll() 
    {
        return DetStom::all();
    }

    public function findId($id) 
    {
        $data = DetStom::find($id);

        if(!empty($data)) {
            return $data;
        } else {
            return false;
        }
    }

    public function headstom()
    {
        return $this->belongsTo('App\Models\HeadStom');
    }

}