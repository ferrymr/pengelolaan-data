@extends('layouts.products')

@section('content')

    <!--breadcrumb-->
    <div class="row">
        <div class="col-lg-12">
            <x-breadcrumb>
                <li class="trail-item trail-begin"><a href="{{ route('home') }}">Home</a></li>
                <li class="trail-item trail-end active">{{ $category_name }}</li>
            </x-breadcrumb>
        </div>
    </div>

    <x-products :products="$products" :category-name="$category_name" />

@endsection