<?php

namespace App\Http\Livewire;

use App\Facades\Cart;
use App\Models\Barang;
use Livewire\Component;

class ProductDetail extends Component
{
    public $product;
    public $qty = 1;

    public function mount($productCode)
    {
        $this->product = Barang::with('barangImages')->where('kode_barang', $productCode)->first();
        // dd($this->product);
        // dd(Cart::get());
    }

    public function render()
    {
        return view('livewire.product-detail');
    }

    public function incrementQty()
    {
        $this->qty++;
    }

    public function decrementQty()
    {
        if ($this->qty > 1) {
            $this->qty--;
        }
    }

    public function resetQty()
    {
        $this->qty = 1;
    }

    public function addToCart()
    {
        $this->product->qty = $this->qty;

        Cart::add($this->product);

        $this->resetQty();
        $this->emit('refreshCartItems');
        $this->emit('refreshCartItemsMobile');
    }
}
