<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Products extends Component
{
    public $categoryName;
    public $products;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($products, $categoryName = "")
    {
        $this->products = $products;
        $this->categoryName = $categoryName;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.products');
    }
}
