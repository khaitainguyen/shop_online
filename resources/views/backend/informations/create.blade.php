@extends('backend.layouts.main')

@section('title', 'Information')

@section('content')
    <h1>Create Information</h1>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="{{ route('information.store')}}" method="POST" name="update_brand" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="shop_name">Shop name:</label>
            <input type="text" name="shop_name" class="form-control" id="shop_name" value="{{ old('shop_name', "") }}">
        </div>
        <div class="form-group">
            <label for="company_name">Company name:</label>
            <input type="text" name="company_name" class="form-control" id="company_name" value="{{ old('company_name', "") }}">
        </div>
        <div class="form-group">
            <label for="description">Description:</label>
            <input type="text" name="description" class="form-control" id="description" value="{{ old('description', "") }}">
        </div>
        <div class="form-group">
            <label for="shop_image">Shop image:</label>
            <input type="text" name="shop_image" class="form-control" id="shop_image" value="{{ old('shop_image', "") }}">
        </div>
        <div class="form-group">
            <label for="phone">Telephone:</label>
            <input type="text" name="phone" class="form-control" id="phone" value="{{ old('phone', "") }}">
        </div>
        <div class="form-group">
            <label for="hotline">Hot line:</label>
            <input type="text" name="hotline" class="form-control" id="hotline" value="{{ old('hotline', "") }}">
        </div>
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="text" name="email" class="form-control" id="email" value="{{ old('email', "") }}">
        </div>
        <div class="form-group">
            <label for="address">Address shop:</label>
            <input type="text" name="address" class="form-control" id="address" value="{{ old('address', "") }}">
        </div>
        <div class="form-group">
            <label for="facebook">Link Facebook:</label>
            <input type="text" name="facebook" class="form-control" id="facebook" value="{{ old('facebook', "") }}">
        </div>
        <div class="form-group">
            <label for="youtube">Link Youtube:</label>
            <input type="text" name="youtube" class="form-control" id="youtube" value="{{ old('youtube', "")}}">
        </div>
        <div class="form-group">
            <label for="twitter">Link Twitter:</label>
            <input type="text" name="twitter" class="form-control" id="twitter" value="{{ old('twitter', "")}}">
        </div>
        <div class="form-group">
            <label for="employee">Employee name:</label>
            <input type="text" name="employee" class="form-control" id="employee" value="{{ old('employee', "") }}">
        </div>
        <div class="form-group">
            <label for="employee_image">Employee avatar:</label>
            <input type="text" name="employee_image" class="form-control" id="employee_image" value="{{ old('employee_image', "") }}">
        </div>
        <button type="submit" class="btn btn-info">Create information</button>
    </form>
@endsection