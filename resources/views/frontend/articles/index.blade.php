@extends('layouts.canva')

@section('title', 'Publikasi')

@section('content')
<div class="container py-4" style="max-width: 1100px;">
    <!-- Blue Title (Canva Page 6) -->
    <h2 class="title-blue mb-2" style="font-size: 2.1rem;">Publikasi</h2>

    <!-- Filter Tabs: Semua, Berita, Artikel (Canva Page 6) -->
    <div class="d-flex align-items-center gap-4 mb-4 pb-2" style="font-size: 1rem;">
        <a href="{{ route('forum.index') }}" class="text-decoration-none fw-semibold {{ !request('category') ? 'text-primary' : 'text-dark' }}">
            Semua
        </a>
        <a href="{{ route('forum.index', ['category' => 'berita']) }}" class="text-decoration-none fw-semibold {{ request('category') == 'berita' ? 'text-primary' : 'text-dark' }}">
            Berita
        </a>
        <a href="{{ route('forum.index', ['category' => 'artikel']) }}" class="text-decoration-none fw-semibold {{ request('category') == 'artikel' ? 'text-primary' : 'text-dark' }}">
            Artikel
        </a>
    </div>

    <!-- Articles Grid (3 columns x 3 rows - Canva Page 6 exact layout) -->
    <div class="row g-4 mb-5">
        @forelse($articles as $art)
            @php
                $cardUrl = ($art->slug === 'kompak-pemuda-tak-hanya-dikenal-lewat-buku-sejarah-wayang-kulit-juga-mengangkat-kisahnya')
                    ? route('forum.show', 'dari-ruang-pamer-ke-layar-ponsel-begini-cara-museum-bercerita-di-era-digital')
                    : route('forum.show', $art->slug);
            @endphp
            <div class="col-md-4 col-sm-6">
                <div class="card border-0 bg-transparent h-100 d-flex flex-column" style="border-radius: 0 !important;">
                    <!-- Thumbnail (Canva Page 6 - Proportional height, not gepeng) -->
                    <div class="publikasi-card-thumb mb-2">
                        <a href="{{ $cardUrl }}">
                            <img src="{{ $art->image_url }}" alt="{{ $art->title }}">
                        </a>
                    </div>

                    <!-- Meta: Category & Date (Canva Page 6) -->
                    <div class="d-flex align-items-center gap-3 text-muted small mb-2" style="font-size: 0.85rem;">
                        <span>{{ $art->category ? $art->category->name : 'Artikel' }}</span>
                        <span>{{ $art->date ? \Illuminate\Support\Carbon::parse($art->date)->locale('id')->isoFormat('D MMMM Y') : '1 Januari 2026' }}</span>
                    </div>

                    <!-- Title (Canva Page 6) -->
                    <h6 class="fw-bold text-dark mb-2" style="line-height: 1.4; font-size: 0.98rem;">
                        <a href="{{ $cardUrl }}" class="text-decoration-none text-dark">
                            {{ $art->title }}
                        </a>
                    </h6>

                    <!-- Link (Canva Page 6) -->
                    <div class="mt-auto pt-1">
                        <a href="{{ $cardUrl }}" class="text-primary fw-semibold small text-decoration-none">
                            Baca selengkapnya....
                        </a>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-12 text-center py-5">
                <p class="text-muted">Tidak ada publikasi yang ditemukan.</p>
                <a href="{{ route('forum.index') }}" class="btn btn-outline-dark btn-sm" style="border-radius: 0 !important;">Lihat Semua</a>
            </div>
        @endforelse
    </div>

    <!-- Pagination (only shown if multi-page) -->
    @if($articles->hasPages())
        <div class="d-flex justify-content-center mb-5">
            {{ $articles->links('pagination::bootstrap-5') }}
        </div>
    @endif
</div>
@endsection
