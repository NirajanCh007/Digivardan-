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

                    @forelse($appointments as $appointment)
                        @if(in_array($appointment->status, ['pending', 'confirmed']))
                            <div class="border rounded p-3 mb-3">
                                <p><strong>Doctor:</strong> Dr. {{ $appointment->doctor->name ?? 'N/A' }}</p>
                                <p><strong>Specialization:</strong> {{ $appointment->doctor->specialization ?? 'General' }}</p>
                                <p><strong>Phone:</strong> {{ $appointment->doctor->phone ?? 'Not available' }}</p>
                                <p><strong>Date:</strong> {{ \Carbon\Carbon::parse($appointment->appointment_date)->format('F j, Y') }}</p>
                                <p><strong>Time:</strong> {{ \Carbon\Carbon::parse($appointment->appointment_time)->format('g:i A') }}</p>
                                <p>
                                    <strong>Status:</strong>
                                    @if($appointment->status == 'pending')
                                        <span class="text-warning fw-semibold">Pending</span>
                                    @elseif($appointment->status == 'confirmed')
                                        <span class="text-primary fw-semibold">Confirmed</span>
                                    @endif
                                </p>
                                <p><a href="{{route('patient.messages',$appointment->doctor_id)}}">Message</a></p>
                            </div>
                        @endif
                    @empty
                        <div class="alert alert-info">You have no upcoming appointments.</div>
                    @endforelse
                </div>
            </div>
        </div>


      <div class="col-md-6">
        <div class="card shadow-sm h-100">
            <div class="card-body">
                <h4 class="card-title mb-4">📖 Medical History</h4>

                @if ($appointments->isNotEmpty())
                    @foreach ($appointments as $appointment)
                        @if ($appointment->status === 'completed')
                            <div class="mb-3 border-bottom pb-2">
                                <p class="mb-1"><strong>Date:</strong> {{ \Carbon\Carbon::parse($appointment->appointment_date)->format('d M Y') }}</p>
                                <p class="mb-1"><strong>Doctor:</strong> Dr. {{ $appointment->doctor->name ?? 'N/A' }}</p>
                                <p class="mb-1"><strong>Note:</strong> {{ $appointment->notes ?? 'None' }}</p>

                                @if ($appointment->prescription)
                                    <!-- Button trigger modal -->
                                    <button type="button" class="btn btn-sm btn-outline-primary" data-bs-toggle="modal" data-bs-target="#prescriptionModal{{ $appointment->id }}">
                                        View Prescription
                                    </button>

                                    <!-- Modal -->
                                    <div class="modal fade" id="prescriptionModal{{ $appointment->id }}" tabindex="-1" aria-labelledby="prescriptionModalLabel{{ $appointment->id }}" aria-hidden="true">
                                        <div class="modal-dialog modal-lg modal-dialog-centered">
                                            <div class="modal-content rounded-4">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="prescriptionModalLabel{{ $appointment->id }}">🩺 Prescription Details</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <p><strong>Diagnosis:</strong> {{ $appointment->prescription->diagnosis }}</p>
                                                    <p><strong>Medicines:</strong> {{ $appointment->prescription->medicines }}</p>
                                                    <p><strong>Additional Notes:</strong> {{ $appointment->prescription->notes }}</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @else
                                    <p class="text-muted">No prescription available.</p>
                                @endif
                            </div>
                        @endif
                    @endforeach
                @else
                    <div class="alert alert-info">No appointment history found.</div>
                @endif

            </div>
        </div>
    </div>

    </div>
    <div class="text-center mt-5">
      <a href="{{route('patient.checkappointments')}}" class="btn btn-primary btn-lg rounded-pill px-4">
        ➕ Book Appointment
      </a>
    </div>

  </div>

@endsection
