<!-- resources/views/admin/dashboard.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Admin Dashboard</h1>
        <a href="{{ route('cars.index') }}" class="btn btn-primary">Manage Cars</a>
    </div>
@endsection
