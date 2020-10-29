<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Products extends Component
{
    public $products;
    public $category;
    public $tags;

    public $qty = 1;
    public $note;

    public function mount($products, $category = "", $tags = "")
    {
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
