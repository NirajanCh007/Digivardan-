@extends('layouts.app')

@section('title', 'About Us')

@section('content')
<div class="container py-5">
    <h2 class="text-primary fw-bold mb-4">About Us</h2>
    <div class="row align-items-center">
        <div class="col-md-6">
            <p class="lead text-muted">
                We are committed to revolutionizing healthcare through technology. Our platform enables patients to book appointments, consult doctors, and manage their health records with ease.
            </p>
            <p class="text-muted">
                Backed by experienced healthcare professionals and a skilled development team, we strive to make quality care accessible to all.
            </p>
        </div>
        <div class="col-md-6 text-center">
            <img src="https://via.placeholder.com/450x300" alt="Our Mission" class="img-fluid rounded shadow">
        </div>
    </div>
</div>
@endsection
