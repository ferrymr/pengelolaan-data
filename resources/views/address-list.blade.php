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
                                       
                                        <form action="{{ route('address.destroy', $shipping->id) }}" method="post" class="d-inline">
                                            @csrf 
                                            @method('delete')
                                             <a class="btn-change-address">Hapus</a>
                                        </form>
                                       
                                        <a href="" class="btn-change-default">Jadikan alamat utama</>
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