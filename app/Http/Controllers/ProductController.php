<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all();
        return view('index', compact('products'));
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
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        $product = \DB::table('cn_barang')
                ->leftJoin('cn_des_pro', 'cn_barang.kode_barang', '=', 'cn_des_pro.kode')
                ->select('kode_barang', 'cn_barang.nama', 'h_nomem AS harga', 'jenis AS kategori', 'des1 AS deskripsi_lengkap', 'des_singkat AS deskripsi_singkat', 'pakai AS cara_pakai', 'manfaat')
                ->where('cn_barang.kode_barang', $product->kode_barang)
                ->first();

        $relatedProducts = Product::select(\DB::raw('CONVERT(kode_barang, CHAR) AS kode'), 'nama', 'h_nomem AS harga')
                ->where('jenis', $product->kategori)
                ->limit(10)
                ->get();

        return view('product-detail', compact('product', 'relatedProducts'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
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
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        //
    }

    public function category($category_name)
    {
        $products = Product::select('kode_barang', 'nama', 'h_nomem as harga')
                        ->where('jenis', $category_name)
                        ->where('h_nomem', '!=', 0)
                        ->paginate(20);

        $category_name = ucfirst($category_name);

        return view('frontend.products', 
            compact(
                'products', 
                'category_name'
            )
        );
    }
}
