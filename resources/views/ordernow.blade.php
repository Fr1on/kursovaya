@extends('layout')
@section('main')
    <div class="order">

        <div>
            <h4 style="margin-bottom: 40px">Оформление заказа</h4>
            <div class="priceproduct">

                <h5>Цена товаров: {{$total}}р.</h5>
                <hr>
                <h5>Доставка: 200р.</h5>
                <hr>
                <h5>Итог: {{$total+200}}р.</h5>
                <hr>
            </div>
            <form action="/orderplace" method="POST">
                @csrf
                <div>
                    <h6>Адресс</h6>
                    <input type="text" name="address" placeholder="улица,дом,квартира" class="orderinput">
                </div>
                <div>
                    <h6>Способ оплаты</h6>
                    <div class="payment">
                        <div class="paymentt">
                            <input type="radio" name="payment" value="Online оплата"> <span>Online оплата</span>
                        </div>
                        <div class="paymentt">
                            <input type="radio" name="payment" value="Оплата при доставке"> <span>Оплата при доставке</span>
                        </div>
                    </div>
                </div>
                <div class="btn">
                    <button class="btn btn-primary btn-lg">Заказать</button>
                </div>
            </form>
        </div>
    </div>
@endsection
@section('down')


@endsection
