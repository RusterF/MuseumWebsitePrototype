@extends('layouts.canva')

@section('title', 'Koleksi Perpustakaan (SLiMS)')

@section('content')
<!-- Header Banner -->
<section class="page-header-canva">
    <div class="container">
        <!-- Breadcrumb -->
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb-canva mb-3">
                <li><a href="{{ route('home') }}">Beranda</a></li>
                <li><a href="{{ route('collections.index') }}">Koleksi</a></li>
                <li class="current">Koleksi Perpustakaan</li>
            </ol>
        </nav>

        <div class="row align-items-center justify-content-between g-4">
            <div class="col-lg-8">
                <span class="badge-canva mb-2 text-uppercase fw-bold" style="background-color: rgba(255,255,255,0.12); color: #FFFFFF; border-color: rgba(255,255,255,0.25);">
                    <i class="fa-solid fa-book-bookmark me-1"></i> SLiMS OPAC
                </span>
                <h1 class="display-5 fw-bold text-white mb-2">Koleksi Perpustakaan</h1>
                <p class="page-lead">
                    Katalog Senayan Library Management System (SLiMS) resmi Museum Penerangan Kementerian Komunikasi dan Digital RI.
                </p>
            </div>
            <div class="col-lg-4 text-lg-end">
                <a href="https://perpustakaan-muspen.komdigi.go.id/" target="_blank" rel="noopener noreferrer" class="btn btn-outline-light px-4 py-3 fw-bold text-uppercase" style="font-size: 0.85rem; border-radius: 0 !important;">
                    <i class="fa-solid fa-arrow-up-right-from-square me-2"></i> Buka Portal SLiMS
                </a>
            </div>
        </div>
    </div>
</section>

