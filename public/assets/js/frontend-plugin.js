;(function($) {
    'use strict';
    var TURAN_JS = {
        init: function(){
            this.turan_product_quantity_hanlde();
            this.turan_chosen_register();
            this.turan_slider_range_price();
            this.turan_scroll_show_up();
            this.turan_general_functions();
            this.better_equal_elems();
            this.turan_product_variation_handle();
            this.newletter_popup();
            this.quickview_popup();
            this.turan_mobile_block();
            this.turan_masonry();
            this.turan_dropdown();
            this.turan_init_carousel();
            this.turan_product_thumbnail_carousel();
            this.turan_remove_class_review();
            this.turan_tab_fade_effect();
            this.turan_details_thumd_zoom();
            this.turan_video();
            this.kt_resizeMegamenu();
            this.turan_countdown();
            this.turan_init_menu_toggle();
            this.turan_custom_scrollbar();
            this.turan_topbar_handle();
            this.turan_topbar_click_handle();
            this.turan_sidebar_mobile_handle();
        },

        onResize: function(){
            this.quickview_popup();
            this.turan_masonry();
            this.kt_resizeMegamenu();
            this.turan_remove_class_review();
            this.turan_details_thumd_zoom();
            this.turan_custom_scrollbar();
            this.better_equal_elems();
            this.turan_topbar_handle();
            this.turan_chosen_register();
            // this.turan_topbar_click_handle();
        },
        
        onScroll: function(){
            this.turan_custom_scrollbar();
            this.turan_scroll_show_up();
        },

        turan_init_menu_toggle: function () {
            $('.turan-nav-toggle').each(function () {
                var _main = $(this);
                _main.children('.menu-item.parent').each(function () {
                    var curent = $(this).find('.submenu');
                    $(this).children('.toggle-submenu').on('click', function () {
                        $(this).parent().children('.submenu').slideToggle(500);
                        _main.find('.submenu').not(curent).slideUp(500);

                        $(this).parent().toggleClass('show-submenu');
                        _main.find('.menu-item.parent').not($(this).parent()).removeClass('show-submenu');
                    });

                    var next_curent = $(this).find('.submenu');

                    next_curent.children('.menu-item.parent').each(function () {

                        var child_curent = $(this).find('.submenu');
                        $(this).children('.toggle-submenu').on('click', function () {
                            $(this).parent().parent().find('.submenu').not(child_curent).slideUp(500);
                            $(this).parent().children('.submenu').slideToggle(500);

                            $(this).parent().parent().find('.menu-item.parent').not($(this).parent()).removeClass('show-submenu');
                            $(this).parent().toggleClass('show-submenu');
                        })
                    });
                });
            });
        },

        /* ---------------------------------------------
         Turan Custom Scrollbar
         --------------------------------------------- */
        turan_custom_scrollbar: function() {
            if($('.turan-mini-cart .minicart-items').length){
                $('.turan-mini-cart .minicart-items, .header.vertical-style .header-nav .container-wapper').mCustomScrollbar();
                $('.turan-mini-cart .minicart-items, .header.vertical-style .header-nav .container-wapper').change(function() {
                    $(this).mCustomScrollbar();
                });
            }
            
        },

        /* ---------------------------------------------
         Video Lightbox
         --------------------------------------------- */
        turan_video: function() {
            $('.quick-install').simpleLightboxVideo();
        },

        /* ---------------------------------------------
         Remove Class Equal
         --------------------------------------------- */
        turan_remove_class_review: function() {
            var _winw = $(window).innerWidth();
            if ( _winw < 992 ) {
                $('.sevice-item.style-1').removeClass('equal-container').find('.equal-element').removeAttr('style');
            }
            else {
                $('.sevice-item.style-1').addClass('equal-container');
            }
        },

        /* ---------------------------------------------
         Single Product Zoom
         --------------------------------------------- */
        turan_details_thumd_zoom: function() {
            if($.arcticmodal){
                $.arcticmodal('setDefault',{
                    type : 'ajax',
                    ajax : {
                        cache : false
                    },
                    afterOpen : function(obj){

                        var mw = $('.modal_window');
                        
                        mw.find('.custom_select').customSelect();

                        mw.find('.product_preview .owl_carousel').owlCarousel({
                            margin : 10,
                            themeClass : 'thumbnails_carousel',
                            nav : true,
                            navText : [],
                            rtl: window.ISRTL ? true : false
                        });

                        Core.events.productPreview();

                        addthis.toolbox('.addthis_toolbox'); 
                    }
                });
            } 
            // ---------Popup sizechart--------------- 
            if($('#size_chart').length >0){
                $('#size_chart').fancybox();
            }

            if($.fancybox){
                $.fancybox.defaults.direction = {
                    next: 'left',
                    prev: 'right'
                }
            }
            /* ------------------------------------------------
                    Fancybox
            ------------------------------------------------ */
            if($('.fancybox_item').length){
                $('.fancybox_item').fancybox({
                    openEffect : 'elastic',
                    closeEffect : 'elastic',
                    helpers : {
                        overlay: {
                            css : {
                                'background' : 'rgba(0,0,0, .6)'
                            }
                        },
                        thumbs  : {
                            width   : 50,
                            height  : 50
                        }
                    }
                });
            }
            if($('.fancybox_item_media').length){
                $('.fancybox_item_media').fancybox({
                    openEffect  : 'none',
                    closeEffect : 'none',
                    helpers : {
                        media : {}
                    }
                });
            }
            /* ------------------------------------------------
                    Elevate Zoom
            ------------------------------------------------ */
            if($('#img_zoom').length){
                $('#img_zoom').elevateZoom({
                    zoomType: "inner",
                    gallery:'thumbnails',
                    galleryActiveClass: 'active',
                    cursor: "crosshair",
                    responsive:true,
                    easing:true,
                    zoomWindowFadeIn: 500,
                    zoomWindowFadeOut: 500,
                    lensFadeIn: 500,
                    lensFadeOut: 500
                });
                $(".open_qv").on("click", function(e) { 
                    var ez = $(this).siblings('img').data('elevateZoom');
                    $.fancybox(ez.getGalleryList());
                    e.preventDefault();
                });
            }
        },

        /* ---------------------------------------------
         Isotop
         --------------------------------------------- */
        turan_masonry: function() {
            var masonry = $('.masonry-grid').isotope({
                // set itemSelector so .grid-sizer is not used in layout
                itemSelector: '.grid-item',
                percentPosition: true,
                layoutMode: 'masonry',
                masonry: {
                    // set to the element
                    columnWidth: '.grid-sizer'
                }
            });
        },

        turan_dropdown: function() {
            $(document).on('click', '.header-control .close', function () {
                $(this).closest('.turan-dropdown').removeClass('open');
            });
            $(document).on('click', function (event) {
                var _target    = $(event.target).closest('.turan-dropdown'),
                    _allparent = $('.turan-dropdown');

                if ( _target.length > 0 ) {
                    _allparent.not(_target).removeClass('open');
                    if (
                        $(event.target).is('[data-turan="turan-dropdown"]') ||
                        $(event.target).closest('[data-turan="turan-dropdown"]').length > 0
                    ) {
                        _target.toggleClass('open');
                        return false;
                    }
                } else {
                    $('.turan-dropdown').removeClass('open');
                }
            });
        },

        turan_mobile_block: function() {
            $(document).on('click', '.header-device-mobile .item.has-sub>a', function () {
                $(this).closest('.header-device-mobile').find('.item').removeClass('open');

                $(this).closest('.item').addClass('open');
                return false;
            });
            $(document).on('click', '.header-device-mobile .item .close', function () {
                $(this).closest('.item').removeClass('open');
                return false;
            })
        },

        /* ---------------------------------------------
         Turan Init Carousel
         --------------------------------------------- */        
        turan_init_carousel: function() {
            $('.owl-slick').not('.slick-initialized').each(function () {
                var _this       = $(this),
                    _responsive = _this.data('responsive'),
                    _slick = _this.data('slick'),
                    _config     = [];
                if(typeof _slick == "object"){
                    _config = _slick;
                }
                if ( _this.hasClass('slick-vertical') ) {
                    _config.prevArrow = '<span class="pe-7s-angle-up"></span>';
                    _config.nextArrow = '<span class="pe-7s-angle-down"></span>';
                } else {
                    _config.prevArrow = '<span class="fa fa-angle-left pre"></span>';
                    _config.nextArrow = '<span class="fa fa-angle-right next"></span>';
                }
                _config.responsive = _responsive;
                _this.slick(_config);
            });
        },

        /* ---------------------------------------------
         TAB EFFECT
         --------------------------------------------- */
        turan_tab_fade_effect: function() {
            $(document).on('click', '.turan-tabs .tab-link a', function () {
                var tab_id       = $(this).attr('href'),
                    tab_animated = $(this).data('animate');
                tab_animated = ( tab_animated == undefined || tab_animated == "" ) ? 'zoomIn' : tab_animated;
                $(tab_id).find('.product-list-owl .slick-slide.slick-active , .list-products  .product-item:not(.slick-slide)').each(function (i) {
                    var t     = $(this),
                        style = $(this).attr("style"),
                        delay = i * 200;
                    style     = ( style == undefined ) ? '' : style;
                    t.attr("style", style +
                        ";-webkit-animation-delay:" + delay + "ms;"
                        + "-moz-animation-delay:" + delay + "ms;"
                        + "-o-animation-delay:" + delay + "ms;"
                        + "animation-delay:" + delay + "ms;"
                    ).addClass(tab_animated + ' animated').one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function () {
                        t.removeClass(tab_animated + ' animated');
                        t.attr("style", style);
                    });
                });
            });
        },

        /* ---------------------------------------------
         Newletter
         --------------------------------------------- */
        newletter_popup: function(){
            var window_size = parseFloat(jQuery('body').innerWidth());
            window_size += TURAN_JS.kt_get_scrollbar_width();
            if(window_size > 991){
                if($('body').hasClass('home-newletter')){
                    var _content = $('.kt-popup-newsletter');
                    $.magnificPopup.open({
                        items: {
                        src: _content,
                        type: 'inline'
                        }
                    });
                }
            }
        },

        /* ---------------------------------------------
         Quickview
         --------------------------------------------- */
        quickview_popup: function(){
            var window_size = parseFloat(jQuery('body').innerWidth());
            window_size += TURAN_JS.kt_get_scrollbar_width();
            if(window_size > 992){
                $(document).on('click','.quick-wiew-button',function(){
                    $.magnificPopup.open({
                        items: {
                        src: '<div class="kt-popup-quickview "><div class="details-thumb"><div class="slider-product slider-for"><div class="details-item"><img src="assets/images/popup-quickview-item-1.jpg" alt=""></div><div class="details-item"><img src="assets/images/popup-quickview-item-2.jpg" alt=""></div><div class="details-item"><img src="assets/images/popup-quickview-item-3.jpg" alt=""></div><div class="details-item"><img src="assets/images/popup-quickview-item-4.jpg" alt=""></div></div><div class="slider-product-button slider-nav nav-center"><div class="details-item"><img src="assets/images/popup-quickview-item-5.jpg" alt=""></div><div class="details-item"><img src="assets/images/popup-quickview-item-6.jpg" alt=""></div><div class="details-item"><img src="assets/images/popup-quickview-item-7.jpg" alt=""></div><div class="details-item"><img src="assets/images/popup-quickview-item-8.jpg" alt=""></div></div></div><div class="details-infor"><h1 class="product-title">3-pack T-shirts Regular fit</h1><div class="stars-rating"><div class="star-rating"><span class="star-5"></span></div><div class="count-star">(7)</div></div><div class="availability">availability:<a href="#">in Stock</a></div><div class="price"><span>€45</span></div><div class="product-details-description"><ul><li>100% cotton. Machine wash warm</li><li>Imported</li><li>Art.No. 06-7680</li></ul></div><div class="variations"><div class="attribute attribute_color"><div class="color-text text-attribute">Color:<span>White/</span><span>Black/</span><span>Teal/</span><span>Brown</span></div><div class="list-color list-item"><a href="#" class="color1"></a><a href="#" class="color2"></a><a href="#" class="color3 active"></a><a href="#" class="color4"></a></div></div><div class="attribute attribute_size"><div class="size-text text-attribute">Size:<span>Please select the size below</span> </div><div class="list-size list-item"><a href="#" class="">xs</a><a href="#" class="">s</a><a href="#" class="active">m</a><a href="#" class="">l</a><a href="#" class="">xl</a><a href="#" class="">xxl</a></div></div></div><div class="group-button"><div class="yith-wcwl-add-to-wishlist"><div class="yith-wcwl-add-button"><a href="#">Add to Wishlist</a></div></div><div class="size-chart-wrapp"><div class="btn-size-chart"><a id="size_chart" href="assets/images/size-chart.jpg" class="fancybox"  target="_blank">View Size Chart</a></div></div><div class="quantity-add-to-cart"><div class="quantity"><div class="control"><a class="btn-number qtyminus quantity-minus" href="#">-</a><input type="text" data-step="1" data-min="0" value="1" title="Qty" class="input-qty qty" size="4"><a href="#" class="btn-number qtyplus quantity-plus">+</a></div></div><button class="single_add_to_cart_button button">Add to cart</button></div></div></div></div>',
                        type: 'inline'
                        }
                    });
                    TURAN_JS.slick_quickview_popup();
                    return false;
                });
            }
        },

        slick_quickview_popup: function(){
            $('.slider-for').slick({
                slidesToShow: 1,
                slidesToScroll: 1,
                arrows: false,
                fade: true,
                asNavFor: '.slider-nav'
            });
            $('.slider-nav').slick({
                slidesToShow: 3,
                slidesToScroll: 1,
                asNavFor: '.slider-for',
                dots: false,
                focusOnSelect: true,
                infinite:true,
                prevArrow:'<i class="fa fa-angle-left" aria-hidden="true"></i>',
                nextArrow:'<i class="fa fa-angle-right " aria-hidden="true"></i>',
            });
        },

        /* ---------------------------------------------
         EQUAL ELEMS
         --------------------------------------------- */
        better_equal_elems: function() {
            setTimeout(function () {
                $('.equal-container').each(function () {
                    var $this = $(this);
                    if ($this.find('.equal-element').length) {
                        $this.find('.equal-element').css({
                            'height': 'auto'
                        });
                        var elem_height = 0;
                        $this.find('.equal-element').each(function () {
                            var this_elem_h = $(this).height();
                            if (elem_height < this_elem_h) {
                                elem_height = this_elem_h;
                            }
                        });
                        $this.find('.equal-element').height(elem_height);
                    }
                });
            }, 1000);
        },

        turan_product_thumbnail_carousel: function(){
            // owl config
            $(".owl-carousel").each(function(index, el) {
                var _this = $(this),
                    config = _this.data(),
                    animateOut = _this.data('animateout'),
                    animateIn  = _this.data('animatein'),
                    slidespeed = _this.data('slidespeed');
               
                config.navText = ['<i class="fa fa-angle-left" aria-hidden="true"></i>','<i class="fa fa-angle-right" aria-hidden="true"></i>'];
                
                if(typeof animateOut != 'undefined' ){
                    config.animateOut = animateOut;
                }
                if(typeof animateIn != 'undefined' ){
                    config.animateIn = animateIn;
                }
                if(typeof (slidespeed) != 'undefined' ){
                    config.smartSpeed = slidespeed;
                }else{
                    config.smartSpeed = 400;
                }

                _this.on('drag.owl.carousel',function(event){
                    _this.addClass('owl-changed');
                    setTimeout(function () {
                        _this.removeClass('owl-changed');
                    },config.smartSpeed)
                });

                _this.owlCarousel(config); 
            });
        },

        kt_get_scrollbar_width: function() {
            var $inner = $('<div style="width: 100%; height:200px;">test</div>'),
                $outer = $('<div style="width:200px;height:150px; position: absolute; top: 0; left: 0; visibility: hidden; overflow:hidden;"></div>').append($inner),
                inner = $inner[0],
                outer = $outer[0];
            $('body').append(outer);
            var width1 = parseFloat(inner.offsetWidth);
            $outer.css('overflow', 'scroll');
            var width2 = parseFloat(outer.clientWidth);
            $outer.remove();
            return (width1 - width2);
        },

        kt_resizeMegamenu: function() {
            var window_size = parseFloat(jQuery('body').innerWidth());
            window_size += TURAN_JS.kt_get_scrollbar_width();
            if (window_size > 990) {
                if ($('.container-wapper .main-menu').length > 0) {
                    var container = $('.main-menu-wapper');
                    if(container.hasClass('get_width_from_firt_child')){
                        container = container.find('.get_width_from_firt_child');
                    }
                    if (typeof container != 'undefined') {
                        var container_width = 0, container_offset = 0;
                        container_width = parseFloat(container.innerWidth());
                        container_offset = container.offset();
                        setTimeout(function () {
                            $('.main-menu .menu-item-has-children').each(function (index, element) {
                                $(element).children('.mega-menu').css({'width': container_width + 'px'});
                                var sub_menu_width = parseFloat($(element).children('.mega-menu').outerWidth()),
                                    item_width = parseFloat($(element).outerWidth());
                                $(element).children('.mega-menu').css({'left': '-' + (sub_menu_width / 2 - item_width / 2) + 'px'});
                                var container_left = container_offset.left,
                                    container_right = (container_left + container_width),
                                    item_left = $(element).offset().left,
                                    overflow_left = (sub_menu_width / 2 > (item_left - container_left)),
                                    overflow_right = ((sub_menu_width / 2 + item_left) > container_right);
                                if (overflow_left) {
                                    var left = (item_left - container_left);
                                    $(element).children('.mega-menu').css({'left': -left + 'px'});
                                }
                                if (overflow_right && !overflow_left) {
                                    var left = (item_left - container_left);
                                    left = left - ( container_width - sub_menu_width );
                                    $(element).children('.mega-menu').css({'left': -left + 'px'});
                                }
                            })
                        }, 100);
                    }
                }
            }
        },

        /* ---------------------------------------------
         Countdown years months 
        --------------------------------------------- */
        turan_countdown: function() {
            if ( $('.turan-countdown').length > 0 ) {
                var labels = [ 'Years', 'Months', 'Weeks', 'Days', 'Hrs', 'Mins', 'Secs' ],
                    layout = '<span class="box-count day"><span class="number">{dnn}</span> <span class="text">Days</span></span><span class="box-count hrs"><span class="number">{hnn}</span> <span class="text">Hrs</span></span><span class="box-count min"><span class="number">{mnn}</span> <span class="text">Mins</span></span><span class="box-count secs"><span class="number">{snn}</span> <span class="text">Secs</span></span>';
                $('.turan-countdown').not('.not-run').each(function () {
                    var _this = $(this),
                        austDay = new Date(_this.data('y'), _this.data('m') - 1, _this.data('d'), _this.data('h'), _this.data('i'), _this.data('s'));
                    _this.countdown({
                        until: austDay,
                        labels: labels,
                        layout: layout
                    });
                });
            }
        },

        turan_product_quantity_hanlde: function(){
            $(document).on('click', '.quantity .quantity-minus, .quantity .quantity-plus', function (e) {
                // Get values
                e.preventDefault();
                var _this =  $(this),
                    $qty  =_this.closest('.quantity').find('.qty'),
                    currentVal = parseFloat($qty.val()),
                    max = parseFloat($qty.attr('max')),
                    min = parseFloat($qty.attr('min')),
                    step = $qty.attr('step');
                // Format values
                if (!currentVal || currentVal === '' || currentVal === 'NaN') currentVal = 0;
                if (max === '' || max === 'NaN') max = '';
                if (min === '' || min === 'NaN') min = 0;
                if (step === 'any' || step === '' || step === undefined || parseFloat(step) === 'NaN') step = 1;
                // Change the value
                if (_this.hasClass('quantity-plus')) {
                    if (max && ( max == currentVal || currentVal > max )) {
                        $qty.val(max);
                    } else {
                        $qty.val(currentVal + parseFloat(step));
                    }
                } else {
                    if (min && ( min == currentVal || currentVal < min )) {
                        $qty.val(min);
                    } else if (currentVal > 0) {
                        $qty.val(currentVal - parseFloat(step));
                    }
                }
            });
        },

        turan_chosen_register: function(){
            if($(".chosen-select").length){
                $(".chosen-select").chosen({disable_search_threshold: 10});
            }
        },

        /* ---------------------------------------------
         Price filter
        --------------------------------------------- */
        turan_slider_range_price: function(){
            $('.slider-range-price').each(function () {
                var min = $(this).data('min'),
                    max = $(this).data('max'),
                    unit = $(this).data('unit'),
                    value_min = $(this).data('value-min'),
                    value_max = $(this).data('value-max'),
                    label_result = $(this).data('label-result'),
                    _this = $(this);
                _this.slider({
                    range: true,
                    min: min,
                    max: max,
                    values: [value_min, value_max],
                    slide: function (event, ui) {
                        var result = ' <span>' + unit + ui.values[0] + ' </span>  <span> ' + unit + ui.values[1] + '</span>';
                        _this.closest('.price-slider-wrapper').find('.price-slider-amount').html(result);
                    }
                });
            });
        },

        turan_topbar_handle: function(){
            if(!$('.wrap-topbar-filter').length) return 0;
            var window_size = parseFloat(jQuery('body').innerWidth()),
                wrap_menu_toggle = $('.wrap-topbar-filter .wrap-menu-toggle'),
                container_width = parseFloat(wrap_menu_toggle.closest('.shop-top-control').outerWidth());
            wrap_menu_toggle.width('');
            window_size += TURAN_JS.kt_get_scrollbar_width();
            if (window_size > 767) {
                wrap_menu_toggle.width(container_width);
            }
        },

        turan_topbar_click_handle: function(){
            if(!$('.wrap-topbar-filter').length) return 0;

            $(document).on('click', function (event) {
                var window_size = parseFloat(jQuery('body').innerWidth());
                window_size += TURAN_JS.kt_get_scrollbar_width();
                if (window_size > 767) {
                    if(!$('.wrap-topbar-filter').length) return 0;
                    var _target = $(event.target).closest('.wrap-topbar-filter'),
                        _parent = $('.wrap-topbar-filter');
                    if ( _target.length > 0 ) {
                        _parent.not(_target).removeClass('open');
                        if ($(event.target).is('.class-toggle')){
                            _target.toggleClass('open');
                        }
                    } else {
                        $('.wrap-topbar-filter').removeClass('open');
                    }
                }
            });
        },

        turan_sidebar_mobile_handle: function(){
            if(!$('.wrap-topbar-filter').length && !$('.sidebar').length ) return 0;
            var menu_item = document.createElement('div'),
                div_tag = document.createElement('div'),
                topbar_header_top = '<div class="mobile-header-top"><span class="box-title">Filters</span><a class="close-box" href="#">x</a></div>',
                sidebar_header_top = '<div class="mobile-header-top"><span class="box-title">Sidebar</span><a class="close-box" href="#">x</a></div>';
            menu_item.setAttribute('class', 'footer-device-mobile-item device-sitebar');
            menu_item.innerHTML = '<a href="#" class="togle-sidebar-menu" ><span class="icon"><i class="fa fa-exchange" aria-hidden="true"></i></span><span class="text">Sidebar</span></a>';
            if($('.wrap-topbar-filter').length){
                menu_item.innerHTML = '<a href="#" class="togle-sidebar-menu" ><span class="icon"><i class="fa fa-filter" aria-hidden="true"></i></span><span class="text">Filters</span></a>';
            }
            $('.footer-device-mobile .footer-device-mobile-item:first-child').after(menu_item);

            $('.sidebar').append(sidebar_header_top);
            $('.wrap-topbar-filter').append(topbar_header_top);

            $('.footer-device-mobile .footer-device-mobile-item.device-sitebar').on('click','.togle-sidebar-menu', function (event){
                event.preventDefault();
                $('body').toggleClass('open-sidebar');
            });
            $('.wrap-topbar-filter .mobile-header-top, .sidebar .mobile-header-top').on('click','.close-box', function (event){
                event.preventDefault();
                $('body').toggleClass('open-sidebar');
            });

        },

        turan_scroll_show_up: function(){
            if ($(window).scrollTop() > 800) {
                $('.backtotop').show(300);
            }
            else {
                $('.backtotop').hide(300)
            }
        },

        turan_general_functions: function(){
            // click menu
            $(document).on('click','.bar-open-menu',function(){
                $(this).toggleClass('active');
                $(this).closest('.main-header').find('.header-nav').toggleClass('show-menu');
                return false;
            });
            // vertical-menu
            $(document).on('click','.block-title',function(){
                $(this).closest('.block-nav-categori').toggleClass('active');
                $(this).closest('.block-nav-categori').find('.verticalmenu-content').toggleClass('show-up');
                return false;
            });
            $(document).on('click', '.bar-open-menu,.vertical-menu-overlay', function () {
                $('body').toggleClass('vertical-menu-open');
                return false;
            });
            $(document).on('click','.error-404 .toggle-hightlight',function(){
                $(this).toggleClass('active');
                $(this).closest('.text-404').find('.search-form').toggleClass('open');
                return false;
            });
            // --------------------------------BACK TO TOP-----------------------------
            $(document).on('click', 'a.backtotop', function (e) {
                e.preventDefault();
                $('html').animate({scrollTop: 0}, 800);
            });
            // change shop mode
            if($('.shop-top-control').length){
                $('.shop-top-control').on('click', '.modes-mode.active', function(event) {
                    event.preventDefault();
                });
            }
        },

        turan_product_variation_handle: function(){
            // size attribute handle
            if($('.product-type-variable .variations .variation-change .change-value').length ){
                $(document).on('click', '.product-type-variable .variations .variation-change .change-value', function(event) {
                    event.preventDefault();
                    var _this = $(this),
                        curent_val = _this.attr('data-value'),
                        variation_name = _this.parents().data('attr-name');

                    if(_this.hasClass('active') || _this.hasClass('avoid')) return 0;

                    if(typeof variation_name !== 'undefined' && variation_name.length){
                        _this.closest('.loop-form-add-to-cart').find('input[name='+variation_name+']').val(curent_val);
                    }
                    _this.siblings('.active').removeClass('active');
                    _this.addClass('active');
                });
            }

            // color attribute handle
            if($('.product-type-variable .product-thumb .color-chosen .color-change').length ){
                $(document).on('click', '.product-type-variable .product-thumb .color-chosen .color-change', function(event) {
                    event.preventDefault();
                    var _this           = $(this),
                        curent_val      = _this.attr('data-value'),
                        pr_price        = _this.data('price'),
                        pr_img          = _this.data('thumb'),
                        thumb_order    = _this.data('thumb_order'),
                        requite         = _this.data('acept-list'),
                        variation_name  = _this.parents().data('attr-name');

                    if(_this.hasClass('active')) return 0;

                    if(typeof requite !== 'undefined' && requite.length){
                        for (var i = 0; i < requite.length; i++) {
                            var attr_name = requite[i].attr_name,
                                items = _this.closest('.product-thumb').siblings('.loop-form-add-to-cart').find('.variation-change[data-attr-name='+attr_name+']'),
                                acept_list = requite[i].acept_list;
                            if(typeof acept_list !=='object' || typeof items == 'undefined') continue;
                            items.find('.change-value').removeClass('active').addClass('avoid');
                            for (var index in acept_list) {
                                items.find('.change-value[data-value='+acept_list[index]+']').removeClass('avoid');
                            }
                            _this.closest('.product-thumb').siblings('.loop-form-add-to-cart').find('input[name='+attr_name+']').val('');
                        }
                    }

                    if(typeof variation_name !== 'undefined' && variation_name.length){
                        _this.closest('.product-thumb').siblings('.loop-form-add-to-cart').find('input[name='+variation_name+']').val(curent_val);
                    }

                    if(typeof pr_img !=='undefined' && pr_img.length){
                        _this.closest('.product-thumb').find('.thumb-inner>a>img').attr('src', pr_img);
                    }
                    if(typeof pr_price !=='undefined' && pr_price.length){
                        _this.closest('.product-thumb').siblings('.product-info').find('.price').html(pr_price);
                    }

                    _this.siblings('.active').removeClass('active');
                    _this.addClass('active');
                });
            }

            if($('.product-type-variable .wrap-variations-nav .button-nav').length){
                if($('.product-type-variable .product-thumb .color-chosen .color-change').length){
                    $('.product-type-variable .wrap-variations-nav').on('click','.button-nav', function(){
                        var _this =  $(this),
                            active = _this.parents().siblings('.variations').find('.color-chosen .color-change.active');
                        if(!active.length) return 0;
                        if(_this.hasClass('next')){
                            active.next().trigger('click');
                        }else{
                            active.prev().trigger('click');
                        }
                    });
                }
            }

        },
    }
    
    /* ---------------------------------------------
     Scripts on load
     --------------------------------------------- */
    window.onload = function () {
        TURAN_JS.init();
    }

    /* ---------------------------------------------
     Scripts resize
     --------------------------------------------- */
    $(window).on("resize", function() {
        TURAN_JS.onResize();
    });

    /* ---------------------------------------------
     Scripts scroll
     --------------------------------------------- */
    $(window).scroll(function(){
        TURAN_JS.onScroll();
    });

})(window.Zepto || window.jQuery, window, document);