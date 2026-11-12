@extends('layouts.canva')

@section('title', 'Publikasi & Berita')

@section('content')
<div class="container py-4" style="max-width: 1100px;">
    <!-- Blue Title (Canva Page 6) -->
    <h2 class="title-blue mb-3" style="font-size: 2.1rem;">Publikasi</h2>

    <!-- Filter Tabs: Semua, Berita, Artikel, Event (Google Doc Requirement #4) -->
    <div class="d-flex align-items-center gap-4 mb-4 pb-2 border-bottom" style="font-size: 1rem; border-color: #E2E8F0 !important;">
        <a href="{{ route('publikasi.index') }}" class="text-decoration-none pb-2 {{ !request('category') ? 'text-primary fw-bold border-bottom border-2 border-primary' : 'text-secondary fw-semibold' }}">
            Semua
        </a>
        <a href="{{ route('publikasi.index', ['category' => 'berita']) }}" class="text-decoration-none pb-2 {{ request('category') == 'berita' ? 'text-primary fw-bold border-bottom border-2 border-primary' : 'text-secondary fw-semibold' }}">
            Berita
        </a>
        <a href="{{ route('publikasi.index', ['category' => 'artikel']) }}" class="text-decoration-none pb-2 {{ request('category') == 'artikel' ? 'text-primary fw-bold border-bottom border-2 border-primary' : 'text-secondary fw-semibold' }}">
            Artikel
        </a>
        <a href="{{ route('events.index') }}" class="text-decoration-none pb-2 text-secondary fw-semibold">
            Event
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
                <div class="card border-0 bg-transparent h-100 d-flex flex-column">
                    <!-- Thumbnail (Canva Page 6 - Proportional height, not gepeng) -->
                    <div class="publikasi-card-thumb mb-2">
                        <a href="{{ $cardUrl }}">
                            <img src="{{ $art->image_url }}" alt="{{ $art->title }}">
                        </a>
                    </div>

                    <!-- Meta: Category & Date (Canva Page 6) -->
                    <div class="d-flex align-items-center gap-3 text-muted small mb-2" style="font-size: 0.85rem;">
                        <span class="badge-canva py-1 px-2" style="font-size: 0.72rem;">{{ $art->category ? $art->category->name : 'Artikel' }}</span>
                        <span>{{ $art->date ? \Illuminate\Support\Carbon::parse($art->date)->locale('id')->isoFormat('D MMMM Y') : '1 Januari 2026' }}</span>
                    </div>

                    <!-- Title (Canva Page 6) -->
                    <h6 class="fw-bold text-dark mb-2" style="line-height: 1.45; font-size: 0.98rem;">
                        <a href="{{ $cardUrl }}" class="text-decoration-none text-dark">
                            {{ $art->title }}
                        </a>
                    </h6>

                    <!-- Link (Canva Page 6) -->
                    <div class="mt-auto pt-1">
                        <a href="{{ $cardUrl }}" class="link-cta-canva small fw-semibold" style="margin-top: 0;">
                            Baca selengkapnya <i class="fa-solid fa-arrow-right-long ms-1"></i>
                        </a>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-12 text-center py-5">
                <div class="empty-state-canva card-canva shadow-sm">
                    <i class="fa-regular fa-newspaper"></i>
                    <h3>Belum Ada Publikasi</h3>
                    <p>Tidak ada artikel atau berita yang sesuai dengan kategori ini saat ini.</p>
                    <a href="{{ route('publikasi.index') }}" class="btn-canva-outline btn-sm">Lihat Semua Publikasi</a>
                </div>
            </div>
        @endforelse
    </div>

    <!-- Pagination (only shown if multi-page) -->
    @if($articles->hasPages())
        <div class="mb-5">
            {{ $articles->links('pagination::bootstrap-5') }}
        </div>
    @endif
</div>
@endsection
