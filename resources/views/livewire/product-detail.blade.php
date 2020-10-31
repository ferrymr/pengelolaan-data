@section('styles')
    <link rel="stylesheet" href="{{ asset('assets/css/snackbar.min.css') }}" />
    <style>
        .btn-consultation-wa {
            align-self: baseline;
        },
        a .btn-consultation-wa:hover {
            color: white!important;
        }
    </style>
@endsection

{{-- wrap main content --}}
<div class="main-content main-content-details single no-sidebar">
    <div class="container">

        {{-- breadcrumb --}}
        <div class="row">
            <div class="col-lg-12">
                <x-breadcrumb>
                    <li class="trail-item trail-begin"><a href="{{ route('home') }}">Home</a></li>
                    <li class="trail-item"><a href="{{ route('products.category', $product->jenis) }}">{{ $product->jenis }}</a></li>
                    <li class="trail-item trail-end active">{{ $product->nama }}</li> 
                </x-breadcrumb>
            </div>
        </div>

        {{-- main content --}}
        <div class="row">

            {{-- sidemain --}}
            <div class="content-area content-details full-width col-lg-9 col-md-8 col-sm-12 col-xs-12">
                <div class="site-main">

                    {{-- media box --}}
                    <div class="details-product single-product-galery">
                        <div class="details-thumd" style="padding-top: 0px">
                            <div class="image-preview-container image-thick-box image_preview_container">
                                <img id="img_zoom" 
                                    data-zoom-image="{{ route('admin.barang.barang-image', $product->barangImages()->first()->id) }}" 
                                    src="{{ route('admin.barang.barang-image', $product->barangImages()->first()->id) }}" 
                                    alt="">
                                {{-- <a href="#" class="btn-zoom open_qv"><i class="fa fa-search" aria-hidden="true"></i></a> --}}
                            </div>
                            <div class="product_preview image-small">
                                <div id="thumbnails" class="thumbnails_carousel owl-carousel" data-nav="true" data-autoplay="false" data-dots="false" data-loop="false" data-margin="25" data-responsive='{"0":{"items":3},"480":{"items":3},"600":{"items":3},"1000":{"items":3}}' >
                                    @foreach($product->barangImages as $row)
                                        <a href="#" data-image="{{ route('admin.barang.barang-image', $row->id) }}" 
                                                data-zoom-image="{{ route('admin.barang.barang-image', $row->id) }}" 
                                                @if ($row->first) class="active" @endif>
                                            <img src="{{ route('admin.barang.barang-image', $row->id) }}" 
                                                data-large-image="{{ route('admin.barang.barang-image', $row->id) }}" 
                                                alt="">
                                        </a>
                                    @endforeach

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
                                @if(!isset($user) || $user->hasRole('user'))

                                    @if($product->diskon > 0)
                                        @php
                                            $harga = $product->h_nomem;
                                            $harga = $harga - ($harga * ($product->diskon/100));
                                        @endphp
                                        <span style="text-decoration:  line-through;">@currency($product->h_nomem)</span> 
                                        <span>@currency($harga)</span>
                                    @else
                                        <span>@currency($product->h_nomem)</span>
                                    @endif

                                @else

                                    @if($product->diskon > 0)
                                        @php
                                            $harga = $product->h_member;
                                            $harga = $harga - ($harga * ($product->diskon/100));
                                        @endphp
                                        <span style="text-decoration:  line-through;">@currency($product->h_member)</span> 
                                        <span>@currency($harga)</span>
                                    @else
                                        <span>@currency($product->h_member)</span>
                                    @endif
                                    
                                @endif                            
                            </div>
                            <div class="product-details-description">
                                <p class="desc">{{ $product->deskripsi_lengkap }}</p>
                            </div>
                            <div class="group-button">
                                <div class="quantity-add-to-cart">
                                    <div class="quantity">
                                        <div class="control">
                                            <a wire:click="decrementQty" class="btn-number qtyminus quantity-minus" href="#">-</a>
                                            <input type="text" wire:model="qty" data-step="1" data-min="1" value="{{ $qty }}" title="Qty" class="input-qty qty" size="4">
                                            <a wire:click="incrementQty" href="#" class="btn-number qtyplus quantity-plus">+</a>
                                        </div>
                                    </div>
                                    <button wire:click="addToCart" class="single_add_to_cart_button button" onclick="tampilkanNotifikasi('{{ $product->nama }}', {{ $qty }})">Add to cart</button>
                                </div>
                                <p>&nbsp;</p>
                                <p>&nbsp;</p>
                                <div class="contact-bc">
                                    <p>Temukan produk perawatan yang sesuai dengan kebutuhanmu hanya Bersama Bellezkin. Dapatkan gratis konsultasi bersama Beauty Consultant kami :)</p> 
                                </div>
                                <div style="display: flex;flex-direction: column">
                                    <a href="https://api.whatsapp.com/send?phone=628112288142&amp;text=Halo!%0ASaya%20ingin%20ingin%20konsultasi%20lebih%20lanjut%20mengenai%20produk%20Bellezkin%0ASource : https://shop.bellezkin.com/products/19004/detail/" target="_blank" class="button btn-consultation-wa">
                                        <i class="fa fa-whatsapp logo_bc"></i>&nbsp; Contact Beauty Consultant
                                    </a>
                                    <p id="warn" style="margin-top: 16px">
                                        Klik <i class="fa fa-arrow-up"></i> 
                                        untuk langsung terhubung via WhatssApp 
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    {{-- details atbs --}}
                    <div class="tab-details-product" style="margin-bottom: 50px">
                        <ul class="tab-link">
                            <li class="active"><a data-toggle="tab" aria-expanded="true" href="#product-descriptions2">Deskripsi</a></li>
                            <li class=""><a data-toggle="tab" aria-expanded="true" href="#information ">Cara Pakai</a></li>
                        </ul>
                        <div class="tab-container">
                            <div id="product-descriptions2" class="tab-panel active">
                                <p> {!! $product->deskripsi !!} </p>
                            </div>
                            <div id="information" class="tab-panel">
                                <p> {!! $product->cara_pakai !!} </p>
                            </div>
                        </div>
                    </div>

                    {{-- reset floading --}}
                    <div class="reset-floatding"></div>

                    {{-- realated product --}}
                    {{-- <x-related-products :related-products="$relatedProducts" /> --}}

                </div>
            </div>

            {{-- full width layout have no sideba --}}

        </div>

    </div>
</div>

@section('scripts')
    <script src="{{ asset('assets/js/snackbar.min.js') }}"></script>
    <script>
        function tampilkanNotifikasi(namaBarang, qty) {
            Snackbar.show({
                pos: 'top-center',
                text: `${qty}X ${namaBarang} ditambahkan!`,
                actionText: 'Lihat',
                actionTextColor: '#bd0a74',
                duration: 2000,
                onActionClick: function(element) {
                    //Set opacity of element to 0 to close Snackbar
                    $(element).css('opacity', 0);
                    window.location.href = "{{ route('mycart') }}"
              }
            });
        }
    </script>
@endsection