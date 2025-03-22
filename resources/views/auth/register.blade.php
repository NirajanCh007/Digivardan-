@extends('layouts.app')

@section('title', 'Register To Digivardan')

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
            background-position: :left;
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

        .register-btn {
            background: var(--accent-color);
            color: white;
            border: none;
            position: relative;
            overflow: hidden;
            transition: all 0.3s ease;
        }

        .register-btn::after {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg,
                    transparent,
                    rgba(255, 255, 255, 0.3),
                    transparent);
            transition: 0.5s;
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

        /* Match welcome page form styling */
        .form-control {
            border: 2px solid #e9ecef;
            border-radius: 8px;
            transition: border-color 0.3s ease;
        }

        .form-control:focus {
            border-color: var(--primary-color);
            box-shadow: 0 0 0 3px rgba(42, 92, 130, 0.25);
        }



        /* Add typewriter animation styles */
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
            border-right: 2px solid white;
            white-space: nowrap;
            margin: 0 auto;
            font-size: 1.9rem;
            font-weight: 500;
            animation:
                typing 3.5s steps(40, end) forwards,
                blink-caret 0.75s step-end infinite;
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

        @keyframes blink-caret {

            from,
            to {
                border-color: transparent
            }

            50% {
                border-color: rgb(39, 0, 194)
            }
        }
    </style>

    <div class="container-fluid auth-container">
        <div class="row">
            <!-- Left Content Column -->
            <div class="col-md-6 content-column d-none d-md-block">
                <div class="typewriter-container">
                    <div class="typewriter typewriter-line1">
                        Welcome to DigiVardan,
                    </div>
                    <div class="typewriter typewriter-line2 mt-4">
                        Your Digital Health Partner,
                    </div>
                    <div class="typewriter typewriter-line3 mt-4">
                        Care Without Boundaries...
                    </div>
                </div>
            </div>
            <!-- Right Form Column -->
            <div class="col-md-6 auth-form-column">
                <div class="auth-card card">
                    <div class="card-header text-center">
                        <h4 class="mb-0"><i class="fas fa-user-plus me-2"></i>Register</h4>
                    </div>
                    <div class="card-body p-4">
                        <form method="POST" action="{{ route('register') }}">
                            @csrf
                            <div class="mb-3">
                                <label for="name" class="form-label">Name</label>
                                <input type="text" name="name" id="name" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" name="email" id="email" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" name="password" id="password" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label for="password_confirmation" class="form-label">Confirm Password</label>
                                <input type="password" name="password_confirmation" id="password_confirmation"
                                    class="form-control" required>
                            </div>
                            <div class="mb-4">
                                <label for="role" class="form-label">Select Role</label>
                                <select name="role" id="role" class="form-control" required>
                                    <option value="patient">Patient</option>
                                    <option value="doctor">Doctor</option>
                                    <option value="admin">Admin</option>
                                </select>
                            </div>
                            <div class="d-grid">
                                <button type="submit" class="btn register-btn py-2">
                                    Register Now
                                </button>
                            </div>
                            <div class="text-center mt-3">
                                <p class="mb-0">Already have an account?
                                    <a href="{{ route('login') }}" class="text-accent">Login here</a>
                                </p>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
