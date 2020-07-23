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

        return view('index', compact('products'));
    }

    public function category($category = "*") {
        
    }
}
