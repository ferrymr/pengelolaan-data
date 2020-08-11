<!DOCTYPE html>
<html lang="en">
<head>
    <title>3-pack T-shirts Regular fit</title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://fonts.googleapis.com/css?family=Arimo:400,400i,700,700i%7CLato:300,300i,400,400i,700,700i,900%7COpen+Sans:300,300i,400,400i,600,600i,700,700i,800" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/animate.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/jquery-ui.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/slick.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/chosen.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/pe-icon-7-stroke.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/magnific-popup.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/lightbox.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/jquery.fancybox.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/jquery.mCustomScrollbar.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/style-custom.css') }}">
</head>
<body class="details-page single product ">

    <!-- block text top -->
    {{-- <x-topbar>
        <i class="icon fa fa-scissors" aria-hidden="true"></i> #Free EU Delivery + Return Over <a href="#">€99.00</a> Collect From Store
    </x-topbar> --}}

    <!-- header -->
    <x-header />

    <!-- mobile header -->
    <x-header-mobile />

    <!-- wrap main content -->
    <div class="main-content main-content-details single no-sidebar">
        <div class="container">

            <!-- breadcrumb -->
            <div class="row">
                <div class="col-lg-12">
                    <x-breadcrumb>
                        <li class="trail-item trail-begin"><a href="{{ route('home') }}">Home</a></li>
                        <li class="trail-item"><a href="{{ route('products.category', $product->kategori) }}">{{ $product->kategori }}</a></li>
                        <li class="trail-item trail-end active">{{ $product->nama }}</li> 
                    </x-breadcrumb>
                </div>
            </div>

            <!-- main content -->
            <div class="row">

                <!-- sidemain -->
                <div class="content-area content-details full-width col-lg-9 col-md-8 col-sm-12 col-xs-12">
                    <div class="site-main">

                        <!-- media box -->
                        <div class="details-product single-product-galery">
                            <div class="details-thumd">
                                <div class="image-preview-container image-thick-box image_preview_container">
                                    <img id="img_zoom" data-zoom-image="{{ asset('assets/images/large/' . $product->kode_barang . '.jpg')}}" src="{{ asset('assets/images/large/' . $product->kode_barang . '.jpg')}}" alt="">
                                    <a href="#" class="btn-zoom open_qv"><i class="fa fa-search" aria-hidden="true"></i></a>
                                </div>
                                <div class="product_preview image-small">
                                    <div id="thumbnails" class="thumbnails_carousel owl-carousel" data-nav="true" data-autoplay="false" data-dots="false" data-loop="false" data-margin="25" data-responsive='{"0":{"items":3},"480":{"items":3},"600":{"items":3},"1000":{"items":3}}' >
                                        <a href="#" data-image="{{ asset('assets/images/large/' . $product->kode_barang . '.jpg')}}" data-zoom-image="{{ asset('assets/images/large/' . $product->kode_barang . '.jpg')}}" class="active">
                                            <img src="{{ asset('assets/images/large/' . $product->kode_barang . '.jpg')}}" data-large-image="{{ asset('assets/images/large/' . $product->kode_barang . '.jpg')}}" alt="">
                                        </a>
                                        <a href="#" data-image="{{ asset('assets/images/large/' . $product->kode_barang . '.jpg')}}" data-zoom-image="{{ asset('assets/images/large/' . $product->kode_barang . '.jpg')}}">
                                            <img src="{{ asset('assets/images/large/' . $product->kode_barang . '.jpg')}}" data-large-image="{{ asset('assets/images/large/' . $product->kode_barang . '.jpg')}}" alt="">
                                        </a>
                                        <a href="#" data-image="{{ asset('assets/images/large/' . $product->kode_barang . '.jpg')}}" data-zoom-image="{{ asset('assets/images/large/' . $product->kode_barang . '.jpg')}}">
                                            <img src="{{ asset('assets/images/large/' . $product->kode_barang . '.jpg')}}" data-large-image="{{ asset('assets/images/large/' . $product->kode_barang . '.jpg')}}" alt="">
                                        </a>
                                        <a href="#" data-image="{{ asset('assets/images/large/' . $product->kode_barang . '.jpg')}}" data-zoom-image="{{ asset('assets/images/large/' . $product->kode_barang . '.jpg')}}">
                                            <img src="{{ asset('assets/images/large/' . $product->kode_barang . '.jpg')}}" data-large-image="{{ asset('assets/images/large/' . $product->kode_barang . '.jpg')}}" alt="">
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="details-infor">
                                <h1 class="product-title">{{ $product->nama }}</h1> <br/>
                                {{-- <div class="stars-rating">
                                    <div class="star-rating">
                                        <span class="star-5"></span>
                                    </div>
                                    <div class="count-star">
                                        (7)
                                    </div>
                                </div>
                                <div class="availability">availability:<a href="#">instock</a></div> --}}
                                <div class="price">
                                    <span>@currency($product->harga)</span>
                                </div>
                                <div class="product-details-description">
                                    <p class="desc">{{ $product->deskripsi_lengkap }}</p>
                                </div>
                                {{-- <div class="variations">
                                    <div class="attribute attribute_color">
                                        <div class="color-text text-attribute">
                                            Color: <span>White/Black/Teal/Brown</span>
                                        </div>
                                        <div class="list-color list-item">
                                            <a href="#" class="color1"></a>
                                            <a href="#" class="color2"></a>
                                            <a href="#" class="color3 active"></a>
                                            <a href="#" class="color4"></a>
                                        </div>
                                    </div>
                                    <div class="attribute attribute_size">
                                        <div class="size-text text-attribute">
                                            Size: <span>Please select the size below</span> 
                                        </div>
                                        <div class="list-size list-item">
                                            <a href="#" class="">xs</a>
                                            <a href="#" class="">s</a>
                                            <a href="#" class="active">m</a>
                                            <a href="#" class="">l</a>
                                            <a href="#" class="">xl</a>
                                            <a href="#" class="">xxl</a>
                                        </div>
                                    </div>
                                </div> --}}
                                <div class="group-button">
                                    {{-- <div class="yith-wcwl-add-to-wishlist">
                                        <div class="yith-wcwl-add-button">
                                            <a href="#">Add to Wishlist</a>
                                        </div>
                                    </div>
                                    <div class="size-chart-wrapp">
                                        <div class="btn-size-chart">
                                            <a id="size_chart" href="{{ asset('assets/images/size-chart.jpg') }}" class="fancybox">View Size Chart</a>
                                        </div>
                                    </div> --}}
                                    <div class="quantity-add-to-cart">
                                        <div class="quantity">
                                            <div class="control">
                                                <a class="btn-number qtyminus quantity-minus" href="#">-</a>
                                                <input type="text" data-step="1" data-min="0" value="1" title="Qty" class="input-qty qty" size="4">
                                                <a href="#" class="btn-number qtyplus quantity-plus">+</a>
                                            </div>
                                        </div>
                                        <button class="single_add_to_cart_button button">Add to cart</button>
                                    </div>
                                </div>
                            </div>
                            <a href="https://api.whatsapp.com/send?phone=628112288142&text=Halo%0AKak!,%0ASaya%20ingin%20konsultasi%20lebih%20lanjut%20mengenai%20produk%20{{ $product->nama }}" target="_blank" class="single_add_to_cart_button button">Contact Beauty Consultant</a>
                            <p id="warn">Klik untuk langsung terhubung via WhatssApp </p>
                        </div>


                        
                        <!-- details atbs -->
                        <div class="tab-details-product">
                            <ul class="tab-link">
                                <li class="active"><a data-toggle="tab" aria-expanded="true" href="#product-descriptions">Deskripsi</a></li>
                                <li class=""><a data-toggle="tab" aria-expanded="true" href="#information ">Cara Pakai</a></li>
                            </ul>
                            <div class="tab-container">
                                <div id="product-descriptions" class="tab-panel active">
                                    <p> {{ $product->deskripsi_lengkap }} </p>
                                </div>
                                <div id="information" class="tab-panel">
                                    <p> {{ $product->cara_pakai }} </p>
                                </div>
                            </div>
                        </div>

                        <!-- reset floading -->
                        <div class="reset-floatding"></div>

                        <!-- realated product -->
                        <x-related-products :related-products="$relatedProducts" />

                    </div>
                </div>

                <!-- full width layout have no sidebar-->

            </div>

        </div>
    </div>

    <!-- footer -->
    <x-footer />

    <!-- mobile footer -->
    <x-footer-mobile />

    <a href="#" class="backtotop"><i class="pe-7s-angle-up"></i></a>

    <script src="{{ asset('assets/js/jquery-3.3.1.min.js') }}"></script>	
    <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('assets/js/magnific-popup.min.js') }}"></script>
    <script src="{{ asset('assets/js/isotope.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.mCustomScrollbar.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery-ui.min.js') }}"></script>
    <script src="{{ asset('assets/js/mobilemenu.js') }}"></script>
    <script src="{{ asset('assets/js/chosen.jquery.min.js') }}"></script>
    <script src="{{ asset('assets/js/slick.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.elevateZoom.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.actual.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.fancybox.js') }}"></script>
    <script src="{{ asset('assets/js/lightbox.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.mCustomScrollbar.min.js') }}"></script>
    <script src="{{ asset('assets/js/frontend-plugin.js') }}"></script>
</body>
</html>