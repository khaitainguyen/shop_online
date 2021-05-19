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

    <form name="introduce" action="{{ route('introduce.update', ['id' => $introduce->id]) }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="type">Introduce status:</label>
            <input type="radio" name="type" id="type" value="{{ $NEWS }}" {{ $introduce->type == $NEWS ? 'checked' : ''}}> News
            <input type="radio" name="type" id="type" value="{{ $INTRODUCE }} {{ $introduce->type == $INTRODUCE ? 'checked' : ''}}"> Introduces
        </div>
        <div class="form-group">
            <label for="introduce_name">Name of introduce: </label>
            <input type="text" name="introduce_name" style="width: 250px" class="form-control" id="introduce_name" value="{{ $introduce->name }}">
        </div>
        <div class="form-group">
            <label for="description">Description: </label>
            <input type="text" name="description" style="width: 250px" class="form-control" id="description" value="{{ $introduce->desciption }}">
        </div>
        <button type="submit" class="btn btn-info">Update introduces</button>
    </form>
@endsection