<?php

use App\Http\Controllers\ProductController;

$total = 0;
if (\Illuminate\Support\Facades\Auth::user()) {
    $total = ProductController::cartItem();
}

?>
    <!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <title>PFStore магазин компьтерной переферии</title>

    <link rel="stylesheet" type="text/css" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/all.min.css') }}">
<body>

<div class="container-one">
    <header class="header">
        <nav class="header-main">
            <div>
                <a href="/" class="">
                    <div class="logo">
                        <div class="logo-two">
                            <i class="fas fa-keyboard"></i>
                            <i class="fas fa-mouse"></i>
                        </div>
                        <h2 class="logo-three">PFStore</h2>
                    </div>
                </a>
            </div>
            @csrf
            <a class="gko" href="{{ route('main') }}">Главная</a>
            <a class="gko" href="{{ route('product')}}">Товары</a>

            <a class="gko" href="">О нас</a>

            <form action="/search">
                <input class="search" type="text" name="query">
                <button class="search-butt"><i class="fas fa-search"></i></button>
            </form>
            <div class="authnav-osn">
                <div class="authnav">
                    @if(Auth::check())
                        <a class="authnav" href={{route('profile.route')}}>Профиль</a>
                        <a class="authnav" href={{route('myorders')}}>Заказы</a>
                    @endif
                </div>
                <div class="authnav">
                    @if(Auth::check())
                        <a class="authnav" href="/cartlist">Корзина({{$total}})</a>
                    @endif

                </div>
                <div class="authnav">
                    @auth
                        <a href={{route('logout.route')}}>Выйти</a>
                    @else
                        <a href={{route('login.route')}}>Войти</a>
                    @endauth
                </div>

            </div>


        </nav>
    </header>

    @yield('main')


</div>
<div class="container-two">
    <header class="downer">
        <nav class="header-down">
            <div class="ssilki">
                <a href="/" class="">
                    <div class="logo">
                        <div class="logo-two">
                            <i class="fas fa-keyboard"></i>
                            <i class="fas fa-mouse"></i>
                        </div>
                        <h2 class="logo-three">PFStore</h2>
                    </div>
                </a>

                <div>
                    <a class="gko" href="#">Главная</a>
                    <a class="gko" href="#">Категории</a>
                    <a class="gko" href="">О нас</a>
                </div>
            </div>
            <div class="links-ikonss">
                <a class="ikons" href="#"><i class="fab fa-vk"></i><h4>PFStore</h4></a>
                <a class="ikons" href="#"><i class="fab fa-telegram"></i><h4>PFStore</h4></a>
                <a class="ikons" href="#"><i class="fab fa-youtube"></i><h4>PFStore</h4></a>
            </div>
        </nav>
        <div class="prava">
            <h5>2021 © Все права защищены.</h5>
        </div>
    </header>
    @yield('down')
</div>

</body>
</html>
