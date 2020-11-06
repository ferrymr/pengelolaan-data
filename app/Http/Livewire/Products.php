<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class Products extends Component
{
    public $products;
    public $category;
    public $tags;
    public $user;

    public $qty = 1;
    public $note;

    public function mount($products, $category = "", $tags = "")
    {
        $this->user = Auth::user();
        $this->products = $products;
        $this->category = $category;
        $this->tags = $tags;
    }

    public function render()
    {
        // dd($this->products);
        return view('livewire.products');
    }
}
