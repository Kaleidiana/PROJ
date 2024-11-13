<!-- resources/views/cars/show.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>{{ $car->name }}</h1>

        <img src="{{ asset('storage/'.$car->image) }}" alt="{{ $car->name }}" class="img-fluid mb-3">
        <p><strong>Price: </strong>${{ number_format($car->price, 2) }}</p>
        <p><strong>Description: </strong>{{ $car->description }}</p>

        <a href="{{ route('cars.index') }}" class="btn btn-secondary">Back to Cars</a>
    </div>
@endsection
