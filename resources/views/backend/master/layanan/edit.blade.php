@extends('adminlte::page')

@section('title', 'Edit Jenis Layanan')

@section('content_header')
    <h1>Edit Jenis Layanan</h1>
@stop

@section('content')
    @include('flash::message')

    {!! Form::open([
        'url' => route('admin.layanan.update', $currentLayanan->id),
        'method'=>'POST',
        'class'=>'form-horizontal',
        'id'=>'form-layanan-update'
    ]) !!}

    <div class="card col-12">
        <div class="card-header">
            <h3 class="card-title">Edit Jenis Layanan</h3>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="form-group col-sm-6 @if($errors->has('jenis_layanan')) has-error @endif">
                    <label for="jenis_layanan" class="col-sm-12 control-label">Jenis Layanan *</label>
                    <div class="col-sm-12">
                        <input type="jenis_layanan" name="jenis_layanan" value="{{ $currentLayanan->jenis_layanan }}" class="form-control" id="jenis_layanan" placeholder="Jenis Layanan">
                        @if($errors->has('jenis_layanan'))
                            <span class="text-danger">{{ $errors->first('jenis_layanan') }}</span>
                        @endif
                    </div>
                </div>
            </div>
        </div>

        <div class="card-footer">
            <button type="submit" class="btn btn-info">Simpan</button>
            <a href="{{ route("admin.layanan.index") }}" class="btn btn-default float-right">Cancel</a>
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
