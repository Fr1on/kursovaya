@extends('layout')
@section('main')
    <div class="block-profile">
        <div class="block-profile-osn">
            <div class="block-profile-center">
                <div class="profile-login">
                    <h4>Логин:</h4>
                    <h4>{{ auth()->user()->name }}</h4>
                </div>
                <div class="profile-login">
                    <h4>Email:</h4>
                    <h4>{{ auth()->user()->email }}</h4>
                </div>
                <a href={{route('logout.route')}}>Выйти</a>
            </div>
        </div>
    </div>
@endsection
@section('down')

@endsection

