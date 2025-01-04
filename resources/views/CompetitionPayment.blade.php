<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment for {{ $competition->name }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
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

    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h4 class="mb-0">Payment Details</h4>
                    </div>
                    <div class="card-body">
                        <!-- Competition Information -->
                        <div class="mb-4">
                            <h5>Competition Information</h5>
                            <p><strong>Competition Name:</strong> {{ $competition->name }}</p>
                            <p><strong>Date:</strong> {{ \Carbon\Carbon::parse($competition->start_date)->format('l, d F Y') }} to {{ \Carbon\Carbon::parse($competition->end_date)->format('l, d F Y') }}</p>
                            <p><strong>Entry Fee:</strong> Rp {{ number_format($competition->entry_fee, 0, ',', '.') }}</p>
                        </div>

                        <!-- Payment Form -->
                        <form action="{{ route('competition.payment.store') }}" method="POST">
                            @csrf
                            <input type="hidden" name="competition_id" value="{{ $competition->id }}">
                            
                            <div class="mb-3">
                                <label for="name" class="form-label">Full Name</label>
                                <input type="text" class="form-control" id="name" name="name" required>
                            </div>

                            <div class="mb-3">
                                <label for="phone" class="form-label">Phone Number</label>
                                <input type="tel" class="form-control" id="phone" name="phone" required>
                            </div>

                            <div class="mb-3">
                                <label for="payment_method" class="form-label">Payment Method</label>
                                <select class="form-select" id="payment_method" name="payment_method" required>
                                    <option value="">Select Payment Method</option>
                                    <option value="transfer">Bank Transfer</option>
                                    <option value="ewallet">E-Wallet</option>
                                </select>
                            </div>

                            <button type="submit" class="btn btn-primary w-100">Proceed to Payment</button>
                        </form>
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
