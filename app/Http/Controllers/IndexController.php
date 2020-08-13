<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;
use DB;

class IndexController extends Controller
{
    public function index()
    {
        // $products = Product::where('unit', 'SERIES')->limit(10)->get();

        $products = DB::table('cn_barang')
            ->join('cn_des_pro', 'cn_des_pro.kode', '=', 'cn_barang.kode_barang')
            ->select('cn_barang.kode_barang', 'cn_barang.nama', 'cn_barang.h_nomem', 'cn_des_pro.des1 as deskripsi')
            ->limit(10)
            ->get();

        // $products = DB::table('cn_barang')
        //     ->join('cn_des_pro', 'cn_des_pro.kode', '=', 'cn_barang.kode_barang')
        //     ->select('cn_barang.kode_barang', 'cn_barang.nama', 'cn_barang.h_nomem', 'cn_des_pro.des1 as deskripsi')
        //     ->limit(10)
        //     ->get();

        $best_seller_products = array();

        /* 
        select 
            brg.kode_barang,
            brg.nama,
            sum(dtj.jumlah) jumlah_jual
        from 
            cn_barang brg
        inner join
            tb_det_jual dtj
            on brg.kode_barang = dtj.kode_barang
            group by kode_barang
            order by jumlah_jual desc
            limit 16;
        */

        $bestOfPieces = DB::table('cn_barang')
                        ->join('tb_det_jual', 'tb_det_jual.kode_barang', '=', 'cn_barang.kode_barang')
                        ->select('cn_barang.kode_barang', 'cn_barang.nama', 'cn_barang.h_nomem AS harga', DB::raw('SUM(tb_det_jual.jumlah) as jumlah_jual'))
                        ->where('cn_barang.unit', 'PIECES')
                        ->groupBy('cn_barang.kode_barang', 'cn_barang.nama')
                        ->orderBy('jumlah_jual', 'desc')
                        ->limit(8)
                        ->get();

        $bestOfSeries = DB::table('cn_barang')
                        ->join('tb_det_jual', 'tb_det_jual.kode_barang', '=', 'cn_barang.kode_barang')
                        ->select('cn_barang.kode_barang', 'cn_barang.nama', 'cn_barang.h_nomem AS harga', DB::raw('SUM(tb_det_jual.jumlah) as jumlah_jual'))
                        ->where('cn_barang.unit', 'SERIES')
                        ->groupBy('cn_barang.kode_barang', 'cn_barang.nama')
                        ->orderBy('jumlah_jual', 'desc')
                        ->limit(8)
                        ->get();

        $bestSellingProducts = DB::table('cn_barang')
                        ->join('tb_det_jual', 'tb_det_jual.kode_barang', '=', 'cn_barang.kode_barang')
                        ->select('cn_barang.kode_barang', 'cn_barang.nama', 'cn_barang.h_nomem AS harga', DB::raw('SUM(tb_det_jual.jumlah) as jumlah_jual'))
                        ->groupBy('cn_barang.kode_barang', 'cn_barang.nama')
                        ->orderBy('jumlah_jual', 'desc')
                        ->limit(16)
                        ->get();

        return view('index', compact('bestSellingProducts', 'bestOfPieces', 'bestOfSeries'));
    }

    public function category($category = "*") {
        
    }
}
