{{-- main content --}}
<div class="site-content">
    <main class="site-main  main-container no-sidebar">
        <div class="container">

            {{-- breadcrumb --}}
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
                            My Cart
                        </span>
                    </li>
                </ul>
            </div>

            {{-- main content --}}
            <div class="row">
                <div class="main-content-cart main-content col-sm-12">
                    <h3 class="custom_blog_title">#My Cart</h3>

                    @include('flash::message')

                    <div class="page-main-content">
                        <div class="shoppingcart-content">
                            <form action="shoppingcart.html" class="cart-form">
                                <table class="shop_table">
                                    <thead>
                                        <tr>
                                            <th class="product-remove"></th>
                                            <th class="product-thumbnail"></th>
                                            <th class="product-name"></th>
                                            <th class="product-price"></th>
                                            <th class="product-quantity"></th>
                                            <th class="product-subtotal"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if ($cartItems)
                                            @foreach($cartItems as $item)
                                                <tr class="cart_item">
                                                    <td class="product-remove">
                                                        @if(($item['kode_barang'] == "CATALO" && isset($user->status) && $user->status == 2424))
                                                        @elseif(($item['flag_new_reseller'] == 1 && isset($user->status) && $user->status == 2525))
                                                        @else
                                                            <a class="remove" wire:click="removeFromCart('{{ $item['kode_barang'] }}')"></a>
                                                        @endif
                                                    </td>
                                                    <td class="product-thumbnail">
                                                        <a href="#">
                                                            <img src="{{ route('admin.barang.barang-image', $item['barang_image_id']) }}" 
                                                                alt="{{ $item['nama'] }}"
                                                                class="attachment-shop_thumbnail size-shop_thumbnail wp-post-image">
                                                        </a>
                                                    </td>
                                                    <td class="product-name" data-title="Product">
                                                        <a href="#" class="title">
                                                            {{ $item['nama'] }}
                                                        </a>
                                                    </td>
                                                    <td class="product-quantity" data-title="Quantity">

                                                        <div class="quantity">
                                                            <div class="control">
                                                                @if(($item['kode_barang'] == "CATALO" && isset($user->status) && $user->status == 2424))
                                                                @elseif(($item['flag_new_reseller'] == 1 && isset($user->status) && $user->status == 2525))
                                                                @else
                                                                    @if($item['qty'] > 1)
                                                                        <a class="btn-number qtyminus quantity-minus" 
                                                                            href="#"
                                                                            wire:click="updateQty('{{ $item['kode_barang'] }}', 'decrement')"
                                                                            id='decrement-{{ $item['kode_barang'] }}'>-</a>
                                                                    @endif
                                                                @endif
                                                                <input type="text" 
                                                                        wire:model="{{ $item['qty'] }}"
                                                                        {{-- wire:model="{{ $qty }}" --}}
                                                                        data-step="1" 
                                                                        data-min="1" 
                                                                        title="Qty" 
                                                                        class="input-qty qty" 
                                                                        {{-- value="{{ $item['qty'] }}" --}}
                                                                        value="{{ $item['qty'] }}"
                                                                        id="qty-box-{{ $item['kode_barang'] }}"
                                                                        size="4" readonly>
                                                                @if(($item['kode_barang'] == "CATALO" && isset($user->status) && $user->status == 2424))
                                                                @elseif(($item['flag_new_reseller'] == 1 && isset($user->status) && $user->status == 2525))
                                                                @else
                                                                    <a href="#" 
                                                                        wire:click="updateQty('{{ $item['kode_barang'] }}', 'increment')"
                                                                        class="btn-number qtyplus quantity-plus"
                                                                        id='increment-{{ $item['kode_barang'] }}'>+</a>
                                                                @endif

                                                                <div wire:loading>
                                                                    <div id="loading">
                                                                        <img id="loading-image" src="{{ asset('assets/images/loader.gif') }}" alt="Loading..." />
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td class="product-price" data-title="Price">
                                                        <span class="woocommerce-Price-amount amount">
                                                            @currency($item['h_nomem'])
                                                        </span>
                                                    </td>
                                                </tr>
                                            @endforeach

                                            <tr>
                                                <td class="actions">
                                                    <div class="coupon">
                                                        <label class="coupon_code">Coupon Code: &nbsp;</label>
                                                        <div class="coupon-wrapp">
                                                            <input wire:model="coupon" type="text" class="input-text" placeholder="Promotion code here">
                                                            <a href="#" wire:click="inputCode()" class="button"></a>
                                                        </div>
                                                    </div>
                                                    <div class="order-total">
                                                        <div class="mb-2 text-right">
                                                            <span class="title">
                                                                Qty:
                                                            </span>
                                                            <span class="total-price">
                                                                <b>{{ $totalItems }} Pcs</b>
                                                            </span>
                                                        </div>
                                                        @if(!empty(session('coupon')))
                                                            <div class="mb-2 text-right">
                                                                <span class="title">
                                                                    Discount / Potongan:
                                                                </span>
                                                                <span class="total-price">
                                                                    <b>{{ session('coupon') }}</b>
                                                                </span>
                                                            </div>
                                                        @endif
                                                        <div class="text-right">
                                                            <span class="title ">
                                                                Subtotal:
                                                            </span>
                                                            <span class="total-price">
                                                                <b>@currency($subtotal)</b>
                                                            </span>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                        @else
                                            <tr class="">
                                                <td>
                                                    <h5> &nbsp; &nbsp; Tidak ada item</h5>
                                                </td>
                                            </tr>
                                        @endif
                                        
                                    </tbody>
                                </table>
                            </form>
                            <div class="control-cart">                                
                                <a href="{{ route('home') }}" class="button btn-back-to-shipping">
                                    Kembali belanja
                                </a>
                                @if(!empty($cartItems))
                                    <a href="{{ $nextPageLink }}" class="button btn-cart-to-checkout">
                                        Checkout
                                    </a>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- full width layout have no sidebar--}}

        </div>
    </main>
</div>
<br>
<br>

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