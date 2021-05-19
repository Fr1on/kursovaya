@extends('layout')
@section('main')
    <h1>{{ $LoggedUserInfo->name }}</h1>
    <h1>{{ $LoggedUserInfo->email }}</h1>
    <a href={{route('logout.route')}}>Выйти</a>
@endsection
@section('down')

@endsection

