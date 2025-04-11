@extends('layouts.app-pat')

@section('title', 'Patient Dashboard')

@section('content')
  <div class="container py-5">

    <!-- Welcome Message -->
    <div class="card shadow-sm mb-4">
      <div class="card-body">
        <h2 class="card-title">
          Welcome, <span class="text-primary fw-bold">{{ Auth::user()->name }}</span> 🧑‍💼
        </h2>
        <p class="text-muted mb-0">You are logged in as a <strong class="text-info">Patient</strong>.</p>
      </div>
    </div>
    <div class="row g-4">
      <div class="col-md-6">
        <div class="card shadow-sm h-100">
          <div class="card-body">
            <h4 class="card-title mb-4">📅 Your Appointments</h4>

            <div class="border rounded p-3 mb-3">
              <p><strong>Doctor:</strong> Dr. Sarah Khan</p>
              <p><strong>Date:</strong> 2025-04-14</p>
              <p><strong>Status:</strong> <span class="text-warning fw-semibold">Pending</span></p>
              <a href="#" class="btn btn-link p-0">View Details</a>
            </div>

            <div class="border rounded p-3">
              <p><strong>Doctor:</strong> Dr. Adeel Hussain</p>
              <p><strong>Date:</strong> 2025-04-05</p>
              <p><strong>Status:</strong> <span class="text-success fw-semibold">Completed</span></p>
              <a href="#" class="btn btn-link p-0">View Report</a>
            </div>

          </div>
        </div>
      </div>
      <div class="col-md-6">
        <div class="card shadow-sm h-100">
          <div class="card-body">
            <h4 class="card-title mb-4">📖 Medical History</h4>

            <div class="border rounded p-3 mb-3">
              <p><strong>Condition:</strong> Migraine</p>
              <p><strong>Last Consultation:</strong> 2025-03-12</p>
              <a href="#" class="btn btn-link p-0">View Prescription</a>
            </div>

            <div class="border rounded p-3">
              <p><strong>Condition:</strong> Seasonal Allergy</p>
              <p><strong>Last Consultation:</strong> 2025-02-28</p>
              <a href="#" class="btn btn-link p-0">View Prescription</a>
            </div>

          </div>
        </div>
      </div>
    </div>
    <div class="text-center mt-5">
      <a href="#" class="btn btn-primary btn-lg rounded-pill px-4">
        ➕ Book Appointment
      </a>
    </div>

  </div>

@endsection
