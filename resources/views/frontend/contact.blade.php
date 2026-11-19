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
            <!-- Left: Official Contact List -->
            <div class="col-lg-5">
                <div class="d-flex flex-column h-100 pe-lg-4">
                    <h3 class="fw-bold text-dark mb-4">Saluran Resmi Muspen</h3>

                    @php
                        $cleanPhone = preg_replace('/[^0-9]/', '', $phone ?? '08118132121');
                        if (str_starts_with($cleanPhone, '0')) {
                            $waNumber = '62' . substr($cleanPhone, 1);
                        } else {
                            $waNumber = $cleanPhone;
                        }
                        $igUrl = \App\Models\Setting::get('instagram', 'https://www.instagram.com/museumpenerangan');
                        $tiktokUrl = \App\Models\Setting::get('tiktok', 'https://www.tiktok.com/@muspenerangan');
                    @endphp

                    <!-- 1. Call Center -->
                    <div class="d-flex gap-3 mb-4">
                        <div class="text-success fs-3 flex-shrink-0 pt-1" style="width: 36px;">
                            <i class="fa-brands fa-whatsapp"></i>
                        </div>
                        <div>
                            <span class="text-muted small text-uppercase fw-bold">Call Center & WhatsApp</span>
                            <h5 class="fw-bold text-dark mb-1">{{ $phone ?? '0811-8132-121' }}</h5>
                            <a href="https://wa.me/{{ $waNumber }}" target="_blank" rel="noopener noreferrer" class="small text-success fw-bold text-decoration-none">
                                Chat WhatsApp Sekarang &rarr;
                            </a>
                        </div>
                    </div>

                    <!-- 2. Instagram -->
                    <div class="d-flex gap-3 mb-4">
                        <div class="text-danger fs-3 flex-shrink-0 pt-1" style="width: 36px;">
                            <i class="fa-brands fa-instagram"></i>
                        </div>
                        <div>
                            <span class="text-muted small text-uppercase fw-bold">Instagram</span>
                            <h5 class="fw-bold text-dark mb-1">@museumpenerangan</h5>
                            <a href="{{ $igUrl }}" target="_blank" rel="noopener noreferrer" class="small text-danger fw-bold text-decoration-none">
                                Kunjungi Profil Instagram &rarr;
                            </a>
                        </div>
                    </div>

                    <!-- 3. TikTok -->
                    <div class="d-flex gap-3 mb-4">
                        <div class="text-dark fs-3 flex-shrink-0 pt-1" style="width: 36px;">
                            <i class="fa-brands fa-tiktok"></i>
                        </div>
                        <div>
                            <span class="text-muted small text-uppercase fw-bold">TikTok</span>
                            <h5 class="fw-bold text-dark mb-1">@muspenerangan</h5>
                            <a href="{{ $tiktokUrl }}" target="_blank" rel="noopener noreferrer" class="small text-dark fw-bold text-decoration-none">
                                Tonton di TikTok &rarr;
                            </a>
                        </div>
                    </div>

                    <!-- 4. Email Resmi -->
                    <div class="d-flex gap-3 mb-4">
                        <div class="text-primary fs-3 flex-shrink-0 pt-1" style="width: 36px;">
                            <i class="fa-regular fa-envelope"></i>
                        </div>
                        <div>
                            <span class="text-muted small text-uppercase fw-bold">Email Resmi</span>
                            <h6 class="fw-bold text-dark mb-1">{{ $email ?? 'museumpenerangan@gmail.com' }}</h6>
                            <span class="small text-muted">Surat resmi, kemitraan & kedinasan</span>
                        </div>
                    </div>

                    <!-- 5. Alamat Fisik -->
                    <div class="d-flex gap-3 mb-4">
                        <div class="text-warning fs-3 flex-shrink-0 pt-1" style="width: 36px;">
                            <i class="fa-solid fa-location-dot"></i>
                        </div>
                        <div>
                            <span class="text-muted small text-uppercase fw-bold">Alamat Gedung</span>
                            <p class="small text-secondary mb-0" style="line-height: 1.6;">
                                {{ strip_tags($address ?? 'Kompleks Taman Mini Indonesia Indah (TMII), Jl. Raya Pintu 2 TMII, Jakarta Timur') }}
                            </p>
                        </div>
                    </div>

                    <div class="pt-3 border-top mt-auto">
                        <a href="{{ route('booking.create') }}" class="btn-canva-primary w-100 py-3 fw-bold text-uppercase justify-content-center" style="font-size: 0.85rem;">
                            Reservasi Kunjungan Sekarang <i class="fa-solid fa-arrow-right-long ms-2"></i>
                        </a>
                    </div>
                </div>
            </div>

            <!-- Right: Map & Operational Guidelines -->
            <div class="col-lg-7">
                <div class="d-flex flex-column h-100">
                    <div class="d-flex justify-content-between align-items-center mb-3 flex-wrap gap-2">
                        <h4 class="fw-bold text-dark mb-0">Peta Lokasi Google Maps</h4>
                        <a href="https://maps.app.goo.gl/3q6Z1v1c" target="_blank" rel="noopener noreferrer" class="btn btn-sm btn-outline-dark fw-semibold">
                            Buka di Aplikasi Maps <i class="fa-solid fa-arrow-up-right-from-square ms-1"></i>
                        </a>
                    </div>

                    <!-- Google Maps Iframe -->
                    <div class="ratio ratio-16x9 flex-grow-1 mb-4" style="min-height: 380px;">
                        <iframe title="Peta Lokasi Museum Penerangan di TMII" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3965.728881709309!2d106.8973719!3d-6.3006208!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69ed5a7114bbfd%3A0xe54ef7bf8be7091!2sMuseum%20Penerangan!5e0!3m2!1sid!2sid!4v1657000000000!5m2!1sid!2sid" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade" style="border:0; width:100%; height:100%;"></iframe>
                    </div>

                    <!-- Rute & Petunjuk Kunjungan -->
                    <div class="row g-4">
                        <div class="col-md-6">
                            <strong class="text-dark d-block mb-1"><i class="fa-solid fa-train-subway text-primary me-1"></i> Transportasi LRT:</strong>
                            <span class="text-secondary small" style="line-height: 1.7;">Turun di <strong>Stasiun LRT TMII</strong>, lanjutkan menaiki Shuttle Keliling TMII menuju Halte Museum Penerangan.</span>
                        </div>
                        <div class="col-md-6">
                            <strong class="text-dark d-block mb-1"><i class="fa-solid fa-bus text-primary me-1"></i> Transportasi TransJakarta:</strong>
                            <span class="text-secondary small" style="line-height: 1.7;">Gunakan rute Koridor 9 / Mikrotrans JakLingko arah TMII Pintu 3, lalu masuk melalui Gerbang Utama TMII.</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
