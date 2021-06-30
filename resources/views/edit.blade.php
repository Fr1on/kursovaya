@extends('layout')
@section('main')
    {{--    Laravel 8 tutorial - Update Data in Database--}}
    <div class="edit-profile">
        <form action="{{route('edit.route')}}" method="POST">

            @csrf
            <input type="hidden" name="id" value="{{ $data['id']}}">
            <div class="edit">
                <h3>Редактироване профиля</h3>
                <div class="reg-input">
                    <label>Логин</label>
                    <input class="reg-input-two" type="text" name="name" value="{{ $data['name']}}">
                    <span class="text-danger">@error('name'){{$message}} @enderror</span>

                </div>
                <div class="reg-input">
                    <label>Email</label>
                    <input class="reg-input-two" type="text" name="email" value="{{ $data['email']}}">
                    <span class="text-danger">@error('email'){{$message}} @enderror</span>

                </div>
                <div class="reg-input">
                    <label>Пароль</label>
                    <input class="reg-input-two" type="password" name="password" {{ $data['password']}} value="">
                    <span class="text-danger">@error('password'){{$message}} @enderror</span>

                </div>
                <div class="reg-input">
                    <button type="submit" class="reg-button-two">Обновить</button>
                </div>
            </div>
        </form>
    </div>
@endsection
@section('down')


@endsection
