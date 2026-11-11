<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Museum Penerangan') - Portal Resmi Museum Penerangan RI</title>
    <meta name="description" content="@yield('meta_description', 'Portal resmi Museum Penerangan di Taman Mini Indonesia Indah (TMII), Kementerian Komunikasi dan Digital RI.')">

    <!-- Favicon -->
    <link rel="icon" href="{{ asset('images/color-logo.png') }}" type="image/png">

    <!-- Preload Clean Local Helvetica Font -->
    <link rel="preload" href="{{ asset('fonts/Helvetica-Roman.woff') }}" as="font" type="font/woff" crossorigin>
    <link rel="preload" href="{{ asset('fonts/Helvetica-Bold.woff') }}" as="font" type="font/woff" crossorigin>

    <!-- Bootstrap 5.3 & Font Awesome 6 (Local + CDN for 100% emote/icon reliability) -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('vendor/fontawesome/css/all.min.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    <!-- Canva Theme CSS (100% 90-degree sharp corners) -->
    <link rel="stylesheet" href="{{ asset('css/canva-theme.css') }}">

    @stack('styles')
</head>
<body>

    <!-- ==================== NAVBAR ==================== -->
    <nav class="navbar navbar-expand-lg navbar-canva sticky-top">
        <div class="container">
            <!-- Brand Logo -->
            <a class="navbar-brand d-flex align-items-center" href="{{ route('home') }}">
                <img src="{{ asset('images/color-logo.png') }}" alt="Museum Penerangan" height="48">
            </a>

            <!-- Mobile Toggle -->
            <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#canvaNavbar" aria-controls="canvaNavbar" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fa-solid fa-bars fs-4 text-dark"></i>
            </button>

            <!-- Navigation Links -->
            <div class="collapse navbar-collapse" id="canvaNavbar">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0 align-items-lg-center gap-1">
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('about-us') ? 'active' : '' }}" href="{{ route('about-us') }}">Tentang</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle {{ request()->routeIs('collections.*') ? 'active' : '' }}" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Koleksi
                        </a>
                        <ul class="dropdown-menu border-0 shadow-sm mt-2" style="border-radius: 0 !important;">
                            <li><a class="dropdown-item py-2" href="{{ route('collections.index') }}"><i class="fa-solid fa-shapes text-primary me-2"></i> Koleksi Museum</a></li>
                            <li><a class="dropdown-item py-2" href="{{ route('collections.library') }}"><i class="fa-solid fa-book-bookmark text-info me-2"></i> Koleksi Perpustakaan (SLiMS)</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('forum.*') || request()->routeIs('publikasi.*') ? 'active' : '' }}" href="{{ route('publikasi.index') }}">Publikasi</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle {{ request()->routeIs('services.*') || request()->routeIs('booking.*') || request()->routeIs('survey.*') || request()->routeIs('saran-aduan.*') ? 'active' : '' }}" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Layanan
                        </a>
                        <ul class="dropdown-menu border-0 shadow-sm mt-2" style="border-radius: 0 !important; min-width: 270px;">
                            <li><a class="dropdown-item py-2" href="{{ route('services.kunjungan-museum') }}"><i class="fa-solid fa-building-columns text-primary me-2"></i> Layanan Kunjungan Museum</a></li>
                            <li><a class="dropdown-item py-2" href="{{ route('services.virtual-experience') }}"><i class="fa-solid fa-video text-info me-2"></i> Layanan Virtual Experience (Zoom)</a></li>
                            <li><a class="dropdown-item py-2" href="{{ route('services.peminjaman') }}"><i class="fa-solid fa-handshake text-warning me-2"></i> Peminjaman Gedung & Koleksi</a></li>
                            <li><a class="dropdown-item py-2" href="{{ route('services.penelitian') }}"><i class="fa-solid fa-microscope text-success me-2"></i> Layanan Penelitian Ilmiah</a></li>
                            <li><a class="dropdown-item py-2" href="{{ route('services.perpustakaan') }}"><i class="fa-solid fa-book-open-reader text-secondary me-2"></i> Layanan Perpustakaan</a></li>
                            <li><hr class="dropdown-divider my-1"></li>
                            <li><a class="dropdown-item py-2 fw-semibold text-primary" href="{{ route('booking.create') }}"><i class="fa-solid fa-ticket me-2"></i> Reservasi Kunjungan</a></li>
                            <li><a class="dropdown-item py-2" href="{{ route('survey.create') }}"><i class="fa-solid fa-square-poll-vertical text-warning me-2"></i> Survei Kepuasan Pengunjung</a></li>
                            <li><a class="dropdown-item py-2" href="{{ route('saran-aduan.index') }}"><i class="fa-solid fa-envelope-open-text text-danger me-2"></i> Pengaduan & SPAN LAPOR</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('contact') ? 'active' : '' }}" href="{{ route('contact') }}">Kontak</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- ==================== MAIN CONTENT ==================== -->
    <main id="main-content">
        @yield('content')
    </main>

    <!-- ==================== FOOTER ==================== -->
    <footer class="footer-canva">
        <div class="container">
            <div class="row g-4 align-items-start justify-content-between">
                <!-- Col 1: Logos & Profile -->
                <div class="col-lg-6 col-md-6">
                    <div class="footer-canva-logos">
                        <!-- Muspen White Logo -->
                        <img src="{{ asset('images/logo_muspen_white.png') }}" alt="Logo Museum Penerangan" class="footer-logo-muspen">
                        <!-- Komdigi White Logo (matching Canva design) -->
                        <img src="{{ asset('images/logo_komdigi_white.png') }}" alt="Logo Komdigi" class="footer-logo-komdigi">
                    </div>
                    <p class="mb-4">
                        Muspen merupakan museum bertema komunikasi di Indonesia. Menyimpan sejarah perkembangan layanan informasi dan alat-alat komunikasi dari masa prasejarah sampai saat ini
                    </p>
                    <div class="text-secondary small d-none d-md-block">
                        &copy; {{ date('Y') }} Museum Penerangan. All Rights Reserved.
                    </div>
                </div>

                <!-- Col 2: Info & Social Media -->
                <div class="col-lg-5 col-md-6">
                    <div class="footer-info-title">Museum Penerangan</div>
                    <ul class="footer-info-list mb-4">
                        <li>
                            <i class="fa-solid fa-location-dot"></i>
                            <span>Taman Mini Indonesia Indah, Jakarta 13560</span>
                        </li>
                        <li>
                            <i class="fa-brands fa-whatsapp"></i>
                            <span>Informasi dan Reservasi Kunjungan +62 811 813 2121</span>
                        </li>
                        <li>
                            <i class="fa-regular fa-envelope"></i>
                            <span>museumpenerangan@gmail.com</span>
                        </li>
                    </ul>

                    <div class="footer-social-icons">
                        <a href="https://www.instagram.com/museumpenerangan" target="_blank" class="footer-social-btn" title="Instagram">
                            <i class="fa-brands fa-instagram"></i>
                        </a>
                        <a href="https://www.tiktok.com/@muspenerangan" target="_blank" class="footer-social-btn" title="TikTok">
                            <i class="fa-brands fa-tiktok"></i>
                        </a>
                        <a href="https://www.youtube.com/@museumpenerangan" target="_blank" class="footer-social-btn" title="YouTube">
                            <i class="fa-brands fa-youtube"></i>
                        </a>
                    </div>

                    <div class="text-secondary small d-md-none mt-4">
                        &copy; {{ date('Y') }} Museum Penerangan. All Rights Reserved.
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <!-- Bootstrap Bundle JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Navbar scroll script -->
    <script>
        window.addEventListener('scroll', function() {
            const nav = document.querySelector('.navbar-canva');
            if (window.scrollY > 20) {
                nav.classList.add('scrolled');
            } else {
                nav.classList.remove('scrolled');
            }
        });
    </script>

    @stack('scripts')
</body>
</html>
