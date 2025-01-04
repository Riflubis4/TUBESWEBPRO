<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Smartcomp- Forgot Password</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('CSS/ForgotPassword.css') }}">
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg">
        <div class="container-fluid">
            <img src="gambar-removebg-preview.png" alt="Tree" width="60" height="60">
            <a class="navbar-brand">SmartComp</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav ms-auto">
                    <a class="nav-link" href="home.html">Home</a>
                    <a class="nav-link" href="about.html">About</a>
                    <a class="nav-link" href="help.html">Help</a>
                </div>
            </div>
        </div>
    </nav>

    <!--Main Content-->
    <div class="main-content">
        <div class="forgot-password">
            <div class="image-section">
                <img src="forgotpass.png" alt="Forgot Password">
            </div>
            <h2>Forgot password?</h2>
            <form action="/reset-password" method="post">
                <input type="email" name="email" placeholder="Enter your email" required>
                <button type="submit" class="btn">Reset password</button>
            </form>
            <a href="{{ url('/LoginPage') }}">&larr; Back to log in</a>
        </div>
    </div>

    <!-- Footer -->
    <div class="footer">
        <footer> &copy; 2024 SmartComp. All rights reserved.</footer>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>