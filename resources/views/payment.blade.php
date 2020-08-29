@extends('layouts.app')

@section('content')

    {{-- wrap main content --}}
    <div class="site-content">
        <main class="site-main  main-container no-sidebar">
            <div class="container">

                {{-- breadcrumb --}}
                <div class="breadcrumb-trail breadcrumbs">
                    <ul class="trail-items breadcrumb">
                        <li class="trail-item trail-begin">
                            <a href="">
                                <span>
                                    My Cart
                                </span>
                            </a>
                        </li>
                        <li class="trail-item trail-end active">
                            <span>
                                Checkout
                            </span>
                        </li>
                        <li class="trail-item trail-end active">
                            <span>
                                Payment
                            </span>
                        </li>
                    </ul>
                </div>

                {{-- main content --}}
                <div class="row">
                    <div class="main-content-cart main-content col-sm-12">
                        <div class="row">
                            <div class="col-md-8">

                                <div class="row">
                                    <div class="col-md-6" style="margin-top:16px">
                                        <label class="text">Pilih Bank</label>
                                        <select tabindex="1" class="input-text" style="width: 100%;">
                                            <option disabled="disabled" selected="selected">-- Pilih Bank --</option>
                                            {{-- @foreach ($bankList as $bank)
                                                <option value="{{ $bank }}">{{ $bank }}</option>
                                            @endforeach --}}
                                            <option value="">BCA</option>
                                            <option value="">BNI</option>
                                            <option value="">BRI</option>
                                            <option value="">MANDIRI</option>
                                        </select>
                                    </div>
                                </div>
                                <button type="submit" class="button" style="margin-top: 2rem">Payment</button>
                                {{-- <div class="row">
                                    <div class="col-md-6" style="margin-top:16px">
                                        <label class="text">Pilih Sales Point Branch</label>
                                        <select tabindex="1" class="input-text" style="width: 100%;">
                                            <option disabled="disabled" selected="selected">-- Pilih SPB --</option> 
                                            @foreach ($spbList as $spb)
                                                <option value="{{ $spb['code'] }}" {{ $spb['disabled'] }}>{{ $spb['city_name'] }} - {{ $spb['subdistrict_name'] }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6" style="margin-top:16px">
                                        <label class="text">Shipping Method</label>
                                        <div>
                                            <input type="radio" name="shipping_method" id="expedition" value="EXPEDITION" style="margin-right: 5px;" checked>
                                            <label for="expedition" style="margin-right: 10px;">Courier</label>
                                            <input type="radio" name="shipping_method" id="immediate" value="IMMEDIATE" style="margin-right: 5px;">
                                            <label for="immediate" style="margin-right: 10px;">Immediate</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6" style="margin-top:16px">
                                        <label for="note" class="text">Note</label> 
                                        <textarea id="note" rows="3" class="input-text"></textarea>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6" style="margin-top:16px">
                                        <label class="text">Select Courier</label>
                                        <select tabindex="1" class="input-text" style="width: 100%;">
                                            <option disabled="disabled" selected="selected">- Choose Courier -</option> 
                                            <option value="1">JNE</option>
                                            <option value="1">JNT</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6" style="margin-top: 16px">
                                        <label for="deliverto" style="font-weight: bold">Deliver to</label>
                                        <div>
                                            <div class="header-address">
                                                <span>Rumah Mertua 2</span>
                                            </div>
                                            <div class="body-address">
                                                <p class="receiver-name">Ilman Madun</p>
                                                <p class="receiver-phone">+628473482432</p>
                                                <p class="detail-address">Jl. Kencana wangi utara 2 blog g 20 Buahbatu 40287, Kota Bandung, Jawa Barat, Indonesia</p>
                                            </div>
                                        </div>
                                        <a href="">Ubah Alamat</a>
                                    </div>
                                </div> --}}
                            </div>
                            {{-- <div class="col-md-4">
                                <div class="card-total-cart" id="card-cart">
                                    <div>
                                        <div class="section-total">
                                            <span class="title-section-card"  style="margin-bottom: 1.8rem">Order Summary</span>
                                            <div class="d-flex justify-between">
                                                <div>Total Items</div>
                                                <div>1pcs</div>
                                            </div>
                                            <div class="d-flex justify-between">
                                                <div>Total Weight</div>
                                                <div>0.5Kg</div>
                                            </div>
                                            <div class="d-flex justify-between">
                                                <div>Grand Total</div>
                                                <div>Rp. 905.000</div>
                                            </div>
                                            <div class="d-flex justify-between">
                                                <div>Unique Code</div>
                                                <div>Rp. 434</div>
                                            </div>
                                            <hr>
                                            <div class="total-number">
                                                <div>Total Payment</div>
                                                <div class="cost">Rp. 905.434</div>
                                            </div>
                                            <div class="section-button">
                                                <button class="btn-checkout-cart">
                                                    <span>Pay Now</span>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div> --}}
                        </div>
                    </div>
                </div>

                {{-- full width layout have no sideba --}}

            </div>
        </main>
    </div>
    <br>
    <br>

    
@endsection