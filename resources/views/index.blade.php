@extends('layouts.app')

@section('content')
    <!-- text block -->
    <x-promo-text-bar>
        <i class="icon fa fa-flag" aria-hidden="true"></i>Buruan, Beli product <a href="#">Series diskon 30%</a>  & dapetin <a href="#">Serum Anti Flek gratis</a> sekarang!
    </x-promo-text-bar>

    <!-- products box -->
    <x-promo-products-section :products="$products"/>

    <!-- banner newsletter -->
    <x-newsletter />

    <!-- products tabs -->
    <x-products />

    <!-- blogs -->
    <x-blogs />
@endsection