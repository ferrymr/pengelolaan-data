<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\BarangImages;
use App\Models\TbDetSeries;
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
        'flag_bestseller',
        'flag_promo',
    ];

    // ======================== frontend ========================

    public function getBarangByCategory($category_name, $user) {
        if(!isset($user) || $user->hasRole('user')) {
            return Barang::where('jenis', $category_name)
                    ->where('bpom', 1)
                    ->where('stok','>',0)
                    ->where('stats',1)
                    ->where('h_nomem', '!=', 0)
                    ->paginate(20);
        } else {
            return Barang::where('jenis', $category_name)
                    ->where('h_nomem', '!=', 0)
                    ->where('stok','>',0)
                    ->where('stats',1)
                    ->paginate(20);
        }
        
    }

    public function getBarangSeries($user) {
        if (!isset($user) || $user->hasRole('user')) {
            return Barang::where('unit', "SERIES")
                        ->where('bpom', 1)
                        ->where('stok','>',0)
                        ->where('stats',1)
                            ->where('h_nomem', '!=', 0)
                        ->paginate(20);
        } else {
            return Barang::where('unit', "SERIES")
                        ->where('h_nomem', '!=', 0)
                        ->where('stok','>',0)
                        ->where('stats',1)
                            ->paginate(20);
        }
        
    }

    public function getBarangAll($user) {
        if (!isset($user) || $user->hasRole('user')) {
            return Barang::where('h_nomem', '!=', 0)
                        ->where('bpom', 1)
                        ->where('stok','>',0)
                        ->where('stats',1)
                            ->paginate(20);
        } else {
            return Barang::where('h_nomem', '!=', 0)
                        ->where('stok','>',0)
                        ->where('stats',1)
                            ->paginate(20);
        }       
    }

    // ======================== backend ========================

    public function getAll() {
        return Barang::all();
    }

    public function addBarang($request) 
    {
        $product = $request['produk'];
        $qty_product = $request['qty_product'];

        unset($request['produk']);
        unset($request['qty_product']);

        // dd($request);

        $barang = Barang::create($request);

        foreach($product as $key => $row) {
            TbDetSeries::insert([
                'tb_barang_id' => $row,
                'tb_series_id' => $barang->id,
                'qty' => $qty_product[$key]
            ]);
        }

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
        $data = Barang::with('barangImages', 'series.barang')->find($id);
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
    
    public function series() {
        return $this->hasMany('App\Models\TbDetSeries', 'tb_series_id');
    }

}
