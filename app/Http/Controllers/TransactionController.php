<?php

namespace App\Http\Controllers;

use App\Facades\Cart;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DB;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $transactionNumber = "TRX000";
        $customer = 1; //Auth::user()->id;

        DB::beginTransaction();

        try {

            $alphabet = [ "A", "B", "C", "D", "E", "F", "G", "H", "I", "J", "K", "L"];

            $transactionNumber = "TRX" . date('y') . $alphabet[date('m')-1] . date('d') . rand(1000,9999);

            $spbCode = '00000';
            // $spbCode = '01340';

            DB::insert('INSERT INTO cn_transaksi (
                            tgl_transaksi,
                            nomor_transaksi,
                            member_id,
                            customer_id,
                            nama,
                            metode_pengiriman,
                            kurir,
                            shipping_address_id,
                            subtotal,
                            shipping_fee,
                            grand_total,
                            total_berat,
                            note,
                            kode_spb,
                            jenis_platform,
                            bank,
                            status_transaksi
                        ) VALUES ( ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ? )', 
                        [
                            date('Y-m-d'),
                            $transactionNumber,
                            1, //$customer->member_id,
                            1, //$customer->id,
                            1, //$customer->name,
                            1, //$request->shipping_method,
                            1, //$request->courier,
                            1, //$request->shipping_address_id,
                            1, //$request->subtotal,
                            1, //$request->request->shipping_fee,
                            1, //$request->grand_total,
                            1, //$request->total_berat,
                            1, //$request->note,
                            $spbCode, //$request->kode_spb,
                            'SHOP',
                            1, //$request->bank,
                            'PLACEORDER',
                        ]
            );
    
            $transactionId = DB::getPDO()->lastInsertId();
            
            $cartItems = Cart::get();

            // dd($cartItems);

            if (count($cartItems) < 1) {
                throw new \Exception("No items in the cart!");
            }

            foreach($cartItems as $item) {
                DB::insert('INSERT INTO cn_transaksi_detail (
                        transaksi_id,
                        kode_barang,
                        harga,
                        qty,
                        subtotal,
                        total_vc,
                        total_poin,
                        note,
                        promo
                    ) VALUES ( ?, ?, ?, ?, ?, ?, ?, ?, ?)', 
                    [
                        $transactionId,
                        $item['kode_barang'],
                        $item['h_nomem'],
                        $item['qty'],
                        $item['h_nomem'] * $item['qty'],
                        0,
                        0,
                        '',
                        0
                    ]
                );
            }

            DB::insert('INSERT INTO cn_order_history (
                    transaksi_id,
                    tanggal,
                    keterangan
                ) VALUES ( ?, ?, ?)', 
                [
                    $transactionId,
                    date('Y-m-d H:i:s'),
                    'PLACE ORDER'
                ]
            );
            
            if ($spbCode == "00000") {

                foreach($cartItems as $item) {
                    if ($item['unit'] == "SERIES") {

                        $serieItems = DB::table('tb_det_pack')->select('kode_barang', 'jumlah')->where('kode_pack', $item['kode_barang'])->get();
                        
                        foreach($serieItems as $serieItem) {
                            $currentQuantity = DB::table('tb_barang')->select('stok')->where('kode_barang', $serieItem->kode_barang)->first()->stok;
                            DB::table('tb_barang')->where('kode_barang', $serieItem->kode_barang)->update(['stok' => $currentQuantity - ($serieItem->jumlah * $item['qty'])]);
                        }
                    } else {
                        $currentQuantity = DB::table('tb_barang')->select('stok')->where('kode_barang', $item['kode_barang'])->first()->stok;
                        DB::table('tb_barang')->where('kode_barang', $item['kode_barang'])->update(['stok' => $currentQuantity - $item['qty']]);
                    }
                }
            } else {
                foreach($cartItems as $item) {
                    if ($item['unit'] == "SERIES") {

                        $serieItems = DB::table('tb_det_pack')->select('kode_barang', 'jumlah')->where('kode_pack', $item['kode_barang'])->get();
                        
                        foreach($serieItems as $serieItem) {
                            $currentQuantity = DB::table('tb_produk')->select('stok')->where('kode_barang', $serieItem->kode_barang)->where('no_member', $spbCode)->first()->stok;
                            DB::table('tb_produk')->where('kode_barang', $serieItem->kode_barang)->where('no_member', $spbCode)->update(['stok' => $currentQuantity - ($serieItem->jumlah * $item['qty'])]);
                        }
                    } else {
                        $currentQuantity = DB::table('tb_produk')->select('stok')->where('kode_barang', $item['kode_barang'])->where('no_member', $spbCode)->first()->stok;
                        DB::table('tb_produk')->where('kode_barang', $item['kode_barang'])->where('no_member', $spbCode)->update(['stok' => $currentQuantity - $item['qty']]);
                    }
                }
            }

            DB::commit();
    
            // return redirect()->route('officer.index')->with(['success' => 'Transaksi berhasil']);
        } catch (\Exception $e) {
            DB::rollback();
            dd($e->getMessage());
            // return redirect()->back()->with(['error' => $e->getMessage()]);
        }
    }

    public function destroy()
    {
        $transactionId = 265; // 223;

        DB::beginTransaction();

        try {

            $spbCode = DB::table('cn_transaksi')->select('kode_spb')->where('id', $transactionId)->first()->kode_spb;

            //  1
            // di inner join barang yang muncul cuman 1
            // mungkin gara-gara ada kode barang yang awalnya 0 jadinya pas di join on nggak exact perbandingannya
            $orderedItems = DB::table('cn_transaksi_detail')
                                ->join('cn_barang', 'cn_barang.kode_barang', '=', 'cn_transaksi_detail.kode_barang')
                                ->select('cn_transaksi_detail.kode_barang', 'cn_transaksi_detail.qty', 'cn_barang.unit')
                                ->where('transaksi_id', $transactionId)
                                ->get();

            if ($spbCode == "00000") {
                
                foreach($orderedItems as $orderedItem) {
                    
                    if ($orderedItem->unit == "SERIES") {
                        
                        $serieItems = DB::table('tb_det_pack')->select('kode_barang', 'jumlah')->where('kode_pack', $orderedItem->kode_barang)->get();
                        
                        foreach($serieItems as $serieItem) {
                            $currentQuantity = DB::table('tb_barang')->select('stok')->where('kode_barang', $serieItem->kode_barang)->first()->stok;
                            DB::table('tb_barang')->where('kode_barang', $serieItem->kode_barang)->update(['stok' => $currentQuantity + ($serieItem->jumlah * $orderedItem->qty)]);
                        }

                    } else {
                        $currentQuantity = DB::table('tb_barang')->select('stok')->where('kode_barang', $orderedItem->kode_barang)->first()->stok;
                        DB::table('tb_barang')->where('kode_barang', $orderedItem->kode_barang)->update(['stok' => $currentQuantity + $orderedItem->qty]);
                    }

                }
                
                // 2
                // TEST DULU GAN KALO DAH BERHASIL BARU LANJUT KE YANG LAIN
                // HAPUS DARI DETAIL KE MASTER
                // SING SABAR BESOK BERES MAH JONGJON

            } else {

                foreach($orderedItems as $orderedItem) {
                    
                    if ($orderedItem->unit == "SERIES") {
                        
                        $serieItems = DB::table('tb_det_pack')->select('kode_barang', 'jumlah')->where('kode_pack', $orderedItem->kode_barang)->get();
                        
                        foreach($serieItems as $serieItem) {
                            $currentQuantity = DB::table('tb_produk')->select('stok')->where('kode_barang', $serieItem->kode_barang)->where('no_member', $spbCode)->first()->stok;
                            DB::table('tb_produk')->where('kode_barang', $serieItem->kode_barang)->where('no_member', $spbCode)->update(['stok' => $currentQuantity + ($serieItem->jumlah * $orderedItem->qty)]);
                        }

                    } else {
                        $currentQuantity = DB::table('tb_produk')->select('stok')->where('kode_barang', $orderedItem->kode_barang)->where('no_member', $spbCode)->first()->stok;
                        DB::table('tb_produk')->where('kode_barang', $orderedItem->kode_barang)->where('no_member', $spbCode)->update(['stok' => $currentQuantity + $orderedItem->qty]);
                    }

                }
            }

            // DB::table('cn_transaksi')->where('id', $transactionId)->delete();
            
            // DB::table('cn_transaksi_detail')->where('transaksi_id', $transactionId)->delete();
            



            // DB::table('cn_order_history')->where('transaksi_id', $transactionId)->delete();


            DB::commit();
    
            // return redirect()->route('officer.index')->with(['success' => 'Transaksi berhasil']);
        } catch (\Exception $e) {
            DB::rollback();
            dd($e->getMessage());
            // return redirect()->back()->with(['error' => $e->getMessage()]);
        }
    }
}
