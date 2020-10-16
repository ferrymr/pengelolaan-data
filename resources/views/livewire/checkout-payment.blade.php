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
                            Checkout - Pembayaran
                        </span>
                    </li>
                </ul>
            </div>

            {{-- main content --}}
            <div class="row">
                <div class="main-content-cart main-content col-sm-12">
                    <div class="payment-method-form checkout-form">
                    <div class="row">

                        {{-- left side --}}
                        <div class="col-md-8">
                            <h3 class="title-form">Metode pembayaran</h3>
                            
                            <div class="row">
                                <div class="col-md-12" style="margin-top:10px">
                                    <label class="text">Methode Pembayaran <span style="color:red;">*</span></label><br>
                                    <select tabindex="1" class="input-text select2" disabled>
                                        <option value="" disabled="disabled" selected="selected">Bank Transfer</option>
                                    </select>
                                    <p class="text-muted" style="margin-top:10px;">
                                        <span style="color:red;">*</span> 
                                        Maaf saat ini metode pembayaran hanya melalui bank transfer
                                    </p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6" style="margin-top:10px">
                                    <label class="text">Bank Account</label>
                                    <select wire:model="selectedBank" tabindex="1" class="input-text select2" style="width: 100%;">
                                        <option value="" disabled="disabled" selected="selected">Pilih Bank</option>
                                        @foreach ($bankList as $bank)
                                            <option value="{{ $bank }}">{{ $bank }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            
                        </div>

                        {{-- right side --}}
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
                                            </button><br>
                                            {{ !$inputsValid ? '* Silahkan lengkapi form metode pembayaran' : '' }}
                                        </div>
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

@section('scripts')
    <script>
        $(document).ready(function() {
            // activate select2
            // $(".select2").select2();
        });
    </script>
@endsection