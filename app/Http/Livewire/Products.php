<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Products extends Component
{
    public $products;
    public $category;

    public $qty = 1;
    public $note;

    public function mount($products, $category = "")
    {
        $this->products = $products;
        $this->category = $category;
    }

    public function render()
    {
        return view('livewire.products');
    }
}
