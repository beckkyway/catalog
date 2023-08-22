@extends('layouts.base')

@section('title', 'Page Title')

@section('styles')
@parent
@vite(['resources/sass/index.scss'])
@endsection

@section('sidebar')
@endsection

@section('content')
<p>This is my body content.</p>
@endsection

@section('js')
@parent
@endsection