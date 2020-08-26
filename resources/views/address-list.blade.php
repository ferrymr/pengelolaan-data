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
                                <a href="{{ route('address.create')}}" class="btn-add-address">Tambah Baru</a>
                            </div>
                            <div class="address-list">
                                @foreach($shippings as $shipping)
                                <div class="card-address">
                                    <div class="header-address">
                                        {{-- <span>Rumah Mertua</span>
                                        <span class="default-address">Alamat utama</span> --}}
                                    </div>
                                    <div class="body-address">
                                        <p class="receiver-name">{{ $shipping->nama }}</p>
                                        <p class="receiver-phone">{{ $shipping->telepon }}</p>
                                        <p class="detail-address">{{ $shipping->alamat }}</p>
                                    </div>
                                    <div class="footer-address">
                                        <a href="{{ route('address.edit', $shipping->id) }}" class="btn-change-address">Ubah</a>
                                        <a href="{{ route('address.destroy', $shipping->id) }}" class="btn-change-address" onclick="event.preventDefault(); document.getElementById('delete-shipping-address').submit();">Hapus</a>
                                       
                                        <form action="{{ route('address.destroy', $shipping->id) }}" method="post" style="display:none;" id="delete-shipping-address">
                                            @csrf 
                                            @method('delete')
                                            {{-- <button class="btn btn-danger btn-sm">
                                                <i class="fa fa-trash"></i>
                                             </button> --}}
                                        </form>
                                       
                                        @if($shipping->is_default != 1)
                                            <a href="{{ route('address.setdefault', $shipping->id) }}" class="btn-change-default">Jadikan alamat utama</a>
                                        @endif
                                    </div>
                                </div>
                                @endforeach
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