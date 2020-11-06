<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    public function __construct(Barang $barang) {
        $this->barangRepo = $barang;
    }

    // sorted by category
    public function category($category_name)
    {
        $sorting = isset($_GET['sorting']) ? $_GET['sorting'] : '';
        
        $byCategory = [];
        $whitening = isset($_GET['whitening']) ? $byCategory[] = $_GET['whitening'] : '';
        $purifiying = isset($_GET['purifiying']) ? $byCategory[] = $_GET['purifiying'] : '';
        $decorative = isset($_GET['decorative']) ? $byCategory[] = $_GET['decorative'] : '';
        $bodycare = isset($_GET['bodycare']) ? $byCategory[] = $_GET['bodycare'] : '';

        // dd($byCategory);

        $user = Auth::user();
        if($category_name == "SERIES") {
            $products = $this->barangRepo->getBarangSeries($user, $sorting, $byCategory);
        } else if($category_name == "ALL") {
            $products = $this->barangRepo->getBarangAll($user, $sorting, $byCategory);
        } else if($category_name == "PROMO") {
            $products = $this->barangRepo->getBarangPromo($user, $sorting, $byCategory);
        } else {
            $products = $this->barangRepo->getBarangByCategory($category_name, $user, $sorting, $byCategory);
        }
        
        $category_name = ucfirst($category_name);

        return view('frontend.products', 
            compact(
                'products', 
                'category_name'
            )
        );
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Barang  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Barang  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Barang  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Barang  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        //
    }

}
