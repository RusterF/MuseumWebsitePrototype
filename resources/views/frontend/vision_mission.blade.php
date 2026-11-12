@extends('layouts.canva')

@section('title', 'Visi & Misi - Museum Penerangan')

@section('content')
<!-- Header Banner -->
<section class="page-header-canva">
    <div class="container">
        <!-- Breadcrumb -->
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb-canva mb-3">
                <li><a href="{{ route('home') }}">Beranda</a></li>
                <li class="separator">/</li>
                <li><a href="{{ route('about-us') }}">Tentang</a></li>
                <li class="separator">/</li>
                <li class="current">Visi & Misi</li>
            </ol>
        </nav>

        <span class="badge-canva mb-2 text-uppercase fw-bold" style="background-color: rgba(255,255,255,0.12); color: #FFFFFF; border-color: rgba(255,255,255,0.25);">
            <i class="fa-solid fa-compass me-1"></i> Arah & Tujuan
        </span>
        <h1 class="display-5 fw-bold text-white mb-2">Visi & Misi Museum Penerangan</h1>
        <p class="page-lead">
            Pedoman strategis Museum Penerangan dalam melayani, mengedukasi, dan melestarikan warisan peradaban komunikasi bangsa Indonesia.
        </p>
    </div>
</section>

<section class="section-py bg-white">
    <div class="container">
        <div class="row g-5 mb-5">
            <!-- Visi Card -->
            <div class="col-lg-6">
                <div class="card-canva p-4 p-md-5 h-100 shadow-sm border-top border-4 border-primary">
                    <div class="d-inline-flex align-items-center justify-content-center text-primary mb-4 p-3 border" style="background-color: #F8FAFC; width: 54px; height: 54px;">
                        <i class="fa-solid fa-eye fs-4"></i>
                    </div>
                    <h3 class="fw-bold mb-3 text-dark">Visi Museum</h3>
                    <div class="lead fw-bold mb-4 p-3 border-start border-4 border-primary fst-italic" style="background-color: #F8FAFC; color: var(--canva-navy);">
                        "{{ $visi }}"
                    </div>
                    <p class="text-secondary canva-paragraph-justify mb-0" style="line-height: 1.85; font-size: 1rem;">
                        Museum Penerangan berkomitmen mewujudkan institusi permuseuman yang modern, adaptif dengan perkembangan teknologi masa kini (Smart Museum), serta senantiasa interaktif dan komunikatif dalam menyebarkan inspirasi kepada seluruh lapisan masyarakat.
                    </p>
                </div>
            </div>

            <!-- Misi Card -->
            <div class="col-lg-6">
                <div class="card-canva p-4 p-md-5 h-100 shadow-sm border-top border-4 border-primary">
                    <div class="d-inline-flex align-items-center justify-content-center text-primary mb-4 p-3 border" style="background-color: #F8FAFC; width: 54px; height: 54px;">
                        <i class="fa-solid fa-bullseye fs-4"></i>
                    </div>
                    <h3 class="fw-bold mb-3 text-dark">Misi Museum</h3>
                    <div class="text-dark canva-paragraph-justify" style="line-height: 1.85; font-size: 1rem;">
                        {!! nl2br(e($misi)) !!}
                    </div>
                </div>
            </div>
        </div>

        <!-- Nilai Budaya Kerja BerAKHLAK -->
        <div class="pt-4 border-top">
            <div class="text-center mb-5">
                <h3 class="title-blue mb-2">Nilai-Nilai Pelayanan (BerAKHLAK)</h3>
                <p class="text-secondary">Prinsip dasar insan aparatur Museum Penerangan Kementerian Komunikasi dan Digital RI</p>
            </div>

            <div class="row g-3 text-center justify-content-center">
                <div class="col-md-4 col-lg-2 col-sm-6">
                    <div class="card-canva p-3 h-100 shadow-sm" style="background-color: #F8FAFC;">
                        <i class="fa-solid fa-hand-holding-heart text-primary fs-3 mb-2"></i>
                        <div class="fw-bold text-dark mb-1 small">Berorientasi Pelayanan</div>
                        <p class="text-muted small mb-0" style="font-size: 0.78rem;">Komitmen memberikan pelayanan prima bagi pengunjung</p>
                    </div>
                </div>
                <div class="col-md-4 col-lg-2 col-sm-6">
                    <div class="card-canva p-3 h-100 shadow-sm" style="background-color: #F8FAFC;">
                        <i class="fa-solid fa-scale-balanced text-primary fs-3 mb-2"></i>
                        <div class="fw-bold text-dark mb-1 small">Akuntabel</div>
                        <p class="text-muted small mb-0" style="font-size: 0.78rem;">Bertanggung jawab atas pengelolaan koleksi negara</p>
                    </div>
                </div>
                <div class="col-md-4 col-lg-2 col-sm-6">
                    <div class="card-canva p-3 h-100 shadow-sm" style="background-color: #F8FAFC;">
                        <i class="fa-solid fa-award text-primary fs-3 mb-2"></i>
                        <div class="fw-bold text-dark mb-1 small">Kompeten</div>
                        <p class="text-muted small mb-0" style="font-size: 0.78rem;">Terus belajar mengembangkan keahlian kuratorial</p>
                    </div>
                </div>
                <div class="col-md-4 col-lg-2 col-sm-6">
                    <div class="card-canva p-3 h-100 shadow-sm" style="background-color: #F8FAFC;">
                        <i class="fa-solid fa-people-roof text-primary fs-3 mb-2"></i>
                        <div class="fw-bold text-dark mb-1 small">Harmonis</div>
                        <p class="text-muted small mb-0" style="font-size: 0.78rem;">Membangun lingkungan kerja kondusif dan inklusif</p>
                    </div>
                </div>
                <div class="col-md-4 col-lg-2 col-sm-6">
                    <div class="card-canva p-3 h-100 shadow-sm" style="background-color: #F8FAFC;">
                        <i class="fa-solid fa-shield-halved text-primary fs-3 mb-2"></i>
                        <div class="fw-bold text-dark mb-1 small">Loyal</div>
                        <p class="text-muted small mb-0" style="font-size: 0.78rem;">Menjaga nama baik bangsa dan warisan sejarah</p>
                    </div>
                </div>
                <div class="col-md-4 col-lg-2 col-sm-6">
                    <div class="card-canva p-3 h-100 shadow-sm" style="background-color: #F8FAFC;">
                        <i class="fa-solid fa-lightbulb text-primary fs-3 mb-2"></i>
                        <div class="fw-bold text-dark mb-1 small">Adaptif & Kolaboratif</div>
                        <p class="text-muted small mb-0" style="font-size: 0.78rem;">Terus berinovasi dan bersinergi dengan masyarakat</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
