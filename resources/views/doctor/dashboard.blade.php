@extends('layouts.app')

@section('title', 'Admin Dashboard')

@section('content')
    <div class="container">
        <div class="alert alert-success">
            Welcome, <strong>{{ Auth::user()->name }}</strong>! You are logged in as a <strong>Doctor</strong>.
        </div>

        <div class="row">
            <!-- Upcoming Appointments Section -->
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h4>Upcoming Appointments</h4>
                    </div>
                    <div class="card-body">
                        <ul class="list-group">
                            <li class="list-group-item">
                                <strong>Patient:</strong> John Doe<br>
                                <strong>Date:</strong> 2025-04-07<br>
                                <strong>Status:</strong> Confirmed<br>
                                <a href="#" class="btn btn-primary btn-sm mt-2">View Details</a>
                            </li>
                            <li class="list-group-item">
                                <strong>Patient:</strong> Jane Smith<br>
                                <strong>Date:</strong> 2025-04-08<br>
                                <strong>Status:</strong> Pending<br>
                                <a href="#" class="btn btn-primary btn-sm mt-2">View Details</a>
                            </li>
                            <li class="list-group-item">
                                <strong>Patient:</strong> Michael Brown<br>
                                <strong>Date:</strong> 2025-04-09<br>
                                <strong>Status:</strong> Confirmed<br>
                                <a href="#" class="btn btn-primary btn-sm mt-2">View Details</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <!-- Patient Consultation History -->
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h4>Patient Consultation History</h4>
                    </div>
                    <div class="card-body">
                        <ul class="list-group">
                            <li class="list-group-item">
                                <strong>John Doe</strong><br>
                                <span class="text-muted">Consulted on: 2025-03-15</span><br>
                                <a href="#" class="btn btn-info btn-sm mt-2">View Patient Profile</a>
                            </li>
                            <li class="list-group-item">
                                <strong>Jane Smith</strong><br>
                                <span class="text-muted">Consulted on: 2025-02-20</span><br>
                                <a href="#" class="btn btn-info btn-sm mt-2">View Patient Profile</a>
                            </li>
                            <li class="list-group-item">
                                <strong>Michael Brown</strong><br>
                                <span class="text-muted">Consulted on: 2025-01-30</span><br>
                                <a href="#" class="btn btn-info btn-sm mt-2">View Patient Profile</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <!-- Add New Appointment Button -->
        <div class="row mt-4">
            <div class="col-md-12">
                <a href="#" class="btn btn-success">Book New Appointment</a>
            </div>
        </div>
    </div>
@endsection
