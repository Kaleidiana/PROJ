@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Property</h1>
    <form action="{{ route('properties.update', $property->id) }}" method="POST">
        @csrf
        @method('PATCH')
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ $property->name }}" required>
        </div>
        <div class="form-group">
            <label for="location">Location</label>
            <input type="text" class="form-control" id="location" name="location" value="{{ $property->location }}" required>
        </div>
        <div class="form-group">
            <label for="price">Price</label>
            <input type="number" class="form-control" id="price" name="price" value="{{ $property->price }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Update Property</button>
    </form>
</div>
@endsection
