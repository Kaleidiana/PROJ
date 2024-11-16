<!-- resources/views/admin/dashboard.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container">
        <!-- Display the logged-in user's name -->
        <h1>Admin Dashboard</h1>
        <p>Welcome, {{ Auth::user()->name }}!</p>

        <!-- Link to manage cars -->
        <a href="{{ route('cars.index') }}" class="btn btn-primary">Manage Cars</a>

        <!-- If there are cars, display them with View buttons -->
        @if($cars->count() > 0)
            <div class="row mt-4">
                @foreach($cars as $car)
                    <div class="col-md-4">
                        <div class="card">
                            <img src="{{ asset('images/'.$car->image) }}" class="card-img-top" alt="{{ $car->name }}">
                            <div class="card-body">
                                <h5 class="card-title">{{ $car->name }}</h5>
                                <p class="card-text">{{ $car->description }}</p>
                                <a href="{{ route('cars.show', $car->id) }}" class="btn btn-primary">View Details</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <p>No cars available to manage yet.</p>
        @endif
    </div>
@endsection
