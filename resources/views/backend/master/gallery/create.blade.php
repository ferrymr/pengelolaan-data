@extends('adminlte::page')

@section('title', 'Tambah Gallery')

@section('content_header')
    <h1>Gallery</h1>
@stop

@section('content')
    @include('flash::message')

    {!! Form::open([
        'url' => route('admin.gallery.store'),
        'method'=>'POST',
        'class'=>'form-horizontal',
        'id'=>'form-user',
        'enctype'=>'multipart/form-data'
    ]) !!}

<div class="card col-6">
    <div class="card-header">
        <h3 class="card-title">Tambah Data</h3>
    </div>
<div class="card-body">
    {{ csrf_field() }}
    <div class="form-group @if($errors->has('kategori')) has-error @endif">
        <label for="kategori" class="col-sm-12 control-label">Kategori</label>    
        <div class="col-sm-4">
            <input type="text" name="kategori" class="form-control" id="kategori" placeholder="kategori">
            @if($errors->has('kategori'))
                <span class="text-danger">{{ $errors->first('kategori') }}</span>
            @endif
        </div>
    </div>
    <div class="form-group @if($errors->has('nama_produk')) has-error @endif">
        <label for="nama_produk" class="col-sm-12 control-label">Nama Produk</label>    
        <div class="col-sm-8">
            <input type="text" name="nama_produk" class="form-control" id="nama_produk" placeholder="nama produk">
            @if($errors->has('nama_produk'))
                <span class="text-danger">{{ $errors->first('nama_produk') }}</span>
            @endif
        </div>
    </div>
    <div class="form-group @if($errors->has('jenis')) has-error @endif">
        <label for="jenis" class="col-sm-12 control-label">Jenis</label>    
        <div class="input-group col-sm-8">
            <select name="jenis" class="custom-select" id="inputGroupSelect04" aria-label="Example select with button addon">
              <option selected>pilih jenis</option>
              <option value="Satuan" name="satuan" id="satuan">satuan</option>
              <option value="Series" name="series" id="series">series</option>
            </select>
          </div>
    </div>
    <div class="form-group @if ($errors->has('')) has-error @endif">
        <label for="input_file" class="col-sm-12 control-label">Input Gambar</label>
        <div class="col-sm-4">
            <input type="file" name="gambar">
        </div>
    </div>
        
</div>   
    <div class="card-footer">
        <button type="submit" class="btn btn-info">Upload</button>
        <a href="{{ route("admin.gallery.index") }}" class="btn btn-default float-right">Cancel</a>
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
