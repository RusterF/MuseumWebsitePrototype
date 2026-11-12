@extends('layouts.canva')

@section('title', 'Layanan Perpustakaan')

@section('content')
<div class="container py-4 position-relative">
    <!-- Blue Title (Canva Page 12) -->
    <h2 class="title-blue mb-4">Perpustakaan</h2>

    <!-- 2 Room Cards at Top: Perpustakaan & Perpustakaan Mini (Canva Page 12) -->
    <div class="row g-4 mb-5">
        <!-- Card 1: Perpustakaan Utama -->
        <div class="col-md-6">
            <div class="card-canva p-3 shadow-sm h-100 d-flex flex-column" style="background-color: #FFFFFF;">
                <div class="overflow-hidden mb-3 border" style="height: 240px; border-color: #E2E8F0 !important;">
                    <img src="{{ asset('images/WebMuspenBaruImages/Perpustakaan.png') }}" alt="Perpustakaan Museum Penerangan" class="w-100 h-100" style="object-fit: cover;">
                </div>
                <h5 class="fw-bold text-dark mb-2">Perpustakaan Utama</h5>
                <div class="d-flex align-items-center gap-2 small text-primary mb-2">
                    <i class="fa-solid fa-location-dot"></i>
                    <span>Lantai 2 Gedung Museum Penerangan</span>
                </div>
                <p class="text-secondary small mb-0 mt-auto pt-2 border-top">
                    Menyediakan ruang baca hening dengan koleksi referensi lengkap terbitan berkala, literatur ilmu komunikasi, dan sejarah penerangan nasional.
                </p>
            </div>
        </div>

        <!-- Card 2: Perpustakaan Mini -->
        <div class="col-md-6">
            <div class="card-canva p-3 shadow-sm h-100 d-flex flex-column" style="background-color: #FFFFFF;">
                <div class="overflow-hidden mb-3 border" style="height: 240px; border-color: #E2E8F0 !important;">
                    <img src="{{ asset('images/WebMuspenBaruImages/PerpustakaanMini.png') }}" alt="Perpustakaan Mini Museum Penerangan" class="w-100 h-100" style="object-fit: cover;">
                </div>
                <h5 class="fw-bold text-dark mb-2">Perpustakaan Mini & Pojok Baca</h5>
                <div class="d-flex align-items-center gap-2 small text-primary mb-2">
                    <i class="fa-solid fa-location-dot"></i>
                    <span>Lantai 1 Gedung Museum Penerangan</span>
                </div>
                <p class="text-secondary small mb-0 mt-auto pt-2 border-top">
                    Area santai dan ramah keluarga untuk membaca buku ensiklopedia visual, majalah populer, dan bacaan umum seputar komunikasi.
                </p>
            </div>
        </div>
    </div>

    <!-- 1. Jam Operasional (Google Doc Section 5.6) -->
    <div class="card-canva p-4 mb-4 shadow-sm" style="background-color: #F8FAFC;">
        <div class="d-flex align-items-center gap-2 mb-3">
            <span class="section-dot-marker"></span>
            <h5 class="fw-bold text-dark mb-0">Jam Operasional Perpustakaan</h5>
        </div>
        <div class="row g-3">
            <div class="col-md-6">
                <div class="card-canva p-3 bg-white border h-100" style="border-color: #E2E8F0 !important;">
                    <div class="fw-bold text-dark mb-1"><i class="fa-solid fa-book-open text-primary me-2"></i> Perpustakaan Mini (Lantai 1)</div>
                    <p class="small text-secondary mb-1">Mengikuti jam operasional Museum Penerangan:</p>
                    <div class="small fw-semibold text-dark">Buka Setiap Hari: pukul 09.00 - 15.00 WIB</div>
                    <div class="small text-muted">Istirahat: 12.00 - 13.00 WIB</div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card-canva p-3 bg-white border h-100" style="border-color: #E2E8F0 !important;">
                    <div class="fw-bold text-dark mb-1"><i class="fa-solid fa-building-columns text-primary me-2"></i> Perpustakaan Utama (Lantai 2)</div>
                    <p class="small text-secondary mb-1">Beroperasi pada hari kerja kedinasan:</p>
                    <div class="small fw-semibold text-dark">Senin &ndash; Jumat:</div>
                    <ul class="small text-secondary ps-3 mb-0">
                        <li>Buka: 09.00 WIB</li>
                        <li>Istirahat: 12.00 &ndash; 13.00 WIB</li>
                        <li>Tutup: 15.00 WIB</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <!-- 2. Harga Tiket Masuk (Canva Page 12) -->
    <div class="card-canva p-4 mb-4 shadow-sm" style="background-color: #F8FAFC;">
        <div class="d-flex align-items-center gap-2 mb-2">
            <span class="section-dot-marker"></span>
            <h5 class="fw-bold text-dark mb-0">Harga Tiket Akses Perpustakaan</h5>
        </div>
        <div class="ps-3 text-secondary" style="font-size: 0.95rem;">
            <span class="badge-canva-success fs-6 px-3 py-1 fw-bold">Gratis</span>
            <span class="ms-2 small text-muted">Akses ruang baca dan koleksi referensi terbuka untuk seluruh pengunjung museum tanpa pungutan biaya.</span>
        </div>
    </div>

    <!-- 3. Koleksi (Google Doc Section 5.6) -->
    <div class="card-canva p-4 mb-4 shadow-sm">
        <div class="d-flex align-items-center gap-2 mb-3">
            <span class="section-dot-marker"></span>
            <h5 class="fw-bold text-dark mb-0">Koleksi Bahan Pustaka</h5>
        </div>
        <div class="service-rules-text ps-3 text-secondary canva-paragraph-justify" style="line-height: 1.85; font-size: 0.98rem;">
            <p class="mb-3">
                Perpustakaan Museum Penerangan mengelola berbagai jenis koleksi yang berkaitan dengan sejarah penerangan, komunikasi publik, dan perkembangan media informasi, meliputi:
            </p>
            <div class="row g-3">
                <div class="col-md-6">
                    <div class="card-canva p-3 h-100 border-start border-3 border-primary" style="background-color: #F8FAFC;">
                        <h6 class="fw-bold text-dark mb-1"><i class="fa-solid fa-book-bookmark me-2 text-primary"></i> 1. Terbitan Resmi</h6>
                        <p class="small text-muted mb-0">Laporan tahunan, majalah, buletin, dan dokumen yang diterbitkan oleh Departemen Penerangan hingga Kementerian Komunikasi dan Digital.</p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card-canva p-3 h-100 border-start border-3 border-primary" style="background-color: #F8FAFC;">
                        <h6 class="fw-bold text-dark mb-1"><i class="fa-solid fa-newspaper me-2 text-primary"></i> 2. Koleksi Umum</h6>
                        <p class="small text-muted mb-0">Literatur tentang komunikasi massa, jurnalistik, penyiaran, perfilman, hubungan masyarakat, dan teknologi informasi.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- 4. Layanan Perpustakaan (Google Doc Section 5.6) -->
    <div class="card-canva p-4 mb-4 shadow-sm">
        <div class="d-flex align-items-center gap-2 mb-3">
            <span class="section-dot-marker"></span>
            <h5 class="fw-bold text-dark mb-0">Layanan Perpustakaan</h5>
        </div>
        <ul class="service-rules-text ps-4 text-secondary mb-0 canva-paragraph-justify" style="line-height: 1.85; font-size: 0.98rem;">
            <li><strong>Layanan Referensi dan Baca di Tempat:</strong> Pengguna dapat mengakses dan membaca koleksi secara langsung di ruang perpustakaan.</li>
            <li><strong>Layanan Informasi:</strong> Membantu pengguna dalam penelusuran informasi dan koleksi sesuai kebutuhan.</li>
            <li>
                <strong>Katalog Digital (SLiMS):</strong> Menyediakan fasilitas penelusuran koleksi secara daring melalui sistem katalog perpustakaan.
                <div class="mt-2">
                    <a href="{{ route('collections.library') }}" class="btn btn-canva-primary btn-sm px-3 py-1">
                        <i class="fa-solid fa-magnifying-glass me-1"></i> Buka Katalog SLiMS
                    </a>
                </div>
            </li>
        </ul>
    </div>

    <!-- 5. Ketentuan Keanggotaan dan Pemanfaatan Koleksi (Google Doc Section 5.6) -->
    <div class="card-canva p-4 mb-5 shadow-sm border-start border-4 border-primary" style="background-color: #F8FAFC;">
        <div class="d-flex align-items-center gap-2 mb-2">
            <span class="section-dot-marker"></span>
            <h5 class="fw-bold text-dark mb-0">Ketentuan Keanggotaan dan Pemanfaatan Koleksi</h5>
        </div>
        <div class="ps-3 text-secondary canva-paragraph-justify" style="line-height: 1.85; font-size: 0.95rem;">
            <p class="mb-0">
                Perpustakaan Museum Penerangan tidak menyediakan layanan peminjaman koleksi. Seluruh bahan pustaka hanya dapat dimanfaatkan untuk dibaca di tempat guna menjaga keamanan dan kelestarian koleksi, khususnya bahan pustaka yang memiliki nilai historis dan referensial.
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
