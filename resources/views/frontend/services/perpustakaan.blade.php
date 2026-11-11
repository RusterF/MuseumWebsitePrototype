@extends('layouts.canva')

@section('title', 'Perpustakaan')

@section('content')
<div class="container py-4 position-relative">
    <!-- Blue Title (Canva Page 12) -->
    <h2 class="title-blue mb-4">Perpustakaan</h2>

    <!-- 2 Room Cards at Top: Perpustakaan & Perpustakaan Mini (Canva Page 12) -->
    <div class="row g-4 mb-5">
        <!-- Card 1: Perpustakaan Utama -->
        <div class="col-md-6">
            <div class="card border-0 bg-transparent h-100" style="border-radius: 0 !important;">
                <div class="overflow-hidden mb-2" style="height: 240px; border-radius: 0 !important;">
                    <img src="{{ asset('images/WebMuspenBaruImages/Perpustakaan.png') }}" alt="Perpustakaan" class="w-100 h-100" style="object-fit: cover; border: 1px solid #e2e8f0; border-radius: 0 !important;">
                </div>
                <h5 class="fw-bold text-dark mb-1">Perpustakaan</h5>
                <div class="d-flex align-items-center gap-2 small text-primary" style="font-size: 0.85rem;">
                    <i class="fa-solid fa-location-dot"></i>
                    <span>Lantai 2 Museum Penerangan</span>
                </div>
            </div>
        </div>

        <!-- Card 2: Perpustakaan Mini -->
        <div class="col-md-6">
            <div class="card border-0 bg-transparent h-100" style="border-radius: 0 !important;">
                <div class="overflow-hidden mb-2" style="height: 240px; border-radius: 0 !important;">
                    <img src="{{ asset('images/WebMuspenBaruImages/PerpustakaanMini.png') }}" alt="Perpustakaan Mini" class="w-100 h-100" style="object-fit: cover; border: 1px solid #e2e8f0; border-radius: 0 !important;">
                </div>
                <h5 class="fw-bold text-dark mb-1">Perpustakaan Mini</h5>
                <div class="d-flex align-items-center gap-2 small text-primary" style="font-size: 0.85rem;">
                    <i class="fa-solid fa-location-dot"></i>
                    <span>Lantai 1 Museum Penerangan</span>
                </div>
            </div>
        </div>
    </div>

    <!-- 1. Waktu Operasional (Canva Page 12) -->
    <div class="mb-4">
        <div class="d-flex align-items-center gap-2 mb-2">
            <div style="width: 12px; height: 12px; background: var(--canva-accent-blue);"></div>
            <h5 class="fw-bold text-dark mb-0">Waktu Operasional</h5>
        </div>
        <div class="ps-4 text-secondary small" style="line-height: 1.8;">
            <div>Buka Setiap Hari pukul 09.00 - 15.00 WIB</div>
            <div>Istirahat pukul 12.00 - 13.00 WIB</div>
            <div class="text-muted fst-italic">(Informasi tutup akan diumumkan pada media sosial Museum Penerangan)</div>
        </div>
    </div>

    <!-- 2. Harga Tiket (Canva Page 12) -->
    <div class="mb-4">
        <div class="d-flex align-items-center gap-2 mb-2">
            <div style="width: 12px; height: 12px; background: var(--canva-accent-blue);"></div>
            <h5 class="fw-bold text-dark mb-0">Harga Tiket</h5>
        </div>
        <div class="ps-4 text-secondary small">
            <strong>Gratis</strong>
        </div>
    </div>

    <!-- 3. Koleksi (Canva Page 12) -->
    <div class="mb-4">
        <div class="d-flex align-items-center gap-2 mb-2">
            <div style="width: 12px; height: 12px; background: var(--canva-accent-blue);"></div>
            <h5 class="fw-bold text-dark mb-0">Koleksi</h5>
        </div>
        <div class="service-rules-text ps-4 text-secondary small" style="line-height: 1.85; text-align: justify; text-justify: inter-word;">
            <p class="mb-2" style="text-align: justify; text-justify: inter-word;">
                Perpustakaan Museum Penerangan mengelola berbagai jenis koleksi yang berkaitan dengan sejarah penerangan, komunikasi publik, dan perkembangan media informasi, meliputi:
            </p>
            <ul class="mb-0" style="text-align: justify; text-justify: inter-word;">
                <li><strong>Terbitan Resmi:</strong> Laporan, majalah, buletin, dan dokumen yang diterbitkan oleh Departemen Penerangan hingga Kementerian Komunikasi dan Digital.</li>
                <li><strong>Koleksi Umum:</strong> Literatur tentang komunikasi massa, jurnalistik, penyiaran, perfilman, hubungan masyarakat, dan teknologi informasi.</li>
            </ul>
        </div>
    </div>

    <!-- 4. Layanan Perpustakaan (Canva Page 12) -->
    <div class="mb-4">
        <div class="d-flex align-items-center gap-2 mb-2">
            <div style="width: 12px; height: 12px; background: var(--canva-accent-blue);"></div>
            <h5 class="fw-bold text-dark mb-0">Layanan Perpustakaan</h5>
        </div>
        <ul class="service-rules-text ps-4 text-secondary small mb-0" style="line-height: 1.85; text-align: justify; text-justify: inter-word;">
            <li><strong>Layanan Referensi dan Baca di Tempat:</strong> Pengguna dapat mengakses dan membaca koleksi secara langsung di ruang perpustakaan.</li>
            <li><strong>Layanan Informasi:</strong> Membantu pengguna dalam penelusuran informasi dan koleksi sesuai kebutuhan.</li>
            <li><strong>Katalog Digital (SLiMS):</strong> Menyediakan fasilitas penelusuran koleksi secara daring melalui sistem katalog perpustakaan (<a href="{{ route('collections.library') }}" class="text-primary fw-semibold">Buka Katalog SLiMS</a>).</li>
        </ul>
    </div>

    <!-- 5. Ketentuan Keanggotaan dan Pemanfaatan Koleksi (Canva Page 12) -->
    <div class="mb-5">
        <div class="d-flex align-items-center gap-2 mb-2">
            <div style="width: 12px; height: 12px; background: var(--canva-accent-blue);"></div>
            <h5 class="fw-bold text-dark mb-0">Ketentuan Keanggotaan dan Pemanfaatan Koleksi</h5>
        </div>
        <div class="service-rules-text ps-4 text-secondary small" style="line-height: 1.85; text-align: justify; text-justify: inter-word;">
            <p class="mb-0" style="text-align: justify; text-justify: inter-word;">
                Perpustakaan Museum Penerangan tidak menyediakan layanan peminjaman koleksi. Seluruh bahan pustaka hanya dapat dimanfaatkan untuk dibaca di tempat guna menjaga keamanan dan kelestarian koleksi, khususnya bahan pustaka yang memiliki nilai historis dan referensial.
            </p>
        </div>
    </div>

    <!-- Floating Green Button: Rencanakan Kunjunganmu (Canva Page 12) -->
    <div class="position-fixed bottom-0 end-0 p-4" style="z-index: 1050;">
        <a href="{{ route('booking.create') }}" class="btn btn-success px-4 py-3 fw-bold shadow d-flex align-items-center gap-2" style="border-radius: 0 !important; background-color: #22c55e; border-color: #22c55e;">
            <span>Rencanakan Kunjunganmu</span>
            <i class="fa-regular fa-calendar-check fs-5"></i>
        </a>
    </div>
</div>
@endsection
