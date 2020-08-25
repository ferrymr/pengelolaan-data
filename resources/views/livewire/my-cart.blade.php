@extends('layouts.app')

@section('content')

    <!-- wrap main content -->
    <div class="site-content">
        <main class="site-main  main-container no-sidebar">
            <div class="container">

                <!-- breadcrumb -->
                <div class="breadcrumb-trail breadcrumbs">
                    <ul class="trail-items breadcrumb">
                        <li class="trail-item trail-begin">
                            <a href="">
                                <span>
                                    Home
                                </span>
                            </a>
                        </li>
                        <li class="trail-item trail-end active">
                            <span>
                                Shopping Cart
                            </span>
                        </li>
                    </ul>
                </div>

                <!-- main content -->
                <div class="row">
                    <div class="main-content-cart main-content col-sm-12">
                        <div class="row">
                            <div class="col-md-8">
                                @foreach($cartItems as $item)
                                <div class="cart-item">
                                    <div class="desc-item">
                                        <div class="product-img">
                                            <img src="{{ asset('assets/images/thumbnails/' . $item['kode_barang'] . '.jpg') }}" alt="{{ $item['nama'] }}">
                                        </div>
                                        <div class="item-detail">
                                            <div class="item-name">{{ $item['nama'] }}</div>
                                            <div class="section-price">
                                                {{-- <div class="before-discount">Rp. 400.000</div> --}}
                                            <div class="item-price">@currency($item['h_nomem']) </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="section-bot-item">
                                        <div class="text-promo">
                                            {{-- @if($data == 1)
                                            <span>Claim Promo</span>
                                            @endif --}}
                                        </div>
                                        <div class="control-item">
                                            {{-- <a class="remove"></a> --}}
                                            <div class="quantity">
                                                <div class="control" style="width: 86px!important;">
                                                    {{-- <div class="btn-number qtyminus quantity-minus">-</div>  --}}
                                                    x<input type="text" disabled wire:model="{{ $item['qty'] }}" data-step="1" min="1" title="Qty" size="4" class="input-qty qty" value="{{ $item['qty'] }}" style="width: 38px;">
                                                    {{-- <div wire:click="incrementQty({{ $item['kode_barang'] }})" class="btn-number qtyplus quantity-plus">+</div> --}}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    {{-- @if($data == 1)
                                    <div class="list-promo">
                                        @foreach([1,2] as $promo)
                                        <div class="cart-item-promo">
                                            <div class="check-promo">
                                                <input type="checkbox" name="" id="">
                                            </div>
                                            <div class="desc-item">
                                                <div class="product-img">
                                                    <img src="https://shop.bellezkin.com/api/public/assets/img/thumbnails/16010.jpg" alt="Whitening Day Spray">
                                                </div>
                                                <div class="item-detail">
                                                    <div class="item-name">Serum Phytocell</div>
                                                    <div class="section-price">
                                                        @if($promo == 1)
                                                        <div class="before-discount">Rp. 400.000</div>
                                                        <div class="item-price">Rp. 250.000</div>
                                                        @else
                                                        <div class="item-price">FREE</div>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        @endforeach
                                    </div>
                                    @endif --}}
                                </div>
                                @endforeach


                                {{-- promo kelipatan pembelian produk --}}
                                {{-- <div class="promo-item">
                                    <h3>Beli produk Serum Phytocell + Whitening Day Spray dan dapatkan item di bawah ini</h3>
                                    <div class="cart-item">
                                        <div class="desc-item">
                                            <div class="product-img">
                                                <img src="https://shop.bellezkin.com/api/public/assets/img/thumbnails/19010.jpg" alt="Whitening Day Spray">
                                            </div>
                                            <div class="item-detail">
                                                <div class="item-name">Promo item</div>
                                                <div class="section-price">
                                                    <div class="before-discount">Rp. 400.000</div>
                                                    <div class="item-price">Rp. 400.000</div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="section-bot-item">
                                            <div class="text-promo">
                                                @if($data == 1)
                                                <span>Claim Promo</span>
                                                @endif
                                            </div>
                                            <div class="control-item">
                                                <a class="remove"></a>
                                                <div class="quantity">
                                                    <div class="control" style="width: 86px!important;">
                                                        <div class="btn-number qtyminus quantity-minus">-</div> 
                                                        <input type="text" data-step="1" min="1" title="Qty" size="4" class="input-qty qty" value="1" style="width: 38px;">
                                                        <div class="btn-number qtyplus quantity-plus">+</div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div> --}}
                            </div>
                            <div class="col-md-4">
                                <div class="card-total-cart" id="card-cart">
                                    <div>
                                        {{-- <div class="section-promo">
                                            <input type="text" class="widget-promo text-bold-black" name="" id="" placeholder="Masukan kode promo disini">
                                            <div class="arrow-right"></div>
                                        </div> --}}
                                        <div class="section-total">
                                            <span class="title-section-card">Ringkasan belanja</span>
                                            <div class="total-number">
                                                <div>Total Harga</div>
                                                <div class="cost">Rp. 905.000</div>
                                            </div>
                                            <div class="section-button">
                                                <a class="btn-checkout-cart" href="{{ route('checkout') }}">
                                                    <span>Checkout</span>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- full width layout have no sidebar-->

            </div>
        </main>
    </div>
    <br>
    <br>

    
@endsection

@section('scripts')
<script type="text/javascript" src="{{ asset('assets/js/sticky/jquery.sticky.js')}}"></script>
<script>
    $(function(){
        console.warn(window.innerWidth);
        if(window.innerWidth > 400) {
            $("#card-cart").sticky({ topSpacing: 50 });
        }
    });
</script>
@endsection