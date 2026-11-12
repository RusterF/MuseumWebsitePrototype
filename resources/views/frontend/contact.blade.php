@extends('layouts.canva')

@section('title', 'Kontak & Saluran Informasi')

@section('content')
<!-- Header Banner -->
<section class="page-header-canva">
    <div class="container">
        <!-- Breadcrumb -->
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb-canva mb-3">
                <li><a href="{{ route('home') }}">Beranda</a></li>
                <li class="separator">/</li>
                <li class="current">Kontak & Lokasi</li>
            </ol>
        </nav>

        <span class="badge-canva mb-2 text-uppercase fw-bold" style="background-color: rgba(255,255,255,0.12); color: #FFFFFF; border-color: rgba(255,255,255,0.25);">Pusat Komunikasi</span>
        <h1 class="display-5 fw-bold text-white mb-2">Kontak & Lokasi Museum</h1>
        <p class="page-lead">
            Hubungi kanal resmi Museum Penerangan untuk informasi kunjungan, kemitraan, media, dan reservasi edukasi.
        </p>
    </div>
</section>

<!-- Contact Channels & Map Section -->
<section class="section-py bg-white">
    <div class="container">
        <div class="row g-5">
            <!-- Left: Official Contact Cards -->
            <div class="col-lg-5">
                <div class="card-canva p-4 p-md-5 h-100 shadow-sm border-top border-4 border-primary d-flex flex-column" style="background-color: #F8FAFC;">
                    <h4 class="fw-bold text-dark mb-4">Saluran Resmi Muspen</h4>

                    <!-- 1. Call Center -->
                    <div class="d-flex gap-3 mb-4">
                        <div class="p-3 bg-white border text-success d-flex align-items-center justify-content-center flex-shrink-0" style="width: 50px; height: 50px;">
                            <i class="fa-brands fa-whatsapp fs-4"></i>
                        </div>
                        <div>
                            <span class="text-muted small text-uppercase fw-bold">Call Center & WhatsApp</span>
                            <h5 class="fw-bold text-dark mb-1">0811-8132-121</h5>
                            <a href="https://wa.me/628118132121" target="_blank" rel="noopener noreferrer" class="small text-success fw-bold text-decoration-none">
                                Chat WhatsApp Sekarang &rarr;
                            </a>
                        </div>
                    </div>

                    <!-- 2. Instagram -->
                    <div class="d-flex gap-3 mb-4">
                        <div class="p-3 bg-white border text-danger d-flex align-items-center justify-content-center flex-shrink-0" style="width: 50px; height: 50px;">
                            <i class="fa-brands fa-instagram fs-4"></i>
                        </div>
                        <div>
                            <span class="text-muted small text-uppercase fw-bold">Instagram</span>
                            <h5 class="fw-bold text-dark mb-1">@museumpenerangan</h5>
                            <a href="https://www.instagram.com/museumpenerangan" target="_blank" rel="noopener noreferrer" class="small text-danger fw-bold text-decoration-none">
                                Kunjungi Profil Instagram &rarr;
                            </a>
                        </div>
                    </div>

                    <!-- 3. TikTok -->
                    <div class="d-flex gap-3 mb-4">
                        <div class="p-3 bg-white border text-dark d-flex align-items-center justify-content-center flex-shrink-0" style="width: 50px; height: 50px;">
                            <i class="fa-brands fa-tiktok fs-4"></i>
                        </div>
                        <div>
                            <span class="text-muted small text-uppercase fw-bold">TikTok</span>
                            <h5 class="fw-bold text-dark mb-1">@muspenerangan</h5>
                            <a href="https://www.tiktok.com/@muspenerangan" target="_blank" rel="noopener noreferrer" class="small text-dark fw-bold text-decoration-none">
                                Tonton di TikTok &rarr;
                            </a>
                        </div>
                    </div>

                    <!-- 4. Email Resmi -->
                    <div class="d-flex gap-3 mb-4">
                        <div class="p-3 bg-white border text-primary d-flex align-items-center justify-content-center flex-shrink-0" style="width: 50px; height: 50px;">
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
                        <div class="p-3 bg-white border text-warning d-flex align-items-center justify-content-center flex-shrink-0" style="width: 50px; height: 50px;">
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
                        <a href="{{ route('booking.create') }}" class="btn-canva-primary w-100 py-3 fw-bold text-uppercase justify-content-center" style="font-size: 0.85rem;">
                            <i class="fa-solid fa-calendar-check me-2"></i> Reservasi Kunjungan Sekarang
                        </a>
                    </div>
                </div>
            </div>

            <!-- Right: Map & Operational Guidelines -->
            <div class="col-lg-7">
                <div class="card-canva p-4 bg-white shadow-sm h-100 d-flex flex-column">
                    <div class="d-flex justify-content-between align-items-center mb-3 flex-wrap gap-2">
                        <h5 class="fw-bold text-dark mb-0"><i class="fa-solid fa-map-location-dot text-primary me-2"></i> Peta Lokasi Google Maps</h5>
                        <a href="https://maps.app.goo.gl/3q6Z1v1c" target="_blank" rel="noopener noreferrer" class="btn btn-sm btn-outline-dark fw-semibold">
                            <i class="fa-solid fa-arrow-up-right-from-square me-1"></i> Buka di Aplikasi Maps
                        </a>
                    </div>

                    <!-- Google Maps Iframe -->
                    <div class="ratio ratio-16x9 border flex-grow-1" style="min-height: 380px;">
                        <iframe title="Peta Lokasi Museum Penerangan di TMII" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3965.728881709309!2d106.8973719!3d-6.3006208!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69ed5a7114bbfd%3A0xe54ef7bf8be7091!2sMuseum%20Penerangan!5e0!3m2!1sid!2sid!4v1657000000000!5m2!1sid!2sid" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade" style="border:0; width:100%; height:100%;"></iframe>
                    </div>

                    <!-- Rute & Petunjuk Kunjungan -->
                    <div class="row g-3 mt-3">
                        <div class="col-md-6">
                            <div class="p-3 border small" style="background-color: #F8FAFC;">
                                <strong class="text-dark d-block mb-1"><i class="fa-solid fa-train-subway text-primary me-1"></i> Transportasi LRT:</strong>
                                <span class="text-secondary">Turun di <strong>Stasiun LRT TMII</strong>, lanjutkan menaiki Shuttle Keliling TMII menuju Halte Museum Penerangan.</span>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="p-3 border small" style="background-color: #F8FAFC;">
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
