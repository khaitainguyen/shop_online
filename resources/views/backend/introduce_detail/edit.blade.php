@extends('backend.layouts.main')

@section('title', 'introduces')

@section('content')
    <h1>Edit introduce</h1>
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

    <form name="introduce" action="{{ route('introducedetail.update', ['id' => $introduce->id]) }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="introduce_id">Categories:</label>
            <select name="introduce_id">
                <option>-- Select category of name --</option>
                @foreach ($introduce_selects as $introduce_select)
                    <option value="{{ $introduce_select->id }}" {{ $introduce_select->id == $introduce->introduce_id ? 'selected' : ''}}>{{ $introduce_select->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="detail_name">Name introduce detail: </label>
            <input type="text" name="detail_name" style="width: 250px" class="form-control" id="detail_name" value="{{ $introduce->name }}">
        </div>
        <div class="form-group">
            <label for="detail_image">Image introduce deatail:</label>
            <input type="text" name="detail_image" style="width: 250px" class="form-control" id="detail_image">
        </div>
        <div class="form-group">
            <label for="detail_desc">Description: </label>
            <input type="text" name="detail_desc" style="width: 250px" class="form-control" id="detail_desc" value="{{ $introduce->desciption }}">
        </div>
        <button type="submit" class="btn btn-info">Update introduces</button>
    </form>
@endsection