@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Add New Property</h1>
    <form action="{{ route('properties.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="title">Property Title</label>
            <input type="text" class="form-control" name="title" required>
        </div>
        <div class="form-group">
            <label for="description">Description</label>
            <textarea class="form-control" name="description" required></textarea>
        </div>
        <div class="form-group">
            <label for="price">Price</label>
            <input type="number" class="form-control" name="price" required>
        </div>
        <div class="form-group">
            <label for="location">Location</label>
            <input type="text" class="form-control" name="location" required>
        </div>
        <button type="submit" class="btn btn-success">Add Property</button>
    </form>
</div>
@endsection
