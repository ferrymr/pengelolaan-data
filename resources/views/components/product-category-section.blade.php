
<!-- product category -->
<div class="turan-tabs-wrapp style2 rows-space-50">
    <div class="container">
        <h3 class="custommenu-title-blog">#BestOfBellezkin</h3>
        <div class="turan-tabs  style2 avoid-underline">
            <div class="tab-head">
                <ul class="tab-link">
                    <li class="active">
                        <a data-toggle="tab" aria-expanded="true" data-animate="fadeInUp" href="#disc">Satuan</a>
                    </li>
                    <li class="">
                        <a data-toggle="tab" aria-expanded="true" data-animate="fadeInUp" href="#cheap">Series</a>
                    </li>
                </ul>
            </div>
            <div class="tab-container">
                <div id="disc" class="tab-panel active">
                    <div class="turan-product list-products product-grid style2">
                        <div class="product-list-owl owl-slick equal-container nav-center"  data-slick ='{"autoplay":true, "autoplaySpeed":3000, "arrows":true, "dots":true, "infinite":true, "speed":800,"infinite":true}' data-responsive='[{"breakpoint":"2000","settings":{"slidesToShow":4}},{"breakpoint":"1200","settings":{"slidesToShow":3}},{"breakpoint":"992","settings":{"slidesToShow":2}},{"breakpoint":"768","settings":{"slidesToShow":2}},{"breakpoint":"530","settings":{"slidesToShow":1}}]'>
                            @forelse ($bestOfPieces as $item)
                                <div class="product-item style-1">
                                    <div class="product-inner equal-element">
                                        <div class="product-top">
                                            <div class="flash">
                                                <span class="onnew"><span class="text">NEW PRODUCT</span></span>
                                            </div>
                                            {{-- <div class="yith-wcwl-add-to-wishlist">
                                                <div class="yith-wcwl-add-button">
                                                    <a href="#">Add to Wishlist</a>
                                                </div>
                                            </div> --}}
                                        </div>
                                        <div class="product-thumb">
                                            <div class="thumb-inner">
                                                <a href="{{ route('products.show', [$item->kode_barang, Illuminate\Support\Str::slug($item->nama, '-')]) }}">
                                                    <img src="{{ asset('assets/images/thumbnails/' . $item->kode_barang . '.jpg') }}" alt="">
                                                </a>
                                            </div>
                                        </div>
                                        <div class="product-info">
                                            <h5 class="product-name product_title">
                                                <a href="{{ route('products.show', [$item->kode_barang, Illuminate\Support\Str::slug($item->nama, '-')]) }}">
                                                    {{ $item->nama }} 
                                                </a>
                                            </h5>
                                            <div class="group-info">
                                                <div class="price"><ins>@currency($item->harga)</ins></div>
                                            </div>
                                        </div>
                                        {{-- button add to cart directly --}}
                                        {{-- <div class="loop-form-add-to-cart">
                                            <form class="cart">
                                                <input type="hidden" name="attribute_pa_size"  value="M">
                                                <input type="hidden" name="attribute_pa_color" value="hunter_green">
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
                <div id="cheap" class="tab-panel">
                    <div class="turan-product list-products product-grid style2">
                        <div class="product-list-owl owl-slick equal-container nav-center"  data-slick ='{"autoplay":true, "autoplaySpeed":3000, "arrows":true, "dots":true, "infinite":true, "speed":800,"infinite":true}' data-responsive='[{"breakpoint":"2000","settings":{"slidesToShow":4}},{"breakpoint":"1200","settings":{"slidesToShow":3}},{"breakpoint":"992","settings":{"slidesToShow":2}},{"breakpoint":"768","settings":{"slidesToShow":2}},{"breakpoint":"481","settings":{"slidesToShow":1}}]'>
                            @forelse ($bestOfSeries as $item)
                                <div class="product-item style-1">
                                    <div class="product-inner equal-element">
                                        <div class="product-top">
                                            <div class="flash">
                                                <span class="onnew"><span class="text">new</span></span>
                                            </div>
                                            <div class="yith-wcwl-add-to-wishlist">
                                                <div class="yith-wcwl-add-button">
                                                    <a href="#">Add to Wishlist</a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="product-thumb">
                                            <div class="thumb-inner">
                                                <a href="#">
                                                    <img src="{{ asset('assets/images/thumbnails/' . $item->kode_barang . '.jpg') }}" alt="">
                                                </a>
                                            </div>
                                        </div>
                                        <div class="product-info">
                                            <h5 class="product-name product_title">
                                            <a href="#">{{ $item->nama }} </a>
                                            </h5>
                                            <div class="group-info">
                                                <div class="price"><ins>@currency($item->harga)</ins></div>
                                            </div>
                                        </div>
                                        <div class="loop-form-add-to-cart">
                                            <form class="cart">
                                                <input type="hidden" name="attribute_pa_size"  value="M">
                                                <input type="hidden" name="attribute_pa_color" value="hunter_green">
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
                                        </div>
                                    </div>
                                </div>
                            @empty
                            @endforelse
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>