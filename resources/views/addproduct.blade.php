
@extends('layout')
@section('main')

    <div class="backaddprod">
        <div class="addproducts">
            <form action="addProductData" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="addproduct">
                    <h2>Создание товара</h2>
                    <h5>Название товара</h5>
                    <input type="text" name="name"  class="addprod">
                    <h5>Цена товара</h5>
                    <input type="number" name="price"  class="addprod">
                    <h5>Категория товара</h5>
                    <input type="text" name="category"  class="addprod">
                    <h5>Описание товара</h5>
                    <textarea name="description"  class="addprod"></textarea>
                    <input type="file" name="photo" placeholder="photo" class="addprodimg">
                    <button type="submit" class="btn btn-primary btn-lg">Add Product</button>
                </div>
            </form>
        </div>
    </div>

@endsection
@section('down')


@endsection
