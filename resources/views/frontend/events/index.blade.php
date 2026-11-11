@extends('layouts.canva')

@section('title', 'Agenda Event & Pameran')

@section('content')
<!-- Header Banner (The British Museum Style) -->
<section class="page-header-clean">
    <div class="container">
        <div class="section-badge"><i class="fa-regular fa-calendar-days"></i> Kalender Kegiatan</div>
        <h1 class="page-title">Agenda Event & Pameran</h1>
        <p class="page-lead">
            Jadwal pameran tematik, seminar komunikasi, lokakarya edukasi, dan festival budaya di Museum Penerangan.
        </p>
    </div>
</section>

<!-- Event Grid -->
<section class="py-5" style="background-color: var(--muspen-bg-base);">
    <div class="container py-3">
        <div class="row g-4">
            @forelse($events as $event)
                <div class="col-md-6 col-lg-4">
                    <div class="muspen-card h-100 d-flex flex-column border">
                        <div class="ratio ratio-16x9 position-relative overflow-hidden" style="background-color: #06111E;">
                            <img src="{{ $event->image_url }}" alt="{{ $event->name }}" class="img-fluid object-fit-cover">
                            <div class="position-absolute top-0 start-0 m-3">
                                <span class="badge border border-white text-white px-3 py-1 font-monospace" style="background: rgba(6, 17, 30, 0.85); font-size: 0.72rem;">
                                    {{ $event->type ?: 'AGENDA' }}
                                </span>
                            </div>
                        </div>
                        <div class="p-4 d-flex flex-column flex-grow-1">
                            <div class="small fw-bold mb-2 text-white">
                                <i class="fa-regular fa-clock text-white me-1"></i> {{ $event->date ? $event->date->format('d M Y, H:i') : '' }} WIB
                            </div>

                            <h5 class="fw-bold mb-2" style="font-family: 'Playfair Display', Georgia, serif;">
                                <a href="{{ route('events.show', $event->slug) }}" class="text-decoration-none text-white">
                                    {{ $event->name }}
                                </a>
                            </h5>

                            <p class="small mb-4 flex-grow-1" style="color: #94A3B8; line-height: 1.6;">
                                {{ Str::limit(strip_tags($event->description), 110) }}
                            </p>

                            <div class="border-top border-white border-opacity-10 pt-3 d-flex justify-content-between align-items-center">
                                <span class="small" style="color: #CBD5E1;">
                                    Sisa: <strong class="text-white">{{ $event->remaining_quota }} Kuota</strong>
                                </span>
                                <a href="{{ route('events.show', $event->slug) }}" class="btn btn-sm btn-outline-white">
                                    Lihat Detail &rarr;
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12 text-center py-5">
                    <p class="text-white opacity-75">Belum ada agenda event yang dijadwalkan.</p>
                </div>
            @endforelse
        </div>

        <div class="d-flex justify-content-center mt-5">
            {{ $events->links('pagination::bootstrap-5') }}
        </div>
    </div>
</section>
@endsection
