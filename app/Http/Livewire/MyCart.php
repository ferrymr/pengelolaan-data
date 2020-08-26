<?php

namespace App\Http\Livewire;

use App\Facades\Cart;
use Livewire\Component;

class MyCart extends Component
{
    public $cartItems;
    public $totalItems;
    public $subtotal;

    public function mount()
    {
        $this->refreshData();
    }

    public function render()
    {
        return view('livewire.my-cart');
    }

    public function refreshData()
    {
        $this->cartItems = Cart::get();
        $this->hitungSubtotal();
        $this->hitungTotalItems();
    }

    public function hitungSubtotal()
    {
        $subtotal = 0;

        foreach($this->cartItems as $cartItem) {
            $subtotal += $cartItem['subtotal'];
        }

        $this->subtotal = $subtotal;
    }

    public function hitungTotalItems()
    {
        $totalItems = 0;

        foreach($this->cartItems as $cartItem) {
            $totalItems += $cartItem['qty'];
        }

        $this->totalItems = $totalItems;
    }

    public function removeFromCart($productCode)
    {
        // $user_id = 1; // ambil dari session nanti mah
        // ShoppingCart::where('users_id', '=', $user_id)->where('kode_barang', '=', $product->kode_barang)->delete();

        Cart::remove($productCode);
        $this->refreshData();
        $this->emit('refreshCartItems');
        $this->emit('refreshCartItemsMobile');
    }
}
