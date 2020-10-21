<?php

namespace App\Http\Livewire;

use App\Facades\Cart;
use App\Models\ShippingAddress;
use Kavist\RajaOngkir\Facades\RajaOngkir;
use Livewire\Component;
use DB;
use App\Models\Provinsi;
use App\Models\Kota;
use App\Models\Kecamatan;
use App\Http\Resources\CityResource;
use App\Http\Resources\SubdistrictResource;

class Checkout extends Component
{
    public $bankList;
    public $spbList;
    public $selectedBank;
    public $selectedSpb;
    public $defaultShippingAddress;
    public $shippingMethod;
    public $courier;
    public $totalItems;
    public $totalBerat;
    public $ongkosKirim;
    public $subtotal;
    public $kodeUnik;
    public $totalBayar;
    public $cartItems;
    public $note;
    public $user;
    public $inputsValid;
    public $daftarProvinsi;
    public $daftaralamatTujuan;
    public $alamatTujuan;

    // for address part
    public $nama;
    public $telepon;
    public $provinsi;
    public $kota;
    public $kecamatan;
    public $alamat;
    public $kode_pos;

    public $address;

    public $listKota;
    public $listKecamatan;

    public function mount()
    {
        $this->cartItems = Cart::get();
        $this->hitungTotalItems();
        $this->hitungTotalBerat();
        $this->hitungSubtotal();
        $this->generateKodeUnik();
        $this->hitungTotalBayar();
        // $this->saveNewAddress();
        $this->user = auth()->user();
        $this->bankList = array('BCA', 'BNI', 'BRI', 'MANDIRI');
        $this->spbList = $this->getSpbList();
        $this->defaultShippingAddress = ShippingAddress::where('user_id', $this->user->id)
                                            ->where('is_default', 1)
                                            ->first();
        $this->selectedSpb = "";
        $this->ongkosKirim = 0;
        $this->courier = "";
        $this->selectedBank = "";
        $this->note = "";
        $this->validateAllInputs();
        $this->daftarProvinsi = Provinsi::all();
        $this->daftaralamatTujuan = ShippingAddress::where('user_id', $this->user->id)->get();
        $this->alamatTujuan;

        // for address part
        $this->nama;
        $this->telepon;
        $this->provinsi;
        $this->kota;
        $this->kecamatan;
        $this->alamat;
        $this->kode_pos;

        $this->listKota;
        $this->listKecamatan;

    }

    public function resetAddressInputFields() {
        $this->nama = '';
        $this->telepon = '';
        $this->provinsi = '';
        $this->kota = '';
        $this->kecamatan = '';
        $this->alamat = '';
        $this->kode_pos = '';
    }

    public function hydrate()
    {
        if ($this->shippingMethod == "IMMEDIATE") {
            $this->ongkosKirim = 0;
            $this->courier = "";
        } else {
            $this->note = "";
        }

        $this->checkRajaOngkir();
        
        $this->hitungTotalBayar();

        $this->validateAllInputs();

        // get kota
        $this->getCitiesCheckout();

        // get kecamatan
        $this->getSubdistrictsCheckout();
    }

    public function checkRajaOngkir() {
        if ($this->courier && $this->defaultShippingAddress && $this->selectedSpb) {

            $spbIndex = 'SPB' . $this->selectedSpb;

            $rajaOngkir = RajaOngkir::ongkosKirim([
                'origin' => $this->defaultShippingAddress->kecamatan_id,
                'destination' => $this->spbList[$spbIndex]['subdistrict_id'],
                'weight' => $this->totalBerat * 1000,
                'courier' => strtolower($this->courier),
                'originType' => 'subdistrict',
                'destinationType' => 'subdistrict'
            ])->get()[0];
            
            if ($rajaOngkir['code'] == 'jne') {
                $this->ongkosKirim = $rajaOngkir['costs'][1]['cost'][0]['value'];
            } elseif ($rajaOngkir['code'] == 'J&T') {
                $this->ongkosKirim = $rajaOngkir['costs'][0]['cost'][0]['value'];
            }
        }
    }

    public function getCitiesCheckout() {
        if($this->provinsi != null) {
            $this->listKota = Kota::where('province_id', $this->provinsi)->get();
        }
    }

    public function getSubdistrictsCheckout() {
        if ($this->kota != null) {
            $this->listKecamatan = Kecamatan::where('city_id', $this->kota)->get();
        }
    }

