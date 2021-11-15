<div class="slider-product products product-grid rows-space-20 no-margin-on-mobile">
    <div class="container">
        <div class="owl-products owl-slick equal-container nav-center"  
            data-slick ='{
                "autoplay":false, 
                "autoplaySpeed":1000, 
                "arrows":true, 
                "dots":false, 
                "infinite":true, 
                "speed":800, "rows":1
            }' 
            data-responsive='[
                {
                    "breakpoint":"2000",
                    "settings":{
                        "slidesToShow":2
                    }
                },
                {
                    "breakpoint":"1200",
                    "settings":{
                        "slidesToShow":2
                    }
                },
                {
                    "breakpoint":"992",
                    "settings":{
                        "slidesToShow":1
                    }
                },
                {
                    "breakpoint":"768",
                    "settings":{
                        "slidesToShow":2
                    }
                },
                {
                    "breakpoint":"600",
                    "settings":{
                        "slidesToShow":1
                    }
                }
            ]'>

            @forelse ($products as $product)
                <div class="product-item style2">
                    <div class="product-inner equal-element">
                        <div class="product-thumb">
                            <div class="product-top">
                                <div class="flash">
                                    <span class="onnew">
                                        <span class="text">PROMO</span>
                                    </span>
                                </div>
                                {{-- <div class="yith-wcwl-add-to-wishlist"><div class="yith-wcwl-add-button"><a href="#">Add to Wishlist</a></div></div> --}}
                            </div>
                            <div class="thumb-inner">
                                <a href="{{ route('products.show', [$product->kode_barang, Illuminate\Support\Str::slug($product->nama, '-')]) }}">
                                    <img src="{{ asset('assets/images/thumbnails/' . $product->kode_barang . '.jpg')}}" alt="">
                                </a>
                            </div>
                            {{-- <a href="#" class="button quick-wiew-button">Quick View</a> --}}
                        </div>
                        <div class="product-info">
                            <h5 class="product-name product_title">
                                <a href="{{ route('products.show', [$product->kode_barang, Illuminate\Support\Str::slug($product->nama, '-')]) }}">
                                    {{ $product->nama }} 
                                </a>
                            </h5>
                            <div class="group-info">
                                {{-- <div class="desc">{{ $product->deskripsi }}</div> --}}
                                <div class="desc">
                                    Lorem ipsum dolor sit amet Lorem ipsum dolor sit amet Lorem ipsum dolor sit amet
                                </div>
                            </div>
                            <div class="group-buttons">
                                <div class="price"><span>@currency($product->harga)</span></div>
                                <a href="{{ route('products.show', [$product->kode_barang, Illuminate\Support\Str::slug($product->nama, '-')]) }}" class="add_to_cart_button button" tabindex="0">
                                    SHOP NOW
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                Promo product belum tersedia saat ini.
            @endforelse
        </div>
    </div>
</div>