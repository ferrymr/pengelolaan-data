<?php

namespace App\Http\Livewire;

use App\Facades\Cart;
use Livewire\Component;

class Header extends Component
{
    public $cartItems;
    public $cartTotal = 0;

    protected $listeners = [
        'refreshCartItems' => 'updateCartItems'
    ];

    public function mount()
    {
        $this->updateCartItems();
    }

    public function hydrate()
    {
        $this->updateCartItems();
    }

    public function render()
    {
        return view('livewire.header');
    }

    public function removeFromCart($productCode)
    {
        // $user_id = 1; // ambil dari session nanti mah
        // ShoppingCart::where('users_id', '=', $user_id)->where('kode_barang', '=', $product->kode_barang)->delete();
        
        Cart::remove($productCode);
        $this->updateCartItems();
        $this->emit('refreshCartItemsMobile');
    }

    public function updateCartItems()
    {
        $this->cartItems = Cart::get();

        $itemCount = 0;

        foreach ($this->cartItems as $cartItem) {
            $itemCount += $cartItem['qty'];
        }

        $this->cartTotal = $itemCount;
    }
}
