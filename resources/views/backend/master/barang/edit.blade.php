@extends('adminlte::page')

@section('title', 'Edit Barang')

@section('content_header')
    <h1>Barang</h1>
@stop

@section('content')
    @include('flash::message')

    {!! Form::open([
        'url' => route('admin.barang.update', $barang->kode_barang),
        'method'=>'POST',
        'class'=>'form-horizontal',
        'id'=>'form-user'
    ]) !!}

<div class="card col-6">
    <div class="card-header">
        <h3 class="card-title">Edit Data Barang</h3>
    </div>
    <div class="card-body">
        <div class="form-group @if($errors->has('no_member')) has-error @endif">
            <label for="kode_barang" class="col-sm-12 control-label">Kode Barang</label>    
            <div class="col-sm-4">
                <input type="text" name="kode_barang" class="form-control" id="kode_barang" value="{{ $barang->kode_barang }}">
                @if($errors->has('kode_barang'))
                    <span class="text-danger">{{ $errors->first('kode_barang') }}</span>
                @endif
            </div>
        </div>
        <div class="form-group @if($errors->has('nama')) has-error @endif">
            <label for="nama" class="col-sm-12 control-label">Nama Barang</label>    
            <div class="col-sm-12">
                <input type="text" name="nama" class="form-control" id="nama" value="{{ $barang->nama }}">
                @if($errors->has('nama'))
                    <span class="text-danger">{{ $errors->first('nama') }}</span>
                @endif
            </div>
        </div>
        <div class="form-group @if($errors->has('jenis')) has-error @endif">
            <label for="jenis" class="col-sm-12 control-label">Jenis</label>    
            <div class="input-group col-sm-8">
                <select name="jenis" class="custom-select" id="inputGroupSelect04" aria-label="Example select with button addon">
                  <option value="{{ $barang->jenis }}">{{ $barang->jenis }}</option>
                  <option value="WHITENING" name="whitening" id="satuan">Whitening</option>
                  <option value="PURIFYING" name="purifying" id="satuan">Purifying</option>
                  <option value="OTHER" name="other" id="satuan">Other</option>
                  <option value="ACCESORIES" name="accesories" id="satuan">Accesories</option>
                </select>
              </div>
        </div>
        <div class="form-group @if($errors->has('poin')) has-error @endif">
            <label for="poin" class="col-sm-12 control-label">Poin</label>    
            <div class="col-sm-4">
                <input type="number" name="poin" class="form-control" id="poin" min="0" value="{{ $barang->poin }}">
                @if($errors->has('poin'))
                    <span class="text-danger">{{ $errors->first('poin') }}</span>
                @endif
            </div>
        </div>
        <div class="form-group row col-sm-12">
            <div class="form-group @if($errors->has('berat')) has-error @endif">
                <label for="berat" class="col-sm-12 control-label">Berat</label>    
                <div class="col-sm-12">
                    <input type="number" name="berat" class="form-control" id="berat" min="0" value="{{ $barang->berat }}">
                    @if($errors->has('berat'))
                        <span class="text-danger">{{ $errors->first('berat') }}</span>
                    @endif
                </div>
            </div>
            <div class="form-group @if($errors->has('satuan')) has-error @endif">
                <label for="satuan" class="col-sm-12 control-label">Satuan</label>    
                <div class="col-sm-12">
                    <input type="text" name="satuan" class="form-control" id="satuan" value="{{ $barang->satuan }}">
                    @if($errors->has('satuan'))
                        <span class="text-danger">{{ $errors->first('satuan') }}</span>
                    @endif
                </div>
            </div>
        </div>
        <div class="form-group row col-sm-12">
            <div class="form-group @if($errors->has('h_nomem')) has-error @endif">
                <label for="h_nomem" class="col-sm-12 control-label">Harga Katalog</label>    
                <div class="col-sm-12">
                    <input type="number" name="h_nomem" class="form-control" id="h_nomem" min="0" value="{{ $barang->h_nomem }}">
                    @if($errors->has('h_nomem'))
                        <span class="text-danger">{{ $errors->first('h_nomem') }}</span>
                    @endif
                </div>
            </div>
            <div class="form-group @if($errors->has('h_member')) has-error @endif">
                <label for="h_member" class="col-sm-12 control-label">Harga Member</label>    
                <div class="col-sm-12">
                    <input type="number" name="h_member" class="form-control" id="h_member" min="0" value="{{ $barang->h_member }}">
                    @if($errors->has('h_member'))
                        <span class="text-danger">{{ $errors->first('h_member') }}</span>
                    @endif
                </div>
            </div>
        </div>
        <div class="form-group @if($errors->has('deskripsi')) has-error @endif">
            <label for="deskripsi" class="col-sm-12 control-label">Deskripsi</label>    
            <div class="col-sm-12">
                <input name="deskripsi" class="form-control form-control-lg" id="deskripsi" value="{{ $barang->deskripsi }}">
                @if($errors->has('deskripsi'))
                    <span class="text-danger">{{ $errors->first('deskripsi') }}</span>
                @endif
            </div>
        </div>
        <div class="form-group @if($errors->has('cara_pakai')) has-error @endif">
            <label for="cara_pakai" class="col-sm-12 control-label">Cara pakai</label>    
            <div class="col-sm-12">
                <input name="cara_pakai" class="form-control form-control-lg" id="cara_pakai" value="{{ $barang->cara_pakai }}">
                @if($errors->has('cara_pakai'))
                    <span class="text-danger">{{ $errors->first('cara_pakai') }}</span>
                @endif
            </div>
        </div>
    </div>
    <div class="card-footer">
        <button type="submit" class="btn btn-info">Simpan</button>
        <a href="{{ route("admin.barang.index") }}" class="btn btn-default float-right">Cancel</a>
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
