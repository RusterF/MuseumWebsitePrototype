@extends('layouts.canva')

@section('title', 'SPAN Lapor')

@section('content')
<div class="container py-4">
    <!-- Blue Title (Canva Page 16) -->
    <h2 class="title-blue mb-5">SPAN Lapor</h2>

    <!-- Center Section: LAPOR! Logo & Blue Button (Canva Page 16) -->
    <div class="text-center mb-5">
        <div class="mb-3">
            <img src="{{ asset('images/WebMuspenBaruImages/SPANLapor.png') }}" alt="SPAN LAPOR!" style="height: 80px; width: auto;" class="img-fluid">
        </div>
        <div>
            <a href="https://www.lapor.go.id/" target="_blank" class="btn btn-primary px-4 py-2 fw-semibold" style="border-radius: 0 !important; background-color: var(--canva-accent-blue); border-color: var(--canva-accent-blue);">
                Akses SPAN Lapor
            </a>
        </div>
    </div>

    <!-- Content: Laptop Mockup Left, Description Right (Canva Page 16) -->
    <div class="row align-items-center g-5 mb-5">
        <div class="col-md-6 text-center">
            <img src="{{ asset('images/canva/lapor_laptop_mockup.png') }}" alt="Portal SPAN LAPOR" class="img-fluid" style="max-height: 350px;">
        </div>
        <div class="col-md-6">
            <p class="span-lapor-desc text-secondary mb-0" style="line-height: 1.85; font-size: 1rem; text-align: justify; text-justify: inter-word;">
                Sistem Pengelolaan Pengaduan Pelayanan Publik Nasional (SP4N) - Layanan Aspirasi dan Pengaduan Online Rakyat (LAPOR!) adalah layanan penyampaian semua aspirasi dan pengaduan masyarakat secara online yang terintegrasi dalam pengelolaan pengaduan secara berjenjang pada setiap penyelenggara pelayanan publik di Indonesia.
            </p>
            <p class="span-lapor-desc text-secondary mt-3 mb-0" style="line-height: 1.85; font-size: 1rem; text-align: justify; text-justify: inter-word;">
                Sebagai unit pelaksana teknis di bawah Kementerian Komunikasi dan Digital RI, Museum Penerangan terhubung langsung ke kanal SP4N-LAPOR! guna memastikan setiap laporan dan keluhan masyarakat terkait pelayanan publik ditindaklanjuti secara transparan dan akuntabel.
            </p>
        </div>
    </div>
</div>
@endsection
