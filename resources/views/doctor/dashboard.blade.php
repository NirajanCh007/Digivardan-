@extends('layouts.app-doc')

@section('title', 'Doctor - Dashboard')

@section('content')
<div class="container py-5">

    <!-- Welcome Message -->
    <div class="card shadow-sm mb-4">
      <div class="card-body">
        <h2 class="card-title">
          Welcome, <span class="text-primary fw-bold">{{ Auth::user()->name }}</span> 👨‍⚕️
        </h2>
        <p class="text-muted mb-0">You are logged in as a <strong class="text-success">Doctor</strong>.</p>
      </div>
    </div>

    <!-- Grid Layout -->
    <div class="row g-4">

      <!-- Upcoming Appointments -->
      <div class="col-md-6">
        <div class="card shadow-sm h-100">
          <div class="card-body">
            <h4 class="card-title mb-4">📅 Upcoming Appointments</h4>

            <div class="border rounded p-3 mb-3">
              <p><strong>Patient:</strong> John Doe</p>
              <p><strong>Date:</strong> 2025-04-07</p>
              <p><strong>Status:</strong> <span class="text-success fw-semibold">Confirmed</span></p>
              <a href="#" class="btn btn-link p-0">View Details</a>
            </div>

            <div class="border rounded p-3 mb-3">
              <p><strong>Patient:</strong> Jane Smith</p>
              <p><strong>Date:</strong> 2025-04-08</p>
              <p><strong>Status:</strong> <span class="text-warning fw-semibold">Pending</span></p>
              <a href="#" class="btn btn-link p-0">View Details</a>
            </div>

            <div class="border rounded p-3">
              <p><strong>Patient:</strong> Michael Brown</p>
              <p><strong>Date:</strong> 2025-04-09</p>
              <p><strong>Status:</strong> <span class="text-success fw-semibold">Confirmed</span></p>
              <a href="#" class="btn btn-link p-0">View Details</a>
            </div>

          </div>
        </div>
      </div>

      <!-- Consultation History -->
      <div class="col-md-6">
        <div class="card shadow-sm h-100">
          <div class="card-body">
            <h4 class="card-title mb-4">📖 Consultation History</h4>

            <div class="border rounded p-3 mb-3">
              <p class="fw-semibold">John Doe</p>
              <p class="text-muted">Consulted on: 2025-03-15</p>
              <a href="#" class="btn btn-link p-0 text-primary">View Patient Profile</a>
            </div>

            <div class="border rounded p-3 mb-3">
              <p class="fw-semibold">Jane Smith</p>
              <p class="text-muted">Consulted on: 2025-02-20</p>
              <a href="#" class="btn btn-link p-0 text-primary">View Patient Profile</a>
            </div>

            <div class="border rounded p-3">
              <p class="fw-semibold">Michael Brown</p>
              <p class="text-muted">Consulted on: 2025-01-30</p>
              <a href="#" class="btn btn-link p-0 text-primary">View Patient Profile</a>
            </div>

          </div>
        </div>
      </div>
    </div>

    <!-- Book Appointment Button -->
    <div class="text-center mt-5">
      <a href="#" class="btn btn-success btn-lg rounded-pill px-4">
        ➕ Book New Appointment
      </a>
    </div>

  </div>

@endsection
