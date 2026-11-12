@extends('layouts.canva')

@php
    $catSlug = request('category');
    $categoryTitles = [
        'sejarah-fotojurnalisme-dan-jurnalisme' => 'Fotojurnalisme dan Jurnalisme',
        'sejarah-radio' => 'Radio',
        'sejarah-televisi' => 'Televisi',
        'sejarah-perfilman' => 'Perfilman',
        'sejarah-percetakan' => 'Percetakan',
        'sejarah-departemen-penerangan-dan-komunikasi-tradisional' => 'Departemen Penerangan dan Komunikasi Tradisional',
    ];
    $categoryDescriptions = [
        'sejarah-fotojurnalisme-dan-jurnalisme' => 'Koleksi Sejarah Fotojurnalisme dan Jurnalisme mendokumentasikan kamera bersejarah, perlengkapan rekam gambar, serta karya pewarta foto Indonesia yang mengabadikan peristiwa proklamasi kemerdekaan dan dinamika sejarah bangsa.',
        'sejarah-radio' => 'Koleksi Sejarah Radio merekam jejak perkembangan penyiaran suara di tanah air, mulai dari stasiun radio era kolonial NIROM hingga peran heroik Radio Republik Indonesia (RRI) dalam menyebarkan proklamasi dan mengobarkan semangat perjuangan kemerdekaan bangsa.',
        'sejarah-televisi' => 'Koleksi Sejarah Televisi mendokumentasikan tonggak siaran audiovisual pertama di Indonesia melalui Televisi Republik Indonesia (TVRI) sejak Asian Games IV tahun 1962, meliputi kamera studio legendaris, pemancar, interkom, dan perangkat siaran bersejarah.',
        'sejarah-perfilman' => 'Koleksi Sejarah Perfilman menampilkan saksi bisu perkembangan seni sinematografi nasional, mulai dari kamera produksi film pertama karya Usmar Ismail "Darah dan Doa", proyektor film seluloid, hingga set boneka legendaris Si Unyil.',
        'sejarah-percetakan' => 'Koleksi Sejarah Percetakan memuat mesin cetak bersejarah yang memproduksi surat kabar perjuangan, maklumat proklamasi kemerdekaan, buku pendidikan, hingga teknologi tata letak huruf timbal Linotype dan Letterpress dari berbagai era.',
        'sejarah-departemen-penerangan-dan-komunikasi-tradisional' => 'Koleksi Departemen Penerangan dan Komunikasi Tradisional menghadirkan sarana komunikasi rakyat nusantara dari kentongan, wayang suluh, hingga mobil penerangan keliling dan pameran interaktif juru penerangan di seluruh pelosok negeri.',
    ];
    $pageTitle = $catSlug && isset($categoryTitles[$catSlug]) ? $categoryTitles[$catSlug] : ($catSlug ? ucwords(str_replace(['sejarah-', '-'], ['', ' '], $catSlug)) : 'Koleksi Museum');
    $descText = $catSlug && isset($categoryDescriptions[$catSlug]) ? $categoryDescriptions[$catSlug] : 'Museum Penerangan merawat ratusan artefak bersejarah komunikasi dan penerangan dari masa ke masa.';
@endphp

@section('title', $pageTitle . ' - Koleksi Museum')

@section('content')

