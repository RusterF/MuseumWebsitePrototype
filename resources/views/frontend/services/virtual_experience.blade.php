@extends('layouts.canva')

@section('title', 'Kunjungan Daring Kelompok (Virtual Experience)')

@section('content')
<div class="container py-4 position-relative">
    <!-- Blue Title (Canva Page 9) -->
    <h2 class="title-blue mb-2">Kunjungan Daring Kelompok (Virtual Experience)</h2>
    <p class="text-secondary mb-4 canva-paragraph-justify" style="line-height: 1.85; font-size: 1.05rem;">
        Layanan edukasi dan informasi koleksi Museum Penerangan secara daring melalui aplikasi Zoom bagi sekolah, instansi, atau lembaga.
    </p>

    <!-- Hero Banner Photo: Virtual Tour Filming (Canva Page 9) -->
    <div class="mb-5">
        <img src="{{ asset('images/WebMuspenBaruImages/VirtualExperience.webp') }}" alt="Virtual Experience Museum Penerangan" class="w-100 h-auto d-block img-fluid" decoding="async">
    </div>

    <!-- 1 & 2: Informasi Akses & Waktu Sesi -->
    <div class="row g-4 g-lg-5 mb-5">
        <!-- 1. Harga Tiket Masuk (Google Doc Section 5.2) -->
        <div class="col-md-4">
            <div class="d-flex align-items-center gap-2 mb-3">
                <span class="section-emoji-blue">🎟️</span>
                <h5 class="fw-bold text-dark mb-0">Harga Tiket</h5>
            </div>
            <div class="ps-3 text-secondary" style="font-size: 1rem;">
                <div class="mb-2">
                    <span class="badge-canva-success fs-6 px-3 py-1 fw-bold">Gratis</span>
                </div>
                <p class="text-muted small mb-0">Layanan kunjungan daring tidak dipungut biaya retribusi.</p>
            </div>
        </div>

        <!-- 2. Waktu Pelaksanaan Sesi (Canva Page 9) -->
        <div class="col-md-8">
            <div class="d-flex align-items-center gap-2 mb-3">
                <span class="section-emoji-blue">🕒</span>
                <h5 class="fw-bold text-dark mb-0">Waktu Pelaksanaan Sesi</h5>
            </div>
            <div class="ps-3 text-secondary" style="line-height: 1.8; font-size: 1rem;">
                <p class="text-dark fw-semibold mb-3">
                    <i class="fa-regular fa-calendar-check me-2 text-primary"></i> Tur Virtual 3D & Pemanduan Daring (Sesuai Konfirmasi Jadwal):
                </p>
                <div class="row g-4">
                    <div class="col-sm-6">
                        <span class="badge-canva-navy px-2 py-1 small mb-2 d-inline-block">Sesi 1 (Pagi)</span>
                        <div class="fw-bold text-dark fs-5 mb-1"><i class="fa-regular fa-clock me-1 text-primary"></i> 09.00 - 11.00 WIB</div>
                        <p class="text-muted small mb-0">Tur eksplorasi interaktif & sesi tanya jawab</p>
                    </div>
                    <div class="col-sm-6">
                        <span class="badge-canva-navy px-2 py-1 small mb-2 d-inline-block">Sesi 2 (Siang)</span>
                        <div class="fw-bold text-dark fs-5 mb-1"><i class="fa-regular fa-clock me-1 text-primary"></i> 13.00 - 15.00 WIB</div>
                        <p class="text-muted small mb-0">Tur eksplorasi interaktif & sesi tanya jawab</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <hr class="my-5 text-muted opacity-25">

    <!-- 3. Prosedur Berkunjung (Google Doc Section 5.2) -->
    <div class="mb-5">
        <div class="d-flex align-items-center gap-2 mb-4">
            <span class="section-emoji-blue">📋</span>
            <h4 class="fw-bold text-dark mb-0">Prosedur Pendaftaran</h4>
        </div>
        <ol class="service-rules-text ps-4 text-secondary mb-0 canva-paragraph-justify" style="line-height: 1.85; font-size: 1rem;">
            <li class="mb-2">Sekolah/instansi/lembaga yang ingin mengadakan kegiatan Virtual Experience melakukan reservasi melalui call center Museum Penerangan di <strong>0811 813 2121</strong>.</li>
            <li class="mb-2">Pemohon memiliki jaringan internet yang stabil dan aplikasi Zoom bagi Sekolah/Instansi/Lembaga.</li>
            <li class="mb-2">Perangkat audio eksternal yang terhubung dengan perangkat Zoom (apabila menggunakan perangkat audio eksternal).</li>
            <li class="mb-2">Setelah mendapat tanggal pelaksanaan, Sekolah/Instansi/Lembaga mengirimkan surat permohonan resmi.</li>
            <li>Pemohon mendapatkan pelayanan sesuai dengan waktu yang telah disepakati.</li>
        </ol>
    </div>

    <!-- Floating / Sticky Button: Rencanakan Kunjunganmu (Canva Page 9) -->
    <div class="position-fixed bottom-0 end-0 p-3 p-md-4" style="z-index: 1050;">
        <a href="https://wa.me/628118132121?text=Halo%20Admin%20Museum%20Penerangan,%20saya%20ingin%20mengajukan%20Layanan%20Virtual%20Experience" target="_blank" rel="noopener noreferrer" class="btn btn-success px-4 py-3 fw-bold shadow-lg d-flex align-items-center gap-2" style="background-color: #22c55e; border-color: #22c55e;">
            <i class="fa-brands fa-whatsapp fs-5"></i>
            <span>Daftar Virtual Experience</span>
        </a>
    </div>
</div>
@endsection
