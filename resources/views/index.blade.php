@extends('layouts.app') 

@section('content')

    {{-- text block --}}
    {{-- <x-promo-text-bar>
        <i class="icon fa fa-flag" aria-hidden="true"></i>Buruan, Beli product <a href="#">Series diskon 30%</a> & dapetin <a href="#">Serum Anti Flek gratis</a> sekarang!
    </x-promo-text-bar> --}}

    {{-- products box --}}
    {{-- <x-promo-products-section :products="$products"/> --}}

    {{-- <x-product-category-section :best-of-pieces="$bestOfPieces" :best-of-series="$bestOfSeries" /> --}}

    {{-- <x-banner-product/> --}}

    {{-- main content --}}
    <div class="main-content main-content-product no-sidebar">
        <div class="container">
            {{-- products tabs --}}
            {{-- <x-products :products="$bestSellingProducts" category-name="Terlaris"/> --}}
            <livewire:products :products="$bestSellingProducts" category="Terlaris" />

            <div class="loadmore-wapper">
                <a href="#">LIHAT SEMUA BARANG</a>
            </div>
        </div>
    </div>

    {{-- blogs --}}
    {{-- <x-blogs /> --}}

    {{-- banner newsletter --}}
    <x-newsletter />
@endsection