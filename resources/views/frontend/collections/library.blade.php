@extends('layouts.canva')

@section('title', 'Koleksi Perpustakaan (SLiMS)')

@section('content')
<!-- Header Banner -->
<section class="section-py bg-light border-bottom">
    <div class="container">
        <!-- Breadcrumb -->
        <nav aria-label="breadcrumb" class="mb-3">
            <ol class="breadcrumb mb-0 small text-uppercase fw-semibold">
                <li class="breadcrumb-item"><a href="{{ route('home') }}" class="text-decoration-none text-muted">Beranda</a></li>
                <li class="breadcrumb-item"><a href="{{ route('collections.index') }}" class="text-decoration-none text-muted">Koleksi</a></li>
                <li class="breadcrumb-item active text-primary" aria-current="page">Koleksi Perpustakaan</li>
            </ol>
        </nav>

        <div class="row align-items-center justify-content-between g-4">
            <div class="col-lg-8">
                <span class="badge bg-primary text-white px-3 py-2 text-uppercase mb-2 fw-bold" style="border-radius: 0 !important; font-size: 0.75rem; letter-spacing: 1px;">Katalog Digital</span>
                <h1 class="display-5 fw-bold text-dark mb-2">Koleksi Perpustakaan (SLiMS)</h1>
                <p class="lead text-secondary mb-0">
                    Akses katalog terintegrasi Senayan Library Management System (SLiMS) resmi Museum Penerangan Kementerian Komunikasi dan Digital RI.
                </p>
            </div>
            <div class="col-lg-4 text-lg-end">
                <a href="https://perpustakaan-muspen.komdigi.go.id/" target="_blank" class="btn btn-outline-dark px-4 py-3 fw-bold text-uppercase" style="border-radius: 0 !important; font-size: 0.85rem;">
                    <i class="fa-solid fa-arrow-up-right-from-square me-2"></i> Buka di Tab Baru
                </a>
            </div>
        </div>
    </div>
</section>

<!-- SLiMS Embed Section -->
<section class="section-py bg-white">
    <div class="container">
        <!-- Quick Info Alert -->
        <div class="alert alert-info border-0 d-flex align-items-center mb-4" style="border-radius: 0 !important; border-left: 4px solid var(--canva-primary) !important;">
            <i class="fa-solid fa-circle-info fs-4 me-3 text-primary"></i>
            <div class="small">
                <strong>Panduan Penelusuran:</strong> Anda dapat langsung mencari judul buku, pengarang, nomor klasifikasi DDC, atau terbitan resmi Departemen Penerangan melalui portal interaktif SLiMS di bawah ini.
            </div>
        </div>

        <!-- SLiMS iframe Frame -->
        <div class="card border p-2 shadow-sm" style="border-radius: 0 !important; overflow: hidden;">
            <div class="d-flex align-items-center justify-content-between p-3 bg-light border-bottom">
                <div class="d-flex align-items-center gap-2">
                    <span class="badge bg-secondary" style="border-radius: 0 !important;">URL</span>
                    <code class="text-dark small">https://perpustakaan-muspen.komdigi.go.id/</code>
                </div>
                <div>
                    <a href="https://perpustakaan-muspen.komdigi.go.id/" target="_blank" class="btn btn-sm btn-primary fw-semibold" style="border-radius: 0 !important;">
                        <i class="fa-solid fa-external-link me-1"></i> Layar Penuh
                    </a>
                </div>
            </div>
            <div class="position-relative" style="width: 100%; min-height: 850px; height: 85vh;">
                <iframe 
                    src="https://perpustakaan-muspen.komdigi.go.id/" 
                    title="Katalog Perpustakaan SLiMS Museum Penerangan"
                    style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; border: none;"
                    allowfullscreen>
                </iframe>
            </div>
        </div>

        <!-- Notes on Reading on site -->
        <div class="row g-4 mt-3">
            <div class="col-md-6">
                <div class="p-4 border bg-light h-100" style="border-radius: 0 !important;">
                    <h6 class="fw-bold text-dark mb-2"><i class="fa-solid fa-book-reader text-primary me-2"></i> Ketentuan Baca di Tempat</h6>
                    <p class="small text-secondary mb-0">
                        Seluruh koleksi bahan pustaka fisik hanya dapat dibaca di ruang perpustakaan (Lantai 1 Mini & Lantai 2 Utama) dan tidak dapat dipinjam untuk dibawa pulang demi pelestarian arsip.
                    </p>
                </div>
            </div>
            <div class="col-md-6">
                <div class="p-4 border bg-light h-100" style="border-radius: 0 !important;">
                    <h6 class="fw-bold text-dark mb-2"><i class="fa-solid fa-headset text-success me-2"></i> Bantuan Pustakawan</h6>
                    <p class="small text-secondary mb-0">
                        Memerlukan bantuan penelusuran naskah kuno atau dokumen khusus? Hubungi petugas kami di Call Center WhatsApp <strong>+62 811 813 2121</strong>.
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

