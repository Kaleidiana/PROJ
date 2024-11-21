<!-- resources/views/order/confirmation.blade.php -->

@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Order Confirmation</h1>

    <div class="alert alert-success">
        <h3>Thank you for your order!</h3>
        <p>Your payment has been successfully processed. Your order is confirmed.</p>
        <p><strong>Order Details:</strong></p>
        <ul>
            <li><strong>Car:</strong> {{ session('orderDetails.carName') }}</li>
            <li><strong>Quantity:</strong> {{ session('orderDetails.quantity') }}</li>
            <li><strong>Total Price:</strong> ${{ session('orderDetails.totalPrice') }}</li>
        </ul>
        <a href="{{ route('cars.index') }}" class="btn btn-primary">Back to Cars</a>
    </div>
</div>
@endsection
