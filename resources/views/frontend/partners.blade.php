@extends('layouts.canva')

@section('title', 'Mitra & Kolaborasi - Museum Penerangan')

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
                <li class="current">Mitra & Kolaborasi</li>
            </ol>
        </nav>

        <span class="badge-canva mb-2 text-uppercase fw-bold" style="background-color: rgba(255,255,255,0.12); color: #FFFFFF; border-color: rgba(255,255,255,0.25);">
            <i class="fa-solid fa-handshake me-1"></i> Jaringan Kolaborasi
        </span>
        <h1 class="display-5 fw-bold text-white mb-2">Mitra & Kolaborasi Strategis</h1>
        <p class="page-lead">
            Sinergi berkelanjutan Museum Penerangan bersama lembaga penyiaran publik, dewan pers, kementerian, akademisi, dan komunitas kebudayaan di Indonesia.
        </p>
    </div>
</section>

<section class="section-py bg-light">
    <div class="container">
        <div class="row g-4 justify-content-center">
            @forelse($partners as $p)
                <div class="col-md-6 col-lg-4">
                    <div class="card-canva p-4 text-center h-100 d-flex flex-column align-items-center justify-content-between shadow-sm" style="background-color: #FFFFFF;">
                        <div class="p-3 w-100 d-flex align-items-center justify-content-center mb-3 border" style="height: 120px; background-color: #F8FAFC; border-color: #E2E8F0 !important;">
                            <img src="{{ $p->logo_url }}" alt="{{ $p->name }}" style="max-height: 70px; max-width: 85%; object-fit: contain;">
                        </div>
                        <div class="mt-2 w-100">
                            <h5 class="fw-bold mb-2 text-dark">{{ $p->name }}</h5>
                            <span class="badge-canva" style="font-size: 0.75rem; letter-spacing: 0.03em; text-transform: uppercase;">
                                {{ $p->category ?: 'Mitra Strategis' }}
                            </span>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12 text-center py-5">
                    <div class="empty-state-canva card-canva shadow-sm">
                        <i class="fa-solid fa-handshake text-muted"></i>
                        <h3>Daftar Mitra Sedang Diperbarui</h3>
                        <p>Daftar mitra dan jejaring kolaborasi Museum Penerangan sedang dalam proses pembaruan informasi resmi.</p>
                        <a href="{{ route('home') }}" class="btn-canva-outline btn-sm">Kembali ke Beranda</a>
                    </div>
                </div>
            @endforelse
        </div>
    </div>
</section>
@endsection
