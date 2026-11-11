<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Museum Penerangan') - Portal Sejarah & Edukasi Komunikasi Indonesia</title>
    <meta name="description" content="@yield('meta_description', 'Portal resmi Museum Penerangan di Taman Mini Indonesia Indah (TMII). Menampilkan sejarah media komunikasi, radio, televisi, pers, tur virtual 3D, dan reservasi kunjungan.')">

    <!-- Favicon -->
    <link rel="icon" href="{{ asset('images/black-logo.png') }}" type="image/png">

    <!-- Google Fonts: Playfair Display (British Museum Serif) & Plus Jakarta Sans (Crisp Clean Body) -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,500;0,600;0,700;0,800;0,900;1,600&family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

    <!-- Bootstrap 5 CSS & Font Awesome -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    <!-- Museum Penerangan Design System -->
    <link rel="stylesheet" href="{{ asset('css/muspen.css') }}">

    @stack('styles')
</head>
<body>

    <!-- Skip to Content (Accessibility) -->
    <a href="#main-content" class="skip-to-content">Langsung ke Konten Utama</a>

    <!-- Top Announcement Bar (British Museum Style) -->
    <div class="topbar-announcement d-none d-md-block">
        <div class="container d-flex justify-content-between align-items-center">
            <div class="d-flex align-items-center gap-2">
                <span class="small" style="color: #CBD5E1;">Museum Penerangan &bull; Kementerian Komunikasi dan Digital RI</span>
            </div>
            <div class="d-flex align-items-center gap-3 small">
                <span class="text-white-50"><i class="fa-regular fa-clock me-1 text-white"></i> {{ \App\Models\Setting::get('operational_hours', 'Buka Setiap Hari: 09.00 - 15.00 WIB') }}</span>
                <span class="opacity-25 text-white">|</span>
                <a href="{{ route('booking.check') }}" class="text-white text-decoration-none opacity-75 hover-opacity-100"><i class="fa-solid fa-magnifying-glass me-1"></i> Cek Tiket</a>
                <span class="opacity-25 text-white">|</span>
                @if(backpack_auth()->check())
                    <a href="{{ backpack_url('dashboard') }}" class="btn btn-outline-gold btn-sm py-0 px-2" style="font-size: 0.72rem;"><i class="fa-solid fa-gauge me-1"></i> Dashboard Admin</a>
                    <a href="{{ backpack_url('logout') }}" class="text-white-50 text-decoration-none hover-opacity-100 ms-1" style="font-size: 0.72rem;" title="Keluar dari akun admin"><i class="fa-solid fa-right-from-bracket"></i></a>
                @else
                    <a href="{{ backpack_url('login') }}" class="btn btn-outline-white btn-sm py-0 px-2" style="font-size: 0.72rem;"><i class="fa-solid fa-lock me-1"></i> Login Admin</a>
                @endif
            </div>
        </div>
    </div>

    <!-- Main Navigation Bar -->
    <nav class="navbar navbar-expand-lg navbar-muspen sticky-top">
        <div class="container">
            <!-- Brand Logo -->
            <a class="navbar-brand d-flex align-items-center" href="{{ route('home') }}">
                <img src="{{ asset('images/black-logo.png') }}" alt="Museum Penerangan" class="navbar-logo-img">
            </a>

            <!-- Mobile Toggle -->
            <button class="navbar-toggler border-0 text-white" type="button" data-bs-toggle="collapse" data-bs-target="#muspenNavbar" aria-controls="muspenNavbar" aria-expanded="false" aria-label="Buka menu navigasi">
                <i class="fa-solid fa-bars fs-4"></i>
            </button>

            <!-- Menu Links -->
            <div class="collapse navbar-collapse" id="muspenNavbar">
                <ul class="navbar-nav mx-auto mb-2 mb-lg-0 gap-1">
                    <!-- 1. Beranda -->
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}" href="{{ route('home') }}">
                            <i class="fa-solid fa-house"></i>
                            <span>Beranda</span>
                        </a>
                    </li>

                    <!-- 2. Dropdown Koleksi & Pameran -->
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle {{ request()->routeIs('collections.*') || request()->routeIs('events.*') || request()->routeIs('forum.*') ? 'active' : '' }}" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fa-solid fa-shapes"></i>
                            <span>Koleksi & Pameran</span>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-muspen">
                            <li>
                                <a class="dropdown-item {{ request()->routeIs('collections.*') ? 'active' : '' }}" href="{{ route('collections.index') }}">
                                    <div class="dropdown-item-icon">
                                        <i class="fa-solid fa-landmark"></i>
                                    </div>
                                    <div>
                                        <span class="dropdown-item-title">Koleksi Artefak</span>
                                        <span class="dropdown-item-desc">Galeri artefak sejarah pers, radio, TV & multimedia</span>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item {{ request()->routeIs('events.*') ? 'active' : '' }}" href="{{ route('events.index') }}">
                                    <div class="dropdown-item-icon">
                                        <i class="fa-regular fa-calendar-days"></i>
                                    </div>
                                    <div>
                                        <span class="dropdown-item-title">Agenda & Acara</span>
                                        <span class="dropdown-item-desc">Jadwal pameran tematik, seminar & workshop</span>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item {{ request()->routeIs('forum.*') ? 'active' : '' }}" href="{{ route('forum.index') }}">
                                    <div class="dropdown-item-icon">
                                        <i class="fa-regular fa-newspaper"></i>
                                    </div>
                                    <div>
                                        <span class="dropdown-item-title">Artikel & Forum</span>
                                        <span class="dropdown-item-desc">Kajian narasi sejarah & diskusi komunikasi bangsa</span>
                                    </div>
                                </a>
                            </li>
                        </ul>
                    </li>

                    <!-- 3. Dropdown Layanan Kunjungan -->
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle {{ request()->routeIs('booking.*') || request()->routeIs('guest-book.*') || request()->routeIs('survey.*') ? 'active' : '' }}" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fa-solid fa-ticket"></i>
                            <span>Layanan Kunjungan</span>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-muspen">
                            <li>
                                <a class="dropdown-item {{ request()->is('booking*') ? 'active' : '' }}" href="{{ url('/booking') }}">
                                    <div class="dropdown-item-icon">
                                        <i class="fa-solid fa-id-card"></i>
                                    </div>
                                    <div>
                                        <span class="dropdown-item-title">Reservasi Kunjungan</span>
                                        <span class="dropdown-item-desc">Pendaftaran rombongan sekolah, instansi & umum (Gratis)</span>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item {{ request()->routeIs('booking.check') ? 'active' : '' }}" href="{{ route('booking.check') }}">
                                    <div class="dropdown-item-icon">
                                        <i class="fa-solid fa-magnifying-glass"></i>
                                    </div>
                                    <div>
                                        <span class="dropdown-item-title">Cek Status Reservasi</span>
                                        <span class="dropdown-item-desc">Pengecekan kode booking & persetujuan e-tiket</span>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item {{ request()->is('guest-book*') ? 'active' : '' }}" href="{{ url('/guest-book') }}">
                                    <div class="dropdown-item-icon">
                                        <i class="fa-solid fa-pen-nib"></i>
                                    </div>
                                    <div>
                                        <span class="dropdown-item-title">Buku Tamu Digital</span>
                                        <span class="dropdown-item-desc">Presensi resmi kehadiran pengunjung onsite & online</span>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item {{ request()->routeIs('survey.*') ? 'active' : '' }}" href="{{ route('survey.create') }}">
                                    <div class="dropdown-item-icon">
                                        <i class="fa-solid fa-star"></i>
                                    </div>
                                    <div>
                                        <span class="dropdown-item-title">Survei Kepuasan (IKM)</span>
                                        <span class="dropdown-item-desc">Kuesioner evaluasi mutu pelayanan fasilitas museum</span>
                                    </div>
                                </a>
                            </li>
                        </ul>
                    </li>

                    <!-- 4. Dropdown Profil Museum -->
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle {{ request()->is('about-us*') || request()->is('vision-mission*') || request()->is('organization-structure*') || request()->is('teams*') || request()->is('partners*') ? 'active' : '' }}" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fa-solid fa-circle-info"></i>
                            <span>Profil Museum</span>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-muspen">
                            <li>
                                <a class="dropdown-item {{ request()->routeIs('about-us') ? 'active' : '' }}" href="{{ route('about-us') }}">
                                    <div class="dropdown-item-icon">
                                        <i class="fa-solid fa-book-open"></i>
                                    </div>
                                    <div>
                                        <span class="dropdown-item-title">Tentang Museum</span>
                                        <span class="dropdown-item-desc">Sejarah berdiri, visi pendirian & filosofi gedung</span>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item {{ request()->routeIs('vision-mission') ? 'active' : '' }}" href="{{ route('vision-mission') }}">
                                    <div class="dropdown-item-icon">
                                        <i class="fa-solid fa-compass"></i>
                                    </div>
                                    <div>
                                        <span class="dropdown-item-title">Visi & Misi</span>
                                        <span class="dropdown-item-desc">Komitmen pelayanan & Core Values BerAKHLAK</span>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item {{ request()->routeIs('organization-structure') ? 'active' : '' }}" href="{{ route('organization-structure') }}">
                                    <div class="dropdown-item-icon">
                                        <i class="fa-solid fa-sitemap"></i>
                                    </div>
                                    <div>
                                        <span class="dropdown-item-title">Struktur Organisasi</span>
                                        <span class="dropdown-item-desc">Bagan kepemimpinan & tata kelola manajerial</span>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item {{ request()->routeIs('teams') ? 'active' : '' }}" href="{{ route('teams') }}">
                                    <div class="dropdown-item-icon">
                                        <i class="fa-solid fa-users"></i>
                                    </div>
                                    <div>
                                        <span class="dropdown-item-title">Tim Pengelola</span>
                                        <span class="dropdown-item-desc">Kurator, edukator & staf pelayanan teknis</span>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item {{ request()->routeIs('partners') ? 'active' : '' }}" href="{{ route('partners') }}">
                                    <div class="dropdown-item-icon">
                                        <i class="fa-solid fa-handshake"></i>
                                    </div>
                                    <div>
                                        <span class="dropdown-item-title">Mitra & Kolaborasi</span>
                                        <span class="dropdown-item-desc">Jejaring sinergi lembaga penyiaran & instansi mitra</span>
                                    </div>
                                </a>
                            </li>
                        </ul>
                    </li>

                    <!-- 5. Dropdown Aspirasi & Bantuan -->
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle {{ request()->is('saran-aduan*') || request()->is('contact*') ? 'active' : '' }}" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fa-solid fa-headset"></i>
                            <span>Aspirasi & Bantuan</span>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-muspen">
                            <li>
                                <a class="dropdown-item {{ request()->routeIs('saran-aduan.index') ? 'active' : '' }}" href="{{ route('saran-aduan.index') }}">
                                    <div class="dropdown-item-icon">
                                        <i class="fa-solid fa-bullhorn"></i>
                                    </div>
                                    <div>
                                        <span class="dropdown-item-title">Saran & Pengaduan</span>
                                        <span class="dropdown-item-desc">Saluran pengaduan masyarakat & layanan PPID</span>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item {{ request()->routeIs('saran-aduan.track') ? 'active' : '' }}" href="{{ route('saran-aduan.track') }}">
                                    <div class="dropdown-item-icon">
                                        <i class="fa-solid fa-receipt"></i>
                                    </div>
                                    <div>
                                        <span class="dropdown-item-title">Lacak Tiket Aduan</span>
                                        <span class="dropdown-item-desc">Monitoring transparansi tindak lanjut penanganan</span>
                                    </div>
                                </a>
                            </li>
                            <li class="my-1"><hr class="dropdown-divider"></li>
                            <li>
                                <a class="dropdown-item {{ request()->routeIs('contact') ? 'active' : '' }}" href="{{ route('contact') }}">
                                    <div class="dropdown-item-icon">
                                        <i class="fa-solid fa-location-dot"></i>
                                    </div>
                                    <div>
                                        <span class="dropdown-item-title">Kontak & Lokasi TMII</span>
                                        <span class="dropdown-item-desc">Peta navigasi, jam operasional & akses masuk</span>
                                    </div>
                                </a>
                            </li>
                        </ul>
                    </li>
                </ul>

                <!-- Mobile-Only Info Strip (accessible on small screens) -->
                <div class="mobile-topbar-info d-lg-none">
                    <div class="d-flex align-items-center gap-2 mb-2 small">
                        <i class="fa-regular fa-clock text-white"></i>
                        <span class="text-white-50">{{ \App\Models\Setting::get('operational_hours', 'Buka Setiap Hari: 09.00 - 15.00 WIB') }}</span>
                    </div>
                    <div class="d-flex gap-2">
                        <a href="{{ route('booking.check') }}" class="btn btn-outline-white btn-sm flex-grow-1 py-2">
                            <i class="fa-solid fa-magnifying-glass me-1"></i> Cek Tiket
                        </a>
                        <a href="{{ route('contact') }}" class="btn btn-outline-white btn-sm flex-grow-1 py-2">
                            <i class="fa-solid fa-phone me-1"></i> Kontak
                        </a>
                    </div>
                </div>

                <!-- Action Button (Right Side) -->
                <div class="d-flex align-items-center ms-lg-3 flex-shrink-0 mt-3 mt-lg-0">
                    <a href="{{ url('/booking') }}" class="btn btn-primary btn-navbar-booking">
                        <i class="fa-solid fa-ticket"></i>
                        <span>Reservasi Tiket</span>
                    </a>
                </div>
            </div>
        </div>
    </nav>

    <!-- Global Alerts (Success / Error) -->
    <div class="container mt-3">
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show shadow-sm border-0 d-flex align-items-center gap-2" role="alert">
                <i class="fa-solid fa-circle-check fs-5"></i>
                <div>{{ session('success') }}</div>
                <button type="button" class="btn-close ms-auto" data-bs-dismiss="alert"></button>
            </div>
        @endif

        @if(session('warning'))
            <div class="alert alert-warning alert-dismissible fade show shadow-sm border-0 d-flex align-items-center gap-2" role="alert">
                <i class="fa-solid fa-triangle-exclamation fs-5"></i>
                <div>{{ session('warning') }}</div>
                <button type="button" class="btn-close ms-auto" data-bs-dismiss="alert"></button>
            </div>
        @endif

        @if(session('error'))
            <div class="alert alert-danger alert-dismissible fade show shadow-sm border-0 d-flex align-items-center gap-2" role="alert">
                <i class="fa-solid fa-circle-xmark fs-5"></i>
                <div>{{ session('error') }}</div>
                <button type="button" class="btn-close ms-auto" data-bs-dismiss="alert"></button>
            </div>
        @endif

        @if($errors->any())
            <div class="alert alert-danger alert-dismissible fade show shadow-sm border-0" role="alert">
                <div class="d-flex align-items-center gap-2 mb-2 fw-bold">
                    <i class="fa-solid fa-circle-exclamation fs-5"></i>
                    <span>Terdapat beberapa kesalahan input:</span>
                </div>
                <ul class="mb-0 ps-3">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif
    </div>

    <!-- Main Page Content -->
    <main class="flex-grow-1" id="main-content">
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="footer-muspen">
        <div class="container">
            <div class="row g-4 mb-5">
                <div class="col-lg-4 col-md-6">
                    <div class="d-flex align-items-center mb-3">
                        <img src="{{ asset('images/black-logo.png') }}" alt="Museum Penerangan" class="footer-logo-img">
                    </div>
                    <p class="small text-slate-400 pe-lg-3" style="color: #94A3B8; line-height: 1.7;">
                        Museum Penerangan adalah lembaga pelestarian sejarah media komunikasi massa bangsa Indonesia yang berlokasi di Taman Mini Indonesia Indah (TMII), Jakarta Timur. Diresmikan tahun 1993 oleh Presiden Soeharto.
                    </p>
                    <div class="d-flex gap-2 mt-3">
                        <a href="https://www.instagram.com/museumpenerangan" target="_blank" class="social-circle-btn" title="Instagram"><i class="fa-brands fa-instagram"></i></a>
                        <a href="https://www.youtube.com/c/MuspenTV" target="_blank" class="social-circle-btn" title="YouTube"><i class="fa-brands fa-youtube"></i></a>
                        <a href="https://www.facebook.com/MuseumPenerangan/" target="_blank" class="social-circle-btn" title="Facebook"><i class="fa-brands fa-facebook-f"></i></a>
                        <a href="https://twitter.com/muspenerangan" target="_blank" class="social-circle-btn" title="Twitter / X"><i class="fa-brands fa-x-twitter"></i></a>
                        <a href="https://www.tiktok.com/@muspenerangan" target="_blank" class="social-circle-btn" title="TikTok"><i class="fa-brands fa-tiktok"></i></a>
                    </div>
                </div>

                <div class="col-lg-2 col-md-6 col-6">
                    <h5>Navigasi</h5>
                    <ul class="footer-links">
                        <li><a href="{{ route('home') }}"><i class="fa-solid fa-chevron-right fa-xs text-white opacity-50"></i> Beranda</a></li>
                        <li><a href="{{ route('about-us') }}"><i class="fa-solid fa-chevron-right fa-xs text-white opacity-50"></i> Profil Museum</a></li>
                        <li><a href="{{ route('collections.index') }}"><i class="fa-solid fa-chevron-right fa-xs text-white opacity-50"></i> Koleksi Artefak</a></li>
                        <li><a href="{{ route('events.index') }}"><i class="fa-solid fa-chevron-right fa-xs text-white opacity-50"></i> Agenda Event</a></li>
                        <li><a href="{{ route('forum.index') }}"><i class="fa-solid fa-chevron-right fa-xs text-white opacity-50"></i> Artikel Sejarah</a></li>
                    </ul>
                </div>

                <div class="col-lg-3 col-md-6 col-6">
                    <h5>Layanan Publik</h5>
                    <ul class="footer-links">
                        <li><a href="{{ url('/booking') }}"><i class="fa-solid fa-chevron-right fa-xs text-white opacity-50"></i> Reservasi Kunjungan</a></li>
                        <li><a href="{{ route('booking.check') }}"><i class="fa-solid fa-chevron-right fa-xs text-white opacity-50"></i> Cek Tiket Reservasi</a></li>
                        <li><a href="{{ url('/guest-book') }}"><i class="fa-solid fa-chevron-right fa-xs text-white opacity-50"></i> Buku Tamu Digital</a></li>
                        <li><a href="{{ route('saran-aduan.index') }}"><i class="fa-solid fa-chevron-right fa-xs text-white opacity-50"></i> Saran & Pengaduan</a></li>
                        <li><a href="{{ route('survey.create') }}"><i class="fa-solid fa-chevron-right fa-xs text-white opacity-50"></i> Survei Kepuasan (IKM)</a></li>
                        <li><a href="{{ backpack_url('login') }}"><i class="fa-solid fa-chevron-right fa-xs text-white opacity-50"></i> Portal Admin CMS</a></li>
                    </ul>
                </div>

                <div class="col-lg-3 col-md-6">
                    <h5>Kontak & Operasional</h5>
                    <ul class="footer-links">
                        <li>
                            <i class="fa-solid fa-location-dot me-2" style="color: var(--muspen-accent-gold-light);"></i>
                            <span>Taman Mini Indonesia Indah, Jl. Pintu 2 TMII, Jakarta Timur 13560</span>
                        </li>
                        <li class="mt-2">
                            <i class="fa-solid fa-phone me-2" style="color: var(--muspen-accent-gold-light);"></i>
                            <span>0811-8132-121 (WhatsApp)</span>
                        </li>
                        <li class="mt-2">
                            <i class="fa-solid fa-envelope me-2" style="color: var(--muspen-accent-gold-light);"></i>
                            <span>Muspen@Kominfo.com</span>
                        </li>
                        <li class="mt-2">
                            <i class="fa-regular fa-clock me-2" style="color: var(--muspen-accent-gold-light);"></i>
                            <span>{{ \App\Models\Setting::get('operational_hours', 'Buka Setiap Hari: 09.00 - 15.00 WIB') }}</span>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="border-top border-secondary border-opacity-25 pt-3 d-flex flex-column flex-md-row justify-content-between align-items-center gap-2 small">
                <div>
                    &copy; {{ date('Y') }} <strong>Museum Penerangan</strong> - Kementerian Komunikasi dan Digital Republik Indonesia.
                </div>
                <div class="d-flex gap-3">
                    <a href="{{ route('about-us') }}" class="text-secondary text-decoration-none">Kebijakan Privasi</a>
                    <span class="text-secondary">&bull;</span>
                    <a href="{{ route('contact') }}" class="text-secondary text-decoration-none">Bantuan</a>
                    <span class="text-secondary">&bull;</span>
                    <a href="{{ backpack_url('login') }}" class="text-danger text-decoration-none fw-semibold"><i class="fa-solid fa-shield-halved"></i> Panel Petugas</a>
                </div>
            </div>
        </div>
    </footer>

    <!-- Scroll to Top Button -->
    <a href="#" class="scroll-to-top" id="scrollToTop" aria-label="Kembali ke atas halaman">
        <i class="fa-solid fa-arrow-up"></i>
    </a>

    <!-- Bootstrap Bundle JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Global Captcha Refresh Helper -->
    <script>
        function refreshCaptcha(buttonElement) {
            const wrapper = buttonElement.closest('.captcha-wrapper');
            const img = wrapper.querySelector('.captcha-img');
            const icon = buttonElement.querySelector('i');
            
            if (icon) icon.classList.add('fa-spin');

            fetch('{{ route("refresh-captcha") }}')
                .then(response => response.json())
                .then(data => {
                    if (img && data.captcha) {
                        img.src = data.captcha + '?' + Math.random();
                    }
                })
                .catch(err => console.error('Error refreshing captcha:', err))
                .finally(() => {
                    if (icon) icon.classList.remove('fa-spin');
                });
        }

        // Navbar scroll effect + Scroll-to-top visibility
        const scrollToTopBtn = document.getElementById('scrollToTop');
        window.addEventListener('scroll', function() {
            const navbar = document.querySelector('.navbar-muspen');
            const scrollY = window.scrollY;

            // Navbar shrink
            if (scrollY > 30) {
                navbar.classList.add('scrolled');
            } else {
                navbar.classList.remove('scrolled');
            }

            // Scroll-to-top button
            if (scrollToTopBtn) {
                if (scrollY > 400) {
                    scrollToTopBtn.classList.add('visible');
                } else {
                    scrollToTopBtn.classList.remove('visible');
                }
            }
        });

        // Scroll to top click handler
        if (scrollToTopBtn) {
            scrollToTopBtn.addEventListener('click', function(e) {
                e.preventDefault();
                window.scrollTo({ top: 0, behavior: 'smooth' });
            });
        }
    </script>

    @stack('scripts')
</body>
</html>
