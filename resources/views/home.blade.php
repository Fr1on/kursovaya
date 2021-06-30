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
                <h2>Товары</h2>
            </div>
            <div class="backprodone">
                <div class="sortone">
                    @foreach($products as $item)

                        <div class="products" class="item {{$item["id"]==1?'active':''}}">
                            <div class="product">
                                <div class="product-img">
                                    <img src="{{asset("img/{$item["photo"]}")}}" width="200" height="200">
                                </div>
                                <div class="price-div">
                                    <div>
                                        <p class="item ">{{$item['name']}}</p>
                                    </div>
                                    <div class="price">
                                        <p class="item ">Цена: {{$item['price']}}</p>
                                        <button class="btn btn-primary btn-sm"><a
                                                href="detail/{{$item['id']}}">Обзор</a></button>
                                    </div>
                                </div>
                            </div>
                        </div>


                    @endforeach
                </div>
            </div>
        </div>
    </div>



@endsection
@section('down')

@endsection
