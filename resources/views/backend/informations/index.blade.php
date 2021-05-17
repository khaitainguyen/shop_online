@extends('backend.layouts.main')

@section('title', 'Information')

@section('content')
    <h1>Information</h1>
    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif
    @if (isset($information) && !empty($information))
    <form action="{{ route('information.update', ['id' => $information->id])}}" method="POST" name="update_brand" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="shop_name">Shop name:</label>
            <input type="text" name="shop_name" class="form-control" id="shop_name" value="{{ $information->shop_name }}">
        </div>
        <div class="form-group">
            <label for="company_name">Company name:</label>
            <input type="text" name="company_name" class="form-control" id="company_name" value="{{ $information->company_name }}">
        </div>
        <div class="form-group">
            <label for="description">Description:</label>
            <input type="text" name="description" class="form-control" id="description" value="{{ $information->description }}">
        </div>
        <div class="form-group">
            <label for="shop_image">Shop image:</label>
            <input type="text" name="shop_image" class="form-control" id="shop_image" value="{{ $information->shop_image }}">
        </div>
        <div class="form-group">
            <label for="phone">Telephone:</label>
            <input type="text" name="phone" class="form-control" id="phone" value="{{ $information->phone }}">
        </div>
        <div class="form-group">
            <label for="hotline">Hot line:</label>
            <input type="text" name="hotline" class="form-control" id="hotline" value="{{ $information->hotline }}">
        </div>
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="text" name="email" class="form-control" id="email" value="{{ $information->email }}">
        </div>
        <div class="form-group">
            <label for="address">Address shop:</label>
            <input type="text" name="address" class="form-control" id="address" value="{{ $information->address }}">
        </div>
        <div class="form-group">
            <label for="facebook">Link Facebook:</label>
            <input type="text" name="facebook" class="form-control" id="facebook" value="{{ $information->facebook }}">
        </div>
        <div class="form-group">
            <label for="youtube">Link Youtube:</label>
            <input type="text" name="youtube" class="form-control" id="youtube" value="{{ $information->youtube }}">
        </div>
        <div class="form-group">
            <label for="twitter">Link Twitter:</label>
            <input type="text" name="twitter" class="form-control" id="twitter" value="{{ $information->twitter }}">
        </div>
        <div class="form-group">
            <label for="employee">Employee name:</label>
            <input type="text" name="employee" class="form-control" id="employee" value="{{ $information->employee }}">
        </div>
        <div class="form-group">
            <label for="employee_image">Employee avatar:</label>
            <input type="text" name="employee_image" class="form-control" id="employee_image" value="{{ $information->employee_image }}">
        </div>
        <button type="submit" class="btn btn-info">Update information</button>
    </form>
    @else
        <div style="padding: 20px">
            <p> Information is empty! </p>
            <a href="{{ route('information.create') }}" class="btn btn-info">Create information</a>
        </div>
    @endif
    
@endsection