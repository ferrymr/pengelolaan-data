@extends('adminlte::page')

@section('title', 'Tambah Barang')

@section('content_header')
    <h1>Tambah Barang</h1>
@stop

@section('content')
    @include('flash::message')

    {!! Form::open([
        'url' => route('admin.barang.store'),
        'method'=>'POST',
        'class'=>'form-horizontal',
        'id'=>'form-user'
    ]) !!}

<div class="card col-6">
    <div class="card-header">
        <h3 class="card-title">Tambah Barang</h3>
    </div>
    <div class="card-body">
        <div class="form-group @if($errors->has('no_member')) has-error @endif">
            <label for="kode_barang" class="col-sm-12 control-label">Kode Barang</label>    
            <div class="col-sm-4">
                <input type="text" name="kode_barang" class="form-control" id="kode_barang" placeholder="kode barang" required>
                @if($errors->has('kode_barang'))
                    <span class="text-danger">{{ $errors->first('kode_barang') }}</span>
                @endif
            </div>
        </div>
        <div class="form-group @if($errors->has('nama')) has-error @endif">
            <label for="nama" class="col-sm-12 control-label">Nama Barang</label>    
            <div class="col-sm-12">
                <input type="text" name="nama" class="form-control" id="nama" placeholder="nama barang" required>
                @if($errors->has('nama'))
                    <span class="text-danger">{{ $errors->first('nama') }}</span>
                @endif
            </div>
        </div>
        <div class="form-group @if($errors->has('jenis')) has-error @endif">
            <label for="jenis" class="col-sm-12 control-label">Jenis</label>    
            <div class="col-sm-8">
                <input type="text" name="jenis" class="form-control" id="jenis" placeholder="jenis">
                @if($errors->has('jenis'))
                    <span class="text-danger">{{ $errors->first('jenis') }}</span>
                @endif
            </div>
        </div>
        <div class="form-group row col-sm-12">
            <div class="form-group @if($errors->has('stok')) has-error @endif">
                <label for="stok" class="col-sm-12 control-label">Jumlah</label>    
                <div class="col-sm-6">
                    <input type="number" name="stok" class="form-control" id="stok" placeholder="jumlah" disabled>
                    @if($errors->has('stok'))
                        <span class="text-danger">{{ $errors->first('stok') }}</span>
                    @endif
                </div>
            </div>
            <div class="form-group @if($errors->has('poin')) has-error @endif">
                <label for="poin" class="col-sm-12 control-label">Poin</label>    
                <div class="col-sm-6">
                    <input type="number" name="poin" class="form-control" id="poin" placeholder="poin" required>
                    @if($errors->has('poin'))
                        <span class="text-danger">{{ $errors->first('poin') }}</span>
                    @endif
                </div>
            </div>
        </div>
        <div class="form-group row col-sm-12">
            <div class="form-group @if($errors->has('h_hpb')) has-error @endif">
                <label for="h_hpb" class="col-sm-12 control-label">H_hpb</label>    
                <div class="col-sm-12">
                    <input type="number" name="h_hpb" class="form-control" id="h_hpb" placeholder="h_hpb" required>
                    @if($errors->has('h_hpb'))
                        <span class="text-danger">{{ $errors->first('h_hpb') }}</span>
                    @endif
                </div>
            </div>
            <div class="form-group @if($errors->has('h_ppnj')) has-error @endif">
                <label for="h_ppnj" class="col-sm-12 control-label">H_ppnj</label>    
                <div class="col-sm-12">
                    <input type="number" name="h_ppnj" class="form-control" id="h_ppnj" placeholder="h_ppnj" required>
                    @if($errors->has('h_ppnj'))
                        <span class="text-danger">{{ $errors->first('h_ppnj') }}</span>
                    @endif
                </div>
            </div>
        </div>
        <div class="form-group row col-sm-12">
            <div class="form-group @if($errors->has('h_nomem')) has-error @endif">
                <label for="h_nomem" class="col-sm-12 control-label">Katalog</label>    
                <div class="col-sm-12">
                    <input type="number" name="h_nomem" class="form-control" id="h_nomem" placeholder="katalog">
                    @if($errors->has('h_nomem'))
                        <span class="text-danger">{{ $errors->first('h_nomem') }}</span>
                    @endif
                </div>
            </div>
            <div class="form-group @if($errors->has('h_member')) has-error @endif">
                <label for="h_member" class="col-sm-12 control-label">H_Member</label>    
                <div class="col-sm-12">
                    <input type="number" name="h_member" class="form-control" id="h_member" placeholder="harga member">
                    @if($errors->has('h_member'))
                        <span class="text-danger">{{ $errors->first('h_member') }}</span>
                    @endif
                </div>
            </div>
        </div>
        <div class="form-group row col-sm-12">
            <div class="form-group @if($errors->has('h_beli')) has-error @endif">
                <label for="h_beli" class="col-sm-12 control-label">H_Beli</label>    
                <div class="col-sm-12">
                    <input type="number" name="h_beli" class="form-control" id="h_beli" placeholder="h_beli" required>
                    @if($errors->has('h_beli'))
                        <span class="text-danger">{{ $errors->first('h_beli') }}</span>
                    @endif
                </div>
            </div>
            <div class="form-group @if($errors->has('h_ppnb')) has-error @endif">
                <label for="h_ppnb" class="col-sm-12 control-label">H_Ppnb</label>    
                <div class="col-sm-12">
                    <input type="number" name="h_ppnb" class="form-control" id="h_ppnb" placeholder="h_ppnb" required>
                    @if($errors->has('h_ppnb'))
                        <span class="text-danger">{{ $errors->first('h_ppnb') }}</span>
                    @endif
                </div>
            </div>
        </div>
        
        <div class="form-group @if($errors->has('h_hpp')) has-error @endif">
            <label for="h_hpp" class="col-sm-12 control-label">Hpp</label>    
            <div class="col-sm-6">
                <input type="number" name="h_hpp" class="form-control" id="h_hpp" placeholder="h_hpp">
                @if($errors->has('h_hpp'))
                    <span class="text-danger">{{ $errors->first('h_hpp') }}</span>
                @endif
            </div>
        </div>
        <div class="form-group row col-sm-12">
            <div class="form-group @if($errors->has('berat')) has-error @endif">
                <label for="berat" class="col-sm-12 control-label">Berat</label>    
                <div class="col-sm-12">
                    <input type="number" name="berat" class="form-control" id="berat" placeholder="berat">
                    @if($errors->has('berat'))
                        <span class="text-danger">{{ $errors->first('berat') }}</span>
                    @endif
                </div>
            </div>
            <div class="form-group @if($errors->has('satuan')) has-error @endif">
                <label for="satuan" class="col-sm-12 control-label">Satuan</label>    
                <div class="col-sm-12">
                    <input type="text" name="satuan" class="form-control" id="satuan" placeholder="Kg/gram">
                    @if($errors->has('satuan'))
                        <span class="text-danger">{{ $errors->first('satuan') }}</span>
                    @endif
                </div>
            </div>
        </div>
        
        <div class="form-group @if($errors->has('bpom')) has-error @endif">
            <label for="bpom" class="col-sm-12 control-label">BPOM</label>    
            <div class="col-sm-6">
                <input type="number" name="bpom" class="form-control" id="bpom" placeholder="bpom" required>
                @if($errors->has('bpom'))
                    <span class="text-danger">{{ $errors->first('bpom') }}</span>
                @endif
            </div>
        </div>
        <div class="form-group @if($errors->has('tgl_eks')) has-error @endif">
            <label for="tgl_eks" class="col-sm-12 control-label">Tgl Exp</label>    
            <div class="col-sm-6">
                <input type="date" name="tgl_eks" class="form-control" id="tgl_eks" placeholder="tgl_exp" required>
                @if($errors->has('tgl_eks'))
                    <span class="text-danger">{{ $errors->first('tgl_eks') }}</span>
                @endif
            </div>
        </div>
        <div class="form-group row col-sm-12">
            <div class="form-group @if($errors->has('stats')) has-error @endif">
                <label for="stats" class="col-sm-12 control-label">Stats</label>    
                <div class="col-sm-12">
                    <input type="text" name="stats" class="form-control" id="stats" placeholder="stats" required>
                    @if($errors->has('stats'))
                        <span class="text-danger">{{ $errors->first('stats') }}</span>
                    @endif
                </div>
            </div>
            <div class="form-group @if($errors->has('stok_his')) has-error @endif">
                <label for="stok_his" class="col-sm-12 control-label">Stok_his</label>    
                <div class="col-sm-12">
                    <input type="number" name="stok_his" class="form-control" id="stok_his" placeholder="stok_his" required>
                    @if($errors->has('stok_his'))
                        <span class="text-danger">{{ $errors->first('stok_his') }}</span>
                    @endif
                </div>
            </div>
        </div>
        <div class="form-group row col-sm-12">
            <div class="form-group @if($errors->has('log_his')) has-error @endif">
                <label for="log_his" class="col-sm-12 control-label">Log_his</label>    
                <div class="col-sm-12">
                    <input type="text" name="log_his" class="form-control" id="log_his" placeholder="log_his" required>
                    @if($errors->has('log_his'))
                        <span class="text-danger">{{ $errors->first('log_his') }}</span>
                    @endif
                </div>
            </div>
            <div class="form-group @if($errors->has('pic')) has-error @endif">
                <label for="pic" class="col-sm-12 control-label">Pic</label>    
                <div class="col-sm-12">
                    <input type="text" name="pic" class="form-control" id="pic" placeholder="pic" required>
                    @if($errors->has('pic'))
                        <span class="text-danger">{{ $errors->first('pic') }}</span>
                    @endif
                </div>
            </div>
        </div>
        <div class="form-group row col-sm-12">
            <div class="form-group @if($errors->has('cat')) has-error @endif">
                <label for="cat" class="col-sm-12 control-label">Category</label>    
                <div class="col-sm-12">
                    <input type="number" name="cat" class="form-control" id="cat" placeholder="cat" required>
                    @if($errors->has('cat'))
                        <span class="text-danger">{{ $errors->first('cat') }}</span>
                    @endif
                </div>
            </div>
            <div class="form-group @if($errors->has('diskon')) has-error @endif">
                <label for="diskon" class="col-sm-12 control-label">Diskon</label>    
                <div class="col-sm-12">
                    <input type="number" name="diskon" class="form-control" id="diskon" placeholder="diskon" required>
                    @if($errors->has('diskon'))
                        <span class="text-danger">{{ $errors->first('diskon') }}</span>
                    @endif
                </div>
            </div>
        </div>
        <div class="form-group @if($errors->has('deskripsi')) has-error @endif">
            <label for="deskripsi" class="col-sm-12 control-label">Deskripsi</label>    
            <div class="col-sm-12">
                <textarea name="deskripsi" class="form-control" id="deskripsi" placeholder="deskripsi"></textarea>
                @if($errors->has('deskripsi'))
                    <span class="text-danger">{{ $errors->first('deskripsi') }}</span>
                @endif
            </div>
        </div>
        <div class="form-group @if($errors->has('cara_pakai')) has-error @endif">
            <label for="cara_pakai" class="col-sm-12 control-label">Cara pakai</label>    
            <div class="col-sm-12">
                <textarea name="cara_pakai" class="form-control" id="cara_pakai" placeholder="cara_pakai"></textarea>
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
