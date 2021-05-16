@extends('backend.layouts.main')

@section('title', 'Partner')

@section('content')
    <h1>Delete partner</h1>
    <form name="product" action="{{ route('partner.destroy', ['id' => $partner->id]) }}" method="post">

        @csrf

        <div class="form-group">
            <label>ID partner: </label>
            <p>{{ $partner->id }}</p>
        </div>

        <div class="form-group">
            <label>partner name: </label>
            <p>{{ $partner->name }}</p>
        </div>

        <button type="submit" class="btn btn-danger">Confirm delete</button>
    </form>
@endsection