<!-- resources/views/patient/dashboard.blade.php -->

@extends('layouts.app')

@section('title', 'Admin Dashboard')

@section('content')
<div class="container mt-5">
    <h2 class="mb-4 text-center">🗂️ All Appointments Overview</h2>

    <div class="card shadow-sm border-0">
      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-striped table-hover align-middle">
            <thead class="table-primary">
              <tr>
                <th scope="col">#</th>
                <th scope="col">Doctor</th>
                <th scope="col">Patient</th>
                <th scope="col">Date</th>
                <th scope="col">Time</th>
                <th scope="col">Status</th>
                <th scope="col">Actions</th>
              </tr>
            </thead>
            <tbody>
              @forelse($appointments as $index => $appointment)
                <tr>
                  <td>{{ $index + 1 }}</td>
                  <td>{{ $appointment->doctor->name ?? 'N/A' }}</td>
                  <td>{{ $appointment->patient->name ?? 'N/A' }}</td>
                  <td>{{ \Carbon\Carbon::parse($appointment->appointment_date)->format('d M Y') }}</td>
                  <td>{{ \Carbon\Carbon::parse($appointment->appointment_time)->format('h:i A') }}</td>
                  <td>
                    @if($appointment->status === 'pending')
                      <span class="badge bg-warning text-dark">Pending</span>
                    @elseif($appointment->status === 'confirmed')
                      <span class="badge bg-success">Confirmed</span>
                    @elseif($appointment->status === 'completed')
                      <span class="badge bg-info">Completed</span>
                    @else
                      <span class="badge bg-secondary">N/A</span>
                    @endif
                  </td>
                  <td>
                    <a href="{{ route('admin.viewAppointment', $appointment->id) }}" class="btn btn-sm btn-outline-primary">
                      View
                    </a>
                  </td>
                </tr>
              @empty
                <tr>
                  <td colspan="7" class="text-center text-muted">No appointments found.</td>
                </tr>
              @endforelse
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>

@endsection
