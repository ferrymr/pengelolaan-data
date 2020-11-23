<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\BarangImages;
use App\Models\BarangRelated;
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
        'hpp',
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
        'flag_sell_to_reseller',
        'meta_title',
        'meta_description',
    ];

    // ======================== frontend ========================

    public function getBarangByCategory($category_name, $user, $sorting, $byCategory) {
        $barang = Barang::where('jenis', $category_name)
                ->where('h_nomem', '!=', 0)
                // ->where('stok','>',0)
                ->where('stats',1);
        
        if(!empty($sorting)) {
            if($sorting == "highest_price") {
                $barang = $barang->orderBy('h_nomem', 'DESC');
            } elseif($sorting == 'lowest_price') {
                $barang = $barang->orderBy('h_nomem', 'ASC');
            }            
        } else {
            $barang = $barang->orderBy('created_at', 'DESC');
        }

        if(!empty($byCategory)) {
            $barang = $barang->whereIn('jenis', $byCategory);
        }

        $barang = $barang->paginate(16);
        return $barang;
    }

    public function getBarangSeries($user, $sorting, $byCategory) {
        $barang = Barang::where('unit', "SERIES")
                    ->where('h_nomem', '!=', 0)
                    // ->where('stok','>',0)
                    ->where('stats',1);
        
        if(!empty($sorting)) {
            if($sorting == "highest_price") {
                $barang = $barang->orderBy('h_nomem', 'DESC');
            } elseif($sorting == 'lowest_price') {
                $barang = $barang->orderBy('h_nomem', 'ASC');
            }            
        } else {
            $barang = $barang->orderBy('created_at', 'DESC');
        }

        if(!empty($byCategory)) {
            $barang = $barang->whereIn('jenis', $byCategory);
        }

        $barang = $barang->paginate(16);
        return $barang;
    }

    public function getBarangAll($user, $sorting, $byCategory, $search) {
        $barang = Barang::where('h_nomem', '!=', 0)
                    // ->where('stok','>',0)
                    ->where('stats',1);
        
        if(!empty($sorting)) {
            if($sorting == "highest_price") {
                $barang = $barang->orderBy('h_nomem', 'DESC');
            } elseif($sorting == 'lowest_price') {
                $barang = $barang->orderBy('h_nomem', 'ASC');
            }            
        } else {
            $barang = $barang->orderBy('created_at', 'DESC');
        }

        if(!empty($search)) {
            $barang = $barang->where('nama', 'like', '%'.$search.'%');
        }

        if(!empty($byCategory)) {
            $barang = $barang->whereIn('jenis', $byCategory);
        }

        $barang = $barang->paginate(16);
        return $barang;
    }

    public function getBarangPromo($user, $sorting, $byCategory) {
        $barang = Barang::where('h_nomem', '!=', 0)
                        // ->where('stok','>',0)
                        ->where('flag_promo', 1)
                        ->where('stats',1);
        
            if(!empty($sorting)) {
                if($sorting == "highest_price") {
                    $barang = $barang->orderBy('h_nomem', 'DESC');
                } elseif($sorting == 'lowest_price') {
                    $barang = $barang->orderBy('h_nomem', 'ASC');
                }                
            } else {
                $barang = $barang->orderBy('created_at', 'DESC');
         
         
                if(!empty($byCategory)) {
                    $barang = $barang->whereIn('jenis', $byCategory);
                }
            }
        $barang = $barang->paginate(16);
        return $barang;
    }

    // ======================== backend ========================

    public function getAll() {
        return Barang::orderBy('created_at', 'DESC')->get();
    }

    public function addBarangRelated($request, $id) {
        // remove barang first
        BarangRelated::where('tb_barang_id', $id)->delete();

        // then save the new record
        return BarangRelated::insert($request);
    }

    public function addBarang($request) 
    {
        $product = $request['produk'];
        $qty_product = $request['qty_product'];

        // unset($request['produk']);
        // unset($request['qty_product']);

        // dd($product);

        $barang = Barang::create($request);

        if($request['unit'] == 'SERIES') {
            foreach($product as $key => $row) {
                if(!empty($row)) {
                    TbDetSeries::insert([
                        'tb_barang_id' => $row,
                        'tb_series_id' => $barang->id,
                        'qty' => $qty_product[$key]
                    ]);
                }                
            }
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

    public function editBarang($request, $id) {
        
        $data = Barang::where('id', $id)->update($request);

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
    
    public function barangRelated() {
        return $this->hasMany('App\Models\BarangRelated', 'tb_barang_id');
    }

    public function series() {
        return $this->hasMany('App\Models\TbDetSeries', 'tb_series_id');
    }

    public function barangspb()
    {
    	return $this->belongsToMany('App\Models\BarangSpb');
    }

}
