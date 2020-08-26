<header class="header style1">
    <div class="container">

        {{-- main header --}}
        <div class="main-header">
            <div class="row">
                <div class="col-lg-4 col-sm-6 col-md-6 col-xs-7 col-ts-12 header-element">
                    <div class="turan-socials social-header">
                        <div  class="socials">
                            <a href="https://www.facebook.com/bellezkincare.natural/" class="social-item">
                                <i class="fa fa-facebook-square"></i>
                            </a>
                            <a href="https://www.instagram.com/bellezkin/" class="social-item">
                                <i class="fa fa-instagram"></i>
                            </a>
                            <a href="https://www.youtube.com/channel/UCE0Hte0fUMeWhGrVn5zgwRQ" class="social-item">
                                <i class="fa fa-youtube-square"></i>
                            </a>
                         </div>
                    </div>
                    {{-- <div class="header-language">
                        <div class="turan-language turan-dropdown">
                            <a href="#" class="active language-toggle" data-turan="turan-dropdown">
                                <span>French (EUR)</span>
                            </a>
                            <ul class="turan-submenu">
                                <li class="switcher-option">
                                    <a href="#"><span>English (USD)</span></a>
                                </li>
                                <li class="switcher-option">
                                    <a href="#"><span>Japanese (JPY)</span></a>
                                </li>
                            </ul>
                        </div>
                    </div> --}}
                </div>
                <div class="col-lg-4 col-sm-6 col-md-6 col-xs-5 col-ts-12">
                    <div class="logo">
                        <a href="index.html">
                            <img src="{{ asset('assets/images/logo.png') }}" alt="">
                        </a>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-12 col-md-12 col-xs-12 col-ts-12">
                    <div class="header-control">

                        <div class="block-minicart turan-mini-cart block-header turan-dropdown">
                            <a href="javascript:void(0);" class="shopcart-icon" data-turan="turan-dropdown">Cart<span class="count">{{ $cartTotal }}</span></a>
                            <div class="shopcart-description turan-submenu">
                                <div class="content-wrap">
                                    <h3 class="title">Shopping Cart</h3>
                                    <ul class="minicart-items">
                                        @forelse ($cartItems as $cartItem)
                                            <li class="product-cart mini_cart_item">
                                                <a href="#" class="product-media">
                                                    <img src="{{ asset('assets/images/thumbnails/' . $cartItem['kode_barang'] . '.jpg') }}" alt="">
                                                </a>
                                                <div class="product-details">
                                                    <h5 class="product-name"><a href="{{ route('products.show', $cartItem['kode_barang']) }}">{{ $cartItem['nama'] }}</a></h5>
                                                    <div class="variations">
                                                        <span class="attribute_color"><a href="#">{{ $cartItem['jenis'] }}</a></span>
                                                    </div>
                                                    <span class="product-price"><span class="price"><span>{{ $cartItem['h_nomem'] }}</span></span></span>
                                                    <span class="product-quantity"> x {{ $cartItem['qty'] }}</span>
                                                    <div class="product-remove">
                                                        <i wire:click="removeFromCart('{{ $cartItem['kode_barang'] }}')" class="fa fa-trash" aria-hidden="true"></i>
                                                    </div>
                                                </div>
                                            </li>

                                        @empty
                                            
                                        @endforelse
                                        {{-- <li class="product-cart mini_cart_item">
                                            <a href="#" class="product-media">
                                                <img src="{{ asset('assets/images/item-minicart-2.jpg') }}" alt="">
                                            </a>
                                            <div class="product-details">
                                                <h5 class="product-name"><a href="#">Soap Grooming Solutions</a></h5>
                                                <div class="variations">
                                                    <span class="attribute_color"><a href="#">Black</a></span>,
                                                    <span class="attribute_size"><a href="#">300ml</a></span>
                                                </div>
                                                <span class="product-price"><span class="price"><span>€45</span></span>
                                                </span>
                                                <span class="product-quantity"> x 1</span>
                                                <div class="product-remove">
                                                    <a href=""><i class="fa fa-trash-o" aria-hidden="true"></i></a>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="product-cart mini_cart_item">
                                            <a href="#" class="product-media">
                                                <img src="{{ asset('assets/images/item-minicart-3.jpg') }}" alt="">
                                            </a>
                                            <div class="product-details">
                                                <h5 class="product-name"><a href="#">Grooming Solutions Soap</a></h5>
                                                <div class="variations">
                                                    <span class="attribute_color"><a href="#">Black</a></span>,
                                                    <span class="attribute_size"><a href="#">300ml</a></span>
                                                </div>
                                                <span class="product-price"><span class="price"><span>€45</span></span></span>
                                                <span class="product-quantity"> x 1</span>
                                                <div class="product-remove">
                                                    <a href=""><i class="fa fa-trash-o" aria-hidden="true"></i></a>
                                                </div>
                                            </div>
                                        </li> --}}
                                    </ul>
                                    {{-- <div class="subtotal">
                                        <span class="total-title">Subtotal: </span><span class="total-price"><span class="Price-amount">@currency($cartAmount)</span></span>
                                    </div> --}}
                                    @if($cartTotal > 0)
                                        <div class="actions">
                                            <a href="{{ route('mycart') }}" class="button button-checkout btn-checkout-overlay"><span>Checkout</span></a>
                                        </div>
                                    @else
                                        No item
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="block-search block-header turan-dropdown">
                            <a href="javascript:void(0);" class="popup-live-search-button" data-turan="turan-dropdown">
                                <span class="icon-search">
                                    
                                </span>
                            </a>
                            <form class="form-search turan-submenu">
                                <h4 class="title-search">Store Search</h4>
                                <div class="form-content">
                                    <div class="inner">
                                        <input type="text" class="input" placeholder="Your search here">
                                        <button class="btn-search" type="submit">Search</button>
                                    </div>
                                </div>
                            </form>
                        </div>

                        <div class="block-account block-header turan-dropdown">
                            <a href="javascript:void(0);" data-turan="turan-dropdown">
                                <i class="fa fa-user-o" aria-hidden="true"></i>
                            </a>
                            <div class="header-account turan-submenu">
                                <div class="header-user-form-tabs">
                                    @guest
                                    <ul class="tab-link">
                                        <li class="active">
                                            <a data-toggle="tab" aria-expanded="true" href="#header-tab-login">Login</a>
                                        </li>
                                        <li>
                                            <a data-toggle="tab" aria-expanded="true" href="#header-tab-rigister">Register</a>
                                        </li>
                                    </ul>
                                    @endguest
                                    <div class="tab-container">
                                        @guest
                                            <div id="header-tab-login" class="tab-panel active">

                                                <form method="POST" class="login form-login" action="{{ route('login') }}">
                                                    @csrf
                                                    <p class="form-row form-row-wide">
                                                        <input type="email" name="email" id="email" placeholder="Email" class="input-text @error('email') is-invalid @enderror" value="{{ old('email') }}" />
                                                    </p>
                                                    <p class="form-row form-row-wide">
                                                        <input type="password" name="password" id="password" class="input-text @error('password') is-invalid @enderror" placeholder="Password">
                                                    </p>
                                                    <p class="form-row">
                                                        <label class="form-checkbox">
                                                            <input type="checkbox" name="remember" id="remember" class="input-checkbox" {{ old('remember') ? 'checked' : '' }}><span>Remember me</span>
                                                        </label>
                                                        <input type="submit" class="button" value="Login">
                                                    </p>
                                                    <div class="text-center mb-2">OR</div>
                                                    <p class="form-row">
                                                        <a href="{{ url('auth/google') }}" class="button btn-google">
                                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100" width="32px" height="32px"><path fill="#78a0cf" d="M13 27A2 2 0 1 0 13 31A2 2 0 1 0 13 27Z"/><path fill="#f1bc19" d="M77 12A1 1 0 1 0 77 14A1 1 0 1 0 77 12Z"/><path fill="#cee1f4" d="M50 13A37 37 0 1 0 50 87A37 37 0 1 0 50 13Z"/><path fill="#f1bc19" d="M83 11A4 4 0 1 0 83 19A4 4 0 1 0 83 11Z"/><path fill="#78a0cf" d="M87 22A2 2 0 1 0 87 26A2 2 0 1 0 87 22Z"/><path fill="#fbcd59" d="M81 74A2 2 0 1 0 81 78 2 2 0 1 0 81 74zM15 59A4 4 0 1 0 15 67 4 4 0 1 0 15 59z"/><path fill="#78a0cf" d="M25 85A2 2 0 1 0 25 89A2 2 0 1 0 25 85Z"/><path fill="#fff" d="M18.5 51A2.5 2.5 0 1 0 18.5 56A2.5 2.5 0 1 0 18.5 51Z"/><path fill="#f1bc19" d="M21 66A1 1 0 1 0 21 68A1 1 0 1 0 21 66Z"/><path fill="#fff" d="M80 33A1 1 0 1 0 80 35A1 1 0 1 0 80 33Z"/><g><path fill="#ea5167" d="M35.233,47.447C36.447,40.381,42.588,35,50,35c3.367,0,6.464,1.123,8.968,2.996l6.393-6.885 C61.178,27.684,55.83,25.625,50,25.625c-11.942,0-21.861,8.635-23.871,20.001L35.233,47.447z"/><path fill="#00a698" d="M58.905,62.068C56.414,63.909,53.335,65,50,65c-7.842,0-14.268-6.02-14.934-13.689l-8.909,2.97 C28.23,65.569,38.113,74.125,50,74.125c6.261,0,11.968-2.374,16.27-6.27L58.905,62.068z"/><path fill="#48bed8" d="M68.5,45.5h-4.189H50.5v9h13.811c-1.073,3.414-3.333,6.301-6.296,8.179l7.245,6.038 c5.483-4.446,8.99-11.233,8.99-18.842c0-1.495-0.142-2.955-0.401-4.375H68.5z"/><path fill="#fde751" d="M35,50c0-2.183,0.477-4.252,1.316-6.123l-7.818-5.212c-1.752,3.353-2.748,7.164-2.748,11.21 c0,3.784,0.868,7.365,2.413,10.556L36,55C35.634,53.702,35,51.415,35,50z"/></g><g><path fill="#472b29" d="M50,74.825c-13.757,0-24.95-11.192-24.95-24.95S36.243,24.925,50,24.925 c5.75,0,11.362,2.005,15.804,5.646l0.576,0.472l-7.327,7.892l-0.504-0.377C56.051,36.688,53.095,35.7,50,35.7 c-7.885,0-14.3,6.415-14.3,14.3S42.115,64.3,50,64.3c5.956,0,11.195-3.618,13.324-9.1L50,55.208l-0.008-10.184l24.433-0.008 l0.104,0.574c0.274,1.503,0.421,2.801,0.421,4.285C74.95,63.633,63.758,74.825,50,74.825z M50,26.325 c-12.985,0-23.55,10.564-23.55,23.55S37.015,73.425,50,73.425s23.55-10.564,23.55-23.55c0-1.211-0.105-2.228-0.3-3.458H51.192 L51.2,53.8h14.065l-0.286,0.91C62.914,61.283,56.894,65.7,50,65.7c-8.657,0-15.7-7.043-15.7-15.7S41.343,34.3,50,34.3 c3.19,0,6.245,0.955,8.875,2.768l5.458-5.878C60.238,28.048,55.178,26.325,50,26.325z"/></g></svg>
                                                            Login with Google
                                                        </a>
                                                    </p>
                                                    {{-- <p class="lost_password">
                                                        <a href="#">Lost your password?</a>
                                                    </p> --}}
                                                </form>
                                            </div>
                                        @else
                                            <div class="d-flex layout-user">
                                                @if (Auth::user()->photo)
                                                    <img src="{{ Auth::user()->photo }}" class="img-user">
                                                @else
                                                    <img src="{{ asset('assets/images/unavailable.png') }}" class="img-user">
                                                @endif
                                                {{ Auth::user()->name }}
                                            </div>
                                            <div class="menu-user">
                                                <a class="dropdown-item" href="#">History Transaksi</a>
                                                <a class="dropdown-item" href="{{ route('profile.index') }}">Settings</a>
                                                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                                    {{ __('Logout') }}
                                                </a>
                
                                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                    @csrf
                                                </form>
                                            </div>
                                        @endguest

                                        @if (Route::has('register'))
                                            <div id="header-tab-rigister" class="tab-panel">
                                                <form method="POST" action="{{ route('register') }}" class="register form-register">
                                                    @csrf

                                                    <p class="form-row form-row-wide">
                                                        <input type="text" name="name" value="{{ old('name') }}" placeholder="Name" class="input-text @error('name') is-invalid @enderror" />
                                                    </p>
                                                    <p class="form-row form-row-wide">
                                                        <input type="email" name="email" value="{{ old('email') }}" placeholder="Email" class="input-text @error('email') is-invalid @enderror" />
                                                    </p>
                                                    <p class="form-row form-row-wide">
                                                        <input type="password" name="password" class="input-text @error('password') is-invalid @enderror" placeholder="Password">
                                                    </p>
                                                    <p class="form-row form-row-wide">
                                                        <input type="password" name="password_confirmation" class="input-text" placeholder="Re-type Password">
                                                    </p>
                                                    <p class="form-row">
                                                        <input type="submit" class="button" value="Register">
                                                    </p>
                                                </form>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>

                        <a class="menu-bar mobile-navigation" href="#">
                            <span></span>
                            <span></span>
                            <span></span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        {{-- /main header --}}

        {{-- header nav --}}
        <div class="header-nav main-menu-wapper">
            <div class="container-wapper">
                <ul class="clone-main-menu turan-nav main-menu" id="menu-main-menu">
                    <li class="menu-item">
                        <a href="{{ route('home') }}" class="kt-item-title" title="Shop">Home</a>
                    </li>
                    <li class="menu-item">
                        <a href="{{ route('products.category', 'brightening') }}" class="kt-item-title" title="Brightening">Brightening</a>
                    </li>
                    <li class="menu-item">
                        <a href="{{ route('products.category', 'purify') }}" class="kt-item-title" title="Purify">Purify</a>
                    </li>
                    <li class="menu-item">
                        <a href="{{ route('products.category', 'decorative') }}" class="kt-item-title" title="Decorative">Decorative</a>
                    </li>
                    <li class="menu-item">
                        <a href="{{ route('products.category', 'extra care') }}" class="kt-item-title" title="Extra Care">Extra Care</a>
                    </li>
                    <li class="menu-item">
                        <a href="{{ route('products.category', 'series') }}" class="kt-item-title" title="About">Series</a>
                    </li>
                    <li class="menu-item">
                        <a href="{{ route('products.category', 'series') }}" class="kt-item-title" title="About">Series</a>
                    </li>
                    <li class="menu-item mobile-only" style="margin-top: 16px">
                        <a href="{{ route('login') }}" class="kt-item-title" title="Login">Login Register</a>
                    </li>
                </ul>
            </div>
        </div>
        {{-- header nav --}}

    </div>
</header>