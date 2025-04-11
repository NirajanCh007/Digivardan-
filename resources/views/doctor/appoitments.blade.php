@extends('layouts.app-doc')

@section('title', 'Doctor - Appointment')

@section('content')
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
                <tr>
                    <th scope="row">1</th>
                    <td>John Doe</td>
                    <td>2025-04-15</td>
                    <td>10:30 AM</td>
                    <td><span class="badge bg-success">Confirmed</span></td>
                    <td class="text-center">
                        <a href="#" class="btn btn-sm btn-info">View</a>
                        <a href="#" class="btn btn-sm btn-danger">Cancel</a>
                    </td>
                </tr>
                <tr>
                    <th scope="row">2</th>
                    <td>Jane Smith</td>
                    <td>2025-04-16</td>
                    <td>02:00 PM</td>
                    <td><span class="badge bg-warning text-dark">Pending</span></td>
                    <td class="text-center">
                        <a href="#" class="btn btn-sm btn-info">View</a>
                        <a href="#" class="btn btn-sm btn-danger">Cancel</a>
                    </td>
                </tr>
                <tr>
                    <th scope="row">3</th>
                    <td>Michael Brown</td>
                    <td>2025-04-17</td>
                    <td>11:15 AM</td>
                    <td><span class="badge bg-danger">Cancelled</span></td>
                    <td class="text-center">
                        <a href="#" class="btn btn-sm btn-secondary disabled">N/A</a>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>

    <div class="text-end mt-4">
        <a href="#" class="btn btn-success">➕ Add New Appointment</a>
    </div>
</div>


@endsection
