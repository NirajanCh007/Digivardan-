<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> DigiVardan - Advanced Telemedicine Platform</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        <style>.navbar {
            padding: 1rem 0;
            box-shadow: 0 2px 15px rgba(0, 0, 0, 0.1);
        }

        .nav-link {
            position: relative;
            margin: 0 1rem;
            transition: all 0.3s ease;
        }

        .nav-link::after {
            content: '';
            position: absolute;
            width: 0;
            height: 2px;
            bottom: 0;
            left: 0;
            background-color: var(--accent-color);
            transition: width 0.3s ease;
        }

        .nav-link:hover::after,
        .nav-link.active::after {
            width: 100%;
        }

        .btn-accent {
            background-color: var(--accent-color);
            color: white;
            border: none;
            padding: 0.5rem 1.5rem;
        }

        .btn-accent:hover {
            background-color: #ff5252;
        }

        :root {
            --primary-color: #2A5C82;
            --secondary-color: #5BA4E6;
            --accent-color: #FF6B6B;
        }

        .hero-section {
            background: linear-gradient(rgba(42, 92, 130, 0.9), rgba(91, 164, 230, 0.9)),
                url('{{ asset('images/hero/medical-team.png') }}');
            background-size: cover;
            background-position: center;
            height: 150vh;
            display: flex;
            align-items: center;
            color: white;
        }

        .testimonial-sidebar {
            background: #fff9f0;
            /* Pale yellow background */
            border: 2px solid #ffd8a8;
            /* Light orange border */
        }

        .testimonial-sidebar h3 {
            color: #b22222;
            /* Rich red for title */
            border-bottom: 2px solid #ff4500;
            /* Orange-red underline */
            padding-bottom: 0.5rem;
        }

        .doctor-card {
            background: linear-gradient(145deg, #fff0f0 0%, #fff9eb 100%);
            border-left: 4px solid #ff6b6b !important;
            /* Coral red accent */
        }

        .testimonial-sidebar h5 {
            color: #cc5500;
            /* Burnt orange for names */
        }

        .testimonial-sidebar .text-muted {
            color: #daa520 !important;
            /* Golden yellow for specialties */
        }

        .testimonial-sidebar p {
            color: #8b0000 !important;
            /* Dark red for text */
            line-height: 1.6;
        }

        /* Hover effects using yellow */
        .doctor-card:hover {
            background: linear-gradient(145deg, #fff9eb 0%, #fff0f0 100%);
            box-shadow: 0 5px 15px rgba(255, 140, 0, 0.15);
            border-left-color: #ffd700 !important;
            /* Bright yellow on hover */
        }

        /* .testimonial-sidebar {
            background: rgba(255, 255, 255, 0.98);
            border-radius: 15px;
            padding: 2rem;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            color: var(--primary-color);
        }

        .doctor-card {
            transition: all 0.3s ease;
            border-left: 4px solid var(--primary-color);
        }

        .doctor-card:hover {
            transform: translateX(10px);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        } */

        .feature-icon {
            width: 60px;
            height: 60px;
            background: var(--primary-color);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
        }

        .cta-pulse {
            animation: pulse 2s infinite;
        }

        .about-section {
            background: rgba(255, 255, 255, 0.98);
            padding: 5rem 0;
        }

        .footer {
            background: var(--primary-color);
            color: white;
            padding: 3rem 0;
        }


        @keyframes pulse {
            0% {
                transform: scale(1);
            }

            50% {
                transform: scale(1.05);
            }

            100% {
                transform: scale(1);
            }
        }
    </style>
</head>

<body>
    <!-- Navigation Bar -->
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top" style="background-color: var(--primary-color);">
        <div class="container">
            <a class="navbar-brand" href="#">
                <i class="fas fa-hospital me-2"></i>
                DigiVardan
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link active" href="#home">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#features">Features</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#about">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#contact">Contact</a>
                    </li>
                    <li class="nav-item ms-lg-3">
                        <a href="{{ route('login') }}" class="btn btn-outline-light">Login</a>
                    </li>
                    <li class="nav-item ms-lg-2">
                        <a href="{{ route('register') }}" class="btn btn-accent">Register</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Enhanced Hero Section -->
    <section class="hero-section">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-7 text-center text-lg-start">
                    <h1 class="display-3 mb-4">Redefining Digital Healthcare with DigiVardan</h1>
                    <p class="lead mb-5">Connect with specialist doctors in under 15 minutes- the era of advance
                        telemedicine is here!</p>
                    <div class="d-flex gap-3 justify-content-center justify-content-lg-start">
                        <a href="{{ route('register') }}" class="btn btn-light btn-lg px-5 cta-pulse">
                            Start Consultation <i class="fas fa-stethoscope ms-2"></i>
                        </a>
                    </div>
                </div>
                <div class="col-lg-5 mt-5 mt-lg-0">
                    <div class="testimonial-sidebar">
                        <h3 class="mb-4 text-center"><i class="fas fa-comment-medical me-2"></i>Doctor Testimonials</h3>

                        <!-- Doctor Testimonial 1 -->
                        <div class="doctor-card mb-4 p-3">
                            <div class="d-flex align-items-center">
                                <img src="{{ asset('images/testimonials/testimonies.png') }}"
                                    class="rounded-circle me-3" alt="Dr. Bipin Chaudhary"
                                    style="width: 60px; height: 60px; object-fit: cover;">
                                <div>
                                    <h5 class="mb-0">Dr. Bipin Chaudhary</h5>
                                    <small class="text-muted">Cardiologist</small>
                                </div>
                            </div>
                            <p class="mt-3 mb-0">"This platform has revolutionized how I manage chronic disease patients
                                remotely."</p>
                        </div>

                        <!-- Doctor Testimonial 2 -->
                        <div class="doctor-card mb-4 p-3">
                            <div class="d-flex align-items-center">
                                <img src="{{ asset('images/testimonials/testimonies.png') }}"
                                    class="rounded-circle me-3" alt="Dr. Prabin chaudhary"
                                    style="width: 60px; height: 60px; object-fit: cover;">
                                <div>
                                    <h5 class="mb-0">Dr. Prabin Chaudhary</h5>
                                    <small class="text-muted">General-Physician </small>
                                </div>
                            </div>
                            <p class="mt-3 mb-0">"The integrated patient history system saves me 20+ hours weekly in
                                documentation."</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Key Features Section -->
    <section class="py-5 bg-light">
        <div class="container">
            <div class="row g-5">
                <div class="col-md-4 text-center">
                    <div class="feature-icon mx-auto mb-3">
                        <i class="fas fa-video fa-lg"></i>
                    </div>
                    <h4>HD Video Consultations</h4>
                    <p>Crystal-clear 1080p video with medical-grade encryption</p>
                </div>

                <div class="col-md-4 text-center">
                    <div class="feature-icon mx-auto mb-3">
                        <i class="fas fa-file-medical fa-lg"></i>
                    </div>
                    <h4>Smart e-Prescriptions</h4>
                    <p>AI-powered prescription suggestions with drug interaction checks</p>
                </div>

                <div class="col-md-4 text-center">
                    <div class="feature-icon mx-auto mb-3">
                        <i class="fas fa-chart-line fa-lg"></i>
                    </div>
                    <h4>Health Analytics</h4>
                    <p>Comprehensive patient health tracking and trend analysis</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Key Features Section -->
    <section class="py-5 bg-light"> </section>
    <!-- About Section -->
    <section class="about-section">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 mb-4 mb-lg-0">
                    <img src="{{ asset('images/logos/team.jpg') }}" alt="Our Medical Team"
                        class="img-fluid rounded-3 shadow-lg">
                </div>
                <div class="col-lg-6">
                    <h2 class="display-5 mb-4">About Digivardan</h2>
                    <p class="lead mb-4">
                        Revolutionizing healthcare delivery through innovative telemedicine solutions.
                        Our platform bridges the gap between patients and medical professionals,
                        ensuring quality care reaches every corner.
                    </p>
                    <div class="doctor-card p-4 mb-4">
                        <h4 class="mb-3">Key Features</h4>
                        <ul class="list-unstyled">
                            <li class="mb-3">
                                <i class="fas fa-check-circle text-success me-2"></i>
                                24/7 Access to Certified Specialists
                            </li>
                            <li class="mb-3">
                                <i class="fas fa-check-circle text-success me-2"></i>
                                Secure Patient Data Management
                            </li>
                            <li class="mb-3">
                                <i class="fas fa-check-circle text-success me-2"></i>
                                Multi-Language Support
                            </li>

                            <li class="mb-3">
                                <i class="fas fa-check-circle text-success me-2"></i>
                                Appointment Booking System
                            </li>

                            <li class="mb-3">
                                <i class="fas fa-check-circle text-success me-2"></i>
                                Video Consultation Integration
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer Section -->
    <footer class="footer">
        <div class="container">
            <div class="row g-4">
                <div class="col-md-4">
                    <h4 class="mb-4">DigiVardan</h4>
                    <p>Your Trusted Telemedicine Partner</p>
                    <div class="social-links">
                        <a href="#" class="text-white me-3"><i class="fab fa-facebook"></i></a>
                        <a href="#" class="text-white me-3"><i class="fab fa-twitter"></i></a>
                        <a href="#" class="text-white"><i class="fab fa-linkedin"></i></a>
                    </div>
                </div>
                <div class="col-md-4">
                    <h5 class="mb-4">Quick Links</h5>
                    <ul class="list-unstyled">
                        <li class="mb-2"><a href="#" class="text-white">Patient Portal</a></li>
                        <li class="mb-2"><a href="#" class="text-white">Doctor Login</a></li>
                        <li class="mb-2"><a href="#" class="text-white">Emergency Services</a></li>
                    </ul>
                </div>
                <div class="col-md-4">
                    <h5 class="mb-4">Contact</h5>
                    <p class="mb-2"><i class="fas fa-map-marker-alt me-2"></i>Itahari, Nepal</p>
                    <p class="mb-2"><i class="fas fa-phone me-2"></i>+977-9805397279</p>
                    <p class="mb-0"><i class="fas fa-envelope me-2"></i>support@Digivardan.com</p>
                </div>
            </div>
            <hr class="my-4">
            <div class="text-center">
                <p class="mb-0">&copy; 2023 DigiVardan. All rights reserved.</p>
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
