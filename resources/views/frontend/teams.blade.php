@extends('layouts.canva')

@section('title', 'Tim Pengelola')

@section('content')
<!-- Header Banner (The British Museum Style) -->
<section class="page-header-clean">
    <div class="container">
        <div class="section-badge"><i class="fa-solid fa-users"></i> Profil Insan Muspen</div>
        <h1 class="page-title">Tim & Pengelola Museum</h1>
        <p class="page-lead">
            Mengenal dedikasi para kurator, pemandu, dan pengelola di balik pelestarian sejarah Museum Penerangan.
        </p>
    </div>
</section>

<section class="py-5" style="background-color: var(--muspen-bg-base);">
    <div class="container py-3">
        <div class="row g-4 justify-content-center">
            @forelse($teams as $t)
                <div class="col-md-6 col-lg-3">
                    <div class="muspen-card text-center p-4 h-100 border">
                        <div class="mb-3 position-relative d-inline-block">
                            <img src="{{ $t->photo_url }}" alt="{{ $t->name }}" class="rounded-circle shadow border border-white border-opacity-25 object-fit-cover" style="width: 110px; height: 110px;">
                        </div>
                        <h5 class="fw-bold mb-1 text-white" style="font-family: 'Playfair Display', Georgia, serif;">{{ $t->name }}</h5>
                        <div class="fw-semibold small mb-2" style="color: #CBD5E1;">{{ $t->title }}</div>
                        <span class="badge border border-white text-white px-3 py-1 font-monospace" style="background: rgba(255,255,255,0.08); font-size: 0.72rem;">
                            {{ $t->category ?: 'Staf Pengelola' }}
                        </span>
                    </div>
                </div>
            @empty
                <div class="col-12 text-center py-5 text-white opacity-75">
                    <p>Profil tim pengelola sedang dimutakhirkan.</p>
                </div>
            @endforelse
        </div>
    </div>
</section>
@endsection
