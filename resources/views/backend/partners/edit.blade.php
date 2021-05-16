@extends('backend.layouts.main')

@section('title', 'Partner')

@section('content')
<h1>Edit partner</h1>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif
    <form action="{{ route('partner.update', ['id' => $partner->id])}}" method="POST" name="update_partner" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="partner_name">Partner name:</label>
            <input type="text" name="partner_name" class="form-control" id="partner_name" value="{{ $partner->name }}">
        </div>
        <div class="form-group">
            <label for="partner_image">Partner image:</label>
            <input type="text" name="partner_image" class="form-control" id="partner_image" value="{{ $partner->image }}">
        </div>
        <div class="form-group">
            <label for="partner_status">Partner status:</label>
            <input type="radio" name="partner_status" id="partner_status" value="{{ $in_rel }}" {{ $partner->status == $in_rel ? 'checked' : ""}}> In ralationship
            <input type="radio" name="partner_status" id="partner_status" value="{{ $out_rel }}" {{ $partner->status == $out_rel ? 'checked' : ""}}> Out relationship
        </div>
        <button type="submit" class="btn btn-info">Update partner</button>
    </form>
@endsection