    public function render()
    {
        return view('livewire.checkout');
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

    public function hitungTotalItems()
    {
        $totalItems = 0;

        foreach($this->cartItems as $cartItem) {
            $totalItems += $cartItem['qty'];
        }

        $this->totalItems = $totalItems;
    }

    public function hitungTotalBerat()
    {
        $totalBerat = 0;

        foreach($this->cartItems as $cartItem) {
            $totalBerat += $cartItem['total_berat'];
        }

        
        $totalBerat = $totalBerat / 1000;
        $totalBerat = round($totalBerat, 2);
        $angkaBulat = floor($totalBerat);
        $angkaPecahan = $totalBerat - $angkaBulat;
        
        if ($totalBerat > 1) {
            if ($angkaPecahan >= 0.25) {
                $this->totalBerat = ceil($totalBerat);
            } else {
                $this->totalBerat = $angkaBulat;
            }
        } else {
            $this->totalBerat = 1;
        }
    }

    public function generateKodeUnik()
    {
        $numbers = array(1, 2, 3, 4, 5, 6, 7, 8, 9);
        $randomIndex = array_rand($numbers, 3);
        $this->kodeUnik = $numbers[$randomIndex[0]] . $numbers[$randomIndex[1]] . $numbers[$randomIndex[2]];
    }

    public function hitungSubtotal()
    {
        $subtotal = 0;

        foreach($this->cartItems as $cartItem) {
            $subtotal += $cartItem['subtotal'];
        }

        $this->subtotal = $subtotal;
    }
    
    public function hitungTotalBayar()
    {
        $totalBayar = 0;

        $totalBayar = $this->subtotal + $this->ongkosKirim;

        $this->totalBayar = substr($totalBayar, 0, -3) . $this->kodeUnik;
    }

    public function gotoCheckoutPayment()  {

        // generate trasaction number
        $alphabet = [ "A", "B", "C", "D", "E", "F", "G", "H", "I", "J", "K", "L"];
        $transactionNumber = "TRX" . date('y') . $alphabet[date('m')-1] . date('d') . rand(1000,9999);

        // set sesion for transaction
        $summaryTrans = [
            'transactionNumber' => $transactionNumber,
            'shippingMethod' => $this->shippingMethod, //$request->shipping_method,
            'courier' => $this->courier, //$request->courier,
            'shippingAddressId' => $this->shippingMethod == 'EXPEDITION' ? $this->defaultShippingAddress->id : null, //$request->shipping_address_id,
            'subtotal' => $this->subtotal, //$request->subtotal,
            'ongkosKirim' => $this->ongkosKirim, //$request->request->shipping_fee,
            'totalBayar' => $this->totalBayar, //$request->grand_total,
            'totalBerat' => $this->totalBerat, //$request->total_berat,
            'note' => $this->note, //$request->note,
            'selectedSpb' => $this->selectedSpb, //$request->kode_spb,
            'selectedBank' => $this->selectedBank, //$request->bank,
            'totalItems' => $this->totalItems, //$request->bank,
        ];

        session($summaryTrans);

        return redirect()->route('checkout-payment');
    }

    // change the adefault  adress
    public function saveSelectAddress() {
        if($this->alamatTujuan != '') {

            // update the other shipping address
            ShippingAddress::where('user_id', $this->user->id)->update([
                'is_default' => 0
            ]);

            // set the selected address to be default
            ShippingAddress::where('id', $this->alamatTujuan)->update([
                'is_default' => 1
            ]);

            // set default shiping address
            $this->defaultShippingAddress = ShippingAddress::where('user_id', $this->user->id)
                                                            ->where('is_default', 1)
                                                            ->first();

            // check raja ongkir
            $this->checkRajaOngkir();

            // flash
            flash('Alamat berhasil dijadikan sebagai default')->success();
        }        
    }

    // untuk menyimpan alamat baru
    public function saveNewAddress() {
        
        $this->validate([
            'nama' => 'required',
            'telepon' => 'required',
            'provinsi' => 'required',
            'kota' => 'required',
            'kecamatan' => 'required',
            'alamat' => 'required'
        ]);

        $provinsi   = Provinsi::select('province_id','name')->where('province_id',$this->provinsi)->first();
        $kota       = Kota::select('city_id','name')->where('city_id',$this->kota)->first();
        $kecamatan  = Kecamatan::select('subdistrict_id','name')->where('subdistrict_id',$this->kecamatan)->first();

        // $isAvailable = ShippingAddress::where('user_id', $this->user->id)->count();

        $input = [
            'user_id' => $this->user->id,
            'nama' => $this->nama,
            'telepon' => $this->telepon,
            'provinsi_id' => $this->provinsi,
            'provinsi_nama' => $provinsi->name,
            'kota_id' => $this->kota,
            'kota_nama' => $kota->name,
            'kecamatan_id' => $this->kecamatan,
            'kecamatan_nama' => $kecamatan->name,
            'alamat' => $this->alamat,
            'kode_pos' => $this->kode_pos,
            'is_default' => 1
        ];

        // update the other shipping address
        ShippingAddress::where('user_id', $this->user->id)->update([
            'is_default' => 0
        ]);

        ShippingAddress::create($input);

        // set default shiping address
        $this->defaultShippingAddress = ShippingAddress::where('user_id', $this->user->id)
                                            ->where('is_default', 1)
                                            ->first();
        
        // check raja ongkir
        $this->checkRajaOngkir();

        // flash
        flash('Alamat baru berhasil ditambahkan dan dijadikan sebagai default')->success();

        $this->resetAddressInputFields();
    }

    // will be change to next checkout payment
    public function saveTransaction()
    {
        DB::beginTransaction();

        try {

            $alphabet = [ "A", "B", "C", "D", "E", "F", "G", "H", "I", "J", "K", "L"];

            $transactionNumber = "TRX" . date('y') . $alphabet[date('m')-1] . date('d') . rand(1000,9999);

            DB::insert('INSERT INTO cn_transaksi (
                            tgl_transaksi,
                            nomor_transaksi,
                            no_member,
                            user_id,
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
                            $this->user->no_member, //$customer->no_member,
                            $this->user->id, //$customer->id,
                            $this->user->name, //$customer->name,
                            $this->shippingMethod, //$request->shipping_method,
                            $this->courier, //$request->courier,
                            $this->shippingMethod == 'EXPEDITION' ? $this->defaultShippingAddress->id : null, //$request->shipping_address_id,
                            $this->subtotal, //$request->subtotal,
                            $this->ongkosKirim, //$request->request->shipping_fee,
                            $this->totalBayar, //$request->grand_total,
                            $this->totalBerat, //$request->total_berat,
                            $this->note, //$request->note,
                            $this->selectedSpb, //$request->kode_spb,
                            'SHOP',
                            $this->selectedBank, //$request->bank,
                            'PLACE ORDER',
                        ]
            );
    
            $transactionId = DB::getPDO()->lastInsertId();
            
            $cartItems = Cart::get();

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
            
            if ($this->selectedSpb == "00000") {

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
                            $currentQuantity = DB::table('tb_produk')->select('stok')->where('kode_barang', $serieItem->kode_barang)->where('no_member', $this->selectedSpb)->first()->stok;
                            DB::table('tb_produk')->where('kode_barang', $serieItem->kode_barang)->where('no_member', $this->selectedSpb)->update(['stok' => $currentQuantity - ($serieItem->jumlah * $item['qty'])]);
                        }
                    } else {
                        $currentQuantity = DB::table('tb_produk')->select('stok')->where('kode_barang', $item['kode_barang'])->where('no_member', $this->selectedSpb)->first()->stok;
                        DB::table('tb_produk')->where('kode_barang', $item['kode_barang'])->where('no_member', $this->selectedSpb)->update(['stok' => $currentQuantity - $item['qty']]);
                    }
                }
            }

            DB::commit();

            foreach ($cartItems as $cartItem) {
                Cart::remove($cartItem['kode_barang']);
            }
    
            session()->flash('success', 'Transaksi berhasil!');
            return redirect()->route('order-history-status');
        } catch (\Exception $e) {
            DB::rollback();
            dd($e->getMessage());
            // return redirect()->back()->with(['error' => $e->getMessage()]);
        }
    }

    public function validateAllInputs()
    {
        if (!$this->selectedSpb) {
            $this->inputsValid = false;
            return;
        }

        if (!$this->shippingMethod) {
            $this->inputsValid = false;
            return;
        }

        if ($this->shippingMethod == 'EXPEDITION' && !$this->courier) {
            $this->inputsValid = false;
            return;
        }

        $this->inputsValid = true;
    }
}
