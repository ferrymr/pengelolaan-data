<?php

namespace App\Http\Livewire;

use App\Facades\Cart;
use Livewire\Component;
use App\Models\Product;
use App\Models\ShippingAddress;

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

    public function hydrate()
    {
        $this->refreshData();
    }

    public function refreshData()
    {
        $this->cartItems = Cart::get();
        $this->hitungSubtotal();
        $this->hitungTotalItems();
    }

    public function updateQty($productCode, $type)
    {
        $product = Product::find($productCode);

        if ($type == 'increment') {
            $product->qty = 1;
        } elseif ($type == 'decrement') {
            $product->qty = -1;
        }

        Cart::add($product);

        $this->refreshData();

        $this->emit('refreshCartItems');

        $this->emit('refreshCartItemsMobile');
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
        Cart::remove($productCode);
        $this->refreshData();
        $this->emit('refreshCartItems');
        $this->emit('refreshCartItemsMobile');
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
