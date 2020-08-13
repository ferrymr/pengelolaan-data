<?php

namespace App\View\Components;

use Illuminate\View\Component;

class ProductCategorySection extends Component
{
    public $bestOfPieces;
    public $bestOfSeries;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($bestOfPieces, $bestOfSeries)
    {
        $this->bestOfPieces = $bestOfPieces;
        $this->bestOfSeries = $bestOfSeries;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.product-category-section');
    }
}
