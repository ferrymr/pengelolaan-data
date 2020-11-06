@extends('adminlte::page')

@section('title', 'Detail Barang Spb')

@section('content_header')
    <h1>Barang SPB</h1>
@stop

@section('content')
    @include('flash::message')

    {!! Form::open([
        'url' => route('admin.barangspb.update', $barangspb->id),
        'method'=>'POST',
        'class'=>'form-horizontal',
        'id'=>'form-user'
    ]) !!}
        <div class="card col-12">
            <div class="card-header">
                <h3 class="card-title">Detail Barang</h3>
            </div>
            <div class="card-body">
                <div class="form-group @if($errors->has('kode_barang')) has-error @endif">
                    <label for="kode_barang" class="col-sm-12 control-label">Kode barang</label>    
                    <div class="col-sm-3">
                        <input value="{{ $barangspb->kode_barang }}" type="text" name="kode_barang" class="form-control" id="kode_barang" readonly>
                        @if($errors->has('kode_barang'))
                            <span class="text-danger">{{ $errors->first('kode_barang') }}</span>
                        @endif
                    </div>
                </div>
                <div class="row">
                    <div class="col @if($errors->has('nama')) has-error @endif">
                        <label for="nama" class="col-sm-12 control-label">Nama Barang</label>    
                        <div class="col-sm-12">
                            <input value="{{ $barangspb->nama }}" type="text" name="nama" class="form-control" id="nama" readonly>
                            @if($errors->has('nama'))
                                <span class="text-danger">{{ $errors->first('nama') }}</span>
                            @endif
                        </div>
                    </div>
                    <div class="col @if($errors->has('jenis')) has-error @endif">
                        <label for="jenis" class="col-sm-12 control-label">Jenis</label>    
                        <div class="col-sm-12">
                            <input value="{{ $barangspb->jenis }}" type="text" name="jenis" class="form-control" id="jenis" readonly>
                            @if($errors->has('jenis'))
                                <span class="text-danger">{{ $errors->first('jenis') }}</span>
                            @endif
                        </div>
                    </div>
                </div>&nbsp; 
            <div class="row">
                <div class="col @if($errors->has('stok')) has-error @endif">
                    <label for="stok" class="col-sm-12 control-label">Stok</label>    
                    <div class="col-sm-12">
                        <input value="{{ $barangspb->stok }}" type="text" name="stok" class="form-control" id="stok" readonly>
                        @if($errors->has('stok'))
                            <span class="text-danger">{{ $errors->first('stok') }}</span>
                        @endif
                    </div>
                </div>
                <div class="col @if($errors->has('poin')) has-error @endif">
                    <label for="poin" class="col-sm-12 control-label">Poin</label>    
                    <div class="col-sm-12">
                        <input value="{{ $barangspb->poin }}" type="text" name="poin" class="form-control" id="poin" readonly>
                        @if($errors->has('poin'))
                            <span class="text-danger">{{ $errors->first('poin') }}</span>
                        @endif
                    </div>
                </div>
                <div class="col @if($errors->has('h_member')) has-error @endif">
                    <label for="h_member" class="col-sm-12 control-label">Harga Member</label>    
                    <div class="col-sm-12">
                        <input value="{{ $barangspb->h_member }}" type="text" name="h_member" class="form-control" id="h_member" readonly>
                        @if($errors->has('h_member'))
                            <span class="text-danger">{{ $errors->first('h_member') }}</span>
                        @endif
                    </div>
                </div>
                <div class="col @if($errors->has('h_nomem')) has-error @endif">
                    <label for="h_nomem" class="col-sm-12 control-label">Harga User</label>    
                    <div class="col-sm-12">
                        <input value="{{ $barangspb->h_nomem }}" type="text" name="h_nomem" class="form-control" id="h_nomem" readonly>
                        @if($errors->has('h_nomem'))
                            <span class="text-danger">{{ $errors->first('h_nomem') }}</span>
                        @endif
                    </div>
                </div>
            </div>
            </div>
        </div>
        <div class="card col-12">
            <div class="card-header">
                <h3 class="card-title">Komposisi Series</h3>
            </div>
            <div class="card-body">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            {{-- <th style="width: 200px;">Kode Barang</th> --}}
                            <th>Nama Barang</th>
                            <th style="width: 100px;">Qty</th>
                        </tr>
                    </thead>
                    <tbody>
                        {{-- @foreach($detail as $item) --}}
                            <tr class="detailItem">
                                {{-- <td>
                                    <input type="text" maxlength="5" name="kode_barang[]" id="kode_barang" value="" class="form-control" readonly>
                                </td> --}}
                                <td>
                                    <input type="text" name="nama[]" id="nama" class="form-control" value="" readonly>
                                </td>
                                <td>
                                    <input type="number" name="jumlah[]" id="jumlah" min="1" class="form-control" value="" readonly>
                                </td>
                            </tr>
                        {{-- @endforeach --}}
                    </tbody>
                </table>
            </div>
            <div class="card-footer">
                <a href="{{ route("admin.barangspb.index") }}" class="btn btn-default float-right">Back</a>
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
            format: 'yyyy-mm-dd',
            autoclose: true
        })


        $(document).ready(function () {
            $('.ckeditor').ckeditor();
        });
    </script>
@stop