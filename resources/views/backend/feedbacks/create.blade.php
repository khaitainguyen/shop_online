@extends('backend.layouts.main')

@section('title', 'Feedback')

@section('content')
    <h1>Create new feedback</h1>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="{{ route('feedback.store')}}" method="POST" name="create_feedback" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="name">Title:</label>
            <input type="text" name="name" class="form-control" id="name" value="{{ old('name', "") }}">
        </div>
        <div class="form-group">
            <label for="description"> Description:</label>
            <input type="text" name="description" class="form-control" id="description" value="{{ old('description', "") }}">
        </div>
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="text" name="email" class="form-control" id="email" value="{{ old('email', "") }}">
        </div>
        <div class="form-group">
            <label for="address">feedback address:</label>
            <input type="text" name="address" class="form-control" id="address" value="{{ old('address', "") }}">
        </div>
        <div class="form-group">
            <label for="phone">TelePhone:</label>
            <input type="text" name="phone" class="form-control" id="phone" value="{{ old('phone', "") }}">
        </div>
        <div class="form-group">
            <label for="content">Content:</label>
            <input type="text" name="content" class="form-control" id="content" value="{{ old('content', "") }}">
        </div>
        <button type="submit" class="btn btn-info">Create feedback</button>
    </form>
@endsection