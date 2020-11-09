@extends('adminlte::page')

@section('title', 'Tambah Pemesanan')

@section('content_header')
    <h1>Tambah Pemesanan</h1>
@stop

@section('content')
    @include('flash::message')

    {!! Form::open([
        'url' => route('admin.coupon.store'),
        'method'=>'POST',
        'class'=>'form-horizontal',
        'id'=>'form-coupon'
    ]) !!}

    <div class="card col-12">
        <div class="card-header">
            <h3 class="card-title">Tambah Pemesanan</h3>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="form-group col-sm-4 @if($errors->has('no_do')) has-error @endif">
                    <label for="no_do" class="col-sm-12 control-label">No Transaksi *</label>    
                    <div class="col-sm-12">
                        <input value="{{ $no_do }}" type="text" name="no_do" class="form-control" id="no_do" placeholder="Code" readonly>
                        @if($errors->has('no_do'))
                            <span class="text-danger">{{ $errors->first('no_do') }}</span>
                        @endif
                    </div>
                </div>
                <div class="form-group col-sm-12 @if($errors->has('tb_barang_id')) has-error @endif">
                    <table id="append-product" class="col-md-12">
                        <tr>
                            <td>
                                <div class="form-group mb-2">
                                    <div class="row col-md-12">
                                        <div class="col-md-12">
                                            <label for="product">Product yang dibeli</label>
                                        </div>
                                        <div class="col-md-4">
                                            <select name="tb_barang_id[]" class="form-control select2">
                                                <option value="">Pilih produk</option>
                                                @foreach($products as $product)
                                                    <option value="{{ $product->id }}">
                                                        {{ $product->nama }}
                                                    </option>
                                                @endforeach
                                            </select> 
                                        </div>
                                        <div class="col-md-2">
                                            <input type="number" name="qty_product[]" class="form-control" placeholder="Qty">
                                        </div>
                                        <div class="col-md-4">
                                            <button type="button" class="btn btn-success" id="add-product">
                                                <i class="fa fa-plus"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    </table>
                </div>
                <div class="form-group col-sm-12 @if($errors->has('user_id')) has-error @endif">
                    <table id="append-user" class="col-md-6">
                        <tr>
                            <td>
                                <div class="form-group col-md-12 mb-2">
                                    <label for="user" class="col-sm-12 control-label row">User yang membeli</label>
                                    <select name="user_id[]" class="select2" style="width:80%">
                                        <option value="">Pilih user</option>
                                        @foreach($users as $user)
                                            <option value="{{ $user->id }}">
                                                {{ $user->name }}
                                            </option>
                                        @endforeach
                                    </select> 
                                    {{-- <button type="button" class="btn btn-success ml-3" id="add-user">
                                        <i class="fa fa-plus"></i>
                                    </button> --}}
                                </div>
                            </td>
                        </tr>
                    </table>
                </div>
                <div class="form-group col-sm-8 @if($errors->has('spb')) has-error @endif">
                    <label for="spb" class="col-sm-12 control-label">Pilih SPB</label>    
                    <div class="col-sm-12">
                        <select name="spb" class="select2" style="width:80%">
                            <option value="">Pilih SPB</option>
                            @foreach($spb as $spbdata)
                                <option value="{{ $spbdata->id }}">{{ $spbdata->city_name . ' ' . $spbdata->subdistrict_name }}</option>
                            @endforeach
                        </select> 
                        @if($errors->has('spb'))
                            <span class="text-danger">{{ $errors->first('spb') }}</span>
                        @endif
                    </div>
                </div>
                <div class="form-grup col-sm-12 @if($errors->has('flag_active')) has-error @endif">
                    <div class="col-sm-12">
                        <div class="custom-control custom-checkbox">
                            <input type="radio" class="custom-control-input" name="flag_active" value="1" id="flag_active" checked>
                            <label class="custom-control-label" for="flag_active">Via Kurir</label>
                        </div>
                        <div class="custom-control custom-checkbox">
                            <input type="radio" class="custom-control-input" name="flag_active" value="1" id="flag_active" checked>
                            <label class="custom-control-label" for="flag_active">Ambil di Tempat</label>
                        </div>
                    </div>
                </div>
                <div class="form-group col-sm-8 @if($errors->has('value')) has-error @endif">
                    <label for="value" class="col-sm-12 control-label">Value</label>    
                    <div class="col-sm-12">
                        <input type="number" name="value" class="form-control" id="value" placeholder="Value" required>
                        @if($errors->has('value'))
                            <span class="text-danger">{{ $errors->first('value') }}</span>
                        @endif
                        <p class="text-muted"><br>Kalau pilihanya discount valuenya %, kalau pilihannya potongan valuenya rupiah</p>
                    </div>                    
                </div>
                <div class="form-group col-sm-12 @if($errors->has('description')) has-error @endif">
                    <label for="description" class="col-sm-12 control-label">Deskripsi</label>    
                    <div class="col-sm-12">
                        <textarea name="description" class="form-control ckeditor" id="description" placeholder="Deskripsi">{{ old('description') }}</textarea>
                        @if($errors->has('description'))
                            <span class="text-danger">{{ $errors->first('description') }}</span>
                        @endif
                    </div>
                </div>
            </div>
            
            <div class="row">
                <div class="form-group col-sm-3 @if($errors->has('expired')) has-error @endif">
                    <label for="expired" class="col-sm-12 control-label">Expired *</label>    
                    <div class="col-sm-12">
                        {{-- <input type="text" class="form-control" data-inputmask-alias="datetime" data-inputmask-inputformat="dd/mm/yyyy" data-mask="" im-insert="false"> --}}
                        <input type="text" value="{{ date('Y-m-d') }}" name="expired" class="form-control datepicker" placeholder="Expired">
                        @if($errors->has('expired'))
                            <span class="text-danger">{{ $errors->first('expired') }}</span>
                        @endif
                    </div>
                </div>
            </div>
            
            <div class="form-grup @if($errors->has('flag_active')) has-error @endif">
                <div class="col-sm-6">
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" name="flag_active" value="1" id="flag_active" checked>
                        <label class="custom-control-label" for="flag_active">Aktifasi kupon ini?</label>
                    </div>
                </div>
            </div>
        </div>

        <div class="card-footer">
            <button type="submit" class="btn btn-info">Simpan</button>
            <a href="{{ route("admin.coupon.index") }}" class="btn btn-default float-right">Cancel</a>
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

        $(document).ready(function() {
            $('#add-product').click(function() {
                $('.select2').select2();
                $('#append-product').append(`
                    <tr>
                        <td>
                            <div class="form-group mb-2">
                                <div class="row col-md-12">
                                    <div class="col-md-4">
                                        <select name="tb_barang_id[]" class="form-control select2">
                                            <option value="" selected>Pilih produk</option>
                                            @foreach($products as $product)
                                                <option value="{{ $product->id }}">{{ $product->nama }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-2">
                                        <input type="number" name="qty_product[]" class="form-control" placeholder="Qty">
                                    </div>
                                    <div class="col-md-4">
                                        <button type="button" class="btn btn-danger remove-product">
                                            <i class="fa fa-times"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </td>
                    </tr>
                `);
            });

            $('#append-product').on('click', '.remove-product', function(){
                $(this).parent().parent().remove();
            });

            $('#add-user').click(function() {
                $('.select2').select2();
                $('#append-user').append(`
                    <tr>
                        <td>
                            <div class="input-group col-md-12 mb-2">
                                <select name="user_id[]" class="select2" style="width:80%">
                                    <option value="" selected>Pilih user</option>
                                    @foreach($users as $user)
                                        <option value="{{ $user->id }}">{{ $user->name }}</option>
                                    @endforeach
                                </select>
                                <button type="button" class="btn btn-danger ml-3 remove-user">
                                    <i class="fa fa-times"></i>
                                </button>
                            </div>
                        </td>
                    </tr>
                `);
            });

            $('#append-user').on('click', '.remove-user', function(){
                $(this).parent().parent().remove();
            });
        });
    </script>
@stop