@extends('layouts.app')

@section('content')

<!-- wrap main content -->
<div class="site-content">
    <main class="site-main  main-container no-sidebar">
        <div class="container">

            <!-- breadcrumb -->
            <div class="row">
                <div class="col-md-6 col-sm-12 breadcrumb-trail breadcrumbs">
                    <ul class="trail-items breadcrumb">
                        <li class="trail-item trail-begin">
                            <a href="">
                                <span>
                                    Home
                                </span>
                            </a>
                        </li>
                        <li class="trail-item trail-begin">
                            <a href="{{ route('profile.index') }}">
                                <span>
                                    Profile
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
            </div>

            <!-- main content -->
            <div class="row">
                <div class="main-content-cart main-content col-sm-12">
                    <h3 class="custom_blog_title" style="margin-bottom:0px">#Addresses</h3>
                    <br><br>

                    <div class="row">
                        <div class="address-list">
                            <div class="col-md-12">
                                <a href="{{ route('address.create')}}" class="button btn-pay-now">Tambah Alamat</a>
                            </div>

                            @forelse($shippings as $shipping)
                                <div class="col-md-4" style="margin-bottom: 50px;">
                                    <div class="card-address">
                                        <div class="body-address">
                                            <div class="row">
                                                <div class="@if($shipping->is_default) col-md-8 @else col-md-12 @endif">
                                                    <p>
                                                        <b>Penerima: </b>{{ $shipping->nama }}<br>
                                                        <b>Telepon: </b>{{ $shipping->telepon }}<br>
                                                        <b>Alamat: </b><br>{{ $shipping->alamat }}
                                                    </p>
                                                </div>
                                                @if($shipping->is_default)
                                                    <div class="col-md-4">
                                                        <button>Utama</button>
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="footer-address">
                                            <a href="{{ route('address.edit', $shipping->id) }}" class="btn-change-address">Ubah</a>
                                            <a href="{{ route('address.destroy', $shipping->id) }}" class="btn-change-address" onclick="event.preventDefault(); document.getElementById('delete-shipping-address').submit();">Hapus</a>
                                        
                                            <form action="{{ route('address.destroy', $shipping->id) }}" method="post" style="display:none;" id="delete-shipping-address">
                                                @csrf 
                                                @method('delete')
                                            </form>
                                        
                                            @if($shipping->is_default != 1)
                                                <a href="{{ route('address.setdefault', $shipping->id) }}" class="btn-change-default">Jadikan alamat utama</a>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            @empty
                                <div style="height: 100px;">&nbsp;<br></div>
                            @endforelse

                        </div>
                    </div>
                </div>
            </div>

            <!-- full width layout have no sidebar-->

        </div>
    </main>
</div>

@endsection