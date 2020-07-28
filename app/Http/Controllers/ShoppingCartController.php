<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Product;
use App\ShoppingCart;
use DB;

class ShoppingCartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = DB::table('cn_shoppingcart')
            ->join('cn_barang', 'cn_barang.kode_barang', '=', 'cn_shoppingcart.kode_barang')
            ->select('cn_shoppingcart.id','cn_shoppingcart.kode_barang', 'cn_shoppingcart.quantity', 'cn_shoppingcart.note', 'cn_barang.nama', 'cn_barang.jenis', 'cn_barang.h_nomem')
            ->limit(10)
            ->get();
        $totals = 0 ;
        foreach ($items as $item) {
            $totals += $item->h_nomem * $item->quantity;
        }

        // dd($totals);

        
        return view('shoppingcart', compact('items','totals'));
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = ShoppingCart::findOrFail($id);
        $item->delete();

        return redirect()->route('shoppingcart.index');
    }
}
