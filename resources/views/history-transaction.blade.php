@extends('layouts.without-banner')

@section('content')

    <!-- wrap main content -->
	<div class="site-content">
		<main class="site-main  main-container no-sidebar">
			<div class="container">

				<!-- breadcrumb -->
				<div class="col-md-8 col-sm-12 breadcrumb-trail breadcrumbs">
					<ul class="trail-items breadcrumb">
						<li class="trail-item trail-begin">
							<a href="">
								<span>
									Profile
								</span>
							</a>
						</li>
						<li class="trail-item trail-end active">
							<span>
								History Transaction
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
                                    <a href="{{ url('/history-transaction') }}" class="item-tab active">Menunggu Pembayaran</a>
                                    <a href="{{ url('/history-transaction-order-list') }}" class="item-tab">Daftar Transaksi</a>
                                </div>
                                <div class="transaction-list-item">
                                    @foreach([1,2,3] as $item)
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
                                                <div class="status-order">Bayar sebelum 18 Aug 2020, 20:30 WIB</div>
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
    <br>
    <br>

    
@endsection

@section('scripts')
@endsection