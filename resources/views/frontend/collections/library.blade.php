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

<!-- Main Content Section -->
<section class="section-py bg-white">
    <div class="container" style="max-width: 1140px;">
        <!-- Search & Portal Action Section -->
        <div class="search-catalog-wrapper mb-5 pb-3">
            <div class="text-center mb-4">
                
                <h2 class="title-blue mb-2" style="font-size: 2.1rem; font-weight: 700;">
                    Pencarian Katalog Perpustakaan
                </h2>
                <p class="text-secondary mx-auto mb-0" style="max-width: 680px; font-size: 1rem; line-height: 1.6;">
                    Temukan koleksi buku ilmu komunikasi, naskah penyiaran, jurnalistik, pers nasional, dan arsip sejarah penerangan Indonesia.
                </p>
            </div>

            <!-- Search Form Bar -->
            <div class="row justify-content-center mb-3">
                <div class="col-lg-10 col-xl-9">
                    <form action="https://perpustakaan-muspen.komdigi.go.id/index.php" method="GET" target="_blank">
                        <input type="hidden" name="search" value="search">
                        <div class="input-group search-input-group shadow-sm">
                            <span class="input-group-text bg-white ps-3 pe-2 border-2 border-end-0" style="border-color: #002B49; border-radius: 0 !important;">
                                <i class="fa-solid fa-magnifying-glass text-primary" style="font-size: 1.15rem;"></i>
                            </span>
                            <input type="text" name="keywords" class="form-control bg-white border-2 border-start-0 border-end-0 py-2 py-md-3" placeholder="Ketik judul buku, nama pengarang, topik, atau kata kunci pencarian..." style="border-color: #002B49; border-radius: 0 !important; font-size: 0.98rem;" required autocomplete="off">
                            <button type="submit" class="btn btn-primary px-3 px-md-4 py-2 py-md-3 fw-bold text-uppercase d-flex align-items-center gap-2" style="border-radius: 0 !important; background-color: #002B49; border-color: #002B49; font-size: 0.88rem; letter-spacing: 0.5px;">
                                <span>Cari</span>
                                <span class="d-none d-sm-inline">di SLiMS</span>
                                <i class="fa-solid fa-arrow-right"></i>
                            </button>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Popular Quick Tags & Direct Link -->
            <div class="row justify-content-center">
                <div class="col-lg-10 col-xl-9">
                    <div class="d-flex flex-wrap align-items-center justify-content-between gap-3 pt-3 border-top" style="border-color: #E2E8F0 !important;">
                        <div class="d-flex flex-wrap align-items-center gap-2">
                            <span class="text-muted small fw-semibold d-flex align-items-center gap-1">
                                <i class="fa-solid fa-tags text-primary" style="font-size: 0.8rem;"></i>
                                Topik Populer:
                            </span>
                            <a href="https://perpustakaan-muspen.komdigi.go.id/index.php?search=search&keywords=Komunikasi" target="_blank" class="catalog-tag-pill">Komunikasi</a>
                            <a href="https://perpustakaan-muspen.komdigi.go.id/index.php?search=search&keywords=Penerangan" target="_blank" class="catalog-tag-pill">Penerangan</a>
                            <a href="https://perpustakaan-muspen.komdigi.go.id/index.php?search=search&keywords=Radio" target="_blank" class="catalog-tag-pill">Radio</a>
                            <a href="https://perpustakaan-muspen.komdigi.go.id/index.php?search=search&keywords=Televisi" target="_blank" class="catalog-tag-pill">Televisi</a>
                            <a href="https://perpustakaan-muspen.komdigi.go.id/index.php?search=search&keywords=Jurnalistik" target="_blank" class="catalog-tag-pill">Jurnalistik</a>
                            <a href="https://perpustakaan-muspen.komdigi.go.id/index.php?search=search&keywords=Pers" target="_blank" class="catalog-tag-pill">Pers Nasional</a>
                        </div>
                        <div>
                            <a href="https://perpustakaan-muspen.komdigi.go.id/" target="_blank" rel="noopener noreferrer" class="link-cta-canva small fw-bold text-decoration-none d-inline-flex align-items-center gap-1" style="color: var(--canva-accent-blue);">
                                <span>Buka Portal SLiMS Lengkap</span>
                                <i class="fa-solid fa-arrow-up-right-from-square"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- 3 Highlights (Clean border-divided layout, no boxes) -->
            <div class="row justify-content-center mt-4 pt-2">
                <div class="col-lg-10 col-xl-9">
                    <div class="row g-3 py-3 border-top border-bottom text-center text-md-start" style="border-color: #F1F5F9 !important;">
                        <div class="col-md-4">
                            <div class="d-flex align-items-center justify-content-center justify-content-md-start gap-2">
                                <i class="fa-solid fa-book-bookmark text-primary"></i>
                                <span class="small fw-semibold text-dark">Ribuan Judul Buku &amp; Naskah</span>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="d-flex align-items-center justify-content-center justify-content-md-start gap-2">
                                <i class="fa-solid fa-laptop-code text-primary"></i>
                                <span class="small fw-semibold text-dark">Pencarian Terkoneksi SLiMS 9</span>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="d-flex align-items-center justify-content-center justify-content-md-start gap-2">
                                <i class="fa-solid fa-building-columns text-primary"></i>
                                <span class="small fw-semibold text-dark">Koleksi Baca di Tempat &amp; Arsip</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <hr class="my-5 text-muted opacity-25">

        <!-- Two-Column Clean Layout: Ruang Pustaka & Ketentuan Layanan (No cards) -->
        <div class="row g-4 g-lg-5 mb-4">
            <!-- Left: Ruang Baca & Fasilitas -->
            <div class="col-lg-6">
                <div class="mb-4 overflow-hidden" style="height: 250px;">
                    <img src="{{ asset('images/WebMuspenBaruImages/Perpustakaan.webp') }}" alt="Perpustakaan Museum Penerangan" class="w-100 h-100" style="object-fit: cover;" loading="lazy" decoding="async">
                </div>
                <div class="d-flex align-items-center gap-2 mb-2">
                    <span class="section-dot-marker"></span>
                    <h4 class="fw-bold text-dark mb-0">Fasilitas Perpustakaan</h4>
                </div>
                <p class="text-secondary small mb-4" style="line-height: 1.8; font-size: 0.95rem;">
                    Perpustakaan Museum Penerangan mengoleksi ribuan pustaka ilmu komunikasi, penyiaran, jurnalistik, pers nasional, serta dokumentasi arsip Departemen Penerangan RI.
                </p>
                <div class="d-flex flex-column gap-3 pt-3 border-top" style="border-color: #F1F5F9 !important; font-size: 0.95rem;">
                    <div class="d-flex align-items-start gap-3 text-dark">
                        <i class="fa-solid fa-location-dot text-primary mt-1"></i>
                        <div>
                            <strong class="d-block text-dark">Perpustakaan Utama</strong>
                            <span class="text-secondary small">Lantai 2 Gedung Museum Penerangan</span>
                        </div>
                    </div>
                    <div class="d-flex align-items-start gap-3 text-dark">
                        <i class="fa-solid fa-book-open-reader text-primary mt-1"></i>
                        <div>
                            <strong class="d-block text-dark">Perpustakaan Mini &amp; Pojok Baca</strong>
                            <span class="text-secondary small">Lantai 1 Gedung Museum Penerangan</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Right: Ketentuan Layanan & Pustakawan -->
            <div class="col-lg-6">
                <div class="d-flex align-items-center gap-2 mb-4">
                    <span class="section-dot-marker"></span>
                    <h4 class="fw-bold text-dark mb-0">Informasi &amp; Akses Layanan</h4>
                </div>

                <div class="mb-4">
                    <div class="fw-bold text-dark small mb-2 d-flex align-items-center gap-2">
                        <i class="fa-regular fa-clock text-primary"></i>
                        <span>Jam Operasional</span>
                    </div>
                    <p class="text-secondary small mb-0 ps-4" style="line-height: 1.75;">
                        Buka setiap hari: pukul <strong>09.00 - 15.00 WIB</strong><br>
                        <span class="text-muted">Waktu istirahat: 12.00 - 13.00 WIB</span>
                    </p>
                </div>

                <div class="mb-4">
                    <div class="fw-bold text-dark small mb-2 d-flex align-items-center gap-2">
                        <i class="fa-solid fa-book-bookmark text-primary"></i>
                        <span>Ketentuan Baca di Tempat</span>
                    </div>
                    <p class="text-secondary small mb-0 ps-4" style="line-height: 1.75;">
                        Seluruh koleksi bahan pustaka fisik hanya dapat dibaca di tempat demi pelestarian arsip dan dokumen bersejarah.
                    </p>
                </div>

                <div class="pt-4 border-top mt-4" style="border-color: #F1F5F9 !important;">
                    <div class="d-flex align-items-center justify-content-between flex-wrap gap-3">
                        <div>
                            <div class="fw-bold text-dark small">Bantuan Pustakawan</div>
                            <div class="text-muted small">Konsultasi penelusuran naskah &amp; riset</div>
                        </div>
                        <a href="https://wa.me/628118132121?text=Halo%20Admin%20Museum%20Penerangan,%20saya%20ingin%20konsultasi%20Koleksi%20Perpustakaan" target="_blank" rel="noopener noreferrer" class="btn btn-outline-dark px-3 py-2 fw-semibold" style="border-radius: 0 !important; font-size: 0.85rem;">
                            <i class="fa-brands fa-whatsapp text-success me-1"></i> Hubungi Call Center
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
