@extends('layout')
@section('main')
    <div class="detail">
        <div class="img-detail">
            <img src="{{asset("img/{$product["photo"]}")}}" width="300" height="300">
        </div>
        <div class="detail-two">
            <div class="detail-description">
                <h3>{{$product['name']}}</h3>
                <h5>Описание</h5>
                <div class="description-detail">
                    <div class="descrip">
                        <h7 >{{$product['description']}}</h7>
                    </div>
                </div>
                @csrf
                @if(Session::get('success'))
                    <div class="alert alert-success">
                        {{ Session::get('success') }}
                    </div>
                @endif
            </div>
            <div class="cart-add-detail">
                <h4>Цена: {{$product['price']}}</h4>
                <form action="/add_to_cart" method="POST">
                    @csrf
                    @if(Session::get('success'))
                    @endif
                    <input type="hidden" name="product_id" value="{{$product['id']}}">
                    <button class="btn btn-primary">Добавить в карзину</button>
                </form>
            </div>
        </div>
    </div>



@endsection
@section('down')


@endsection
