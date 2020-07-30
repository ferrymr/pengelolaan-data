@extends('layouts.app')

@section('content')

    <!-- banner newsletter -->
    <x-newsletter />
    
    <!-- text block -->
    <x-promo-text-bar>
        <i class="icon fa fa-flag" aria-hidden="true"></i>Buruan, Beli product <a href="#">Series diskon 30%</a>  & dapetin <a href="#">Serum Anti Flek gratis</a> sekarang!
    </x-promo-text-bar>

    <!-- products tabs -->
    <x-products :products="$products"/>

@endsection