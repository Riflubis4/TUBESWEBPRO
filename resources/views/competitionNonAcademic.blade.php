<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SmartComp - Non Academic Competition</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600;700&display=swap" rel="stylesheet">
    <link href="{{ asset('CSS/CompetitionNonAcademic.css') }}" rel="stylesheet">
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-light">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">
            <img src="../images/gambar-removebg-preview.png" alt="SmartComp Logo" class="logo">
            <span>SmartComp</span>
        </a>

        <form class="d-flex w-50">
            <div class="input-group">
                <span class="input-group-text" id="search-icon">
                    <i class="bi bi-search"></i>
                </span>
                <input class="form-control" type="search" placeholder="Search for competition or workshop" aria-label="Search">
            </div>
            <button class="btn btn-outline-success ms-2" type="submit">Search</button>
        </form>

        <div class="d-flex align-items-center">
            <button class="btn btn-custom me-2"><i class="bi bi-cart"></i></button>
            <button class="btn btn-custom me-2" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNotifications">
                <i class="bi bi-bell"></i>
            </button>

            <div class="btn-group">
                <button type="button" class="btn btn-custom"><i class="bi bi-person"></i></button>
                <button type="button" class="btn btn-custom dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown" aria-expanded="false">
                    <span class="visually-hidden">Toggle Dropdown</span>
                </button>
                <ul class="dropdown-menu dropdown-menu-end">
                    <li><a class="dropdown-item" href="#">My Profile</a></li>
                    <li><a class="dropdown-item" href="#">Update Profile</a></li>
                </ul>
            </div>
        </div>
    </div>
</nav>

<!-- Notifications Offcanvas -->
<div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNotifications" aria-labelledby="offcanvasNotificationsLabel">
    <div class="offcanvas-header">
        <h5 id="offcanvasNotificationsLabel">Notifications</h5>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body">
        <h6>Notifications</h6>
        <div class="card mb-3 p-2 shadow-sm notification-card">
            <h6>New UI/UX Competition Registration Open</h6>
            <small class="text-muted">2 minutes ago</small>
        </div>
        <!-- Additional notifications can go here -->
    </div>
</div>

<!-- Categories Button and Offcanvas -->
<div class="categories-btn-container">
    <button class="btn" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasScrolling">Categories</button>
</div>

<!-- Categories Offcanvas -->
<div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasScrolling" aria-labelledby="offcanvasScrollingLabel">
    <div class="offcanvas-header">
        <h5 class="offcanvas-title" id="offcanvasScrollingLabel">Categories</h5>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body">
        <ul class="list-group">
            <li class="list-group-item">
                <button href="{{ url('/') }}" class="btn btn-link w-100 text-start">
                    <i class="bi bi-house-door"></i> Home
                </button>
            </li>
            <li class="list-group-item">
                <form action="{{ route('workshop.academic') }}" method="get">
                    <button type="submit" class="btn btn-link w-100 text-start">
                        <i class="bi bi-gear"></i> Workshop
                    </button>
                </form>
            </li>
            <li class="list-group-item">
                <button class="btn btn-link w-100 text-start">
                    <i class="bi bi-calendar"></i> Calendar
                </button>
            </li>
            <li class="list-group-item">
                <button class="btn btn-link w-100 text-start">
                    <i class="bi bi-trophy"></i> Competitions
                </button>
            </li>
            <li class="list-group-item">
                <button class="btn btn-link w-100 text-start">
                    <i class="bi bi-chat-dots"></i> Forum
                </button>
            </li>
            <li class="list-group-item">
                <button class="btn btn-link w-100 text-start">
                    <i class="bi bi-mortarboard"></i> Academic
                </button>
            </li>
            <li class="list-group-item">
                <button class="btn btn-link w-100 text-start">
                    <i class="bi bi-book"></i> Non-Academic
                </button>
            </li>
        </ul>
    </div>
</div>

<!-- Main Content -->
<div class="text-center mt-5">
    <p>Recommended Competitions from us <br> All the skills you need in one place</p>
</div>

<!-- Competition Cards -->
<div class="container mt-5">
    <div class="row justify-content-center">
        @if($competitions->isEmpty())
            <div class="col-12 text-center">
                <p>No competitions available.</p>
            </div>
        @else
            @foreach($competitions as $competition)
            <div class="col-md-4 mb-4">
                <div class="card h-100">
                    <img src="https://www.shutterstock.com/image-photo/match-between-two-boxers-ring-600nw-2489186299.jpg" class="card-img-top" alt="{{ $competition->name }}">
                    <div class="card-body p-3 text-center">
                        <h5 class="card-title">{{ $competition->name }}</h5>
                        <p>Start: {{ $competition->formatted_start_date }}</p>
                        <p>End: {{ $competition->formatted_end_date }}</p>  
                        <p>Fee: {{ $competition->formatted_entry_fee }}</p>
                        <a href="{{ route('competition.show', ['id' => $competition->id]) }}" class="btn btn-primary mt-4">Jelajahi</a>
                    </div>
                </div>
            </div>
            @endforeach
        @endif
    </div>
</div>



<!-- Footer -->
<footer class="footer text-black text-center p-3">
    <p>&copy; 2024 SmartComp. All rights reserved.</p>
</footer>

<!-- Bootstrap JS and Dependencies -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"></script>

</body>
</html>
