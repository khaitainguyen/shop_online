@extends('backend.layouts.main')

@section('title', 'User')

@section('content')
    <h1>Delete user</h1>
    <form name="product" action="{{ route('user.destroy', ['id' => $user->id]) }}" method="post">

        @csrf

        <div class="form-group">
            <label>ID user: </label>
            <p>{{ $user->id }}</p>
        </div>

        <div class="form-group">
            <label>User name: </label>
            <p>{{ $user->name }}</p>
        </div>

        <button type="submit" class="btn btn-danger">Confirm delete</button>
    </form>
@endsection