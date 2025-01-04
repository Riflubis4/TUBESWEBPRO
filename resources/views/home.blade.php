<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('CSS/home.css') }}">
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg">
        <div class="container-fluid">
            <img src="images/gambar-removebg-preview.png" alt="Tree" width="60" height="60">
            <a class="navbar-brand">SmartComp</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav ms-auto">
                    <a class="nav-link" href="#">Home</a>
                    <a class="nav-link" href="{{ url('/about') }}">About</a>
                    <a class="nav-link" href="{{ url('/help') }}">Help</a>
                </div>
            </div>
        </div>
    </nav>

    <!-- Main Content --> 
    <div class="main-content">
        <div class="welcome-section">
            <h1>Welcome to SmartComp</h1>
            <p>Prepare for Success with SmartComp!</p>
            <!-- Link ke LoginPage -->
            <a href="{{ url('/LoginPage') }}" type="button" class="btn btn-primary">Get Started</a>
        </div>
        <div class="image-section">
            <img src="images/gambar-removebg-preview.png" alt="Student Illustration">
        </div>
    </div>

    <!-- Footer -->
    <div class="footer">
        <footer> &copy; 2024 SmartComp. All rights reserved.</footer>
    </div>
        
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