<!-- Main Minimalist Content Section -->
<section class="section-py bg-white">
    <div class="container" style="max-width: 1140px;">
        <!-- Search & Portal Action Card -->
        <div class="card-canva p-4 p-lg-5 mb-5 shadow-sm border" style="background-color: #F8FAFC; border-color: #E2E8F0 !important;">
            <div class="row justify-content-center text-center mb-4">
                <div class="col-lg-9">
                    <h2 class="title-blue mb-2" style="font-size: 1.85rem;">Pencarian Katalog Perpustakaan</h2>
                    <p class="text-secondary small mb-0" style="font-size: 0.95rem;">
                        Temukan koleksi buku, jurnal komunikasi, naskah penyiaran, dan arsip penerangan nasional.
                    </p>
                </div>
            </div>

            <!-- Minimalist Search Form -->
            <div class="row justify-content-center mb-4">
                <div class="col-lg-9">
                    <form action="https://perpustakaan-muspen.komdigi.go.id/index.php" method="GET" target="_blank">
                        <input type="hidden" name="search" value="search">
                        <div class="input-group shadow-sm">
                            <input type="text" name="keywords" class="form-control form-control-lg bg-white border-end-0" placeholder="Ketik judul buku, nama pengarang, topik, atau kata kunci..." style="border-radius: 0 !important; border-color: #CBD5E1; font-size: 0.95rem;" required>
                            <button type="submit" class="btn btn-primary px-4 fw-semibold" style="border-radius: 0 !important; background-color: var(--canva-accent-blue); border-color: var(--canva-accent-blue);">
                                <i class="fa-solid fa-magnifying-glass me-2"></i> Cari di SLiMS
                            </button>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Popular Quick Tags & Direct Link -->
            <div class="row justify-content-center">
                <div class="col-lg-9 d-flex flex-wrap align-items-center justify-content-between gap-3 pt-3 border-top" style="border-color: #E2E8F0 !important;">
                    <div class="d-flex flex-wrap align-items-center gap-2">
                        <span class="text-muted small fw-semibold">Pencarian Populer:</span>
                        <a href="https://perpustakaan-muspen.komdigi.go.id/index.php?search=search&keywords=Komunikasi" target="_blank" class="badge bg-white text-secondary border px-2 py-1 text-decoration-none" style="border-radius: 0 !important; font-weight: 500;">Komunikasi</a>
                        <a href="https://perpustakaan-muspen.komdigi.go.id/index.php?search=search&keywords=Penerangan" target="_blank" class="badge bg-white text-secondary border px-2 py-1 text-decoration-none" style="border-radius: 0 !important; font-weight: 500;">Penerangan</a>
                        <a href="https://perpustakaan-muspen.komdigi.go.id/index.php?search=search&keywords=Radio" target="_blank" class="badge bg-white text-secondary border px-2 py-1 text-decoration-none" style="border-radius: 0 !important; font-weight: 500;">Radio</a>
                        <a href="https://perpustakaan-muspen.komdigi.go.id/index.php?search=search&keywords=Televisi" target="_blank" class="badge bg-white text-secondary border px-2 py-1 text-decoration-none" style="border-radius: 0 !important; font-weight: 500;">Televisi</a>
                        <a href="https://perpustakaan-muspen.komdigi.go.id/index.php?search=search&keywords=Jurnalistik" target="_blank" class="badge bg-white text-secondary border px-2 py-1 text-decoration-none" style="border-radius: 0 !important; font-weight: 500;">Jurnalistik</a>
                    </div>
                    <div>
                        <a href="https://perpustakaan-muspen.komdigi.go.id/" target="_blank" rel="noopener noreferrer" class="link-cta-canva small fw-semibold text-decoration-none" style="color: var(--canva-accent-blue);">
                            Jelajahi Portal SLiMS Lengkap <i class="fa-solid fa-arrow-up-right-from-square ms-1"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <!-- 2 Clean Two-Column Cards: Ruang Pustaka & Ketentuan Layanan -->
        <div class="row g-4 mb-4">
            <!-- Left Card: Ruang Baca & Fasilitas -->
            <div class="col-lg-6">
                <div class="card-canva p-4 h-100 shadow-sm border" style="background-color: #FFFFFF; border-color: #E2E8F0 !important;">
                    <div class="overflow-hidden border mb-4" style="height: 240px; border-color: #E2E8F0 !important;">
                        <img src="{{ asset('images/WebMuspenBaruImages/Perpustakaan.png') }}" alt="Perpustakaan Museum Penerangan" class="w-100 h-100" style="object-fit: cover;">
                    </div>
                    <h5 class="fw-bold text-dark mb-2">Fasilitas Perpustakaan</h5>
                    <div class="text-secondary small mb-3" style="line-height: 1.8;">
                        Perpustakaan Museum Penerangan mengoleksi ribuan pustaka ilmu komunikasi, penyiaran, jurnalistik, pers nasional, serta dokumentasi arsip Departemen Penerangan RI.
                    </div>
                    <div class="d-flex flex-column gap-2 pt-3 border-top" style="border-color: #F1F5F9 !important; font-size: 0.9rem;">
                        <div class="d-flex align-items-center gap-2 text-dark">
                            <i class="fa-solid fa-location-dot text-primary"></i>
                            <span><strong>Perpustakaan Utama:</strong> Lantai 2 Gedung Museum Penerangan</span>
                        </div>
                        <div class="d-flex align-items-center gap-2 text-dark">
                            <i class="fa-solid fa-book-open-reader text-primary"></i>
                            <span><strong>Perpustakaan Mini &amp; Pojok Baca:</strong> Lantai 1 Gedung Museum</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Right Card: Ketentuan Layanan & Pustakawan -->
            <div class="col-lg-6">
                <div class="card-canva p-4 h-100 shadow-sm border d-flex flex-column" style="background-color: #FFFFFF; border-color: #E2E8F0 !important;">
                    <h5 class="fw-bold text-dark mb-3">Informasi &amp; Akses Layanan</h5>

                    <div class="mb-4">
                        <div class="fw-semibold text-dark small mb-1">
                            <i class="fa-regular fa-clock text-primary me-2"></i> Jam Operasional
                        </div>
                        <p class="text-secondary small mb-0 ps-4" style="line-height: 1.7;">
                            Buka setiap hari: pukul <strong>09.00 - 15.00 WIB</strong><br>
                            Waktu istirahat: 12.00 - 13.00 WIB
                        </p>
                    </div>

                    <div class="mb-4">
                        <div class="fw-semibold text-dark small mb-1">
                            <i class="fa-solid fa-book-bookmark text-primary me-2"></i> Ketentuan Baca di Tempat
                        </div>
                        <p class="text-secondary small mb-0 ps-4" style="line-height: 1.7;">
                            Seluruh koleksi bahan pustaka fisik hanya dapat dibaca di tempat demi pelestarian arsip dan dokumen bersejarah.
                        </p>
                    </div>

                    <div class="mt-auto pt-3 border-top" style="border-color: #F1F5F9 !important;">
                        <div class="d-flex align-items-center justify-content-between flex-wrap gap-2">
                            <div>
                                <div class="fw-bold text-dark small">Bantuan Pustakawan</div>
                                <div class="text-muted small">Konsultasi penelusuran naskah &amp; riset</div>
                            </div>
                            <a href="https://wa.me/628118132121?text=Halo%20Admin%20Museum%20Penerangan,%20saya%20ingin%20konsultasi%20Koleksi%20Perpustakaan" target="_blank" rel="noopener noreferrer" class="btn btn-outline-dark btn-sm px-3 py-2 fw-semibold" style="border-radius: 0 !important; font-size: 0.85rem;">
                                <i class="fa-brands fa-whatsapp text-success me-1"></i> Hubungi Call Center
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
