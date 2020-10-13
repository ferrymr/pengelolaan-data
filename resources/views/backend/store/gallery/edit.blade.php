@extends('adminlte::page')

@section('title', 'Edit Gallery')

@section('content_header')
    <h1>Gallery</h1>
@stop

@section('content')
    @include('flash::message')

    {!! Form::open([
        'url' => route('admin.gallery.update', $gallery->id),
        'method'=>'POST',
        'class'=>'form-horizontal',
        'id'=>'form-user'
    ]) !!}

<div class="row">
    <div class="col">
        <div class="card-header">
            <h3 class="card-title">Edit Data Gallery</h3>
        </div>
        <div class="card-body">
            {{ csrf_field() }}
            <div class="form-group @if($errors->has('no_member')) has-error @endif">
                <label for="kategori" class="col-sm-12 control-label">Kategori</label>    
                <div class="col-sm-4">
                    <input type="text" name="kategori" class="form-control" id="kategori" value="{{ $gallery->kategori }}">
                    @if($errors->has('kategori'))
                        <span class="text-danger">{{ $errors->first('kategori') }}</span>
                    @endif
                </div>
            </div>
            <div class="form-group @if($errors->has('no_member')) has-error @endif">
                <label for="nama_produk" class="col-sm-12 control-label">Nama Produk</label>    
                <div class="col-sm-8">
                    <input type="text" name="nama_produk" class="form-control" id="nama_produk" value="{{ $gallery->nama_produk }}">
                    @if($errors->has('nama_produk'))
                        <span class="text-danger">{{ $errors->first('nama_produk') }}</span>
                    @endif
                </div>
            </div>
            <div class="form-group @if($errors->has('no_member')) has-error @endif">
                <label for="jenis" class="col-sm-12 control-label">Jenis</label>    
                <div class="col-sm-4">
                    <input type="text" name="jenis" class="form-control" id="jenis" value="{{ $gallery->jenis }}">
                    @if($errors->has('jenis'))
                        <span class="text-danger">{{ $errors->first('jenis') }}</span>
                    @endif
                </div>
            </div>
        </div>
        <div class="card-footer">
            <button type="submit" class="btn btn-info">Simpan</button>
            <a href="{{ route("admin.gallery.index") }}" class="btn btn-default float-right">Cancel</a>
        </div>
    </div>
    <div class="col">
        <div class="form-group @if($errors->has('no_member')) has-error @endif">
            <img  src="{{ storage_path('app/public/product') }}/{{ $gallery->gambar  }}" class="img-fluid thumbnail" style="max-height: 50px;">
        </div>
       
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