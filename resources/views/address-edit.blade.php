@extends('layouts.app')

@section('content')

<!-- wrap main content -->
<div class="site-content">
    <main class="site-main  main-container no-sidebar">
        <div class="container">

            <!-- breadcrumb -->
            <div class="col-md-6 col-md-offset-3 col-sm-12 breadcrumb-trail breadcrumbs">
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
                                Setting
                            </span>
                        </a>
                    </li>
                    <li class="trail-item trail-end active">
                        <span>
                            Address
                        </span>
                    </li>
                </ul>
            </div>
            <!-- main content -->
            <div class="row">
                <div class="main-content-cart main-content col-sm-12">
                    <div class="row">
                        <form action="{{ route('address.update', $shipping->id) }}" method="post">
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

                            <div class="col-md-6 col-md-offset-3 col-sm-12">
                                <div class="form-address" style="margin-bottom: 32px">
                                    <div class="col-12">
                                        <label class="text">Name</label> 
                                        <input type="text" 
                                               id="nama" 
                                               name="nama" 
                                               value="{{ old('nama') ? old('nama') : $shipping->nama }}" 
                                               class="input-text {{ $errors->has('nama') ? 'is-invalid':'' }}"  
                                               style="width: 100%;"/>
                                    </div>
                                    <div class="col-12" style="margin-top:16px">
                                        <label class="text">Phone</label> 
                                        <input type="text" 
                                               id="telepon"
                                               name="telepon" 
                                               value="{{ old('telepon') ? old('telepon') : $shipping->telepon }}" 
                                               class="input-text {{ $errors->has('telepon') ? 'is-invalid':'' }}" 
                                               style="width: 100%;">
                                    </div>
                                    <div class="col-12" style="margin-top:16px">
                                        <label for="provinsi">Select Province</label>
                                        <select class="form-control"  name="provinsi">
                                            @foreach($daftarProvinsi as $provinsi)
                                                <option {{  ($provinsi['province_id']==$shipping->provinsi_id) ? 'selected':'' }} value="{{ $provinsi['province_id'] }}">{{ $provinsi['province'] }}</option>
                                            @endforeach
                                        </select>
                                        @error('provinsi') <div class="text-muted">{{ $errors }}</div> @enderror
                                    </div>
                                    <div class="col-12" style="margin-top:16px">
                                        <label for="kota">Select City</label>
                                        <select class="form-control"  name="kota">
                                            @foreach($daftarKota as $kota)
                                                <option {{  ($kota['city_id']==$shipping->kota_id) ? 'selected':'' }} value="{{ $kota['city_id'] }}">{{ $kota['city_name'] }}</option>
                                            @endforeach
                                        </select>
                                        @error('kota') <div class="text-muted">{{ $errors }}</div> @enderror
                                    </div>
                                    <div class="col-12" style="margin-top:16px">
                                        <label for="kecamatan">Select Subdistrict</label>
                                        <select class="form-control"  name="kecamatan">
                                            @foreach($daftarKecamatan as $kecamatan)
                                                <option {{  ($kecamatan['subdistrict_id']==$shipping->kecamatan_id) ? 'selected':'' }} value="{{ $kecamatan['subdistrict_id'] }}">{{ $kecamatan['subdistrict_name'] }}</option>
                                            @endforeach
                                        </select>
                                        @error('kecamatan') <div class="text-muted">{{ $errors }}</div> @enderror
                                    </div>
                                    <div class="col-12" style="margin-top:16px">
                                        <label class="text">Address</label> 
                                        <textarea id="alamat" 
                                                  name="alamat" rows="3" 
                                                  class="input-text">{{ old('alamat') ? old('alamat') : $shipping->alamat }}
                                        </textarea>
                                    </div>
                                    <div class="col-12" style="margin-top:16px">
                                        <label class="text">Post Code</label> 
                                        <input type="text" 
                                               name="kode_pos" 
                                               id="kode_pos" 
                                               value="{{ old('kode_pos') ? old('kode_pos') : $shipping->kode_pos }}" 
                                               class="input-text  {{ $errors->has('kode_pos') ? 'is-invalid':'' }}" style="width: 100%;">
                                    </div>
                                    <button type="submit" class="button" style="margin-top: 2rem">Update Address</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main>
</div>
@endsection

@section('scripts')
    <script>
        $(function() {
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