@extends('layouts.base')

@section('title', 'Page Title')

@section('styles')
@parent
@vite(['resources/sass/tg.scss'])
@endsection

@section('sidebar')
@endsection

@section('content')
<div class="form">
    <textarea id="textBot" cols="30" rows="10"></textarea>
    <button id="sendMessage" class="btn btn-success">Отправить</button>
</div>
@endsection

@section('js')
@parent
@vite(['resources/js/tg.js'])
@endsection