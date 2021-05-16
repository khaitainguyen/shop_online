@extends('backend.layouts.main')

@section('title', 'Partner')

@section('content')
    <h1>Create new partner</h1>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="{{ route('partner.store')}}" method="POST" name="create_partner" enctype="multipart/form-data">
        @csrf

        <div class="form-group">
            <label for="partner_name">Partner name:</label>
            <input type="text" name="partner_name" class="form-control" id="partner_name" value="{{ old('partner_name', "") }}">
        </div>
        <div class="form-group">
            <label for="partner_image">Partner image:</label>
            <input type="text" name="partner_image" class="form-control" id="partner_image" value="{{ old('partner_image', "") }}">
        </div>
        <div class="form-group">
            <label for="partner_status">Partner status:</label>
            <input type="radio" name="partner_status" id="partner_status" value="{{ $in_rel }}"> In ralationship
            <input type="radio" name="partner_status" id="partner_status" value="{{ $out_rel }}"> Out relationship
        </div>
        <button type="submit" class="btn btn-info">Create partner</button>
    </form>
@endsection