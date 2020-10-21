<?php

namespace App\Http\Livewire;

use App\Facades\Cart;
use App\Models\ShippingAddress;
use Kavist\RajaOngkir\Facades\RajaOngkir;
use Livewire\Component;
use DB;

class CheckoutPayment extends Component
{
    public $spbList;
    public $selectedBank;
    public $bankList;
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
    public $transactionNumber;
    public $shippingAddressId;

    public function mount()
    {
        // dd(session()->all());
        $this->bankList = array('BCA', 'BNI', 'BRI', 'MANDIRI');
        $this->cartItems = Cart::get();
        $this->user = auth()->user();
        $this->defaultShippingAddress = ShippingAddress::where('user_id', $this->user->id)->where('is_default', 1)->first();
        $this->transactionNumber = session('transactionNumber');
        $this->shippingMethod = session('shippingMethod');
        $this->shippingAddressId = session('shippingAddressId');
        $this->selectedSpb = session('selectedSpb');
        $this->ongkosKirim = session('ongkosKirim');
        $this->courier = session('courier');
        $this->selectedBank = session('selectedBank');
        $this->note = session('note');
        $this->subtotal = session('subtotal');
        $this->totalBayar = session('totalBayar');
        $this->totalBerat = session('totalBerat');
        $this->totalItems = session('totalItems');
        $this->validateAllInputs();
    }

    public function hydrate()
    {
        $this->validateAllInputs();
    }

    public function render()
    {
        return view('livewire.checkout-payment');
    }
    
    public function saveTransaction()
    {
        DB::beginTransaction();

        try {
            
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
                            $this->transactionNumber,
                            $this->user->no_member, //$customer->no_member,
                            $this->user->id, //$customer->id,
                            $this->user->name, //$customer->name,
                            $this->shippingMethod, //$request->shipping_method,
                            $this->courier, //$request->courier,
                            $this->shippingAddressId, //$request->shipping_address_id,
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

            // insert into transaction detail
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

            // insert into order history
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
        if (!$this->selectedBank) {
            $this->inputsValid = false;
            return;
        }

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
