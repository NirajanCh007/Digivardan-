@extends('layouts.app-pat')

@section('title', 'Free Doctors')

@section('content')
<div class="col-md-6 col-lg-4">
    <div class="card shadow-sm border-0">
        @if ($slot->isNotEmpty())
        <div class="card-body">
            <h5 class="card-title text-primary">{{ $slot->doctor->name }}</h5>
            <p class="card-text mb-1"><strong>Specialization:</strong> {{ $slot->doctor->specialization ?? 'General' }}</p>
            <p class="card-text mb-1"><strong>Available On:</strong> {{ \Carbon\Carbon::parse($slot->available_date)->format('F j, Y') }}</p>
            <p class="card-text mb-3"><strong>Time:</strong> {{ \Carbon\Carbon::parse($slot->available_time)->format('g:i A') }}</p>

            <!-- Button trigger modal -->
            <button type="button" class="btn btn-success w-100" data-bs-toggle="modal" data-bs-target="#noteModal-{{ $slot->id }}">
                Book Appointment
            </button>

            <!-- Modal -->
            <div class="modal fade" id="noteModal-{{ $slot->id }}" tabindex="-1" aria-labelledby="noteModalLabel-{{ $slot->id }}" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content border-0 shadow">
                        <form action="{{ route('patient.book') }}" method="POST">
                            @csrf
                            <input type="hidden" name="availability_id" value="{{ $slot->id }}">
                            <input type="hidden" name="doctor_id" value="{{ $slot->doctor->id }}">
                            <input type="hidden" name="date" value="{{ $slot->available_date }}">
                            <input type="hidden" name="time" value="{{ $slot->available_time }}">

                            <div class="modal-header bg-primary text-white">
                                <h5 class="modal-title" id="noteModalLabel-{{ $slot->id }}">Add Notes for Doctor</h5>
                                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>

                            <div class="modal-body">
                                <div class="mb-3">
                                    <label for="notes-{{ $slot->id }}" class="form-label">Please describe your issue (e.g., skin rash, irritation, etc.):</label>
                                    <textarea name="notes" id="notes-{{ $slot->id }}" class="form-control" rows="4" required></textarea>
                                </div>
                            </div>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                <button type="submit" class="btn btn-success">Confirm Appointment</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>
        @else
        <div class="card-body">
            <div class="alert alert-info">No free doctors found.</div>
        </div>
        @endif
    </div>
</div>

@endsection
