@extends('layouts.canva')

@section('title', 'Tim Pengelola - Museum Penerangan')

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
                <li class="current">Tim Pengelola</li>
            </ol>
        </nav>

        <span class="badge-canva mb-2 text-uppercase fw-bold" style="background-color: rgba(255,255,255,0.12); color: #FFFFFF; border-color: rgba(255,255,255,0.25);">
            <i class="fa-solid fa-users me-1"></i> Profil Insan Muspen
        </span>
        <h1 class="display-5 fw-bold text-white mb-2">Tim & Pengelola Museum</h1>
        <p class="page-lead">
            Mengenal dedikasi para kurator, pemandu, edukator, dan pengelola di balik pelestarian sejarah Museum Penerangan.
        </p>
    </div>
</section>

<section class="section-py bg-light">
    <div class="container">
        <div class="row g-4 justify-content-center">
            @forelse($teams as $t)
                <div class="col-md-6 col-lg-3">
                    <div class="card-canva text-center p-4 h-100 shadow-sm d-flex flex-column align-items-center" style="background-color: #FFFFFF;">
                        <div class="mb-3 position-relative d-inline-block">
                            <img src="{{ $t->photo_url }}" alt="{{ $t->name }}" class="shadow-sm border object-fit-cover" style="width: 120px; height: 120px; border-color: #E2E8F0 !important;">
                        </div>
                        <h5 class="fw-bold mb-1 text-dark">{{ $t->name }}</h5>
                        <div class="fw-semibold small text-primary mb-3">{{ $t->title }}</div>
                        <span class="badge-canva mt-auto" style="font-size: 0.72rem;">
                            {{ $t->category ?: 'Staf Pengelola' }}
                        </span>
                    </div>
                </div>
            @empty
                <div class="col-12 text-center py-5">
                    <div class="empty-state-canva card-canva shadow-sm">
                        <i class="fa-solid fa-users text-muted"></i>
                        <h3>Profil Tim Sedang Dimutakhirkan</h3>
                        <p>Daftar tim pengelola dan kuratorial Museum Penerangan sedang dalam proses pemutakhiran data.</p>
                        <a href="{{ route('home') }}" class="btn-canva-outline btn-sm">Kembali ke Beranda</a>
                    </div>
                </div>
            @endforelse
        </div>
    </div>
</section>
@endsection
