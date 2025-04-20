@extends('layouts.app-pat')

@section('title', 'Free Doctors')

@section('content')
<div class="container py-5">
    <h2 class="mb-4 text-primary fw-bold">🩺 Available Doctors & Free Time</h2>

    <div class="row g-4">
        @foreach($availabilities as $slot)
            <div class="col-md-6 col-lg-4">
                <div class="card shadow-sm border-0">
                    <div class="card-body">
                        <h5 class="card-title text-primary">{{ $slot->doctor->name }}</h5>
                        <p class="card-text mb-1"><strong>Specialization:</strong> {{ $slot->doctor->specialization ?? 'General' }}</p>
                        <p class="card-text mb-1"><strong>Available On:</strong> {{ \Carbon\Carbon::parse($slot->available_date)->format('F j, Y') }}</p>
                        <p class="card-text mb-3"><strong>Time:</strong> {{ \Carbon\Carbon::parse($slot->available_time)->format('g:i A') }}</p>

                        <form action="" method="POST">
                            @csrf
                            <input type="hidden" name="availability_id" value="{{ $slot->id }}">
                            <button class="btn btn-success w-100">Book Appointment</button>
                        </form>
                    </div>
                </div>
            </div>
        @endforeach

        @if($availabilities->isEmpty())
            <div class="col-12">
                <div class="alert alert-info text-center">
                    No doctors are currently available for appointments. Please check back later.
                </div>
            </div>
        @endif
    </div>
</div>
@endsection
