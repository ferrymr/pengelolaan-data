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
                            Checkout - Pengiriman
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
                            <h3 class="title-form">Metode pengiriman</h3>

                            @include('flash::message')

                            {{-- print error --}}
                            @if ($errors->any())
                                <x-alert type="danger" :message="$errors"/>
                            @endif

                            <div class="row">
                                <div class="col-md-6" style="margin-top:16px">
                                    <label class="text">Lokasi Stockist</label>
                                    <select wire:model="selectedSpb" tabindex="1" class="input-text" style="width: 100%;">
                                        <option value="" disabled="disabled" selected="selected">Pilih Lokasi Stockist</option> 
                                        @foreach ($spbList as $spb)
                                            <option value="{{ $spb['code'] }}" {{ $spb['disabled'] }}>{{ $spb['city_name'] }} - {{ $spb['subdistrict_name'] }}</option>
                                        @endforeach
                                    </select>
                                    <div wire:loading>
                                        <div id="loading">
                                            <img id="loading-image" src="{{ asset('assets/images/loader.gif') }}" alt="Loading..." />
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6" style="margin-top:16px">
                                    <label class="text">Metode pengiriman</label>
                                    <div>
                                        <input type="radio" wire:model="shippingMethod" {{ !$selectedSpb ? 'disabled' : '' }} name="shipping_method" id="expedition" value="EXPEDITION" style="margin-right: 5px;">
                                        <label for="expedition" style="margin-right: 10px;">Via Kurir</label>
                                        <input type="radio" wire:model="shippingMethod" {{ !$selectedSpb ? 'disabled' : '' }} name="shipping_method" id="immediate" value="IMMEDIATE" style="margin-right: 5px;">
                                        <label for="immediate" style="margin-right: 10px;">Ambil di Tempat</label>
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
                                        <option value="" disabled="disabled" selected="selected">Pilih Jasa Pengiriman</option> 
                                        <option value="JNE">JNE</option>
                                        <option value="JNT">JNT</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-8" style="margin-top: 16px">
                                    <label for="deliverto" style="font-weight: bold">Dikirim ke alamat:</label>
                                    @if($defaultShippingAddress)
                                        <div class="payment-method-form checkout-form" style="padding: 18px 0px 0px 27px">
                                            <div class="body-address">
                                                <p class="receiver-name">
                                                    <b>Penerima:</b> {{ $defaultShippingAddress->nama }}<br>
                                                    <b>Telepon:</b> {{ $defaultShippingAddress->telepon }}<br>
                                                    <b>Alamat:</b> {{ $defaultShippingAddress->alamat }}
                                                </p>
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
                                    <p> * Untuk dropship, anda bisa menambahkan alamat baru disini</p>
                                    {{-- <a class="button btn-pay-now" href="{{ route('address.index') }}">Tambah alamat</a> --}}
                                    <button class="button btn-pay-now"                                    
                                            {{-- wire:click = "resetAddressInputFields"  --}}
                                            data-toggle="modal" 
                                            data-target="#tambahAlamat">
                                        Tambah alamat
                                    </button>
                                    <button class="button btn-pay-now"                                    
                                            {{-- wire:click = "resetAddressInputFields"  --}}
                                            data-toggle="modal" 
                                            data-target="#pilihAlamat">
                                        Pilih alamat lainnya
                                    </button>
                                </div>
                            </div>
                            @endif
                        </div>

                        {{-- modal pilih alamat --}}
                        <div wire:ignore.self class="modal fade" id="pilihAlamat" tabindex="-1" role="dialog" aria-labelledby="pilihAlamatLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <h5 class="modal-title" id="pilihAlamatLabel">Pilih alamat lainnya</h5>
                                            </div>
                                            <div class="col-md-6">
                                                <button type="button" class="close pull-right" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-body">
                                        <form wire:submit.prevent="saveSelectAddress" class="register">
                                            @csrf
    
                                            {{-- print error --}}
                                            @if ($errors->any())
                                                <x-alert type="danger" :message="$errors"/>
                                            @endif
    
                                            <p class="form-row form-row-wide">
                                                <label for="alamatTujuan">Alamat tujuan <span style="color:red">*</span></label>
                                                    <select class="form-control select2 {{ $errors->has('alamatTujuan') ? 'is-invalid':'' }}" 
                                                            wire:model = "alamatTujuan"
                                                            id="alamatTujuan" 
                                                            name="alamatTujuan" 
                                                            required>
                                                        <option value="" selected>Pilih Alamat</option>
                                                        @foreach($daftaralamatTujuan as $alamatTujuan)
                                                            <option value="{{ $alamatTujuan->id }}">{{ $alamatTujuan->nama . " - " . $alamatTujuan->alamat }}</option>
                                                        @endforeach
                                                    </select>
                                                @error('alamatTujuan') <span class="error">{{ $message }}</span> @enderror
                                            </p>
                                        </form>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                                        <button type="button" wire:click.prevent="saveSelectAddress()" class="btn btn-submit" data-dismiss="modal">
                                            Jadikan alamat sebagai default
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        {{-- modal tambah alamat --}}
                        <div wire:ignore.self class="modal fade" id="tambahAlamat" tabindex="-1" role="dialog" aria-labelledby="tambahAlamatLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <h5 class="modal-title" id="tambahAlamatLabel">Tambah alamat</h5>
                                            </div>
                                            <div class="col-md-6">
                                                <button type="button" class="close pull-right" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-body">
                                        <form wire:submit.prevent="saveNewAddress" class="register">
                                            @csrf
    
                                            {{-- print error --}}
                                            @if ($errors->any())
                                                <x-alert type="danger" :message="$errors"/>
                                            @endif
    
                                            <p class="form-row form-row-wide">
                                                <label class="text">Nama Lengkap <span style="color:red">*</span></label> 
                                                <input style="width:100%" 
                                                        wire:model = "nama"
                                                        type="text" 
                                                        id="nama" 
                                                        name="nama" 
                                                        class="input-text {{ $errors->has('nama') ? 'is-invalid':'' }}" 
                                                        value="{{ old('nama') }}" 
                                                        required>
                                                @error('nama') <span class="error">{{ $message }}</span> @enderror
                                            </p>
                                            <p class="form-row form-row-wide">
                                                <label class="text">Telepon <span style="color:red">*</span></label> 
                                                <input style="width:100%"
                                                        wire:model = "telepon"
                                                        type="tel" 
                                                        placeholder="Contoh: 085642274427" 
                                                        id="telepon" 
                                                        name="telepon" 
                                                        class="input-text {{ $errors->has('telepon') ? 'is-invalid':'' }}" 
                                                        value="{{ old('telepon') }}" 
                                                        required>
                                                @error('telepon') <span class="error">{{ $message }}</span> @enderror
                                            </p>
                                            <p class="form-row form-row-wide">
                                                <label for="provinsi">Provinsi <span style="color:red">*</span></label>
                                                    <select class="form-control select2 {{ $errors->has('provinsi') ? 'is-invalid':'' }}" 
                                                            wire:model = "provinsi"
                                                            id="provinsi" 
                                                            name="provinsi" 
                                                            required>
                                                        <option value="" selected>Pilih Provinsi</option>
                                                        @foreach($daftarProvinsi as $provinsi)
                                                            <option value="{{ $provinsi['province_id'] }}">{{ $provinsi['name'] }}</option>
                                                        @endforeach
                                                    </select>
                                                @error('provinsi') <span class="error">{{ $message }}</span> @enderror
                                            </p>
                                            @if($listKota != null)
                                                <p class="form-row form-row-wide" id="block-kota">
                                                    <label for="kota">Kota <span style="color:red">*</span></label>
                                                    
                                                    <select class="form-control select2 {{ $errors->has('kota') ? 'is-invalid':'' }}" 
                                                            wire:model = "kota"
                                                            id="kota" 
                                                            name="kota" 
                                                            required>
                                                        <option value="" selected>Pilih Kota</option>
                                                        @foreach($listKota as $city)
                                                            <option value="{{ $city->city_id }}">{{ $city->type . " " . $city->name }}</option>
                                                        @endforeach
                                                    </select>

                                                    @error('kota') <span class="error">{{ $message }}</span> @enderror
                                                </p>
                                            @endif
                                            @if($listKecamatan != null)
                                                <p class="form-row form-row-wide" id="block-kecamatan">
                                                    <label for="kecamatan">Kecamatan <span style="color:red">*</span></label>
                                                    <select class="form-control select2 {{ $errors->has('kecamatan') ? 'is-invalid':'' }}" 
                                                            wire:model = "kecamatan"
                                                            id="kecamatan" 
                                                            name="kecamatan" required>
                                                        <option value="" selected>Pilih Kecamatan</option>
                                                        @foreach($listKecamatan as $kec)
                                                            <option value="{{ $kec->subdistrict_id }}">{{ $kec->type . " " . $kec->name }}</option>
                                                        @endforeach
                                                    </select>
                                                    @error('kecamatan') <span class="error">{{ $message }}</span> @enderror
                                                </p>
                                            @endif
                                            <p class="form-row form-row-wide">
                                                <label class="text">Alamat Lengkap <span style="color:red">*</span></label> 
                                                <textarea  name="alamat" 
                                                            wire:model = "alamat"
                                                            rows="3" 
                                                            class="input-text {{ $errors->has('alamat') ? 'is-invalid':'' }}" 
                                                            value="{{ old('alamat') }}" required></textarea>
                                                @error('alamat') <span class="error">{{ $message }}</span> @enderror
                                            </p>
                                            <p class="form-row form-row-wide">
                                                <label class="text">Kodepos</label> 
                                                <input style="width:100%"
                                                        wire:model = "kode_pos"
                                                        type="text" 
                                                        name="kode_pos" 
                                                        class="input-text {{ $errors->has('kode_pos') ? 'is-invalid':'' }}" 
                                                        value="{{ old('kode_pos') }}">
                                                @error('kode_pos') <span class="error">{{ $message }}</span> @enderror
                                            </p>
                                        </form>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                                        <button type="button" wire:click.prevent="saveNewAddress()" class="btn btn-submit" data-dismiss="modal">
                                            Tambah Alamat & Jadikan Default
                                        </button>
                                    </div>
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
                                            <button {{ !$inputsValid ? 'disabled' : '' }} wire:click="gotoCheckoutPayment" class="btn-checkout-cart">
                                                <span>Pilih Pembayaran</span>
                                            </button>
                                            <br>
                                            {{ !$inputsValid ? '* Silahkan melengkapi form metode pengiriman' : '' }}
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
    </main>
</div>
<br>
<br>