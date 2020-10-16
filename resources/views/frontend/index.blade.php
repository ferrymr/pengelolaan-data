@extends('layouts.app') 

@section('content')


    <x-promo-text-bar>
        <i class="icon fa fa-flag" aria-hidden="true"></i>
        Buruan, Beli product 
        <a href="#">Series diskon 30%</a> & dapetin 
        <a href="#">Serum Anti Flek gratis</a> sekarang!
    </x-promo-text-bar>

    {{-- slider homepage --}}
    <div class="home-slider rows-space-50 main-slide">
        <div class="container">
            <div class="slider-owl owl-slick equal-container nav-center"  data-slick ='{"autoplay":false, "autoplaySpeed":9000, "arrows":true, "dots":false, "infinite":true, "speed":1000, "rows":1}' data-responsive='[{"breakpoint":"2000","settings":{"slidesToShow":1}}]'>
                <div class="slider-item style1">
                    <div class="slider-inner equal-element">
                        <div class="slider-infor" style="min-height: 500px">
                            {{-- <h5 class="title-small">Grow a Beard!</h5>
                            <h3 class="title-big">American Finest<br/>Beard wax & oils</h3>
                            <div class="price">Price from:<span class="number-price">€75.00</span></div>
                            <a href="#" class="button btn-browse">Browse</a>
                            <a href="#" class="button btn-shop-the-look bgroud-style">Shop The Look</a> --}}
                        </div>
                    </div>
                </div>
                <div class="slider-item style2">
                    <div class="slider-inner equal-element">
                        <div class="slider-infor" style="min-height: 500px">
                            {{-- <h5 class="title-small">Beard Supplies Sale!</h5>
                            <h3 class="title-big">UP TO <span>75%</span> ON ALL <br/> Store ITEMS</h3>
                            <a href="#" class="button btn-shop-now">SHOP NOW</a> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- products box --}}
    {{-- <x-promo-products-section 
        :products="$bestOfPieces"/>

    <x-product-category-section 
        :best-of-pieces="$bestOfPieces" 
        :best-of-series="$bestOfSeries" /> --}}    

    {{-- main content --}}
    <div class="main-content main-content-product no-sidebar">
        <div class="container">
            {{-- products tabs --}}
            {{-- <x-products :products="$bestSellingProducts" category-name="Terlaris"/> --}}
            <livewire:products 
                :products="$bestSellingProducts" 
                category="Terlaris" />

            {{-- <div class="loadmore-wapper">
                <a href="#">LIHAT SEMUA BARANG</a>
            </div> --}}
        </div>
    </div>

    <x-banner-product/>

    {{-- blogs --}}
    {{-- <x-blogs /> --}}

    {{-- banner newsletter --}}
    {{-- <x-newsletter /> --}}
@endsection