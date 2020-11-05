@extends('layouts.app')

@section('content')

    {{-- wrap main content  --}}
    <div class="site-content">
        <main class="site-main main-container no-sidebar">
            <div class="container">

                {{-- breadcrumb  --}}
                <div class="row">
                    <div class="col-md-8 col-sm-12 breadcrumb-trail breadcrumbs">
                        <ul class="trail-items breadcrumb">
                            <li class="trail-item trail-begin">
                                <a href="/">
                                    <span>
                                        Home
                                    </span>
                                </a>
                            </li>
                            <li class="trail-item">
                                <a href="{{ route('profile.index') }}">
                                    <span>
                                        Profile
                                    </span>
                                </a>
                            </li>
                            <li class="trail-item">
                                <a href="{{ route('order-history-status') }}">
                                    <span>
                                        Histori Transaksi
                                    </span>
                                </a>
                            </li>
                            <li class="trail-item trail-end active">
                                <span>
                                    @if($status == '')
                                        Semua Transaksi
                                    @elseif($status == 'waiting')
                                        Menunggu Pembayaran
                                    @elseif($status == 'process')
                                        Pesanan di Proses
                                    @elseif($status == 'done')
                                        Pesanan Selesai
                                    @endif
                                </span>
                            </li>
                        </ul>
                    </div>
                </div>

                {{-- main content  --}}
                <div class="row">
                    <div class="main-content-cart main-content col-sm-12">
                        <div class="row">
                            <div class="col-md-12 col-sm-12">
                                <h3 class="custom_blog_title" style="margin-bottom:0px">#History Transaksi</h3>
                                <br>
                                <div class="tab">
                                    <a href="{{ route('order-history-status') }}" class="item-tab @if($status == '') active @endif">Semua Transaksi ({{ count($transactions) }})</a>
                                    <a href="{{ route('order-history-status', ['status' => 'waiting']) }}" class="item-tab @if($status == 'waiting') active @endif">Menunggu Pembayaran ({{ $totalMenungguPembayaran }})</a>
                                    <a href="{{ route('order-history-status', ['status' => 'process']) }}" class="item-tab @if($status == 'process') active @endif">Pesanan di Proses ({{ $totalPesananDiproses }})</a>
                                    <a href="{{ route('order-history-status', ['status' => 'done']) }}" class="item-tab @if($status == 'done') active @endif">Pesanan Selesai ({{ $totalPesananSelesai }})</a>
                                </div>
                                <div class="transaction-list-item">
                                    <div class="row">
                                        @forelse($transactions as $transaction)                                        
                                            <div class="col-12 col-md-6">
                                                <a href="{{ route('order-history.detail', $transaction->id) }}">
                                                    <div class="item-transaction">
                                                        <div class="header-item">
                                                            <div class="icon-order">
                                                                <i class="fa fa-shopping-bag" aria-hidden="true"></i>
                                                            </div>
                                                            <div class="date-order">
                                                                <span> {{ date_format(date_create($transaction->tanggal),"d F Y") }} </span>
                                                                <span class="text-bold">{{ $transaction->no_do }}</span>
                                                            </div>
                                                        </div>
                                                        <div class="hr-item-transaction"></div>
                                                        <div class="body-item">
                                                            <div class="alert alert-{{ $transaction->status_transaksi != 'PLACE ORDER' ? 'success' : 'warning' }}">
                                                                <b>Status: &nbsp;</b>
                                                                @if ($transaction->status_transaksi == 'PLACE ORDER')
                                                                    Lakukan pembayaran sebelum <b>{{ date_format(date_create($transaction->tanggal),"d F Y") }} pk 00:00</b>
                                                                @elseif ($transaction->status_transaksi == 'TRANSFERRED')
                                                                    Sudah melakukan konfirmasi pembayaran
                                                                @elseif ($transaction->status_transaksi == 'PAYMENT CONFIRMED')
                                                                    Pembayaran dikonfirmasi
                                                                @elseif ($transaction->status_transaksi == 'PACKED')
                                                                    Pesanan sedang disiapkan
                                                                @elseif ($transaction->status_transaksi == 'SHIPPED')
                                                                    Pesanan sedang dikirim
                                                                @elseif ($transaction->status_transaksi == 'RECEIVED')
                                                                    Pesanan diterima
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
                                                                        <span class="label-order">Total pembayaran</span>
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
                                            </div>
                                        @empty
                                            <div class="col-12 col-md-12">
                                                <div class="text-center">
                                                    <h4>Tidak ada transaksi</h4>
                                                </div>
                                            </div>
                                        @endforelse
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- full width layout have no sidebar --}}

            </div>
        </main>
    </div>
    <br>
    <br>
    
@endsection