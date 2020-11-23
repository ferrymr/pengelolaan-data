@extends('adminlte::page')

@section('title', 'Edit Movement')

@section('content_header')
    <h1>Edit Movement</h1>
@stop

@section('content')
    @include('flash::message')

    {!! Form::open([
        'url' => route('admin.movement.update_movement', $movement->id),
        'method'=>'POST',
        'class'=>'form-horizontal',
        'id'=>'form-movement'
    ]) !!}



{!! Form::close() !!}
@stop

@section('css')

@stop

@section('js')
    <script>

</script>
@stop