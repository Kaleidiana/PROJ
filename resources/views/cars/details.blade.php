@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>{{ $carDetails['name'] }}</h1>
        <img src="{{ asset('storage/images/' . $carDetails['image']) }}" alt="{{ $carDetails['name'] }}" class="img-fluid">
        <p>{{ $carDetails['description'] }}</p>

        <a href="{{ route('order.create', ['car' => $carDetails['id']]) }}" class="btn btn-success">Order Now</a>
        
    </div>
@endsection
