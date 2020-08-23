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
                        <form action="{{ route('address.store')}}" method="post">
                            @csrf
                            <div class="col-md-6 col-md-offset-3 col-sm-12">
                                <div class="form-address" style="margin-bottom: 32px">
                                    <div class="col-12">
                                        <label class="text">Name</label> 
                                        <input type="text" id="nama" name="nama" class="input-text" style="width: 100%;">
                                    </div>
                                    <div class="col-12" style="margin-top:16px">
                                        <label class="text">Phone</label> 
                                        <input type="text" id="telepon" name="telepon" class="input-text" style="width: 100%;">
                                    </div>
                                    <div class="col-12" style="margin-top:16px">
                                        <label for="provinsi">Select Province</label>
                                        <select class="form-control" id="provinsi" name="provinsi">
                                            <option value="">-- Pilih Provinsi --</option>
                                            @foreach($daftarProvinsi as $provinsi)
                                                <option value="{{ $provinsi['province_id'] }}">{{ $provinsi['province'] }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-12" style="margin-top:16px">
                                        <label for="kota">Select City</label>
                                        <select class="form-control" id="kota" name="kota">
                                            <option value=""> -- Pilih Kota -- </option>
                                        </select>
                                    </div>
                                    <div class="col-12" style="margin-top:16px">
                                        <label for="kecamatan">Select Subdistrict</label>
                                        <select class="form-control" id="kecamatan" name="kecamatan">
                                            <option value=""> -- Pilih Kecamatan -- </option>
                                        </select>
                                    </div>
                                    <div class="col-12" style="margin-top:16px">
                                        <label class="text">Address</label> 
                                        <textarea id="exampleFormControlTextarea1" name="alamat" rows="3" class="input-text"></textarea>
                                    </div>
                                    <div class="col-12" style="margin-top:16px">
                                        <label class="text">Post Code</label> 
                                        <input type="text" name="kode_pos" class="input-text" style="width: 100%;">
                                    </div>
                                    <button type="submit" class="button" style="margin-top: 2rem">Add Address</button>
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

                        console.log(result);
                        
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