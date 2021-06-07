@extends('layout')

@section('title')
    Главная
@endsection

@section('main')
<div class="site-main">
    <div class="down-header">
        <div class="down-navbar">
            <div class="text-navbar">

                <h3 class="text-size-navbar">PFStore - онлайн магазин где вы можете найти лучшие
                    перефирийные устройства и преобрести по самым приятным ценам.</h3>
            </div>
            <div class="pc-navbar">
                <img src="{{ asset('/img/pc.png')}}">
            </div>
            <div class="links">
                <div class="links-ikons">
                    <a class="ikons" href="#"><i class="fab fa-vk"></i><h4>PFStore</h4></a>
                    <a class="ikons" href="#"><i class="fab fa-telegram"></i><h4>PFStore</h4></a>
                    <a class="ikons" href="#"><i class="fab fa-youtube"></i><h4>PFStore</h4></a>
                </div>
            </div>
        </div>
    </div>

    <div class="popular-product">
        <div class="palka">
            <img src="{{ asset('/img/palca.png')}}">
        </div>
        <div class="populyarniitovari">
            <h2>Категории</h2>
        </div>
        <div class="products">
            <div class="product">

            </div>
            <div class="product">

            </div>
            <div class="product">

            </div>
            <div class="product">

            </div>
        </div>
        <div class="products">
            <div class="product">

            </div>
            <div class="product">

            </div>
            <div class="product">

            </div>
            <div class="product">

            </div>
        </div>
    </div>
</div>



@endsection
@section('down')

@endsection
