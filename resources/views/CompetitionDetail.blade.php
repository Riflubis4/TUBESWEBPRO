<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Academic Competition Detail - {{ $competition->name }}</title>
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

    <!-- Competition Detail Content -->
    <div class="container my-5">
        <div class="row">
            <!-- Competition Image and Basic Info -->
            <div class="col-md-6">
                <div class="card">
                    <img src="{{ $competition->image_url ?? 'https://www.shutterstock.com/image-photo/match-between-two-boxers-ring-600nw-2489186299.jpg' }}" class="card-img-top" alt="{{ $competition->name }}">
                    <div class="card-body">
                        <h2 class="card-title">{{ $competition->name }}</h2>
                        <div class="d-flex justify-content-between align-items-center my-3">
                            <span class="badge bg-success">Academic</span>
                            <span class="text-muted">Capacity: {{ $competition->capacity }} participants</span>
                        </div>
                        <h4 class="text-primary">Rp {{ number_format($competition->entry_fee, 0, ',', '.') }}</h4>
                    </div>
                </div>
            </div>

            <!-- Competition Details and Registration -->
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h3>Competition Details</h3>
                        <div class="mb-4">
                            <h5>Schedule</h5>
                            <p><i class="bi bi-calendar-event"></i> 
                                {{ \Carbon\Carbon::parse($competition->start_date)->format('l, d F Y') }} 
                                - {{ \Carbon\Carbon::parse($competition->end_date)->format('l, d F Y') }}
                            </p>
                        </div>

                        <div class="mb-4">
                            <h5>What You'll Gain</h5>
                            <ul>
                                <li>Professional networking opportunities</li>
                                <li>Exclusive prizes for winners</li>
                                <li>Recognition from industry leaders</li>
                                <li>Certificate of Participation</li>
                            </ul>
                        </div>

                        <div class="mb-4">
                            <h5>Requirements</h5>
                            <ul>
                                <li>Enrollment in related fields</li>
                                <li>Commitment to the competition schedule</li>
                                <li>Valid identity proof</li>
                            </ul>
                        </div>

                        @if($competition->status == 'open')  {{-- Perbaiki operator -> --}}
                             @if(isset($payment) && $payment->status == 'open')
                                <button class="btn btn-success btn-lg w-100" disabled>
                                     Registered
                                </button>
                                @else
                                <a href="{{ route('payment.add', ['competition_id' => $competition->id]) }}" class="btn btn-primary btn-lg w-100">
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
