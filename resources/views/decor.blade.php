@extends('layouts.base')

@section('styles')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
    @vite(['resources/sass/decor.scss'])
@endsection

@section('content')
    <h1 class="cart__title">Оформление заказа</h1>
    <section class="section__decor">
        <div class="decor">
            <form class="form" action="">
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="floatingInput" placeholder="Иванов Иван">
                    <label for="floatingInput">Name</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="floatingInput" placeholder="+7">
                    <label for="floatingInput">Phone</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="floatingInput" placeholder="ivanov1234@mail.ru">
                    <label for="floatingInput">Email</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="floatingInput" placeholder="ufa">
                    <label for="floatingInput">Address</label>
                </div>
                <button class="btn btn-success">Далее</button>
            </form>
            <div class="decor__products">
                <ul>
                    @foreach($product as $item)
                    <li>
                        chilerz blya 20sht. 920Rub
                    </li>
                    <li>
                        chilerz blya 20sht. 920Rub
                    </li>
                    <li>
                        chilerz blya 20sht. 920Rub
                    </li>
                    @endforeach
                </ul>
                <p>Общая цена: {{$allPrice}} ₽</p>
            </div>
        </div>
    </section>
@endsection

@section('js')
    @vite(['resources/js/decor.js'])
@endsection
