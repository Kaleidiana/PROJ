<!-- resources/views/cars/index.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Cars</h1>
        <a href="{{ route('cars.create') }}" class="btn btn-primary">Add New Car</a>

        @if (session('success'))
            <div class="alert alert-success mt-3">
                {{ session('success') }}
            </div>
        @endif

        <div class="row mt-4">
            @foreach ($cars as $car)
                <div class="col-md-4">
                    <div class="card">
                        <img src="{{ asset('storage/'.$car->image) }}" class="card-img-top" alt="{{ $car->name }}">
                        <div class="card-body">
                            <h5 class="card-title">{{ $car->name }}</h5>
                            <p class="card-text">{{ Str::limit($car->description, 100) }}</p>
                            <p><strong>Price: </strong>${{ number_format($car->price, 2) }}</p>
                            <a href="{{ route('cars.show', $car->id) }}" class="btn btn-info">View Details</a>
                            <a href="{{ route('cars.edit', $car->id) }}" class="btn btn-warning">Edit</a>
                            <form action="{{ route('cars.destroy', $car->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
