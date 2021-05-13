@extends('backend.layouts.main')

@section('title', 'Products')

@section('content')
    <h1>Delete product</h1>
    <form name="product" action="{{ url("/products/destroy/$product->id") }}" method="post">

        @csrf

        <div class="form-group">
            <label for="product_name">ID product:</label>
            <p>{{ $product->id }}</p>
        </div>

        <div class="form-group">
            <label for="product_name">Product name:</label>
            <p>{{ $product->name }}</p>
        </div>

        <button type="submit" class="btn btn-danger">Confirm delete</button>
    </form>
@endsection