@if(request()->filled('category'))
    <!-- ==================== CANVA PAGE 4: KOLEKSI CATEGORY GRID ==================== -->
    <div class="container py-4" style="max-width: 1100px;">
        <!-- Blue Title (Canva Page 4) -->
        <h2 class="title-blue mb-1" style="font-size: 2.1rem;">{{ $pageTitle }}</h2>

        <!-- Breadcrumb below Title (Canva Page 4) -->
        <div class="small text-muted mb-4 pb-2">
            <a href="{{ route('home') }}" class="text-decoration-none text-muted">Beranda</a> / 
            <a href="{{ route('collections.index') }}" class="text-decoration-none text-muted">Koleksi Museum</a> / 
            <span class="text-dark fw-semibold">{{ $pageTitle }}</span>
        </div>

        <p class="koleksi-desc-text mb-5 text-secondary canva-paragraph-justify" style="line-height: 1.85; max-width: 950px; font-size: 1rem;">
            {{ $descText }}
        </p>

        <!-- 4-Column Grid (Canva Page 4 exact layout - Proportional Square Cards) -->
        <div class="row g-4 mb-5">
            @forelse($collections as $index => $col)
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <a href="{{ route('collections.show', $col->slug) }}" class="koleksi-item-card d-block position-relative overflow-hidden text-decoration-none" title="{{ $col->title }}">
                        <img src="{{ $col->image_url }}" alt="{{ $col->title }}" class="w-100 h-100" style="object-fit: cover;">
                        <div class="koleksi-item-overlay">
                            {{ $col->title }}
                        </div>
                    </a>
                </div>
            @empty
                <div class="col-12 text-center py-5">
                    <div class="card-canva p-4 mx-auto" style="max-width: 480px; background-color: #F8FAFC;">
                        <i class="fa-solid fa-box-open fs-2 text-secondary mb-3"></i>
                        <p class="text-muted mb-3">Tidak ada koleksi yang ditemukan pada kategori ini.</p>
                        <a href="{{ route('collections.index') }}" class="btn-canva-outline btn-sm">Lihat 6 Kategori Utama</a>
                    </div>
                </div>
            @endforelse
        </div>

        <!-- Pagination -->
        @if($collections->hasPages())
            <div class="mb-5">
                {{ $collections->links('pagination::bootstrap-5') }}
            </div>
        @endif
    </div>

@elseif(request()->filled('search'))
    <!-- ==================== SEARCH RESULTS ==================== -->
    <div class="container py-4" style="max-width: 1100px;">
        <nav aria-label="breadcrumb" class="mb-3">
            <ol class="breadcrumb mb-2 small text-muted">
                <li class="breadcrumb-item"><a href="{{ route('home') }}" class="text-decoration-none text-muted">Beranda</a></li>
                <li class="breadcrumb-item"><a href="{{ route('collections.index') }}" class="text-decoration-none text-muted">Koleksi Museum</a></li>
                <li class="breadcrumb-item active text-dark" aria-current="page">Pencarian</li>
            </ol>
        </nav>

        <div class="d-flex justify-content-between align-items-center mb-4 p-3 bg-light border" style="border-color: #E2E8F0 !important;">
            <div class="text-dark small">
                Hasil pencarian untuk: <strong class="text-dark">"{{ request('search') }}"</strong> ({{ $collections->total() }} koleksi)
            </div>
            <a href="{{ route('collections.index') }}" class="text-primary small fw-bold text-decoration-none">
                &larr; Kembali ke 6 Kategori Utama
            </a>
        </div>

        <div class="row g-4 mb-5">
            @forelse($collections as $col)
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <a href="{{ route('collections.show', $col->slug) }}" class="koleksi-item-card d-block position-relative overflow-hidden text-decoration-none" title="{{ $col->title }}">
                        <img src="{{ $col->image_url }}" alt="{{ $col->title }}" class="w-100 h-100" style="object-fit: cover;">
                        <div class="koleksi-item-overlay">
                            {{ $col->title }}
                        </div>
                    </a>
                </div>
            @empty
                <div class="col-12 text-center py-5">
                    <div class="card-canva p-4 mx-auto" style="max-width: 480px; background-color: #F8FAFC;">
                        <i class="fa-solid fa-magnifying-glass fs-2 text-secondary mb-3"></i>
                        <p class="text-muted mb-3">Tidak ada koleksi yang sesuai dengan pencarian Anda.</p>
                        <a href="{{ route('collections.index') }}" class="btn-canva-outline btn-sm">Lihat 6 Kategori Utama</a>
                    </div>
                </div>
            @endforelse
        </div>

        @if($collections->hasPages())
            <div class="mb-5">
                {{ $collections->links('pagination::bootstrap-5') }}
            </div>
        @endif
    </div>

