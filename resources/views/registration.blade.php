@extends('layout')
@section('main')
    <div class="back-reg">
        <div class="reg">
            <div class="image-reg">
                <a href="/" class="">
                    <div class="logo-auth">
                        <div class="logo-two-auth">
                            <i class="fas fa-keyboard"></i>
                            <i class="fas fa-mouse"></i>
                        </div>
                        <h1 class="logo-threee">PFStore</h1>
                    </div>
                </a>

            </div>
            <div class="reg-reg">
                <div class="reg-auth">
                    <h1>Регистрация</h1>
                    <form action="{{route('auth.create')}}" method="post">
                        @csrf

                        <div class="results">
                            @if(Session::get('success'))
                                <div class="alert alert-success">
                                    {{ Session::get('success') }}
                                </div>
                            @endif
                            @if(Session::get('fail'))
                                <div class="alert alert-success">
                                    {{ Session::get('fail') }}
                                </div>
                            @endif
                        </div>

                        <div class="reg-input">
                            <label name="name">Логин</label>
                            <input class="reg-input-two" type="text" name="name" value="{{ old('name') }}">
                            <span class="text-danger">@error('name'){{$message}} @enderror</span>
                        </div>
                        <div class="reg-input">
                            <label>Email</label>
                            <input class="reg-input-two" type="text" name="email" {{ old('email') }}>
                            <span class="text-danger">@error('email'){{$message}} @enderror</span>

                        </div>
                        <div class="reg-input">
                            <label>пароль</label>
                            <input class="reg-input-two" type="password" name="password">
                            <span class="text-danger">@error('password'){{$message}} @enderror</span>

                        </div>

                        <div class="reg-button">
                            <button type="submit" class="reg-button-two">Зарегистироваться</button>
                        </div>
                        <div class="go-login">
                            <a href="#">
                                <p>Уже зарегистрированы? Войти</p>
                            </a>
                        </div>
                    </form>
                </div>


            </div>
        </div>

    </div>
@endsection
@section('down')


@endsection
