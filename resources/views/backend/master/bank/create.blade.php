@extends('adminlte::page')

@section('title', 'Tambah Bank')

@section('content_header')
    <h1>Tambah Bank</h1>
@stop

@section('content')
    @include('flash::message')

    {!! Form::open([
        'url' => route('admin.bank.store'),
        'method'=>'POST',
        'class'=>'form-horizontal',
        'id'=>'form-user'
    ]) !!}

    <div class="card col-12">
        <div class="card-header">
            <h3 class="card-title">Tambah Bank</h3>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="form-group col-sm-6 @if($errors->has('bank_name')) has-error @endif">
                    <label for="bank_name" class="col-sm-12 control-label">Nama Bank *</label>    
                    <div class="col-sm-12">
                        <input type="bank_name" name="bank_name" class="form-control" id="bank_name" placeholder="Nama Bank">
                        @if($errors->has('bank_name'))
                            <span class="text-danger">{{ $errors->first('bank_name') }}</span>
                        @endif
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="form-group col-sm-6 @if($errors->has('bank_account')) has-error @endif">
                    <label for="bank_account" class="col-sm-12 control-label">Akun Bank *</label>    
                    <div class="col-sm-12">
                        <input type="bank_account" name="bank_account" class="form-control" id="bank_account" placeholder="Akun Bank">
                        @if($errors->has('bank_account'))
                            <span class="text-danger">{{ $errors->first('bank_account') }}</span>
                        @endif
                    </div>
                </div>
            </div>    

            <div class="row">
                <div class="form-group col-sm-6 @if($errors->has('description')) has-error @endif">
                    <label for="description" class="col-sm-12 control-label">Keterangan *</label>    
                    <div class="col-sm-12">
                        <input type="description" name="description" class="form-control" id="description" placeholder="Keterangan">
                        @if($errors->has('description'))
                            <span class="text-danger">{{ $errors->first('description') }}</span>
                        @endif
                    </div>
                </div>
            </div>            
        </div>

        <div class="card-footer">
            <button type="submit" class="btn btn-info">Simpan</button>
            <a href="{{ route("admin.bank.index") }}" class="btn btn-default float-right">Cancel</a>
        </div>
    </div>    

    {!! Form::close() !!}
@stop