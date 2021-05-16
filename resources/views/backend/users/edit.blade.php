@extends('backend.layouts.main')

@section('title', 'User')

@section('content')
    <h1>Edit User</h1>
    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="{{ route('user.update', ['id' => $user_edit->id])}}" method="POST" name="create_user" enctype="multipart/form-data">
        @csrf

        <div class="form-group">
            <label for="user_name">User name:</label>
            <input type="text" name="user_name" class="form-control" id="user_name" value="{{ $user_edit->name }}">
        </div>
        <div class="form-group">
            <label for="user_email">User email:</label>
            <input type="text" name="user_email" class="form-control" id="user_email" value="{{ $user_edit->email }}">
        </div>
        <div class="form-group">
            <label for="user_password">User password:</label>
            <input type="text" name="user_password" class="form-control" id="user_password" value="{{ $user_edit->password }}">
        </div>
        <div class="form-group">
            <label for="user_image">User image:</label>
            <input type="text" name="user_image" class="form-control" id="user_image" value="{{ $user_edit->image }}">
        </div>
        <div class="form-group">
            <label for="user_phone">User phone:</label>
            <input type="text" name="user_phone" class="form-control" id="user_phone" value="{{ $user_edit->phone }}">
        </div>
        <div class="form-group">
            <label for="user_address">User address:</label>
            <input type="text" name="user_address" class="form-control" id="user_address" value="{{ $user_edit->address }}">
        </div>
        <div class="form-group">
            <label for="user_note">User note:</label>
            <input type="text" name="user_note" class="form-control" id="user_note" value="{{ $user_edit->note }}">
        </div>
        <div class="form-group">
            <label for="user_type">User type:</label>
            <input type="radio" name="user_type" id="user_type" value="{{ $admin }}" {{ $user_edit->type == $admin ? "checked" : ""}}> Admin
            <input type="radio" name="user_type" id="user_type" value="{{ $user }}" {{ $user_edit->type == $user ? "checked" : ""}}> User
        </div>
        <button type="submit" class="btn btn-info">Edit user</button>
    </form>
@endsection