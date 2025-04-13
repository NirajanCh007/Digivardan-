@extends('layouts.app-doc')

@section('title', 'Admin Dashboard')

@section('content')
<div class="container py-5 ">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-sm border-0">
                <div class="card-header bg-primary text-white fw-bold">
                    ➕ Schedule New Appointment
                </div>
                <div class="card-body">
                    <form action="{{route('doctor.storeapt')}}" method="POST">
                        @csrf

                        <div class="mb-3">
                            <label for="patient_id" class="form-label">Select Patient</label>
                            <select name="patient_id" class="form-select" required>
                                <option value="" disabled selected>-- Choose Patient --</option>
                                @foreach($patients as $patient)
                                    <option value="{{ $patient->id }}">{{ $patient->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="appointment_date" class="form-label">Appointment Date</label>
                            <input type="date" name="appointment_date" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label for="appointment_time" class="form-label">Appointment Time</label>
                            <input type="time" name="appointment_time" class="form-control" required>
                        </div>

                        <div class="d-grid gap-2">
                            <button type="submit" class="btn btn-success">
                                <i class="bi bi-calendar-plus"></i> Book Appointment
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
