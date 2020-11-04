<!--main content-->
<div class="row">

    <!--side main-->
    <div class="content-area shop-grid-content full-width col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="site-main">

            <form action="" method="GET">

                <!--top control-->
                <div class="shop-top-control">

                    <div class="select-item select-form">
                        <span class="title">
                            @if($categoryName)
                                Semua produk <b>"{{ $categoryName }}"</b>
                            @else
                                Semua kategori
                            @endif
                        </span>
                    </div>

                    <!--order sort-->                   
                    <div class="grid-view-mode">
                        <div class="inner">                        
                            <span class="title">Urut berdasarkan</span>&nbsp;
                            <select onchange="submit()" data-placeholder="Harga Tertinggi" name="sorting" class="chosen-select">
                                <option value="" selected>Pilih sorting</option>
                                <option value="highest_price" @if(isset($_GET['sorting']) && $_GET['sorting'] == 'highest_price') selected @endif>Harga Tertinggi</option>
                                <option value="lowest_price" @if(isset($_GET['sorting']) && $_GET['sorting'] == 'lowest_price') selected @endif>Harga Terendah</option>
                            </select>
                        </div>
                    </div>
                
                </div>

                @if($categoryName == "ALL")
                    <p><b>Pilih berdasarkan kategori:</b></p>
                    <div class="shop-top-control">

                        <div class="select-item select-form">
                            <span class="title">
                                <div class="col-md-2">
                                    <input onchange="submit()" type="checkbox" name="whitening" id="whitening" value="WHITENING" @if(isset($_GET['whitening']) && !empty($_GET['whitening'])) checked @endif> &nbsp;
                                    <label for="whitening">Whitening</label>
                                </div>
                                <div class="col-md-2">
                                    <input onchange="submit()" type="checkbox" name="purifiying" id="purifiying" value="PURIFYING" @if(isset($_GET['purifiying']) && !empty($_GET['purifiying'])) checked @endif> &nbsp;
                                    <label for="purifiying">Purifiying</label>
                                </div>
                                <div class="col-md-2">
                                    <input onchange="submit()" type="checkbox" name="decorative" id="decorative" value="DECORATIVE" @if(isset($_GET['decorative']) && !empty($_GET['decorative'])) checked @endif> &nbsp;
                                    <label for="decorative">Decorative</label>
                                </div>
                                <div class="col-md-2">
                                    <input onchange="submit()" type="checkbox" name="bodycare" id="bodycare" value="BODYCARE" @if(isset($_GET['bodycare']) && !empty($_GET['bodycare'])) checked @endif> &nbsp;
                                    <label for="bodycare">Body Care</label>
                                </div>
                            </span>
                        </div>
                    
                    </div>
                @endif

            </form>

            <!--page title-->
            <h4>Menampilkan semua produk <b>{{ $categoryName }}</b></h4><br/>

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
                                    @if(!empty($product->barangImages()->first()))
                                        <a href="{{ route('products.show', $product->kode_barang) }}">
                                            <img src="{{ route('admin.barang.barang-image', $product->barangImages()->first()->id) }}" 
                                                    alt="{{ $product->nama }}">
                                        </a>
                                    @else
                                        <img id="img_zoom" 
                                                data-zoom-image="{{ asset('assets/images/product-1.jpg') }}" 
                                                src="{{ asset('assets/images/product-1.jpg') }}" 
                                                alt="">
                                    @endif
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
                                    <div class="price"><span>@currency($product->h_nomem)</span></div>
                                </div>
                            </div>
                            {{-- button add to cart directly --}}
                            {{-- <div class="loop-form-add-to-cart">
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
                            </div> --}}
                        </div>
                    </li>
                @empty
                    <h5 class="text-center">Produk belum tersedia</h5>
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

@section('scripts')
    <script></script>
@stop