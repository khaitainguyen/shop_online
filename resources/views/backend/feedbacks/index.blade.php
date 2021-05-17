@extends('backend.layouts.main')

@section('title', 'Feedback')

@section('content')
    <h1>List Feedbacks</h1>
    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif
    <div>
        <form method="GET" name="search_feedback" action="{{ htmlspecialchars($_SERVER["REQUEST_URI"]) }}" class="form-inline">
            <input type="text" class="form-control" name="search_name" id="search_name" value="{{ $search_name }}" placeholder="add feedback name" autocomplete="off">
            <div>
                <input type="submit" name="search" value="Search" class="btn btn-success">
            </div>
        </form>
    </div>
    <div style="padding: 20px">
        <a href="{{ route('feedback.create') }}" class="btn btn-info">Create feedback</a>
    </div>
    {{ $feedbacks->links() }}
    <table class="table table-bordered" id="dataTable" width="100%">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Description</th>
                <th>Address</th>
                <th>Content</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            @if(isset($feedbacks) && !empty($feedbacks))
                @foreach( $feedbacks as $feedback)
                    <tr>
                        <td>{{ $feedback->id }}</td>
                        <td>{{ $feedback->name }}</td>
                        <td>{{ $feedback->email }}</td>
                        <td>{{ $feedback->phone }}</td>
                        <td>{{ $feedback->description }}</td>
                        <td>{{ $feedback->address }}</td>
                        <td>{{ $feedback->content }}</td>
                        <td>
                            <a href="{{ route('feedback.edit', ['id' => $feedback->id]) }}" class="btn btn-warning">Edit</a>
                            <a href="{{ route('feedback.delete', ['id' => $feedback->id]) }}" class="btn btn-danger">Delete</a>
                        </td>
                    </tr>
                @endforeach
            @else
                Data feedback empty!
            @endif
        </tbody>
    </table>
    {{ $feedbacks->links() }}
@endsection