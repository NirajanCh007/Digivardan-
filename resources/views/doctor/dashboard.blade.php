@extends('layouts.app')

@section('title', 'Admin Dashboard')

@section('content')
    <div class="container">
        <div class="alert alert-warning">
            Welcome, <strong>{{ Auth::user()->name }}</strong>! You are logged in as an <strong>Admin</strong>.
        </div>
        <!-- Add admin-specific features here -->
    </div>
@endsection
