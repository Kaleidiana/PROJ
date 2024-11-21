@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Order Confirmation</h1>
        <p>Thank you for your purchase!</p>
        <p>Car: {{ $order->car->carname }}</p>
        <p>Quantity: {{ $order->quantity }}</p>
        <p>Total Price: ${{ $order->total_price }}</p>
        <p>Status: {{ $order->status }}</p>
    </div>
@endsection
