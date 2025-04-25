@extends('layouts.app-doc')

@section('title', 'My Appointments')

@section('content')

    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="text-primary fw-bold">Appointment Requests</h2>
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
                @if ($appointment->status == 'pending')
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
                                <p class="mb-1">
                                    <strong>Note:</strong>
                                    {{$appointment->notes}}
                                </p>
                                <div class="d-flex justify-content-end gap-2">
                                    <a href="{{route('doctor.acceptappointment',$appointment->id)}}" class="btn btn-sm btn-outline-info">
                                        <i class="bi bi-eye"></i> Accpet
                                    </a>
                                    <a href="#" class="btn btn-sm btn-outline-danger">
                                        <i class="bi bi-x-circle"></i> Cancel
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
            @endforeach
        </div>
    @endif
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="text-primary fw-bold">My Appointments</h2>
    </div>
    @if($appointments->isEmpty())
        <div class="alert alert-info text-center">
            No appointments found.
        </div>
    @else
    <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
        @foreach($appointments as $appointment)
            @if($appointment->status == "confirmed")
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
                            <p class="mb-1">
                                <strong>Note:</strong> {{ $appointment->notes }}
                            </p>

                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-sm btn-outline-success" data-bs-toggle="modal" data-bs-target="#completeModal{{ $appointment->id }}">
                                <i class="bi bi-check-circle"></i> Completed
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Modal -->
                <div class="modal fade" id="completeModal{{ $appointment->id }}" tabindex="-1" aria-labelledby="modalLabel{{ $appointment->id }}" aria-hidden="true">
                    <div class="modal-dialog">
                        <form action="{{ route('doctor.appointmentcomplete', $appointment->id) }}" method="POST">
                            @csrf
                            <div class="modal-content rounded-4 shadow">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="modalLabel{{ $appointment->id }}">Mark Appointment as Completed</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <p><strong>Patient:</strong> {{ $appointment->patient->name }}</p>
                                    <p><strong>Date:</strong> {{ \Carbon\Carbon::parse($appointment->appointment_date)->format('d M Y') }}</p>
                                    <p><strong>Time:</strong> {{ \Carbon\Carbon::parse($appointment->appointment_time)->format('h:i A') }}</p>

                                    <div class="mb-3">
                                        <label for="notes{{ $appointment->id }}" class="form-label">Prescription / Notes</label>
                                        <textarea name="notes" id="notes{{ $appointment->id }}" class="form-control" rows="4" placeholder="Write diagnosis, prescribed medicines, or any advice..."></textarea>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                    <button type="submit" class="btn btn-primary">Confirm & Complete</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            @endif
        @endforeach
    </div>

    @endif
@endsection
