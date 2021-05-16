@extends('backend.layouts.main')

@section('title', 'Brand')

@section('content')
<h1>Edit brand</h1>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif
    <form action="{{ route('brand.update', ['id' => $brand->id])}}" method="POST" name="update_brand" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="brand_name">Brand name:</label>
            <input type="text" name="brand_name" class="form-control" id="brand_name" value="{{ $brand->name }}">
        </div>
        <div class="form-group">
            <label for="brand_desc">Brand description:</label>
            <input type="text" name="brand_desc" class="form-control" id="brand_desc" value="{{ $brand->desciption }}">
        </div>
        <div class="form-group">
            <label for="brand_image">Brand image:</label>
            <input type="text" name="brand_image" class="form-control" id="brand_image" value="{{ $brand->image }}">
        </div>
        <div class="form-group">
            <label for="brand_add">Brand address:</label>
            <input type="text" name="brand_add" class="form-control" id="brand_add" value="{{ $brand->address }}">
        </div>
        <button type="submit" class="btn btn-info">Update brand</button>
    </form>
@endsection