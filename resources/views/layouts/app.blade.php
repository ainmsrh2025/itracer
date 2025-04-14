<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Admin Dashboard')</title>

    <!-- Tambah CSS atau framework seperti Bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">

    <!-- Tambahan CSS custom jika diperlukan -->
    <link rel="stylesheet" href="{{ asset('css/custom.css') }}">

    <!-- Tempat untuk CSS tambahan -->
    @stack('styles')
</head>
<body>
    <header class="bg-dark text-white p-3">
        <div class="container d-flex justify-content-between">
            <h1 class="h3">Admin Dashboard</h1>
            <nav>
                <ul class="nav">
                    <li class="nav-item">
                        <a href="{{ route('admin.dashboard') }}" class="nav-link text-white">Dashboard</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('admin.cadanganKerjaya.index') }}" class="nav-link text-white">Cadangan Kerjaya</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('admin.questions') }}" class="nav-link text-white">Soalan Kajian</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('admin.records') }}" class="nav-link text-white">Rekod Kajian</a>
                    </li>
                    <li class="nav-item">
                        <form action="{{ route('admin.logout') }}" method="POST" style="display: inline;">
                            @csrf
                            <button type="submit" class="btn btn-link text-white nav-link" style="text-decoration: none;">Logout</button>
                        </form>
                    </li>
                </ul>
            </nav>
        </div>
    </header>

    <main class="container my-4">
        <!-- Tempat untuk kandungan -->
        @yield('content')
    </main>

    <footer class="bg-light text-center p-3">
        <p class="mb-0">© Kolej Vokasional Sepang {{ date('Y') }}</p>
    </footer>

    <!-- Tambah JavaScript atau framework seperti Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Tempat untuk JavaScript tambahan -->
    @stack('scripts')
</body>
</html>
