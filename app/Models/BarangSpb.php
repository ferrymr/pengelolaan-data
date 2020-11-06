<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\TbDetSeries;

class BarangSpb extends Model
{
    protected $table = 'tb_barang_spb';

    protected $fillable = [
        'no_member',
        'kode_barang', 
        'nama', 
        'jenis', 
        'stok', 
        'poin', 
        'h_nomem', 
        'h_member', 
        'berat',
        'satuan',
        'bpom',
        'tgl_eks',
        'stats',
        'pic', // blm
        'cat', // blm
        'diskon',
        'unit',
        'deskripsi',
        'cara_pakai',
    ];

    public function getAll() {
        return BarangSpb::all();
    }


    public function findId($id) {
        $data = BarangSpb::find($id);
        if(!empty($data)) {
            return $data;
        } else {
            return false;
        }
    }

    public function editBarang($request, $id) {
        
        $data = BarangSpb::where('id', $id)->update($request);

        if(!empty($data)) {
            return $data;
        } else {
            return false;
        }
    }

    public function idSpb() {
        $data = BarangSpb::groupby('no_member')->select('no_member')->get();

        if(!empty($data)) {
            return $data;
        } else {
            return false;
        }
    }

    public function deleteBarang($id) {
        $data = BarangSpb::find($id);
        
        if(!empty($data)) {
            $data->delete();
            return $data;
        } else {
            return false;
        }
    }

    public function series() {
        return $this->hasMany('App\Models\TbDetSeries', 'tb_series_id');
    }
}
