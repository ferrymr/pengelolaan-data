@extends('layouts.app')

@section('content')

<!-- wrap main content -->
<div class="site-content">
    <main class="site-main main-container no-sidebar">
        <div class="container">

            <!-- breadcrumb -->
            <div class="row">
                <div class="col-md-8 col-sm-12 breadcrumb-trail breadcrumbs">
                    <ul class="trail-items breadcrumb">
                        <li class="trail-item trail-begin">
                            <a href="{{ route('home') }} ">
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
            </div>

            @include('flash::message')

            <!-- main content -->
            <div class="main-content-cart main-content">                    
                <div class="row">                        
                    <div class="col-md-12 col-sm-12">
                        <h3 class="custom_blog_title">#Profile</h3>
                        <div class="card-profile">
                            <div class="row">
                                <div class="col-md-offset-2 col-md-3 col-12">
                                    <div class="row">
                                        <div class="col-md-12"> 
                                            {{-- {{ dd($user->hasRole('member')) }} --}}
                                            @if($user->hasRole('member'))                                               
                                                <button class="btn btn-success"><b>Member</b></button>
                                            @elseif($user->hasRole('reseller'))
                                                <button class="btn btn-info"><b>Reseller</b></button>
                                            @else 
                                                <button class="btn btn-default"><b>User</b></button>
                                            @endif
                                        </div>
                                    </div>
                                    <br><br> 
                                    <a href="{{ route('profile.edit', $profile->id) }}">
                                        <div class="card-title-profile">
                                            <div class="profile-img">
                                                @if ($profile->photo)
                                                    <img src="{{ $profile->photo }}" />
                                                @else
                                                    <img src="{{ asset('assets/images/unavailable.png') }}" />
                                                @endif
                                            </div>
                                            <div class="section-title-profile">
                                                <span class="text-bold">{{ $profile->name }}</span>
                                                <span class="">Edit profile</span>
                                            </div>                                            
                                        </div>
                                    </a>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="card-body-profile">
                                        <div class="menu-ui">
                                            <a href="{{ route('order-history-status') }}">
                                                <div class="menu-ui-item">
                                                    <div class="menu-ui-left">
                                                        <div class="title-item-menu">History transaksi</div>
                                                        <div class="desc-item-menu">Lihat seluruh history transaksi </div>
                                                    </div>
                                                    <div class="menu-ui-icon">
                                                        <i class="fa fa-chevron-right"></i>
                                                    </div>
                                                </div>
                                            </a>
                                            <a href="{{ route('address.index') }}">
                                                <div class="menu-ui-item">
                                                    <div class="menu-ui-left">
                                                        <div class="title-item-menu">Pengaturan alamat pengiriman</div>
                                                        <div class="desc-item-menu">Alamat untuk pengiriman barang</div>
                                                    </div>
                                                    <div class="menu-ui-icon">
                                                        <i class="fa fa-chevron-right"></i>
                                                    </div>
                                                </div>
                                            </a>
                                            <a href="{{ route('member.signup') }}">
                                                <div class="menu-ui-item">
                                                    <div class="menu-ui-left">
                                                        <div class="title-item-menu">Yuk daftar jadi member / reseller!</div>
                                                        <div class="desc-item-menu">Lihat syarat-syarat dan daftar sebagai member / reseller</div>
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
            </div>

            <!-- full width layout have no sidebar-->

        </div>
    </main>
</div>

@endsection