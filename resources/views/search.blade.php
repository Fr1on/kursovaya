@extends('layout')
@section('main')
    <div class="backprod">
        <div class="sort">
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
                                <button class="btn btn-primary btn-sm"><a href="detail/{{$item['id']}}">Обзор</a></button>
                            </div>
                        </div>
                    </div>
                </div>


            @endforeach
        </div>
    </div>
@endsection
@section('down')


@endsection
