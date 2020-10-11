<header class="header style1">
    <div class="container">

        <!-- main header -->
        <div class="main-header">
            <div class="row">
                <div class="col-lg-4 col-sm-6 col-md-6 col-xs-7 col-ts-12 header-element">
                    <div class="turan-socials social-header">
                        <div  class="socials">
                            <a href="#" class="social-item">
                                <i class="fa fa-facebook-square"></i>
                            </a>
                            <a href="#" class="social-item">
                                <i class="fa fa-twitter"></i>
                            </a>
                            <a href="#" class="social-item">
                                <i class="fa fa-instagram"></i>
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
                            <a href="javascript:void(0);" class="shopcart-icon" data-turan="turan-dropdown">Cart<span class="count">3</span></a>
                            <div class="shopcart-description turan-submenu">
                                <div class="content-wrap">
                                    <h3 class="title">Shopping Cart</h3>
                                    <ul class="minicart-items">
                                        <li class="product-cart mini_cart_item">
                                            <a href="#" class="product-media">
                                                <img src="assets/images/item-minicart-1.jpg" alt="">
                                            </a>
                                            <div class="product-details">
                                                <h5 class="product-name"><a href="#">Beard Tumbleweed Oil</a></h5>
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
                                        </li>
                                        <li class="product-cart mini_cart_item">
                                            <a href="#" class="product-media">
                                                <img src="assets/images/item-minicart-2.jpg" alt="">
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
                                                <img src="assets/images/item-minicart-3.jpg" alt="">
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
                                        </li>
                                    </ul>
                                    <div class="subtotal">
                                        <span class="total-title">Subtotal: </span><span class="total-price"><span class="Price-amount">€135</span></span>
                                    </div>
                                    <div class="actions">
                                        <a class="button button-viewcart" href="shoppingcart.html"><span>View Bag</span></a>
                                        <a href="checkout.html" class="button button-checkout"><span>Checkout</span></a>
                                    </div>
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
                                    <ul class="tab-link">
                                        <li class="active">
                                            <a data-toggle="tab" aria-expanded="true" href="#header-tab-login">Login</a>
                                        </li>
                                        <li>
                                            <a data-toggle="tab" aria-expanded="true" href="#header-tab-rigister">Register</a>
                                        </li>
                                    </ul>
                                    <div class="tab-container">
                                        <div id="header-tab-login" class="tab-panel active">
                                            <form method="post" class="login form-login">
                                                <p class="form-row form-row-wide">
                                                    <input type="email" placeholder="Email" class="input-text">
                                                </p>
                                                <p class="form-row form-row-wide">
                                                    <input type="password" class="input-text" placeholder="Password">
                                                </p>
                                                <p class="form-row">
                                                    <label class="form-checkbox">
                                                        <input type="checkbox" class="input-checkbox"><span>Remember me</span>
                                                    </label>
                                                    <input type="submit" class="button" value="Login">
                                                </p>
                                                <p class="lost_password">
                                                    <a href="#">Lost your password?</a>
                                                </p>
                                            </form>
                                        </div>
                                        <div id="header-tab-rigister" class="tab-panel">
                                            <form method="post" class="register form-register">
                                                <p class="form-row form-row-wide">
                                                    <input type="email" placeholder="Email" class="input-text">
                                                </p>
                                                <p class="form-row form-row-wide">
                                                    <input type="password" class="input-text" placeholder="Password">
                                                </p>
                                                <p class="form-row">
                                                    <input type="submit" class="button" value="Register">
                                                </p>
                                            </form>
                                        </div>
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
        <!-- /main header -->

        <!-- header nav -->
        <div class="header-nav main-menu-wapper">
            <div class="container-wapper">
                <ul class="clone-main-menu turan-nav main-menu" id="menu-main-menu">
                    <li class="menu-item  menu-item-has-children item-megamenu">
                        <a href="index.html" class="kt-item-title" title="Home">Home</a>
                        <span class="toggle-submenu"></span>
                        <div class="submenu mega-menu home-menu">
                            <div class="col-sm-12 header-block-text">
                                <i class="icon fa fa-flag" aria-hidden="true"></i>
                                #Eveything you need to start an
                                <a href="#"> online store! </a>
                                 purchase
                                 <a href="#">turan outfit</a>
                                  with only
                                  <a href="#"> $59</a>
                                  <i class="icon fa fa-flag" aria-hidden="true"></i>
                            </div>
                            <div class="row10">
                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-15 col-bg-15 home-item">
                                    <div class="turan-demolink">
                                        <div class="image">
                                            <img src="assets/images/demo-01.jpg" alt="">
                                            <a href="index.html" class="link">VIEW DEMO</a>
                                        </div>
                                        <h5 class="title">Home 01</h5>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-15 col-bg-15 home-item">
                                    <div class="turan-demolink">
                                        <div class="image">
                                            <img src="assets/images/demo-02.jpg" alt="">
                                            <a href="home2.html" class="link">VIEW DEMO</a>
                                        </div>
                                        <h5 class="title">Home 02</h5>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-15 col-bg-15 home-item">
                                    <div class="turan-demolink">
                                        <div class="image">
                                            <img src="assets/images/demo-03.jpg" alt="">
                                            <a href="home3.html" class="link">VIEW DEMO</a>
                                        </div>
                                        <h5 class="title">Home 03</h5>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-15 col-bg-15 home-item">
                                    <div class="turan-demolink">
                                        <div class="image">
                                            <img src="assets/images/demo-04.jpg" alt="">
                                            <a href="home4.html" class="link">VIEW DEMO</a>
                                        </div>
                                        <h5 class="title">Home 04</h5>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-15 col-bg-15 home-item">
                                    <div class="turan-demolink">
                                        <div class="image">
                                            <img src="assets/images/demo-05.jpg" alt="">
                                            <a href="home5.html" class="link">VIEW DEMO</a>
                                        </div>
                                        <h5 class="title">Home 05</h5>
                                    </div>						
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12 border-custom">
                                    <span></span>
                                </div>
                            </div>
                            <div class="row10">
                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-15 col-bg-15 home-item">
                                    <div class="turan-demolink">
                                        <div class="image">
                                            <img src="assets/images/demo-06.jpg" alt="">
                                            <a href="home6.html" class="link">VIEW DEMO</a>
                                        </div>
                                        <h5 class="title">Home 06</h5>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-15 col-bg-15 home-item">
                                    <div class="turan-demolink">
                                        <div class="image">
                                            <img src="assets/images/demo-07.jpg" alt="">
                                            <a href="home7.html" class="link">VIEW DEMO</a>
                                        </div>
                                        <h5 class="title">Home 07</h5>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-15 col-bg-15 home-item">
                                    <div class="turan-demolink">
                                        <div class="image">
                                            <img src="assets/images/demo-08.jpg" alt="">
                                            <a href="home8.html" class="link">VIEW DEMO</a>
                                        </div>
                                        <h5 class="title">Home 08</h5>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-15 col-bg-15 home-item">
                                    <div class="turan-demolink">
                                        <div class="image">
                                            <img src="assets/images/demo-09.jpg" alt="">
                                            <a href="home9.html" class="link">VIEW DEMO</a>
                                        </div>
                                        <h5 class="title">Home 09</h5>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-15 col-bg-15 home-item">
                                    <div class="turan-demolink">
                                        <div class="image">
                                            <img src="assets/images/demo-10.jpg" alt="">
                                            <a href="home10.html" class="link">VIEW DEMO</a>
                                        </div>
                                        <h5 class="title">Home 10</h5>
                                    </div>							
                                </div>
                            </div>
                        </div>
                    </li>
                    <li class="menu-item">
                        <a href="gridproducts_bannerslider.html" class="kt-item-title" title="Shop">Shop</a>
                    </li>
                    <li class="menu-item  menu-item-has-children item-megamenu">
                        <a href="#" class="kt-item-title" title="Pages">Pages</a>
                        <span class="toggle-submenu"></span>
                        <div class="submenu mega-menu menu-page height-478">
                            <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-3 menu-page-item">
                                    <div class="turan-custommenu default">
                                        <h2 class="widgettitle">Category Pages</h2>
                                        <ul class="menu">
                                            <li class="menu-item">
                                                <a href="gridproducts.html">Grid Producs</a>
                                            </li>
                                            <li class="menu-item">
                                                <a href="gridproducts_bannerslider.html">Grid With Banner</a>
                                            </li>
                                            <li class="menu-item">
                                                <a href="listproducts.html">List Products</a>
                                            </li>
                                            <li class="menu-item">
                                                <a href="listproducts_bannerslider.html">List With Banner</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-3 menu-page-item">
                                    <div class="turan-custommenu default">
                                        <h2 class="widgettitle">Product & Blog</h2>
                                        <ul class="menu">
                                            <li class="menu-item">
                                                <a href="productdetails-style1.html">Single Product</a>
                                            </li>
                                            <li class="menu-item">
                                                <a href="inblog_right-siderbar.html">Single Post</a>
                                            </li>
                                            <li class="menu-item">
                                                <a href="bloglist.html">Blog List</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-3 menu-page-item">
                                    <div class="turan-custommenu default">
                                        <h2 class="widgettitle">Inner Pages</h2>
                                        <ul class="menu">
                                            <li class="menu-item">
                                                <a href="shoppingcart.html">Shopping Cart</a>
                                            </li>
                                            <li class="menu-item">
                                                <a href="checkout.html">Checkout</a>
                                            </li>
                                            <li class="menu-item">
                                                <a href="about.html">About us</a>
                                            </li>
                                            <li class="menu-item">
                                                <a href="contact.html">Contact us</a>
                                            </li>
                                            <li class="menu-item">
                                                <a href="404page.html">404</a>
                                            </li>
                                            <li class="menu-item">
                                                <a href="login.html">Login/Register</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-3 menu-page-item">
                                    
                                </div>
                            </div>
                        </div>
                    </li>
                    <li class="menu-item">
                        <a href="about.html" class="kt-item-title" title="About">About</a>
                    </li>
                    <li class="menu-item  menu-item-has-children">
                        <a href="bloglist.html" class="kt-item-title" title="Blogs">Blogs</a>
                        <span class="toggle-submenu"></span>
                        <ul class="submenu">
                            <li class="menu-item">
                                <a href="bloglist.html">Blog</a>
                            </li>
                            <li class="menu-item">
                                <a href="inblog_right-siderbar.html">Single Post</a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
        <!-- header nav -->

    </div>
</header>