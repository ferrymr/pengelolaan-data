<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Slider;
use Illuminate\Http\Request;
use DB;

class IndexController extends Controller
{
    public function index()
    {

        // todo change best of piece to flag
        $bestSellingProducts = Barang::with('barangImages')
                                ->where('flag_bestseller', 1)
                                ->limit(8)
                                ->get();

        $promoProducts = Barang::with('barangImages')
                                ->where('flag_promo', 1)
                                ->limit(8)
                                ->get();

        $sliders = Slider::get();

        return view('frontend.index', 
                compact(
                    'bestSellingProducts', 
                    'promoProducts',
                    'sliders'
                )
            );
    }

}
