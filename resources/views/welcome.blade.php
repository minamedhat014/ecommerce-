@extends('ecommerce.layouts.master')

@section('title')
{{siteInfo('name')}}
@endsection


@section('contentHeader')

@endsection
@section('content')
<x-banner-section />
@livewire('ecommerce.products.category-bar')
@livewire('ecommerce.products.recent-product')
@include('ecommerce.layouts.tinyBanner')
@endsection

