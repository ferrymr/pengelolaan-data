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
                                {{ $transaction->no_do }}
                            </span>
                        </li>
                    </ul>
                </div>
            </div>            
            
            {{-- print error --}}
            @if ($errors->any())
                <x-alert type="danger" :message="$errors"/>
            @endif

            @include('flash::message')

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
                                                        <img src="{{ route('admin.barang.barang-image', $item->itemDetail->id) }}" 
                                                            alt="{{ $item->itemDetail->nama }}">
                                                    </div>
                                                    <div class="col-md-10">
                                                        {{ $item->itemDetail->nama }}
                                                        <div>
                                                            <span>{{ $item->jumlah }} x</span> 
                                                            <span>@currency($item->harga)</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td> 
                                            <td>@currency($item->total)</td>
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
                                    <b>{{ $transaction->spb->name }}</b>
                                    <br>
                                    {{ $transaction->spb->city_name }} - {{ $transaction->spb->subdistrict_name }}
                                </div>
                            </div>
                            <div class="row section-desc-order">
                                <div class="col-md-6"> 
                                    @if ($transaction->metode_pengiriman == 'EXPEDITION')
                                        <span>
                                            <b>Dikirim ke:</b> 
                                            <br> 
                                            <u>{{ $shippingAddress->nama }}</u> 
                                            <br>
                                            {{ $shippingAddress->alamat }}
                                            <br>
                                            {{ $shippingAddress->provinsi_nama }},
                                            {{ $shippingAddress->kota_nama }}
                                            {{ $shippingAddress->kecamatan_nama }}
                                            <br>
                                            {{ $shippingAddress->kode_pos }}<br>
                                        </span>
                                    @endif
                                </div>
                                
                                <div class="col-md-6">
                                    @if(($transaction->status_transaksi != "TRANSFERRED" &&
                                    $transaction->status_transaksi != "PAYMENT CONFIRMED" &&
                                    $transaction->status_transaksi != "PACKED" &&
                                    $transaction->status_transaksi != "SHIPPED" &&
                                    $transaction->status_transaksi != "RECEIVED") &&
                                    $status_transaksi != "TRANSFERRED"
                                    )
                                        {{-- todo ganti routing || {{ route('transaction.change-status', [$transaction->id , 'TRANSFERRED']) }}--}}
                                        <button class="btn btn-success pull-right"
                                                data-toggle="modal" 
                                                data-target="#konfirmasi">
                                            Konfirmasi Pembayaran
                                        </button>
                                        {{-- <a href="{{ route('transaction.change-status', [$transaction->id , 'CANCELLED']) }}" class="btn btn-link pull-right">Batalkan Pesanan</a> --}}
                                    @else
                                        <button class="btn btn-default pull-right">
                                            Anda sudah melakukan <b>konfirmasi pembayaran</b>
                                        </button>
                                    @endif
                                </div>
                            </div>
                        </div>

                        {{-- modal konfirmasi pembayaran --}}
                        <div wire:ignore.self class="modal fade" id="konfirmasi" tabindex="-1" role="dialog" aria-labelledby="konfirmasiPembayaran" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <h5 class="modal-title" id="konfirmasiPembayaran">Konfirmasi Pembayaran</h5>
                                            </div>
                                            <div class="col-md-6">
                                                <button type="button" class="close pull-right" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-body">
                                        <form wire:submit.prevent="saveConfirmation" class="register" enctype="multipart/form-data">
                                            @csrf
    
                                            {{-- print error --}}
                                            @if ($errors->any())
                                                <x-alert type="danger" :message="$errors"/>
                                            @endif
    
                                            <p class="form-row form-row-wide">
                                                <label class="text" style="width: 100%;">Bayar ke rekening <span style="color:red">*</span></label> 
                                                <select wire:model="selectedBank" name="bank" tabindex="1" class="input-text select2" style="width: 50%;">
                                                    <option value="" selected="selected">Pilih Bank</option>
                                                    @foreach ($bankList as $bank)
                                                        <option value="{{ $bank }}">{{ $bank }}</option>
                                                    @endforeach
                                                </select>
                                                @error('bank') <span class="error">{{ $message }}</span> @enderror
                                            </p>
                                            <p class="form-row form-row-wide">
                                                <label class="text" style="width: 100%;">Nomor rekening pengirim <span style="color:red">*</span></label> 
                                                <input style="width:70%" 
                                                        wire:model = "rekeningNumber"
                                                        type="number" 
                                                        id="rekening_number" 
                                                        name="rekening_number" 
                                                        class="input-text {{ $errors->has('rekening_number') ? 'is-invalid':'' }}" 
                                                        value="{{ old('rekening_number') }}" 
                                                        required>
                                                @error('rekening_number') <span class="error">{{ $message }}</span> @enderror
                                            </p>
                                            <p class="form-row form-row-wide">
                                                <label class="text">Nama rekening pengirim <span style="color:red">*</span></label> 
                                                <input style="width:100%" 
                                                        wire:model = "rekeningName"
                                                        type="text" 
                                                        id="rekening_name" 
                                                        name="rekening_name" 
                                                        class="input-text {{ $errors->has('rekening_name') ? 'is-invalid':'' }}" 
                                                        value="{{ old('rekening_name') }}" 
                                                        required>
                                                @error('rekening_name') <span class="error">{{ $message }}</span> @enderror
                                            </p>
                                            <p class="form-row form-row-wide">
                                                <label class="text">Upload bukti pengiriman <span style="color:red">*</span></label> 
                                                <input style="width:100%" 
                                                        wire:model = "filename"
                                                        type="file" 
                                                        id="filename" 
                                                        name="filename" 
                                                        class="input-text {{ $errors->has('filename') ? 'is-invalid':'' }}" 
                                                        value="{{ old('filename') }}" 
                                                        required>
                                                @error('filename') <span class="error">{{ $message }}</span> @enderror
                                            </p>
                                        </form>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                                        <button type="button" wire:click.prevent="saveConfirmation()" class="btn btn-submit" data-dismiss="modal">
                                            Confirm
                                        </button>
                                    </div>
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
                                        $transaction->status_transaksi == "RECEIVED" ||
                                        $status_transaksi == "TRANSFERRED"
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