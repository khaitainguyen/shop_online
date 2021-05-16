@extends('backend.layouts.main')

@section('title', 'Partner')

@section('content')
    <h1>List Partners</h1>
    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif
    <div>
        <form method="GET" name="search_user" action="{{ htmlspecialchars($_SERVER["REQUEST_URI"]) }}" class="form-inline">
            <input type="text" class="form-control" name="partner_name" id="partner_name" value="{{ $partner_name }}" placeholder="add partner name" autocomplete="off">
            <div>
                <input type="submit" name="search" value="Search" class="btn btn-success">
            </div>
        </form>
    </div>
    <div style="padding: 20px">
        <a href="{{ route('partner.create') }}" class="btn btn-info">Create partner</a>
    </div>
    {{ $partners->links() }}
    <table class="table table-bordered" id="dataTable" width="100%">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Image</th>
                <th>Relatioship</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            @if(isset($partners) && !empty($partners))
                @foreach( $partners as $partner)
                    <tr>
                        <td>{{ $partner->id }}</td>
                        <td>{{ $partner->name }}</td>
                        <td>{{ $partner->image }}</td>
                        <td>{{ $partner->status == $in_rel ? "In relatioship" : "Out relationship" }}</td>
                        <td>
                            <a href="{{ route('partner.edit', ['id' => $partner->id]) }}" class="btn btn-warning">Edit</a>
                            <a href="{{ route('partner.delete', ['id' => $partner->id]) }}" class="btn btn-danger">Delete</a>
                        </td>
                    </tr>
                @endforeach
            @else
                Data partner empty!
            @endif
        </tbody>
    </table>
    {{ $partners->links() }}
@endsection