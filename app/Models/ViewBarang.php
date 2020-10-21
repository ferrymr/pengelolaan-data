<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ViewBarang extends Model
{
    protected $table = 'view_barang';
    protected $fillable = [
        'kode_barang', 
        'nama', 
        'jenis', 
        'stok', 
        'poin', 
        // 'h_hpb', 
        // 'h_ppnj', 
        'h_nomem', 
        'h_member', 
        // 'h_beli',
        // 'h_ppnb',
        // 'h_hpp',
        'berat',
        // 'satuan',
        'bpom',
        // 'tgl_eks',
        'stats',
        // 'stok_his',
        // 'log_his',
        // 'pic',
        // 'cat',
        // 'diskon',
        'deskripsi',
        'cara_pakai',
        'gambar'
    ];

    // public function barang() {
    //     return $this->belongsTo(Barang::class);
    // }

    public function getAll() {
        return ViewBarang::all();
    }

    public function getViewBarang($roleId) {
        return ViewBarang::whereHas('roles', function($q) use ($roleId)
        {
            $q->where('kode_barang', $roleId);
        })->get();
    }

    public function addViewBarang($request) 
    {
        $viewbarang = array(
            'kode_barang' => $request['kode_barang'],
            'nama' => $request['nama'],
            'jenis' => $request['jenis'],
            // 'stok' => $request['stok'], 
            'poin' => $request['poin'],
            // 'h_hpb' => $request['h_hpb'],
            // 'h_ppnj' => $request['h_ppnj'],
            'h_nomem' => $request['h_nomem'],
            'h_member' => $request['h_member'],
            // 'h_beli' => $request['h_beli'],
            // 'h_ppnb' => $request['h_ppnb'],
            // 'h_hpp' => $request['h_hpp'],
            'berat' => $request['berat'],
            // 'satuan' => $request['satuan'],
            'bpom' => $request['bpom'],
            'tgl_eks' => $request['tgl_eks'],
            'stats' => $request['stats'],
            // 'stok_his' => $request['stok_his'],
            // 'log_his' => $request['log_his'],
            // 'pic' => $request['pic'],
            // 'cat' => $request['cat'],
            // 'diskon' => $request['diskon'],
            'deskripsi' => $request['deskripsi'],
            'cara_pakai' => $request['cara_pakai'],
            'gambar' => $request['gambar']
        );

        $viewbarang = ViewBarang::create($viewbarang);
        return $viewbarang;
    }

    public function deleteViewBarang($kode_barang) {
        $data = ViewBarang::find($kode_barang);
        
        if(!empty($data)) {
            $data->delete();
            return $data;
        } else {
            return false;
        }
    }

    public function findId($kode_barang) {
        $data = ViewBarang::find($kode_barang);
        if(!empty($data)) {
            return $data;
        } else {
            return false;
        }
    }

    public function editViewBarang($request, $kode_barang) {
        
        $data = ViewBarang::where('kode_barang', $kode_barang)->update($request);

        if(!empty($data)) {
            return $data;
        } else {
            return false;
        }
    }

    public function editUserMobile($request, $kode_barang) {
        $data = ViewBarang::where('kode_barang', $kode_barang)->update($request);

        if(!empty($data)) {
            return $data;
        } else {
            return false;
        }
    }
}
