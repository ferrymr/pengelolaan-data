@extends('adminlte::page')

@section('title', 'Edit Supplier')

@section('content_header')
    <h1>Supplier</h1>
@stop

@section('content')
    @include('flash::message')

    {!! Form::open([
        'url' => route('admin.supplier.update', $supplier->kode_supp),
        'method'=>'POST',
        'class'=>'form-horizontal',
        'id'=>'form-user'
    ]) !!}

<div class="card col-6">
    <div class="card-header">
        <h3 class="card-title">Edit Data Supplier</h3>
    </div>
    <div class="card-body">
        <div class="form-group @if($errors->has('kode_supp')) has-error @endif">
            <label for="kode_supp" class="col-sm-12 control-label">Kode Supplier</label>    
            <div class="col-sm-4">
                <input type="text" name="kode_supp" class="form-control" id="kode_supp" value="{{ $supplier->kode_supp }}">
                @if($errors->has('kode_supp'))
                    <span class="text-danger">{{ $errors->first('kode_supp') }}</span>
                @endif
            </div>
        </div>
        <div class="form-group @if($errors->has('nama')) has-error @endif">
            <label for="nama" class="col-sm-12 control-label">Nama Supplier</label>    
            <div class="col-sm-8">
                <input type="text" name="nama" class="form-control" id="nama" value="{{ $supplier->nama }}">
                @if($errors->has('nama'))
                    <span class="text-danger">{{ $errors->first('nama') }}</span>
                @endif
            </div>
        </div>
        <div class="form-group @if($errors->has('alamat')) has-error @endif">
            <label for="alamat" class="col-sm-12 control-label">Alamat Supplier</label>    
            <div class="col-sm-12">
                <input type="text" name="alamat" class="form-control" id="alamat" value="{{ $supplier->alamat }}">
                @if($errors->has('alamat'))
                    <span class="text-danger">{{ $errors->first('alamat') }}</span>
                @endif
            </div>
        </div>
        <div class="form-group @if($errors->has('kota')) has-error @endif">
            <label for="kota" class="col-sm-12 control-label">Kota</label>    
            <div class="col-sm-4">
                <input type="text" name="kota" class="form-control" id="kota" value="{{ $supplier->kota }}">
                @if($errors->has('kota'))
                    <span class="text-danger">{{ $errors->first('kota') }}</span>
                @endif
            </div>
        </div>
        <div class="form-group @if($errors->has('pos')) has-error @endif">
            <label for="pos" class="col-sm-12 control-label">Kode Pos</label>    
            <div class="col-sm-4">
                <input type="text" name="pos" class="form-control" id="pos" value="{{ $supplier->pos }}">
                @if($errors->has('pos'))
                    <span class="text-danger">{{ $errors->first('pos') }}</span>
                @endif
            </div>
        </div>
        <div class="form-group @if($errors->has('telp')) has-error @endif">
            <label for="telp" class="col-sm-12 control-label">Telepon</label>    
            <div class="col-sm-4">
                <input type="text" name="telp" class="form-control" id="telp" value="{{ $supplier->telp }}">
                @if($errors->has('telp'))
                    <span class="text-danger">{{ $errors->first('telp') }}</span>
                @endif
            </div>
        </div>
        <div class="form-group @if($errors->has('email')) has-error @endif">
            <label for="email" class="col-sm-12 control-label">Email</label>    
            <div class="col-sm-8">
                <input type="text" name="email" class="form-control" id="email" value="{{ $supplier->email }}">
                @if($errors->has('email'))
                    <span class="text-danger">{{ $errors->first('email') }}</span>
                @endif
            </div>
        </div>
    </div>
    <div class="card-footer">
        <button type="submit" class="btn btn-info">Simpan</button>
        <a href="{{ route("admin.supplier.index") }}" class="btn btn-default float-right">Cancel</a>
    </div>
</div>


{!! Form::close() !!}
@stop

@section('css')

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
    