@else
    <!-- ==================== CANVA PAGE 3: KOLEKSI MUSEUM (6 CATEGORIES) ==================== -->
    <!-- Top Banner: Si Unyil Diorama (Canva Page 3 - Characters prominently visible) -->
    <div class="w-100 overflow-hidden" style="height: 435px; background-color: #3b82f6;">
        <img src="{{ asset('images/WebMuspenBaruImages/KoleksiBannerUnyil_canva.png') }}" alt="Koleksi Museum Penerangan - Si Unyil" class="w-100 h-100" style="object-fit: cover; object-position: center center;">
    </div>

    <div class="container py-5" style="max-width: 1100px;">
        <!-- Centered Blue Title (Canva Page 3) -->
        <div class="text-center mb-4">
            <h2 class="title-blue mb-3">Koleksi Museum</h2>

            <!-- Search Bar: "Cari koleksi..." (Canva Page 3) -->
            <form method="GET" action="{{ route('collections.index') }}" class="mx-auto" style="max-width: 480px;">
                <div class="input-group" style="box-shadow: none;">
                    <input type="text" name="search" value="{{ request('search') }}" class="form-control" placeholder="Cari koleksi..." style="border-color: #cbd5e1; font-size: 0.95rem;">
                    <button type="submit" class="btn btn-primary px-4 fw-bold" style="background-color: var(--canva-accent-blue); border-color: var(--canva-accent-blue);">
                        <i class="fa-solid fa-magnifying-glass"></i>
                    </button>
                </div>
            </form>
        </div>

        <!-- 6 Main Categories Grid (Canva Page 3 exact layout: 2 rows of 3 columns, Proportional Height) -->
        <div class="row g-4 mb-5">
            <!-- 1. Deppen & Komunikasi Tradisional -->
            <div class="col-md-4 col-sm-6">
                <a href="{{ route('collections.index', ['category' => 'sejarah-departemen-penerangan-dan-komunikasi-tradisional']) }}" class="koleksi-category-card">
                    <img src="{{ asset('images/WebMuspenBaruImages/Departemen Penerangan dan Komunikasi Tradisional.png') }}" alt="Departemen Penerangan dan Komunikasi Tradisional">
                    <div class="koleksi-category-overlay">
                        <span class="koleksi-category-title">Departemen Penerangan dan<br>Komunikasi Tradisional</span>
                    </div>
                </a>
            </div>

            <!-- 2. Radio -->
            <div class="col-md-4 col-sm-6">
                <a href="{{ route('collections.index', ['category' => 'sejarah-radio']) }}" class="koleksi-category-card">
                    <img src="{{ asset('images/WebMuspenBaruImages/Radio.png') }}" alt="Radio">
                    <div class="koleksi-category-overlay">
                        <span class="koleksi-category-title">Radio</span>
                    </div>
                </a>
            </div>

            <!-- 3. Televisi -->
            <div class="col-md-4 col-sm-6">
                <a href="{{ route('collections.index', ['category' => 'sejarah-televisi']) }}" class="koleksi-category-card">
                    <img src="{{ asset('images/WebMuspenBaruImages/Televisi.png') }}" alt="Televisi">
                    <div class="koleksi-category-overlay">
                        <span class="koleksi-category-title">Televisi</span>
                    </div>
                </a>
            </div>

            <!-- 4. Fotojurnalisme dan Jurnalisme -->
            <div class="col-md-4 col-sm-6">
                <a href="{{ route('collections.index', ['category' => 'sejarah-fotojurnalisme-dan-jurnalisme']) }}" class="koleksi-category-card">
                    <img src="{{ asset('images/WebMuspenBaruImages/Fotojurnalisme dan Jurnalisme.png') }}" alt="Fotojurnalisme dan Jurnalisme">
                    <div class="koleksi-category-overlay">
                        <span class="koleksi-category-title">Fotojurnalisme dan Jurnalisme</span>
                    </div>
                </a>
            </div>

            <!-- 5. Perfilman -->
            <div class="col-md-4 col-sm-6">
                <a href="{{ route('collections.index', ['category' => 'sejarah-perfilman']) }}" class="koleksi-category-card">
                    <img src="{{ asset('images/WebMuspenBaruImages/Perfilman.png') }}" alt="Perfilman">
                    <div class="koleksi-category-overlay">
                        <span class="koleksi-category-title">Perfilman</span>
                    </div>
                </a>
            </div>

            <!-- 6. Percetakan -->
            <div class="col-md-4 col-sm-6">
                <a href="{{ route('collections.index', ['category' => 'sejarah-percetakan']) }}" class="koleksi-category-card">
                    <img src="{{ asset('images/WebMuspenBaruImages/Percetakan.png') }}" alt="Percetakan">
                    <div class="koleksi-category-overlay">
                        <span class="koleksi-category-title">Percetakan</span>
                    </div>
                </a>
            </div>
        </div>
    </div>
@endif

@endsection
