
@extends('layouts.app')

@section('content')
    <div class="container1 py-5">
        <h1 class="mb-4 text-center">Contact Us</h1>
        <p class="mb-5 text-center">If you have any questions, feel free to reach out to us!</p>

        <form action="{{ route('contact.submit') }}" method="POST">
            @csrf
            <div class="form-group mb-4">
                <label for="name" class="font-weight-bold">Name</label>
                <input type="text" class="form-control p-3" id="name" name="name" required>
            </div>

            <div class="form-group mb-4">
                <label for="email" class="font-weight-bold">Email</label>
                <input type="email" class="form-control p-3" id="email" name="email" required>
            </div>

            <div class="form-group mb-4">
                <label for="message" class="font-weight-bold">Message</label>
                <textarea class="form-control p-3" id="message" name="message" required></textarea>
            </div>

            <div class="text-center">
                <button type="submit" class="btn btn-submit">Submit</button>
            </div>
        </form>
    </div>
@endsection
