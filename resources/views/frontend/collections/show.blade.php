@extends('layouts.canva')

@section('title', $collection->title . ' - Koleksi Museum')

@section('content')
<div class="container py-4">
    <!-- Blue Title (Canva Page 5) -->
    <h2 class="title-blue mb-1" style="font-size: 2.1rem;">{{ $collection->title }}</h2>

    <!-- Breadcrumb below Title (Canva Page 5) -->
    <div class="small text-muted mb-4 pb-2">
        <a href="{{ route('home') }}" class="text-decoration-none text-muted">Koleksi</a> / 
        <a href="{{ route('collections.index') }}" class="text-decoration-none text-muted">Kategori Koleksi</a> / 
        @if($collection->category)
            <a href="{{ route('collections.index', ['category' => $collection->category->slug]) }}" class="text-decoration-none text-muted">
                {{ str_replace('Sejarah ', '', $collection->category->name) }}
            </a> / 
        @else
            <span>Fotojurnalisme dan Jurnalisme</span> / 
        @endif
        <span class="text-secondary">{{ $collection->title }}</span>
    </div>

    <!-- Main Content: Left (Photo + Metadata), Right (Description) - Canva Page 5 exact match -->
    <div class="row align-items-start g-5 mb-5">
        <!-- Left Column: Image & Metadata -->
        <div class="col-lg-5">
            <div class="text-center mb-4">
                <img src="{{ $collection->image_url }}" alt="{{ $collection->title }}" class="img-fluid" style="max-height: 380px; object-fit: contain;">
            </div>

            <!-- Metadata Table (Canva Page 5 exact 2-column clean layout) -->
            <div class="row g-3 pt-3">
                <!-- Left Sub-column -->
                <div class="col-6">
                    <div class="mb-4">
                        <div class="text-muted small">Nomor Registrasi</div>
                        <div class="fw-bold text-dark fs-6">{{ $collection->registration_number ?: '1.135' }}</div>
                    </div>
                    <div class="mb-4">
                        <div class="text-muted small">Tahun Registrasi</div>
                        <div class="fw-bold text-dark fs-6">{{ $collection->registration_year ?: '1993' }}</div>
                    </div>
                    <div class="mb-0">
                        <div class="text-muted small">Nomor Inventaris</div>
                        <div class="fw-bold text-dark fs-6">{{ $collection->inventory_number ?: '03/FP/LPR.01/01/CJ' }}</div>
                    </div>
                </div>

                <!-- Right Sub-column -->
                <div class="col-6">
                    <div class="mb-4">
                        <div class="text-muted small">Asal Akuisisi</div>
                        <div class="fw-bold text-dark fs-6">{{ $collection->contributor ?: 'PT Kantor Berita Nasional Antara' }}</div>
                    </div>
                    <div class="mb-4">
                        <div class="text-muted small">Bahan</div>
                        <div class="fw-bold text-dark fs-6">{{ $collection->bahan ?: 'Logam, Kaca, dan Plastik' }}</div>
                    </div>
                    <div class="mb-0">
                        <div class="text-muted small">Ukuran</div>
                        <div class="fw-bold text-dark fs-6">{{ $collection->ukuran ?: '(P : 15 cm / L : 8,5 cm / T : 11 cm)' }}</div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Right Column: Description -->
        <div class="col-lg-7 ps-lg-4">
            <h5 class="fw-bold mb-3" style="color: #1E293B;">Deskripsi</h5>
            <div class="koleksi-detail-description" style="line-height: 1.85; font-size: 1rem; color: #1E293B; text-align: justify; text-justify: inter-word;">
                @php
                    $cleanDesc = $collection->description;
                    $cleanDesc = preg_replace('/[\r\n]+/', ' ', $cleanDesc);
                    $cleanDesc = preg_replace('/<\/p>\s*<p>/i', ' ', $cleanDesc);
                @endphp
                {!! strip_tags($cleanDesc, '<p><br><strong><em><b><i>') !!}
            </div>
        </div>
    </div>
</div>
@endsection
