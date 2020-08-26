<?php

namespace App\Helpers;
use App\Product;

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

    public function add(Product $product)
    {
        $cart = $this->get();

        $productCode = (strlen($product->kode_barang) < 5 ? sprintf('%05d', $product->kode_barang) : (string) $product->kode_barang);

        // KODE BARANG YANG DIAWALI ANGKA 0, BIASANYA HILANG ANGKA 0 AWALNYA
        // TERUTAMA KETIKA DI RE-RENDER OLEH LIVEWIRE, KARENA OTOMATIS DI KONVERSI MENJADI INTEGER
        // JIKA ANGKA 0 DI AWAL PADA KODE BARANG HILANG MAKA TAMBAHKAN KARAKTER DI AWALNYA
        // SUPAYA TIDAK DI KONVERSI MENJADI INTEGER
        $cartIndex = 'x' . $productCode;

        if(!isset($cart[$cartIndex])) {

            // KODE BARANG YANG DIAWALI ANGKA 0, BIASANYA HILANG ANGKA 0 AWALNYA
            // JIKA ANGKA 0 DI AWAL PADA KODE BARANG HILANG MAKA TAMBAHKAN ANGKA 0 NYA 
            // $productCode = (strlen($product->kode_barang) < 5 ? sprintf('%05d', $product->kode_barang) : (string) $product->kode_barang); // sprintf('%05d', $product->kode_barang);

            // $productCode = $product->kode_barang;

            $cart[$cartIndex] = array(
                    'kode_barang' => $productCode,
                    'nama' => $product->nama,
                    'jenis' => $product->jenis,
                    'unit' => $product->unit,
                    'h_nomem' => $product->h_nomem,
                    'berat' => $product->berat,
                    'total_berat' => $product->qty * $product->berat,
                    'subtotal' => $product->qty * $product->h_nomem,
                    'qty' => $product->qty,
                    'note' => ''
                );

        } else {
            $cart[$cartIndex]['qty'] += $product->qty;
            $cart[$cartIndex]['total_berat'] += $product->qty * $product->berat;
            $cart[$cartIndex]['subtotal'] += $product->qty  * $product->h_nomem;
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

        /* if (count($cart) < 1) {
            $this->set($this->empty());
        } else {
            $this->set($cart);
        } */

    }
}