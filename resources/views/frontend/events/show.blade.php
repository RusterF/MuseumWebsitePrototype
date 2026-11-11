@extends('layouts.canva')

@section('title', $event->name . ' - Agenda Event')

@section('content')
<!-- Breadcrumbs -->
<div class="py-3" style="background-color: #0A192F; border-bottom: 1px solid var(--muspen-border);">
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0 small">
                <li class="breadcrumb-item"><a href="{{ route('home') }}" class="text-decoration-none text-white opacity-75">Beranda</a></li>
                <li class="breadcrumb-item"><a href="{{ route('events.index') }}" class="text-decoration-none text-white opacity-75">Agenda Event</a></li>
                <li class="breadcrumb-item active text-white fw-bold" aria-current="page">{{ Str::limit($event->name, 40) }}</li>
            </ol>
        </nav>
    </div>
</div>

<section class="py-5" style="background-color: var(--muspen-bg-base);">
    <div class="container py-3">
        <div class="row g-5">
            <div class="col-lg-7">
                <div class="section-badge mb-2"><i class="fa-solid fa-tag"></i> {{ $event->type ?: 'KEGIATAN' }}</div>
                <h1 class="display-6 fw-bold text-white mb-4" style="font-family: 'Playfair Display', Georgia, serif;">{{ $event->name }}</h1>

                <div class="ratio ratio-16x9 rounded-1 overflow-hidden shadow border border-white border-opacity-10 mb-4" style="background-color: #06111E;">
                    <img src="{{ $event->image_url }}" alt="{{ $event->name }}" class="img-fluid object-fit-cover">
                </div>

                <div class="event-body mb-5" style="line-height: 1.8; color: #CBD5E1;">
                    {!! nl2br(e($event->description)) !!}
                </div>
            </div>

            <div class="col-lg-5">
                <div class="position-sticky" style="top: 100px;">
                    <div class="muspen-card p-4 p-md-5 border shadow mb-4">
                        <h5 class="fw-bold mb-4 border-bottom border-white border-opacity-10 pb-2 text-white" style="font-family: 'Playfair Display', Georgia, serif;">Informasi & Pendaftaran</h5>

                        <div class="mb-3">
                            <small class="d-block" style="color: #94A3B8;">Waktu Mulai:</small>
                            <div class="fw-bold text-white">
                                <i class="fa-regular fa-calendar text-white me-1"></i>
                                {{ $event->date ? $event->date->format('d F Y, H:i') : 'Menyusul' }} WIB
                            </div>
                        </div>

                        @if($event->end_date)
                            <div class="mb-3">
                                <small class="d-block" style="color: #94A3B8;">Waktu Selesai:</small>
                                <div class="fw-bold text-white">
                                    <i class="fa-regular fa-clock text-white me-1"></i>
                                    {{ $event->end_date->format('d F Y, H:i') }} WIB
                                </div>
                            </div>
                        @endif

                        <div class="mb-4">
                            <small class="d-block" style="color: #94A3B8;">Kapasitas & Kuota:</small>
                            <div class="d-flex align-items-center gap-2 mt-1">
                                <span class="badge border border-white text-white fs-6" style="background: rgba(255,255,255,0.12);">{{ $event->remaining_quota }} Slot Tersedia</span>
                                <span class="small" style="color: #94A3B8;">dari total {{ $event->capacity }}</span>
                            </div>
                        </div>

                        <div class="d-grid">
                            <a href="{{ route('booking.create', ['event_id' => $event->id]) }}" class="btn btn-primary btn-lg py-3">
                                <i class="fa-solid fa-ticket me-2"></i> Daftar Mengikuti Acara
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
