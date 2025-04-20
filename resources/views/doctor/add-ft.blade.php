@extends('layouts.app-doc')

@section('title', 'Admin Dashboard')

@section('content')
<form action="{{ route('doctor.storefreetime') }}" method="POST">
    @csrf
    <div class="mb-3">
        <label for="available_date" class="form-label">Date</label>
        <input type="date" name="available_date" class="form-control" required>
    </div>

    <div class="mb-3">
        <label for="available_time" class="form-label">Time</label>
        <input type="time" name="available_time" class="form-control" required>
    </div>

    <button type="submit" class="btn btn-primary">Post Availability</button>
</form>

@endsection
