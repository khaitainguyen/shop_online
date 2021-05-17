@extends('backend.layouts.main')

@section('title', 'Category')

@section('content')
    <h1>List categorys</h1>
    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif
    <div>
        <form method="GET" name="search_category" action="{{ htmlspecialchars($_SERVER["REQUEST_URI"]) }}" class="form-inline">
            <input type="text" class="form-control" name="category_name" id="category_name" value="{{ $category_name }}" placeholder="add category name" autocomplete="off">
            <div>
                <input type="submit" name="search" value="Search" class="btn btn-success">
            </div>
        </form>
    </div>
    <div style="padding: 20px">
        <a href="{{ route('category.create') }}" class="btn btn-info">Create category</a>
    </div>
    {{ $categories->links() }}
    <table class="table table-bordered" id="dataTable" width="100%">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Description</th>
                <th>Parent category name</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            @if(isset($categories) && !empty($categories))
                @foreach( $categories as $category)
                    <tr>
                        <td>{{ $category->id }}</td>
                        <td>{{ $category->name }}</td>
                        <td>{{ $category->description }}</td>
                        <td>
                            @foreach ($categories_parent as $category_parent)
                                @if ($category_parent->id == $category->parent_id)
                                    {{ $category_parent->name}}
                                @endif
                            @endforeach
                        </td>
                        <td>
                            <a href="{{ route('category.edit', ['id' => $category->id]) }}" class="btn btn-warning">Edit</a>
                            <a href="{{ route('category.delete', ['id' => $category->id]) }}" class="btn btn-danger">Delete</a>
                        </td>
                    </tr>
                @endforeach
            @else
                Data category empty!
            @endif
        </tbody>
    </table>
    {{ $categories->links() }}
@endsection