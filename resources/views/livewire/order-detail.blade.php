{{-- wrap main content --}}
<div class="site-content">
    <main class="site-main  main-container no-sidebar">
        <div class="container">

            {{-- breadcrumb --}}
            <div class="row">
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
                            <a href="{{ route('order-history-status') }}">
                                <span>
                                    Histori Transaksi
                                </span>
                            </a>
                        </li>
                        <li class="trail-item trail-end active">
                            <span>
                                {{ $transaction->nomor_transaksi }}
                            </span>
                        </li>
                    </ul>
                </div>
            </div>            
            
            {{-- main content --}}
            <div class="row">
                <div class="main-content-cart main-content col-sm-12 detial-item-history">
                    <div class="row">
                        {{-- {{ $transaction }} --}}
                        <div class="col-md-9">
                            <table>
                                <thead>
                                    <tr>
                                        <th>
                                            <b>Items</b>
                                        </th>
                                        <th>
                                            <b>Total</b>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($items as $item)
                                        <tr>
                                            <td class="item-order">
                                                <div class="row">
                                                    <div class="col-md-2">
                                                        <img src="{{ asset('assets/images/thumbnails/' . $item->kode_barang . '.jpg') }}" alt="{{ $item->itemDetail->nama }}">
                                                    </div>
                                                    <div class="col-md-10">
                                                        {{ $item->itemDetail->nama }}
                                                        <div>
                                                            <span>{{ $item->qty }} x</span> 
                                                            <span>@currency($item->harga)</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td> 
                                            <td>@currency($item->subtotal)</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    @if ($transaction->metode_pengiriman == 'EXPEDITION')
                                    <tr>
                                        <td colspan="" align="right">
                                            <b>Shipping</b>
                                        </td> 
                                        <td>
                                            <b>@currency($transaction->shipping_fee) / {{ $transaction->kurir }}</b>
                                        </td>
                                    </tr>
                                    @endif
                                    <tr>
                                        <td colspan="" align="right">
                                            <b>Kode Unik</b>
                                        </td> 
                                        <td>
                                            <b>@uniqueCode($transaction->grand_total)</b>
                                        </td>
                                    </tr> 
                                    <tr>
                                        <td colspan="" align="right">
                                            <b>Grand total</b>
                                        </td> 
                                        <td>
                                            <b>@currency($transaction->grand_total)</b>
                                        </td>
                                    </tr>
                                </tfoot>
                            </table>

                            <div class="row" style="margin-bottom: 1em;">
                                <div class="col-md-12">
                                    <b>{{ $transaction->metode_pengiriman == 'EXPEDITION' ? 'Dikirim dari:' : 'Diambil dari:'}}</b>
                                    <br>
                                    {{ $transaction->kode_spb }}
                                </div>
                            </div>
                            <div class="row section-desc-order">
                                <div class="col-md-6"> 
                                    @if ($transaction->metode_pengiriman == 'EXPEDITION')
                                        @foreach ($shippingAddress as $address)
                                            <span>
                                                <b>Dikirim ke:</b> 
                                                <br> 
                                                <u>{{ $address->nama }}</u> 
                                                <br>
                                                {{ $address->alamat }}
                                                <br>
                                                {{ $address->provinsi_nama }},
                                                {{ $address->kota_nama }}
                                                {{ $address->kecamatan_nama }}
                                                <br>
                                                {{ $address->kode_pos }}<br>
                                            </span>
                                        @endforeach
                                    @endif
                                </div>
                                
                                <div class="col-md-6">
                                    @if($transaction->status_transaksi != "TRANSFERRED" &&
                                    $transaction->status_transaksi != "PAYMENT CONFIRMED" &&
                                    $transaction->status_transaksi != "PACKED" &&
                                    $transaction->status_transaksi != "SHIPPED" &&
                                    $transaction->status_transaksi != "RECEIVED"
                                    )
                                        <a href="{{ route('transaction.change-status', [$transaction->id , 'TRANSFERRED']) }}" class="btn btn-success pull-right">Konfirmasi Pembayaran</a>
                                        <a href="{{ route('transaction.change-status', [$transaction->id , 'CANCELLED']) }}" class="btn btn-link pull-right">Batalkan Pesanan</a>
                                    @endif
                                </div>
                            </div>
                        </div>
                        {{-- progreess line --}}
                        <div class="col-md-3">
                            <div class="order-track">
                                <div title="17-08-2020" class="order-track-step enabled">
                                    <div class="order-track-status">
                                        <span class="order-track-status-dot"></span>
                                        <span class="order-track-status-line"></span>
                                    </div> 
                                    <div class="order-track-text">
                                        <span class="order-track-text-stat">Place Order</span>
                                    </div>
                                </div> 
                                <div title="" class="order-track-step 
                                    @if($transaction->status_transaksi == "TRANSFERRED" ||
                                        $transaction->status_transaksi == "PAYMENT CONFIRMED" ||
                                        $transaction->status_transaksi == "PACKED" ||
                                        $transaction->status_transaksi == "SHIPPED" ||
                                        $transaction->status_transaksi == "RECEIVED"
                                        ) enabled @endif">
                                    <div class="order-track-status">
                                        <span class="order-track-status-dot"></span> 
                                        <span class="order-track-status-line"></span>
                                    </div> 
                                    <div class="order-track-text">
                                        <span class="order-track-text-stat">Transfered</span>
                                    </div>
                                </div> 
                                <div title="" class="order-track-step 
                                    @if(
                                        $transaction->status_transaksi == "PAYMENT CONFIRMED" ||
                                        $transaction->status_transaksi == "PACKED" ||
                                        $transaction->status_transaksi == "SHIPPED" ||
                                        $transaction->status_transaksi == "RECEIVED"
                                        ) enabled @endif">
                                    <div class="order-track-status">
                                        <span class="order-track-status-dot"></span> 
                                        <span class="order-track-status-line"></span>
                                    </div> 
                                    <div class="order-track-text">
                                        <span class="order-track-text-stat">Payment Confirmed</span>
                                    </div>
                                </div> 
                                <div title="" class="order-track-step
                                    @if(
                                        $transaction->status_transaksi == "PACKED" ||
                                        $transaction->status_transaksi == "SHIPPED" ||
                                        $transaction->status_transaksi == "RECEIVED"
                                        ) enabled @endif">
                                    <div class="order-track-status">
                                        <span class="order-track-status-dot"></span> 
                                        <span class="order-track-status-line"></span>
                                    </div> 
                                    <div class="order-track-text">
                                        <span class="order-track-text-stat">Packed</span>
                                    </div>
                                </div> 
                                <div title="" class="order-track-step 
                                    @if(
                                        $transaction->status_transaksi == "SHIPPED" ||
                                        $transaction->status_transaksi == "RECEIVED"
                                        ) enabled @endif">
                                    <div class="order-track-status">
                                        <span class="order-track-status-dot"></span> 
                                        <span class="order-track-status-line"></span>
                                    </div> 
                                    <div class="order-track-text">
                                        <span class="order-track-text-stat">Shipped</span>
                                        {{-- <span class="order-track-text-sub">
                                            No. resi
                                            <b> 43243829442 </b>
                                        </span> --}}
                                    </div>
                                </div> 
                                <div title="" class="order-track-step
                                    @if($transaction->status_transaksi == "RECEIVED"
                                        ) enabled @endif">
                                    <div class="order-track-status">
                                        <span class="order-track-status-dot"></span> 
                                        <span class="order-track-status-line"></span>
                                    </div> 
                                    <div class="order-track-text">
                                        <span class="order-track-text-stat">Received</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>