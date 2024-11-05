@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Properties</h1>
    <a href="{{ route('properties.create') }}" class="btn btn-primary">Add Property</a>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Location</th>
                <th>Price</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($properties as $property)
                <tr>
                    <td>{{ $property->id }}</td>
                    <td>{{ $property->name }}</td>
                    <td>{{ $property->location }}</td>
                    <td>{{ $property->price }}</td>
                    <td>
                        <a href="{{ route('properties.edit', $property->id) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('properties.destroy', $property->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
