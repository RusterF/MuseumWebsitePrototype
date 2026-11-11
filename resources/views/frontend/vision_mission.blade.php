@extends('layouts.canva')

@section('title', 'Visi & Misi')

@section('content')
<!-- Header Banner (The British Museum Style) -->
<section class="page-header-clean">
    <div class="container">
        <div class="section-badge"><i class="fa-solid fa-compass"></i> Arah & Tujuan</div>
        <h1 class="page-title">Visi & Misi Museum Penerangan</h1>
        <p class="page-lead">
            Pedoman strategis Museum Penerangan dalam melayani, mengedukasi, dan melestarikan warisan peradaban komunikasi bangsa Indonesia.
        </p>
    </div>
</section>

<section class="py-5" style="background-color: var(--muspen-bg-base);">
    <div class="container py-3">
        <div class="row g-5">
            <!-- Visi Card -->
            <div class="col-lg-6">
                <div class="muspen-card p-4 p-md-5 h-100 border shadow">
                    <div class="d-inline-flex align-items-center justify-content-center rounded-1 border border-white border-opacity-25 text-white mb-4" style="width: 54px; height: 54px; background-color: rgba(255,255,255,0.06);">
                        <i class="fa-solid fa-eye fs-4"></i>
                    </div>
                    <h3 class="fw-bold mb-3 text-white" style="font-family: 'Playfair Display', Georgia, serif;">Visi Museum</h3>
                    <div class="lead fw-bold mb-4 p-3 rounded-1 border border-white border-opacity-20 text-white" style="background-color: rgba(255, 255, 255, 0.05); font-family: 'Playfair Display', Georgia, serif;">
                        "{{ $visi }}"
                    </div>
                    <p class="small mb-0" style="color: #94A3B8; line-height: 1.8; text-align: justify; text-justify: inter-word;">
                        Museum Penerangan berkomitmen mewujudkan institusi permuseuman yang modern, adaptif dengan perkembangan teknologi masa kini (Smart Museum), serta senantiasa interaktif dan komunikatif dalam menyebarkan inspirasi kepada seluruh lapisan masyarakat.
                    </p>
                </div>
            </div>

            <!-- Misi Card -->
            <div class="col-lg-6">
                <div class="muspen-card p-4 p-md-5 h-100 border shadow">
                    <div class="d-inline-flex align-items-center justify-content-center rounded-1 border border-white border-opacity-25 text-white mb-4" style="width: 54px; height: 54px; background-color: rgba(255,255,255,0.06);">
                        <i class="fa-solid fa-bullseye fs-4"></i>
                    </div>
                    <h3 class="fw-bold mb-3 text-white" style="font-family: 'Playfair Display', Georgia, serif;">Misi Museum</h3>
                    <div style="line-height: 1.8; color: #CBD5E1; text-align: justify; text-justify: inter-word;">
                        {!! nl2br(e($misi)) !!}
                    </div>
                </div>
            </div>
        </div>

        <!-- Nilai Budaya Kerja -->
        <div class="mt-5 pt-4">
            <div class="text-center mb-4">
                <h3 class="fw-bold text-white" style="font-family: 'Playfair Display', Georgia, serif;">Nilai-Nilai Pelayanan (BerAKHLAK)</h3>
                <p style="color: #94A3B8;">Prinsip dasar insan aparatur Museum Penerangan Kementerian Komunikasi dan Digital RI</p>
            </div>

            <div class="row g-3 text-center">
                <div class="col-md-4 col-lg-2">
                    <div class="p-3 rounded-1 border h-100" style="background-color: #0D2038; border-color: var(--muspen-border) !important;">
                        <div class="fw-bold text-white mb-1">Berorientasi Pelayanan</div>
                        <small style="color: #94A3B8;">Komitmen memberikan pelayanan prima bagi pengunjung</small>
                    </div>
                </div>
                <div class="col-md-4 col-lg-2">
                    <div class="p-3 rounded-1 border h-100" style="background-color: #0D2038; border-color: var(--muspen-border) !important;">
                        <div class="fw-bold text-white mb-1">Akuntabel</div>
                        <small style="color: #94A3B8;">Bertanggung jawab atas pengelolaan koleksi negara</small>
                    </div>
                </div>
                <div class="col-md-4 col-lg-2">
                    <div class="p-3 rounded-1 border h-100" style="background-color: #0D2038; border-color: var(--muspen-border) !important;">
                        <div class="fw-bold text-white mb-1">Kompeten</div>
                        <small style="color: #94A3B8;">Terus belajar mengembangkan keahlian kuratorial</small>
                    </div>
                </div>
                <div class="col-md-4 col-lg-2">
                    <div class="p-3 rounded-1 border h-100" style="background-color: #0D2038; border-color: var(--muspen-border) !important;">
                        <div class="fw-bold text-white mb-1">Harmonis</div>
                        <small style="color: #94A3B8;">Membangun lingkungan kerja kondusif dan inklusif</small>
                    </div>
                </div>
                <div class="col-md-4 col-lg-2">
                    <div class="p-3 rounded-1 border h-100" style="background-color: #0D2038; border-color: var(--muspen-border) !important;">
                        <div class="fw-bold text-white mb-1">Loyal</div>
                        <small style="color: #94A3B8;">Menjaga nama baik bangsa dan warisan sejarah</small>
                    </div>
                </div>
                <div class="col-md-4 col-lg-2">
                    <div class="p-3 rounded-1 border h-100" style="background-color: #0D2038; border-color: var(--muspen-border) !important;">
                        <div class="fw-bold text-white mb-1">Adaptif & Kolaboratif</div>
                        <small style="color: #94A3B8;">Terus berinovasi dan bersinergi dengan publik</small>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
