@extends('layouts.canva')

@section('title', 'Penelitian Ilmiah')

@section('content')
<div class="container py-4 position-relative">
    <!-- Blue Title (Canva Page 11) -->
    <h2 class="title-blue mb-4">Penelitian Ilmiah</h2>

    <!-- Top Row: Photo on Left, Description on Right (Canva Page 11) -->
    <div class="row align-items-center g-4 mb-5">
        <div class="col-md-6">
            <img src="{{ asset('images/WebMuspenBaruImages/PenelitianIlmiah.png') }}" alt="Penelitian Ilmiah Museum Penerangan" class="img-fluid w-100 shadow-sm" style="border: 1px solid #e2e8f0; border-radius: 0 !important;">
        </div>
        <div class="col-md-6">
            <p class="service-desc-text text-secondary mb-0" style="line-height: 1.85; font-size: 0.98rem; text-align: justify; text-justify: inter-word;">
                Museum Penerangan memfasilitasi kebutuhan penelitian ilmiah bagi pelajar, mahasiswa jenjang sarjana maupun pascasarjana, dosen, serta peneliti independen. Layanan ini mencakup penyediaan akses data artefak bersejarah, wawancara bersama kurator dan staf teknis konservasi, penelusuran dokumen arsip komunikasi dan penerangan, serta pendampingan langsung di lingkungan museum.
            </p>
        </div>
    </div>

    <!-- 1. Waktu Operasional (Canva Page 11) -->
    <div class="mb-4">
        <div class="d-flex align-items-center gap-2 mb-2">
            <div style="width: 12px; height: 12px; background: var(--canva-accent-blue);"></div>
            <h5 class="fw-bold text-dark mb-0">Waktu Operasional</h5>
        </div>
        <div class="ps-4 text-secondary small" style="line-height: 1.8;">
            <div>Buka Setiap Hari pukul 09.00 - 15.00 WIB</div>
            <div>Istirahat pukul 12.00 - 13.00 WIB</div>
            <div class="text-muted fst-italic">(Informasi tutup akan diumumkan pada media sosial Museum Penerangan)</div>
        </div>
    </div>

    <!-- 2. Mekanisme Penelitian Ilmiah (Canva Page 11) -->
    <div class="mb-5">
        <div class="d-flex align-items-center gap-2 mb-2">
            <div style="width: 12px; height: 12px; background: var(--canva-accent-blue);"></div>
            <h5 class="fw-bold text-dark mb-0">Mekanisme Penelitian Ilmiah</h5>
        </div>
        <ul class="service-rules-text ps-4 text-secondary small mb-0" style="line-height: 1.85; text-align: justify; text-justify: inter-word;">
            <li>Pengunjung dapat melakukan reservasi terlebih dahulu melalui nomor whatsapp <strong>+62 811 813 2121</strong>.</li>
            <li>Pengunjung mengisi daftar hadir menggunakan device yang sudah disediakan.</li>
            <li>Pengunjung menitipkan barang bawaannya di loker yang sudah disediakan.</li>
            <li>Pengunjung mendapatkan fasilitas pendampingan dan data dari petugas/kurator museum.</li>
            <li>Pengunjung berhak membuat penilaian terhadap pelayanan yang diberikan.</li>
        </ul>
    </div>

    <!-- Floating Green Button: Rencanakan Kunjunganmu (Canva Page 11) -->
    <div class="position-fixed bottom-0 end-0 p-4" style="z-index: 1050;">
        <a href="https://wa.me/628118132121?text=Halo%20Admin%20Museum%20Penerangan,%20saya%20ingin%20mengajukan%20Layanan%20Penelitian%20Ilmiah" target="_blank" class="btn btn-success px-4 py-3 fw-bold shadow d-flex align-items-center gap-2" style="border-radius: 0 !important; background-color: #22c55e; border-color: #22c55e;">
            <span>Rencanakan Kunjunganmu</span>
            <i class="fa-regular fa-calendar-check fs-5"></i>
        </a>
    </div>
</div>
@endsection
