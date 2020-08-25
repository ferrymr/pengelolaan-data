<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Facades\Cart;
use DB;

class SpbController extends Controller
{
    public $spbList;

    public function __construct()
    {
        $this->spbList = array(
            'SPB00000' => array (
                'code' => '00000',
                'province_id' => 9,
                'city_id' => 23,
                'city_name' => 'BANDUNG',
                'subdistrict_id' => 359,
                'subdistrict_name' => 'Lengkong',
                'phone' => '+6282119163629',
                'disabled' => false
            ),
            'SPB00014' => array (
                'code' => '00014',
                'province_id' => 9,
                'city_id' => 23,
                'city_name' => 'BANDUNG',
                'subdistrict_id' => 361,
                'subdistrict_name' => 'Panyileukan',
                'phone' => '-',
                'disabled' => false
            ),
            'SPB13722' => array (
                'code' => '13722',
                'province_id' => 9,
                'city_id' => 54,
                'city_name' => 'BEKASI',
                'subdistrict_id' => 733,
                'subdistrict_name' => 'Cikarang Selatan',
                'phone' => '-',
                'disabled' => false
            ),
            'SPB00217' => array (
                'code' => '00217',
                'province_id' => 9,
                'city_id' => 55,
                'city_name' => 'BEKASI',
                'subdistrict_id' => 757,
                'subdistrict_name' => 'Mustika Jaya',
                'phone' => '+6281360360688',
                'disabled' => false
            ),
            'SPB00553' => array (
                'code' => '00553',
                'province_id' => 9,
                'city_id' => 79,
                'city_name' => 'BOGOR',
                'subdistrict_id' => 1067,
                'subdistrict_name' => 'Tanah Sereal',
                'phone' => '+6289513313909',
                'disabled' => false
            ),
            'SPB05624' => array (
                'code' => '05624',
                'province_id' => 9,
                'city_id' => 104,
                'city_name' => 'CIANJUR',
                'subdistrict_id' => 1415,
                'subdistrict_name' => 'Cikalong',
                'phone' => '-',
                'disabled' => false
            ),
            'SPB15658' => array (
                'code' => '15658',
                'province_id' => 9,
                'city_id' => 115,
                'city_name' => 'DEPOK',
                'subdistrict_id' => 1585,
                'subdistrict_name' => 'Sawangan',
                'phone' => '-',
                'disabled' => false
            ),
            'SPB00985' => array (
                'code' => '00985',
                'province_id' => 3,
                'city_id' => 232,
                'city_name' => 'LEBAK',
                'subdistrict_id' => 3308,
                'subdistrict_name' => 'Cilograng',
                'phone' => '-',
                'disabled' => false
            ),
            'SPB00539' => array (
                'code' => '00539',
                'province_id' => 34,
                'city_id' => 278,
                'city_name' => 'MEDAN',
                'subdistrict_id' => 3918,
                'subdistrict_name' => 'Medan Marelan',
                'phone' => '+6287868981767',
                'disabled' => false
            ),
            'SPB00042' => array (
                'code' => '00042',
                'province_id' => 9,
                'city_id' => 430,
                'city_name' => 'PELABUHAN RATU',
                'subdistrict_id' => 5954,
                'subdistrict_name' => 'Pelabuhan/Palabuhan Ratu',
                'phone' => '+6281337479174',
                'disabled' => false
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
                'disabled' => false
            ),
            'SPB01838' => array (
                'code' => '01838',
                'province_id' => 10,
                'city_id' => 41,
                'city_name' => 'PURWOKERTO',
                'subdistrict_id' => 591,
                'subdistrict_name' => 'Purwokerto Timur',
                'phone' => '+6283818235538',
                'disabled' => false
            ),
            'SPB00005' => array (
                'code' => '00005',
                'province_id' => 9,
                'city_id' => 431,
                'city_name' => 'SUKABUMI',
                'subdistrict_id' => 5936,
                'subdistrict_name' => 'Cisaat',
                'phone' => '+6281563205235',
                'disabled' => false
            ),
            'SPB01340' => array (
                'code' => '01340',
                'province_id' => 9,
                'city_id' => 430,
                'city_name' => 'SUKABUMI',
                'subdistrict_id' => 5951,
                'subdistrict_name' => 'Pabuaran',
                'phone' => '+6285798847881',
                'disabled' => false
            ),
            'SPB00004' => array (
                'code' => '00004',
                'province_id' => 3,
                'city_id' => 457,
                'city_name' => 'TANGERANG SELATAN',
                'subdistrict_id' => 6313,
                'subdistrict_name' => 'Pondok Aren',
                'phone' => '-',
                'disabled' => false
            )
        );
    }

    public function check()
    {
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
        foreach($this->spbList as $spb) {

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
                        $this->spbList[$spbIndex]['disabled'] = true;
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
                        $this->spbList[$spbIndex]['disabled'] = true;
                        continue 2;
                    }
                }
            }
        }

        echo "<pre>";
        var_dump($newCartItems);
        echo "</pre>";

        echo "<pre>";
        var_dump($this->spbList);
        echo "</pre>";
        exit();

        return $this->spbList;
    }

    public function checkSeriesItemAvailability($spbCode, $serieCode, $qty)
    {
        $serieItems = DB::table('tb_det_pack')->select('kode_barang')->where('kode_pack', $serieCode)->get();

        foreach ($serieItems as $serieItem) {

            if ($spbCode == '00000') {

                $stockAvailable = DB::table('tb_barang')
                    ->where('kode_barang', $serieItem->kode_barang)
                    ->where('stok', '>=', $qty)
                    ->count();

                if ($stockAvailable < 1) {
                    return false;
                }

            } else {

                $stockAvailable = DB::table('tb_produk')
                    ->where('no_member', $spbCode)
                    ->where('kode_barang', $serieItem->kode_barang)
                    ->where('stok', '>=', $qty)
                    ->count();

                if ($stockAvailable < 1) {
                    return false;
                }
            }
        }

        return true;
    }
}
