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
                            Shopping Cart
                        </span>
                    </li>
                </ul>
            </div>

            {{-- main content --}}
            <div class="row">
                <div class="main-content-cart main-content col-sm-12">
                    <h3 class="custom_blog_title">#Shopping Cart</h3>

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
                                                        <a class="remove" wire:click="removeFromCart('{{ $item['kode_barang'] }}')"></a>
                                                    </td>
                                                    <td class="product-thumbnail">
                                                        <a href="#">
                                                            <img src="{{ asset('assets/images/thumbnails/' . $item['kode_barang'] . '.jpg') }}" 
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
                                                                <a class="btn-number qtyminus quantity-minus" 
                                                                    href="#"
                                                                    wire:click="updateQty('{{ $item['kode_barang'] }}', 'decrement')">-</a>
                                                                <input type="text" 
                                                                        wire:model="{{ $item['qty'] }}"
                                                                        data-step="1" 
                                                                        data-min="0" 
                                                                        title="Qty" 
                                                                        class="input-qty qty" 
                                                                        value="{{ $item['qty'] }}"
                                                                        size="4">
                                                                <a href="#" 
                                                                    wire:click="updateQty('{{ $item['kode_barang'] }}', 'increment')"
                                                                    class="btn-number qtyplus quantity-plus"
                                                                    >+</a>
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
                                                    {{-- <div class="coupon">
                                                        <label class="coupon_code">Coupon Code:</label>
                                                        <div class="coupon-wrapp">
                                                            <input type="text" class="input-text" placeholder="Promotion code here">
                                                            <a href="#"  class="button"></a>
                                                        </div>
                                                    </div> --}}
                                                    <div class="order-total pull-left">
                                                        <div>
                                                            <span class="title">
                                                                Qty:
                                                            </span>
                                                            <span class="total-price">
                                                                {{ $totalItems }} Pcs
                                                            </span>
                                                        </div>
                                                    </div>
                                                    <div class="order-total">
                                                        <div>
                                                            <span class="title">
                                                                Subtotal:
                                                            </span>
                                                            <span class="total-price">
                                                                @currency($subtotal)
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
                                    <button class="button btn-cart-to-checkout">
                                        Checkout
                                    </button>
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