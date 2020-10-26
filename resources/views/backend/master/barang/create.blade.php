@extends('adminlte::page')

@section('title', 'Tambah Barang')

@section('content_header')
    <h1>Barang</h1>
@stop

@section('content')
    @include('flash::message')

    {!! Form::open([
        'url' => route('admin.barang.store'),
        'method'=>'POST',
        'class'=>'form-horizontal',
        'id'=>'form-user'
    ]) !!}

    <div class="card col-12">
        <div class="card-header">
            <h3 class="card-title">Tambah Data Barang</h3>
        </div>
        <div class="card-body">
            <div class="form-group row col-sm-12">
                <div class="form-group @if($errors->has('unit')) has-error @endif">
                    <label for="unit" class="col-sm-12 control-label">Unit</label>    
                    <div class="col-sm-12">
                        <select name="unit" class="form-control select2">
                            <option value="" selected>Pilih unit</option>
                            <option value="PIECES">PIECES</option>
                            <option value="SERIES">SERIES</option>
                        </select>
                    </div>
                </div>
                <div class="form-group @if($errors->has('no_member')) has-error @endif">
                    <label for="kode_barang" class="col-sm-12 control-label">Kode</label>    
                    <div class="col-sm-12">
                        <input value="{{ old('kode_barang') }}" type="text" name="kode_barang" class="form-control" id="kode_barang" placeholder="Kode" required>
                        @if($errors->has('kode_barang'))
                            <span class="text-danger">{{ $errors->first('kode_barang') }}</span>
                        @endif
                    </div>
                </div>
            </div>
            <div class="form-group @if($errors->has('nama')) has-error @endif">
                <label for="nama" class="col-sm-12 control-label">Nama barang</label>    
                <div class="col-sm-8">
                    <input value="{{ old('nama') }}" type="text" name="nama" class="form-control" id="nama" placeholder="Nama barang" required>
                    @if($errors->has('nama'))
                        <span class="text-danger">{{ $errors->first('nama') }}</span>
                    @endif
                </div>
            </div>
            <div class="form-group @if($errors->has('tipe_kulit')) has-error @endif">
                <label for="tipe_kulit" class="col-sm-12 control-label">Tipe kulit</label>    
                <div class="input-group col-sm-6">
                    <select name="tipe_kulit" class="custom-select select2">
                        <option value="" selected>Pilih tipe kulit</option>
                        <option value="OILY">Oily</option>
                        <option value="NORMAL">Normal</option>                  
                        <option value="DRY">Dry</option>
                        <option value="COMBINATION">Combination</option>
                        <option value="SENSITIVE">Sensitive</option>
                        <option value="OTHER">Other</option>
                    </select>
                </div>
            </div>
            <div class="form-group @if($errors->has('jenis')) has-error @endif">
                <label for="jenis" class="col-sm-12 control-label">Jenis barang</label>    
                <div class="input-group col-sm-6">
                    <select name="jenis" class="custom-select select2">
                    <option value="" selected>Pilih jenis barang</option>
                    <option value="WHITENING">Whitening</option>
                    <option value="PURIFYING">Purifying</option>                  
                    <option value="ACCESORIES">Accesories</option>
                    <option value="OTHER">Other</option>
                    </select>
                </div>
            </div>
            <div class="form-group row col-sm-12">
                <div class="form-group @if($errors->has('berat')) has-error @endif">
                    <label for="berat" class="col-sm-12 control-label">Berat</label>    
                    <div class="col-sm-12">
                        <input value="{{ old('berat') }}" type="number" name="berat" class="form-control" id="berat" placeholder="Berat" min="0">
                        @if($errors->has('berat'))
                            <span class="text-danger">{{ $errors->first('berat') }}</span>
                        @endif
                    </div>
                </div>
                <div class="form-group @if($errors->has('satuan')) has-error @endif">
                    <label for="satuan" class="col-sm-12 control-label">Satuan berat</label>    
                    <div class="col-sm-12">
                        <select name="satuan" class="form-control select2">
                            <option value="" selected>Pilih satuan</option>
                            <option value="PCS">PCS</option>
                            <option value="GRAM">GRAM</option>
                        </select>
                    </div>
                </div>
                
            </div>
        </div>
        &nbsp;
        <div class="form-group @if($errors->has('tgl_eks')) has-error @endif">
            {{-- <label for="tgl_eks" class="col-sm-12 control-label">Tanggal Expired</label>    
            <div class="col-sm-6">
                <input type="date" name="tgl_eks" class="form-control" id="tgl_eks" placeholder="tgl_exp">
                @if($errors->has('tgl_eks'))
                    <span class="text-danger">{{ $errors->first('tgl_eks') }}</span>
                @endif
            </div> --}}
            
            <div class="form-group row col-sm-12">
                <div class="form-group @if($errors->has('h_nomem')) has-error @endif">
                    <label for="h_nomem" class="col-sm-12 control-label">Harga katalog (non member)</label>    
                    <div class="col-sm-12">
                        <input value="{{ old('h_nomem') }}" type="number" name="h_nomem" class="form-control" id="h_nomem" placeholder="Harga katalog" min="0">
                        @if($errors->has('h_nomem'))
                            <span class="text-danger">{{ $errors->first('h_nomem') }}</span>
                        @endif
                    </div>
                </div>
                <div class="form-group @if($errors->has('h_member')) has-error @endif">
                    <label for="h_member" class="col-sm-12 control-label">Harga member</label>    
                    <div class="col-sm-12">
                        <input value="{{ old('h_member') }}" type="number" name="h_member" class="form-control" id="h_member" placeholder="Harga member" min="0">
                        @if($errors->has('h_member'))
                            <span class="text-danger">{{ $errors->first('h_member') }}</span>
                        @endif
                    </div>
                </div>
            </div>
            <div class="form-grup @if($errors->has('bpom')) has-error @endif">
                <div class="col-sm-6">
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" name="bpom" id="bpom" value="1">
                        <label class="custom-control-label" for="bpom">BPOM</label>
                    </div>
                </div>
            </div>
            <br>
            <div class="form-group @if($errors->has('tgl_eks')) has-error @endif">
                <label for="tgl_eks" class="col-sm-12 control-label">Tanggal expired</label>    
                <div class="col-sm-6">
                    <input value="{{ old('tgl_eks') }}" type="text" name="tgl_eks" class="form-control datepicker" id="tgl_exp" placeholder="Tanggal expired" required>
                    @if($errors->has('tgl_eks'))
                        <span class="text-danger">{{ $errors->first('tgl_eks') }}</span>
                    @endif
                </div>
            </div>
            <div class="form-group @if($errors->has('deskripsi')) has-error @endif">
                <label for="deskripsi" class="col-sm-12 control-label">Deskripsi</label>    
                <div class="col-sm-12">
                    <textarea name="deskripsi" class="form-control ckeditor" id="deskripsi" placeholder="Deskripsi">{{ old('deskripsi') }}</textarea>
                    @if($errors->has('deskripsi'))
                        <span class="text-danger">{{ $errors->first('deskripsi') }}</span>
                    @endif
                </div>
            </div>
            <div class="form-group @if($errors->has('cara_pakai')) has-error @endif">
                <label for="cara_pakai" class="col-sm-12 control-label">Cara pakai</label>    
                <div class="col-sm-12">
                    <textarea name="cara_pakai" class="form-control ckeditor" id="cara_pakai" placeholder="Cara pakai">{{ old('cara_pakai') }}</textarea>
                    @if($errors->has('cara_pakai'))
                        <span class="text-danger">{{ $errors->first('cara_pakai') }}</span>
                    @endif
                </div>
            </div>
            <div class="form-grup @if($errors->has('stats')) has-error @endif">
                <div class="col-sm-6">
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" name="stats" value="1" id="stats">
                        <label class="custom-control-label" for="stats">Publish barang ini ?</label>
                    </div>
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



@section('js')
    <script>
       
        // select2
        $('.select2').select2();

        // date picker
        $('.datepicker').datepicker({
            format: 'yyyy/mm/dd',
            autoclose: true
        })

        $(document).ready(function () {
            $('.ckeditor').ckeditor();
        });
    </script>
@stop
