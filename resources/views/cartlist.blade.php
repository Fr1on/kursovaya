@extends('layout')
@section('main')

    <div class="cartt">
        <div>

            @foreach($products as $item)
                <div class="otcart">
                    <div class="cart-products">
                        <div class="product-cart">
                            <img src="{{asset("img/{$item->photo}")}}" class="cart-img">
                            <div class="cart-flex">
                                <p class="item ">{{$item->name}}</p>
                                <div class="sss">
                                    <div class="price-cort">
                                        <p class="item ">Цена: {{$item->price}}р.</p>
                                    </div>
                                    <button class="btn btn-primary btn-sm"><a href="/removecart/{{$item->cart_id}}">удалить</a>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="qwe">
            <a class="btn btn-success" href="ordernow">Оформить заказ</a>
        </div class="qwe">
    </div>
@endsection
@section('down')

@endsection


