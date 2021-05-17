@extends('backend.layouts.main')

@section('title', 'Banner')

@section('content')
    <h1>Delete banner</h1>
    <form name="product" action="{{ route('banner.destroy', ['id' => $banner->id]) }}" method="post">

        @csrf

        <div class="form-group">
            <label>ID banner: </label>
            <p>{{ $banner->id }}</p>
        </div>

        <div class="form-group">
            <label>banner name: </label>
            <p>{{ $banner->name }}</p>
        </div>

        <button type="submit" class="btn btn-danger">Confirm delete</button>
    </form>
@endsection