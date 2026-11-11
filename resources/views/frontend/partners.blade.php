@extends('layouts.canva')

@section('title', 'Mitra & Kolaborasi - Museum Penerangan')

@section('content')
<!-- Header Banner (British Museum Institutional Style) -->
<section class="page-header-clean">
    <div class="container">
        <div class="section-badge"><i class="fa-solid fa-handshake me-2"></i> Jaringan Kolaborasi</div>
        <h1 class="page-title">Mitra & Kolaborasi Strategis</h1>
        <p class="page-lead">
            Sinergi berkelanjutan Museum Penerangan bersama lembaga penyiaran publik, dewan pers, kementerian, akademisi, dan komunitas kebudayaan di Indonesia.
        </p>
    </div>
</section>

<section class="py-5" style="background-color: var(--muspen-bg-base);">
    <div class="container py-3">
        <div class="row g-4 justify-content-center">
            @forelse($partners as $p)
                <div class="col-md-6 col-lg-4">
                    <div class="muspen-card p-4 text-center h-100 d-flex flex-column align-items-center justify-content-between">
                        <div class="p-3 w-100 d-flex align-items-center justify-content-center mb-3" style="height: 120px; background-color: #06111E; border: 1px solid var(--muspen-border); border-radius: 4px;">
                            <img src="{{ $p->logo_url }}" alt="{{ $p->name }}" style="max-height: 70px; max-width: 80%; object-fit: contain; filter: brightness(0.95);">
                        </div>
                        <div>
                            <h5 class="fw-bold mb-2 text-white" style="font-family: var(--muspen-font-serif);">{{ $p->name }}</h5>
                            <span class="badge" style="background: rgba(255,255,255,0.08); color: var(--muspen-white); border: 1px solid var(--muspen-border); font-size: 0.75rem; letter-spacing: 0.05em; text-transform: uppercase;">
                                {{ $p->category ?: 'Mitra Strategis' }}
                            </span>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12 text-center py-5 text-white-50">
                    <i class="fa-solid fa-handshake-angle fa-2x mb-3 opacity-50"></i>
                    <p>Daftar mitra sedang diperbarui.</p>
                </div>
            @endforelse
        </div>
    </div>
</section>
@endsection
