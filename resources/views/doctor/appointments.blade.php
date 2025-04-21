@extends('layouts.app-doc')

@section('title', 'My Appointments')

@section('content')
<div class="container py-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="text-primary fw-bold">📋 My Appointments</h2>
        <div>
            <a href="{{ route('doctor.addApt') }}" class="btn btn-outline-success me-2">
                <i class="bi bi-calendar-plus"></i> Add Appointment
            </a>
            <a href="{{ route('doctor.addfreetime') }}" class="btn btn-outline-primary">
                <i class="bi bi-clock-history"></i> Post Free Time
            </a>
        </div>
    </div>

    @if($appointments->isEmpty())
        <div class="alert alert-info text-center">
            No appointments found.
        </div>
    @else
        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
            @foreach($appointments as $appointment)
                <div class="col">
                    <div class="card shadow-sm border-0 rounded-4 h-100">
                        <div class="card-body">
                            <h5 class="card-title text-dark fw-semibold mb-2">
                                {{ $appointment->patient->name ?? 'Unknown Patient' }}
                            </h5>
                            <p class="mb-1">
                                <strong>Date:</strong> {{ \Carbon\Carbon::parse($appointment->appointment_date)->format('d M Y') }}
                            </p>
                            <p class="mb-1">
                                <strong>Time:</strong> {{ \Carbon\Carbon::parse($appointment->appointment_time)->format('h:i A') }}
                            </p>
                            <p class="mb-2">
                                <strong>Status:</strong>
                                @if($appointment->status == 'confirmed')
                                    <span class="badge bg-success">Confirmed</span>
                                @elseif($appointment->status == 'pending')
                                    <span class="badge bg-warning text-dark">Pending</span>
                                @else
                                    <span class="badge bg-danger">Cancelled</span>
                                @endif
                            </p>
                            <div class="d-flex justify-content-end gap-2">
                                <a href="#" class="btn btn-sm btn-outline-info">
                                    <i class="bi bi-eye"></i> View
                                </a>
                                <a href="#" class="btn btn-sm btn-outline-danger">
                                    <i class="bi bi-x-circle"></i> Cancel
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
</div>
@endsection
