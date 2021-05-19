@extends('backend.layouts.main')

@section('title', 'introduces')

@section('content')
    <h1>Delete introduce</h1>
    <form name="introduce" action="{{ route('introducedetail.destroy', ['id' => $introduce->id]) }}" method="post">

        @csrf

        <div class="form-group">
            <label for="introduce_name">ID introduce detail:</label>
            <p>{{ $introduce->id }}</p>
        </div>

        <div class="form-group">
            <label for="introduce_name">Introduce detail name:</label>
            <p>{{ $introduce->name }}</p>
        </div>

        <button type="submit" class="btn btn-danger">Confirm delete</button>
    </form>
@endsection