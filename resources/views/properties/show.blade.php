@extends('layouts.app')

@section('content')
<div class="container">
    <h1>{{ $property->name }}</h1>
    <p><strong>Location:</strong> {{ $property->location }}</p>
    <p><strong>Price:</strong> {{ $property->price }}</p>
    <a href="{{ route('properties.index') }}" class="btn btn-secondary">Back to Properties</a>
</div>
@endsection
