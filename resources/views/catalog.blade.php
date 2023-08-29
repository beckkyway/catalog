@extends('layouts.base')

@section('styles')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
    @vite(['resources/sass/catalog.scss'])
@endsection

@section('content')
    <h1 class="assortiment__title">Асортимент товаров</h1>
    <div class="container">
        @include('components.catalog.products')
    </div>
@endsection

@section("js")
    @vite(['resources/js/catalog.js'])
@endsection