<!DOCTYPE html>
<html>
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/profile.css') }}">
</head>
<body class="bg-light">

<div class="container py-5">
    <div class="profile-container bg-white p-4 rounded shadow">
        <div class="profile-header d-flex align-items-center mb-4">
            <div class="profile-image bg-secondary rounded-circle me-3" style="width: 80px; height: 80px;"></div>
            <div class="profile-details">
                <h1 class="h4 mb-1">{{ $user->first_name }} {{ $user->last_name }}</h1>
                <p class="mb-0 text-muted">Email: {{ $user->email }}</p>
                <p class="mb-0 text-muted">Phone: {{ $user->phone ?? '-' }}</p>
                <p class="mb-0 text-muted">Soft Skills: {{ $user->soft_skills ?? '-' }}</p>
                <p class="mb-0 text-muted">Hard Skills: {{ $user->hard_skills ?? '-' }}</p>
            </div>
        </div>

        <!-- Form update profile -->
        <h3 class="mb-3">Update Your Profile</h3>
        <form action="{{ route('profile.update') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" id="email" name="email" class="form-control" value="{{ $user->email }}" readonly>
            </div>

            <div class="mb-3">
                <label for="phone" class="form-label">Phone</label>
                <input type="tel" id="phone" name="phone" class="form-control" value="{{ $user->phone }}">
            </div>

            <div class="mb-3">
                <label for="soft-skills" class="form-label">Soft Skills</label>
                <input type="text" id="soft-skills" name="softSkills" class="form-control" value="{{ $user->soft_skills }}">
            </div>

            <div class="mb-3">
                <label for="hard-skills" class="form-label">Hard Skills</label>
                <input type="text" id="hard-skills" name="hardSkills" class="form-control" value="{{ $user->hard_skills }}">
            </div>

            <button type="submit" class="btn btn-primary">Update Profile</button>
        </form>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
