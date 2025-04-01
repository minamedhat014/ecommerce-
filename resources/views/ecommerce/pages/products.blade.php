@extends('ecommerce.layouts.master')

@section('title')
{{$product->name}}
@endsection


@section('contentHeader')

@endsection

@section('content')

@livewire('ecommerce.products.show-product',['product'=>$product])

@endsection
