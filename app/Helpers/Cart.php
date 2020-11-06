<?php

namespace App\Helpers;
use App\Models\Barang;
use Illuminate\Support\Facades\Auth;

class Cart
{
    public function __construct()
    {
        if ($this->get() == null) {
            $this->set($this->empty());
        }
    }

    public function empty()
    {
        return [];
    }

    public function get()
    {
        return session()->get('cart');
    }

    public function set($cart)
    {
        session()->put('cart', $cart);
    }

    public function add(Barang $product)
    {
        $cart = $this->get();
        $user = Auth::user();

        $productCode = (strlen($product->kode_barang) < 5 ? 
                    str_pad($product->kode_barang, 5, '0', STR_PAD_LEFT) : 
                    (string) $product->kode_barang);
        // $productCode = $product->kode_barang;

        // KODE BARANG YANG DIAWALI ANGKA 0, BIASANYA HILANG ANGKA 0 AWALNYA
        // TERUTAMA KETIKA DI RE-RENDER OLEH LIVEWIRE, KARENA OTOMATIS DI KONVERSI MENJADI INTEGER
        // JIKA ANGKA 0 DI AWAL PADA KODE BARANG HILANG MAKA TAMBAHKAN KARAKTER DI AWALNYA
        // SUPAYA TIDAK DI KONVERSI MENJADI INTEGER
        $cartIndex = 'x' . $productCode;

        // dd($cartIndex);

        // define user price
        if(!isset($user) || $user->hasRole('user')) {
            $harga = $product->h_nomem;
            $poin = 0;
        } else {
            $harga = $product->h_member;
            $poin = $product->poin;
        }

        // get diskon
        if($product->diskon > 0) {
            $harga = $harga - ($harga * ($product->diskon/100));
        }

        if(!isset($cart[$cartIndex])) {

            // KODE BARANG YANG DIAWALI ANGKA 0, BIASANYA HILANG ANGKA 0 AWALNYA
            // JIKA ANGKA 0 DI AWAL PADA KODE BARANG HILANG MAKA TAMBAHKAN ANGKA 0 NYA 
            // $productCode = (strlen($product->kode_barang) < 5 ? sprintf('%05d', $product->kode_barang) : (string) $product->kode_barang); // sprintf('%05d', $product->kode_barang);

            // $productCode = $product->kode_barang;

            $cart[$cartIndex] = array(
                    'barang_id' => $product->id,
                    'kode_barang' => $productCode,
                    'nama' => $product->nama,
                    'jenis' => $product->jenis,
                    'unit' => $product->unit,
                    'h_nomem' => $harga,
                    'berat' => $product->berat,
                    'poin' => $poin,
                    'total_berat' => $product->qty * $product->berat,
                    'subtotal' => $product->qty * $harga,
                    'qty' => $product->qty,
                    'note' => '',
                    'barang_image_id' => $product->barangImages->first()->id
                );

        } else {

            $currentCartQty = $cart[$cartIndex]['qty'];
            $currentTotalBerat = $currentCartQty * $product->berat;
            $currentSubtotal = $currentCartQty * $harga;

            $newCartQty = $currentCartQty + $product->qty;
            $newTotalBerat = $newCartQty * $product->berat;
            $newSubtotal = $newCartQty * $harga;

            $cart[$cartIndex]['qty'] = $newCartQty;
            $cart[$cartIndex]['total_berat'] = $newTotalBerat;
            $cart[$cartIndex]['subtotal'] = $newSubtotal;
        }

        $this->set($cart);
    }

    public function remove($productCode)
    {
        $cart = $this->get();

        // KODE BARANG YANG DIAWALI ANGKA 0, BIASANYA HILANG ANGKA 0 AWALNYA
        // TERUTAMA KETIKA DI RE-RENDER OLEH LIVEWIRE, KARENA OTOMATIS DI KONVERSI MENJADI INTEGER
        // JIKA ANGKA 0 DI AWAL PADA KODE BARANG HILANG MAKA TAMBAHKAN KARAKTER DI AWALNYA
        // SUPAYA TIDAK DI KONVERSI MENJADI INTEGER
        $productCode = 'x' . $productCode;
        
        unset($cart[$productCode]);
        
        $this->set($cart);

    }
}