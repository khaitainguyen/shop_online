@extends('backend.layouts.main')

@section('title', 'Introduces')

@section('content')
    <h1>List introduces detail</h1>
    <div style="padding: 10px; border: 1px solid #4e73df; margin-bottom: 10px">
        <form name="search_introduce" method="get" action="{{ htmlspecialchars($_SERVER["REQUEST_URI"]) }}" class="form-inline">
            <select name="introduce_type" class="form-control" style="width: 250px; margin-right: 20px">
                <option value="">--Introduce type--</option>
                <option value="{{ $NEWS }}" {{ $introduce_type == $NEWS ? " selected" : "" }}>News</option>
                <option value="{{ $INTRODUCE }}" {{ $introduce_type == $INTRODUCE ? " selected" : "" }}>Introduce</option>
            </select>
            <select name="intro_select_id" class="form-control" style="width: 350px; margin-right: 20px">
                <option>-- Select introduce name --</option>
                @foreach ($introduce_names as $introduce_name)
                    <option value="{{ $introduce_name->id }}" {{ $introduce_name->id == $intro_select_id ? " selected" : "" }}>{{ $introduce_name->name }}</option>
                @endforeach
            </select>
            <input name="introduce_name" value="{{ $searchKeyword }}" class="form-control" style="width: 350px; margin-right: 20px" placeholder="add name" autocomplete="off">

            <div style="padding: 10px 0">
                <input type="submit" name="search" class="btn btn-success" value="Filter">
            </div>
        </form>
    </div>

    {{ !empty($introduces->links()) ? $introduces->links() : '' }}

    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif

    <div style="padding: 20px">
        <a href="{{ route('introducedetail.create')}}" class="btn btn-info">Create introduce detail</a>
    </div>
    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
        <tr>
            <th>Id</th>
            <th>Type</th>
            <th>Introduce name</th>
            <th>Bulletin name</th>
            <th>Image</th>
            <th>Description</th>
            <th>Total view</th>
            <th>Status</th>
        </tr>
        </thead>
        <tbody>
            @if(!empty($introduces))
                    @foreach ($introduces as $introduce)
                    <?php
                    // dd($introduce);
                    ?>
                        <tr>
                            <td>{{ $introduce->id}}</td>
                            <td>
                                @if($introduce->type == $NEWS )
                                    <p><span class="bg-success text-white">News</span></p>
                                @endif
                                @if($introduce->type == $INTRODUCE )
                                    <p><span class="bg-info text-white">Introduces</span></p>
                                @endif

                                
                            <td>
                                {{ $introduce->introduce_name }}
                            </td>
                            <td>{{ $introduce->name}}</td>
                            <td>{{ $introduce->image }}</td>
                            <td>{{ $introduce->desciption }}</td>
                            <td>{{ $introduce->total_view }}</td>
                            <td>
                                <a href="{{ route('introducedetail.edit', ['id' => $introduce->id]) }}" class="btn btn-warning">Edit</a>
                                <a href="{{ route('introducedetail.delete', ['id' => $introduce->id]) }}" class="btn btn-danger">Delete</a>
                            </td>
                        </tr>
                    @endforeach
                @else
                    Data empty !!
                @endif
        </tbody>
    </table>
    {{ !empty($introduces->links()) ? $introduces->links() : '' }}
@endsection
@section('appendjs')

@endsection