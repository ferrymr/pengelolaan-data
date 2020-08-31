<?php

namespace App\Http\Livewire;

use App\Facades\Cart;
use Livewire\Component;

class FooterMobile extends Component
{
    public $cartItems;
    public $cartTotal = 0;

    protected $listeners = [
        'refreshCartItemsMobile' => 'updateCartItemsMobile'
    ];

    public function mount()
    {
        $this->updateCartItemsMobile();
    }
 
    public function render()
    {
        return view('livewire.footer-mobile');
    }

    public function updateCartItemsMobile()
    {
        $this->cartItems = Cart::get();

        $itemCount = 0;

        foreach ($this->cartItems as $cartItem) {
            $itemCount += $cartItem['qty'];
        }

        $this->cartTotal = $itemCount;
    }
}
