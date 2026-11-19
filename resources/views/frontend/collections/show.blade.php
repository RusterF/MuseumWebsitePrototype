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

    <!-- Main Content: Left (Photo + Metadata), Right (Description & Sejarah & Nilai Penting) -->
    <div class="row align-items-start g-5 mb-5">
        <!-- Left Column: Image & Metadata -->
        <div class="col-lg-5">
            <!-- 2. Foto Koleksi -->
            <div class="text-center mb-4">
                <img src="{{ $collection->image_url }}" alt="{{ $collection->title }}" class="img-fluid w-100" style="max-height: 420px; object-fit: contain;" decoding="async">
            </div>

            <!-- Metadata Spesifikasi Koleksi (Nomor Registrasi, Kategori, Periode, Asal, Pembuat, Bahan, Dimensi) -->
            <div class="mb-4">
                <h5 class="fw-bold text-dark mb-3 pb-2 border-bottom">Metadata Koleksi</h5>
                <div class="row g-3">
                    <!-- Left Sub-column -->
                    <div class="col-6">
                        <!-- 3. Nomor Registrasi -->
                        <div class="mb-3">
                            <span class="text-muted small d-block">Nomor Registrasi</span>
                            <span class="fw-bold text-dark fs-6">{{ $collection->registration_number ?: '-' }}</span>
                        </div>
                        <!-- 4. Kategori Koleksi -->
                        <div class="mb-3">
                            <span class="text-muted small d-block">Kategori Koleksi</span>
                            <span class="fw-bold text-dark fs-6">{{ $collection->category ? str_replace('Sejarah ', '', $collection->category->name) : '-' }}</span>
                        </div>
                        <!-- 5. Periode / Tahun -->
                        <div class="mb-3">
                            <span class="text-muted small d-block">Periode / Tahun</span>
                            <span class="fw-bold text-dark fs-6">{{ $collection->registration_year ?: '-' }}</span>
                        </div>
                        <!-- 6. Asal / Instansi -->
                        @php
                            $asalInstansi = $collection->asal_instansi ?: ($collection->contributor && !Str::contains(strtolower($collection->contributor), ['fed', 'felix', 'yashica', 'nikon', 'philips', 'bosch', 'toshiba', 'panasonic', 'arri', 'mitchell', 'presto', 'roskopf', 'watches', 'corporation']) ? $collection->contributor : null);
                        @endphp
                        @if($asalInstansi)
                            <div class="mb-3">
                                <span class="text-muted small d-block">Asal / Instansi</span>
                                <span class="fw-bold text-dark fs-6">{{ $asalInstansi }}</span>
                            </div>
                        @endif
                    </div>

                    <!-- Right Sub-column -->
                    <div class="col-6">
                        <!-- 7. Pembuat / Produsen -->
                        @php
                            $pembuat = $collection->pembuat ?: ($collection->contributor ?: null);
                        @endphp
                        @if($pembuat)
                            <div class="mb-3">
                                <span class="text-muted small d-block">Pembuat / Produsen</span>
                                <span class="fw-bold text-dark fs-6">{{ $pembuat }}</span>
                            </div>
                        @endif
                        <!-- 8. Bahan -->
                        <div class="mb-3">
                            <span class="text-muted small d-block">Bahan</span>
                            <span class="fw-bold text-dark fs-6">{{ $collection->bahan ?: '-' }}</span>
                        </div>
                        <!-- 9. Dimensi -->
                        <div class="mb-3">
                            <span class="text-muted small d-block">Dimensi</span>
                            <span class="fw-bold text-dark fs-6">{{ $collection->ukuran ?: '-' }}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Right Column: Description, Sejarah & Konteks, Nilai Penting -->
        <div class="col-lg-7 ps-lg-4">
            <!-- 10. Deskripsi Koleksi -->
            @if($collection->description)
                <div class="mb-4">
                    <h5 class="fw-bold mb-3 text-dark pb-2 border-bottom">Deskripsi Koleksi</h5>
                    <div class="koleksi-detail-description text-dark canva-paragraph-justify" style="line-height: 1.85; font-size: 1.02rem;">
                        @php
                            $cleanDesc = $collection->description;
                            $cleanDesc = preg_replace('/[\r\n]+/', ' ', $cleanDesc);
                            $cleanDesc = preg_replace('/<\/p>\s*<p>/i', ' ', $cleanDesc);
                        @endphp
                        {!! strip_tags($cleanDesc, '<p><br><strong><em><b><i>') !!}
                    </div>
                </div>
            @endif

            <!-- 11. Sejarah dan Konteks (jika ada) -->
            @if(!empty($collection->sejarah_konteks))
                <div class="mb-4">
                    <h5 class="fw-bold mb-3 text-dark pb-2 border-bottom">Sejarah dan Konteks</h5>
                    <div class="text-dark canva-paragraph-justify" style="line-height: 1.85; font-size: 1.02rem;">
                        {!! strip_tags($collection->sejarah_konteks, '<p><br><strong><em><b><i>') !!}
                    </div>
                </div>
            @endif

            <!-- 12. Nilai Penting (jika ada) -->
            @if(!empty($collection->nilai_penting))
                <div class="mb-4">
                    <h5 class="fw-bold mb-3 text-dark pb-2 border-bottom">Nilai Penting</h5>
                    <div class="text-dark canva-paragraph-justify" style="line-height: 1.85; font-size: 1.02rem;">
                        {!! strip_tags($collection->nilai_penting, '<p><br><strong><em><b><i>') !!}
                    </div>
                </div>
            @endif

            <div class="mt-4 pt-3 border-top">
                <a href="{{ $collection->category ? route('collections.index', ['category' => $collection->category->slug]) : route('collections.index') }}" class="link-cta-canva">
                    <i class="fa-solid fa-arrow-left-long me-1"></i> Kembali ke Galeri Koleksi
                </a>
            </div>
        </div>
    </div>
</div>
@endsection
