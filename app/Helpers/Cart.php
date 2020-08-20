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
        return [
            'products' => [],
        ];
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

        $product = (object) array(
            'kode_barang' => $product->kode_barang,
            'nama' => $product->nama,
            'jenis' => $product->jenis,
            'h_nomem' => $product->h_nomem,
            'qty' => $product->qty,
            'note' => ''
        );
        
        array_push($cart['products'], $product);

        $this->set($cart);
    }

    public function remove($productCode)
    {
        $cart = $this->get()['products'];
        
        dd($productCode);
        
        if (($key = array_search($productCode, $cart)) !== false) {
            unset($cart[$key]);
        }

        $this->set($cart);
    }
}