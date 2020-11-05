@extends('adminlte::page')

@section('title', 'Edit Slider')

@section('content_header')
    <h1>Edit Slider</h1>
@stop

@section('content')
    @include('flash::message')

    {!! Form::open([
        'url' => route('admin.slider.update', $slider->id),
        'method'=>'POST',
        'class'=>'form-horizontal',
        'id'=>'form-slider-update'
    ]) !!}

        <div class="card col-12">
            <div class="card-header">
                <h3 class="card-title">Edit Slider</h3>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="form-group col-sm-6 @if($errors->has('link')) has-error @endif">
                        <label for="link" class="col-sm-12 control-label">Link *</label>    
                        <div class="col-sm-12">
                            <input type="text" value="{{ $slider->link }}" name="link" class="form-control" id="link" placeholder="e.g http://google.com">
                            @if($errors->has('link'))
                                <span class="text-danger">{{ $errors->first('link') }}</span>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-info">Simpan</button>
                <a href="{{ route("admin.slider.index") }}" class="btn btn-default float-right">Cancel</a>
            </div>
        </div>

    {!! Form::close() !!}
@stop