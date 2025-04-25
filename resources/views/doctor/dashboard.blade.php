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

              @forelse ($appointments as $appointment)
                @if(in_array($appointment->status, ['pending', 'confirmed']))
                  <div class="border rounded p-3 mb-3">
                    <p><strong>Patient:</strong> {{ $appointment->patient->name ?? 'Unknown' }}</p>
                    <p><strong>Date:</strong> {{ \Carbon\Carbon::parse($appointment->appointment_date)->format('d M Y') }}</p>
                    <p><strong>Status:</strong>
                      @if($appointment->status == 'pending')
                        <span class="text-warning fw-semibold">Pending</span>
                      @else
                        <span class="text-success fw-semibold">Confirmed</span>
                      @endif
                    </p>
                    <a href="{{ route('doctor.viewAppointment', $appointment->id) }}" class="btn btn-link p-0">View Details</a>
                  </div>
                @endif
              @empty
                <div class="alert alert-info">No upcoming appointments.</div>
              @endforelse

            </div>
          </div>
        </div>

        <!-- Consultation History -->
        <div class="col-md-6">
          <div class="card shadow-sm h-100">
            <div class="card-body">
              <h4 class="card-title mb-4">📖 Consultation History</h4>

              @php
                $completedAppointments = $appointments->where('status', 'completed');
              @endphp

              @forelse ($completedAppointments as $appointment)
                <div class="border rounded p-3 mb-3">
                  <p class="fw-semibold">{{ $appointment->patient->name ?? 'Unknown' }}</p>
                  <p class="text-muted">Consulted on: {{ \Carbon\Carbon::parse($appointment->appointment_date)->format('d M Y') }}</p>
                  <a href="{{ route('doctor.patientProfile', $appointment->patient_id) }}" class="btn btn-link p-0 text-primary">View Patient Profile</a>
                </div>
              @empty
                <div class="alert alert-info">No completed consultations yet.</div>
              @endforelse

            </div>
          </div>
        </div>
      </div>




  </div>

@endsection
