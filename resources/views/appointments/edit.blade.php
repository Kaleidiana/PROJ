@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Property</h1>
    <form action="{{ route('properties.update', $property->id) }}" method="POST">
        @csrf
        @method('PUT')
        <!-- Include form fields for property details, pre-filled with existing data -->
        <button type="submit">Update</button>
    </form>
</div>
@endsection
