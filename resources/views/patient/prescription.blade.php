@extends('layouts.app-pat')

@section('title', 'Prescription Details')

@section('content')
<div class="container py-5">
    <div class="card shadow border-0 rounded-4">
        <div class="card-body p-4">
            <h2 class="mb-4 text-primary fw-bold">🩺 Prescription Details</h2>

            <div class="row mb-3">
                <div class="col-md-6">
                    <p><strong>Patient:</strong> {{ $prescription->patient->name ?? 'N/A' }}</p>
                </div>
                <div class="col-md-6">
                    <p><strong>Doctor:</strong> Dr. {{ $prescription->doctor->name ?? 'N/A' }}</p>
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-md-6">
                    <p><strong>Appointment Date:</strong>
                        {{ \Carbon\Carbon::parse($prescription->appointment->appointment_date)->format('d M Y') }}</p>
                </div>
                <div class="col-md-6">
                    <p><strong>Time:</strong>
                        {{ \Carbon\Carbon::parse($prescription->appointment->appointment_time)->format('h:i A') }}</p>
                </div>
            </div>

            <hr>

            <div class="mb-3">
                <h5 class="text-success">Diagnosis</h5>
                <p class="text-muted">{{ $prescription->diagnosis ?? 'Not Provided' }}</p>
            </div>

            <div class="mb-3">
                <h5 class="text-success">Medicines</h5>
                <p class="text-muted">{{ $prescription->medicines ?? 'No medicines prescribed' }}</p>
            </div>

            <div class="mb-3">
                <h5 class="text-success">Additional Notes</h5>
                <p class="text-muted">{{ $prescription->notes ?? 'None' }}</p>
            </div>

            <div class="text-end">
                <a href="{{ route('patient.checkappointments') }}" class="btn btn-outline-secondary">
                    <i class="bi bi-arrow-left"></i> Back to Appointments
                </a>
            </div>
        </div>
    </div>
</div>
@endsection
