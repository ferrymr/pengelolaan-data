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

        if(!isset($cart[$product->kode_barang])) {
            $cart[$product->kode_barang] = array(
                    'kode_barang' => $product->kode_barang,
                    'nama' => $product->nama,
                    'jenis' => $product->jenis,
                    'h_nomem' => $product->h_nomem,
                    'qty' => $product->qty,
                    'note' => ''
                );
        } else {
            $cart[$product->kode_barang]['qty'] += $product->qty;
        }

        $this->set($cart);
    }

    public function remove($productCode)
    {
        $cart = $this->get();
        
        unset($cart[$productCode]);
        
        $this->set($cart);

        /* if (count($cart) < 1) {
            $this->set($this->empty());
        } else {
            $this->set($cart);
        } */

    }
}