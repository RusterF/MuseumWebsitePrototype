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
    <div class="mb-5 overflow-hidden shadow-sm border" style="border-color: #E2E8F0 !important;">
        <img src="{{ asset('images/WebMuspenBaruImages/VirtualExperience.png') }}" alt="Virtual Experience Museum Penerangan" class="w-100 h-auto d-block">
    </div>

    <!-- 1. Harga Tiket Masuk (Google Doc Section 5.2) -->
    <div class="card-canva p-4 mb-4 shadow-sm" style="background-color: #F8FAFC;">
        <div class="d-flex align-items-center gap-2 mb-2">
            <span class="section-dot-marker"></span>
            <h5 class="fw-bold text-dark mb-0">Harga Tiket Masuk</h5>
        </div>
        <div class="ps-3 text-secondary" style="font-size: 0.95rem;">
            <span class="badge-canva-success fs-6 px-3 py-1 fw-bold">Gratis</span>
            <span class="ms-2 small text-muted">Layanan kunjungan daring tidak dipungut biaya retribusi.</span>
        </div>
    </div>

    <!-- 2. Waktu Pelaksanaan Sesi (Canva Page 9) -->
    <div class="card-canva p-4 mb-4 shadow-sm" style="background-color: #F8FAFC;">
        <div class="d-flex align-items-center gap-2 mb-3">
            <span class="section-dot-marker"></span>
            <h5 class="fw-bold text-dark mb-0">Waktu Pelaksanaan Sesi</h5>
        </div>
        <div class="ps-3 text-secondary" style="line-height: 1.8; font-size: 0.95rem;">
            <div class="fw-semibold text-dark mb-2"><i class="fa-regular fa-calendar-check me-2 text-primary"></i> Tur Virtual 3D & Pemanduan Daring (Sesuai Konfirmasi Jadwal):</div>
            <div class="row g-3">
                <div class="col-sm-6">
                    <div class="card-canva p-3 bg-white border" style="border-color: #E2E8F0 !important;">
                        <span class="badge-canva-navy px-2 py-1 small mb-1 d-inline-block">Sesi 1 (Pagi)</span>
                        <div class="fw-bold text-dark fs-6"><i class="fa-regular fa-clock me-1 text-primary"></i> 09.00 - 11.00 WIB</div>
                        <small class="text-muted">Tur eksplorasi interaktif & sesi tanya jawab</small>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="card-canva p-3 bg-white border" style="border-color: #E2E8F0 !important;">
                        <span class="badge-canva-navy px-2 py-1 small mb-1 d-inline-block">Sesi 2 (Siang)</span>
                        <div class="fw-bold text-dark fs-6"><i class="fa-regular fa-clock me-1 text-primary"></i> 13.00 - 15.00 WIB</div>
                        <small class="text-muted">Tur eksplorasi interaktif & sesi tanya jawab</small>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- 3. Prosedur Berkunjung (Google Doc Section 5.2) -->
    <div class="card-canva p-4 mb-5 shadow-sm">
        <div class="d-flex align-items-center gap-2 mb-3">
            <span class="section-dot-marker"></span>
            <h5 class="fw-bold text-dark mb-0">Prosedur Berkunjung</h5>
        </div>
        <ol class="service-rules-text ps-4 text-secondary mb-0 canva-paragraph-justify" style="line-height: 1.85; font-size: 0.98rem;">
            <li>Sekolah/instansi/lembaga yang ingin mengadakan kegiatan Virtual Experience melakukan reservasi melalui call center Museum Penerangan di <strong>0811 813 2121</strong>.</li>
            <li>Pemohon memiliki jaringan internet yang stabil dan aplikasi Zoom bagi Sekolah/Instansi/Lembaga.</li>
            <li>Perangkat audio eksternal yang terhubung dengan perangkat Zoom (apabila menggunakan perangkat audio eksternal).</li>
            <li>Setelah mendapat tanggal pelaksanaan, Sekolah/Instansi/Lembaga mengirimkan surat permohonan resmi.</li>
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
