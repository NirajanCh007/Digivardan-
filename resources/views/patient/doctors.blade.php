@extends('layouts.app-pat')

@section('title', 'Available Doctors')

@section('content')
<div class="container py-5">
    <h2 class="text-primary fw-bold mb-4">👨‍⚕️ Available Doctors</h2>
    <p class="text-muted mb-4">Showing doctors not appointed on <strong>April 15, 2025 at 10:00 AM</strong></p>

    <div class="row g-4">
        <!-- Doctor Card 1 -->
        <div class="col-md-4">
            <div class="card shadow-sm border-0 h-100">
                <div class="card-body">
                    <h5 class="card-title text-primary">Dr. Ayesha Khan</h5>
                    <p class="card-text">
                        <strong>Specialization:</strong> Cardiologist<br>
                        <strong>Experience:</strong> 10+ years<br>
                        <strong>Location:</strong> City Clinic, Main Road
                    </p>
                    <a href="#" class="btn btn-outline-primary w-100 mt-2">Book Appointment</a>
                </div>
            </div>
        </div>

        <!-- Doctor Card 2 -->
        <div class="col-md-4">
            <div class="card shadow-sm border-0 h-100">
                <div class="card-body">
                    <h5 class="card-title text-primary">Dr. Raj Mehta</h5>
                    <p class="card-text">
                        <strong>Specialization:</strong> Dermatologist<br>
                        <strong>Experience:</strong> 7 years<br>
                        <strong>Location:</strong> Health First Clinic
                    </p>
                    <a href="#" class="btn btn-outline-primary w-100 mt-2">Book Appointment</a>
                </div>
            </div>
        </div>

        <!-- Doctor Card 3 -->
        <div class="col-md-4">
            <div class="card shadow-sm border-0 h-100">
                <div class="card-body">
                    <h5 class="card-title text-primary">Dr. Sneha Verma</h5>
                    <p class="card-text">
                        <strong>Specialization:</strong> General Physician<br>
                        <strong>Experience:</strong> 5 years<br>
                        <strong>Location:</strong> Metro Wellness Center
                    </p>
                    <a href="#" class="btn btn-outline-primary w-100 mt-2">Book Appointment</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Back to Dashboard -->
    <div class="mt-5 text-center">
        <a href="#" class="btn btn-secondary">← Back to Dashboard</a>
    </div>
</div>
@endsection
