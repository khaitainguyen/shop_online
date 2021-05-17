@extends('backend.layouts.main')

@section('title', 'Category')

@section('content')
    <h1>Delete category</h1>
    <form name="product" action="{{ route('category.destroy', ['id' => $category->id]) }}" method="post">

        @csrf

        <div class="form-group">
            <label>ID category: </label>
            <p>{{ $category->id }}</p>
        </div>

        <div class="form-group">
            <label>category name: </label>
            <p>{{ $category->name }}</p>
        </div>

        <button type="submit" class="btn btn-danger">Confirm delete</button>
    </form>
@endsection