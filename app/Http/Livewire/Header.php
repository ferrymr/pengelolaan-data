<?php

namespace App\Http\Livewire;

use App\Facades\Cart;
use Livewire\Component;
use App\Models\ShippingAddress;

class Header extends Component
{
    public $cartItems;
    public $cartTotal = 0;
    public $nextPageLink;

    protected $listeners = [
        'refreshCartItems' => 'updateCartItems'
    ];

    public function mount()
    {
        $this->updateCartItems();
        $this->nextPageLink = $this->getNextPageLink();
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

    public function getNextPageLink()
    {
        $user = auth()->user();

        if ($user) {

            $defaultShippingAddress = ShippingAddress::where('user_id', $user->id)->where('is_default', 1)->first();

            if (!$defaultShippingAddress) {

                $countShippingAddress = ShippingAddress::where('user_id', $user->id)->count();

                if ($countShippingAddress < 1) {
                    return route('address.new-address-post-cart');
                }

                return route('address.select-address-post-cart');
            }
        }

        return route('checkout');
    }
}
