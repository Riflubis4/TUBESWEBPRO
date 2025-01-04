<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Workshop Detail - {{ $workshop->name }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css" rel="stylesheet">
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
                <img src="https://i.pinimg.com/564x/d9/b6/c1/d9b6c103d2b23d92820972245191951f.jpg" alt="SmartComp Logo" style="width: 40px;">
                <span>SmartComp</span>
            </a>
            <div class="d-flex align-items-center">
                <a href="{{ url()->previous() }}" class="btn btn-outline-secondary me-2">
                    <i class="bi bi-arrow-left"></i> Back
                </a>
            </div>
        </div>
    </nav>

    <!-- Workshop Detail Content -->
    <div class="container my-5">
        <div class="row">
            <!-- Workshop Image and Basic Info -->
            <div class="col-md-6">
                <div class="card">
                    <img src="https://i.pinimg.com/564x/82/7f/8c/827f8c8170a5842d2560da75249117af.jpg" class="card-img-top" alt="{{ $workshop->name }}">
                    <div class="card-body">
                        <h2 class="card-title">{{ $workshop->name }}</h2>
                        <div class="d-flex justify-content-between align-items-center my-3">
                            <span class="badge bg-primary">{{ $workshop->type }}</span>
                            <span class="text-muted">Capacity: {{ $workshop->capacity }} seats</span>
                        </div>
                        <h4 class="text-primary">Rp {{ number_format($workshop->price, 0, ',', '.') }}</h4>
                    </div>
                </div>
            </div>

            <!-- Workshop Details and Registration -->
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h3>Workshop Details</h3>
                        <div class="mb-4">
                            <h5>Schedule</h5>
                            <p><i class="bi bi-calendar-event"></i> {{ \Carbon\Carbon::parse($workshop->date)->format('l, d F Y') }}</p>
                        </div>

                        <div class="mb-4">
                            <h5>What You'll Learn</h5>
                            <ul>
                                <li>Complete hands-on experience</li>
                                <li>Industry-standard best practices</li>
                                <li>Real-world project implementation</li>
                                <li>Certificate upon completion</li>
                            </ul>
                        </div>

                        <div class="mb-4">
                            <h5>Requirements</h5>
                            <ul>
                                <li>Basic understanding of computers</li>
                                <li>Laptop with minimum specifications</li>
                                <li>Stable internet connection</li>
                            </ul>
                        </div>

                        @if($workshop->status == 'open')
                            @if(isset($payment) && $payment->status == 'completed')
                                <button class="btn btn-success btn-lg w-100" disabled>
                                    Registered
                                </button>
                            @else
                                <a href="{{ route('payment.add', ['workshop_id' => $workshop->id]) }}" class="btn btn-primary btn-lg w-100">
                                    Register Now
                                </a>
                            @endif
                        @else
                            <button class="btn btn-secondary btn-lg w-100" disabled>
                                Registration Closed
                            </button>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="bg-light text-center text-black p-3 mt-5">
        <p>&copy; 2024 SmartComp. All rights reserved.</p>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>