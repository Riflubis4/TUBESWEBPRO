<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('CSS/about.css') }}">
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
                    <a class="nav-link" href="{{ url('/') }}">Home</a>
                    <a class="nav-link" href="#">About</a>
                    <a class="nav-link" href="{{ url('/help') }}">Help</a>
                </div>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <section class="info-section">
        <h2>The <span class="highlight">BIGGEST</span> Workshop and Competition event in Indonesia</h2>
        <p>SMARTCOMP, adalah website Workshop terbesar yang digelar oleh mahasiswa Indonesia, telah kembali hadir! Dengan berbagai rangkaian acara dari Event, Academy, hingga Competition, kami hadir dengan konsep dan hadiah yang lebih seru dan menarik. Dengan agenda ini, SMARTCOMP bertekad menjadi platform utama untuk berbagi pengetahuan, inovasi, dan kolaborasi di dunia teknologi.</p>
        
        <div class="stats-container">
            <div class="stat-card">
                <h3>3600+</h3>
                <p>Staf telah berkontribusi ke SMARTCOMP</p>
            </div>
            <div class="stat-card">
                <h3>78,000+</h3>
                <p>Pengunjung SMARTCOMP tiap tahunnya</p>
            </div>
            <div class="stat-card">
                <h3>120+</h3>
                <p>Sponsor dan Media Partner terlibat setiap tahun</p>
            </div>
            <div class="stat-card">
                <h3>400+</h3>
                <p>Perusahaan telah berpartisipasi di SMARTCOMP</p>
            </div>
        </div>

        <h3 class="timeline-title">Let’s Join <br> <span>Conquer The Word</span></h3>
    </section>

    <!-- Footer -->
    <div class="footer">
        <footer> &copy; 2024 SmartComp. All rights reserved.</footer>
    </div>
        

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>