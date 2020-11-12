<?php

namespace App\Http\Livewire;

use App\Facades\Cart;
use App\Models\Barang;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ProductDetail extends Component
{
    public $product;
    public $user;
    public $qty = 1;
    public $seeProducts;

    public function mount(Request $request, $productCode, $slug = '')
    {
        $this->product = Barang::with('barangImages', 'barangRelated.barangDetail.barangImages')
                            ->where('kode_barang', $productCode)
                            ->first();

        // check is there any cookie
        if(isset($_COOKIE['see_product'])) {
            $seeProducts = unserialize($_COOKIE['see_product']);
            $value = $this->product->id;
            if(!in_array($value, $seeProducts, true)){
                array_push($seeProducts, $value);
            }
        } else {
            $seeProducts = [$this->product->id];
        }
        
        setcookie('see_product', serialize($seeProducts), time() + (86400 * 30), "/");

        if (isset($_COOKIE['see_product'])) {
            $unserialize = unserialize($_COOKIE['see_product']);

            $this->seeProducts = Barang::with('barangImages', 'barangRelated.barangDetail.barangImages')
                            ->whereIn('id', $unserialize)
                            ->orderBy('id', "DESC")
                            ->take(4)
                            ->get();
        }

        // dd($this->seeProducts);
        // dd(unserialize($_COOKIE['see_product']));

        // dd($this->product->barangRelated->first()->barangDetail->barangImages->first());
        $this->user = Auth::user();
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
