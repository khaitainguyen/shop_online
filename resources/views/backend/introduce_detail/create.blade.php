@extends('backend.layouts.main')

@section('title', 'Introduces')

@section('content')
    <h1>Create introduce</h1>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form name="introduce" action="{{ route('introducedetail.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="introduce_id">Categories:</label>
            <select name="introduce_id">
                <option>-- Select category of name --</option>
                @foreach ($introduces as $introduce)
                    <option value="{{ $introduce->id }}">{{ $introduce->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="detail_name">Name introduce detail: </label>
            <input type="text" name="detail_name" style="width: 250px" class="form-control" id="detail_name" value="{{ old('detail_name', "") }}">
        </div>
        <div class="form-group">
            <label for="detail_image">Image introduce deatail:</label>
            <input type="text" name="detail_image" style="width: 250px" class="form-control" id="detail_image">
        </div>
        <div class="form-group">
            <label for="detail_desc">Description: </label>
            <input type="text" name="detail_desc" style="width: 250px" class="form-control" id="detail_desc" value="{{ old('detail_desc', "") }}">
        </div>
       
        <button type="submit" class="btn btn-info">Create introduce detail</button>
    </form>
@endsection