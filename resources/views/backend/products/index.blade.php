@extends('backend.layouts.main')

@section('title', 'Products')

@section('content')
    <h1>List Products</h1>
    <div style="padding: 10px; border: 1px solid #4e73df; margin-bottom: 10px">
        <form name="search_product" method="get" action="{{ htmlspecialchars($_SERVER["REQUEST_URI"]) }}" class="form-inline">

            <input name="product_name" value="{{ $searchKeyword }}" class="form-control" style="width: 350px; margin-right: 20px" placeholder="add.." autocomplete="off">

            <select name="product_status" class="form-control" style="width: 150px; margin-right: 20px">
                <option value="">Product status</option>
                <option value="{{ $selling }}" {{ $productStatus == $selling ? " selected" : "" }}>On sell</option>
                <option value="{{ $stop_sell }}" {{ $productStatus == $stop_sell ? " selected" : "" }}>Stop sell</option>
            </select>

            <select name="category_id" class="form-control" style="width: 250px; margin-right: 20px">
                <option>-- Select category --</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}" {{ $category->id == $category_id ? " selected" : "" }}>{{ $category->name }}</option>
                @endforeach
            </select>

            <select name="product_sort" class="form-control" style="width: 150px; margin-right: 20px">
                <option value="">Filter</option>
                <option value="price_asc" {{ $sort == "price_asc" ? " selected" : "" }}>Price up</option>
                <option value="price_desc" {{ $sort == "price_desc" ? " selected" : "" }}>Price down</option>
                <option value="quantity_asc" {{ $sort == "quantity_asc" ? " selected" : "" }}>Quantity up</option>
                <option value="quantity_desc" {{ $sort == "quantity_desc" ? " selected" : "" }}>Quantity down</option>
            </select>

            <div style="padding: 10px 0">
                <input type="submit" name="search" class="btn btn-success" value="Filter">
            </div>

            <div style="padding: 10px 0">
                <a href="#" id="clear-search" class="btn btn-warning">Clear filter</a>
            </div>

            <input type="hidden" name="page" value="1">

        </form>
    </div>

    {{ $products->links() }}

    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif

    <div style="padding: 20px">
        <a href="{{ route('product.create')}}" class="btn btn-info">Create product</a>
    </div>
    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
        <tr>
            <th>Id</th>
            <th>image</th>
            <th>Product name</th>
            <th>Product price</th>
            <th>Quantity</th>
            <th>Brand</th>
            <th>Status</th>
        </tr>
        </thead>
        <tbody>
            @if(isset($products) && !empty($products))
                    @foreach ($products as $product)
                        <tr>
                            <td>{{ $product->id }}</td>
                            <td>
                            </td>
                            <td>
                                {{ $product->name }}

                                @if($product->status == 1)
                                    <p><span class="bg-success text-white">On Sell</span></p>
                                @endif

                                @if($product->status == 2)
                                    <p><span class="bg-danger text-white">Stop Sell</span></p>
                                @endif
                            </td>
                            <td>{{ $product->sell_price }} USD</td>
                            <td>{{ $product->quantity }}</td>
                            <td>{{ $product->brand_id}}</td>
                            <td>
                                <a href="{{ route('product.edit', ['id' => $product->id]) }}" class="btn btn-warning">Edit</a>
                                <a href="{{ route('product.delete', ['id' => $product->id]) }}" class="btn btn-danger">Delete</a>
                            </td>
                        </tr>
                    @endforeach
                @else
                    Data empty !!
                @endif
        </tbody>
    </table>
    {{ $products->links() }}
@endsection
@section('appendjs')

@endsection