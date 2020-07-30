@extends('layouts.products')

@section('content')

    <!-- banner newsletter -->
    <x-newsletter />

    <!-- text block -->
    <x-promo-text-bar>
        <i class="icon fa fa-flag" aria-hidden="true"></i>Buruan, Beli product <a href="#">Series diskon 30%</a>  & dapetin <a href="#">Serum Anti Flek gratis</a> sekarang!
    </x-promo-text-bar>

    <!--breadcrumb-->
    <div class="row">
        <div class="col-lg-12">
            <x-breadcrumb>
                <li class="trail-item trail-begin"><a href="{{ route('home') }}">Home</a></li>
                <li class="trail-item trail-end active">{{ $category_name }}</li>
            </x-breadcrumb>
        </div>
    </div>

    <!--main content-->
    <div class="row">

        <!--side main-->
        <div class="content-area shop-grid-content full-width col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="site-main">

                <!--top control-->
                <div class="shop-top-control">

                    <div class="select-item select-form">
                        <span class="title">Semua produk di kategori <b>"{{ $category_name }}"</b></span>
                    </div>

                    <!--order sort-->
                    <div class="grid-view-mode">
                        <div class="inner">
                        <span class="title">Urut berdasarkan</span>&nbsp;
                        <select data-placeholder="Harga Tertinggi" class="chosen-select">
                            <option value="best_selling">Terlaris</option>
                            <option value="highest_price" selected>Harga Tertinggi</option>
                            <option value="lowest_price">Harga Terendah</option>
                        </select>
                        </div>
                    </div>

                </div>

                <!--page title-->
                {{-- <h4>Menampilkan semua produk <b>{{ $category_name }}</b></h4><br/> --}}

                <!-- wrap products-->
                <ul class="row list-products auto-clear equal-container product-grid">

                    @forelse ($products as $product)
                        <li class="product-item  col-lg-3 col-md-4 col-sm-6 col-xs-6 style-1">
                            <div class="product-inner equal-element">
                                <div class="product-top">
                                    <div class="flash">
                                        {{-- <span class="onnew"><span class="text">new</span></span> --}}
                                    </div>
                                    <div class="yith-wcwl-add-to-wishlist">
                                        <div class="yith-wcwl-add-button">
                                            {{-- <a href="#">Add to Wishlist</a> --}}
                                        </div>
                                    </div>
                                </div>
                                <div class="product-thumb">
                                    <div class="thumb-inner">
                                        <a href="#">
                                            <img src="{{ asset('assets/images/thumbnails/' . $product->kode_barang . '.jpg')}}" alt="{{ $product->nama }}">
                                        </a>
                                    </div>
                                    {{-- <a href="#" class="button quick-wiew-button">Quick View</a> --}}
                                </div>
                                <div class="product-info">
                                    <h5 class="product-name product_title"><a href="#">{{ $product->nama }}</a></h5>
                                    <div class="group-info">
                                        {{-- <div class="stars-rating"><div class="star-rating"><span class="star-4"></span></div><div class="count-star">(14)</div></div> --}}
                                        <div class="price"><span>@currency($product->harga)</span></div>
                                    </div>
                                </div>
                                <div class="loop-form-add-to-cart">
                                    <form class="cart">
                                        <div class="single_variation_wrap">
                                            <div class="quantity">
                                                <div class="control">
                                                    <a class="btn-number qtyminus quantity-minus" href="#">-</a>
                                                    <input type="text" data-step="1" data-min="0" value="1" title="Qty" class="input-qty qty" size="4">
                                                    <a href="#" class="btn-number qtyplus quantity-plus">+</a>
                                                </div>
                                            </div>
                                            <button class="single_add_to_cart_button button">Add to cart</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </li>
                    @empty

                    @endforelse

                </ul>

                <br/>
                <!--pagination-->
                @if(method_exists($products, 'links'))
                    {{ $products->links() }}
                @endif

            </div>
        </div>

        <!-- full width layout have no sidebar-->

    </div>

@endsection