@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Order {{ $car->carname }}</h1>

        <form action="{{ route('order.store', $car) }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="customer_name" class="form-label">Your Name</label>
                <input type="text" name="customer_name" id="customer_name" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="customer_email" class="form-label">Your Email</label>
                <input type="email" name="customer_email" id="customer_email" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="quantity" class="form-label">Quantity</label>
                <input type="number" name="quantity" id="quantity" class="form-control" min="1" value="1" required>
            </div>

            <button type="submit" class="btn btn-primary">Place Order</button>
        </form>

        <a href="{{ route('home') }}" class="btn btn-secondary mt-3">Back to Cars</a>
    </div>
@endsection
