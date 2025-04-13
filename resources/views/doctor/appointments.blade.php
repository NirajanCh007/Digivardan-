@extends('layouts.app-doc')

@section('title', 'Doctor - Appointment')

@section('content')
@session('success')

@endsession
<div class="container py-5">
    <h2 class="mb-4 text-primary fw-bold">📋 My Appointments</h2>

    <div class="table-responsive">
        <table class="table table-bordered align-middle">
            <thead class="table-primary">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Patient Name</th>
                    <th scope="col">Date</th>
                    <th scope="col">Time</th>
                    <th scope="col">Status</th>
                    <th scope="col" class="text-center">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($appointments as $index => $appointment)
                    <tr>
                        <th scope="row">{{ $index + 1 }}</th>
                        <td>{{ $appointment->patient->name ?? 'Unknown' }}</td>
                        <td>{{ \Carbon\Carbon::parse($appointment->appointment_date)->format('Y-m-d') }}</td>
                        <td>{{ \Carbon\Carbon::parse($appointment->appointment_time)->format('h:i A') }}</td>
                        <td>
                            @if($appointment->status == 'confirmed')
                                <span class="badge bg-success">Confirmed</span>
                            @elseif($appointment->status == 'pending')
                                <span class="badge bg-warning text-dark">Pending</span>
                            @else
                                <span class="badge bg-danger">Cancelled</span>
                            @endif
                        </td>
                        <td class="text-center">
                            <a href="#" class="btn btn-sm btn-info">View</a>
                            <a href="#" class="btn btn-sm btn-danger">Cancel</a>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="text-center">No appointments found.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    <div class="text-end mt-4">
        <a href="{{route('doctor.addApt')}}" class="btn btn-success">➕ Add New Appointment</a>
    </div>
    <div class="text-end mt-4">
        <a href="{{route('doctor.addfreetime')}}" class="btn btn-success">➕ Post Free Time</a>
    </div>
</div>


@endsection
