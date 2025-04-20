@extends('layouts.app-doc')

@section('title', 'Doctor Profile')

@section('content')
<div class="container py-5">
    <h2 class="mb-4 text-dark fw-bold">👨‍⚕️ Doctor Profile</h2> <!-- Changed text-primary to text-dark -->

    @session('success')

    @endsession
    @if(!$doctorInfoExists)
        <!-- Alert to show profile needs completion -->
        <div class="alert alert-warning">
            <strong>Action Required:</strong> You need to complete your profile to appear on the platform.
        </div>

        <!-- Button to open Bootstrap modal -->
        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#profileModal">
            Complete Your Profile
        </button>

        <!-- Modal for doctor profile form -->
        <div class="modal fade" id="profileModal" tabindex="-1" aria-labelledby="profileModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <form action="{{ route('doctor.storeinfo') }}" method="POST" enctype="multipart/form-data" class="modal-content">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title text-dark" id="profileModalLabel">Complete Your Profile</h5> <!-- Changed text-dark -->
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <div class="modal-body row g-3">
                        <div class="col-md-6">
                            <label class="form-label text-dark">Specialization</label> <!-- Changed text-dark -->
                            <input type="text" name="specialization" class="form-control" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label text-dark">Experience (years)</label> <!-- Changed text-dark -->
                            <input type="number" name="experience" class="form-control" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label text-dark">Qualification</label> <!-- Changed text-dark -->
                            <input type="text" name="qualification" class="form-control" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label text-dark">Clinic Name (optional)</label> <!-- Changed text-dark -->
                            <input type="text" name="clinic_name" class="form-control">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label text-dark">Location</label> <!-- Changed text-dark -->
                            <input type="text" name="location" class="form-control">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label text-dark">Phone Number</label> <!-- Changed text-dark -->
                            <input type="text" name="phone" class="form-control">
                        </div>
                        <div class="col-md-12">
                            <label class="form-label text-dark">Short Bio</label> <!-- Changed text-dark -->
                            <textarea name="bio" class="form-control" rows="3"></textarea>
                        </div>
                        <div class="col-md-12">
                            <label class="form-label text-dark">Profile Image (Optional)</label> <!-- Changed text-dark -->
                            <input type="file" name="profile_image" class="form-control">
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="submit" class="btn btn-success">Save Profile</button>
                    </div>
                </form>
            </div>
        </div>
    @else
        <!-- If doctor profile exists, display profile -->
        <div class="card shadow-sm border-0 rounded-4">
            <div class="row g-0">
                <div class="col-md-4 text-center p-4">
                    @if($doctor->profile_image)
                        <img src="{{ asset('uploads/doctors/' . $doctor->profile_image) }}" class="img-fluid rounded-circle border" style="max-width: 200px;">
                    @else
                        <div class="text-muted">No Profile Image</div>
                    @endif
                </div>
                <div class="col-md-8 p-4">
                    <h4 class="fw-bold text-dark">{{ Auth::user()->name }}</h4> <!-- Changed text-dark -->
                    <p class="mb-1 text-dark"><strong>Specialization:</strong> {{ $doctor->specialization }}</p> <!-- Changed text-dark -->
                    <p class="mb-1 text-dark"><strong>Experience:</strong> {{ $doctor->experience }} years</p> <!-- Changed text-dark -->
                    <p class="mb-1 text-dark"><strong>Qualification:</strong> {{ $doctor->qualification }}</p> <!-- Changed text-dark -->
                    <p class="mb-1 text-dark"><strong>Clinic:</strong> {{ $doctor->clinic_name ?? 'N/A' }}</p> <!-- Changed text-dark -->
                    <p class="mb-1 text-dark"><strong>Location:</strong> {{ $doctor->location ?? 'N/A' }}</p> <!-- Changed text-dark -->
                    <p class="mb-1 text-dark"><strong>Phone:</strong> {{ $doctor->phone ?? 'N/A' }}</p> <!-- Changed text-dark -->
                    <hr>
                    <p class="text-dark">{{ $doctor->bio }}</p> <!-- Changed text-dark -->
                </div>
            </div>
        </div>
    @endif
</div>
@endsection
