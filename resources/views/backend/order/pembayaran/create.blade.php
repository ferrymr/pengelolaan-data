@extends('adminlte::page')

@section('title', 'Tambah Pembayaran')

@section('content_header')
    <h1>Tambah Pembayaran</h1>
@stop

@section('content')
    @include('flash::message')

    {!! Form::open([
        'url' => route('admin.pembayaran.store'),
        'method'=>'POST',
        'class'=>'form-horizontal',
        'enctype' => 'multipart/form-data',
        'id'=>'form-pembayaran'
    ]) !!}

    <div class="card col-12">
        <div class="card-header">
            <h3 class="card-title">Tambah Pembayaran</h3>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="form-group col-sm-6 @if($errors->has('jenis_layanan')) has-error @endif">
                    <label for="no_pelanggan" class="col-sm-12 control-label">ID Pelanggan *</label>
                    <div class="col-sm-12">
                        <select name="id_instansi" id="no_pelanggan" class="select2" style="width:100%" required>
                            <option disabled selected>Pilih Salah Satu</option>
                            @foreach ($instansi as $item )
                            <option value="{{ $item->id }}">{{ $item->no_pelanggan }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                {{-- <div class="form-group col-sm-6 @if($errors->has('no_pelanggan')) has-error @endif">
                <label for="no_pelanggan" class="col-sm-12 control-label">ID Pelanggan *</label>
                <div class="col-sm-12">
                        <input type="text" name="id_instansi" class="form-control" id="no_pelanggan" placeholder="ID Pelanggan" required>
                        @if($errors->has('no_pelanggan'))
                            <span class="text-danger">{{ $errors->first('no_pelanggan') }}</span>
                        @endif
                    </div>
                </div> --}}
                <div class="form-group col-sm-6 @if($errors->has('tgl_pembayaran')) has-error @endif">
                    <label for="tgl_pembayaran" class="col-sm-12 control-label">Tanggal Pembayaran *</label>
                    <div class="col-sm-12">
                        <input type="date" name="tgl_pembayaran" class="form-control" id="tgl_pembayaran" placeholder="Tanggal Pembayaran">
                        @if($errors->has('tgl_pembayaran'))
                            <span class="text-danger">{{ $errors->first('tgl_pembayaran') }}</span>
                        @endif
                    </div>
                </div>
                {{-- <div class="form-group col-sm-6 @if($errors->has('nama_instansi')) has-error @endif">
                    <label for="id_instansi" class="col-sm-12 control-label">Instansi *</label>
                    <div class="col-sm-12">
                        <input type="text" name="id_instansi" class="form-control" id="nama_instansi" placeholder="Instansi" readonly="true" required>
                        @if($errors->has('nama_instansi'))
                            <span class="text-danger">{{ $errors->first('nama_instansi') }}</span>
                        @endif
                    </div>
                </div> --}}
            </div>

            <div class="row">
                <div class="form-group col-sm-6 @if($errors->has('total_mbps')) has-error @endif">
                    <label for="total_mbps" class="col-sm-12 control-label">Total Mbps *</label>
                    <div class="col-sm-12">
                        <input type="number" name="total_mbps" class="form-control" id="total_mbps" placeholder="Total Mbps">
                        @if($errors->has('total_mbps'))
                            <span class="text-danger">{{ $errors->first('total_mbps') }}</span>
                        @endif
                    </div>
                </div>
                <div class="form-group col-sm-6 @if($errors->has('nominal_pembayaran')) has-error @endif">
                    <label for="nominal_pembayaran" class="col-sm-12 control-label">Nominal Pembayaran *</label>
                    <div class="col-sm-12">
                        <input type="number" name="nominal_pembayaran" class="form-control" id="nominal_pembayaran" placeholder="Nominal Pembayaran">
                        @if($errors->has('nominal_pembayaran'))
                            <span class="text-danger">{{ $errors->first('nominal_pembayaran') }}</span>
                        @endif
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="form-group col-sm-6 @if($errors->has('jenis_layanan')) has-error @endif">
                    <label for="jenis_layanan" class="col-sm-12 control-label">Jenis Layanan *</label>
                    <div class="col-sm-12">
                        <select name="id_jenis_layanan" id="jenis_layanan" class="select2" style="width:100%" required>
                            <option disabled selected>Pilih Salah Satu</option>
                            @foreach ($layanan as $item )
                            <option value="{{ $item->id }}">{{ $item->jenis_layanan }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group col-sm-6 @if($errors->has('status')) has-error @endif">
                    <label for="status" class="col-sm-12 control-label">Status Pembayaran *</label>
                    <div class="col-sm-12">
                        <select name="status" id="status" class="select2" style="width:100%" required>
                            <option disabled selected>Pilih Salah Satu</option>
                            <option value="Lunas">Lunas</option>
                            <option value="Belum Lunas">Belum Lunas</option>
                        </select>
                    </div>
                </div>
        </div>
        <div class="row">
            <div class="form-group col-sm-6 @if($errors->has('photo')) has-error @endif">
                <label for="photo" class="col-sm-12 control-label">Bukti Transfer *</label>
                <div class="col-sm-12">
                    <input type="file" name="photo" class="form-control" id="photo" placeholder="Bukti Transfer" accept="image/*">
                    @if($errors->has('photo'))
                        <span class="text-danger">{{ $errors->first('photo') }}</span>
                    @endif
                </div>
            </div>
        </div>
        </div>

        <div class="card-footer">
            <button type="submit" class="btn btn-info">Simpan</button>
            <a href="{{ route("admin.pembayaran.index") }}" class="btn btn-default float-right">Cancel</a>
        </div>
    </div>

    {!! Form::close() !!}
@stop

@section('js')
    <script>
        // select2
        $('.select2').select2();

        // date picker
        $('.datepicker').datepicker({
            format: 'dd/mm/yyyy',
            autoclose: true
        });
    
        var delay = (function () {
        var timer = 0;
        return function (callback, ms) {
            clearTimeout(timer);
            timer = setTimeout(callback, ms);
        };
        })();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $("#no_pelanggan").keyup(function () {
            delay(function () {
                var no_pelanggan = $("#no_pelanggan").val();
                $.ajax({
                    url: "{{ route('admin.pembayaran.get.nama') }}",
                    method:'GET',
                    data:"no_pelanggan="+no_pelanggan ,
                success: function(data){

                        $('#nama_instansi').val(data.nama_instansi);

                }});
            }, 1000);
        });
    </script>
@stop
