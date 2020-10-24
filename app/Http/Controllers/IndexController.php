<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use Illuminate\Http\Request;
use DB;

class IndexController extends Controller
{
    public function index()
    {

        $bestOfPieces = Barang::join('tb_det_jual', 'tb_det_jual.kode_barang', '=', 'cn_barang.kode_barang')
                        ->select('cn_barang.kode_barang', 'cn_barang.nama', 'cn_barang.h_nomem AS harga', DB::raw('SUM(tb_det_jual.jumlah) as jumlah_jual'))
                        ->where('cn_barang.unit', 'PIECES')
                        ->groupBy('cn_barang.kode_barang', 'cn_barang.nama')
                        ->orderBy('jumlah_jual', 'desc')
                        ->limit(5)
                        ->get();

        $bestOfSeries = Barang::join('tb_det_jual', 'tb_det_jual.kode_barang', '=', 'cn_barang.kode_barang')
                        ->select('cn_barang.kode_barang', 'cn_barang.nama', 'cn_barang.h_nomem AS harga', DB::raw('SUM(tb_det_jual.jumlah) as jumlah_jual'))
                        ->where('cn_barang.unit', 'SERIES')
                        ->groupBy('cn_barang.kode_barang', 'cn_barang.nama')
                        ->orderBy('jumlah_jual', 'desc')
                        ->limit(5)
                        ->get();

        $bestSellingProducts = Barang::select('kode_barang', 'nama', 'h_nomem')
                                ->where('unit', 'SERIES')
                                ->limit(8)
                                ->get();

        return view('frontend.index', 
                compact(
                    'bestSellingProducts', 
                    'bestOfPieces', 
                    'bestOfSeries')
                );
    }

}
