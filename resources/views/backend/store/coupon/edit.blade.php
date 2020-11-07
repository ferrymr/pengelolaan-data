@extends('adminlte::page')

@section('title', 'Edit Coupon')

@section('content_header')
    <h1>Edit Coupon</h1>
@stop

@section('content')
    @include('flash::message')

    {!! Form::open([
        'url' => route('admin.coupon.update', $currentCoupon->id),
        'method'=>'POST',
        'class'=>'form-horizontal',
        'id'=>'form-coupon'
    ]) !!}

    <div class="card col-12">
        <div class="card-header">
            <h3 class="card-title">Edit Coupon</h3>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="form-group col-sm-4 @if($errors->has('code')) has-error @endif">
                    <label for="code" class="col-sm-12 control-label">Code *</label>    
                    <div class="col-sm-12">
                        <input type="text" value="{{ $currentCoupon->code }}" name="code" class="form-control" id="code" placeholder="Code" required>
                        @if($errors->has('code'))
                            <span class="text-danger">{{ $errors->first('code') }}</span>
                        @endif
                    </div>
                </div>
                <div class="form-group col-sm-12 @if($errors->has('tb_barang_id')) has-error @endif">
                    <table id="append-product" class="col-md-6">
                        @if($currentCouponProduct)
                            <label for="product" class="col-sm-12 control-label">Related product</label>
                            @foreach($currentCouponProduct as $couponProduct)
                                <tr>
                                    <td>
                                        <div class="form-group col-md-12 mb-2">
                                            <select name="tb_barang_id[]" class="select2" style="width:80%">
                                                <option value="">Pilih produk</option>
                                                @foreach($products as $product)
                                                    <option value="{{ $product->id }}" @if($couponProduct->tb_barang_id == $product->id) selected @endif>
                                                        {{ $product->nama }}
                                                    </option>
                                                @endforeach
                                            </select> 
                                            <button type="button" class="btn btn-danger ml-3 remove-product">
                                                <i class="fa fa-times"></i>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                            <tr>
                                <td>
                                    <div class="form-group col-md-12 mb-2">
                                        <select name="tb_barang_id[]" class="select2" style="width:80%">
                                            <option value="">Pilih produk</option>
                                            @foreach($products as $product)
                                                <option value="{{ $product->id }}">
                                                    {{ $product->nama }}
                                                </option>
                                            @endforeach
                                        </select> 
                                        <button type="button" class="btn btn-success ml-3" id="add-product">
                                            <i class="fa fa-plus"></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        @else 
                            <tr>
                                <td>
                                    <div class="form-group col-md-12 mb-2">
                                        <label for="product" class="col-sm-12 control-label row">Related product</label>
                                        <select name="tb_barang_id[]" class="select2" style="width:80%">
                                            <option value="">Pilih produk</option>
                                            @foreach($products as $product)
                                                <option value="{{ $product->id }}">
                                                    {{ $product->nama }}
                                                </option>
                                            @endforeach
                                        </select> 
                                        <button type="button" class="btn btn-success ml-3" id="add-product">
                                            <i class="fa fa-plus"></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        @endif
                    </table>
                </div>
                <div class="form-group col-sm-12 @if($errors->has('user_id')) has-error @endif">
                    <table id="append-user" class="col-md-6">
                        @if($currentCouponUser)                        
                            <label for="user" class="col-sm-12 control-label">Related user</label>
                            @foreach($currentCouponUser as $couponUser)
                                <tr>
                                    <td>
                                        <div class="form-group col-md-12 mb-2">
                                            <select name="user_id[]" class="select2" style="width:80%">
                                                <option value="">Pilih user</option>
                                                @foreach($users as $user)
                                                    <option value="{{ $user->id }}" @if($couponUser->user_id == $user->id) selected @endif>
                                                        {{ $user->name }}
                                                    </option>
                                                @endforeach
                                            </select> 
                                            <button type="button" class="btn btn-danger ml-3 remove-user">
                                                <i class="fa fa-times"></i>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                            <tr>
                                <td>
                                    <div class="form-group col-md-12 mb-2">
                                        <select name="user_id[]" class="select2" style="width:80%">
                                            <option value="">Pilih user</option>
                                            @foreach($users as $user)
                                                <option value="{{ $user->id }}">
                                                    {{ $user->name }}
                                                </option>
                                            @endforeach
                                        </select> 
                                        <button type="button" class="btn btn-success ml-3" id="add-user">
                                            <i class="fa fa-plus"></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        @else
                            <tr>
                                <td>
                                    <div class="form-group col-md-12 mb-2">
                                        <label for="user" class="col-sm-12 control-label row">Related user</label>
                                        <select name="user_id[]" class="select2" style="width:80%">
                                            <option value="">Pilih user</option>
                                            @foreach($users as $user)
                                                <option value="{{ $user->id }}">
                                                    {{ $user->name }}
                                                </option>
                                            @endforeach
                                        </select> 
                                        <button type="button" class="btn btn-success ml-3" id="add-user">
                                            <i class="fa fa-plus"></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        @endif
                    </table>
                </div>

                <div class="form-group col-sm-8 @if($errors->has('flag_jenis')) has-error @endif">
                    <label for="flag_jenis" class="col-sm-12 control-label">Jenis</label>    
                    <div class="col-sm-12">
                        <select name="flag_jenis" class="select2" style="width:80%">
                            <option value="">Pilih jenis</option>
                            <option value="1" @if($currentCoupon->flag_jenis == 1) selected @endif>Discount</option>
                            <option value="2" @if($currentCoupon->flag_jenis == 2) selected @endif>Potongan</option>
                        </select> 
                        @if($errors->has('flag_jenis'))
                            <span class="text-danger">{{ $errors->first('flag_jenis') }}</span>
                        @endif
                    </div>
                </div>
                <div class="form-group col-sm-8 @if($errors->has('value')) has-error @endif">
                    <label for="value" class="col-sm-12 control-label">Value</label>    
                    <div class="col-sm-12">
                        <input type="number" name="value" value="{{ $currentCoupon->value }}" class="form-control" id="value" placeholder="Value" required>
                        @if($errors->has('value'))
                            <span class="text-danger">{{ $errors->first('value') }}</span>
                        @endif
                        <p class="text-muted"><br>Kalau pilihanya discount valuenya %, kalau pilihannya potongan valuenya rupiah</p>
                    </div>                    
                </div>

                <div class="form-group col-sm-12 @if($errors->has('description')) has-error @endif">
                    <label for="description" class="col-sm-12 control-label">Deskripsi</label>    
                    <div class="col-sm-12">
                        <textarea name="description" class="form-control ckeditor" id="description" placeholder="Deskripsi">{{ $currentCoupon->description }}</textarea>
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
                        <input type="text" value="{{ $currentCoupon->expired }}" name="expired" class="form-control datepicker" placeholder="Expired">
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
                            <div class="input-group col-md-12 mb-2">
                                <select name="tb_barang_id[]" class="select2" style="width:80%">
                                    <option value="" selected>Pilih produk</option>
                                    @foreach($products as $product)
                                        <option value="{{ $product->id }}">{{ $product->nama }}</option>
                                    @endforeach
                                </select>
                                <button type="button" class="btn btn-danger ml-3 remove-product">
                                    <i class="fa fa-times"></i>
                                </button>
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