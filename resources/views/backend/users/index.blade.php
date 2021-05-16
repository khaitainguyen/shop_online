@extends('backend.layouts.main')

@section('title', 'User')

@section('content')
    <h1>List Users</h1>
    <div>
        <form method="GET" name="search_user" action="{{ htmlspecialchars($_SERVER["REQUEST_URI"]) }}" class="form-inline">
            <input type="text" class="form-control" name="user_name" id="user_name" value="{{ $user_name }}" placeholder="add user name" autocomplete="off">

            <input type="text" class="form-control" name="user_email" id="user_email" value="{{ $user_email }}" placeholder="add user email" autocomplete="off">

            <select name="type" id="type" class="form-control" style="width: 150px; margin-right: 20px">
                <option value="">-Filter type--</option>
                <option value="{{ $admin }}" {{ $type == $admin ? "selected": ""}}> Admin </option>
                <option value="{{ $user }}" {{ $type == $user ? "selected": ""}}> User </option>
            </select>

            <div>
                <input type="submit" name="search" value="Search" class="btn btn-success">
            </div>
        </form>
    </div>
    <div style="padding: 20px">
        <a href="{{ route('user.create') }}" class="btn btn-info">Create user</a>
    </div>
    <table class="table table-bordered" id="dataTable" width="100%">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Image</th>
                <th>Phone</th>
                <th>Address</th>
                <th>Note</th>
                <th>Type</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            @if(isset($users) && !empty($users))
                @foreach( $users as $user)
                    <tr>
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->image }}</td>
                        <td>{{ $user->phone }}</td>
                        <td>{{ $user->address }}</td>
                        <td>{{ $user->note }}</td>
                        <td>{{ $user->type }}</td>
                        <td>
                            <a href="{{ route('user.edit', ['id' => $user->id]) }}" class="btn btn-warning">Edit</a>
                            <a href="{{ route('user.delete', ['id' => $user->id]) }}" class="btn btn-danger">Delete</a>
                        </td>
                    </tr>
                @endforeach
            @else
                Data user empty!
            @endif
        </tbody>
    </table>
    {{ $users->links() }}
@endsection