@extends('layouts.app')

@section('title', 'Login To Digivardan')

@section('content')
    <style>
        :root {
            --primary-color: #2A5C82;
            --secondary-color: #5BA4E6;
            --accent-color: #FF6B6B;
        }

        .auth-container {
            min-height: 100vh;
            background: linear-gradient(rgba(42, 92, 130, 0.9),
                    rgba(91, 164, 230, 0.9)),
                url('{{ asset('images/hero/Reg.jpg') }}');
            background-size: cover;
            background-position: left;
        }

        .form-column {
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
            padding: 2rem;
        }

        .auth-card {
            background: rgba(255, 255, 255, 0.95);
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
            width: 100%;
            max-width: 500px;
            border: none;
            animation: fadeIn 1s ease-in-out;
        }

        .card-header {
            background: var(--primary-color) !important;
            color: white;
            border-radius: 15px 15px 0 0 !important;
            padding: 1.5rem;
        }

        .btn-primary {
            background: var(--primary-color);
            border: none;
            padding: 0.75rem 1.5rem;
            transition: background-color 0.3s ease;
        }

        .btn-primary:hover {
            background: var(--secondary-color);
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(-20px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .form-control {
            border: 2px solid #e9ecef;
            border-radius: 8px;
            transition: border-color 0.3s ease;
        }

        .form-control:focus {
            border-color: var(--primary-color);
            box-shadow: 0 0 0 3px rgba(42, 92, 130, 0.25);
        }

        .typewriter-container {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: flex-start;
            padding: 2rem;
            min-height: 100vh;
            color: white;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.3);
        }

        .typewriter {
            overflow: hidden;
            white-space: nowrap;
            margin: 0 auto;
            font-size: 1.9rem;
            font-weight: 500;
            animation: typing 3.5s steps(40, end) forwards;
        }

        .typewriter-line1 {
            width: 0;
            animation-delay: 0s;
        }

        .typewriter-line2 {
            width: 0;
            animation-delay: 4s;
        }

        .typewriter-line3 {
            width: 0;
            animation-delay: 8s;
        }

        @keyframes typing {
            from {
                width: 0
            }

            to {
                width: 100%
            }
        }
    </style>

    <div class="container-fluid auth-container">
        <div class="row">
            <!-- Left Content Column -->
            <div class="col-md-6 content-column d-none d-md-block">
                <div class="typewriter-container">
                    <div class="typewriter typewriter-line1">
                        Welcome Back to DigiVardan,

                    </div>
                    <div class="typewriter typewriter-line2 mt-4">
                        You can now access to your account,
                    </div>
                    <div class="typewriter typewriter-line3 mt-4">
                        Explore telemedical journey....
                    </div>
                </div>
            </div>

            <!-- Right Form Column -->
            <div class="col-md-6 form-column">
                <div class="auth-card card">
                    <div class="card-header text-center">
                        <h4 class="mb-0"><i class="fas fa-sign-in-alt me-2"></i>Login</h4>
                    </div>
                    <div class="card-body p-4">
                        <form method="POST" action="{{ route('login') }}">
                            @csrf
                            <div class="mb-4">
                                <label for="email" class="form-label">Email Address</label>
                                <input type="email" name="email" id="email" class="form-control" required>
                            </div>

                            <div class="mb-4">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" name="password" id="password" class="form-control" required>
                            </div>

                            <div class="d-grid mb-4">
                                <button type="submit" class="btn btn-primary py-2">
                                    Login
                                </button>
                            </div>

                            <div class="text-center">
                                <p class="mb-0">New to DigiVardan?
                                    <a href="{{ route('register') }}" class="text-accent">Create Account</a>
                                </p>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @if ($errors->any())
        <div class="alert alert-danger mt-4">
            <i class="fas fa-exclamation-triangle me-2"></i>
            @foreach ($errors->all() as $error)
                <div>{{ $error }}</div>
            @endforeach
        </div>
    @endif
@endsection
