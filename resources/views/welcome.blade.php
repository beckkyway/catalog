@extends('layouts.base')

@section('title', 'Page Title')

@section('styles')
@parent
@vite(['resources/sass/index.scss'])
@endsection

@section('sidebar')
@endsection

@section('content')
<h1 data-content="Welcome to Magazine VapeFurgon" class="welcome__title">Welcome to Magazine VapeFurgon</h1>
@endsection

@section('js')
@parent
@endsection