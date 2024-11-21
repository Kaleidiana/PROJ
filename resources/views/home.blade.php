@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="text-center">Welcome to MotorShift!</h1>
        <p class="lead text-center">Your dream car is just a few clicks away.</p>

        <div class="row">
            <!-- Car 1 -->
            <div class="col-md-4 mb-4">
                <div class="card">
                    <img src="{{ asset('images/car8.jpg') }}" class="card-img-top" alt="Car 1">
                    <div class="card-body">
                        <h5 class="card-title">Bentley</h5>
                        <p class="card-text">A blue bentley 2022.</p>
                        <a href="{{ route('car.details', ['car' => 1]) }}" class="btn btn-primary">View Details</a>
                        <a href="{{ route('order.car', ['car' => 1]) }}" class="btn btn-success">Order Now</a> <!-- Order Now Button -->
                    </div>
                </div>
            </div>

            <!-- Car 2 -->
            <div class="col-md-4 mb-4">
                <div class="card">
                    <img src="{{ asset('images/car4.jpg') }}" class="card-img-top" alt="Car 2">
                    <div class="card-body">
                        <h5 class="card-title">Mazda</h5>
                        <p class="card-text">A red Mazda.</p>
                        <a href="{{ route('car.details', ['car' => 2]) }}" class="btn btn-primary">View Details</a>
                        <a href="{{ route('order.car', ['car' => 2]) }}" class="btn btn-success">Order Now</a> <!-- Order Now Button -->
                    </div>
                </div>
            </div>

            <!-- Car 3 -->
            <div class="col-md-4 mb-4">
                <div class="card">
                    <img src="{{ asset('images/car5.jpg') }}" class="card-img-top" alt="Car 3">
                    <div class="card-body">
                        <h5 class="card-title">Mercedez</h5>
                        <p class="card-text">A white Mercedez.</p>
                        <a href="{{ route('car.details', ['car' => 3]) }}" class="btn btn-primary">View Details</a>
                        <a href="{{ route('order.car', ['car' => 3]) }}" class="btn btn-success">Order Now</a> <!-- Order Now Button -->
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <!-- Car 4 -->
            <div class="col-md-4 mb-4">
                <div class="card">
                    <img src="{{ asset('images/car2.jpg') }}" class="card-img-top" alt="Car 4">
                    <div class="card-body">
                        <h5 class="card-title">RangeRover</h5>
                        <p class="card-text">A conspicuous white Rover.</p>
                        <a href="{{ route('car.details', ['car' => 4]) }}" class="btn btn-primary">View Details</a>
                        <a href="{{ route('order.car', ['car' => 4]) }}" class="btn btn-success">Order Now</a> <!-- Order Now Button -->
                    </div>
                </div>
            </div>

            <!-- Car 5 -->
            <div class="col-md-4 mb-4">
                <div class="card">
                    <img src="{{ asset('images/car1.jpg') }}" class="card-img-top" alt="Car 5">
                    <div class="card-body">
                        <h5 class="card-title">Bugatti</h5>
                        <p class="card-text">A green Bugatti.</p>
                        <a href="{{ route('car.details', ['car' => 5]) }}" class="btn btn-primary">View Details</a>
                        <a href="{{ route('order.car', ['car' => 5]) }}" class="btn btn-success">Order Now</a> <!-- Order Now Button -->
                    </div>
                </div>
            </div>

            <!-- Car 6 -->
            <div class="col-md-4 mb-4">
                <div class="card">
                    <img src="{{ asset('images/car7.jpg') }}" class="card-img-top" alt="Car 6">
                    <div class="card-body">
                        <h5 class="card-title">BMW</h5>
                        <p class="card-text">A white BMW.</p>
                        <a href="{{ route('car.details', ['car' => 6]) }}" class="btn btn-primary">View Details</a>
                        <a href="{{ route('order.car', ['car' => 6]) }}" class="btn btn-success">Order Now</a> <!-- Order Now Button -->
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
