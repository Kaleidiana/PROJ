@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <h1 class="text-center mb-4">Our Services</h1>

        <div class="service-list">
            <ul class="list-unstyled">
                <li class="service-item">
                    <div class="service-icon">
                        <i class="fas fa-car"></i>
                    </div>
                    <div class="service-description">
                        <h4>Wide selection of cars</h4>
                        <p>We offer a wide variety of luxury and premium cars to suit every occasion, from business trips to leisure getaways.</p>
                    </div>
                </li>
                <li class="service-item">
                    <div class="service-icon">
                        <i class="fas fa-credit-card"></i>
                    </div>
                    <div class="service-description">
                        <h4>Online payment system</h4>
                        <p>Our secure online payment system allows you to book your car and complete transactions easily from anywhere, anytime.</p>
                    </div>
                </li>
                <li class="service-item">
                    <div class="service-icon">
                        <i class="fas fa-truck"></i>
                    </div>
                    <div class="service-description">
                        <h4>Fast and secure delivery</h4>
                        <p>Our reliable delivery service ensures your chosen vehicle is delivered directly to your doorstep, on time and in perfect condition.</p>
                    </div>
                </li>
            </ul>
        </div>
    </div>
@endsection

