<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Deteksi Gangguan Psikologis' }}</title>
    <link rel="icon" href="{{ asset('assets/images/logo/logo-umc.png') }}" type="image/png">
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" xintegrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    
    @stack('styles')
</head>
<body class="d-flex flex-column min-vh-100 bg-light">

    <!-- Header & Navigasi -->
    <header class="sticky-top">
        <nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm py-3">
            <div class="container">
                <a class="navbar-brand fw-bold text-primary" href="{{ url('/') }}">
                    <i class="fas fa-brain me-2"></i> SP DETEKSI PSIKOLOGI
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-auto align-items-lg-center">
                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('beranda') ? 'active fw-bold text-primary' : '' }}" href="{{ route('beranda') }}">Beranda</a>
                        </li>
                        <li class="nav-item ms-lg-3">
                            <a class="nav-link {{ request()->routeIs('diagnosa.index') ? 'active fw-bold text-primary' : '' }}" href="{{ route('diagnosa.index') }}">Diagnosa</a>
                        </li>
                        <li class="nav-item ms-lg-3">
                            <a class="nav-link {{ request()->routeIs('tentang.index') ? 'active fw-bold text-primary' : '' }}" href="{{ route('tentang.index') }}">
                                Tentang Kami
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <!-- Main Content -->
    <main class="flex-grow-1">
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="bg-dark text-white pt-4 pb-4 mt-auto">
        <div class="container">
            <div class="row align-items-center">
                {{-- Info Sistem --}}
                <div class="col-md-6 mb-3 mb-md-0">
                    <h6 class="fw-bold text-uppercase text-white-50 mb-2">Tentang Sistem</h6>
                    <p class="small text-white-50 mb-0">
                        Sistem Pakar Deteksi Gangguan Psikologis<br>
                        pada Mahasiswa di Masa Pasca-Pandemi Metode Forward Chaining
                    </p>
                </div>

                {{-- Copyright --}}
                <div class="col-md-6 text-md-end">
                    <p class="text-white-50 small mb-0">
                        &copy; {{ date('Y') }} Sistem Pakar Psikologi.<br>
                        <span class="opacity-75">UMC - S1 - Teknik Informatika</span>
                    </p>
                </div>
            </div>
        </div>
    </footer>

    @stack('modals')
    @stack('scripts') 

    <!-- Bootstrap JS Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" xintegrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>
</html>