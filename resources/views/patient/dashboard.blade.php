@extends('layouts.app')

@section('title', 'Patient Dashboard')

@section('content')
    <div class="container">
        <div class="alert alert-success">
            Welcome, <strong>{{ Auth::user()->name }}</strong>! You are logged in as a <strong>Patient</strong>.
        </div>
        <!-- Add patient-specific features here -->
    </div>
@endsection
