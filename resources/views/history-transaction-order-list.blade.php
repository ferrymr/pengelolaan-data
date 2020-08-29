@extends('layouts.app')

@section('content')

    <!-- wrap main content -->
    <div class="site-content">
        <main class="site-main  main-container no-sidebar">
            <div class="container">

                <!-- breadcrumb -->
                <div class="col-md-8 col-sm-12 breadcrumb-trail breadcrumbs">
                    <ul class="trail-items breadcrumb">
                        <li class="trail-item trail-begin">
                            <a href="{{ route('profile.index') }}">
                                <span>
                                    Profile
                                </span>
                            </a>
                        </li>
                        <li class="trail-item">
                            <a href="{{ route('order-history.index') }}">
                                <span>
                                    Histori Transaksi
                                </span>
                            </a>
                        </li>
                        <li class="trail-item trail-end active">
                            <span>
                                Semua
                            </span>
                        </li>
                    </ul>
                </div>

                <!-- main content -->
                <div class="row">
                    <div class="main-content-cart main-content col-sm-12">
                        <div class="row">
                            <div class="col-md-6 col-md-offset-3 col-sm-12">
                                <div class="tab">
                                    <a href="{{ route('order-history.waiting-for-payment') }}" class="item-tab">Menunggu Pembayaran</a>
                                    <a href="{{ route('order-history.index') }}" class="item-tab active">Semua Transaksi</a>
                                </div>
                                <div class="transaction-list-item">
                                    @foreach($transactions as $transaction)
                                        <a href="{{ route('order-history.detail', $transaction->id) }}">
                                            <div class="item-transaction">
                                                <div class="header-item">
                                                    <div class="icon-order">
                                                        <i class="fa fa-shopping-bag" aria-hidden="true"></i>
                                                    </div>
                                                    <div class="date-order">
                                                        <span>{{ $transaction->tgl_transaksi }}</span>
                                                        <span class="text-bold">{{ $transaction->nomor_transaksi }}</span>
                                                    </div>
                                                </div>
                                                <div class="hr-item-transaction"></div>
                                                <div class="body-item">
                                                <div class="status-order {{ $transaction->status_transaksi != 'PLACE ORDER' ? 'success' : '' }}">
                                                    
                                                    @if ($transaction->status_transaksi == 'PLACE ORDER')
                                                        Mohon melakukan pembayaran sebelum tanggal {{ $transaction->tgl_transaksi }} Pukul 00.00
                                                    @elseif ($transaction->status_transaksi == 'TRANSFERRED')
                                                        Pelanggan sudah melakukan transfer
                                                    @elseif ($transaction->status_transaksi == 'PAYMENT CONFIRMED')
                                                        Pembayaran dikonfirmasi!
                                                    @elseif ($transaction->status_transaksi == 'PACKED')
                                                        Pesanan sedang disiapkan
                                                    @elseif ($transaction->status_transaksi == 'SHIPPED')
                                                        Pesanan sedang dikirim
                                                    @elseif ($transaction->status_transaksi == 'RECEIVED')
                                                        Pesanan diterima!
                                                    @else
                                                        Pesanan dibatalkan
                                                    @endif

                                                </div>
                                                    <div class="item-detail-order">
                                                        <div class="logo-payment">
                                                            @if ($transaction->bank == 'BCA')
                                                                <img src="https://qurban.sahabatyatim.com/wp-content/uploads/2019/07/logo-bca.png" alt="">
                                                            @elseif ($transaction->bank == 'BNI')
                                                                <img src="https://i.pinimg.com/originals/36/38/43/36384348ef9d7bfff66da6da9e975d56.png" alt="">
                                                            @elseif ($transaction->bank == 'BRI')
                                                                <img src="https://e7.pngegg.com/pngimages/376/573/png-clipart-logo-bank-rakyat-indonesia-brand-bank-di-indonesia-bank-card-blue-text.png" alt="">
                                                            @elseif ($transaction->bank == 'MANDIRI')
                                                                <img src="https://img2.pngdownload.id/20180815/ab/kisspng-bank-mandiri-depok-logo-bank-mandiri-semarang-kred-5b74ed29b6a585.5966533915343895457481.jpg" alt="">
                                                            @endif
                                                        </div>
                                                        <div class="detail-order">
                                                            <div class="total-order">
                                                                <span class="label-order">Total</span>
                                                                <span class="total-nominal">@currency($transaction->grand_total)</span>
                                                            </div>
                                                            <div class="transfer-order">
                                                                <span class="label-order">Rekening Tujuan</span>
                                                                
                                                                @if ($transaction->bank == 'BCA')
                                                                    <span class="norek-order">Rian Setiawan</span>
                                                                    <span class="an-order">346.277.2308</span>
                                                                @elseif ($transaction->bank == 'BNI')
                                                                    <span class="norek-order">Rian Setiawan</span>
                                                                    <span class="an-order">30.000.11.238</span>
                                                                @elseif ($transaction->bank == 'BRI')
                                                                    <span class="norek-order">Rian Setiawan</span>
                                                                    <span class="an-order">0389.01.025423.50.0</span>
                                                                @elseif ($transaction->bank == 'MANDIRI')
                                                                    <span class="norek-order">Rian Setiawan</span>
                                                                    <span class="an-order">130.05.52.888.888</span>
                                                                @endif
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                    @endforeach

                                    {{-- @foreach([1,2,3] as $item)
                                    <a href="">
                                        <div class="item-transaction">
                                            <div class="header-item">
                                                <div class="icon-order">
                                                    <i class="fa fa-shopping-bag" aria-hidden="true"></i>
                                                </div>
                                                <div class="date-order">
                                                    <span>12 Sep 2020</span>
                                                    <span class="text-bold">Belanja</span>
                                                </div>
                                            </div>
                                            <div class="hr-item-transaction"></div>
                                            <div class="body-item">
                                            <div class="status-order {{ $item == 2 ? 'success' : '' }} {{  $item == 1 ? 'danger' : '' }}">
                                            {{ $item == 3 ? 'Bayar sebelum 18 Aug 2020, 20:30 WIB' : '' }}
                                            {{ $item == 2 ? 'RECEIVED' : '' }}
                                            {{ $item == 1 ? 'CANCEL' : '' }}
                                            </div>
                                                <div class="item-detail-order">
                                                    <div class="logo-payment">
                                                        <img src="https://qurban.sahabatyatim.com/wp-content/uploads/2019/07/logo-bca.png" alt="">
                                                    </div>
                                                    <div class="detail-order">
                                                        <div class="total-order">
                                                            <span class="label-order">Total</span>
                                                            <span class="total-nominal">Rp. 200.000</span>
                                                        </div>
                                                        <div class="transfer-order">
                                                            <span class="label-order">Rekening Tujuan</span>
                                                            <span class="norek-order">323 323 323 323</span>
                                                            <span class="an-order">a.n PT Bellezskin</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                    @endforeach --}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- full width layout have no sidebar-->

            </div>
        </main>
    </div>
    <br>
    <br>

    
@endsection

@section('scripts')
@endsection