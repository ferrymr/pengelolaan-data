{{-- wrap main content --}}
<div class="site-content">
    <main class="site-main  main-container no-sidebar">
        <div class="container">

            {{-- breadcrumb --}}
            <div class="breadcrumb-trail breadcrumbs">
                <ul class="trail-items breadcrumb">
                    <li class="trail-item trail-begin">
                        <a href="{{ route('home') }}">
                            <span>
                                Home
                            </span>
                        </a>
                    </li>
                    <li class="trail-item trail-begin">
                        <a href="{{ route('mycart') }}">
                            <span>
                                My Cart
                            </span>
                        </a>
                    </li>
                    <li class="trail-item trail-end active">
                        <span>
                            Checkout
                        </span>
                    </li>
                </ul>
            </div>

            {{-- main content --}}
            <div class="row">
                <div class="main-content-cart main-content col-sm-12">
                    <div class="row">
                        <div class="col-md-8">

                            <div class="row">
                                <div class="col-md-6" style="margin-top:16px">
                                    <label class="text">Pilih Bank</label>
                                    <select wire:model="selectedBank" tabindex="1" class="input-text" style="width: 100%;">
                                        <option value="" disabled="disabled" selected="selected">-- Pilih Bank --</option>
                                        @foreach ($bankList as $bank)
                                            <option value="{{ $bank }}">{{ $bank }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6" style="margin-top:16px">
                                    <label class="text">Pilih Lokasi Stockist</label>
                                    <select wire:model="selectedSpb" tabindex="1" class="input-text" style="width: 100%;">
                                        <option value="" disabled="disabled" selected="selected">-- Pilih Lokasi Stockist --</option> 
                                        @foreach ($spbList as $spb)
                                            <option value="{{ $spb['code'] }}" {{ $spb['disabled'] }}>{{ $spb['city_name'] }} - {{ $spb['subdistrict_name'] }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6" style="margin-top:16px">
                                    <label class="text">Terima Barang Dari</label>
                                    <div>
                                        <input type="radio" wire:model="shippingMethod" {{ !$selectedSpb ? 'disabled' : '' }} name="shipping_method" id="expedition" value="EXPEDITION" style="margin-right: 5px;">
                                        <label for="expedition" style="margin-right: 10px;">Via Kurir</label>
                                        <input type="radio" wire:model="shippingMethod" {{ !$selectedSpb ? 'disabled' : '' }} name="shipping_method" id="immediate" value="IMMEDIATE" style="margin-right: 5px;">
                                        <label for="immediate" style="margin-right: 10px;">Ambil ke Tempat</label>
                                    </div>
                                </div>
                            </div>
                            @if($shippingMethod == "IMMEDIATE")
                                <div class="row">
                                    <div class="col-md-6" style="margin-top:16px">
                                        <label for="note" class="text">Note</label> 
                                        <textarea wire:model="note" id="note" rows="3" class="input-text"></textarea>
                                    </div>
                                </div>
                            @elseif($shippingMethod == "EXPEDITION")
                            <div class="row">
                                <div class="col-md-6" style="margin-top:16px">
                                    <label class="text">Pilih Kurir</label>
                                    <select wire:model="courier" {{ !$defaultShippingAddress ? 'disabled' : '' }} tabindex="1" class="input-text" style="width: 100%;">
                                        <option value="" disabled="disabled" selected="selected">-- Pilih Kurir --</option> 
                                        <option value="JNE">JNE</option>
                                        <option value="JNT">JNT</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6" style="margin-top: 16px">
                                    <label for="deliverto" style="font-weight: bold">Dikirim ke</label>
                                    @if($defaultShippingAddress)
                                    <div>
                                        <div class="header-address">
                                            <span>{{ $defaultShippingAddress->nama }}</span>
                                        </div>
                                        <div class="body-address">
                                            <p class="receiver-name">{{ $defaultShippingAddress->nama }}</p>
                                            <p class="receiver-phone">{{ $defaultShippingAddress->telepon }}</p>
                                            <p class="detail-address">{{ $defaultShippingAddress->alamat }}</p>
                                        </div>
                                    </div>
                                    @else
                                    <div class="header-address">
                                        <span class="text-danger">
                                            <b><i>Warning:</i></b> <br/>
                                            <i>Anda belum mengatur alamat pengiriman utama.</i> <br/>
                                            <i>Silahkan atur alamat pengiriman utama untuk dapat memilih kurir</i>
                                        </span>
                                    </div>
                                    @endif
                                    <a href="{{ route('address.index') }}">Ubah Alamat Utama</a>
                                </div>
                            </div>
                            @endif
                        </div>
                        <div class="col-md-4">
                            <div class="card-total-cart" id="card-cart">
                                <div>
                                    <div class="section-total">
                                        <span class="title-section-card"  style="margin-bottom: 1.8rem">Ringkasan Transaksi</span>
                                        <div class="d-flex justify-between">
                                            <div>Jumlah Barang</div>
                                            <div>{{ $totalItems }}pcs</div>
                                        </div>
                                        <div class="d-flex justify-between">
                                            <div>Total Berat</div>
                                            <div>{{ $totalBerat }}Kg</div>
                                        </div>
                                        @if($ongkosKirim)
                                        <div class="d-flex justify-between">
                                            <div>Ongkos Kirim</div>
                                            <div>@currency($ongkosKirim)</div>
                                        </div>
                                        @endif
                                        <div class="d-flex justify-between">
                                            <div>Subtotal</div>
                                            <div>@currency($subtotal)</div>
                                        </div>
                                        <div class="d-flex justify-between">
                                            <div>Kode Unik</div>
                                            <div>{{ $kodeUnik }}</div>
                                        </div>
                                        <hr>
                                        <div class="total-number">
                                            <div><b>Total Bayar</b></div>
                                            <div class="cost">@currency($totalBayar)</div>
                                        </div>
                                        <div class="section-button">
                                            <button {{ !$inputsValid ? 'disabled' : '' }} wire:click="saveTransaction" class="btn-checkout-cart">
                                                <span>Bayar Sekarang</span>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- full width layout have no sideba --}}

        </div>
    </main>
</div>
<br>
<br>