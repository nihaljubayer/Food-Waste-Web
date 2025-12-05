<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title','Food Donation')</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">

    <style>
        body {
            background: #e5d3e1ff;
        }
        .top-navbar {
            background: linear-gradient(135deg, #48c2d2ff, #a180d5ff);
        }
        .top-navbar .navbar-brand {
            font-weight: 700;
            letter-spacing: 0.5px;
        }
        .dashboard-card {
            border-radius: 16px;
        }
        .stat-card {
            border-radius: 16px;
            transition: transform 0.15s ease, box-shadow 0.15s ease;
        }
        .stat-card:hover {
            transform: translateY(-3px);
            box-shadow: 0 10px 25px rgba(0,0,0,0.08);
        }
    </style>
</head>
<body>

    {{-- Top Navbar --}}
    <nav class="navbar navbar-expand-lg navbar-dark top-navbar shadow-sm">
        <div class="container">
            <a class="navbar-brand" href="{{ route('home') }}">
                Food Waste Platform
            </a>

            <div class="ms-auto">
                @auth
                    <span class="text-white-50 me-3">{{ auth()->user()->name }}</span>
                    <a href="{{ route('dashboard') }}" class="btn btn-sm btn-light me-2">Dashboard</a>
                    <form action="{{ route('logout') }}" method="POST" class="d-inline">
                        @csrf
                        <button class="btn btn-sm btn-outline-light">Logout</button>
                    </form>
                @endauth

                @guest
                    <a href="{{ route('login') }}" class="btn btn-sm btn-light">Login</a>
                @endguest
            </div>
        </div>
    </nav>

    <main class="container py-4">
        @yield('content')
    </main>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
