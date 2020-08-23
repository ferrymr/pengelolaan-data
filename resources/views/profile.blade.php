@extends('layouts.app')

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
                                Home
                            </span>
                        </a>
                    </li>
                    <li class="trail-item trail-end active">
                        <span>
                            Profile
                        </span>
                    </li>
                </ul>
            </div>

            <!-- main content -->
            <div class="row">
                <div class="main-content-cart main-content col-sm-12">
                    <div class="row">
                        <div class="col-md-6 col-md-offset-3 col-sm-12">
                            <div class="card-profile">
                                <a href="{{ route('profile.edit', 1) }}">
                                    <div class="card-title-profile">
                                        <div class="profile-img">
                                            <img src="https://www.fillmurray.com/200/200" alt="">
                                        </div>
                                        @foreach($profiles as $p)
                                        <div class="section-title-profile">
                                            <span class="text-bold">{{ $p->nama }}</span>
                                            <span class="">Edit profile</span>
                                        </div>
                                        @endforeach
                                    </div>
                                </a>
                                <div class="card-body-profile">
                                    <div class="menu-ui">
                                        <a href="">
                                            <div class="menu-ui-item">
                                                <div class="menu-ui-left">
                                                    <div class="title-item-menu">Menunggu Pembayaran</div>
                                                    <div class="desc-item-menu">Semua transaksi yang belum dibayar</div>
                                                </div>
                                                <div class="menu-ui-icon">
                                                    <i class="fa fa-chevron-right"></i>
                                                </div>
                                            </div>
                                        </a>
                                        <a href="">
                                            <div class="menu-ui-item">
                                                <div class="menu-ui-left">
                                                    <div class="title-item-menu">Histori Transaksi</div>
                                                    <div class="desc-item-menu">Semua transaksi yang pernah dibuat</div>
                                                </div>
                                                <div class="menu-ui-icon">
                                                    <i class="fa fa-chevron-right"></i>
                                                </div>
                                            </div>
                                        </a>
                                        <a href="{{ url('/address-list') }}">
                                            <div class="menu-ui-item">
                                                <div class="menu-ui-left">
                                                    <div class="title-item-menu">Pengaturan Alamat</div>
                                                    <div class="desc-item-menu">Alamat untuk pengiriman barang</div>
                                                </div>
                                                <div class="menu-ui-icon">
                                                    <i class="fa fa-chevron-right"></i>
                                                </div>
                                            </div>
                                        </a>
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