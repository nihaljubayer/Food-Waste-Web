<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Food Waste Platform')</title>

    {{-- Bootstrap CSS --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    {{-- Leaflet CSS (for map) --}}
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />

    {{-- Extra page-specific styles --}}
    @stack('styles')
</head>
<body>

    {{-- ================= NAVBAR ================= --}}
    <nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm">
        <div class="container">

            {{-- Brand --}}
            <a class="navbar-brand fw-bold" href="{{ route('home') }}">
                Food Waste Platform
            </a>

            {{-- Mobile Toggle --}}
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#mainNavbar">
                <span class="navbar-toggler-icon"></span>
            </button>

            {{-- Menu Items --}}
            <div class="collapse navbar-collapse" id="mainNavbar">

                {{-- Left Side Menu --}}
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">

                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('home') }}">Home</a>
                    </li>

                    {{-- ABOUT section on home page --}}
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('home') }}#about">About</a>
                    </li>

                    {{-- CONTACT section on home page --}}
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('home') }}#contact">Contact</a>
                    </li>

                </ul>

                {{-- Right Side --}}
                <ul class="navbar-nav ms-auto">

                    {{-- If User is NOT logged in --}}
                    @guest
                        <li class="nav-item me-2">
                            <a href="{{ route('signup.choice') }}"
                               class="btn btn-outline-success btn-sm">Sign Up</a>
                        </li>

                        <li class="nav-item">
                            <a href="{{ route('login') }}"
                               class="btn btn-success btn-sm">Sign In</a>
                        </li>
                    @endguest

                    {{-- If User IS Logged In --}}
                    @auth
                        @php $user = auth()->user(); @endphp

                        {{-- Role Based Menu --}}
                        @if($user->role === 'donor')
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('donor.dashboard') }}">Dashboard</a>
                            </li>

                        @elseif($user->role === 'organization')
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('ngo.dashboard') }}">
                                    NGO Dashboard
                                </a>
                            </li>

                        @elseif($user->role === 'admin')
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('admin.dashboard') }}">
                                    Admin Panel
                                </a>
                            </li>
                        @endif

                        {{-- User Dropdown --}}
                        <li class="nav-item dropdown ms-2">
                            <a class="nav-link dropdown-toggle fw-semibold" href="#"
                               data-bs-toggle="dropdown">
                                {{ $user->name }}
                                <span class="badge bg-success text-uppercase small">{{ $user->role }}</span>
                            </a>

                            <ul class="dropdown-menu dropdown-menu-end">
                                <li>
                                    <form method="POST" action="{{ route('logout') }}">
                                        @csrf
                                        <button class="dropdown-item text-danger" type="submit">
                                            Logout
                                        </button>
                                    </form>
                                </li>
                            </ul>
                        </li>

                    @endauth

                </ul>

            </div>
        </div>
    </nav>

    {{-- ================= PAGE CONTENT ================= --}}
    <div class="container-fluid py-3">
        @yield('content')
    </div>

    {{-- ================= SCRIPTS ================= --}}
    {{-- Bootstrap JS --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    {{-- Leaflet JS --}}
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>

    {{-- Extra page-specific scripts --}}
    @stack('scripts')

</body>
</html>
