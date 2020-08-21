<?php

namespace App\Http\Livewire;

use App\Facades\Cart;
use Livewire\Component;

class MyCart extends Component
{
    public $cartItems;
    public $cartAmount = 0;

    public function mount()
    {
        $this->cartItems = Cart::get();
        // $this->cartAmount = 0; 
    }

    public function render()
    {
        return view('livewire.my-cart');
    }

    /* public function removeFromCart($productCode)
    {
        // $user_id = 1; // ambil dari session nanti mah
        // ShoppingCart::where('users_id', '=', $user_id)->where('kode_barang', '=', $product->kode_barang)->delete();
        
        Cart::remove($productCode);
        $this->emit('refreshCartItems');
    } */
    
    public function incrementQty($productCode)
    {
        $cart = Cart::get();
        $cart[$productCode]['qty']++;
        Cart::set($cart);
        $this->emit('refreshCartItems');
    }

    public function decrementQty()
    {
        if ($this->qty > 1) {
            $this->qty--;
        }
    }

    public function addToCart()
    {
        $this->product->qty = $this->qty;

        Cart::add($this->product);

        $this->resetQty();
        $this->emit('refreshCartItems');
    }
}
