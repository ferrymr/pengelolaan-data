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
            <div class="slider-owl owl-slick equal-container nav-center"  
                data-slick ='{"autoplay":true, "autoplaySpeed":9000, "arrows":true, "dots":false, "infinite":true, "speed":1000, "rows":1}' 
                data-responsive='[{"breakpoint":"2000","settings":{"slidesToShow":1}}]'>
                @foreach($sliders as $slider)
                    <div class="slider-item style1">
                        <div class="slider-inner equal-element" style="background-image: url({{route('admin.slider.slider-image', $slider->id)}})">
                            <div class="slider-infor">
                                <h5 class="title-small">&nbsp;</h5>
                                <h3 class="title-big">&nbsp;</h3>
                                <div class="price">&nbsp;</div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    {{-- products box --}}
    {{-- <x-promo-products-section 
        :products="$bestOfPieces"/>

    <x-product-category-section 
        :best-of-pieces="$bestOfPieces" 
        :best-of-series="$bestOfSeries" /> --}}    

    {{-- product list --}}
    <div class="main-content main-content-product no-sidebar">
        <div class="container">
            <livewire:products 
                :products="$bestSellingProducts" 
                category="Best Seller Product"
                tags="Best Seller" />
        </div>
    </div>

    <div class="main-content main-content-product no-sidebar">
        <div class="container">
            <livewire:products 
                :products="$promoProducts" 
                category="Promo Product" 
                tags="Promo" />
        </div>
    </div>   

    <x-banner-product/>

    {{-- blogs --}}
    {{-- <x-blogs /> --}}

    {{-- banner newsletter --}}
    {{-- <x-newsletter /> --}}
@endsection