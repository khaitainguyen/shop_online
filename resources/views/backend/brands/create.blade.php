@extends('backend.layouts.main')

@section('title', 'Brand')

@section('content')
    <h1>Create new brand</h1>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="{{ route('brand.store')}}" method="POST" name="create_brand" enctype="multipart/form-data">
        @csrf

        <div class="form-group">
            <label for="brand_name">Brand name:</label>
            <input type="text" name="brand_name" class="form-control" id="brand_name" value="{{ old('brand_name', "") }}">
        </div>
        <div class="form-group">
            <label for="brand_desc">Brand description:</label>
            <input type="text" name="brand_desc" class="form-control" id="brand_desc" value="{{ old('brand_desc', "") }}">
        </div>
        <div class="form-group">
            <label for="brand_image">Brand image:</label>
            <input type="text" name="brand_image" class="form-control" id="brand_image" value="{{ old('brand_image', "") }}">
        </div>
        <div class="form-group">
            <label for="brand_add">Brand address:</label>
            <input type="text" name="brand_add" class="form-control" id="brand_add" value="{{ old('brand_add', "") }}">
        </div>
        <button type="submit" class="btn btn-info">Create brand</button>
    </form>
@endsection