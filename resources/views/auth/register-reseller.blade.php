{{-- from adminlte --}}
{{-- @extends('adminlte::auth.login') --}}

@extends('layouts.app')

@section('content')

{{-- wrap main content --}}
<div class="main-content main-content-login" style="margin-bottom:50px;">
    <div class="container">

        {{-- breadsrumb --}}
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb-trail breadcrumbs">
                    <ul class="trail-items breadcrumb">
                        <li class="trail-item trail-begin"><a href="index.html">Home</a></li>
                        <li class="trail-item trail-end active">Authentication</li>
                    </ul>
                </div>
            </div>
        </div>

        {{-- main content --}}
        <div class="row">

            {{-- side main --}}
            <div class="content-area col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="site-main">

                    <h3 class="custom_blog_title" style="margin-bottom:0px">#Register Reseller</h3>
                    <p>Daftar Reseller senilai 500ribu, gratis 1 produk series</p>
                    
                    @if (count($errors))  
                    <div class="alert alert-danger" role="alert">                       
                        <ul>
                            @foreach($errors->all() as $error) 
                                <li>{{ $error }}</li>
                            @endforeach 
                        </ul>
                    </div>
                    @endif 

                    <br>

                    <div class="customer_login">
                        <div class="row">

                            <div class="col-md-offset-1 col-lg-10 col-md-10 col-sm-12">
                                <div class="login-item">
                                    <h5 class="title-login">Registrasi sebagai reseller</h5>
                                    <form method="POST" action="{{ route('register') }}" class="register" enctype="multipart/form-data">
                                        @csrf

                                        <input type="hidden" name="code_aff_ref" value="{{ $ref_code }}">

                                        <div class="row">
                                            <div class="col-md-8">
                                                <p class="form-row form-row-wide">
                                                    <label class="text">Nama Lengkap</label>
                                                    <input type="text" placeholder="Nama Lengkap" name="name" value="{{ old('name') }}" class="input-text @error('name') is-invalid @enderror" required>
                                                </p>
                                            </div>
                                            <div class="col-md-4">
                                                <p class="form-row form-row-wide">
                                                    <label class="text">Tanggal Lahir</label>
                                                    <input type="date" placeholder="Tanggal Lahir (e.g 1990-12-30)" name="birthdate" value="{{ old('birthdate') }}" class="input-text @error('birthdate') is-invalid @enderror" required>
                                                </p>
                                            </div>
                                        </div>
                                        <hr>
                                        <h4>Alamat</h4>
                                        <p>Sesuai kartu tanda penduduk</p>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <p class="form-row form-row-wide">
                                                    <label class="text">Alamat tempat tinggal</label>
                                                    <input type="text" placeholder="Alamat Tempat Tinggal" name="address" value="{{ old('address') }}" class="input-text @error('address') is-invalid @enderror" required>
                                                </p>
                                            </div>
                                            <div class="col-md-4">
                                                <p class="form-row form-row-wide">
                                                    <label class="text">Propinsi</label>
                                                    <select class="form-control select2" id="provinsi" name="provinsi" {{ $errors->has('provinsi') ? 'is-invalid':'' }}" required>
                                                        <option value="" selected disabled>Pilih propinsi</option>
                                                        @foreach($daftarProvinsi as $provinsi)
                                                            <option value="{{ $provinsi['province_id'] }}">{{ $provinsi['name'] }}</option>
                                                        @endforeach
                                                    </select>
                                                </p>
                                            </div>
                                            <div class="col-md-4">
                                                <p class="form-row form-row-wide">
                                                    <label class="text">Kota</label>
                                                    <select class="form-control select2" id="kota" name="kota" {{ $errors->has('kota') ? 'is-invalid':'' }}" required>
                                                        <option value="" selected disabled>Pilih Kota</option>
                                                    </select>
                                                </p>
                                            </div>
                                            <div class="col-md-4">
                                                <p class="form-row form-row-wide">
                                                    <label class="text">Kecamatan</label>
                                                    <select class="form-control select2" id="kecamatan" name="kecamatan" {{ $errors->has('kecamatan') ? 'is-invalid':'' }}" required>
                                                        <option value="" selected disabled>Pilih Kecamatan</option>
                                                    </select>
                                                </p>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <p class="form-row form-row-wide">
                                                    <label class="text">Nomor Telepon</label>
                                                    <input type="number" placeholder="Nomor Whatsapp (e.g 081230000001)" name="phone" value="{{ old('phone') }}" class="input-text @error('phone') is-invalid @enderror" required>
                                                    <p>Verifikasi nomor melalui whatsapp</p>
                                                </p>
                                            </div>
                                            <div class="col-md-6">
                                                <p class="form-row form-row-wide">
                                                    <label class="text">Email</label>
                                                    <input type="email" placeholder="Alamat Email (e.g john@mail.com)" name="email" value="{{ old('email') }}" class="input-text @error('email') is-invalid @enderror" required>
                                                    <p>Gunakan email valid untuk verifikasi</p>
                                                </p>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <p class="form-row form-row-wide">
                                                    <label class="text">Enter Identity Number</label>
                                                    <input type="number" placeholder="Nomor Identitas" name="nik" value="{{ old('nik') }}" class="input-text @error('nik') is-invalid @enderror" required>
                                                    <p>Gunakan nomor kartu tanda penduduk</p>
                                                </p>
                                            </div>
                                            <div class="col-md-6">
                                                <p class="form-row form-row-wide">
                                                    <label class="text">Upload File KTP</label>
                                                    <input type="file" placeholder="Upload File KTP" name="file" value="{{ old('file') }}" class="input-text @error('file') is-invalid @enderror" required>
                                                    <p>Format file KTP jpg, jpeg atau png</p>
                                                </p>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <p class="form-row form-row-wide">
                                                    <label class="text">Bank type</label>
                                                    <select class="form-control select2" id="bank" name="bank" {{ $errors->has('bank') ? 'is-invalid':'' }}" required>
                                                        <option value="" selected>Pilih Kota</option>
                                                        <option value="BCA" selected>BCA</option>
                                                        <option value="BRI" selected>BRI</option>
                                                        <option value="BNI" selected>BNI</option>
                                                        <option value="MANDIRI" selected>MANDIRI</option>
                                                    </select>
                                                    <p>Jenis bank untuk transaksi</p>
                                                </p>
                                            </div>
                                            <div class="col-md-6">
                                                <p class="form-row form-row-wide">
                                                    <label class="text">Bank account</label>
                                                    <input type="number" placeholder="Nomor Rekening" name="bank_account" value="{{ old('bank_account') }}" class="input-text @error('bank_account') is-invalid @enderror" required>
                                                    <p>Masukan nomor rekening</p>
                                                </p>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <p class="form-row form-row-wide">
                                                    <label class="text">Password</label>
                                                    <input type="password" name="password" class="input-text @error('password') is-invalid @enderror" required>
                                                </p>
                                            </div>
                                            <div class="col-md-6">
                                                <p class="form-row form-row-wide">
                                                    <label class="text">Re-type Password</label>
                                                    <input type="password" name="password_confirmation" class="input-text" required>
                                                </p>
                                            </div>
                                        </div>
                                        <p class="form-row check-box-field">
                                            <span class="inline">
                                                <input type="checkbox" name="flag_reseller" id="reseller" checked readonly>
                                                <label for="reseller" class="label-text">Register sebagai <span>reseller</span></label>
                                            </span>
                                        </p>
                                        <p class="">
                                            <input type="submit" class="button-submit" value="REGISTER RESELLER">
                                        </p>
                                    </form>
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
    <script>
        $(function() {

            // activate select2
            $(".select2").select2({ width: 'resolve' });

            $('select[name=provinsi]').change(function() {

                $("#loading").show();

                $.ajax({
                    url: '{{ env('APP_API_URL') }}cities/' + $(this).val(),
                    type: 'GET',
                    headers: {
                        // 'Access-Control-Allow-Origin': '*',
                    },
                    crossDomain: true,
                    dataType: 'json',
                    success: function(result) {
                        var select = $('select[name=kota]');
                        select.empty();

                        // show kota
                        $("#block-kota").show();
                        $(".select2").select2({ width: 'resolve' });
                        select.append('<option selected disabled>Pilih Kota</option>');

                        $.each(result.data,function(key, value) {
                            select.append('<option value=' + value.city_id + '>' + value.city_name + '</option>');
                        });
                        
                        $("#loading").hide();
                    }
                });
            });

            $('select[name=kota]').change(function() {

                $("#loading").show();

                $.ajax({
                    url: '{{ env('APP_API_URL') }}subdistricts/' + $(this).val(),
                    type: 'GET',
                    headers: {
                        // 'Access-Control-Allow-Origin': '*',
                    },
                    crossDomain: true,
                    dataType: 'json',
                    success: function(result) {
                        
                        var select = $('select[name=kecamatan]');
                        select.empty();

                        // show kecamatan
                        $("#block-kecamatan").show();
                        $(".select2").select2({ width: 'resolve' });

                        select.append('<option selected disabled>Pilih Kecamatan</option>');

                        $.each(result.data,function(key, value) {
                            select.append('<option value=' + value.subdistrict_id + '>' + value.subdistrict_name + '</option>');
                        });

                        $("#loading").hide();
                    }
                });
            });
        });
    </script>
@endsection


