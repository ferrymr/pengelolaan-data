@extends('adminlte::page')

@section('title', 'Ubah Setting')

@section('content_header')
    <h1>Ubah Setting</h1>
@stop

@section('content')
    @include('flash::message')

    {!! Form::open([
        'url' => route('admin.setting.update', $currentSetting->id),
        'method'=>'POST',
        'class'=>'form-horizontal',
        'id'=>'form-user'
    ]) !!}

    <div class="card col-12">
        <div class="card-header">
            <h3 class="card-title">Ubah Setting</h3>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="form-group col-sm-6 @if($errors->has('name')) has-error @endif">
                    <label for="name" class="col-sm-12 control-label">Nama *</label>    
                    <div class="col-sm-12">
                        <input type="name" name="name" value="{{ $currentSetting->name }}" class="form-control" id="name" placeholder="Nama">
                        @if($errors->has('name'))
                            <span class="text-danger">{{ $errors->first('name') }}</span>
                        @endif
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="form-group col-sm-6 @if($errors->has('slug')) has-error @endif">
                    <label for="slug" class="col-sm-12 control-label">Slug *</label>    
                    <div class="col-sm-12">
                        <input type="slug" name="slug" value="{{ $currentSetting->slug }}" class="form-control" id="slug" placeholder="Akun Bank">
                        @if($errors->has('slug'))
                            <span class="text-danger">{{ $errors->first('slug') }}</span>
                        @endif
                    </div>
                </div>
            </div>    

            <div class="row">
                <div class="form-group col-sm-6 @if($errors->has('category')) has-error @endif">
                    <label for="category" class="col-sm-12 control-label">Kategori *</label>    
                    <div class="col-sm-12">
                        <input type="category" name="category" value="{{ $currentSetting->category }}" class="form-control" id="category" placeholder="Keterangan">
                        @if($errors->has('category'))
                            <span class="text-danger">{{ $errors->first('category') }}</span>
                        @endif
                    </div>
                </div>
            </div>    
            
            <div class="row">
                <div class="form-group col-sm-6 @if($errors->has('description')) has-error @endif">
                    <label for="description" class="col-sm-12 control-label">Keterangan *</label>    
                    <div class="col-sm-12">
                        <input type="description" name="description" value="{{ $currentSetting->description }}" class="form-control" id="description" placeholder="Keterangan">
                        @if($errors->has('description'))
                            <span class="text-danger">{{ $errors->first('description') }}</span>
                        @endif
                    </div>
                </div>
            </div>
        </div>

        <div class="card-footer">
            <button type="submit" class="btn btn-info">Simpan</button>
            <a href="{{ route("admin.setting.index") }}" class="btn btn-default float-right">Cancel</a>
        </div>
    </div>    

    {!! Form::close() !!}
@stop