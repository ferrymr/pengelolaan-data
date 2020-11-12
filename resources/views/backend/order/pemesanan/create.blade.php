@extends('adminlte::page')

@section('title', 'Tambah Pemesanan')

@section('content_header')
    <h1>Tambah Pemesanan</h1>
@stop

@section('content')
    @include('flash::message')

    {!! Form::open([
        'url' => route('admin.pemesanan.store'),
        'method'=>'POST',
        'class'=>'form-horizontal',
        'id'=>'form-pemesanan'
    ]) !!}

    <div class="card col-12">
        <div class="card-header">
            <h3 class="card-title">Tambah Pemesanan</h3>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="main-content col-md-12">
                    <div class="alert alert-info alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        Apabila ingin menambahkan user baru silahkan <a href="{{ route('admin.user.add') }}" target="_blank">tambah disini</a>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="form-group col-sm-4 @if($errors->has('no_do')) has-error @endif">
                    <label for="no_do" class="col-sm-12 control-label">No Transaksi *</label>    
                    <div class="col-sm-12">
                        <input value="{{ $no_do }}" type="text" name="no_do" class="form-control" id="no_do" placeholder="Code" readonly required>
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
                                            <select name="tb_barang_id[]" class="form-control select2" required>
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
                                    <select name="user_id" class="select2" style="width:80%" required>
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
                        <select name="kode_spb" class="select2" style="width:80%" required>
                            <option value="">Pilih SPB</option>
                            @foreach($spb as $spbdata)
                                <option value="{{ $spbdata->code }}">{{ $spbdata->city_name . ' ' . $spbdata->subdistrict_name }}</option>
                            @endforeach
                        </select> 
                        @if($errors->has('spb'))
                            <span class="text-danger">{{ $errors->first('spb') }}</span>
                        @endif
                    </div>
                </div>
                <div class="form-grup col-sm-12 mb-3 @if($errors->has('metode_pengiriman')) has-error @endif">
                    <div class="col-sm-12">
                        <div class="custom-control custom-checkbox">
                            <input type="radio" class="custom-control-input" name="metode_pengiriman" value="EXPEDITION" id="EXPEDITION">
                            <label class="custom-control-label" for="EXPEDITION">Via Kurir</label>
                        </div>
                        <div class="custom-control custom-checkbox">
                            <input type="radio" class="custom-control-input" name="metode_pengiriman" value="IMMEDIATE" id="IMMEDIATE">
                            <label class="custom-control-label" for="IMMEDIATE">Ambil di Tempat</label>
                        </div>
                    </div>
                </div>

                <div id="content_EXPEDITION" class="form-group col-sm-8 @if($errors->has('kurir')) has-error @endif" style="display:none;">
                    <label for="kurir" class="col-sm-12 control-label">Pilih Kurir</label>    
                    <div class="col-sm-6">
                        <select name="kurir" class="select2" style="width:80%">
                            <option value="">Pilih Kurir</option>
                            <option value="JNE">JNE</option>
                            <option value="JNT">JNT</option>
                        </select> 
                        @if($errors->has('kurir'))
                            <span class="text-danger">{{ $errors->first('kurir') }}</span>
                        @endif
                    </div>
                </div>
                
                <div id="content_IMMEDIATE" class="form-group col-sm-12 @if($errors->has('note')) has-error @endif" style="display:none;">
                    <label for="note" class="col-sm-12 control-label">Notes</label>    
                    <div class="col-sm-6">
                        <textarea name="note" class="form-control" id="note" placeholder="Notes">{{ old('note') }}</textarea>
                        @if($errors->has('note'))
                            <span class="text-danger">{{ $errors->first('note') }}</span>
                        @endif
                    </div>
                </div>

                <div class="form-group col-sm-8 @if($errors->has('payment_method')) has-error @endif">
                    <label for="payment_method" class="col-sm-12 control-label">Pilih Metode Pembayaran</label>    
                    <div class="col-sm-6">
                        <select name="payment_method" class="select2" style="width:80%" disabled>
                            <option value="" selected>Bank transfer</option>
                        </select> 
                        @if($errors->has('payment_method'))
                            <span class="text-danger">{{ $errors->first('payment_method') }}</span>
                        @endif
                    </div>
                </div>
                <div class="form-group col-sm-8 @if($errors->has('bank')) has-error @endif">
                    <label for="bank" class="col-sm-12 control-label">Pilih Bank</label>    
                    <div class="col-sm-6">
                        <select name="bank" class="select2" style="width:80%" required>
                            <option value="">Pilih Bank</option>
                            <option value="BCA">BCA</option>
                            <option value="BNI">BNI</option>
                            <option value="BRI">BRI</option>
                            <option value="MANDIRI">MANDIRI</option>
                        </select> 
                        @if($errors->has('bank'))
                            <span class="text-danger">{{ $errors->first('bank') }}</span>
                        @endif
                    </div>
                </div>
            </div>            
        </div>

        <div class="card-footer">
            <button type="submit" class="btn btn-info">Simpan</button>
            <a href="{{ route("admin.pemesanan.index") }}" class="btn btn-default float-right">Cancel</a>
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
            
            $("#EXPEDITION").click(function() {
                $('#content_EXPEDITION').show();
                $('#content_IMMEDIATE').hide();
            });
            $("#IMMEDIATE").click(function() {
                $('#content_IMMEDIATE').show();
                $('#content_EXPEDITION').hide();
            });

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