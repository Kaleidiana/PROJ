<!-- resources/views/admin/cars/index.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Manage Cars</h1>
        <a href="{{ route('cars.create') }}" class="btn btn-primary mb-3">Add New Car</a>

        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Car Name</th>  <!-- Changed to 'Car Name' -->
                    <th>Price</th>
                    <th>Description</th>
                    <th>Actions</th>


                </tr>
            </thead>
            <tbody>
                @foreach($cars as $car)
                    <tr>
                        <td>{{ $car->id }}</td>
                        <td>{{ $car->carname }}</td>  <!-- Changed to 'carname' -->
                        <td>{{ $car->price }}</td>
                        <td>{{ Str::limit($car->description, 50) }} <!-- Show first 50 characters of description --></td>
                        <td>
                            <a href="{{ route('cars.show', $car->id) }}" class="btn btn-info btn-sm">View</a>
                            <a href="{{ route('cars.edit', $car->id) }}" class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('cars.destroy', $car->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

    </div>
@endsection
