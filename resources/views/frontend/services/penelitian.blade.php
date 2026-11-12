@extends('layouts.canva')

@section('title', 'Layanan Penelitian Ilmiah Individu dan Kelompok')

@section('content')
<div class="container py-4 position-relative">
    <!-- Blue Title (Canva Page 11 & Google Doc Section 5.5) -->
    <h2 class="title-blue mb-2">Layanan Penelitian Ilmiah Individu dan Kelompok</h2>
    <p class="text-secondary mb-4 canva-paragraph-justify" style="line-height: 1.85; font-size: 1.05rem;">
        Layanan akses data koleksi museum serta dukungan teknis dan informasi yang berkaitan dengan penelitian.
    </p>

    <!-- Top Row: Photo on Left, Description on Right (Canva Page 11) -->
    <div class="row align-items-center g-4 mb-5">
        <div class="col-md-6">
            <div class="card-canva p-2 shadow-sm overflow-hidden border" style="border-color: #E2E8F0 !important;">
                <img src="{{ asset('images/WebMuspenBaruImages/PenelitianIlmiah.png') }}" alt="Penelitian Ilmiah Museum Penerangan" class="img-fluid w-100" style="object-fit: cover;">
            </div>
        </div>
        <div class="col-md-6">
            <p class="service-desc-text text-secondary canva-paragraph-justify mb-3" style="line-height: 1.85; font-size: 0.98rem;">
                Museum Penerangan memfasilitasi kebutuhan penelitian ilmiah bagi pelajar, mahasiswa jenjang sarjana maupun pascasarjana, dosen, serta peneliti independen. Layanan ini mencakup penyediaan akses data artefak bersejarah, wawancara bersama kurator dan staf teknis konservasi, penelusuran dokumen arsip komunikasi dan penerangan, serta pendampingan langsung di lingkungan museum.
            </p>
            <div class="card-canva p-3 bg-white border d-flex align-items-center gap-2" style="border-color: #E2E8F0 !important;">
                <span class="badge-canva-success fs-6 px-3 py-1 fw-bold flex-shrink-0">Biaya / Tarif: Gratis</span>
                <span class="small text-muted">Layanan penelitian tidak dipungut biaya retribusi.</span>
            </div>
        </div>
    </div>

    <!-- 1. Persyaratan Penelitian (Google Doc Section 5.5) -->
    <div class="card-canva p-4 mb-4 shadow-sm border-start border-4 border-primary" style="background-color: #F8FAFC;">
        <div class="d-flex align-items-center gap-2 mb-3">
            <span class="section-dot-marker"></span>
            <h5 class="fw-bold text-dark mb-0">Persyaratan Pengajuan Penelitian</h5>
        </div>
        <ol class="ps-3 mb-0 text-secondary canva-paragraph-justify" style="line-height: 1.85; font-size: 0.95rem;">
            <li>Surat permohonan penelitian dari institusi/lembaga yang ditujukan kepada Kepala Museum Penerangan, yang memuat:
                <ul class="ps-3 my-1">
                    <li>Tujuan dan judul penelitian;</li>
                    <li>Identitas peneliti (nama lengkap, institusi, program studi/jurusan);</li>
                    <li>Waktu dan durasi pelaksanaan penelitian;</li>
                    <li>Daftar kebutuhan dan permintaan khusus, seperti: akses koleksi, wawancara narasumber, dokumentasi visual, dan lain-lain.</li>
                </ul>
            </li>
            <li>Identitas pemohon yang sah (KTM / Kartu Pelajar / KTP / Paspor).</li>
        </ol>
    </div>

    <!-- 2. Prosedur Penelitian (Google Doc Section 5.5) -->
    <div class="card-canva p-4 mb-5 shadow-sm">
        <div class="d-flex align-items-center gap-2 mb-3">
            <span class="section-dot-marker"></span>
            <h5 class="fw-bold text-dark mb-0">Prosedur Pelaksanaan Penelitian</h5>
        </div>
        <ol class="service-rules-text ps-4 text-secondary mb-0 canva-paragraph-justify" style="line-height: 1.85; font-size: 0.98rem;">
            <li>Calon peneliti mengajukan permohonan penelitian dengan melampirkan surat permohonan beserta identitas diri (KTM/Kartu Pelajar/KTP/Paspor) yang dikirimkan paling lambat <strong>5 hari kerja</strong> sebelum penelitian dilaksanakan.</li>
            <li>Museum Penerangan memverifikasi dokumen dengan memeriksa kelengkapannya dan kesesuaian tema penelitian.</li>
            <li>Setelah dokumen terverifikasi, Museum Penerangan menerbitkan <strong>Surat Izin Penelitian</strong>.</li>
            <li>Peneliti melaksanakan penelitian sesuai jadwal, mengikuti pendampingan dari petugas, dan mematuhi aturan serta tata tertib museum.</li>
            <li>Peneliti menyerahkan hasil penelitian dalam bentuk <em>softcopy</em> atau <em>hardcopy</em> sebagai arsip museum dan bahan masukan untuk pengembangan museum.</li>
            <li>Setelah penelitian selesai, Museum Penerangan menerbitkan <strong>Surat Keterangan Selesai Penelitian</strong>.</li>
        </ol>
    </div>

    <!-- Floating / Sticky Button: Rencanakan Kunjunganmu (Canva Page 11) -->
    <div class="position-fixed bottom-0 end-0 p-3 p-md-4" style="z-index: 1050;">
        <a href="https://wa.me/628118132121?text=Halo%20Admin%20Museum%20Penerangan,%20saya%20ingin%20mengajukan%20Layanan%20Penelitian%20Ilmiah" target="_blank" rel="noopener noreferrer" class="btn btn-success px-4 py-3 fw-bold shadow-lg d-flex align-items-center gap-2" style="background-color: #22c55e; border-color: #22c55e;">
            <i class="fa-brands fa-whatsapp fs-5"></i>
            <span>Konsultasi Penelitian (WA)</span>
        </a>
    </div>
</div>
@endsection
