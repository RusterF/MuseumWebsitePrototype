@extends('layouts.canva')

@section('title', 'Struktur Organisasi - Museum Penerangan')

@section('content')
<!-- Header Banner -->
<section class="page-header-canva">
    <div class="container">
        <!-- Breadcrumb -->
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb-canva mb-3">
                <li><a href="{{ route('home') }}">Beranda</a></li>
                <li class="separator">/</li>
                <li><a href="{{ route('about-us') }}">Tentang</a></li>
                <li class="separator">/</li>
                <li class="current">Struktur Organisasi</li>
            </ol>
        </nav>

        <span class="badge-canva mb-2 text-uppercase fw-bold" style="background-color: rgba(255,255,255,0.12); color: #FFFFFF; border-color: rgba(255,255,255,0.25);">
            <i class="fa-solid fa-sitemap me-1"></i> Tata Kelola
        </span>
        <h1 class="display-5 fw-bold text-white mb-2">Struktur Organisasi</h1>
        <p class="page-lead">
            Bagan tata kelola dan hierarki manajerial Museum Penerangan - Direktorat Jenderal Informasi dan Komunikasi Publik.
        </p>
    </div>
</section>

<section class="section-py bg-light">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <!-- Structure Flow Chart Card -->
                <div class="card-canva p-4 p-md-5 text-center shadow-sm mb-5" style="background-color: #FFFFFF;">
                    <!-- Level 1: Kepala Museum -->
                    <div class="d-inline-block text-center p-4 px-5 shadow-sm mb-2 border border-2 border-primary" style="background-color: #F8FAFC; max-width: 480px; width: 100%;">
                        <div class="badge-canva mb-2">
                            <i class="fa-solid fa-crown me-1"></i> Pimpinan Utama
                        </div>
                        <h4 class="fw-bold mb-1 text-dark">Kepala Museum Penerangan</h4>
                        <div class="small text-secondary">Pembina Tata Kelola & Manajerial Museum</div>
                    </div>

                    <!-- Flow Connector Line -->
                    <div class="d-flex justify-content-center my-1">
                        <div style="width: 2px; height: 36px; background-color: var(--canva-accent-blue);"></div>
                    </div>

                    <!-- Level 2: Subbagian Tata Usaha -->
                    <div class="d-inline-block text-center p-3 px-4 shadow-sm mb-2 border" style="background-color: #FFFFFF; border-top: 3px solid var(--canva-accent-blue) !important; max-width: 420px; width: 100%; border-color: #E2E8F0 !important;">
                        <span class="badge-canva mb-2" style="font-size: 0.72rem;">
                            <i class="fa-solid fa-briefcase me-1"></i> Dukungan Administrasi
                        </span>
                        <h5 class="fw-bold mb-0 text-dark">Subbagian Tata Usaha & Keuangan</h5>
                    </div>

                    <!-- Flow Connector Line with Horizontal Split -->
                    <div class="d-flex justify-content-center my-1">
                        <div style="width: 2px; height: 36px; background-color: var(--canva-accent-blue);"></div>
                    </div>

                    <!-- Level 3: Kelompok Kerja Teknis -->
                    <div class="row g-4 mt-1">
                        <!-- Pokja 1: Pengelolaan Koleksi -->
                        <div class="col-md-4">
                            <div class="card-canva p-4 h-100 text-center shadow-sm border-top border-3 border-primary" style="background-color: #F8FAFC;">
                                <div class="d-inline-flex align-items-center justify-content-center text-primary mb-3 p-3 bg-white border" style="width: 48px; height: 48px;">
                                    <i class="fa-solid fa-boxes-packing fs-5"></i>
                                </div>
                                <h6 class="fw-bold mb-2 text-dark" style="font-size: 1.05rem;">Pokja Pengelolaan Koleksi</h6>
                                <p class="small mb-0 text-secondary" style="line-height: 1.6;">
                                    Kurasi, registrasi, konservasi artefak, dan riset sejarah komunikasi.
                                </p>
                            </div>
                        </div>

                        <!-- Pokja 2: Edukasi & Publikasi -->
                        <div class="col-md-4">
                            <div class="card-canva p-4 h-100 text-center shadow-sm border-top border-3 border-primary" style="background-color: #F8FAFC;">
                                <div class="d-inline-flex align-items-center justify-content-center text-primary mb-3 p-3 bg-white border" style="width: 48px; height: 48px;">
                                    <i class="fa-solid fa-vr-cardboard fs-5"></i>
                                </div>
                                <h6 class="fw-bold mb-2 text-dark" style="font-size: 1.05rem;">Pokja Edukasi & Publikasi</h6>
                                <p class="small mb-0 text-secondary" style="line-height: 1.6;">
                                    Pemanduan, tur virtual 3D, program talkshow, dan publikasi media sosial.
                                </p>
                            </div>
                        </div>

                        <!-- Pokja 3: Pemeliharaan & IT -->
                        <div class="col-md-4">
                            <div class="card-canva p-4 h-100 text-center shadow-sm border-top border-3 border-primary" style="background-color: #F8FAFC;">
                                <div class="d-inline-flex align-items-center justify-content-center text-primary mb-3 p-3 bg-white border" style="width: 48px; height: 48px;">
                                    <i class="fa-solid fa-server fs-5"></i>
                                </div>
                                <h6 class="fw-bold mb-2 text-dark" style="font-size: 1.05rem;">Pokja Pemeliharaan & IT</h6>
                                <p class="small mb-0 text-secondary" style="line-height: 1.6;">
                                    Infrastruktur gedung, server portal website, audio-visual, dan kelistrikan.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Detail Info Pengelola -->
                <div class="text-center">
                    <p class="small mb-3 text-secondary">Ingin mengenal lebih dekat staf dan edukator di balik Museum Penerangan?</p>
                    <a href="{{ route('teams') }}" class="btn-canva-outline">
                        <i class="fa-solid fa-users me-2"></i>Lihat Profil Tim Pengelola &rarr;
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
