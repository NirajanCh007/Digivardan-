<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Telemedicine Platform')</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
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
    </style>
</head>

<body>
    <div class="container">
        @yield('content')
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
