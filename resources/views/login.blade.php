@extends('layout')
@section('main')
    <div class="back-login">
        <div class="login">
            <div class="image-login">
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
            <div class="login-login">
                <div class="login-auth">
                    <form action="{{route('auth.check')}}" method="post">
                    @csrf
                    <div class="results">
                        @if(Session::get('fail'))
                            <div class="alert alert-danger">
                                {{ Session::get('fail') }}
                            </div>
                        @endif
                    </div>
                        <h1>Авторизация</h1>
                        <div class="reg-input">
                            <label>Email</label>
                            <input class="reg-input-two" type="text" name="email" value="email" {{ old('email') }}>
                            <span class="text-danger">@error('email'){{$message}} @enderror</span>
                        </div>
                        <div class="reg-input">
                            <label>Пароль</label>
                            <input class="reg-input-two" type="password" name="password" value="password">
                            <span class="text-danger">@error('password'){{$message}} @enderror</span>

                        </div>

                        <div class="login-button">
                            <button type="submit" class="login-button-two" value="login">Войти</button>
                        </div>
                        <div class="go-register">
                            <a href={{route('registration.route')}}>
                                <p>Ещё незарегистрированы? Зарегистрироваться
                                </p>
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
