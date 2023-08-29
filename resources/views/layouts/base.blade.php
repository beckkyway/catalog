<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    @yield('styles')
</head>

<body>
    <div class="header">
        <ul class="header__links">
            <li>
                <a class="head" href="/">Home</a>
            </li>
            <li>
                <a class="head" href="/catalog">Catalog</a>
            </li>
            <li>
                <a class="head" href="/cart">Корзина</a>
            </li>
            @section('sidebar')
            @show
        </ul>
    </div>

    <div class="container">
        @yield('content')
    </div>
</body>


@yield('js')

</html>
