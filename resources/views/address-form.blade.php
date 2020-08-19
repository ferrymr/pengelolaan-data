@extends('layouts.without-banner')

@section('content')

<!-- wrap main content -->
<div class="site-content">
    <main class="site-main  main-container no-sidebar">
        <div class="container">

            <!-- breadcrumb -->
            <div class="col-md-6 col-md-offset-3 col-sm-12 breadcrumb-trail breadcrumbs">
                <ul class="trail-items breadcrumb">
                    <li class="trail-item trail-begin">
                        <a href="">
                            <span>
                                Profile
                            </span>
                        </a>
                    </li>
                    <li class="trail-item trail-begin">
                        <a href="">
                            <span>
                                Setting
                            </span>
                        </a>
                    </li>
                    <li class="trail-item trail-end active">
                        <span>
                            Address
                        </span>
                    </li>
                </ul>
            </div>
            <!-- main content -->
            <div class="row">
                <div class="main-content-cart main-content col-sm-12">
                    <div class="row">
                        <div class="col-md-6 col-md-offset-3 col-sm-12">
                            <div class="form-address" style="margin-bottom: 32px">
                                <div class="col-12">
                                    <label class="text">Name</label> 
                                    <input type="text" id="name" class="input-text" style="width: 100%;">
                                </div>
                                <div class="col-12" style="margin-top:16px">
                                    <label class="text">Phone</label> 
                                    <input type="text" id="phone" class="input-text" style="width: 100%;">
                                </div>
                                <div class="col-12" style="margin-top:16px">
                                    <label class="text">Province</label>
                                    <select data-placeholder="London" tabindex="1" class="input-text" style="width: 100%;">
                                        <option disabled="disabled" selected="selected">- Choose Province -</option> 
                                        <option value="1">Bali</option>
                                        <option value="1">Bangka Belitung</option>
                                        <option value="1">Banten</option>
                                    </select>
                                </div>
                                <div class="col-12" style="margin-top:16px">
                                    <label class="text">City</label>
                                    <select data-placeholder="London" tabindex="1" class="input-text" style="width: 100%;">
                                        <option disabled="disabled" selected="selected">- Choose Province -</option> 
                                        <option value="1">Bali</option>
                                        <option value="1">Bangka Belitung</option>
                                        <option value="1">Banten</option>
                                    </select>
                                </div>
                                <div class="col-12" style="margin-top:16px">
                                    <label class="text">Subdistrict</label>
                                    <select data-placeholder="London" tabindex="1" class="input-text" style="width: 100%;">
                                        <option disabled="disabled" selected="selected">- Choose Province -</option> 
                                        <option value="1">Bali</option>
                                        <option value="1">Bangka Belitung</option>
                                        <option value="1">Banten</option>
                                    </select>
                                </div>
                                <div class="col-12" style="margin-top:16px">
                                    <label class="text">Address</label> 
                                    <textarea id="exampleFormControlTextarea1" rows="3" class="input-text"></textarea>
                                </div>
                                <div class="col-12" style="margin-top:16px">
                                    <label class="text">Post Code</label> 
                                    <input type="text" class="input-text" style="width: 100%;">
                                </div>
                                <button class="button" style="margin-top: 2rem">Add Address</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
</div>
@endsection