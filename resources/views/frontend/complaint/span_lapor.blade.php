@extends('layouts.canva')

@section('title', 'SPAN LAPOR! - Museum Penerangan')

@section('content')
<!-- Header Banner -->
<section class="page-header-canva">
    <div class="container">
        <!-- Breadcrumb -->
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb-canva mb-3">
                <li><a href="{{ route('home') }}">Beranda</a></li>
                <li><a href="{{ route('saran-aduan.index') }}">Pengaduan</a></li>
                <li class="current">SPAN LAPOR!</li>
            </ol>
        </nav>

        <span class="badge-canva mb-2 text-uppercase fw-bold" style="background-color: rgba(255,255,255,0.12); color: #FFFFFF; border-color: rgba(255,255,255,0.25);">
            <i class="fa-solid fa-bullhorn me-1"></i> Kanal Nasional
        </span>
        <h1 class="display-5 fw-bold text-white mb-2">SPAN LAPOR!</h1>
        <p class="page-lead">
            Sistem Pengelolaan Pengaduan Pelayanan Publik Nasional - Layanan Aspirasi dan Pengaduan Online Rakyat.
        </p>
    </div>
</section>

<section class="section-py bg-white">
    <div class="container">
        <!-- Center Section: LAPOR! Logo & CTA -->
        <div class="card-canva p-4 p-md-5 text-center mb-5 shadow-sm" style="background-color: #F8FAFC;">
            <div class="mb-3">
                <img src="{{ asset('images/lapor.png') }}" alt="SPAN LAPOR!" style="height: 65px; width: auto;" class="img-fluid">
            </div>
            <p class="text-secondary max-w-700 mx-auto mb-4" style="line-height: 1.7;">
                Sampaikan aspirasi dan pengaduan Anda mengenai pelayanan publik Museum Penerangan secara langsung melalui kanal resmi pemerintah Republik Indonesia.
            </p>
            <div>
                <a href="https://www.lapor.go.id/" target="_blank" rel="noopener noreferrer" class="btn-canva-primary px-5 py-3 fw-bold text-uppercase">
                    <i class="fa-solid fa-arrow-up-right-from-square me-2"></i> Akses Portal SPAN LAPOR!
                </a>
            </div>
        </div>

        <!-- Content: Laptop Mockup Left, Description Right (Canva Page 16) -->
        <div class="row align-items-center g-5 mb-4">
            <div class="col-md-6 text-center">
                <img src="{{ asset('images/WebMuspenBaruImages/SPANLapor.png') }}" alt="Portal SPAN LAPOR" class="img-fluid" style="max-height: 420px; width: auto;">
            </div>
            <div class="col-md-6">
                <h4 class="title-blue mb-3">Tentang SP4N-LAPOR!</h4>
                <p class="span-lapor-desc text-secondary canva-paragraph-justify mb-3" style="line-height: 1.85; font-size: 1rem;">
                    Sistem Pengelolaan Pengaduan Pelayanan Publik Nasional (SP4N) - Layanan Aspirasi dan Pengaduan Online Rakyat (LAPOR!) adalah layanan penyampaian semua aspirasi dan pengaduan masyarakat secara online yang terintegrasi dalam pengelolaan pengaduan secara berjenjang pada setiap penyelenggara pelayanan publik di Indonesia.
                </p>
                <p class="span-lapor-desc text-secondary canva-paragraph-justify mb-4" style="line-height: 1.85; font-size: 1rem;">
                    Sebagai unit pelaksana teknis di bawah Kementerian Komunikasi dan Digital RI, Museum Penerangan terhubung langsung ke kanal SP4N-LAPOR! guna memastikan setiap laporan dan keluhan masyarakat terkait pelayanan publik ditindaklanjuti secara transparan dan akuntabel.
                </p>
                <div>
                    <a href="{{ route('saran-aduan.index') }}" class="link-cta-canva fw-semibold">
                        <i class="fa-solid fa-arrow-left-long me-1"></i> Form Pengaduan Internal Museum
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
