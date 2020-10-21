@extends('adminlte::page')

@section('title', 'Ubah Series')

@section('content_header')
    <h1>Ubah Series</h1>
@stop

@section('content')
    @include('flash::message')

    {!! Form::open([
        'url' => route('admin.series.update', $series->kode_pack),
        'method'=>'POST',
        'class'=>'form-horizontal',
        'id'=>'form-series-update'
    ]) !!}

    <div class="row">
        <div class="card col-4 m-2">
            <div class="card-header">
                <h3 class="card-title">Ubah Series</h3>
            </div>
            <div class="card-body">
                <div class="form-group @if($errors->has('kode_pack')) has-error @endif">
                    <label for="no_member" class="col-sm-12 control-label">Kode *</label>    
                    <div class="col-sm-6">
                        <input type="text" value="{{ $series->kode_pack }}" name="kode_pack" class="form-control" id="kode_pack" placeholder="Kode Series" required>
                        @if($errors->has('kode_pack'))
                            <span class="text-danger">{{ $errors->first('kode_pack') }}</span>
                        @endif
                    </div>
                </div>
                <div class="form-group @if($errors->has('nama_pack')) has-error @endif">
                    <label for="nik" class="col-sm-12 control-label">Nama Series *</label>    
                    <div class="col-sm-8">
                        <input type="text" value="{{ $series->nama_pack }}" name="nama_pack" class="form-control" id="nama_pack" placeholder="Nama Series" required>
                        @if($errors->has('nama_pack'))
                            <span class="text-danger">{{ $errors->first('nama_pack') }}</span>
                        @endif
                    </div>
                </div>
                <div class="form-group @if($errors->has('jenis_pack')) has-error @endif">
                    <label for="name" class="col-sm-12 control-label">Jenis *</label>    
                    <div class="col-sm-12">
                        <input type="text" value="{{ $series->jenis_pack }}" name="jenis_pack" class="form-control" id="jenis_pack" placeholder="Jenis Series" required>
                        @if($errors->has('jenis_pack'))
                            <span class="text-danger">{{ $errors->first('jenis_pack') }}</span>
                        @endif
                    </div>
                </div>
                <div class="form-group @if($errors->has('poin')) has-error @endif">
                    <label for="name" class="col-sm-12 control-label">Poin *</label>    
                    <div class="col-sm-12">
                        <input type="number" value="{{ $series->poin }}" name="poin" class="form-control" id="poin" placeholder="Poin" required>
                        @if($errors->has('poin'))
                            <span class="text-danger">{{ $errors->first('poin') }}</span>
                        @endif
                    </div>
                </div>
                <div class="form-group @if($errors->has('h_member')) has-error @endif">
                    <label for="name" class="col-sm-12 control-label">Harga Member *</label>    
                    <div class="col-sm-12">
                        <input type="number" value="{{ $series->h_member }}" name="h_member" class="form-control" id="h_member" placeholder="Harga Member" required>
                        @if($errors->has('h_member'))
                            <span class="text-danger">{{ $errors->first('h_member') }}</span>
                        @endif
                    </div>
                </div>
                <div class="form-group @if($errors->has('h_nomem')) has-error @endif">
                    <label for="name" class="col-sm-12 control-label">Harga User *</label>    
                    <div class="col-sm-12">
                        <input type="number" value="{{ $series->h_nomem }}" name="h_nomem" class="form-control" id="h_nomem" placeholder="Harga User" required>
                        @if($errors->has('h_nomem'))
                            <span class="text-danger">{{ $errors->first('h_nomem') }}</span>
                        @endif
                    </div>
                </div>
            </div>

            <div class="card-footer">
                <button type="submit" class="btn btn-info">Update</button>
                <a href="{{ route("admin.series.index") }}" class="btn btn-warning float-right" style="color: white;">Kembali</a>
            </div>
        </div>

        <div class="card col-6 m-2">
            <div class="card-header">
                <h3 class="card-title">Komposisi Series</h3>
            </div>
            <div class="card-body">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th style="width: 150px;">Barang</th>
                            <th>Nama</th>
                            <th style="width: 90px;">Qty</th>
                            <th style="text-align: center; width: 60px;">
                                <a href="javascript:;" class="btn btn-info btn-sm addRow">+</a>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($detail as $value)
                            <tr>
                                <td>
                                    <input type="text" maxlength="5" name="kode_barang[]" id="kode_barang" value="{{ $value->kode_barang }}" class="form-control" required>
                                </td>
                                <td>
                                    <input type="text" name="nama[]" id="nama" class="form-control" value="{{ $value->nama }}" required>
                                </td>
                                <td>
                                    <input type="number" name="jumlah[]" id="jumlah" min="1" class="form-control" value="{{ $value->jumlah }}" required>
                                </td>
                                <td style="text-align: center;">
                                    <a href="javascript:;" class="btn btn-danger btn-sm remove">-</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
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
        $('.kode_barang').select2();

        // date picker
        $('.datepicker').datepicker({
            format: 'dd/mm/yyyy',
            autoclose: true
        });

        $('.addRow').on('click', function(){
            addRow();
        })

        function addRow(){
            var tr = 
                '<tr>'+
                    '<td>'+
                        '<input type="text" maxlength="5" name="kode_barang[]" id="kode_barang" class="form-control" required>'+
                    '</td>'+
                    '<td>'+
                        '<input type="text" name="nama[]" id="nama" class="form-control" required>'+
                    '</td>'+
                    '<td>'+
                        '<input type="number" name="jumlah[]" id="jumlah" min="1" class="form-control" required>'+
                    '</td>'+
                    '<td style="text-align: center;">'+
                        '<a href="javascript:;" class="btn btn-danger btn-sm remove">-</a>'+
                    '</td>'+
                '</tr>';

            $('tbody').append(tr);
        };

        $('tbody').on('click', '.remove', function(){
            $(this).parent().parent().remove();
        })
    </script>
@stop