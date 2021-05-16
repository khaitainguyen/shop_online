@extends('backend.layouts.main')

@section('title', 'Brand')

@section('content')
    <h1>Delete brand</h1>
    <form name="product" action="{{ route('brand.destroy', ['id' => $brand->id]) }}" method="post">

        @csrf

        <div class="form-group">
            <label>ID brand: </label>
            <p>{{ $brand->id }}</p>
        </div>

        <div class="form-group">
            <label>brand name: </label>
            <p>{{ $brand->name }}</p>
        </div>

        <button type="submit" class="btn btn-danger">Confirm delete</button>
    </form>
@endsection