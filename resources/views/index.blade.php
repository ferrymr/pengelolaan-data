@extends('layouts.app')

@section('content')

    <!-- products tabs -->
    <x-products :products="$best_seller_products" category-name="Terlaris"/>

    <div class="loadmore-wapper">
        <a href="#">LIHAT SEMUA BARANG</a>
    </div>
@endsection