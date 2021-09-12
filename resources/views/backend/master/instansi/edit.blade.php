@extends('adminlte::page')

@section('title', 'Edit Instansi')

@section('content_header')
    <h1>Edit Instansi</h1>
@stop

@section('content')
    @include('flash::message')

    {!! Form::open([
        'url' => route('admin.instansi.update', $currentInstansi->id),
        'method'=>'POST',
        'class'=>'form-horizontal',
        'id'=>'form-instansi-update'
    ]) !!}

    <div class="card col-12">
        <div class="card-header">
            <h3 class="card-title">Edit Instansi</h3>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="form-group col-sm-6 @if($errors->has('no_pelanggan')) has-error @endif">
                    <label for="no_pelanggan" class="col-sm-12 control-label">ID Pelanggan *</label>
                    <div class="col-sm-12">
                        <input type="no_pelanggan" name="no_pelanggan" value="{{ $currentInstansi->no_pelanggan }}" class="form-control" id="no_pelanggan" placeholder="ID Pelanggan">
                        @if($errors->has('no_pelanggan'))
                            <span class="text-danger">{{ $errors->first('no_pelanggan') }}</span>
                        @endif
                    </div>
                </div>
                <div class="form-group col-sm-6 @if($errors->has('nama_instansi')) has-error @endif">
                    <label for="nama_instansi" class="col-sm-12 control-label">Instansi *</label>
                    <div class="col-sm-12">
                        <input type="nama_instansi" name="nama_instansi" value="{{ $currentInstansi->nama_instansi }}" class="form-control" id="nama_instansi" placeholder="Instansi">
                        @if($errors->has('nama_instansi'))
                            <span class="text-danger">{{ $errors->first('nama_instansi') }}</span>
                        @endif
                    </div>
                </div>
            </div>
        </div>

        <div class="card-footer">
            <button type="submit" class="btn btn-info">Simpan</button>
            <a href="{{ route("admin.instansi.index") }}" class="btn btn-default float-right">Cancel</a>
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
        })
    </script>
@stop
