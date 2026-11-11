@extends('layouts.canva')

@section('title', $article->title . ' - Publikasi')

@section('content')
<div class="container py-4">
    <!-- Breadcrumbs (Canva Page 7) -->
    <nav aria-label="breadcrumb" class="mb-2">
        <ol class="breadcrumb mb-2 small text-muted">
            <li class="breadcrumb-item"><a href="{{ route('forum.index') }}" class="text-decoration-none text-muted">Publikasi</a></li>
            <li class="breadcrumb-item"><a href="{{ route('forum.index', ['category' => strtolower($article->category ? $article->category->slug : 'artikel')]) }}" class="text-decoration-none text-muted">{{ $article->category ? $article->category->name : 'Artikel' }}</a></li>
            <li class="breadcrumb-item active text-dark" aria-current="page">{{ $article->title }}</li>
        </ol>
    </nav>

    <!-- Blue Title (Canva Page 7) -->
    <h2 class="title-blue mb-1" style="font-size: 2.1rem; line-height: 1.3;">{{ $article->title }}</h2>
    <div class="text-muted small mb-4" style="font-size: 0.88rem;">{{ $article->date ? \Illuminate\Support\Carbon::parse($article->date)->locale('id')->isoFormat('D MMMM Y') : '14 Agustus 2026' }}</div>

    <!-- Featured Banner Photo (Canva Page 7) -->
    <div class="mb-4 overflow-hidden" style="border-radius: 0 !important;">
        <img src="{{ $article->image_url }}" alt="{{ $article->title }}" class="w-100" style="max-height: 480px; object-fit: cover; border-radius: 0 !important; border: 1px solid #e2e8f0;">
    </div>

    <!-- Article Content (Canva Page 7) -->
    <div class="article-content text-dark mb-5" style="line-height: 1.85; font-size: 1rem; color: #1E293B; text-align: justify; text-justify: inter-word;">
        {!! $article->content !!}
    </div>

    <!-- Penulis & Kategori (Canva Page 7) -->
    <div class="mb-4" style="font-size: 0.95rem;">
        <div class="d-flex gap-2 mb-1">
            <span class="text-dark" style="width: 80px;">Penulis</span>
            <span class="text-dark">:</span>
            <span class="text-dark">{{ $article->slug === 'dari-ruang-pamer-ke-layar-ponsel-begini-cara-museum-bercerita-di-era-digital' ? 'Faisal Fadli' : ($article->user ? $article->user->name : 'Redaksi Museum Penerangan') }}</span>
        </div>
        <div class="d-flex gap-2">
            <span class="text-dark" style="width: 80px;">Kategori</span>
            <span class="text-dark">:</span>
            <span class="text-dark">{{ $article->slug === 'dari-ruang-pamer-ke-layar-ponsel-begini-cara-museum-bercerita-di-era-digital' ? 'Edukasi' : ($article->category ? $article->category->name : 'Artikel') }}</span>
        </div>
    </div>

    <!-- Bagikan Icons (Canva Page 7) -->
    <div class="d-flex align-items-center gap-3 py-3 mb-5 border-top border-bottom border-light-subtle">
        <span class="fw-bold text-dark small">Bagikan :</span>
        <a href="javascript:void(0)" onclick="navigator.clipboard.writeText(window.location.href); alert('Tautan berhasil disalin!');" class="text-secondary fs-6" title="Salin Tautan">
            <i class="fa-solid fa-link"></i>
        </a>
        <a href="https://api.whatsapp.com/send?text={{ urlencode(url()->current()) }}" target="_blank" class="text-secondary fs-6" title="WhatsApp">
            <i class="fa-brands fa-whatsapp"></i>
        </a>
    </div>

    <!-- Publikasi Lainnya (Canva Page 7: 3 cards matching row 2 of Page 6) -->
    <div class="mb-5">
        <h5 class="fw-bold text-dark mb-4" style="font-size: 1.25rem;">Publikasi Lainnya</h5>
        <div class="row g-4">
            @forelse($relatedArticles as $rel)
                <div class="col-md-4">
                    <div class="card border-0 bg-transparent h-100 d-flex flex-column" style="border-radius: 0 !important;">
                        <!-- Thumbnail -->
                        <div class="publikasi-card-thumb mb-2">
                            <a href="{{ route('forum.show', $rel->slug) }}">
                                <img src="{{ $rel->image_url }}" alt="{{ $rel->title }}">
                            </a>
                        </div>

                        <!-- Meta -->
                        <div class="d-flex align-items-center gap-3 text-muted small mb-2" style="font-size: 0.85rem;">
                            <span>{{ $rel->category ? $rel->category->name : 'Artikel' }}</span>
                            <span>{{ $rel->date ? \Illuminate\Support\Carbon::parse($rel->date)->locale('id')->isoFormat('D MMMM Y') : '1 Januari 2026' }}</span>
                        </div>

                        <!-- Title -->
                        <h6 class="fw-bold text-dark mb-2" style="line-height: 1.4; font-size: 0.98rem;">
                            <a href="{{ route('forum.show', $rel->slug) }}" class="text-decoration-none text-dark">
                                {{ $rel->title }}
                            </a>
                        </h6>

                        <!-- Link -->
                        <div class="mt-auto pt-1">
                            <a href="{{ route('forum.show', $rel->slug) }}" class="text-primary fw-semibold small text-decoration-none">
                                Baca selengkapnya....
                            </a>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12 text-muted small">Tidak ada publikasi lainnya.</div>
            @endforelse
        </div>
    </div>
</div>
@endsection
