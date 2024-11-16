@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Edit Car</h1>

        <form action="{{ route('cars.update', $car->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="carname">Car Name</label>
                <input type="text" class="form-control @error('carname') is-invalid @enderror" id="carname" name="carname" value="{{ old('carname', $car->carname) }}" required>
                @error('carname')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="price">Price</label>
                <input type="number" class="form-control @error('price') is-invalid @enderror" id="price" name="price" value="{{ old('price', $car->price) }}" required>
                @error('price')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="description">Description</label>
                <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description" rows="3" required>{{ old('description', $car->description) }}</textarea>
                @error('description')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="image">Car Image (optional)</label>
                <input type="file" class="form-control-file @error('image') is-invalid @enderror" id="image" name="image">
                @if($car->image)
                    <p>Current Image: <img src="{{ asset('storage/' . $car->image) }}" alt="Current Car Image" width="100"></p>
                @endif
                @error('image')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Update Car</button>
        </form>
    </div>
@endsection
