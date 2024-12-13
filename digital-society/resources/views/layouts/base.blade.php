<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Digital Society</title>

    <!-- Link to Custom CSS -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <!-- Optional: Add Bootstrap if you want to use its default styling -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

    <!-- Header Section -->
    <header class="header">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <h1>Digital Society</h1>
                </div>
                <div class="col-md-6 text-right">
                    @auth
                        <span>Welcome, {{ Auth::user()->name }} |</span>
                        <a href="{{ route('logout') }}" class="text-white">Logout</a>
                    @else
                        <a href="{{ route('login') }}" class="text-white">Login</a>
                    @endauth
                </div>
            </div>
        </div>
    </header>

    <div class="container-fluid">
        <div class="row">
            <!-- Sidebar Section -->
            <nav class="col-md-3 col-lg-2 d-md-block bg-light sidebar">
                <div class="position-sticky">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link active" href="{{ route('dashboard') }}">
                                Dashboard
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('profile') }}">
                                My Profile
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('members.index') }}">
                                Society Members
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('watchmen.index') }}">
                                Society Watchman
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('notices.index') }}">
                                Notices
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('events.index') }}">
                                Events
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>

            <!-- Main Content Section -->
            <main class="col-md-9 ms-sm-auto col-lg-10 px-4">
                @yield('content') <!-- Main content will be injected here -->
            </main>
        </div>
    </div>

    <!-- Optional: Add JavaScript libraries like jQuery or Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
