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
                        <li class="trail-item trail-end active">Tambah alamat pengiriman</li>
                    </ul>
                </div>
            </div>
        </div>

        {{-- main content --}}
        <div class="row">

            {{-- side main --}}
            <div class="content-area col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="site-main">

                    <h3 class="custom_blog_title" style="margin-bottom:0px">#Address</h3>
                    <br>

                    <div class="customer_login">
                        <div class="row">

                            <div class="col-md-offset-2 col-lg-8 col-md-8 col-sm-12">
                                <div class="login-item">
                                    <h5 class="title-login">Tambahkan alamat</h5>
                                    <form action="{{ route('address.store')}}" method="post" class="register">
                                        @csrf

                                        {{-- print error --}}
                                        @if ($errors->any())
                                            <x-alert type="danger" :message="$errors"/>
                                        @endif

                                        <p class="form-row form-row-wide">
                                            <label class="text">Nama Lengkap <span style="color:red">*</span></label> 
                                            <input type="text" id="nama" name="nama" class="input-text {{ $errors->has('nama') ? 'is-invalid':'' }}" value="{{ old('nama') }}" required>
                                        </p>
                                        <p class="form-row form-row-wide">
                                            <label class="text">Telepon <span style="color:red">*</span></label> 
                                            <input type="text" id="telepon" name="telepon" class="input-text {{ $errors->has('telepon') ? 'is-invalid':'' }}" value="{{ old('telepon') }}" required>
                                        </p>
                                        <p class="form-row form-row-wide">
                                            <label for="provinsi">Provinsi <span style="color:red">*</span></label>
                                            <select class="form-control select2" id="provinsi" name="provinsi" {{ $errors->has('provinsi') ? 'is-invalid':'' }}" required>
                                                <option value="" selected disabled>Pilih Provinsi</option>
                                                @foreach($daftarProvinsi as $provinsi)
                                                    <option value="{{ $provinsi['province_id'] }}">{{ $provinsi['name'] }}</option>
                                                @endforeach
                                            </select>
                                        </p>
                                        <p class="form-row form-row-wide">
                                            <label for="kota">Kota <span style="color:red">*</span></label>
                                            <select class="form-control select2" id="kota" name="kota" {{ $errors->has('kota') ? 'is-invalid':'' }}" required>
                                                <option value="" selected disabled>Pilih Kota</option>
                                            </select>
                                        </p>
                                        <p class="form-row form-row-wide">
                                            <label for="kecamatan">Kecamatan <span style="color:red">*</span></label>
                                            <select class="form-control select2" id="kecamatan" name="kecamatan" {{ $errors->has('kecamatan') ? 'is-invalid':'' }}" required>
                                                <option value="" selected disabled>Pilih Kecamatan</option>
                                            </select>
                                        </p>
                                        <p class="form-row form-row-wide">
                                            <label class="text">Alamat Lengkap <span style="color:red">*</span></label> 
                                            <textarea  name="alamat" 
                                                        rows="3" 
                                                        class="input-text {{ $errors->has('alamat') ? 'is-invalid':'' }}" 
                                                        value="{{ old('alamat') }}" required></textarea>
                                        </p>
                                        <p class="form-row form-row-wide">
                                            <label class="text">Kodepos</label> 
                                            <input type="text" 
                                                name="kode_pos" 
                                                class="input-text {{ $errors->has('kode_pos') ? 'is-invalid':'' }}" 
                                                value="{{ old('kode_pos') }}">
                                        </p>
                                        <p class="">
                                            <input type="submit" class="button-submit" value="Tambah Alamat">
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
            $(".select2").select2();

            $('select[name=provinsi]').change(function() {

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

                        select.append('<option selected disabled>Pilih Kota</option>');

                        $.each(result.data,function(key, value) {
                            select.append('<option value=' + value.city_id + '>' + value.city_name + '</option>');
                        });
                    }
                });
            });

            $('select[name=kota]').change(function() {

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

                        select.append('<option selected disabled>Pilih Kecamatan</option>');

                        $.each(result.data,function(key, value) {
                            select.append('<option value=' + value.subdistrict_id + '>' + value.subdistrict_name + '</option>');
                        });
                    }
                });
            });
        });
    </script>
@endsection