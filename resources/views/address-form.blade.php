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
                        <div class="col-md-6 col-md-offset-3 col-sm-12">
                            {{-- IF SOMETHING WRONG HAPPENED --}}
                            @if ($errors->any())
                                <x-alert type="danger" :message="$errors"/>
                            @endif
                        </div>
                        <form action="{{ route('address.store')}}" method="post">
                            @csrf
                            <div class="col-md-6 col-md-offset-3 col-sm-12">
                                <div class="form-address" style="margin-bottom: 32px">
                                    <div class="col-12">
                                        <label class="text">Name</label> 
                                        <input type="text" id="nama" name="nama" class="input-text {{ $errors->has('nama') ? 'is-invalid':'' }}" value="{{ old('nama') }}" style="width: 100%;">
                                    </div>
                                    <div class="col-12" style="margin-top:16px">
                                        <label class="text">Phone</label> 
                                        <input type="text" id="telepon" name="telepon" class="input-text {{ $errors->has('telepon') ? 'is-invalid':'' }}" value="{{ old('telepon') }}" style="width: 100%;">
                                    </div>

                                    <div class="col-12" style="margin-top:16px">
                                        <label for="provinsi">Pilih Provinsi</label>
                                        <select class="form-control @error('provinsi') is-invalid @enderror" id="provinsi" name="provinsi">
                                            <option value="" selected disabled>-- Pilih Provinsi --</option>
                                            @foreach($daftarProvinsi as $provinsi)
                                                <option value="{{ $provinsi->id }}">{{ $provinsi->name }}</option>
                                            @endforeach
                                        </select>
                                    </div> 
                                    
                                    <div class="col-12" style="margin-top:16px">
                                        <label for="kota">Pilih Kota</label>
                                        <select class="form-control @error('kota') is-invalid @enderror" id="kota" name="kota">
                                            <option value="" selected disabled> -- Pilih Kota -- </option>
                                        </select>
                                    </div>

                                    <div class="col-12" style="margin-top:16px">
                                        <label for="kecamatan">Pilih Kecamatan</label>
                                        <select class="form-control @error('kecamatan') is-invalid @enderror" id="kecamatan" name="kecamatan">
                                            <option value="" selected disabled> -- Pilih Kecamatan -- </option>
                                        </select>
                                    </div> 


                                    <div class="col-12" style="margin-top:16px">
                                        <label class="text">Address</label> 
                                        <textarea id="exampleFormControlTextarea1" name="alamat" rows="3" class="input-text {{ $errors->has('alamat') ? 'is-invalid':'' }}" value="{{ old('alamat') }}" ></textarea>
                                    </div>
                                    <div class="col-12" style="margin-top:16px">
                                        <label class="text">Post Code</label> 
                                        <input type="text" name="kode_pos" class="input-text {{ $errors->has('kode_pos') ? 'is-invalid':'' }}" value="{{ old('kode_pos') }}" style="width: 100%;">
                                    </div>
                                    <button type="submit" class="button" style="margin-top: 2rem">Tambah Alamat</button>
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

                        select.append('<option selected disabled>-- Pilih Kota --</option>');

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

                        console.log(result);
                        
                        var select = $('select[name=kecamatan]');

                        select.empty();

                        select.append('<option selected disabled>-- Pilih Kecamatan --</option>');

                        $.each(result.data,function(key, value) {
                            select.append('<option value=' + value.subdistrict_id + '>' + value.subdistrict_name + '</option>');
                        });
                    }
                });
            }); 
        });
    </script>
@endsection