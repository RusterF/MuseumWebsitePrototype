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

    <!-- Skip to Content (Accessibility) -->
    <a href="#main-content" class="skip-to-content">Langsung ke Konten Utama</a>

    <!-- ==================== NAVBAR ==================== -->
    <nav class="navbar navbar-expand-lg navbar-canva sticky-top">
        <div class="container">
            <!-- Brand Logo -->
            <a class="navbar-brand d-flex align-items-center" href="{{ route('home') }}">
                <img src="{{ asset('images/color-logo.png') }}" alt="Museum Penerangan" height="48">
            </a>

            <!-- Mobile Toggle -->
            <button class="navbar-toggler" type="button" id="canvaNavbarToggler" data-bs-toggle="collapse" data-bs-target="#canvaNavbar" aria-controls="canvaNavbar" aria-expanded="false" aria-label="Buka Menu Navigasi">
                <i class="fa-solid fa-bars fs-5 text-dark toggler-icon"></i>
            </button>

            <!-- Navigation Links -->
            <div class="collapse navbar-collapse" id="canvaNavbar">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0 align-items-lg-center gap-1">
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('about-us') || request()->routeIs('tentang') ? 'active' : '' }}" href="{{ route('about-us') }}">Tentang</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle {{ request()->routeIs('collections.*') || request()->routeIs('koleksi*') ? 'active' : '' }}" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Koleksi
                        </a>
                        <ul class="dropdown-menu border-0 shadow-sm mt-lg-0 mt-2" style="border-radius: 0 !important; min-width: 220px;">
                            <li><a class="dropdown-item py-2 {{ request()->routeIs('collections.index') || request()->routeIs('koleksi') ? 'active' : '' }}" href="{{ route('collections.index') }}">Koleksi Museum</a></li>
                            <li><a class="dropdown-item py-2 {{ request()->routeIs('collections.library') ? 'active' : '' }}" href="{{ route('collections.library') }}">Koleksi Perpustakaan</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('forum.*') || request()->routeIs('publikasi.*') || request()->routeIs('events.*') ? 'active' : '' }}" href="{{ route('publikasi.index') }}">Publikasi</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle {{ request()->routeIs('services.*') ? 'active' : '' }}" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Layanan
                        </a>
                        <ul class="dropdown-menu border-0 shadow-sm mt-lg-0 mt-2" style="border-radius: 0 !important; min-width: 250px;">
                            <li><a class="dropdown-item py-2 {{ request()->routeIs('services.kunjungan-museum') ? 'active' : '' }}" href="{{ route('services.kunjungan-museum') }}">Layanan Kunjungan Museum</a></li>
                            <li><a class="dropdown-item py-2 {{ request()->routeIs('services.virtual-experience') ? 'active' : '' }}" href="{{ route('services.virtual-experience') }}">Layanan Virtual Experience (Zoom)</a></li>
                            <li><a class="dropdown-item py-2 {{ request()->routeIs('services.peminjaman') ? 'active' : '' }}" href="{{ route('services.peminjaman') }}">Peminjaman Gedung & Koleksi</a></li>
                            <li><a class="dropdown-item py-2 {{ request()->routeIs('services.penelitian') ? 'active' : '' }}" href="{{ route('services.penelitian') }}">Layanan Penelitian Ilmiah</a></li>
                            <li><a class="dropdown-item py-2 {{ request()->routeIs('services.perpustakaan') ? 'active' : '' }}" href="{{ route('services.perpustakaan') }}">Layanan Perpustakaan</a></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle {{ request()->routeIs('contact') || request()->routeIs('booking.*') || request()->routeIs('saran-aduan.*') || request()->routeIs('complaint.*') ? 'active' : '' }}" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Kontak
                        </a>
                        <ul class="dropdown-menu border-0 shadow-sm mt-lg-0 mt-2" style="border-radius: 0 !important; min-width: 220px;">
                            <li><a class="dropdown-item py-2 {{ request()->routeIs('contact') ? 'active' : '' }}" href="{{ route('contact') }}">Kontak Kami</a></li>
                            <li><a class="dropdown-item py-2 {{ request()->routeIs('booking.*') ? 'active' : '' }}" href="{{ route('booking.create') }}">Reservasi Kunjungan</a></li>
                            <li><a class="dropdown-item py-2 {{ request()->routeIs('saran-aduan.*') || request()->routeIs('complaint.*') ? 'active' : '' }}" href="{{ route('saran-aduan.index') }}">Pengaduan & SPAN LAPOR</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- ==================== GLOBAL ALERTS ==================== -->
    @if(session('success') || session('error') || session('warning') || (isset($errors) && $errors->any()))
    <div class="container mt-3">
        @if(session('success'))
            <div class="alert alert-canva-success alert-dismissible fade show d-flex align-items-center gap-2" role="alert">
                <i class="fa-solid fa-circle-check"></i>
                <div>{{ session('success') }}</div>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Tutup"></button>
            </div>
        @endif

        @if(session('warning'))
            <div class="alert alert-canva-warning alert-dismissible fade show d-flex align-items-center gap-2" role="alert">
                <i class="fa-solid fa-triangle-exclamation"></i>
                <div>{{ session('warning') }}</div>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Tutup"></button>
            </div>
        @endif

        @if(session('error'))
            <div class="alert alert-canva-danger alert-dismissible fade show d-flex align-items-center gap-2" role="alert">
                <i class="fa-solid fa-circle-xmark"></i>
                <div>{{ session('error') }}</div>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Tutup"></button>
            </div>
        @endif

        @if(isset($errors) && $errors->any())
            <div class="alert alert-canva-danger alert-dismissible fade show" role="alert">
                <div class="d-flex align-items-center gap-2 mb-2 fw-bold">
                    <i class="fa-solid fa-circle-exclamation"></i>
                    <span>Terdapat kesalahan input:</span>
                </div>
                <ul class="mb-0 ps-3">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Tutup"></button>
            </div>
        @endif
    </div>
    @endif

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
                        <img src="{{ asset('images/logo_muspen_white.webp') }}" alt="Logo Museum Penerangan" class="footer-logo-muspen" loading="lazy" decoding="async">
                        <!-- Komdigi White Logo (matching Canva design) -->
                        <img src="{{ asset('images/logo_komdigi_white.webp') }}" alt="Logo Komdigi" class="footer-logo-komdigi" loading="lazy" decoding="async">
                    </div>
                    <p class="mb-4">
                        Muspen merupakan museum bertema komunikasi di Indonesia. Menyimpan sejarah perkembangan layanan informasi dan alat-alat komunikasi dari masa prasejarah sampai saat ini
                    </p>
                    <div class="text-secondary small d-none d-md-block">
                        &copy; {{ date('Y') }} Museum Penerangan. All Rights Reserved.
                    </div>
                </div>

                <!-- Col 2: Info & Social Media (Connected to Admin Settings) -->
                @php
                    $footerAddress = strip_tags(\App\Models\Setting::get('address', 'Taman Mini Indonesia Indah, Jakarta 13560'));
                    $footerPhone = strip_tags(\App\Models\Setting::get('phone', '08118132121'));
                    $footerEmail = strip_tags(\App\Models\Setting::get('contact_email', 'museumpenerangan@gmail.com'));
                    $footerIg = \App\Models\Setting::get('instagram', 'https://www.instagram.com/museumpenerangan');
                    $footerTiktok = \App\Models\Setting::get('tiktok', 'https://www.tiktok.com/@muspenerangan');
                    $footerYt = \App\Models\Setting::get('youtube', 'https://www.youtube.com/@museumpenerangan');
                @endphp
                <div class="col-lg-5 col-md-6">
                    <div class="footer-info-title">Museum Penerangan</div>
                    <ul class="footer-info-list mb-4">
                        <li>
                            <i class="fa-solid fa-location-dot text-white"></i>
                            <span>{{ $footerAddress }}</span>
                        </li>
                        <li>
                            <i class="fa-brands fa-whatsapp text-white"></i>
                            <span>Informasi dan Reservasi Kunjungan {{ $footerPhone }}</span>
                        </li>
                        <li>
                            <i class="fa-regular fa-envelope text-white"></i>
                            <span>{{ $footerEmail }}</span>
                        </li>
                    </ul>

                    <div class="footer-social-icons">
                        <a href="{{ $footerIg }}" target="_blank" rel="noopener noreferrer" class="footer-social-btn" title="Instagram" aria-label="Kunjungi Instagram Museum Penerangan">
                            <i class="fa-brands fa-instagram"></i>
                        </a>
                        <a href="{{ $footerTiktok }}" target="_blank" rel="noopener noreferrer" class="footer-social-btn" title="TikTok" aria-label="Kunjungi TikTok Museum Penerangan">
                            <i class="fa-brands fa-tiktok"></i>
                        </a>
                        <a href="{{ $footerYt }}" target="_blank" rel="noopener noreferrer" class="footer-social-btn" title="YouTube" aria-label="Kunjungi YouTube Museum Penerangan">
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

    <!-- Scroll to Top Button -->
    <a href="#" class="scroll-top-canva" id="scrollToTop" aria-label="Kembali ke atas halaman">
        <i class="fa-solid fa-arrow-up"></i>
    </a>

    <!-- Bootstrap Bundle JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <!-- UI Enhancements Script -->
    <script>
        // Navbar scroll effect
        const nav = document.querySelector('.navbar-canva');
        window.addEventListener('scroll', function() {
            if (nav) {
                if (window.scrollY > 20) {
                    nav.classList.add('scrolled');
                } else {
                    nav.classList.remove('scrolled');
                }
            }
        });

        // Scroll-to-top button behavior
        const scrollBtn = document.getElementById('scrollToTop');
        if (scrollBtn) {
            window.addEventListener('scroll', function() {
                if (window.scrollY > 300) {
                    scrollBtn.classList.add('visible');
                } else {
                    scrollBtn.classList.remove('visible');
                }
            });

            scrollBtn.addEventListener('click', function(e) {
                e.preventDefault();
                window.scrollTo({ top: 0, behavior: 'smooth' });
            });
        }

        // Navbar & Dropdowns: Responsive Interaction (Desktop Hover & Mobile Touch Accordion)
        const canvaNavbar = document.getElementById('canvaNavbar');
        const toggler = document.getElementById('canvaNavbarToggler');
        const togglerIcon = toggler ? toggler.querySelector('.toggler-icon') : null;

        // Mobile Toggler Icon Swap (Hamburger <-> Close)
        if (canvaNavbar && togglerIcon) {
            canvaNavbar.addEventListener('show.bs.collapse', function() {
                togglerIcon.classList.remove('fa-bars');
                togglerIcon.classList.add('fa-xmark');
                if (toggler) toggler.setAttribute('aria-label', 'Tutup Menu Navigasi');
            });
            canvaNavbar.addEventListener('hide.bs.collapse', function() {
                togglerIcon.classList.remove('fa-xmark');
                togglerIcon.classList.add('fa-bars');
                if (toggler) toggler.setAttribute('aria-label', 'Buka Menu Navigasi');
            });
        }

        const navDropdowns = document.querySelectorAll('.navbar-canva .dropdown');
        navDropdowns.forEach(function(dropdown) {
            let timer;
            const toggle = dropdown.querySelector('.dropdown-toggle');
            const menu = dropdown.querySelector('.dropdown-menu');

            // Desktop Hover Behavior (>= 992px)
            function show() {
                if (window.innerWidth >= 992) {
                    clearTimeout(timer);
                    dropdown.classList.add('show');
                    if (menu) menu.classList.add('show');
                    if (toggle) toggle.setAttribute('aria-expanded', 'true');
                }
            }

            function hide() {
                if (window.innerWidth >= 992) {
                    timer = setTimeout(function() {
                        dropdown.classList.remove('show');
                        if (menu) menu.classList.remove('show');
                        if (toggle) toggle.setAttribute('aria-expanded', 'false');
                    }, 120);
                }
            }

            dropdown.addEventListener('mouseenter', show);
            dropdown.addEventListener('mouseleave', hide);

            // Click handling: Desktop prevent jump, Mobile accordion single-open
            if (toggle) {
                toggle.addEventListener('click', function(e) {
                    e.preventDefault();
                    if (window.innerWidth < 992) {
                        // On mobile, close sibling dropdowns for clean accordion behavior
                        const isCurrentlyOpen = dropdown.classList.contains('show');
                        navDropdowns.forEach(function(other) {
                            if (other !== dropdown && other.classList.contains('show')) {
                                other.classList.remove('show');
                                const otherMenu = other.querySelector('.dropdown-menu');
                                const otherToggle = other.querySelector('.dropdown-toggle');
                                if (otherMenu) otherMenu.classList.remove('show');
                                if (otherToggle) otherToggle.setAttribute('aria-expanded', 'false');
                            }
                        });
                    }
                });
            }
        });
    </script>

    @stack('scripts')
</body>
</html>
