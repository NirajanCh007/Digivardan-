@extends('layouts.app')

@section('title', 'User Profile')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Dashboard</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <h3>Welcome, {{ Auth::user()->name }}!</h3>
                        <p>You are logged in!</p>

                        <hr>

                        <div class="profile-section">
                            <h4>Your Profile</h4>
                            <div class="profile-details">
                                <p><strong>Name:</strong> {{ Auth::user()->name }}</p>
                                <p><strong>Email:</strong> {{ Auth::user()->email }}</p>
                                <p><strong>Role:</strong> {{ ucfirst(Auth::user()->role) }}</p>
                            </div>

                            {{-- <!-- Role Update Form -->
                            <form method="POST" action="{{ route('roles.update') }}">
                                @csrf
                                <div class="mb-3">
                                    <label for="role" class="form-label">Choose Role</label>
                                    <select name="role" id="role" class="form-control" required>
                                        <option value="patient" {{ Auth::user()->role === 'patient' ? 'selected' : '' }}>
                                            Patient</option>
                                        <option value="doctor" {{ Auth::user()->role === 'doctor' ? 'selected' : '' }}>
                                            Doctor</option>
                                        <option value="admin" {{ Auth::user()->role === 'admin' ? 'selected' : '' }}>Admin
                                        </option>
                                    </select>
                                </div>
                                <div class="d-grid">
                                    <button type="submit" class="btn btn-primary">Update Role</button>
                                </div>
                            </form> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
