<?php

namespace App;
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    protected $table = 'tb_barang';
    protected $primarykey = 'kode_barang';
    public $incrementing = false;
    protected $fillable = [
        'kode_barang', 
        'nama', 
        'jenis', 
        'stok', 
        'poin', 
        'h_hpb', 
        'h_ppnj', 
        'h_nomem', 
        'h_member', 
        'h_beli',
        'h_ppnb',
        'h_hpp',
        'berat',
        'satuan',
        'bpom',
        'tgl_eks',
        'stats',
        'stok_his',
        'log_his',
        'pic',
        'cat',
        'diskon',
        'deskripsi',
        'cara_pakai'
    ];

    public function getAll() {
        return Barang::all();
    }

    public function getBarang($roleId) {
        return Barang::whereHas('roles', function($q) use ($roleId)
        {
            $q->where('kode_barang', $roleId);
        })->get();
    }

    public function addBarang($request) 
    {
        $barang = array(
            'kode_barang' => $request['kode_barang'],
            'nama' => $request['nama'],
            'jenis' => $request['jenis'],
            // 'stok' => $request['stok'], 
            'poin' => $request['poin'],
            'h_hpb' => $request['h_hpb'],
            'h_ppnj' => $request['h_ppnj'],
            'h_nomem' => $request['h_nomem'],
            'h_member' => $request['h_member'],
            'h_beli' => $request['h_beli'],
            'h_ppnb' => $request['h_ppnb'],
            'h_hpp' => $request['h_hpp'],
            'berat' => $request['berat'],
            'satuan' => $request['satuan'],
            'bpom' => $request['bpom'],
            'tgl_eks' => $request['tgl_eks'],
            'stats' => $request['stats'],
            'stok_his' => $request['stok_his'],
            'log_his' => $request['log_his'],
            'pic' => $request['pic'],
            'cat' => $request['cat'],
            'diskon' => $request['diskon'],
            'deskripsi' => $request['deskripsi'],
            'cara_pakai' => $request['cara_pakai'],
        );

        $barang = Barang::create($barang);
        return $barang;
    }

    public function deleteBarang($kode_barang) {
        $data = Barang::find($kode_barang);
        
        if(!empty($data)) {
            $data->delete();
            return $data;
        } else {
            return false;
        }
    }

    public function findId($kode_barang) {
        $data = Barang::find($kode_barang);
        if(!empty($data)) {
            return $data;
        } else {
            return false;
        }
    }

    public function editBarang($request, $kode_barang) {
        
        $data = Barang::where('kode_barang', $kode_barang)->update($request);

        if(!empty($data)) {
            return $data;
        } else {
            return false;
        }
    }

    public function editUserMobile($request, $kode_barang) {
        $data = Barang::where('kode_barang', $kode_barang)->update($request);

        if(!empty($data)) {
            return $data;
        } else {
            return false;
        }
    }




}
