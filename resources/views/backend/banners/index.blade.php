@extends('backend.layouts.main')

@section('title', 'Banner')

@section('content')
    <h1>List banners</h1>
    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif
    <div>
        <form method="GET" name="search_banner" action="{{ htmlspecialchars($_SERVER["REQUEST_URI"]) }}" class="form-inline">
            <input type="text" class="form-control" name="banner_name" id="banner_name" value="{{ $banner_name }}" placeholder="add banner name" autocomplete="off">
            <div>
                <input type="submit" name="search" value="Search" class="btn btn-success">
            </div>
        </form>
    </div>
    <div style="padding: 20px">
        <a href="{{ route('banner.create') }}" class="btn btn-info">Create banner</a>
    </div>
    {{ $banners->links() }}
    <table class="table table-bordered" id="dataTable" width="100%">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Image</th>
                <th>Status detail</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            @if(isset($banners) && !empty($banners))
                @foreach( $banners as $banner)
                    <tr>
                        <td>{{ $banner->id }}</td>
                        <td>{{ $banner->name }}</td>
                        <td>{{ $banner->image }}</td>
                        <td>{{ $banner->status == $wait ? "Waitting" : "" }}{{ $banner->status == $run ? "Running" : "" }}{{ $banner->status == $stop ? "Stopped" : "" }}</td>
                        <td>
                            <a href="{{ route('banner.edit', ['id' => $banner->id]) }}" class="btn btn-warning">Edit</a>
                            <a href="{{ route('banner.delete', ['id' => $banner->id]) }}" class="btn btn-danger">Delete</a>
                        </td>
                    </tr>
                @endforeach
            @else
                Data banner empty!
            @endif
        </tbody>
    </table>
    {{ $banners->links() }}
@endsection