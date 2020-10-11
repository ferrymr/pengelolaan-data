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
                        <li class="trail-item trail-end active">Edit alamat pengiriman</li>
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
                                    <h5 class="title-login">Edit alamat</h5>
                                    <form action="{{ route('address.update', $shipping->id) }}" method="post" class="register">
                                        @method('put')
                                        @csrf

                                        @if ($errors->any())
                                            @alert(['type' => 'danger'])
                                                <ul>
                                                    @foreach ($errors->all() as $error)
                                                        <li> {{ $error }} </li>
                                                    @endforeach
                                                </ul>
                                            @endalert
                                        @endif

                                        <p class="form-row form-row-wide">
                                            <label class="text">Nama Lengkap <span style="color:red">*</span></label> 
                                            <input type="text" 
                                               id="nama" 
                                               name="nama" 
                                               value="{{ old('nama') ? old('nama') : $shipping->nama }}" 
                                               class="input-text {{ $errors->has('nama') ? 'is-invalid':'' }}"  
                                               style="width: 100%;"/>
                                        </p>
                                        <p class="form-row form-row-wide">
                                            <label class="text">Telepon <span style="color:red">*</span></label> 
                                            <input type="text" 
                                               id="telepon"
                                               name="telepon" 
                                               value="{{ old('telepon') ? old('telepon') : $shipping->telepon }}" 
                                               class="input-text {{ $errors->has('telepon') ? 'is-invalid':'' }}" 
                                               style="width: 100%;">
                                        </p>
                                        <p class="form-row form-row-wide">
                                            <label for="provinsi">Provinsi <span style="color:red">*</span></label>
                                            <select class="form-control select2"  name="provinsi">
                                                @foreach($daftarProvinsi as $provinsi)
                                                    <option {{  ($provinsi['province_id']==$shipping->provinsi_id) ? 'selected':'' }} value="{{ $provinsi['province_id'] }}">{{ $provinsi['name'] }}</option>
                                                @endforeach
                                            </select>
                                            @error('provinsi') <div class="text-muted">{{ $errors }}</div> @enderror
                                        </p>
                                        <p class="form-row form-row-wide">
                                            <label for="kota">Kota <span style="color:red">*</span></label>
                                            <select class="form-control select2"  name="kota">
                                                @foreach($daftarKota as $kota)
                                                    <option {{  ($kota->city_id == $shipping->kota_id) ? 'selected':'' }} value="{{ $kota->city_id }}">{{ $kota->type . ' '. $kota->name }}</option>
                                                @endforeach
                                            </select>
                                            @error('kota') <div class="text-muted">{{ $errors }}</div> @enderror
                                        </p>
                                        <p class="form-row form-row-wide">
                                            <label for="kecamatan">Kecamatan <span style="color:red">*</span></label>
                                            <select class="form-control select2"  name="kecamatan">
                                                @foreach($daftarKecamatan as $kecamatan)
                                                    <option {{  ($kecamatan->subdistrict_id == $shipping->kecamatan_id) ? 'selected':'' }} value="{{ $kecamatan->subdistrict_id }}">{{ $kecamatan->name }}</option>
                                                @endforeach
                                            </select>
                                            @error('kecamatan') <div class="text-muted">{{ $errors }}</div> @enderror
                                        </p>
                                        <p class="form-row form-row-wide">
                                            <label class="text">Alamat Lengkap <span style="color:red">*</span></label> 
                                            <textarea id="alamat" 
                                                  name="alamat" rows="3" 
                                                  class="input-text">{{ old('alamat') ? old('alamat') : $shipping->alamat }}></textarea>
                                        </p>
                                        <p class="form-row form-row-wide">
                                            <label class="text">Kodepos</label> 
                                            <input type="text" 
                                               name="kode_pos" 
                                               id="kode_pos" 
                                               value="{{ old('kode_pos') ? old('kode_pos') : $shipping->kode_pos }}" 
                                               class="input-text  {{ $errors->has('kode_pos') ? 'is-invalid':'' }}" style="width: 100%;">
                                        </p>
                                        <p class="">
                                            <input type="submit" class="button-submit" value="Update Alamat">
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

                        $.each(result.data,function(key, value) {
                            select.append('<option value=' + value.subdistrict_id + '>' + value.subdistrict_name + '</option>');
                        });
                    }
                });
            });
        });
    </script>
@endsection