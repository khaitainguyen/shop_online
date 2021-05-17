@extends('backend.layouts.main')

@section('title', 'Banner')

@section('content')
    <h1>Create new banner</h1>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="{{ route('banner.store')}}" method="POST" name="create_banner" enctype="multipart/form-data">
        @csrf

        <div class="form-group">
            <label for="name">Banner name:</label>
            <input type="text" name="name" class="form-control" id="name" value="{{ old('name', "") }}">
        </div>
        <div class="form-group">
            <label for="image">Banner image:</label>
            <input type="text" name="image" class="form-control" id="image" value="{{ old('image', "") }}">
        </div>
        <button type="submit" class="btn btn-info">Create banner</button>
    </form>
@endsection