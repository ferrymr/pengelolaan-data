<?php

namespace App\Http\Controllers;

use App\Facades\Cart;
use App\ShippingAddress;
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

            $user = auth()->user();

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
                            $user->no_member, //$customer->member_id,
                            $user->id, //$customer->id,
                            $user->name, //$customer->name,
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

    public function changeStatus($transactionId, $status)
    {
        if ($status == 'CANCELLED') {
            $this->cancel($transactionId);
        }

        DB::table('cn_transaksi')->where('id', $transactionId)->update(['status_transaksi' => $status]);
        DB::insert('INSERT INTO cn_order_history (transaksi_id, tanggal, keterangan ) VALUES (?, ?, ?)', [
            $transactionId,
            date('Y-m-d H:i:s'),
            $status
        ]);

        return redirect()->route('order-history-status')->with(['success' => 'Informasi transaksi berhasil diubah!']);

    }

    public function checkout()
    {
        $bankList = array('BCA', 'BNI', 'BRI', 'MANDIRI');
        $spbList = $this->getSpbList();
        $user = auth()->user();
        $defaultShippingAddress = ShippingAddress::where('user_id', $user->id)->where('is_default', 1);

        // dd($defaultShippingAddress);
        
        return view('checkout', compact('bankList', 'spbList', 'defaultShippingAddress'));
    }

    public function getSpbList()
    {
        $spbList = array(
            'SPB00000' => array (
                'code' => '00000',
                'province_id' => 9,
                'city_id' => 23,
                'city_name' => 'BANDUNG',
                'subdistrict_id' => 359,
                'subdistrict_name' => 'Lengkong',
                'phone' => '+6282119163629',
                'disabled' => ''
            ),
            'SPB00014' => array (
                'code' => '00014',
                'province_id' => 9,
                'city_id' => 23,
                'city_name' => 'BANDUNG',
                'subdistrict_id' => 361,
                'subdistrict_name' => 'Panyileukan',
                'phone' => '-',
                'disabled' => ''
            ),
            'SPB13722' => array (
                'code' => '13722',
                'province_id' => 9,
                'city_id' => 54,
                'city_name' => 'BEKASI',
                'subdistrict_id' => 733,
                'subdistrict_name' => 'Cikarang Selatan',
                'phone' => '-',
                'disabled' => ''
            ),
            'SPB00217' => array (
                'code' => '00217',
                'province_id' => 9,
                'city_id' => 55,
                'city_name' => 'BEKASI',
                'subdistrict_id' => 757,
                'subdistrict_name' => 'Mustika Jaya',
                'phone' => '+6281360360688',
                'disabled' => ''
            ),
            'SPB00553' => array (
                'code' => '00553',
                'province_id' => 9,
                'city_id' => 79,
                'city_name' => 'BOGOR',
                'subdistrict_id' => 1067,
                'subdistrict_name' => 'Tanah Sereal',
                'phone' => '+6289513313909',
                'disabled' => ''
            ),
            'SPB05624' => array (
                'code' => '05624',
                'province_id' => 9,
                'city_id' => 104,
                'city_name' => 'CIANJUR',
                'subdistrict_id' => 1415,
                'subdistrict_name' => 'Cikalong',
                'phone' => '-',
                'disabled' => ''
            ),
            'SPB15658' => array (
                'code' => '15658',
                'province_id' => 9,
                'city_id' => 115,
                'city_name' => 'DEPOK',
                'subdistrict_id' => 1585,
                'subdistrict_name' => 'Sawangan',
                'phone' => '-',
                'disabled' => ''
            ),
            'SPB00985' => array (
                'code' => '00985',
                'province_id' => 3,
                'city_id' => 232,
                'city_name' => 'LEBAK',
                'subdistrict_id' => 3308,
                'subdistrict_name' => 'Cilograng',
                'phone' => '-',
                'disabled' => ''
            ),
            'SPB00539' => array (
                'code' => '00539',
                'province_id' => 34,
                'city_id' => 278,
                'city_name' => 'MEDAN',
                'subdistrict_id' => 3918,
                'subdistrict_name' => 'Medan Marelan',
                'phone' => '+6287868981767',
                'disabled' => ''
            ),
            'SPB00042' => array (
                'code' => '00042',
                'province_id' => 9,
                'city_id' => 430,
                'city_name' => 'PELABUHAN RATU',
                'subdistrict_id' => 5954,
                'subdistrict_name' => 'Pelabuhan/Palabuhan Ratu',
                'phone' => '+6281337479174',
                'disabled' => ''
            ),
            'SPB01835' => array (
                'code' => '01835',
                'province_id' => 9,
                'city_id' => 376,
                'city_name' => 'PURWAKARTA',
                'subdistrict_old_id' => 5954,
                'subdistrict_id' => 5218,
                'subdistrict_name' => 'Bojong',
                'phone' => '-',
                'disabled' => ''
            ),
            'SPB01838' => array (
                'code' => '01838',
                'province_id' => 10,
                'city_id' => 41,
                'city_name' => 'PURWOKERTO',
                'subdistrict_id' => 591,
                'subdistrict_name' => 'Purwokerto Timur',
                'phone' => '+6283818235538',
                'disabled' => ''
            ),
            'SPB00005' => array (
                'code' => '00005',
                'province_id' => 9,
                'city_id' => 431,
                'city_name' => 'SUKABUMI',
                'subdistrict_id' => 5936,
                'subdistrict_name' => 'Cisaat',
                'phone' => '+6281563205235',
                'disabled' => ''
            ),
            'SPB01340' => array (
                'code' => '01340',
                'province_id' => 9,
                'city_id' => 430,
                'city_name' => 'SUKABUMI',
                'subdistrict_id' => 5951,
                'subdistrict_name' => 'Pabuaran',
                'phone' => '+6285798847881',
                'disabled' => ''
            ),
            'SPB00004' => array (
                'code' => '00004',
                'province_id' => 3,
                'city_id' => 457,
                'city_name' => 'TANGERANG SELATAN',
                'subdistrict_id' => 6313,
                'subdistrict_name' => 'Pondok Aren',
                'phone' => '-',
                'disabled' => ''
            )
        );

        // ---- NOTE: NANTI CEK DI SPB MANA YANG STOKNYA GAADA DAN ITEM APA
        $cartItems = Cart::get();

        // TAMPUNG SEMUA ITEM, TERMASUK ISI DARI ITEM SERIES
        $newCartItems = array();

        foreach ($cartItems as $cartItem) {

            if ($cartItem['unit'] == 'SERIES') {

                $serieItems = DB::table('tb_det_pack')->select('kode_barang', 'jumlah')->where('kode_pack', $cartItem['kode_barang'])->get();
                
                foreach ($serieItems as $serieItem) {

                    $newCartItems[] = array('kode_barang' => $serieItem->kode_barang, 'qty' => $serieItem->jumlah * $cartItem['qty']);
                    
                }

            } else {

                $newCartItems[] = array('kode_barang' => $cartItem['kode_barang'], 'qty' => $cartItem['qty']);

            }
        }

        // CHECK KETERSEDIAAN STOK DI MASING-MASING SPB
        // JIKA STOK TIDAK TERSEDIA DI SALAH SATU SPB, MAKA DISABLE SPB TERSEBUT
        foreach($spbList as $spb) {

            foreach ($newCartItems as $newCartItem) {

                $spbIndex = 'SPB' . $spb['code'];

                if ($spb['code'] == '00000') {

                    $stockAvailable = DB::table('tb_barang')
                        ->where('kode_barang', $newCartItem['kode_barang'])
                        ->where('stok', '>=', $newCartItem['qty'])
                        ->count();

                    // JIKA SALAH SATU STOK ITEM TIDAK MENCUKUPI DI SPB, SKIP PERULANGAN
                    // TIDAK PERLU CHECK STOK ITEM YANG LAIN, KARENA JIKA SALAH SATU ITEM STOKNYA TIDAK AVAILABLE DI SPB
                    // MAKA OTOMATIS SPB ITU AKAN DI DISABLE DI FRONT-END
                    if ($stockAvailable < 1) {
                        $spbList[$spbIndex]['disabled'] = 'disabled';
                        continue 2;
                    }

                } else {

                    $stockAvailable = DB::table('tb_produk')
                        ->where('no_member', $spb['code'])
                        ->where('kode_barang', $newCartItem['kode_barang'])
                        ->where('stok', '>=', $newCartItem['qty'])
                        ->count();

                    // JIKA SALAH SATU STOK ITEM TIDAK MENCUKUPI DI SPB, SKIP PERULANGAN
                    // TIDAK PERLU CHECK STOK ITEM YANG LAIN, KARENA JIKA SALAH SATU ITEM STOKNYA TIDAK AVAILABLE DI SPB
                    // MAKA OTOMATIS SPB ITU AKAN DI DISABLE DI FRONT-END
                    if ($stockAvailable < 1) {
                        $spbList[$spbIndex]['disabled'] = 'disabled';
                        continue 2;
                    }
                }
            }
        }

        return $spbList;
    }

    public function cancel($transactionId)
    {
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

            DB::table('cn_transaksi')->where('id', $transactionId)->delete();
            
            DB::table('cn_transaksi_detail')->where('transaksi_id', $transactionId)->delete();
            



            DB::table('cn_order_history')->where('transaksi_id', $transactionId)->delete();


            DB::commit();
    
            // return redirect()->route('officer.index')->with(['success' => 'Transaksi berhasil']);
        } catch (\Exception $e) {
            DB::rollback();
            dd($e->getMessage());
            // return redirect()->back()->with(['error' => $e->getMessage()]);
        }
    }
}
