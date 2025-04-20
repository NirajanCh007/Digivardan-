@extends('layouts.app-patient')

@section('title', 'My Profile')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <!-- Profile Card -->
            <div class="card shadow-sm border-0 rounded-4 mb-5">
                <div class="card-header bg-primary text-white rounded-top-4">
                    <h4 class="mb-0">🧑‍💼 Patient Profile</h4>
                </div>

                <div class="card-body">
                    <div class="row g-4 align-items-center">
                        <div class="col-md-4 text-center">
                            <img src="https://ui-avatars.com/api/?name={{ urlencode(Auth::user()->name) }}&background=0D8ABC&color=fff&size=128"
                                alt="Profile" class="rounded-circle border shadow" width="120">
                        </div>

                        <div class="col-md-8">
                            <h5 class="fw-bold text-dark mb-2">{{ Auth::user()->name }}</h5>
                            <p class="mb-1"><strong>Email:</strong> {{ Auth::user()->email }}</p>
                            <p class="mb-1"><strong>Role:</strong> {{ ucfirst(Auth::user()->role) }}</p>

                            <hr>

                            <a href="#" class="btn btn-outline-primary btn-sm me-2">
                                <i class="bi bi-pencil-square"></i> Edit Profile
                            </a>
                            <a href="{{ route('logout') }}" class="btn btn-outline-danger btn-sm">
                                <i class="bi bi-box-arrow-right"></i> Logout
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Appointments Section -->
            <h4 class="mb-3 fw-bold text-primary">📋 My Appointments</h4>
            <div class="row row-cols-1 row-cols-md-2 g-4">
                @forelse($appointments as $appointment)
                    <div class="col">
                        <div class="card border-0 shadow-sm h-100 rounded-4">
                            <div class="card-body">
                                <h5 class="card-title text-dark fw-bold">Dr. {{ $appointment->doctor->name ?? 'Unknown' }}</h5>
                                <p class="mb-1"><strong>Date:</strong> {{ \Carbon\Carbon::parse($appointment->appointment_date)->format('Y-m-d') }}</p>
                                <p class="mb-1"><strong>Time:</strong> {{ \Carbon\Carbon::parse($appointment->appointment_time)->format('h:i A') }}</p>
                                <p class="mb-2">
                                    <strong>Status:</strong>
                                    @if($appointment->status === 'confirmed')
                                        <span class="badge bg-success">Confirmed</span>
                                    @elseif($appointment->status === 'pending')
                                        <span class="badge bg-warning text-dark">Pending</span>
                                    @else
                                        <span class="badge bg-danger">Cancelled</span>
                                    @endif
                                </p>
                                <a href="#" class="btn btn-outline-danger btn-sm">Cancel</a>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col">
                        <div class="alert alert-info w-100">
                            You have no appointments yet.
                        </div>
                    </div>
                @endforelse
            </div>
        </div>
    </div>
</div>
@endsection
