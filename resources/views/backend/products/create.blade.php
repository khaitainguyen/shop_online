@extends('backend.layouts.main')

@section('title', 'Products')

@section('content')
    <h1>Create product</h1>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form name="product" action="{{ route('product.store') }}" method="post" enctype="multipart/form-data">

        @csrf

        <div class="form-group">
            <label for="product_name">Product name:</label>
            <input type="text" name="product_name" class="form-control" id="product_name" value="{{ old('product_name', "") }}">
        </div>

        <div class="form-group">
            <label for="product_category">Categories:</label>
            <select name="category_id">
                <option>-- Select category --</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="brand_id">Brand name:</label>
            <select name="brand_id" id="brand_id">
                <option>-- Select brand --</option>
                @foreach ($brands as $brand)
                    <option value="{{ $brand->id}}"> {{ $brand->name}}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="product_status">Product status:</label>
            <input type="radio" name="product_status" id="product_status" value="1"> On sell
            <input type="radio" name="product_status" id="product_status" value="2"> Stop sell
        </div>
        <div class="form-group">
            <label for="product_hot">Hot product:</label>
            <input type="radio" name="product_hot" id="product_hot" value="1"> Hot
            <input type="radio" name="product_hot" id="product_hot" value="2"> Normal
        </div>

        <div class="form-group">
            <label for="product_image">Image product:</label>
            <input type="file" name="product_image" style="width: 250px" class="form-control" id="product_image">
        </div>
        <div class="form-group">
            <label for="product_image">Description:</label>
            <textarea name="product_desc" class="form-control" rows="10" id="product_desc">{{ old('product_desc', "") }}</textarea>
        </div>
        <div class="form-group">
            <label for="product_quantity">Quantity:</label>
            <input type="number" name="product_quantity" style="width: 250px" class="form-control" id="product_quantity" value="{{ old('product_quantity', "") }}">
        </div>
        <div class="form-group">
            <label for="orginal_price">Price product core:</label>
            <input type="text" name="orginal_price" style="width: 250px" class="form-control" id="orginal_price" value="{{ old('orginal_price', "") }}">
        </div>
        <div class="form-group">
            <label for="sell_price">Price product sell:</label>
            <input type="text" name="sell_price" style="width: 250px" class="form-control" id="sell_price" value="{{ old('sell_price', "") }}">
        </div>

        <button type="submit" class="btn btn-info">Create products</button>
    </form>
@endsection