<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use Illuminate\Http\Request;
use DB;

class IndexController extends Controller
{
    public function index()
    {

        $bestOfPieces = Barang::join('tb_det_jual', 'tb_det_jual.kode_barang', '=', 'tb_barang.kode_barang')
                        ->select('tb_barang.kode_barang', 'tb_barang.nama', 'tb_barang.h_nomem AS harga', DB::raw('SUM(tb_det_jual.jumlah) as jumlah_jual'))
                        ->where('tb_barang.unit', 'PIECES')
                        ->groupBy('tb_barang.kode_barang', 'tb_barang.nama')
                        ->orderBy('jumlah_jual', 'desc')
                        ->limit(5)
                        ->get();

        $bestOfSeries = Barang::join('tb_det_jual', 'tb_det_jual.kode_barang', '=', 'tb_barang.kode_barang')
                        ->select('tb_barang.kode_barang', 'tb_barang.nama', 'tb_barang.h_nomem AS harga', DB::raw('SUM(tb_det_jual.jumlah) as jumlah_jual'))
                        ->where('tb_barang.unit', 'SERIES')
                        ->groupBy('tb_barang.kode_barang', 'tb_barang.nama')
                        ->orderBy('jumlah_jual', 'desc')
                        ->limit(5)
                        ->get();

        $bestSellingProducts = Barang::with('barangImages')
                                // ->select('kode_barang', 'nama', 'h_nomem')
                                // ->where('unit', 'SERIES')
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
