@extends('backend.layouts.main')

@section('title', 'Category')

@section('content')
    <h1>Create new category</h1>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="{{ route('category.store')}}" method="POST" name="create_category" enctype="multipart/form-data">
        @csrf

        <div class="form-group">
            <label for="name">category name:</label>
            <input type="text" name="name" class="form-control" id="name" value="{{ old('name', "") }}">
        </div>
        <div class="form-group">
            <label for="description">Description:</label>
            <input type="text" name="description" class="form-control" id="description" value="{{ old('description', "") }}">
        </div>
        <div class="form-group">
            <label for="parent_id">Category name:</label>
            <select name="parent_id" id="parent_id">
                <option value="0">-- Select category --</option>
                @foreach ($categories_parent as $category_parent)
                    <option value="{{ $category_parent->id}}"> {{ $category_parent->name}}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-info">Create category</button>
    </form>
@endsection