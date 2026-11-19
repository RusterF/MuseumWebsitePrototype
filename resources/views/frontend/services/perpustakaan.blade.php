@extends('layouts.canva')

@section('title', 'Layanan Perpustakaan')

@section('content')
<div class="container py-4 position-relative">
    <!-- Blue Title (Canva Page 12) -->
    <h2 class="title-blue mb-4">Perpustakaan</h2>

    <!-- 2 Room Cards at Top: Perpustakaan & Perpustakaan Mini (Canva Page 12) -->
    <div class="row g-4 g-lg-5 mb-5">
        <!-- Card 1: Perpustakaan Utama -->
        <div class="col-md-6">
            <div class="d-flex flex-column h-100">
                <img src="{{ asset('images/WebMuspenBaruImages/Perpustakaan.webp') }}" alt="Perpustakaan Museum Penerangan" class="w-100 mb-3" style="height: 250px; object-fit: cover;" loading="lazy" decoding="async">
                <h4 class="fw-bold text-dark mb-2">Perpustakaan Utama</h4>
                <div class="d-flex align-items-center gap-2 small text-primary mb-2">
                    <i class="fa-solid fa-location-dot"></i>
                    <span>Lantai 2 Gedung Museum Penerangan</span>
                </div>
                <p class="text-secondary small mb-0 mt-auto pt-2 border-top" style="line-height: 1.7;">
                    Menyediakan ruang baca hening dengan koleksi referensi lengkap terbitan berkala, literatur ilmu komunikasi, dan sejarah penerangan nasional.
                </p>
            </div>
        </div>

        <!-- Card 2: Perpustakaan Mini -->
        <div class="col-md-6">
            <div class="d-flex flex-column h-100">
                <img src="{{ asset('images/WebMuspenBaruImages/PerpustakaanMini.webp') }}" alt="Perpustakaan Mini Museum Penerangan" class="w-100 mb-3" style="height: 250px; object-fit: cover;" loading="lazy" decoding="async">
                <h4 class="fw-bold text-dark mb-2">Perpustakaan Mini & Pojok Baca</h4>
                <div class="d-flex align-items-center gap-2 small text-primary mb-2">
                    <i class="fa-solid fa-location-dot"></i>
                    <span>Lantai 1 Gedung Museum Penerangan</span>
                </div>
                <p class="text-secondary small mb-0 mt-auto pt-2 border-top" style="line-height: 1.7;">
                    Area santai dan ramah keluarga untuk membaca buku ensiklopedia visual, majalah populer, dan bacaan umum seputar komunikasi.
                </p>
            </div>
        </div>
    </div>

    <hr class="my-5 text-muted opacity-25">

    <!-- 1 & 2. Jam Operasional & Tiket Masuk -->
    <div class="row g-4 g-lg-5 mb-5">
        <!-- 1. Jam Operasional (Google Doc Section 5.6) -->
        <div class="col-md-8">
            <div class="d-flex align-items-center gap-2 mb-3">
                <span class="section-emoji-blue">🕒</span>
                <h5 class="fw-bold text-dark mb-0">Jam Operasional Perpustakaan</h5>
            </div>
            <div class="row g-4 ps-3">
                <div class="col-sm-6">
                    <div class="fw-bold text-dark mb-1"><i class="fa-solid fa-book-open text-primary me-2"></i> Perpustakaan Mini (Lt. 1)</div>
                    <p class="small text-secondary mb-1">Mengikuti jam operasional Museum:</p>
                    <div class="small fw-semibold text-dark">Setiap Hari: 09.00 - 15.00 WIB</div>
                    <div class="small text-muted">Istirahat: 12.00 - 13.00 WIB</div>
                </div>
                <div class="col-sm-6">
                    <div class="fw-bold text-dark mb-1"><i class="fa-solid fa-building-columns text-primary me-2"></i> Perpustakaan Utama (Lt. 2)</div>
                    <p class="small text-secondary mb-1">Hari kerja kedinasan:</p>
                    <div class="small fw-semibold text-dark">Senin &ndash; Jumat: 09.00 - 15.00 WIB</div>
                    <div class="small text-muted">Istirahat: 12.00 - 13.00 WIB</div>
                </div>
            </div>
        </div>

        <!-- 2. Harga Tiket Masuk (Canva Page 12) -->
        <div class="col-md-4">
            <div class="d-flex align-items-center gap-2 mb-3">
                <span class="section-emoji-blue">🎟️</span>
                <h5 class="fw-bold text-dark mb-0">Akses Perpustakaan</h5>
            </div>
            <div class="ps-3 text-secondary">
                <div class="mb-2">
                    <span class="badge-canva-success fs-6 px-3 py-1 fw-bold">Gratis</span>
                </div>
                <p class="small text-muted mb-0">Akses ruang baca dan koleksi referensi terbuka untuk seluruh pengunjung tanpa pungutan biaya.</p>
            </div>
        </div>
    </div>

    <hr class="my-5 text-muted opacity-25">

    <!-- 3. Koleksi (Google Doc Section 5.6) -->
    <div class="mb-5">
        <div class="d-flex align-items-center gap-2 mb-3">
            <span class="section-emoji-blue">📘</span>
            <h4 class="fw-bold text-dark mb-0">Koleksi Bahan Pustaka</h4>
        </div>
        <div class="service-rules-text ps-3 text-secondary canva-paragraph-justify" style="line-height: 1.85; font-size: 1rem;">
            <p class="mb-4 text-dark">
                Perpustakaan Museum Penerangan mengelola berbagai jenis koleksi yang berkaitan dengan sejarah penerangan, komunikasi publik, dan perkembangan media informasi, meliputi:
            </p>
            <div class="row g-4">
                <div class="col-md-6">
                    <h6 class="fw-bold text-dark mb-2"><i class="fa-solid fa-book-bookmark me-2 text-primary"></i> 1. Terbitan Resmi</h6>
                    <p class="text-secondary small mb-0" style="line-height: 1.7;">Laporan tahunan, majalah, buletin, dan dokumen yang diterbitkan oleh Departemen Penerangan hingga Kementerian Komunikasi dan Digital.</p>
                </div>
                <div class="col-md-6">
                    <h6 class="fw-bold text-dark mb-2"><i class="fa-solid fa-newspaper me-2 text-primary"></i> 2. Koleksi Umum</h6>
                    <p class="text-secondary small mb-0" style="line-height: 1.7;">Literatur tentang komunikasi massa, jurnalistik, penyiaran, perfilman, hubungan masyarakat, dan teknologi informasi.</p>
                </div>
            </div>
        </div>
    </div>

    <hr class="my-5 text-muted opacity-25">

    <!-- 4. Layanan Perpustakaan (Google Doc Section 5.6) -->
    <div class="mb-5">
        <div class="d-flex align-items-center gap-2 mb-3">
            <span class="section-emoji-blue">ℹ️</span>
            <h4 class="fw-bold text-dark mb-0">Layanan Perpustakaan</h4>
        </div>
        <ul class="service-rules-text ps-4 text-secondary mb-0 canva-paragraph-justify" style="line-height: 1.85; font-size: 1rem;">
            <li class="mb-2"><strong>Layanan Referensi dan Baca di Tempat:</strong> Pengguna dapat mengakses dan membaca koleksi secara langsung di ruang perpustakaan.</li>
            <li class="mb-2"><strong>Layanan Informasi:</strong> Membantu pengguna dalam penelusuran informasi dan koleksi sesuai kebutuhan.</li>
            <li>
                <strong>Katalog Digital (SLiMS):</strong> Menyediakan fasilitas penelusuran koleksi secara daring melalui sistem katalog perpustakaan.
                <div class="mt-2">
                    <a href="{{ route('collections.library') }}" class="btn btn-canva-primary btn-sm px-3 py-1">
                        Buka Katalog SLiMS <i class="fa-solid fa-arrow-right-long ms-1"></i>
                    </a>
                </div>
            </li>
        </ul>
    </div>

    <hr class="my-5 text-muted opacity-25">

    <!-- 5. Ketentuan Keanggotaan dan Pemanfaatan Koleksi (Google Doc Section 5.6) -->
    <div class="mb-5">
        <div class="d-flex align-items-center gap-2 mb-2">
            <span class="section-emoji-blue">📋</span>
            <h4 class="fw-bold text-dark mb-0">Ketentuan Pemanfaatan Koleksi</h4>
        </div>
        <div class="ps-3 text-secondary canva-paragraph-justify" style="line-height: 1.85; font-size: 1rem;">
            <p class="mb-0">
                Perpustakaan Museum Penerangan tidak menyediakan layanan peminjaman koleksi untuk dibawa pulang. Seluruh bahan pustaka hanya dapat dimanfaatkan untuk dibaca di tempat guna menjaga keamanan dan kelestarian koleksi, khususnya bahan pustaka yang memiliki nilai historis dan referensial.
            </p>
        </div>
    </div>

    <!-- Floating / Sticky Button: Rencanakan Kunjunganmu (Canva Page 12) -->
    <div class="position-fixed bottom-0 end-0 p-3 p-md-4" style="z-index: 1050;">
        <a href="https://wa.me/628118132121?text=Halo%20Admin%20Museum%20Penerangan,%20saya%20ingin%20mengajukan%20Kunjungan%20Perpustakaan" target="_blank" rel="noopener noreferrer" class="btn btn-success px-4 py-3 fw-bold shadow-lg d-flex align-items-center gap-2" style="background-color: #22c55e; border-color: #22c55e;">
            <i class="fa-brands fa-whatsapp fs-5"></i>
            <span>Reservasi Kunjungan</span>
        </a>
    </div>
</div>
@endsection
