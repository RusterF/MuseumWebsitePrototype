@extends('layouts.canva')

@section('title', $article->title . ' - Publikasi')

@section('content')
<div class="container py-4" style="max-width: 1050px;">
    <!-- Breadcrumbs (Canva Page 7) -->
    <nav aria-label="breadcrumb" class="mb-3">
        <ol class="breadcrumb mb-0 small text-muted">
            <li class="breadcrumb-item"><a href="{{ route('home') }}" class="text-decoration-none text-muted">Beranda</a></li>
            <li class="breadcrumb-item"><a href="{{ route('publikasi.index') }}" class="text-decoration-none text-muted">Publikasi</a></li>
            <li class="breadcrumb-item"><a href="{{ route('publikasi.index', ['category' => strtolower($article->category ? $article->category->slug : 'artikel')]) }}" class="text-decoration-none text-muted">{{ $article->category ? $article->category->name : 'Artikel' }}</a></li>
            <li class="breadcrumb-item active text-dark" aria-current="page">{{ Str::limit($article->title, 40) }}</li>
        </ol>
    </nav>

    <!-- Blue Title (Canva Page 7) -->
    <h1 class="title-blue mb-2" style="font-size: 2.2rem; line-height: 1.3;">{{ $article->title }}</h1>
    <div class="text-muted small mb-4" style="font-size: 0.9rem;">
        <i class="fa-regular fa-calendar me-1"></i> {{ $article->date ? \Illuminate\Support\Carbon::parse($article->date)->locale('id')->isoFormat('dddd, D MMMM Y') : '14 Agustus 2026' }}
    </div>

    <!-- Featured Banner Photo (Canva Page 7) -->
    <div class="mb-4 overflow-hidden border shadow-sm" style="border-color: #E2E8F0 !important;">
        <img src="{{ $article->image_url }}" alt="{{ $article->title }}" class="w-100" style="max-height: 480px; object-fit: cover;">
    </div>

    <!-- Article Content (Canva Page 7) -->
    <div class="article-content text-dark mb-5 canva-paragraph-justify" style="line-height: 1.85; font-size: 1.05rem;">
        {!! $article->content !!}
    </div>

    <!-- Penulis & Kategori (Canva Page 7) -->
    <div class="card-canva p-4 mb-4 shadow-sm" style="background-color: #F8FAFC;">
        <div class="row g-2" style="font-size: 0.95rem;">
            <div class="col-sm-6">
                <div class="d-flex gap-2">
                    <span class="text-muted fw-semibold" style="width: 80px;">Penulis</span>
                    <span class="text-muted">:</span>
                    <strong class="text-dark">{{ $article->user ? $article->user->name : 'Redaksi Museum Penerangan' }}</strong>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="d-flex gap-2">
                    <span class="text-muted fw-semibold" style="width: 80px;">Kategori</span>
                    <span class="text-muted">:</span>
                    <span class="badge-canva">{{ $article->category ? $article->category->name : 'Artikel' }}</span>
                </div>
            </div>
        </div>
    </div>

    <!-- Bagikan Icons (Canva Page 7) -->
    <div class="d-flex align-items-center gap-3 py-3 mb-5 border-top border-bottom" style="border-color: #E2E8F0 !important;">
        <span class="fw-bold text-dark small">Bagikan Artikel:</span>
        <button type="button" class="btn btn-sm btn-outline-secondary d-inline-flex align-items-center gap-1" onclick="copyArticleUrl(this)" title="Salin Tautan">
            <i class="fa-solid fa-link"></i> <span class="small">Salin Tautan</span>
        </button>
        <a href="https://api.whatsapp.com/send?text={{ urlencode($article->title . ' - ' . url()->current()) }}" target="_blank" rel="noopener noreferrer" class="btn btn-sm btn-outline-success d-inline-flex align-items-center gap-1" title="Bagikan ke WhatsApp">
            <i class="fa-brands fa-whatsapp"></i> <span class="small">WhatsApp</span>
        </a>
    </div>

    <!-- Publikasi Lainnya (Canva Page 7: 3 cards matching row 2 of Page 6) -->
    <div class="mb-5">
        <h5 class="fw-bold text-dark mb-4" style="font-size: 1.3rem;">Publikasi Terkait Lainnya</h5>
        <div class="row g-4">
            @forelse($relatedArticles as $rel)
                <div class="col-md-4">
                    <div class="card border-0 bg-transparent h-100 d-flex flex-column">
                        <!-- Thumbnail -->
                        <div class="publikasi-card-thumb mb-2">
                            <a href="{{ route('forum.show', $rel->slug) }}">
                                <img src="{{ $rel->image_url }}" alt="{{ $rel->title }}">
                            </a>
                        </div>

                        <!-- Meta -->
                        <div class="d-flex align-items-center gap-3 text-muted small mb-2" style="font-size: 0.85rem;">
                            <span class="badge-canva py-0 px-2" style="font-size: 0.72rem;">{{ $rel->category ? $rel->category->name : 'Artikel' }}</span>
                            <span>{{ $rel->date ? \Illuminate\Support\Carbon::parse($rel->date)->locale('id')->isoFormat('D MMMM Y') : '1 Januari 2026' }}</span>
                        </div>

                        <!-- Title -->
                        <h6 class="fw-bold text-dark mb-2" style="line-height: 1.45; font-size: 0.98rem;">
                            <a href="{{ route('forum.show', $rel->slug) }}" class="text-decoration-none text-dark">
                                {{ $rel->title }}
                            </a>
                        </h6>

                        <!-- Link -->
                        <div class="mt-auto pt-1">
                            <a href="{{ route('forum.show', $rel->slug) }}" class="link-cta-canva small fw-semibold" style="margin-top: 0;">
                                Baca selengkapnya <i class="fa-solid fa-arrow-right-long ms-1"></i>
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

@push('scripts')
<script>
    function copyArticleUrl(btn) {
        if (navigator.clipboard) {
            navigator.clipboard.writeText(window.location.href).then(function() {
                const orig = btn.innerHTML;
                btn.innerHTML = '<i class="fa-solid fa-check text-success"></i> Disalin!';
                setTimeout(() => { btn.innerHTML = orig; }, 2500);
            });
        } else {
            prompt('Salin tautan berikut:', window.location.href);
        }
    }
</script>
@endpush
