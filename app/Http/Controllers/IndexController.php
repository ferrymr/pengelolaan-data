<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Slider;
use App\Models\TbHeadJual;
use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Auth;

class IndexController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        // todo change best of piece to flag
        $bestSellingProducts = Barang::with('barangImages')
                ->where('flag_bestseller', 1)
                // ->where('stok','>',0)
                ->where('stats',1)
                ->limit(8)
                ->get();

        $promoProducts = Barang::with('barangImages')
                ->where('flag_promo', 1)
                // ->where('stok','>',0)
                ->where('stats',1)
                ->limit(8)
                ->get();

        $sliders = Slider::get();

        return view('frontend.index', 
                compact(
                    'bestSellingProducts', 
                    'promoProducts',
                    'sliders'
                )
            );
    }

    public function cronCancelProduct() {
        $transactions = TbHeadJual::with('items')
                            ->where('status_transaksi', "PLACE ORDER")
                            ->where('tanggal', '<=', date("Y-m-d"))
                            ->get();

        foreach($transactions as $transaction) {
            // update status transaksi
            $update = TbHeadJual::find($transaction->id)
                                // ->first();
                                ->update(['status_transaksi' => 'CANCEL']);

            foreach($transaction->items as $row) {

                if($row->unit == "SERIES") {
                    // get id from code barang
                    $barang = Barang::where('kode_barang', $row->kode_barang)->first();

                    $serieItems = TbDetSeries::where('tb_series_id', $barang->id)
                                            ->get();
                        
                    foreach($serieItems as $serieItem) {
                        $currentQuantity = Barang::select('stok')
                                            ->where('id', $serieItem->tb_barang_id)
                                            ->first()
                                            ->stok;
                        Barang::where('id', $serieItem->tb_barang_id)
                            ->update(['stok' => $currentQuantity - ($serieItem->qty * $row->jumlah)]);
                    }

                } else {
                    // get last stock
                    $barang = Barang::where('kode_barang', $row->kode_barang)
                                    ->first();

                    Barang::where('kode_barang', $row->kode_barang)
                            ->update(['stok' => ($barang->stok + $row->jumlah)]);
                }
                
            }
        }

        return "<h1>Sukses gan!</h1>";        
    }

}
