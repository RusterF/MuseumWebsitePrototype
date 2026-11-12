@extends('layouts.canva')

@section('title', 'Layanan Kunjungan Museum')

@section('content')
<div class="container py-4 position-relative">
    <!-- Blue Title (Canva Page 8) -->
    <h2 class="title-blue mb-2">Kunjungan Museum</h2>
    <p class="text-secondary mb-4 canva-paragraph-justify" style="line-height: 1.85; font-size: 1.05rem;">
        Layanan edukasi dan informasi tentang koleksi Museum Penerangan bagi masyarakat yang datang langsung berkunjung ke museum.
    </p>

    <!-- Hero Banner Photo: Children with Museum Guide (Canva Page 8) -->
    <div class="mb-5 overflow-hidden shadow-sm border" style="border-color: #E2E8F0 !important;">
        <img src="{{ asset('images/WebMuspenBaruImages/KunjunganMuseum.png') }}" alt="Kunjungan Museum Penerangan" class="w-100 h-auto d-block">
    </div>

    <!-- 1. Jam Operasional (Google Doc Section 5.1 & Canva Page 8) -->
    <div class="card-canva p-4 mb-4 shadow-sm" style="background-color: #F8FAFC;">
        <div class="d-flex align-items-center gap-2 mb-2">
            <span class="section-dot-marker"></span>
            <h5 class="fw-bold text-dark mb-0">Jam Operasional</h5>
        </div>
        <div class="ps-3 text-secondary" style="line-height: 1.8; font-size: 0.95rem;">
            <div><i class="fa-regular fa-clock me-2 text-primary"></i> <strong>Setiap Hari:</strong> pukul 09.00 - 15.00 WIB</div>
            <div><i class="fa-solid fa-mug-hot me-2 text-muted"></i> <strong>Istirahat:</strong> pukul 12.00 - 13.00 WIB</div>
            <div class="text-muted fst-italic small mt-1">(Informasi tutup akan diumumkan pada media sosial Museum Penerangan)</div>
        </div>
    </div>

    <!-- 2. Harga Tiket Masuk (Google Doc Section 5.1 & Canva Page 8) -->
    <div class="card-canva p-4 mb-4 shadow-sm" style="background-color: #F8FAFC;">
        <div class="d-flex align-items-center gap-2 mb-2">
            <span class="section-dot-marker"></span>
            <h5 class="fw-bold text-dark mb-0">Harga Tiket Masuk</h5>
        </div>
        <div class="ps-3 text-secondary" style="font-size: 0.95rem;">
            <span class="badge-canva-success fs-6 px-3 py-1 fw-bold">Gratis</span>
            <span class="ms-2 small text-muted">Tidak dipungut biaya retribusi masuk ke dalam museum.</span>
        </div>
    </div>

    <!-- 3. Prosedur Berkunjung (Google Doc Section 5.1) -->
    <div class="card-canva p-4 mb-4 shadow-sm">
        <div class="d-flex align-items-center gap-2 mb-3">
            <span class="section-dot-marker"></span>
            <h5 class="fw-bold text-dark mb-0">Prosedur Berkunjung</h5>
        </div>
        <div class="ps-3 text-secondary" style="font-size: 0.98rem; line-height: 1.85;">
            <!-- Kunjungan Individu -->
            <div class="mb-4">
                <h6 class="fw-bold text-dark mb-2"><i class="fa-solid fa-user me-2 text-primary"></i> Kunjungan Individu:</h6>
                <ol class="ps-3 mb-0 canva-paragraph-justify">
                    <li>Pengunjung datang langsung ke Museum Penerangan.</li>
                    <li>Pengunjung mengisi buku tamu elektronik (e-guestbook) pada tablet yang tersedia di meja resepsionis.</li>
                </ol>
            </div>

            <!-- Kunjungan Rombongan -->
            <div>
                <h6 class="fw-bold text-dark mb-2"><i class="fa-solid fa-users me-2 text-primary"></i> Kunjungan Rombongan:</h6>
                <ol class="ps-3 mb-0 canva-paragraph-justify">
                    <li>Rombongan melakukan reservasi dan memastikan jadwal kunjungan melalui call center Museum Penerangan di <strong>0811 813 2121</strong>.</li>
                    <li>Kunjungan Rombongan dinyatakan terdaftar setelah petugas call center mengonfirmasi reservasi melalui WhatsApp.</li>
                    <li>Untuk Kunjungan Rombongan yang melakukan survei, penentuan jadwal bisa dilakukan secara langsung di lokasi dan tetap harus melakukan reservasi lewat call center. Jika dalam waktu 2x24 jam (2 hari) reservasi belum dilakukan, jadwal kunjungan dibatalkan.</li>
                    <li>Rombongan datang sesuai jadwal dan mendapat layanan informasi serta pendampingan edukator.</li>
                    <li>Rombongan yang datang terlambat dapat dilayani sesuai dengan waktu yang tersedia.</li>
                </ol>
            </div>
        </div>
    </div>

    <!-- 4. Tata Tertib Berkunjung (Google Doc Section 5.1) -->
    <div class="card-canva p-4 mb-5 shadow-sm">
        <div class="d-flex align-items-center gap-2 mb-3">
            <span class="section-dot-marker"></span>
            <h5 class="fw-bold text-dark mb-0">Tata Tertib Berkunjung</h5>
        </div>
        <div class="ps-3 text-secondary canva-paragraph-justify" style="line-height: 1.85; font-size: 0.98rem;">
            <p class="mb-2">
                Pengunjung mematuhi ketertiban dan ketentuan yang berlaku di Museum Penerangan selama kunjungan ke ruang pamer. Ketentuan ini mencakup:
            </p>
            <ol class="ps-3 mb-0">
                <li>Menitipkan barang bawaan di tempat yang telah disediakan;</li>
                <li>Dilarang membawa makanan dan minuman di dalam ruang pamer;</li>
                <li>Tidak bersandar atau menduduki kaca pelindung dan display koleksi;</li>
                <li>Tidak menyentuh koleksi (kecuali alat peraga yang memiliki tanda khusus);</li>
                <li>Tidak mencoret atau merusak properti Museum Penerangan;</li>
                <li>Tidak merokok/vape di dalam ruang pamer;</li>
                <li>Mengikuti alur kunjungan yang telah ditentukan oleh Museum Penerangan;</li>
                <li>Pengunjung diperbolehkan untuk melakukan pengambilan gambar atau rekaman selama tidak untuk penggunaan komersial dan tidak mengganggu alur kunjungan;</li>
                <li>Pengunjung yang melakukan pengambilan gambar atau rekaman untuk penggunaan komersial perlu mendapatkan persetujuan Museum Penerangan. Petugas Museum Penerangan wajib memastikan tujuan pengambilan gambar atau rekaman yang dilakukan oleh pengunjung apabila menggunakan kamera profesional.</li>
            </ol>
        </div>
    </div>

    <!-- Floating / Sticky Button: Rencanakan Kunjunganmu -->
    <div class="position-fixed bottom-0 end-0 p-3 p-md-4" style="z-index: 1050;">
        <a href="https://wa.me/628118132121?text=Halo%20Admin%20Museum%20Penerangan,%20saya%20ingin%20melakukan%20Reservasi%20Kunjungan%20Museum" target="_blank" rel="noopener noreferrer" class="btn btn-success px-4 py-3 fw-bold shadow-lg d-flex align-items-center gap-2" style="background-color: #22c55e; border-color: #22c55e;">
            <i class="fa-brands fa-whatsapp fs-5"></i>
            <span>Reservasi Kunjungan</span>
        </a>
    </div>
</div>
@endsection
