@extends('backend.layouts.main')

@section('title', 'Introduces')

@section('content')
    <h1>List introduces</h1>

    <div style="padding: 10px; border: 1px solid #4e73df; margin-bottom: 10px">
        <form name="search_introduce" method="get" action="{{ htmlspecialchars($_SERVER["REQUEST_URI"]) }}" class="form-inline">
            <select name="introduce_type" class="form-control" style="width: 250px; margin-right: 20px">
                <option value="">--Introduce type--</option>
                <option value="{{ $NEWS }}" {{ $introduce_type == $NEWS ? " selected" : "" }}>News</option>
                <option value="{{ $INTRODUCE }}" {{ $introduce_type == $INTRODUCE ? " selected" : "" }}>Introduce</option>
            </select>
            <div style="padding: 10px 0">
                <input type="submit" name="search" class="btn btn-success" value="Filter">
            </div>
        </form>
    </div>
    {{ $introduces->links() }}
    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif
    <div style="padding: 20px">
        <a href="{{ route('introduce.create')}}" class="btn btn-info">Create introduce</a>
    </div>
    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
        <tr>
            <th>Id</th>
            <th>Type</th>
            <th>Name introduce category</th>
            <th>Description</th>
            <th>Status</th>
        </tr>
        </thead>
        <tbody>
            @if(!empty($introduces))
                    @foreach ($introduces as $introduce)
                        <tr>
                            <td>{{ $introduce->id}}</td>
                            <td>
                                @if($introduce->type == $NEWS )
                                    <p><span class="bg-success text-white">News</span></p>
                                @endif
                                @if($introduce->type == $INTRODUCE )
                                    <p><span class="bg-info text-white">Introduces</span></p>
                                @endif
                            </td>
                            <td>{{ $introduce->name}}</td>
                            <td>{{ $introduce->desciption }}</td>
                            <td>
                                <a href="{{ route('introduce.edit', ['id' => $introduce->id]) }}" class="btn btn-warning">Edit</a>
                                <a href="{{ route('introduce.delete', ['id' => $introduce->id]) }}" class="btn btn-danger">Delete</a>
                            </td>
                        </tr>
                    @endforeach
                @else
                    Data empty !!
                @endif
        </tbody>
    </table>
    {{ $introduces->links() }}
@endsection
@section('appendjs')

@endsection