<?php

namespace App\Http\Livewire;

use App\Facades\Cart;
use App\ShippingAddress;
use Livewire\Component;

class MyCart extends Component
{
    public $cartItems;
    public $totalItems;
    public $subtotal;
    public $nextPageLink;

    public function mount()
    {
        $this->nextPageLink = $this->getNextPageLink();
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

    public function getNextPageLink()
    {
        $user = auth()->user();

        $defaultShippingAddress = ShippingAddress::where('user_id', $user->id)->where('is_default', 1)->first();

        if (!$defaultShippingAddress) {

            $countShippingAddress = ShippingAddress::where('user_id', $user->id)->count();
            
            if ($countShippingAddress < 1) {
                return route('address.new-address-post-cart');
            }

            return route('address.select-address-post-cart');
        }

        return route('checkout');
    }
}
