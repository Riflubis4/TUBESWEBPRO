<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SmartComp - Academic Workshop</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600;700&display=swap" rel="stylesheet">
    <link href="{{ asset('CSS/workshopAcademic.css') }}" rel="stylesheet">
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-light">
    <div class="container-fluid">
        <a class="navbar-brand" href="{{route('user.dashboard')}}">
            <img src="images/gambar-removebg-preview.png" alt="SmartComp Logo" class="logo">
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
        <h5 id="offcanvasNotificationsLabel">Notifikasi</h5>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body">
        <!-- Section Notifikasi -->
        <h6>Notifikasi</h6>
        <div class="card mb-3 p-2 shadow-sm notification-card">
            <h6>Dibuka pendaftaran lomba UI/UX</h6>
            <small class="text-muted">2 menit yang lalu</small>
        </div>
        <!-- ... [rest of notifications content remains the same] ... -->
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
        </ul>
    </div>
</div>

<!-- Main Content -->
<div class="text-center mt-5">
    <p>Recommended Workshop and Competition from us <br> All the skills you need in one place</p>
    <button class="btn btn-secondary">Academic</button>
    <a href="{{ url('/workshop-non-academic') }}" class="btn btn-light">Non-Academic</a>
</div>

<!-- Workshop Cards -->
<div class="container mt-5">
    <div class="row justify-content-center">
        <!-- Card 1 -->
        @foreach($workshops as $workshop)
        <div class="col-md-4 mb-4">
            <div class="card h-100">
                <img src="https://i.pinimg.com/564x/82/7f/8c/827f8c8170a5842d2560da75249117af.jpg" class="card-img-top" alt="{{ $workshop->id }}">
                <div class="card-body p-3 text-center">
                    <h5 class="card-title">{{ $workshop->name }}</h5>
                    <a href="{{ route('workshop.show', ['id' => $workshop->id]) }}" class="btn btn-primary mt-4">Jelajahi</a>
                </div>
            </div>
        </div>
        @endforeach

        <!-- Card 2 -->
        <div class="col-md-4 mb-4">
            <div class="card h-100">
                <img src="https://i.pinimg.com/564x/cb/c7/6a/cbc76a054c9599cc13d5d69910029a15.jpg" class="card-img-top" alt="webdev">
                <div class="card-body text-center">
                    <h5 class="card-title">The Complete Web Development Academy</h5>
                    <a href="#" class="btn btn-primary mt-4">Jelajahi</a>
                </div>
            </div>
        </div>

        <!-- Card 3 -->
        <div class="col-md-4 mb-4">
            <div class="card h-100">
                <img src="https://i.pinimg.com/564x/bd/89/3a/bd893a529d494acb0977cf90413987f1.jpg" class="card-img-top" alt="java">
                <div class="card-body">
                    <h5 class="card-title">Project Development Using JAVA for Beginners</h5>
                    <a href="{{ url('/workshop/java') }}" class="btn btn-primary">Jelajahi</a>
                </div>
            </div>
        </div>
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