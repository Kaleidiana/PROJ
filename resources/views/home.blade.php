@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="text-center">Welcome to MotorShift!</h1>
        <p class="lead text-center">Your dream car is just a few clicks away.</p>

        <div class="row">
            <!-- Car 1 -->
            <div class="col-md-4 mb-4">
                <div class="card">
                    <img src="{{ asset('images/car1.jpg') }}" class="card-img-top" alt="Car 1">
                    <div class="card-body">
                        <h5 class="card-title">Lamborghini</h5>
                        <p class="card-text">Description of the car.</p>
                        <a href="#" class="btn btn-primary">View Details</a>
                    </div>
                </div>
            </div>

            <!-- Car 2 -->
            <div class="col-md-4 mb-4">
                <div class="card">
                    <img src="{{ asset('images/car2.jpg') }}" class="card-img-top" alt="Car 2">
                    <div class="card-body">
                        <h5 class="card-title">Range Rover</h5>
                        <p class="card-text">Description of the car.</p>
                        <a href="#" class="btn btn-primary">View Details</a>
                    </div>
                </div>
            </div>

            <!-- Car 3 -->
            <div class="col-md-4 mb-4">
                <div class="card">
                    <img src="{{ asset('images/car6.jpg') }}" class="card-img-top" alt="Car 3">
                    <div class="card-body">
                        <h5 class="card-title">Maybach</h5>
                        <p class="card-text">Description of the car.</p>
                        <a href="#" class="btn btn-primary">View Details</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <!-- Car 4 -->
            <div class="col-md-4 mb-4">
                <div class="card">
                    <img src="{{ asset('images/car4.jpg') }}" class="card-img-top" alt="Car 4">
                    <div class="card-body">
                        <h5 class="card-title">Porshe</h5>
                        <p class="card-text">Description of the car.</p>
                        <a href="#" class="btn btn-primary">View Details</a>
                    </div>
                </div>
            </div>

            <!-- Car 5 -->
            <div class="col-md-4 mb-4">
                <div class="card">
                    <img src="{{ asset('images/car5.jpg') }}" class="card-img-top" alt="Car 5">
                    <div class="card-body">
                        <h5 class="card-title">Sedan</h5>
                        <p class="card-text">Description of the car.</p>
                        <a href="#" class="btn btn-primary">View Details</a>
                    </div>
                </div>
            </div>

            <!-- Car 6 -->
            <div class="col-md-4 mb-4">
                <div class="card">
                    <img src="{{ asset('images/car3.jpg') }}" class="card-img-top" alt="Car 6">
                    <div class="card-body">
                        <h5 class="card-title">Mercedez</h5>
                        <p class="card-text">Description of the car.</p>
                        <a href="#" class="btn btn-primary">View Details</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('footer')

@endsection
