@extends('layouts.canva')

@section('title', 'Peminjaman Gedung atau Koleksi')

@section('content')
<div class="container py-4">
    <!-- Blue Title (Canva Page 10) -->
    <h2 class="title-blue mb-4">Peminjaman Gedung atau Koleksi</h2>

    <!-- Section: Peminjaman Gedung (Canva Page 10) -->
    <div class="mb-5">
        <h5 class="fw-bold text-dark mb-3">Peminjaman Gedung</h5>

        <div class="row g-4">
            <!-- 1. Amphiteater -->
            <div class="col-md-4 col-sm-6">
                <div class="card border-0 bg-transparent h-100" style="border-radius: 0 !important;">
                    <div class="overflow-hidden mb-2" style="height: 180px; border-radius: 0 !important;">
                        <img src="{{ asset('images/WebMuspenBaruImages/Amphiteater.png') }}" alt="Amphiteater" class="w-100 h-100" style="object-fit: cover; border: 1px solid #e2e8f0; border-radius: 0 !important;">
                    </div>
                    <h6 class="fw-bold text-dark mb-1">Amphiteater</h6>
                    <div class="d-flex align-items-center gap-2 small text-primary mb-1" style="font-size: 0.8rem;">
                        <i class="fa-solid fa-location-dot"></i>
                        <span>Taman Museum Penerangan</span>
                    </div>
                    <div class="d-flex align-items-center gap-2 small text-primary" style="font-size: 0.8rem;">
                        <i class="fa-solid fa-users"></i>
                        <span>100 Orang</span>
                    </div>
                </div>
            </div>

            <!-- 2. Plaza -->
            <div class="col-md-4 col-sm-6">
                <div class="card border-0 bg-transparent h-100" style="border-radius: 0 !important;">
                    <div class="overflow-hidden mb-2" style="height: 180px; border-radius: 0 !important;">
                        <img src="{{ asset('images/WebMuspenBaruImages/Plaza.png') }}" alt="Plaza" class="w-100 h-100" style="object-fit: cover; border: 1px solid #e2e8f0; border-radius: 0 !important;">
                    </div>
                    <h6 class="fw-bold text-dark mb-1">Plaza</h6>
                    <div class="d-flex align-items-center gap-2 small text-primary mb-1" style="font-size: 0.8rem;">
                        <i class="fa-solid fa-location-dot"></i>
                        <span>Taman Museum Penerangan</span>
                    </div>
                    <div class="d-flex align-items-center gap-2 small text-primary" style="font-size: 0.8rem;">
                        <i class="fa-solid fa-users"></i>
                        <span>100 Orang</span>
                    </div>
                </div>
            </div>

            <!-- 3. Mini Theater -->
            <div class="col-md-4 col-sm-6">
                <div class="card border-0 bg-transparent h-100" style="border-radius: 0 !important;">
                    <div class="overflow-hidden mb-2" style="height: 180px; border-radius: 0 !important;">
                        <img src="{{ asset('images/WebMuspenBaruImages/MiniTeater.png') }}" alt="Mini Theater" class="w-100 h-100" style="object-fit: cover; border: 1px solid #e2e8f0; border-radius: 0 !important;">
                    </div>
                    <h6 class="fw-bold text-dark mb-1">Mini Theater</h6>
                    <div class="d-flex align-items-center gap-2 small text-primary mb-1" style="font-size: 0.8rem;">
                        <i class="fa-solid fa-location-dot"></i>
                        <span>Lantai 1 Museum Penerangan</span>
                    </div>
                    <div class="d-flex align-items-center gap-2 small text-primary" style="font-size: 0.8rem;">
                        <i class="fa-solid fa-users"></i>
                        <span>70 Orang</span>
                    </div>
                </div>
            </div>

            <!-- 4. Ruang Serbaguna -->
            <div class="col-md-4 col-sm-6">
                <div class="card border-0 bg-transparent h-100" style="border-radius: 0 !important;">
                    <div class="overflow-hidden mb-2" style="height: 180px; border-radius: 0 !important;">
                        <img src="{{ asset('images/WebMuspenBaruImages/RuangSerbaguna.png') }}" alt="Ruang Serbaguna" class="w-100 h-100" style="object-fit: cover; border: 1px solid #e2e8f0; border-radius: 0 !important;">
                    </div>
                    <h6 class="fw-bold text-dark mb-1">Ruang Serbaguna</h6>
                    <div class="d-flex align-items-center gap-2 small text-primary mb-1" style="font-size: 0.8rem;">
                        <i class="fa-solid fa-location-dot"></i>
                        <span>Lantai 2 Museum Penerangan</span>
                    </div>
                    <div class="d-flex align-items-center gap-2 small text-primary" style="font-size: 0.8rem;">
                        <i class="fa-solid fa-users"></i>
                        <span>150 Orang</span>
                    </div>
                </div>
            </div>

            <!-- 5. Ruang Rapat -->
            <div class="col-md-4 col-sm-6">
                <div class="card border-0 bg-transparent h-100" style="border-radius: 0 !important;">
                    <div class="overflow-hidden mb-2" style="height: 180px; border-radius: 0 !important;">
                        <img src="{{ asset('images/WebMuspenBaruImages/RuangRapat.png') }}" alt="Ruang Rapat" class="w-100 h-100" style="object-fit: cover; border: 1px solid #e2e8f0; border-radius: 0 !important;">
                    </div>
                    <h6 class="fw-bold text-dark mb-1">Ruang Rapat</h6>
                    <div class="d-flex align-items-center gap-2 small text-primary mb-1" style="font-size: 0.8rem;">
                        <i class="fa-solid fa-location-dot"></i>
                        <span>Lantai 3 Museum Penerangan</span>
                    </div>
                    <div class="d-flex align-items-center gap-2 small text-primary" style="font-size: 0.8rem;">
                        <i class="fa-solid fa-users"></i>
                        <span>50 Orang</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <hr class="my-5 text-muted opacity-25">

    <!-- Section: Peminjaman Koleksi (Canva Page 10) -->
    <div class="mb-5">
        <h5 class="fw-bold text-dark mb-3">Peminjaman Koleksi</h5>
        <div class="row align-items-center g-4">
            <div class="col-md-6">
                <img src="{{ asset('images/WebMuspenBaruImages/PeminjamanKoleksi.png') }}" alt="Peminjaman Koleksi Museum Penerangan" class="img-fluid w-100 shadow-sm" style="border: 1px solid #e2e8f0; border-radius: 0 !important;">
            </div>
            <div class="col-md-6">
                <p class="service-desc-text text-secondary mb-0" style="line-height: 1.85; font-size: 0.98rem; text-align: justify; text-justify: inter-word;">
                    Museum Penerangan menyediakan layanan peminjaman koleksi sejarah selama jangka waktu yang disepakati bersama pihak instansi pemerintah, institusi pendidikan, museum mitra, komunitas kebudayaan, serta industri kreatif dan media. Peminjaman koleksi didukung dengan informasi kuratorial, standar keamanan, dan pendampingan teknis pelestarian. Seluruh pengajuan diajukan paling lambat 14 hari kerja sebelum pelaksanaan dengan melampirkan surat permohonan resmi kepada Kepala Museum Penerangan.
                </p>
            </div>
        </div>
    </div>

    <hr class="my-4 text-muted opacity-25">

    <!-- Call Center Footer Info (Canva Page 10) -->
    <div class="py-2 mb-4">
        <div class="text-secondary small mb-1">Informasi lebih lanjut dapat menghubungi call centre Museum Penerangan</div>
        <div class="d-flex align-items-center gap-2">
            <i class="fa-brands fa-whatsapp text-success fs-5"></i>
            <a href="https://wa.me/628118132121" target="_blank" class="text-dark fw-bold text-decoration-none">
                +62 811 813 2121
            </a>
        </div>
    </div>
</div>
@endsection
