<footer class="footer default">
    <div class="container">
        <div class="container-wapper">
            <div class="row">
                <div class="box-footer col-xs-12 col-sm-6 col-md-6 col-lg-4">
                    <div class="widget-box">
                        <div class="single-img">
                            <a href="{{ route('home') }}"><img src="{{ asset('assets/images/logo_footer') }}.png" width="200px" alt=""></a>
                        </div>
                        <div class="text-content-elememnt">
                            <p>
                                Bellezkin adalah brand perawatan kecantikan yang berdiri tahun 2014. Mengutamakan pelayanan konsultasi dengan beauty consultant professional dan dengan dukungan tenaga ahli.</p>
                        </div>
                    </div>
                </div>
                <div class="box-footer col-xs-6 col-sm-6 col-md-6 col-lg-2">
                    <div class="turan-custommenu default">
                        <h2 class="widgettitle">Links</h2>
                        <ul class="menu">
                            <li class="menu-item">
                                <a href="{{ route('home') }}">Home</a>
                            </li>
                            <li class="menu-item">
                                <a href="{{ route('products.category', 'brightening') }}" class="kt-item-title" title="Brightening">Brightening</a>
                            </li>
                            <li class="menu-item">
                                <a href="{{ route('products.category', 'purify') }}">Purify</a>
                            </li>
                            <li class="menu-item">
                                <a href="{{ route('products.category', 'decorative') }}">Decorative</a>
                            </li>
                            <li class="menu-item">
                                <a href="{{ route('products.category', 'extra care') }}">Decorative</a>
                            </li>
                            <li class="menu-item">
                                <a href="{{ route('products.category', 'series') }}">Series</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="box-footer col-xs-6 col-sm-6 col-md-6 col-lg-2">
                    <div class="turan-custommenu default">
                        <h2 class="widgettitle">Information</h2>
                        <ul class="menu">
                            <li class="menu-item">
                                <a href="{{ url('/faqs') }}">FAQ's</a>
                            </li>
                            <li class="menu-item">
                                <a href="https://api.whatsapp.com/send?phone=628112288142&text=Halo!%0ASaya%20ingin%20ingin%20konsultasi%20lebih%20lanjut%20mengenai%20produk%20Bellezkin">Beauty Consultant</a>
                            </li>
                            <li class="menu-item">
                                <a href="{{ url('/return-policy') }}">Return Policy</a>
                            </li>
                            {{-- <li class="menu-item">
                                <a href="#">Contact Us</a>
                            </li>
                            <li class="menu-item">
                                <a href="#">Return</a>
                            </li> --}}
                        </ul>
                    </div>
                </div>
                <div class="box-footer col-xs-12 col-sm-6 col-md-6 col-lg-4">
                    <div class="turan-newsletter style1">
                        <div class="newsletter-head">
                            <h3 class="title">Follow Us</h3>
                        </div>
                        {{-- <div class="newsletter-form-wrap">
                            <div class="list">
                                <span class="text">Im interested in:</span>
                                <label for="radio-footer-2">
                                    <input id="radio-footer-2" type="radio" name="list_id" value="radio-footer-2">
                                    <span class="text">Grooming</span>
                                </label>
                                <label for="radio-footer-1">
                                    <input checked="checked" id="radio-footer-1" type="radio" name="list_id" value="radio-footer-1">
                                    <span class="text">Accessories</span>
                                </label>
                            </div>
                            <input type="email" class="input-text email email-newsletter" placeholder="Your email letter">
                            <button class="button btn-submit submit-newsletter">SUBSCRIBE</button>
                        </div> --}}
                    </div>
                    <div class="turan-socials">
                        <ul class="socials">
                            <li>
                                <a href="https://www.facebook.com/bellezkincare.natural/" class="social-item" target="_blank">
                                    <i class="icon fa fa-facebook-square"></i>
                                </a>
                            </li>
                            <li>
                                <a href="https://www.youtube.com/channel/UCE0Hte0fUMeWhGrVn5zgwRQ" class="social-item" target="_blank">
                                    <i class="icon fa fa-youtube"></i>
                                </a>
                            </li>
                            <li>
                                <a href="https://www.instagram.com/bellezkin/" class="social-item" target="_blank">
                                    <i class="icon fa fa-instagram"></i>
                                </a>
                            </li>
                        </ul>
                        <li>
                            <a href="https://cekbpom.pom.go.id/index.php/home/produk/vs9849n2dm48o0fiffkavi2d92/all/row/10/page/1/order/4/DESC/search/2/bellezkin" target="_blank">
                                <img src="{{ asset('assets/images/bpom') }}.png" width="80px" alt="">
                            </a>
                        </li>
                        <li>
                            <a href="" target="_blank">
                                <img src="{{ asset('assets/images/mui') }}.png" width="80px" alt="">
                            </a>
                        </li>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12 border-custom">
                    <span></span>
                </div>
            </div>
            <div class="footer-end">
                <div class="row">
                    <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                        <div class="coppyright">Copyright © 2020 <a href="{{ route('home') }}">Bellezkin</a>. All rights reserved</div>
                    </div>
                    {{-- <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                        <div class="turan-payment"><img src="{{ asset('assets/images/payments.png') }}" alt=""></div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                        <div class="demos"><a href="#">Demo <span>(01)</span></a></div>
                    </div> --}}
                </div>
            </div>
        </div>
    </div>
</footer>