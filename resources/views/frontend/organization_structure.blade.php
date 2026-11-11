@extends('layouts.canva')

@section('title', 'Struktur Organisasi')

@section('content')
<!-- Header Banner (The British Museum Style) -->
<section class="page-header-clean">
    <div class="container">
        <div class="section-badge"><i class="fa-solid fa-sitemap"></i> Tata Kelola</div>
        <h1 class="page-title">Struktur Organisasi</h1>
        <p class="page-lead">
            Bagan tata kelola dan hierarki manajerial Museum Penerangan - Direktorat Jenderal Informasi dan Komunikasi Publik.
        </p>
    </div>
</section>

<section class="py-5" style="background-color: var(--muspen-bg-base);">
    <div class="container py-3">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <!-- Structure Flow Chart Card -->
                <div class="muspen-card p-4 p-md-5 text-center shadow mb-5 border">
                    <!-- Level 1: Kepala Museum -->
                    <div class="d-inline-block text-white p-4 px-5 rounded-1 shadow-sm mb-2 position-relative" style="background-color: var(--muspen-bg-base); border: 1px solid rgba(201, 169, 110, 0.35); border-top: 3px solid var(--muspen-accent-gold); max-width: 480px; width: 100%;">
                        <div class="d-inline-flex align-items-center gap-2 px-3 py-1 rounded-1 mb-2" style="background-color: rgba(201, 169, 110, 0.12); border: 1px solid rgba(201, 169, 110, 0.3); color: var(--muspen-accent-gold-light); font-size: 0.72rem; font-weight: 700; letter-spacing: 1px; text-transform: uppercase;">
                            <i class="fa-solid fa-crown" style="font-size: 0.68rem; color: var(--muspen-accent-gold);"></i> Pimpinan Utama
                        </div>
                        <h4 class="fw-bold mb-1 text-white" style="font-family: var(--muspen-font-serif);">Kepala Museum Penerangan</h4>
                        <div class="small" style="color: var(--muspen-text-muted);">Pembina Tata Kelola & Manajerial Museum</div>
                    </div>

                    <!-- Flow Connector Line -->
                    <div class="d-flex justify-content-center my-1">
                        <div style="width: 2px; height: 36px; background: linear-gradient(180deg, rgba(201, 169, 110, 0.5) 0%, rgba(56, 189, 248, 0.3) 100%);"></div>
                    </div>

                    <!-- Level 2: Subbagian Tata Usaha -->
                    <div class="d-inline-block text-white p-3 px-4 rounded-1 mb-2" style="background-color: var(--muspen-bg-surface); border: 1px solid rgba(56, 189, 248, 0.25); border-top: 2px solid var(--muspen-accent-sky); max-width: 420px; width: 100%;">
                        <div class="d-inline-flex align-items-center gap-2 px-3 py-1 rounded-1 mb-2" style="background-color: rgba(56, 189, 248, 0.1); border: 1px solid rgba(56, 189, 248, 0.25); color: var(--muspen-accent-sky); font-size: 0.72rem; font-weight: 600; letter-spacing: 0.5px;">
                            <i class="fa-solid fa-briefcase" style="font-size: 0.68rem;"></i> Dukungan Administrasi
                        </div>
                        <h5 class="fw-bold mb-0 text-white" style="font-family: var(--muspen-font-serif);">Subbagian Tata Usaha & Keuangan</h5>
                    </div>

                    <!-- Flow Connector Line with Horizontal Split -->
                    <div class="d-flex justify-content-center my-1">
                        <div style="width: 2px; height: 36px; background: linear-gradient(180deg, rgba(56, 189, 248, 0.3) 0%, rgba(255, 255, 255, 0.15) 100%);"></div>
                    </div>

                    <!-- Level 3: Kelompok Kerja Teknis -->
                    <div class="row g-4 mt-1">
                        <!-- Pokja 1: Pengelolaan Koleksi (Gold Accent) -->
                        <div class="col-md-4">
                            <div class="muspen-card p-4 rounded-1 h-100 text-center" style="border-top: 3px solid var(--muspen-accent-gold) !important; background-color: var(--muspen-bg-surface);">
                                <div class="feature-icon-box mx-auto mb-3" style="width: 46px; height: 46px;">
                                    <i class="fa-solid fa-boxes-packing fs-5"></i>
                                </div>
                                <h6 class="fw-bold mb-2 text-white" style="font-family: var(--muspen-font-serif); font-size: 1.05rem;">Pokja Pengelolaan Koleksi</h6>
                                <p class="small mb-0" style="color: var(--muspen-text-muted); line-height: 1.6;">
                                    Kurasi, registrasi, konservasi artefak, dan riset sejarah komunikasi.
                                </p>
                            </div>
                        </div>

                        <!-- Pokja 2: Edukasi & Publikasi (Teal Accent) -->
                        <div class="col-md-4">
                            <div class="muspen-card p-4 rounded-1 h-100 text-center" style="border-top: 3px solid var(--muspen-accent-teal) !important; background-color: var(--muspen-bg-surface);">
                                <div class="feature-icon-box feature-icon-box-teal mx-auto mb-3" style="width: 46px; height: 46px;">
                                    <i class="fa-solid fa-vr-cardboard fs-5"></i>
                                </div>
                                <h6 class="fw-bold mb-2 text-white" style="font-family: var(--muspen-font-serif); font-size: 1.05rem;">Pokja Edukasi & Publikasi</h6>
                                <p class="small mb-0" style="color: var(--muspen-text-muted); line-height: 1.6;">
                                    Pemanduan, tur virtual 3D, program talkshow, dan publikasi media sosial.
                                </p>
                            </div>
                        </div>

                        <!-- Pokja 3: Pemeliharaan & IT (Sky Accent) -->
                        <div class="col-md-4">
                            <div class="muspen-card p-4 rounded-1 h-100 text-center" style="border-top: 3px solid var(--muspen-accent-sky) !important; background-color: var(--muspen-bg-surface);">
                                <div class="feature-icon-box feature-icon-box-sky mx-auto mb-3" style="width: 46px; height: 46px;">
                                    <i class="fa-solid fa-server fs-5"></i>
                                </div>
                                <h6 class="fw-bold mb-2 text-white" style="font-family: var(--muspen-font-serif); font-size: 1.05rem;">Pokja Pemeliharaan & IT</h6>
                                <p class="small mb-0" style="color: var(--muspen-text-muted); line-height: 1.6;">
                                    Infrastruktur gedung, server portal website, audio-visual, dan kelistrikan.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Detail Info Pengelola -->
                <div class="text-center">
                    <p class="small mb-3" style="color: var(--muspen-text-muted);">Ingin mengenal lebih dekat staf dan edukator di balik Museum Penerangan?</p>
                    <a href="{{ route('teams') }}" class="btn btn-outline-gold">
                        <i class="fa-solid fa-users me-2"></i>Lihat Profil Tim Pengelola &rarr;
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
