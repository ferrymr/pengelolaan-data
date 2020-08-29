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
                        <a href="">
                            <span>
                                Profile
                            </span>
                        </a>
                    </li>
                    <li class="trail-item trail-begin">
                        <a href="">
                            <span>
                                History Transaction
                            </span>
                        </a>
                    </li>
                    <li class="trail-item trail-end active">
                        <span>
                            #transaction_id
                        </span>
                    </li>
                </ul>
            </div>
            
            <!-- main content -->
            <div class="row">
                <div class="main-content-cart main-content col-sm-12 detial-item-history">
                    <div class="row">
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
                                    <tr>
                                        <td class="item-order">
                                            <div class="row">
                                                <div class="col-md-2">
                                                    <img src="https://shop.bellezkin.com/api/public/assets/img/thumbnails/19010.jpg">
                                                </div>
                                                <div class="col-md-10">
                                                    WHITENING DAY SPRAY
                                                    <div>
                                                        <span>1 x</span> 
                                                        <span>IDR 154.000</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </td> 
                                        <td>IDR 154.000</td>
                                    </tr>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <td colspan="" align="right">
                                            <b>Shipping</b>
                                        </td> 
                                        <td>
                                            <b>IDR 19.000 / JNT</b>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="" align="right">
                                            <b>Unique Code</b>
                                        </td> 
                                        <td>
                                            <b>421</b>
                                        </td>
                                    </tr> 
                                    <tr>
                                        <td colspan="" align="right">
                                            <b>Grand total</b>
                                        </td> 
                                        <td>
                                            <b> IDR 173.421 </b>
                                        </td>
                                    </tr>
                                </tfoot>
                            </table>

                            <div class="row" style="margin-bottom: 1em;">
                                <div class="col-md-12"><b>Shipped from SPB:</b>
                                    <br>
                                SUKABUMI, Pabuaran
                                </div>
                            </div>
                            <div class="row section-desc-order">
                                <div class="col-md-9">
                                    <span>
                                        <b>Ship to:</b> 
                                        <br> 
                                        <u>ILMAN MANARUL QORI</u> 
                                        <br>
                                        fkdsajlfj a
                                        <br>
                                        Jawa Barat,
                                        Kota Bandung Kec.
                                        Batununggal
                                        <br>
                                        34324<br>
                                    </span>
                                </div> 
                                <div class="col-md-3 text-right" style="display: flex; flex-direction: column; justify-content: space-between;">
                                    <div>
                                        <button class="btn btn-link">Cancel Order</button>
                                    </div>
                                    <div>
                                        <button class="btn btn-success">Confirm payment</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- progreess line --}}
                        <div class="col-md-3">
                            <div class="order-track">
                                <div title="17-08-2020" class="order-track-step">
                                    <div class="order-track-status">
                                        <span class="order-track-status-dot"></span>
                                        <span class="order-track-status-line"></span>
                                    </div> 
                                    <div class="order-track-text">
                                        <span class="order-track-text-stat">Place Order</span>
                                    </div>
                                </div> 
                                <div title="" class="order-track-step disabled">
                                    <div class="order-track-status">
                                        <span class="order-track-status-dot"></span> 
                                        <span class="order-track-status-line"></span>
                                    </div> 
                                    <div class="order-track-text">
                                        <span class="order-track-text-stat">Transfered</span>
                                    </div>
                                </div> 
                                <div title="" class="order-track-step disabled">
                                    <div class="order-track-status">
                                        <span class="order-track-status-dot"></span> 
                                        <span class="order-track-status-line"></span>
                                    </div> 
                                    <div class="order-track-text">
                                        <span class="order-track-text-stat">Payment Confirmed</span>
                                    </div>
                                </div> 
                                <div title="" class="order-track-step disabled">
                                    <div class="order-track-status">
                                        <span class="order-track-status-dot"></span> 
                                        <span class="order-track-status-line"></span>
                                    </div> 
                                    <div class="order-track-text">
                                        <span class="order-track-text-stat">Packed</span>
                                    </div>
                                </div> 
                                <div title="" class="order-track-step disabled">
                                    <div class="order-track-status">
                                        <span class="order-track-status-dot"></span> 
                                        <span class="order-track-status-line"></span>
                                    </div> 
                                    <div class="order-track-text">
                                        <span class="order-track-text-stat">Shipped</span>
                                        <span class="order-track-text-sub">
                                            No. resi
                                            <b> 43243829442 </b>
                                        </span>
                                    </div>
                                </div> 
                                <div title="" class="order-track-step disabled">
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
@endsection

@section('scripts')
@endsection