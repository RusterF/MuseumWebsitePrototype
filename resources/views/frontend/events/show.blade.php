@extends('layouts.canva')

@section('title', $event->name . ' - Agenda Event')

@section('content')
<div class="container py-4" style="max-width: 1050px;">
    <!-- Breadcrumbs (Canva Page 7) -->
    <nav aria-label="breadcrumb" class="mb-3">
        <ol class="breadcrumb mb-0 small text-muted">
            <li class="breadcrumb-item"><a href="{{ route('home') }}" class="text-decoration-none text-muted">Beranda</a></li>
            <li class="breadcrumb-item"><a href="{{ route('publikasi.index') }}" class="text-decoration-none text-muted">Publikasi</a></li>
            <li class="breadcrumb-item"><a href="{{ route('events.index') }}" class="text-decoration-none text-muted">Event</a></li>
            <li class="breadcrumb-item active text-dark" aria-current="page">{{ Str::limit($event->name, 40) }}</li>
        </ol>
    </nav>

    <!-- Blue Title (Canva Page 7) -->
    <h1 class="title-blue mb-2" style="font-size: 2.2rem; line-height: 1.3;">{{ $event->name }}</h1>
    <div class="text-muted small mb-4" style="font-size: 0.9rem;">
        <i class="fa-regular fa-calendar me-1"></i> {{ $event->date ? \Illuminate\Support\Carbon::parse($event->date)->locale('id')->isoFormat('dddd, D MMMM Y, HH:mm') : '' }} WIB
    </div>

    <!-- Featured Banner Photo (Canva Page 7) -->
    <div class="mb-4 overflow-hidden border shadow-sm" style="border-color: #E2E8F0 !important;">
        <img src="{{ $event->image_url }}" alt="{{ $event->name }}" class="w-100" style="max-height: 480px; object-fit: cover;">
    </div>

    <!-- Event Description Content (Canva Page 7) -->
    <div class="article-content text-dark mb-5 canva-paragraph-justify" style="line-height: 1.85; font-size: 1.05rem;">
        {!! nl2br(e($event->description)) !!}
    </div>

    <!-- Info Detail Kegiatan (Canva Page 7 card style) -->
    <div class="card-canva p-4 mb-4 shadow-sm" style="background-color: #F8FAFC;">
        <div class="row g-3" style="font-size: 0.95rem;">
            <div class="col-sm-4">
                <div class="d-flex gap-2">
                    <span class="text-muted fw-semibold" style="width: 85px;">Kategori</span>
                    <span class="text-muted">:</span>
                    <span class="badge-canva">{{ $event->type ?: 'Event' }}</span>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="d-flex gap-2">
                    <span class="text-muted fw-semibold" style="width: 85px;">Jadwal</span>
                    <span class="text-muted">:</span>
                    <strong class="text-dark">{{ $event->date ? $event->date->format('d M Y, H:i') : '-' }} WIB</strong>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="d-flex gap-2">
                    <span class="text-muted fw-semibold" style="width: 85px;">Kuota</span>
                    <span class="text-muted">:</span>
                    <span class="badge-canva-success fs-6 py-0 px-2">{{ $event->remaining_quota }} Slot Tersedia</span>
                </div>
            </div>
        </div>
    </div>

    <!-- Pendaftaran & Partisipasi Event via WhatsApp -->
    <div class="d-flex flex-wrap align-items-center justify-content-between gap-3 p-4 mb-4 border" style="background-color: #FFFFFF; border-color: #E2E8F0 !important;">
        <div>
            <h6 class="fw-bold text-dark mb-1">Pendaftaran & Partisipasi Kegiatan</h6>
            <p class="text-muted small mb-0">Untuk pendaftaran peserta rombongan atau perseorangan, silakan konfirmasi melalui Call Center resmi Museum Penerangan.</p>
        </div>
        <a href="https://wa.me/628118132121?text=Halo%20Admin%20Museum%20Penerangan,%20saya%20ingin%20mendaftar%20event%20{{ urlencode($event->name) }}" target="_blank" rel="noopener noreferrer" class="btn-canva-primary px-4 py-2">
            <i class="fa-brands fa-whatsapp me-2"></i> Daftar via WhatsApp
        </a>
    </div>

    <!-- Bagikan Icons (Canva Page 7) -->
    <div class="d-flex align-items-center gap-3 py-3 mb-5 border-top border-bottom" style="border-color: #E2E8F0 !important;">
        <span class="fw-bold text-dark small">Bagikan Event:</span>
        <button type="button" class="btn btn-sm btn-outline-secondary d-inline-flex align-items-center gap-1" onclick="copyEventUrl(this)" title="Salin Tautan">
            <i class="fa-solid fa-link"></i> <span class="small">Salin Tautan</span>
        </button>
        <a href="https://api.whatsapp.com/send?text={{ urlencode($event->name . ' - ' . url()->current()) }}" target="_blank" rel="noopener noreferrer" class="btn btn-sm btn-outline-success d-inline-flex align-items-center gap-1" title="Bagikan ke WhatsApp">
            <i class="fa-brands fa-whatsapp"></i> <span class="small">WhatsApp</span>
        </a>
    </div>

    <!-- Agenda Event Terkait Lainnya (Canva Page 7: 3 cards matching row 2 of Page 6) -->
    <div class="mb-5">
        <h5 class="fw-bold text-dark mb-4" style="font-size: 1.3rem;">Agenda Event Lainnya</h5>
        <div class="row g-4">
            @forelse($relatedEvents as $rel)
                <div class="col-md-4">
                    <div class="card border-0 bg-transparent h-100 d-flex flex-column">
                        <!-- Thumbnail -->
                        <div class="publikasi-card-thumb mb-2">
                            <a href="{{ route('events.show', $rel->slug) }}">
                                <img src="{{ $rel->image_url }}" alt="{{ $rel->name }}">
                            </a>
                        </div>

                        <!-- Meta -->
                        <div class="d-flex align-items-center gap-3 text-muted small mb-2" style="font-size: 0.85rem;">
                            <span class="badge-canva py-0 px-2" style="font-size: 0.72rem;">{{ $rel->type ?: 'Event' }}</span>
                            <span>{{ $rel->date ? \Illuminate\Support\Carbon::parse($rel->date)->locale('id')->isoFormat('D MMMM Y') : '1 Januari 2026' }}</span>
                        </div>

                        <!-- Title -->
                        <h6 class="fw-bold text-dark mb-2" style="line-height: 1.45; font-size: 0.98rem;">
                            <a href="{{ route('events.show', $rel->slug) }}" class="text-decoration-none text-dark">
                                {{ $rel->name }}
                            </a>
                        </h6>

                        <!-- Link -->
                        <div class="mt-auto pt-1">
                            <a href="{{ route('events.show', $rel->slug) }}" class="link-cta-canva small fw-semibold" style="margin-top: 0;">
                                Baca selengkapnya <i class="fa-solid fa-arrow-right-long ms-1"></i>
                            </a>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12 text-muted small">Tidak ada agenda event lainnya saat ini.</div>
            @endforelse
        </div>
    </div>
</div>

<script>
function copyEventUrl(btn) {
    if (navigator.clipboard) {
        navigator.clipboard.writeText(window.location.href).then(() => {
            const original = btn.innerHTML;
            btn.innerHTML = '<i class="fa-solid fa-check text-success"></i> <span class="small">Tersalin!</span>';
            setTimeout(() => { btn.innerHTML = original; }, 2000);
        });
    }
}
</script>
@endsection
