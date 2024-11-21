@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>{{ $car->carname }}</h1>

        <div class="row">
            <!-- Car Image -->
            <div class="col-md-6">
                <img src="{{ asset('storage/'.$car->image) }}" alt="{{ $car->carname }}" class="img-fluid mb-3">
            </div>

            <div class="col-md-6">
                <!-- Car Details -->
                <p><strong>Price: </strong>${{ number_format($car->price, 2) }}</p>
                <p><strong>Description: </strong>{{ $car->description }}</p>

                <!-- Order Now Button -->
                {{-- <form action="{{ route('order.create', $car->id) }}" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-success">Order Now</button>
                </form> --}}

                <!-- Back to Cars Button -->
                <a href="{{ route('home') }}" class="btn btn-secondary mt-3">Back to Cars</a>
            </div>
        </div>
    </div>
@endsection
