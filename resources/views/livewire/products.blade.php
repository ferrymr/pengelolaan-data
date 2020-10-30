{{-- main content --}}
<div class="row">

    {{-- side main --}}
    <div class="content-area shop-grid-content full-width col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="site-main">

            {{-- page title --}}
            <h3 class="custommenu-title-blog">#{{ $category }}</h3>

            {{-- wrap products --}}
            <ul class="row list-products auto-clear equal-container product-grid">

                @forelse ($products as $product)
                    <a href="{{ route('products.show', $product->kode_barang) }}">
                    <li class="product-item  col-lg-3 col-md-4 col-sm-6 col-xs-6 style-1">
                        <div class="product-inner equal-element">
                            <div class="product-top">
                                <div class="flash">
                                    <span class="onnew"><span class="text">{{ $tags }}</span></span>
                                </div>
                                <div class="yith-wcwl-add-to-wishlist">
                                    <div class="yith-wcwl-add-button">
                                        {{-- <a href="#">Add to Wishlist</a> --}}
                                    </div>
                                </div>
                            </div>
                            <div class="product-thumb">
                                <div class="thumb-inner">
                                    <a href="{{ route('products.show', $product->kode_barang) }}">
                                        {{-- {{ dd($product->barangImages()->first()) }} --}}
                                        {{-- <img src="{{ asset('assets/images/thumbnails/' . $product->kode_barang . '.jpg') }}" alt="{{ $product->nama }}"> --}}
                                        <img src="{{ route('admin.barang.barang-image', $product->barangImages()->first()->id) }}" alt="{{ $product->nama }}">
                                    </a>
                                </div>
                                {{-- <a href="#" class="button quick-wiew-button">Quick View</a> --}}
                            </div>
                            <div class="product-info">
                                <h5 class="product-name product_title">
                                    <a href="{{ route('products.show', $product->kode_barang) }}">
                                        {{ $product->nama }}
                                    </a>
                                </h5>
                                <div class="group-info">
                                    {{-- <div class="stars-rating"><div class="star-rating"><span class="star-4"></span></div><div class="count-star">(14)</div></div> --}}
                                    @if($user->hasRole('user'))
                                        <div class="price">
                                            <span>@currency($product->h_nomem)</span>
                                        </div>
                                    @else
                                        <div class="price">
                                            <span>@currency($product->h_member)</span>
                                        </div>
                                    @endif   
                                    
                                </div>
                            </div>
                            {{-- <div class="loop-form-add-to-cart">
                                <div class="cart">
                                    <div class="single_variation_wrap">
                                        <div class="quantity">
                                            <div class="control">
                                                <a class="btn-number qtyminus quantity-minus" href="#">-</a>
                                                <input type="text" wire:model="qty" data-step="1" data-min="0" value="1" title="Qty" class="input-qty qty" size="4">
                                                <a href="#" class="btn-number qtyplus quantity-plus">+</a>
                                            </div>
                                        </div>
                                        <button wire:click="addToCart('{{ $product->kode_barang }}', '{{ $qty }}')" class="single_add_to_cart_button button">Add to cart</button>
                                    </div>
                                </div>
                            </div> --}}
                        </div>
                    </li>
                    </a>

                @empty
                    <h4 class="text-center">Produk belum tersedia saat ini</h4>
                @endforelse

            </ul>

            <br/>
            {{-- pagination --}}
            @if(method_exists($products, 'links'))
                {{ $products->links() }}
            @endif

        </div>
    </div>

     {{-- full width layout have no sidebar --}}

</div>