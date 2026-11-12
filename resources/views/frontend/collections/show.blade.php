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
        @endif
        <span class="text-secondary fw-semibold">{{ Str::limit($collection->title, 40) }}</span>
    </div>

    <!-- Main Content: Left (Photo + Metadata), Right (Description) - Canva Page 5 exact match -->
    <div class="row align-items-start g-5 mb-5">
        <!-- Left Column: Image & Metadata -->
        <div class="col-lg-5">
            <div class="card-canva p-3 text-center mb-4 shadow-sm" style="background-color: #F8FAFC;">
                <img src="{{ $collection->image_url }}" alt="{{ $collection->title }}" class="img-fluid" style="max-height: 380px; object-fit: contain;">
            </div>

            <!-- Metadata Table (Google Doc Section 2 & Canva Page 5 layout) -->
            <div class="card-canva p-4 shadow-sm">
                <h6 class="fw-bold text-dark mb-3 border-bottom pb-2" style="border-color: #E2E8F0 !important;">
                    <i class="fa-solid fa-circle-info text-primary me-2"></i> Metadata Koleksi
                </h6>
                <div class="row g-3">
                    <!-- Left Sub-column -->
                    <div class="col-6">
                        <div class="mb-3">
                            <div class="text-muted small">Nomor Registrasi</div>
                            <div class="fw-bold text-dark fs-6">{{ $collection->registration_number ?: '-' }}</div>
                        </div>
                        <div class="mb-3">
                            <div class="text-muted small">Kategori Koleksi</div>
                            <div class="fw-bold text-dark fs-6">{{ $collection->category ? str_replace('Sejarah ', '', $collection->category->name) : '-' }}</div>
                        </div>
                        <div class="mb-3">
                            <div class="text-muted small">Periode / Tahun</div>
                            <div class="fw-bold text-dark fs-6">{{ $collection->registration_year ?: '-' }}</div>
                        </div>
                        <div class="mb-0">
                            <div class="text-muted small">Nomor Inventaris</div>
                            <div class="fw-bold text-dark fs-6">{{ $collection->inventory_number ?: '-' }}</div>
                        </div>
                    </div>

                    <!-- Right Sub-column -->
                    <div class="col-6">
                        <div class="mb-3">
                            <div class="text-muted small">Asal / Instansi</div>
                            <div class="fw-bold text-dark fs-6">{{ $collection->contributor ?: '-' }}</div>
                        </div>
                        <div class="mb-3">
                            <div class="text-muted small">Bahan</div>
                            <div class="fw-bold text-dark fs-6">{{ $collection->bahan ?: '-' }}</div>
                        </div>
                        <div class="mb-3">
                            <div class="text-muted small">Dimensi</div>
                            <div class="fw-bold text-dark fs-6">{{ $collection->ukuran ?: '-' }}</div>
                        </div>
                        <div class="mb-0">
                            <div class="text-muted small">Status Koleksi</div>
                            <div class="fw-bold text-success fs-6"><i class="fa-solid fa-circle-check small me-1"></i> Terpublikasi</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Right Column: Description -->
        <div class="col-lg-7 ps-lg-4">
            <div class="card-canva p-4 p-md-5 shadow-sm">
                <h5 class="fw-bold mb-3 text-dark border-bottom pb-2" style="border-color: #E2E8F0 !important;">Deskripsi Koleksi</h5>
                <div class="koleksi-detail-description text-dark canva-paragraph-justify" style="line-height: 1.85; font-size: 1.02rem;">
                    @php
                        $cleanDesc = $collection->description;
                        $cleanDesc = preg_replace('/[\r\n]+/', ' ', $cleanDesc);
                        $cleanDesc = preg_replace('/<\/p>\s*<p>/i', ' ', $cleanDesc);
                    @endphp
                    {!! strip_tags($cleanDesc, '<p><br><strong><em><b><i>') !!}
                </div>

                <div class="mt-4 pt-3 border-top" style="border-color: #E2E8F0 !important;">
                    <a href="{{ $collection->category ? route('collections.index', ['category' => $collection->category->slug]) : route('collections.index') }}" class="link-cta-canva">
                        <i class="fa-solid fa-arrow-left-long me-1"></i> Kembali ke Galeri Koleksi
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
