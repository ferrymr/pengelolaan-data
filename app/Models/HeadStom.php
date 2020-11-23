<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HeadStom extends Model
{
    protected $table    = 'tb_head_stom';
    public $incrementing = false;
    protected $primaryKey = 'id';

    protected $fillable = [
     'no_sm','no_member','nama','tgl_pinjam', 'tgl_kembai', 'keterangan','tipe_move','kassir','waktu'
    ];

    public function getAll() 
    {
        return HeadStom::all();
    }

    public function findId($id) 
    {
        $data = HeadStom::find($id);

        if(!empty($data)) {
            return $data;
        } else {
            return false;
        }
    }

    public function editMovement($request, $id) 
    {
        $data = HeadStom::where('id', $id)->update($request);

        if(!empty($data)) {
            return $data;
        } else {
            return false;
        }
    }


    public function detstom()
    {
        return $this->hasMany('App\Models\DetStom');
    }
}