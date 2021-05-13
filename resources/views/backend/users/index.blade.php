@extends('backend.layouts.main')

@section('title', 'User')

@section('content')
    <h1>List Users</h1>
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
                    </tr>
                @endforeach
            @else
                Data user empty!
            @endif
        </tbody>
    </table>
    {{ $users->links() }}
@endsection