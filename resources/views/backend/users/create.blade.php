@extends('backend.layouts.main')

@section('title', 'User')

@section('content')
    <h1>Create new user</h1>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="{{ route('user.store')}}" method="POST" name="create_user" enctype="multipart/form-data">
        @csrf

        <div class="form-group">
            <label for="user_name">User name:</label>
            <input type="text" name="user_name" class="form-control" id="user_name" value="{{ old('user_name', "") }}">
        </div>
        <div class="form-group">
            <label for="user_email">User email:</label>
            <input type="text" name="user_email" class="form-control" id="user_email" value="{{ old('user_email', "") }}">
        </div>
        <div class="form-group">
            <label for="user_password">User password:</label>
            <input type="text" name="user_password" class="form-control" id="user_password" value="{{ old('user_password', "") }}">
        </div>
        <div class="form-group">
            <label for="user_image">User image:</label>
            <input type="text" name="user_image" class="form-control" id="user_image" value="{{ old('user_image', "") }}">
        </div>
        <div class="form-group">
            <label for="user_phone">User phone:</label>
            <input type="text" name="user_phone" class="form-control" id="user_phone" value="{{ old('user_phone', "") }}">
        </div>
        <div class="form-group">
            <label for="user_address">User address:</label>
            <input type="text" name="user_address" class="form-control" id="user_address" value="{{ old('user_address', "") }}">
        </div>
        <div class="form-group">
            <label for="user_note">User note:</label>
            <input type="text" name="user_note" class="form-control" id="user_note" value="{{ old('user_note', "") }}">
        </div>
        <div class="form-group">
            <label for="user_type">User type:</label>
            <input type="radio" name="user_type" id="user_type" value="{{ $admin }}"> Admin
            <input type="radio" name="user_type" id="user_type" value="{{ $user }}"> User
        </div>
        <button type="submit" class="btn btn-info">Create user</button>
    </form>
@endsection