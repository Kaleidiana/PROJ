@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Appointments</h1>
    <a href="{{ route('appointments.create') }}">Add New Appointment</a>
    <ul>
        @foreach ($appointments as $appointment)
            <li>
                <a href="{{ route('appointments.show', $appointment->id) }}">{{ $appointment->appointment_time }} - {{ $appointment->property->title }}</a>
            </li>
        @endforeach
    </ul>
</div>
@endsection
