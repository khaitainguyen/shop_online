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

    <form name="introduce" action="{{ route('introduce.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="type">Introduce status:</label>
            <input type="radio" name="type" id="type" value="{{ $NEWS }}"> News
            <input type="radio" name="type" id="type" value="{{ $INTRODUCE }}"> Introduces
        </div>
        <div class="form-group">
            <label for="introduce_name">Name of introduce: </label>
            <input type="text" name="introduce_name" style="width: 250px" class="form-control" id="introduce_name" value="{{ old('introduce_name', "") }}">
        </div>
        <div class="form-group">
            <label for="description">Description: </label>
            <input type="text" name="description" style="width: 250px" class="form-control" id="description" value="{{ old('description', "") }}">
        </div>
        <button type="submit" class="btn btn-info">Create introduces</button>
    </form>
@endsection