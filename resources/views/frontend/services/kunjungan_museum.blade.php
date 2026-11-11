@extends('layouts.canva')

@section('title', 'Kunjungan Museum')

@section('content')
<div class="container py-4 position-relative">
    <!-- Blue Title (Canva Page 8) -->
    <h2 class="title-blue mb-4">Kunjungan Museum</h2>

    <!-- Hero Banner Photo: Children with Museum Guide (Canva Page 8) -->
    <div class="mb-5 overflow-hidden shadow-sm" style="max-height: 450px; border: 1px solid #e2e8f0; border-radius: 0 !important;">
        <img src="{{ asset('images/WebMuspenBaruImages/KunjunganMuseum.png') }}" alt="Kunjungan Museum Penerangan" class="w-100 h-100" style="object-fit: cover; border-radius: 0 !important;">
    </div>

    <!-- 1. Waktu Operasional (Canva Page 8) -->
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

    <!-- 2. Harga Tiket (Canva Page 8) -->
    <div class="mb-4">
        <div class="d-flex align-items-center gap-2 mb-2">
            <div style="width: 12px; height: 12px; background: var(--canva-accent-blue);"></div>
            <h5 class="fw-bold text-dark mb-0">Harga Tiket</h5>
        </div>
        <div class="ps-4 text-secondary small">
            <strong>Gratis</strong>
        </div>
    </div>

    <!-- 3. Mekanisme Kunjungan (Canva Page 8) -->
    <div class="mb-4">
        <div class="d-flex align-items-center gap-2 mb-2">
            <div style="width: 12px; height: 12px; background: var(--canva-accent-blue);"></div>
            <h5 class="fw-bold text-dark mb-0">Mekanisme Kunjungan</h5>
        </div>
        <ul class="service-rules-text ps-4 text-secondary small mb-0" style="line-height: 1.85; text-align: justify; text-justify: inter-word;">
            <li>Pengunjung dapat langsung datang ke Museum Penerangan. Untuk rombongan dapat melakukan reservasi terlebih dahulu melalui nomor whatsapp <strong>+62 811 813 2121</strong>.</li>
            <li>Pengunjung mengisi daftar hadir menggunakan device yang sudah disediakan (e-guestbook).</li>
            <li>Pengunjung menitipkan barang bawaannya di loker yang sudah disediakan.</li>
            <li>Pengunjung mendapatkan fasilitas pemandu dari pemandu museum.</li>
            <li>Pengunjung berhak membuat penilaian terhadap pelayanan yang diberikan.</li>
        </ul>
    </div>

    <!-- 4. Tata Tertib Kunjungan (Canva Page 8) -->
    <div class="mb-5">
        <div class="d-flex align-items-center gap-2 mb-2">
            <div style="width: 12px; height: 12px; background: var(--canva-accent-blue);"></div>
            <h5 class="fw-bold text-dark mb-0">Tata Tertib Kunjungan</h5>
        </div>
        <div class="service-rules-text ps-4 text-secondary small" style="line-height: 1.85; text-align: justify; text-justify: inter-word;">
            <p class="mb-2" style="text-align: justify; text-justify: inter-word;">
                Pengunjung mematuhi ketertiban dan ketentuan yang berlaku di Museum Penerangan selama kunjungan ke ruang pamer. Ketentuan ini mencakup:
            </p>
            <ul class="mb-0" style="text-align: justify; text-justify: inter-word;">
                <li>tidak makan dan minum di dalam ruang pamer;</li>
                <li>tidak bersandar atau menduduki kaca pelindung dan display koleksi;</li>
                <li>tidak menyentuh koleksi (kecuali yang memiliki tanda khusus);</li>
                <li>tidak mencoret atau merusak properti Museum Penerangan;</li>
                <li>tidak merokok/vape di dalam ruang pamer;</li>
                <li>mengikuti alur kunjungan yang telah ditentukan oleh Museum Penerangan;</li>
                <li>pengunjung diperbolehkan untuk melakukan pengambilan gambar atau rekaman selama tidak untuk penggunaan komersial dan tidak mengganggu alur kunjungan;</li>
                <li>pengunjung yang melakukan pengambilan gambar atau rekaman untuk penggunaan komersial perlu mendapatkan persetujuan Museum Penerangan. Petugas Museum Penerangan wajib memastikan tujuan pengambilan gambar atau rekaman yang dilakukan oleh pengunjung apabila menggunakan kamera profesional.</li>
            </ul>
        </div>
    </div>

    <!-- Floating Green Button: Rencanakan Kunjunganmu (Canva Page 8) -->
    <div class="position-fixed bottom-0 end-0 p-4" style="z-index: 1050;">
        <a href="{{ route('booking.create') }}" class="btn btn-success px-4 py-3 fw-bold shadow d-flex align-items-center gap-2" style="border-radius: 0 !important; background-color: #22c55e; border-color: #22c55e;">
            <span>Rencanakan Kunjunganmu</span>
            <i class="fa-regular fa-calendar-check fs-5"></i>
        </a>
    </div>
</div>
@endsection
