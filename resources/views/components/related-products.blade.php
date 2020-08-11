<!-- top selling box -->
<div class="turan-product slider-product product-grid style2 rows-space-20 no-margin-on-mobile">
    <div class="container">
        <h3 class="custommenu-title-blog">#Weekly Top Selling</h3>
        <div class="product-list-owl owl-slick equal-container nav-center" data-slick='{"autoplay":false, "autoplaySpeed":1000, "arrows":true, "dots":false, "infinite":true, "speed":800,"infinite":false}' data-responsive='[{"breakpoint":"2000","settings":{"slidesToShow":4}},{"breakpoint":"1200","settings":{"slidesToShow":3}},{"breakpoint":"992","settings":{"slidesToShow":2}},{"breakpoint":"768","settings":{"slidesToShow":2}},{"breakpoint":"530","settings":{"slidesToShow":1}}]'>


            @forelse ($relatedProducts as $product)    
                <div class="product-item style-1">
                    <div class="product-inner equal-element">
                        {{-- <div class="product-top">
                            <div class="flash">
                                    <span class="onnew">
                                        <span class="text">
                                            new
                                        </span>
                                    </span>
                            </div>
                            <div class="yith-wcwl-add-to-wishlist">
                                <div class="yith-wcwl-add-button">
                                    <a href="#">Add to Wishlist</a>
                                </div>
                            </div>
                        </div> --}}
                        <div class="product-thumb">
                            <div class="thumb-inner">
                                <a href="{{ route('products.show', $product->kode) }}">
                                    <img src="{{ asset('assets/images/thumbnails/' . $product->kode . '.jpg') }}" alt="">
                                </a>
                            </div>
                            {{-- <a href="#" class="button quick-wiew-button">Quick View</a> --}}
                        </div>
                        <div class="product-info">
                            <h5 class="product-name product_title">
                                <a href="{{ route('products.show', $product->kode) }}">{{ $product->nama }}</a>
                            </h5>
                            <div class="group-info">
                                {{-- <div class="stars-rating">
                                    <div class="star-rating">
                                        <span class="star-3"></span>
                                    </div>
                                    <div class="count-star">
                                        (3)
                                    </div>
                                </div> --}}
                                <div class="price"><span>@currency($product->harga)</span></div>
                            </div>
                        </div>
                       {{--  <div class="loop-form-add-to-cart">
                            <form class="cart">
                                <div class="single_variation_wrap">
                                    <div class="quantity">
                                        <div class="control">
                                            <a class="btn-number qtyminus quantity-minus" href="#">-</a>
                                            <input type="text" data-step="1" data-min="0" value="1" title="Qty"
                                                class="input-qty qty" size="4">
                                            <a href="#" class="btn-number qtyplus quantity-plus">+</a>
                                        </div>
                                    </div>
                                    <button class="single_add_to_cart_button button">Add to cart</button>
                                </div>
                            </form>
                        </div> --}}
                    </div>
                </div>
            @empty
                
            @endforelse
        </div>
    </div>
</div>