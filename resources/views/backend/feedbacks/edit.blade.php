@extends('backend.layouts.main')

@section('title', 'Feedback')

@section('content')
<h1>Edit feedback</h1>
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
    <form action="{{ route('feedback.update', ['id' => $feedback->id])}}" method="POST" name="update_feedback" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="name">Title:</label>
            <input type="text" name="name" class="form-control" id="name" value="{{ $feedback->name }}">
        </div>
        <div class="form-group">
            <label for="description"> Description:</label>
            <input type="text" name="description" class="form-control" id="description" value="{{ $feedback->description }}">
        </div>
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="text" name="email" class="form-control" id="email" value="{{ $feedback->email }}">
        </div>
        <div class="form-group">
            <label for="address">feedback address:</label>
            <input type="text" name="address" class="form-control" id="address" value="{{ $feedback->address }}">
        </div>
        <div class="form-group">
            <label for="phone">TelePhone:</label>
            <input type="text" name="phone" class="form-control" id="phone" value="{{ $feedback->phone }}">
        </div>
        <div class="form-group">
            <label for="content">Content:</label>
            <input type="text" name="content" class="form-control" id="content" value="{{ $feedback->content }}">
        </div>
        <button type="submit" class="btn btn-info">Update feedback</button>
    </form>
@endsection