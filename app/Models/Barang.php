<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\BarangImages;
use Carbon\Carbon;

class Barang extends Model
{
    protected $table = 'tb_barang';

    protected $fillable = [
        'kode_barang', 
        'nama', 
        'jenis', 
        'stok', 
        'poin', 
        'tipe_kulit', 
        // 'h_hpb', 
        // 'h_ppnj', 
        'h_nomem', 
        'h_member', 
        // 'h_beli',
        // 'h_ppnb',
        // 'h_hpp',
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
        // 'stok_his',
        // 'log_his',
    ];

    public function getAll() {
        return Barang::all();
    }

    public function addBarang($request) 
    {
        $barang = Barang::create($request);
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

    public function findId($id) {
        $data = Barang::with('barangImages')->find($id);
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

    public function addBarangImage($tb_barang_id, $nama_file) {
        return BarangImages::insert([
            'nama_file' => $nama_file,
            'tb_barang_id' => $tb_barang_id,
            'flag' => 1,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
    }

    // ======================== relations ========================
    public function barangImages() {
        return $this->hasMany('App\Models\BarangImages', 'tb_barang_id');
    }
    
}
