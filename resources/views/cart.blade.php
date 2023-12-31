@extends('layouts.base')

@section('styles')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
    @vite(['resources/sass/cart.scss'])
@endsection

@section('content')
    <h1 class="cart__title">Корзина</h1>
    <button class="cart__btn">
        <a href="/decor">оформить заказ {{$allPrice}} ₽</a>
    </button>
    <div class="container">
        @include('components.cart.cartproduct')
    </div>
    
@endsection

@section('js')
    @vite(['resources/js/cart.js'])
@endsection
