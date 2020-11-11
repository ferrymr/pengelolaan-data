@extends('adminlte::page')

@section('title', 'Edit Image')

@section('content_header')
    <h1>Edit Image</h1>
@stop

@section('content')
    @include('flash::message')

    {!! Form::open([
        'url' => route('admin.barang.update-barang-image', [$barangId, $id]),
        'method'=>'POST',
        'class'=>'form-horizontal',
        'id'=>'form-barang-update'
    ]) !!}

        <div class="card col-12">
            <div class="card-header">
                <h3 class="card-title">Edit Image</h3>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="form-group col-sm-6 @if($errors->has('alt')) has-error @endif">
                        <label for="alt" class="col-sm-12 control-label">Alt text *</label>    
                        <div class="col-sm-12">
                            <input type="text" value="{{ $image->alt }}" name="alt" class="form-control" id="alt" placeholder="Alt text">
                            @if($errors->has('alt'))
                                <span class="text-danger">{{ $errors->first('alt') }}</span>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-info">Simpan</button>
                <a href="{{ route("admin.barang.edit", $barangId) }}" class="btn btn-default float-right">Cancel</a>
            </div>
        </div>

    {!! Form::close() !!}
@stop