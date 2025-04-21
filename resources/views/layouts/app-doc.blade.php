<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Telemedicine Platform')</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">

    <style>
        body {
            background: linear-gradient(135deg, #6a11cb, #2575fc);
            color: #fff;
        }

        .card {
            border: none;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }

        .card-header {
            border-radius: 10px 10px 0 0;
        }

        .btn-primary {
            background-color: #2575fc;
            border: none;
        }

        .btn-primary:hover {
            background-color: #1a5bbf;
        }

        .btn-success {
            background-color: #28a745;
            border: none;
        }

        .btn-success:hover {
            background-color: #218838;
        }

        .profile-section {
            margin-top: 20px;
        }

        .profile-details {
            background-color: #f8f9fa;
            padding: 15px;
            border-radius: 5px;
        }

        .profile-details p {
            margin-bottom: 10px;
        }

        /* Navbar styles */
        .navbar {
            background-color: #2575fc;
        }

        .navbar-brand {
            color: #fff;
            font-size: 1.5rem;
        }

        .navbar-nav .nav-link {
            color: #fff;
        }

        .navbar-nav .nav-link:hover {
            color: #ddd;
        }

        .nav-item .dropdown-menu {
            background-color: #2575fc;
            border: none;
        }

        .nav-item .dropdown-menu a {
            color: #fff;
        }

        .nav-item .dropdown-menu a:hover {
            background-color: #1a5bbf;
        }
    </style>
</head>

<body>
    <!-- Static Doctor Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container">
            <a class="navbar-brand" href="#">Telemedicine</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link active" href="{{route('doctor.dashboard')}}">Dashboard</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('doctor.appointments')}}">Appointments</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Consultancy History</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('doctor.profile')}}">Profile</a>
                    </li>
                    @if (Auth::user())
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                {{Auth::user()->name}}
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="#">Edit Profile</a></li>
                                <li><a class="dropdown-item" href="{{route('doctor.logout')}}">Logout</a></li>
                            </ul>
                        </li>
                        <li class="nav-item dropdown ">
                            <a class="nav-link position-relative" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="bi bi-bell fs-5"></i>
                                @if(Auth::user()->unreadNotifications->count() > 0)
                                    <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                                        {{ Auth::user()->unreadNotifications->count() }}
                                    </span>
                                @endif
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end p-2" style="min-width: 300px;">
                                @forelse(Auth::user()->unreadNotifications->take(5) as $notification)
                                    <li class="mb-2">
                                        <div class="small text-muted">{{ $notification->created_at->diffForHumans() }}</div>
                                        <div>{{ $notification->data['message'] ?? 'New notification' }}</div>
                                    </li>
                                @empty
                                    <li class="text-muted text-center">No new notifications</li>
                                @endforelse
                                <li><hr class="dropdown-divider"></li>
                                <li class="text-center"><a href="{{route('doctor.notifications')}}" class="dropdown-item">View All</a></li>
                            </ul>
                        </li>

                    @endif

                </ul>
            </div>
        </div>
    </nav>
    <div>
		@if (Session::has('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Success:</strong> {{ Session::get('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        @if (Session::has('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Error:</strong> {{ Session::get('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

	</div>
    <div class="container min-vh-100 d-flex flex-column pt-4">
        @yield('content')
    </div>


    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>

