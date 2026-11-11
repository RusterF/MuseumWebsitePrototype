@extends('layouts.canva')

@section('title', 'Kunjungan Daring Kelompok (Virtual Experience)')

@section('content')
<div class="container py-4 position-relative">
    <!-- Blue Title (Canva Page 9) -->
    <h2 class="title-blue mb-4">Kunjungan Daring Kelompok (Virtual Experience)</h2>

    <!-- Hero Banner Photo: Virtual Tour Filming (Canva Page 9) -->
    <div class="mb-5 overflow-hidden shadow-sm" style="max-height: 450px; border: 1px solid #e2e8f0; border-radius: 0 !important;">
        <img src="{{ asset('images/WebMuspenBaruImages/VirtualExperience.png') }}" alt="Virtual Experience Museum Penerangan" class="w-100 h-100" style="object-fit: cover; border-radius: 0 !important;">
    </div>

    <!-- 1. Waktu Operasional (Canva Page 9) -->
    <div class="mb-4">
        <div class="d-flex align-items-center gap-2 mb-2">
            <div style="width: 12px; height: 12px; background: var(--canva-accent-blue);"></div>
            <h5 class="fw-bold text-dark mb-0">Waktu Operasional</h5>
        </div>
        <div class="ps-4 text-secondary small" style="line-height: 1.8;">
            <div class="fw-semibold">Buka Setiap Hari</div>
            <div class="d-flex gap-2">
                <span style="width: 60px;">Sesi 1</span>
                <span>:</span>
                <span>09.00 - 11.00 WIB</span>
            </div>
            <div class="d-flex gap-2">
                <span style="width: 60px;">Sesi 2</span>
                <span>:</span>
                <span>13.00 - 15.00 WIB</span>
            </div>
        </div>
    </div>

    <!-- 2. Harga Tiket (Canva Page 9) -->
    <div class="mb-4">
        <div class="d-flex align-items-center gap-2 mb-2">
            <div style="width: 12px; height: 12px; background: var(--canva-accent-blue);"></div>
            <h5 class="fw-bold text-dark mb-0">Harga Tiket</h5>
        </div>
        <div class="ps-4 text-secondary small">
            <strong>Gratis</strong>
        </div>
    </div>

    <!-- 3. Mekanisme Kunjungan (Canva Page 9) -->
    <div class="mb-4">
        <div class="d-flex align-items-center gap-2 mb-2">
            <div style="width: 12px; height: 12px; background: var(--canva-accent-blue);"></div>
            <h5 class="fw-bold text-dark mb-0">Mekanisme Kunjungan</h5>
        </div>
        <ul class="service-rules-text ps-4 text-secondary small mb-0" style="line-height: 1.85; text-align: justify; text-justify: inter-word;">
            <li>Sekolah/instansi/lembaga yang ingin mengadakan kegiatan Virtual Experience melakukan reservasi melalui call center Museum Penerangan di <strong>+62 811 813 2121</strong>.</li>
            <li>Pemohon memiliki jaringan internet yang stabil dan aplikasi Zoom bagi Sekolah/Instansi/Lembaga.</li>
            <li>Perangkat audio eksternal yang terhubung dengan perangkat Zoom (apabila menggunakan perangkat audio eksternal).</li>
            <li>Setelah mendapat tanggal pelaksanaan, Sekolah/Instansi/Lembaga mengirimkan surat permohonan resmi.</li>
            <li>Pemohon mendapatkan pelayanan sesuai dengan waktu yang telah disepakati.</li>
        </ul>
    </div>

    <!-- 4. Tata Tertib Kunjungan (Canva Page 9) -->
    <div class="mb-5">
        <div class="d-flex align-items-center gap-2 mb-2">
            <div style="width: 12px; height: 12px; background: var(--canva-accent-blue);"></div>
            <h5 class="fw-bold text-dark mb-0">Tata Tertib Kunjungan</h5>
        </div>
        <div class="service-rules-text ps-4 text-secondary small" style="line-height: 1.85; text-align: justify; text-justify: inter-word;">
            <p class="mb-2" style="text-align: justify; text-justify: inter-word;">
                Pengunjung mematuhi ketertiban dan ketentuan yang berlaku di Museum Penerangan selama sesi daring berlangsung. Ketentuan ini mencakup:
            </p>
            <ul class="mb-0" style="text-align: justify; text-justify: inter-word;">
                <li>peserta hadir tepat waktu 10 menit sebelum jadwal sesi dimulai;</li>
                <li>menonaktifkan mikrofon (mute) selama pemandu memberikan pemaparan;</li>
                <li>menggunakan format nama akun Zoom: <code>Instansi - Nama Peserta</code>;</li>
                <li>menggunakan fitur <em>Raise Hand</em> atau kolom pesan untuk bertanya dengan sopan;</li>
                <li>mengikuti arahan edukator dan pemandu museum hingga sesi berakhir.</li>
            </ul>
        </div>
    </div>

    <!-- Floating Green Button: Rencanakan Kunjunganmu (Canva Page 9) -->
    <div class="position-fixed bottom-0 end-0 p-4" style="z-index: 1050;">
        <a href="https://wa.me/628118132121?text=Halo%20Admin%20Museum%20Penerangan,%20saya%20ingin%20mengajukan%20Layanan%20Virtual%20Experience" target="_blank" class="btn btn-success px-4 py-3 fw-bold shadow d-flex align-items-center gap-2" style="border-radius: 0 !important; background-color: #22c55e; border-color: #22c55e;">
            <span>Rencanakan Kunjunganmu</span>
            <i class="fa-regular fa-calendar-check fs-5"></i>
        </a>
    </div>
</div>
@endsection
