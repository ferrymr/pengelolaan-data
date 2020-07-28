@extends('layouts.app')

@section('content')

{{-- <div class="container">
<div class="main-content main-content-checkout">
    <div class="container">
        <div class="row">
            <div class="tab-container">
                <div id="profil" class="tab-panel active">
                    <div class="col-md-12">
                        <div class="shipping-address-form-wrapp">
                            <div class="shipping-address-form checkout-form" style="padding: 35px 27px 20px !important; border: 0px;">
                                <div class="col-md-12">
                                    <div class="shipping-address">
                                        <div id="tab-program" class="tab-base mt-4">
                                            <ul id="tab" role="tablist" class="nav nav-justified nav-base">
                                                <li class="nav-item">
                                                    <a href="/profile" class="nav-link py-3 nuxt-link-exact-active nuxt-link-active" id="detail-tab" data-toggle="tab" role="tab" aria-controls="detail" aria-selected="true">My Profile</a></li> 
                                                <li class="nav-item">
                                                    <a href="/profile/addresses" class="nav-link py-3" id="detail-tab" data-toggle="tab" role="tab" aria-controls="detail" aria-selected="true">Addresses list</a>
                                                </li> <li class="nav-item"><a href="/profile/addresses/add" class="nav-link py-3" id="detail-tab" data-toggle="tab" role="tab" aria-controls="detail" aria-selected="true">Add New address</a></li>
                                            </ul>
                                        </div> <br><br> 
                                        <div class="row">
                                            <div class="col-md-12">
                                                <p class="col-12"><label class="text">Nama</label> <input type="text" id="name" class="input-text" style="width: 100%;"></p> 
                                                <p class="col-12"><label class="text">Tanggal Lahir</label> <input type="date" id="birthdate" class="form-control" style="width: 100%;"></p> 
                                                <p class="col-12"><label class="text">Telepon</label> <input type="text" id="phone" class="input-text" style="width: 100%;"></p>
                                                <p class="col-12"><label class="text">Email</label> <input type="email" id="email" readonly="readonly" class="input-text" style="width: 100%;"></p> 
                                                <div class="text-left" style="margin-top: 2em;"><button class="button">Save Profile</button>
                                                </div>
                                            </div>
                                        </div
                                        ></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> --}}

<!--wrap main content-->
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb-trail breadcrumbs">
                    <ul class="trail-items breadcrumb">
                        <li class="trail-item trail-begin"><a href="index.html">Home</a></li>
                        <li class="trail-item trail-end active">Contact us</li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="content-area content-contact col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="site-main">
                    <h3 class="custom_blog_title">#Contact us</h3>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        
        <div class="row">
            <div class="col-sm-12">
                <br><br/><br/>
                <br><br/><br/>
                <br><br/><br/>
                <br><br/><br/>
                <br><br/><br/>
                <br><br/><br/>
            </div>
        </div>
    </div>
    <div class="page-main-content">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="form-contact">
                        <div class="col-lg-8 no-padding">
                            <div class="form-message">
                                <h2 class="title">Send us a Message!</h2>
                                <form action="#" class="turan-contact-fom">
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <p>
                                                <span class="form-label">Your name*</span>
                                                <span class="form-control-wrap your-name">
                                                    <input type="text" name="your-name"  size="40" class="form-control form-control-name">
                                                </span>
                                            </p>
                                        </div>
                                        <div class="col-sm-6">
                                            <p>
                                                <span class="form-label">Your email*</span>
                                                <span class="form-control-wrap your-email">
                                                    <input type="email" name="your-email" size="40" class="form-control form-control-email">
                                                </span>
                                            </p>
                                        </div>
                                    </div>
                                    <div class="row">

                                        <div class="col-sm-6">
                                            <p>
                                                <span class="form-label">Phone</span>
                                                <span class="form-control-wrap your-phone">
                                                    <input type="text" name="your-phone" class="form-control form-control-phone">
                                                </span>
                                            </p>
                                        </div>

                                        <div class="col-sm-6">
                                            <p>
                                                <span class="form-label">Company</span>
                                                <span class="form-control-wrap your-company">
                                                    <input type="text" name="your-company" class="form-control your-company">
                                                </span>
                                            </p>
                                        </div>

                                    </div>
                                    <p>
                                        <span class="form-label">Your Message</span>
                                        <span class="wpcf7-form-control-wrap your-message">
                                            <textarea name="your-message" cols="40" rows="9" class="form-control your-textarea"></textarea>	
                                        </span>
                                    </p>
                                    <p>
                                        <input type="submit" value="SEND MESSAGE" class="form-control-submit button-submit">
                                    </p>
                                </form>
                            </div>
                        </div>

                        <div class="col-lg-4 no-padding">
                            <div class="form-contact-information">
                                <form action="#" class="turan-contact-info">
                                    <h2 class="title">Contact information</h2>
                                    <div class="info">
                                        <div class="item address">
                                            <span class="icon"></span>
                                            <span class="text">Restfield White City London<br>G12 Ariel Way - United Kingdom</span>
                                        </div>
                                        <div class="item phone">
                                            <span class="icon"></span>
                                            <span class="text">(+800) 123 456 7890</span>
                                        </div>
                                        <div class="item email">
                                            <span class="icon"></span>
                                            <span class="text">info@turanoutfit.co.uk</span>
                                        </div>
                                    </div>
                                    <div class="socials">
                                        <a href="#" class="social-item" target="_blank"><span class="icon fa fa-facebook"></span></a>
                                        <a href="#" class="social-item" target="_blank"><span class="icon fa fa-twitter-square"></span></a>
                                        <a href="#" class="social-item" target="_blank"><span class="icon fa fa-instagram"></span></a>
                                    </div>
                                </form>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection