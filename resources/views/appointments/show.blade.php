@extends('layouts.app')

@section('content')
<div class="container">
    <h1>{{ $property->title }}</h1>
    <p>{{ $property->description }}</p>
    <a href="{{ route('properties.edit', $property->id) }}">Edit</a>
</div>
@endsection
