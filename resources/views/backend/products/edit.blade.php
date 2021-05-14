@extends('backend.layouts.main')

@section('title', 'Products')

@section('content')
    <h1>Edit product</h1>
    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form name="product" action="{{ route('product.update', ['id' => $product->id]) }}" method="post" enctype="multipart/form-data">

        @csrf

        <div class="form-group">
            <label for="product_name">Product name:</label>
            <input type="text" name="product_name" value="{{ $product->name }}" class="form-control" id="product_name">
        </div>

        <div class="form-group">
            <label for="product_category">Categories:</label>
            <select name="category_id">
                <option>-- Select category --</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}"
                        {{ $category->id == $product->category_id ? " selected" : "" }}>{{ $category->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="product_status">Product_status:</label>

            @php
                if($product->status == 1) {
                    $checkedRadioStatus = " checked";
                } else {
                    $checkedRadioStatus = "";
                }
            @endphp

            <input type="radio" name="product_status" id="product_status"
                   value="1" {{ $checkedRadioStatus }}> On sell

            @php
                if($product->status == 2) {
                    $checkedRadioStatus = " checked";
                } else {
                    $checkedRadioStatus = "";
                }
            @endphp
            <input type="radio" name="product_status" id="product_status"
                   value="2" {{ $checkedRadioStatus }}> Stop sell
        </div>

        <div class="form-group">
            <label for="product_image">Image product:</label>
            <input type="file" name="product_image" class="form-control" id="product_image">

        </div>
        <div class="form-group">
            <label for="product_image">Description:</label>
            <textarea name="product_desc" id="product_desc" class="form-control" rows="10">{{ $product->description }}</textarea>
        </div>

        <div>
            <label for="product_image">Preview Mô tả sản phẩm:</label>
            <div>
                {!! $product->description !!}
            </div>
        </div>
        <div class="form-group">
            <label for="product_quantity">Quantity:</label>
            <input type="number" name="product_quantity" value="{{ $product->quantity }}" style="width: 250px" class="form-control" id="product_quantity">
        </div>
        <div class="form-group">
            <label for="product_price">Price product:</label>
            <input type="text" name="product_price" value="{{ $product->price_sell }}" style="width: 250px" class="form-control" id="product_price">
        </div>


        <button type="submit" class="btn btn-info">Update products</button>
    </form>
@endsection