@extends('backend.layouts.main')

@section('title', 'Brand')

@section('content')
    <h1>List Brands</h1>
    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif
    <div>
        <form method="GET" name="search_brand" action="{{ htmlspecialchars($_SERVER["REQUEST_URI"]) }}" class="form-inline">
            <input type="text" class="form-control" name="brand_name" id="brand_name" value="{{ $brand_name }}" placeholder="add brand name" autocomplete="off">
            <div>
                <input type="submit" name="search" value="Search" class="btn btn-success">
            </div>
        </form>
    </div>
    <div style="padding: 20px">
        <a href="{{ route('brand.create') }}" class="btn btn-info">Create brand</a>
    </div>
    {{ $brands->links() }}
    <table class="table table-bordered" id="dataTable" width="100%">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Description</th>
                <th>Image</th>
                <th>Address</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            @if(isset($brands) && !empty($brands))
                @foreach( $brands as $brand)
                    <tr>
                        <td>{{ $brand->id }}</td>
                        <td>{{ $brand->name }}</td>
                        <td>{{ $brand->desciption }}</td>
                        <td>{{ $brand->image }}</td>
                        <td>{{ $brand->address }}</td>
                        <td>
                            <a href="{{ route('brand.edit', ['id' => $brand->id]) }}" class="btn btn-warning">Edit</a>
                            <a href="{{ route('brand.delete', ['id' => $brand->id]) }}" class="btn btn-danger">Delete</a>
                        </td>
                    </tr>
                @endforeach
            @else
                Data brand empty!
            @endif
        </tbody>
    </table>
    {{ $brands->links() }}
@endsection