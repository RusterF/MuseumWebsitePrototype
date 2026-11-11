@extends('layouts.canva')

@section('title', 'Kontak & Saluran Informasi')

@section('content')
<!-- Header Banner -->
<section class="section-py bg-light border-bottom">
    <div class="container">
        <!-- Breadcrumb -->
        <nav aria-label="breadcrumb" class="mb-3">
            <ol class="breadcrumb mb-0 small text-uppercase fw-semibold">
                <li class="breadcrumb-item"><a href="{{ route('home') }}" class="text-decoration-none text-muted">Beranda</a></li>
                <li class="breadcrumb-item active text-primary" aria-current="page">Kontak</li>
            </ol>
        </nav>

        <span class="badge bg-primary text-white px-3 py-2 text-uppercase mb-2 fw-bold" style="border-radius: 0 !important; font-size: 0.75rem; letter-spacing: 1px;">Pusat Komunikasi</span>
        <h1 class="display-5 fw-bold text-dark mb-2">Kontak & Lokasi Museum</h1>
        <p class="lead text-secondary mb-0">
            Hubungi kanal resmi Museum Penerangan untuk informasi kunjungan, kemitraan, media, dan reservasi edukasi.
        </p>
    </div>
</section>

<!-- Contact Channels & Map Section (Google Doc #3 & Canva) -->
<section class="section-py bg-white">
    <div class="container">
        <div class="row g-5">
            <!-- Left: Official Contact Cards -->
            <div class="col-lg-5">
                <div class="card border p-4 p-md-5 bg-light h-100 shadow-sm" style="border-radius: 0 !important; border-top: 4px solid var(--canva-primary) !important;">
                    <h4 class="fw-bold text-dark mb-4">Saluran Resmi Muspen</h4>

                    <!-- 1. Call Center (Google Doc #3) -->
                    <div class="d-flex gap-3 mb-4">
                        <div class="p-3 bg-white border text-success d-flex align-items-center justify-content-center flex-shrink-0" style="width: 50px; height: 50px; border-radius: 0 !important;">
                            <i class="fa-brands fa-whatsapp fs-4"></i>
                        </div>
                        <div>
                            <span class="text-muted small text-uppercase fw-bold">Call Center & WhatsApp</span>
                            <h5 class="fw-bold text-dark mb-1">0811-8132-121</h5>
                            <a href="https://wa.me/628118132121" target="_blank" class="small text-success fw-bold text-decoration-none">
                                Chat WhatsApp Sekarang &rarr;
                            </a>
                        </div>
                    </div>

                    <!-- 2. Instagram (Google Doc #3) -->
                    <div class="d-flex gap-3 mb-4">
                        <div class="p-3 bg-white border text-danger d-flex align-items-center justify-content-center flex-shrink-0" style="width: 50px; height: 50px; border-radius: 0 !important;">
                            <i class="fa-brands fa-instagram fs-4"></i>
                        </div>
                        <div>
                            <span class="text-muted small text-uppercase fw-bold">Instagram</span>
                            <h5 class="fw-bold text-dark mb-1">@museumpenerangan</h5>
                            <a href="https://www.instagram.com/museumpenerangan" target="_blank" class="small text-danger fw-bold text-decoration-none">
                                Kunjungi Profil Instagram &rarr;
                            </a>
                        </div>
                    </div>

                    <!-- 3. TikTok (Google Doc #3) -->
                    <div class="d-flex gap-3 mb-4">
                        <div class="p-3 bg-white border text-dark d-flex align-items-center justify-content-center flex-shrink-0" style="width: 50px; height: 50px; border-radius: 0 !important;">
                            <i class="fa-brands fa-tiktok fs-4"></i>
                        </div>
                        <div>
                            <span class="text-muted small text-uppercase fw-bold">TikTok</span>
                            <h5 class="fw-bold text-dark mb-1">@muspenerangan</h5>
                            <a href="https://www.tiktok.com/@muspenerangan" target="_blank" class="small text-dark fw-bold text-decoration-none">
                                Tonton di TikTok &rarr;
                            </a>
                        </div>
                    </div>

                    <!-- 4. Email Resmi -->
                    <div class="d-flex gap-3 mb-4">
                        <div class="p-3 bg-white border text-primary d-flex align-items-center justify-content-center flex-shrink-0" style="width: 50px; height: 50px; border-radius: 0 !important;">
                            <i class="fa-regular fa-envelope fs-4"></i>
                        </div>
                        <div>
                            <span class="text-muted small text-uppercase fw-bold">Email Resmi</span>
                            <h6 class="fw-bold text-dark mb-1">museumpenerangan@gmail.com</h6>
                            <span class="small text-muted">Surat resmi, kemitraan & kedinasan</span>
                        </div>
                    </div>

                    <!-- 5. Alamat Fisik -->
                    <div class="d-flex gap-3 mb-4">
                        <div class="p-3 bg-white border text-warning d-flex align-items-center justify-content-center flex-shrink-0" style="width: 50px; height: 50px; border-radius: 0 !important;">
                            <i class="fa-solid fa-location-dot fs-4"></i>
                        </div>
                        <div>
                            <span class="text-muted small text-uppercase fw-bold">Alamat Gedung</span>
                            <p class="small text-secondary mb-0" style="line-height: 1.6;">
                                Kompleks Taman Mini Indonesia Indah (TMII), Jl. Raya Pintu 2 TMII, Ceger, Cipayung, Jakarta Timur, DKI Jakarta 13560.
                            </p>
                        </div>
                    </div>

                    <div class="pt-3 border-top mt-auto">
                        <a href="{{ route('booking.create') }}" class="btn btn-primary w-100 py-3 fw-bold text-uppercase" style="border-radius: 0 !important; font-size: 0.85rem;">
                            <i class="fa-solid fa-calendar-check me-2"></i> Reservasi Kunjungan Sekarang
                        </a>
                    </div>
                </div>
            </div>

            <!-- Right: Map & Operational Guidelines -->
            <div class="col-lg-7">
                <div class="card border p-4 bg-white shadow-sm h-100 d-flex flex-column" style="border-radius: 0 !important;">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h5 class="fw-bold text-dark mb-0"><i class="fa-solid fa-map-location-dot text-primary me-2"></i> Peta Lokasi Google Maps</h5>
                        <a href="https://maps.app.goo.gl/3q6Z1v1c" target="_blank" class="btn btn-sm btn-outline-dark fw-semibold" style="border-radius: 0 !important;">
                            Buka di Aplikasi Maps
                        </a>
                    </div>

                    <!-- Google Maps Iframe -->
                    <div class="ratio ratio-16x9 border flex-grow-1" style="min-height: 380px; border-radius: 0 !important;">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3965.728881709309!2d106.8973719!3d-6.3006208!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69ed5a7114bbfd%3A0xe54ef7bf8be7091!2sMuseum%20Penerangan!5e0!3m2!1sid!2sid!4v1657000000000!5m2!1sid!2sid" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade" style="border:0; width:100%; height:100%;"></iframe>
                    </div>

                    <!-- Rute & Petunjuk Kunjungan -->
                    <div class="row g-3 mt-3">
                        <div class="col-md-6">
                            <div class="p-3 bg-light border small" style="border-radius: 0 !important;">
                                <strong class="text-dark d-block mb-1"><i class="fa-solid fa-train-subway text-primary me-1"></i> Transportasi LRT:</strong>
                                <span class="text-secondary">Turun di <strong>Stasiun LRT TMII</strong>, lanjutkan menaiki Shuttle Keliling TMII menuju Halte Museum Penerangan.</span>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="p-3 bg-light border small" style="border-radius: 0 !important;">
                                <strong class="text-dark d-block mb-1"><i class="fa-solid fa-bus text-primary me-1"></i> Transportasi TransJakarta:</strong>
                                <span class="text-secondary">Gunakan rute Koridor 9 / Mikrotrans JakLingko arah TMII Pintu 3, lalu masuk melalui Gerbang Utama TMII.</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
