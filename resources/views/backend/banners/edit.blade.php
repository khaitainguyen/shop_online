@extends('backend.layouts.main')

@section('title', 'Banner')

@section('content')
<h1>Edit banner</h1>
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
    <form action="{{ route('banner.update', ['id' => $banner->id])}}" method="POST" name="update_banner" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="name">Banner name:</label>
            <input type="text" name="name" class="form-control" id="name" value="{{ $banner->name }}">
        </div>
        <div class="form-group">
            <label for="image">Banner image:</label>
            <input type="text" name="image" class="form-control" id="image" value="{{ old('image', "") }}">
        </div>
        <div class="form-group">
            <label for="status">Banner status:</label>
            <input type="radio" name="status" id="status" value="{{ $stop }}"> Stopped
            <input type="radio" name="status" id="status" value="{{ $run }}"> Running
            <input type="radio" name="status" id="status" value="{{ $wait }}"> Waitting
        </div>
        <button type="submit" class="btn btn-info">Update banner</button>
    </form>
@endsection