@extends('layout')
@section('main')

    <form action="addProductData" method="POST" enctype="multipart/form-data">
        @csrf

            <input type="text" name="name" placeholder="name">
            <input type="number" name="price" placeholder="price">
            <input type="text" name="category" placeholder="category">
            <textarea name="description" placeholder="description"></textarea>
            <input type="file" name="photo" placeholder="photo">
            <button type="submit">Add Product</button>
            <h3> съеби</h3>

    </form>

@endsection
@section('down')


@endsection
