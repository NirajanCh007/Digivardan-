@extends('layouts.app-doc')

@section('title', 'My Notifications')

@section('content')
<div class="container py-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="text-primary fw-bold">🔔 My Notifications</h2>
        @if ($notifications->whereNull('read_at')->count() > 0)
            <form action="{{ route('doctor.markAllNotifications') }}" method="POST">
                @csrf
                @method('PUT')
                <button type="submit" class="btn btn-outline-success btn-sm">Mark All as Read</button>
            </form>
        @endif
    </div>

    @if ($notifications->count() > 0)
        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
            @foreach ($notifications as $notification)
                <div class="col">
                    <div class="card shadow-sm border-0 h-100 {{ is_null($notification->read_at) ? 'bg-light' : '' }}">
                        <div class="card-body">
                            <h6 class="card-subtitle mb-2 text-muted">
                                {{ $notification->created_at->diffForHumans() }}
                                @if(is_null($notification->read_at))
                                    <span class="badge bg-warning text-dark ms-2">New</span>
                                @endif
                            </h6>
                            <p class="card-text">{{ $notification->data['message'] ?? 'You have a new notification.' }}</p>
                        </div>
                        @if(is_null($notification->read_at))
                            <div class="card-footer bg-transparent border-0 text-end">
                                <form action="{{ route('doctor.markNotification', $notification->id) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <button type="submit" class="btn btn-sm btn-outline-primary">Mark as Read</button>
                                </form>
                            </div>
                        @endif
                    </div>
                </div>
            @endforeach
        </div>
    @else
        <div class="alert alert-info text-center">You have no notifications.</div>
    @endif
</div>
@endsection
