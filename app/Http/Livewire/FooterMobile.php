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
        $this->cartItems = Cart::get(); 
        $this->cartTotal = count($this->cartItems);      
    }
 
    public function render()
    {
        return view('livewire.footer-mobile');
    }

    public function updateCartItemsMobile()
    {
        $this->cartItems = Cart::get();      
        $this->cartTotal = count($this->cartItems);
    }
}
