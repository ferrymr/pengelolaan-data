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
                            <div class="text-center" style="display: flex">
                                <a href="{{ url('address-form') }}" class="btn-add-address">Tambah Baru</a>
                            </div>
                            <div class="address-list">
                                <div class="card-address">
                                    <div class="header-address">
                                        <span>Rumah Mertua</span>
                                        <span class="default-address">Alamat utama</span>
                                    </div>
                                    <div class="body-address">
                                        <p class="receiver-name">Ilman</p>
                                        <p class="receiver-phone">+628473482432</p>
                                        <p class="detail-address">Jl. Kencana wangi utara 2 blog g 20 Buahbatu 40287, Kota Bandung, Jawa Barat, Indonesia</p>
                                    </div>
                                    <div class="footer-address">
                                        <a href="" class="btn-change-address">Ubah</a>
                                    </div>
                                </div>
                                <div class="card-address">
                                    <div class="header-address">
                                        <span>Rumah Mertua 2</span>
                                    </div>
                                    <div class="body-address">
                                        <p class="receiver-name">Ilman Madun</p>
                                        <p class="receiver-phone">+628473482432</p>
                                        <p class="detail-address">Jl. Kencana wangi utara 2 blog g 20 Buahbatu 40287, Kota Bandung, Jawa Barat, Indonesia</p>
                                    </div>
                                    <div class="footer-address">
                                        <a href="" class="btn-change-address">Ubah</a>
                                        <a href="" class="btn-change-default">Jadikan alamat utama</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- full width layout have no sidebar-->

        </div>
    </main>
</div>

@endsection