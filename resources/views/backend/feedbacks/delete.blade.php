@extends('backend.layouts.main')

@section('title', 'Feedback')

@section('content')
    <h1>Delete feedback</h1>
    <form name="product" action="{{ route('feedback.destroy', ['id' => $feedback->id]) }}" method="post">

        @csrf

        <div class="form-group">
            <label>ID feedback: </label>
            <p>{{ $feedback->id }}</p>
        </div>

        <div class="form-group">
            <label>feedback name: </label>
            <p>{{ $feedback->name }}</p>
        </div>

        <button type="submit" class="btn btn-danger">Confirm delete</button>
    </form>
@endsection