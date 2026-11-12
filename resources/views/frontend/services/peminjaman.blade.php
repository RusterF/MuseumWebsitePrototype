@extends('layouts.canva')

@section('title', 'Peminjaman Gedung & Koleksi')

@section('content')
<div class="container py-4">
    <!-- Blue Title (Canva Page 10) -->
    <h2 class="title-blue mb-2">Peminjaman Gedung atau Koleksi</h2>
    <p class="text-secondary mb-4 canva-paragraph-justify" style="line-height: 1.85; font-size: 1.05rem;">
        Layanan peminjaman ruang kerja sama untuk kegiatan diseminasi (penyebaran) informasi publik. Ruang yang dapat dipinjam meliputi Ruang Serbaguna, Mini Teater, Amfiteater, Ruangan Relief, dan Halaman Gedung.
    </p>

    <!-- Section 1: Fasilitas Peminjaman Gedung (Canva Page 10) -->
    <div class="mb-5">
        <div class="d-flex align-items-center gap-2 mb-3">
            <span class="section-dot-marker"></span>
            <h4 class="fw-bold text-dark mb-0">Fasilitas Bangunan & Ruang Kerja Sama</h4>
        </div>

        <div class="row g-4 mb-4">
            <!-- 1. Amphiteater -->
            <div class="col-md-4 col-sm-6">
                <div class="card-canva p-3 h-100 shadow-sm d-flex flex-column" style="background-color: #FFFFFF;">
                    <div class="overflow-hidden mb-3 border" style="height: 190px; border-color: #E2E8F0 !important;">
                        <img src="{{ asset('images/WebMuspenBaruImages/Amphiteater.png') }}" alt="Amphiteater" class="w-100 h-100" style="object-fit: cover;">
                    </div>
                    <h5 class="fw-bold text-dark mb-2">Amphiteater</h5>
                    <div class="d-flex align-items-center gap-2 small text-primary mb-1">
                        <i class="fa-solid fa-location-dot"></i>
                        <span>Taman Terbuka Museum Penerangan</span>
                    </div>
                    <div class="d-flex align-items-center gap-2 small text-muted mt-auto pt-2 border-top">
                        <i class="fa-solid fa-users text-primary"></i>
                        <span>Kapasitas: <strong>100 Orang</strong></span>
                    </div>
                </div>
            </div>

            <!-- 2. Plaza -->
            <div class="col-md-4 col-sm-6">
                <div class="card-canva p-3 h-100 shadow-sm d-flex flex-column" style="background-color: #FFFFFF;">
                    <div class="overflow-hidden mb-3 border" style="height: 190px; border-color: #E2E8F0 !important;">
                        <img src="{{ asset('images/WebMuspenBaruImages/Plaza.png') }}" alt="Plaza" class="w-100 h-100" style="object-fit: cover;">
                    </div>
                    <h5 class="fw-bold text-dark mb-2">Plaza & Halaman Gedung</h5>
                    <div class="d-flex align-items-center gap-2 small text-primary mb-1">
                        <i class="fa-solid fa-location-dot"></i>
                        <span>Taman Depan Museum Penerangan</span>
                    </div>
                    <div class="d-flex align-items-center gap-2 small text-muted mt-auto pt-2 border-top">
                        <i class="fa-solid fa-users text-primary"></i>
                        <span>Kapasitas: <strong>100 Orang</strong></span>
                    </div>
                </div>
            </div>

            <!-- 3. Mini Theater -->
            <div class="col-md-4 col-sm-6">
                <div class="card-canva p-3 h-100 shadow-sm d-flex flex-column" style="background-color: #FFFFFF;">
                    <div class="overflow-hidden mb-3 border" style="height: 190px; border-color: #E2E8F0 !important;">
                        <img src="{{ asset('images/WebMuspenBaruImages/MiniTeater.png') }}" alt="Mini Theater" class="w-100 h-100" style="object-fit: cover;">
                    </div>
                    <h5 class="fw-bold text-dark mb-2">Mini Theater</h5>
                    <div class="d-flex align-items-center gap-2 small text-primary mb-1">
                        <i class="fa-solid fa-location-dot"></i>
                        <span>Lantai 1 Gedung Museum</span>
                    </div>
                    <div class="d-flex align-items-center gap-2 small text-muted mt-auto pt-2 border-top">
                        <i class="fa-solid fa-users text-primary"></i>
                        <span>Kapasitas: <strong>70 Orang</strong></span>
                    </div>
                </div>
            </div>

            <!-- 4. Ruang Serbaguna -->
            <div class="col-md-4 col-sm-6">
                <div class="card-canva p-3 h-100 shadow-sm d-flex flex-column" style="background-color: #FFFFFF;">
                    <div class="overflow-hidden mb-3 border" style="height: 190px; border-color: #E2E8F0 !important;">
                        <img src="{{ asset('images/WebMuspenBaruImages/RuangSerbaguna.png') }}" alt="Ruang Serbaguna" class="w-100 h-100" style="object-fit: cover;">
                    </div>
                    <h5 class="fw-bold text-dark mb-2">Ruang Serbaguna</h5>
                    <div class="d-flex align-items-center gap-2 small text-primary mb-1">
                        <i class="fa-solid fa-location-dot"></i>
                        <span>Lantai 2 Gedung Museum</span>
                    </div>
                    <div class="d-flex align-items-center gap-2 small text-muted mt-auto pt-2 border-top">
                        <i class="fa-solid fa-users text-primary"></i>
                        <span>Kapasitas: <strong>150 Orang</strong></span>
                    </div>
                </div>
            </div>

            <!-- 5. Ruang Rapat -->
            <div class="col-md-4 col-sm-6">
                <div class="card-canva p-3 h-100 shadow-sm d-flex flex-column" style="background-color: #FFFFFF;">
                    <div class="overflow-hidden mb-3 border" style="height: 190px; border-color: #E2E8F0 !important;">
                        <img src="{{ asset('images/WebMuspenBaruImages/RuangRapat.png') }}" alt="Ruang Rapat" class="w-100 h-100" style="object-fit: cover;">
                    </div>
                    <h5 class="fw-bold text-dark mb-2">Ruang Rapat & Ruang Relief</h5>
                    <div class="d-flex align-items-center gap-2 small text-primary mb-1">
                        <i class="fa-solid fa-location-dot"></i>
                        <span>Lantai 3 Gedung Museum</span>
                    </div>
                    <div class="d-flex align-items-center gap-2 small text-muted mt-auto pt-2 border-top">
                        <i class="fa-solid fa-users text-primary"></i>
                        <span>Kapasitas: <strong>50 Orang</strong></span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Ketentuan & Prosedur Peminjaman Gedung (Google Doc Section 5.3) -->
        <div class="row g-4">
            <div class="col-md-6">
                <div class="card-canva p-4 h-100 shadow-sm border-start border-4 border-primary" style="background-color: #F8FAFC;">
                    <h5 class="fw-bold text-dark mb-3"><i class="fa-solid fa-file-lines text-primary me-2"></i> Persyaratan Peminjaman Ruang:</h5>
                    <ol class="ps-3 mb-0 small text-secondary canva-paragraph-justify" style="line-height: 1.85;">
                        <li>Layanan ini diperuntukkan bagi masyarakat, komunitas, dan instansi/lembaga.</li>
                        <li>Surat permohonan peminjaman bangunan dan ruang kerja sama yang ditujukan kepada Kepala Museum Penerangan, dikirim paling lambat <strong>7 hari kerja</strong> sebelum waktu peminjaman bangunan dan ruang kerja sama.</li>
                        <li>Proposal kegiatan peminjaman bangunan dan ruang kerja sama. Kegiatan yang diajukan bertujuan untuk diseminasi (penyebaran) informasi publik.</li>
                    </ol>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card-canva p-4 h-100 shadow-sm border-start border-4 border-primary" style="background-color: #F8FAFC;">
                    <h5 class="fw-bold text-dark mb-3"><i class="fa-solid fa-list-check text-primary me-2"></i> Prosedur Peminjaman Ruang:</h5>
                    <ol class="ps-3 mb-0 small text-secondary canva-paragraph-justify" style="line-height: 1.85;">
                        <li>Pemohon berkoordinasi dengan petugas Tata Usaha Museum Penerangan untuk menanyakan ketersediaan ruangan.</li>
                        <li>Pemohon melihat langsung (survei) ruangan yang akan digunakan.</li>
                        <li>Pemohon mengirimkan surat permohonan peminjaman beserta proposal kegiatan kepada Kepala Museum Penerangan.</li>
                        <li>Petugas memeriksa dan memverifikasi proposal kegiatan dan meminta persetujuan Kepala Museum Penerangan.</li>
                        <li>Pemohon mendapatkan surat balasan pengajuan layanan peminjaman bangunan dan ruang kerja sama.</li>
                        <li>Pengguna layanan mempersiapkan ruangan dan melakukan gladi resik satu hari sebelum hari pelaksanaan, dengan berkoordinasi bersama petugas.</li>
                    </ol>
                </div>
            </div>
            <div class="col-12">
                <div class="card-canva p-3 bg-white border d-flex align-items-center gap-3" style="border-color: #E2E8F0 !important;">
                    <span class="badge-canva-success fs-6 px-3 py-1 fw-bold flex-shrink-0">Biaya / Tarif: Gratis</span>
                    <span class="small text-secondary">Tidak dipungut biaya. Catatan: jika pemohon membutuhkan tambahan di luar sarana, prasarana, dan fasilitas yang sudah tersedia, biayanya ditanggung oleh pemohon.</span>
                </div>
            </div>
        </div>
    </div>

    <hr class="my-5 text-muted opacity-25">

    <!-- Section 2: Peminjaman Koleksi (Google Doc Section 5.4 & Canva Page 10) -->
    <div class="mb-5">
        <div class="d-flex align-items-center gap-2 mb-3">
            <span class="section-dot-marker"></span>
            <h4 class="fw-bold text-dark mb-0">Informasi dan Layanan Khusus Peminjaman Koleksi</h4>
        </div>

        <div class="row align-items-center g-4 mb-4">
            <div class="col-md-5">
                <div class="card-canva p-2 shadow-sm overflow-hidden border" style="border-color: #E2E8F0 !important;">
                    <img src="{{ asset('images/WebMuspenBaruImages/PeminjamanKoleksi.png') }}" alt="Peminjaman Koleksi Museum Penerangan" class="img-fluid w-100" style="object-fit: cover;">
                </div>
            </div>
            <div class="col-md-7">
                <p class="service-desc-text text-secondary canva-paragraph-justify mb-3" style="line-height: 1.85; font-size: 1rem;">
                    Layanan peminjaman koleksi Museum Penerangan selama jangka waktu yang telah disepakati, disertai data dan informasi koleksi serta pendampingan teknis apabila diperlukan. Layanan ini diperuntukkan kepada <strong>Instansi Pemerintah, Lembaga Pendidikan, Museum dan Komunitas, Peneliti dan Akademisi, Media dan Industri Kreatif, serta Pihak Lain dengan Persetujuan Khusus</strong>.
                </p>
                <div class="card-canva p-3 border-start border-4 border-warning" style="background-color: #F8FAFC;">
                    <small class="text-muted d-block fw-semibold mb-1"><i class="fa-solid fa-shield-halved me-1 text-warning"></i> Standar Keamanan & Pelestarian:</small>
                    <span class="small text-dark">Peminjaman artefak bersejarah wajib memenuhi protokol kuratorial ketat, kesesuaian suhu/kelembapan, serta jaminan keselamatan objek.</span>
                </div>
            </div>
        </div>

        <!-- Persyaratan & Prosedur Peminjaman Koleksi (Google Doc Section 5.4) -->
        <div class="row g-4">
            <div class="col-md-6">
                <div class="card-canva p-4 h-100 shadow-sm border-start border-4 border-warning" style="background-color: #F8FAFC;">
                    <h5 class="fw-bold text-dark mb-3"><i class="fa-solid fa-clipboard-check text-warning me-2"></i> Persyaratan Peminjaman Koleksi:</h5>
                    <ol class="ps-3 mb-0 small text-secondary canva-paragraph-justify" style="line-height: 1.85;">
                        <li>Surat permohonan resmi yang ditujukan kepada Kepala Museum Penerangan. Surat harus menyebutkan tujuan peminjaman, jenis koleksi yang dipinjam, waktu peminjaman, dan rencana penggunaan koleksi.</li>
                        <li>Surat permohonan peminjaman koleksi dikirimkan paling lambat <strong>14 hari kerja</strong> sebelum waktu peminjaman koleksi.</li>
                        <li>Identitas pemohon:
                            <ul class="ps-3 mb-1">
                                <li><strong>Perorangan:</strong> fotokopi KTP dan surat keterangan dari instansi/lembaga terkait.</li>
                                <li><strong>Lembaga:</strong> profil lembaga dan identitas penanggung jawab kegiatan.</li>
                            </ul>
                        </li>
                        <li>Surat rekomendasi dari instansi terkait (terutama dibutuhkan untuk kegiatan akademik, penelitian, atau pameran bersama).</li>
                        <li>Asuransi atau jaminan keamanan koleksi, yang biayanya ditanggung oleh peminjam (berlaku untuk koleksi bernilai sejarah tinggi/langka/rapuh atau perjalanan jarak jauh/luar kota).</li>
                        <li>Dokumentasi teknis yang berisi desain ruang pamer atau penempatan koleksi, sistem keamanan, suhu/kelembapan ruangan, serta tata cara pengemasan saat dikirim dan dikembalikan.</li>
                    </ol>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card-canva p-4 h-100 shadow-sm border-start border-4 border-warning" style="background-color: #F8FAFC;">
                    <h5 class="fw-bold text-dark mb-3"><i class="fa-solid fa-list-ol text-warning me-2"></i> Prosedur Peminjaman Koleksi:</h5>
                    <ol class="ps-3 mb-0 small text-secondary canva-paragraph-justify" style="line-height: 1.85;">
                        <li>Pemohon mengajukan dokumen permohonan peminjaman koleksi kepada Kepala Museum Penerangan sesuai persyaratan.</li>
                        <li>Museum Penerangan memeriksa kelengkapan dokumen.</li>
                        <li>Tim Pengelolaan Koleksi memeriksa kondisi koleksi, melakukan evaluasi, dan pengarsipan kuratorial.</li>
                        <li>Museum Penerangan berhak:
                            <ul class="ps-3 mb-0">
                                <li>Menunda atau menolak permohonan jika dokumen tidak lengkap atau koleksi tidak memenuhi syarat untuk dipinjamkan.</li>
                                <li>Menolak permohonan yang tidak sesuai dengan visi dan misi Museum Penerangan.</li>
                            </ul>
                        </li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <!-- Call Center Footer Info (Canva Page 10) -->
    <div class="card-canva p-4 shadow-sm mb-4" style="background-color: #F8FAFC;">
        <div class="d-flex align-items-center justify-content-between flex-wrap gap-3">
            <div>
                <h6 class="fw-bold text-dark mb-1">Informasi & Reservasi Peminjaman Ruang / Koleksi</h6>
                <div class="text-secondary small">Konsultasikan jadwal, ketersediaan ruangan, dan tata tertib peminjaman bersama petugas kami.</div>
            </div>
            <a href="https://wa.me/628118132121?text=Halo%20Admin%20Museum%20Penerangan,%20saya%20ingin%20berkonsultasi%20tentang%20Peminjaman%20Gedung/Koleksi" target="_blank" rel="noopener noreferrer" class="btn btn-success px-4 py-2 fw-semibold d-inline-flex align-items-center gap-2" style="background-color: #22c55e; border-color: #22c55e;">
                <i class="fa-brands fa-whatsapp fs-5"></i>
                <span>Call Center (+62 811 813 2121)</span>
            </a>
        </div>
    </div>
</div>
@endsection
