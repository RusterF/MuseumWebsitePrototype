@extends('layouts.canva')

@section('title', 'Tentang Museum Penerangan')

@section('content')
<div class="container py-4">
    <!-- Top Hero Image: Facade of Museum Penerangan (Canva Page 2) -->
    <div class="mb-2">
        <img src="{{ asset('images/WebMuspenBaruImages/GedungMuspenTentang.png') }}" alt="Gedung Museum Penerangan" class="img-fluid w-100" style="max-height: 440px; object-fit: cover; object-position: center bottom;">
        <div class="text-end text-muted small mt-1">Gedung Museum Penerangan, 2025</div>
    </div>

    <hr class="my-4 text-muted opacity-25">

    <!-- 1. Profil Museum Penerangan (Canva Page 2) -->
    <div class="mb-5">
        <h2 class="title-blue mb-4">Profil Museum Penerangan</h2>
        <div class="about-profil-text" style="line-height: 1.85; font-size: 1.02rem; color: #1E293B; text-align: justify; text-justify: inter-word;">
            <p>
                Museum Penerangan adalah unit pelaksana teknis di lingkungan Direktorat Jenderal Informasi dan Komunikasi Publik Kementerian Komunikasi dan Digital RI yang bertugas melestarikan memori kolektif dan warisan sejarah perjalanan media informasi serta komunikasi di Indonesia. Berdiri megah di atas lahan seluas 2,4 hektar di dalam kawasan Taman Mini Indonesia Indah (TMII), Jakarta Timur, museum ini menjadi wahana edukasi publik yang merekam dinamika penyebaran informasi dari masa tradisional hingga era kecerdasan buatan.
            </p>
            <p>
                Melalui ribuan koleksi artefak penyiaran, diorama sejarah, perangkat percetakan pers pejuang kemerdekaan, studio interaktif, serta wahana multimedia cerdas, Museum Penerangan menyajikan perjalanan panjang para juru penerang dalam merajut persatuan dan mencerdaskan kehidupan seluruh rakyat Nusantara.
            </p>
            <p>
                Di era transformasi digital saat ini, Museum Penerangan terus berinovasi menjadi SMART Museum yang inklusif, ramah bagi seluruh kalangan, anak-anak, pelajar, mahasiswa, akademisi, hingga penyandang disabilitas, guna menyongsong masa depan literasi informasi bangsa yang berintegritas.
            </p>
        </div>
    </div>

    <hr class="my-5 text-muted opacity-25">

    <!-- 2. Sejarah Museum Penerangan (Canva Page 2) -->
    <div class="mb-5">
        <h2 class="title-blue mb-4">Sejarah Museum Penerangan</h2>

        <!-- Block 1: Ikada Photo on Left, Text on Right -->
        <div class="row align-items-center g-4 mb-4">
            <div class="col-md-5">
                <img src="{{ asset('images/WebMuspenBaruImages/SejarahMuseumPenerangan1.png') }}" alt="Rapat Raksasa Lapangan Ikada 1945" class="img-fluid w-100 shadow-sm" style="border: 1px solid #e2e8f0;">
            </div>
            <div class="col-md-7">
                <h4 class="fw-bold mb-2" style="color: #1E293B;">Perjalanan Waktu Layanan Informasi dan Komunikasi</h4>
                <p class="about-sejarah-text mb-0" style="line-height: 1.8; color: #1E293B; text-align: justify; text-justify: inter-word;">
                    Gagasan pendirian museum bertema komunikasi di Indonesia bermula dari kesadaran mendalam akan peranan vital informasi dan media dalam menjaga kedaulatan bangsa. Peristiwa bersejarah seperti Rapat Raksasa di Lapangan Ikada 19 September 1945 dan siaran radio perjuangan membuktikan bahwa penyebaran berita yang cepat dan akurat adalah kunci kemerdekaan Indonesia.
                </p>
            </div>
        </div>

        <!-- Block 2: Text on Left, Vintage Deppen Truck on Right -->
        <div class="row align-items-center g-4">
            <div class="col-md-7">
                <p class="about-sejarah-text mb-0" style="line-height: 1.8; color: #1E293B; text-align: justify; text-justify: inter-word;">
                    Pada tanggal <strong>20 April 1993</strong>, bertepatan dengan HUT TMII ke-18, Presiden Republik Indonesia Ke-2, <strong>H.M. Soeharto</strong>, atas prakarsa Ibu <strong>Hj. Tien Soeharto</strong>, meresmikan Museum Penerangan untuk umum. Gedung museum dirancang dengan arsitektur berbentuk lidah api obor obelisk dan bintang bertransmisi, merefleksikan kobaran semangat juru penerang yang senantiasa menerangi pemikiran masyarakat nusantara dari Sabang sampai Merauke.
                </p>
            </div>
            <div class="col-md-5">
                <img src="{{ asset('images/WebMuspenBaruImages/SejarahMuseumPenerangan2.png') }}" alt="Mobil Penerangan Departemen Penerangan" class="img-fluid w-100 shadow-sm" style="border: 1px solid #e2e8f0;">
            </div>
        </div>
    </div>

    <hr class="my-5 text-muted opacity-25">

    <!-- 3. Struktur Organisasi (Canva Page 2) -->
    <div class="mb-5">
        <h2 class="title-blue mb-4">Struktur Organisasi</h2>

        <!-- Top: Kepala Museum (Canva Page 2 exact layout) -->
        <div class="text-center mb-4">
            <div class="d-inline-block text-center">
                <img src="{{ asset('images/WebMuspenBaruImages/Rizki Andono Prakoso.png') }}" alt="Rizki Andono Prakoso" style="height: 180px; width: auto; object-fit: contain;" class="mb-2">
                <h5 class="fw-bold mb-1" style="color: #1E293B;">Rizki Andono Prakoso</h5>
                <div class="fw-semibold" style="color: var(--canva-accent-blue); font-size: 0.95rem;">Kepala Museum Penerangan</div>
            </div>
        </div>

        <!-- Bottom: 3 Pejabat (Yuliah, Yuri Arief, Vetri Ridha - Canva Page 2 exact layout) -->
        <div class="row g-4 text-center justify-content-center">
            <!-- Left: Yuliah -->
            <div class="col-md-4">
                <div class="d-inline-block text-center">
                    <img src="{{ asset('images/WebMuspenBaruImages/Yuliah.png') }}" alt="Yuliah" style="height: 180px; width: auto; object-fit: contain;" class="mb-2">
                    <h5 class="fw-bold mb-1" style="color: #1E293B;">Yuliah</h5>
                    <div class="fw-semibold" style="color: var(--canva-accent-blue); font-size: 0.95rem;">Kepala Sub Bagian Tata Usaha</div>
                </div>
            </div>

            <!-- Center: Yuri Arief Waspodo -->
            <div class="col-md-4">
                <div class="d-inline-block text-center">
                    <img src="{{ asset('images/WebMuspenBaruImages/Yuri Arief Waspodo.png') }}" alt="Yuri Arief Waspodo" style="height: 180px; width: auto; object-fit: contain;" class="mb-2">
                    <h5 class="fw-bold mb-1" style="color: #1E293B;">Yuri Arief Waspodo</h5>
                    <div class="fw-semibold" style="color: var(--canva-accent-blue); font-size: 0.95rem;">Ketua Tim Pengelolaan Koleksi</div>
                </div>
            </div>

            <!-- Right: Vetri Ridha Bhineka -->
            <div class="col-md-4">
                <div class="d-inline-block text-center">
                    <img src="{{ asset('images/WebMuspenBaruImages/Vetri Ridha Bhineka.png') }}" alt="Vetri Ridha Bhineka" style="height: 180px; width: auto; object-fit: contain;" class="mb-2">
                    <h5 class="fw-bold mb-1" style="color: #1E293B;">Vetri Ridha Bhineka</h5>
                    <div class="fw-semibold" style="color: var(--canva-accent-blue); font-size: 0.95rem;">Ketua Tim Pelayanan Publik</div>
                </div>
            </div>
        </div>
    </div>

    <hr class="my-5 text-muted opacity-25">

    <!-- 4. Visi & Misi (Canva Page 2) -->
    <div class="mb-5">
        <h2 class="title-blue mb-4">Visi & Misi</h2>
        <div class="row align-items-center g-4">
            <div class="col-md-4 text-center">
                <img src="{{ asset('images/color-logo.png') }}" alt="Muspen - Saksi Perubahan Generasi" class="img-fluid" style="max-height: 120px; object-fit: contain;">
            </div>
            <div class="col-md-8">
                <div class="mb-3">
                    <h5 class="fw-bold mb-1" style="color: #1E293B;">Visi</h5>
                    <p class="fst-italic mb-0" style="color: #1E293B;">
                        “Menjadi SMART Museum yang edukatif, inklusif, dan inovatif.”
                    </p>
                </div>
                <div>
                    <h5 class="fw-bold mb-1" style="color: #1E293B;">Misi</h5>
                    <ol class="ps-3 mb-0" style="line-height: 1.8; color: #1E293B;">
                        <li>Mewujudkan tata kelola kelembagaan museum yang berintegritas, akuntabel, dan berkelanjutan.</li>
                        <li>Mengelola dan melestarikan koleksi sejarah komunikasi bangsa secara profesional dan berstandar internasional.</li>
                        <li>Meningkatkan kualitas pelayanan publik prima yang berorientasi pada kepuasan pengunjung.</li>
                        <li>Memperluas jejaring kolaborasi dan kemitraan strategis untuk pengembangan pengetahuan komunikasi publik.</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <hr class="my-5 text-muted opacity-25">

    <!-- 5. Standar Maklumat Pelayanan (Canva Page 2) -->
    <div class="mb-5">
        <h2 class="title-blue mb-4">Standar Maklumat Pelayanan</h2>
        <div class="row align-items-center g-4">
            <div class="col-md-8">
                <p class="about-maklumat-text mb-3" style="line-height: 1.85; color: #1E293B; text-align: justify; text-justify: inter-word;">
                    Dalam rangka mewujudkan penyelenggaraan pelayanan publik sesuai dengan asas penyelenggaraan pemerintahan yang baik dan guna mewujudkan kepastian hak dan kewajiban berbagai pihak yang terkait degan penyelenggaraan pelayanan, Museum Penerangan menyusun sebuah pernyataan kesanggupan penyelenggara dalam melaksanakan pelayanan sesuai dengan standar pelayaan atau maklumat pelayanan.
                </p>
                <a href="{{ asset('images/WebMuspenBaruImages/GedungMuspenTentang.png') }}" download="Maklumat-Pelayanan-Museum-Penerangan.pdf" class="fw-bold text-decoration-none" style="color: var(--canva-accent-blue); font-size: 0.95rem;">
                    Unduh Dokumen &rarr;
                </a>
            </div>
            <div class="col-md-4 text-center">
                <img src="{{ asset('images/WebMuspenBaruImages/LogoFolder.png') }}" alt="Standar Maklumat Pelayanan" style="max-height: 140px;" class="img-fluid">
            </div>
        </div>
    </div>

    <hr class="my-5 text-muted opacity-25">

    <!-- 6. Induk Asosiasi (Canva Page 2) -->
    <div class="mb-5">
        <h2 class="title-blue mb-4">Induk Asosiasi</h2>
        <div class="row align-items-center g-4">
            <div class="col-md-4 text-center">
                <img src="{{ asset('images/WebMuspenBaruImages/LogoKomdigi.png') }}" alt="Kementerian Komunikasi dan Digital RI" class="img-fluid" style="max-height: 130px;">
            </div>
            <div class="col-md-8">
                <p class="about-asosiasi-text mb-0" style="line-height: 1.85; color: #1E293B; text-align: justify; text-justify: inter-word;">
                    Museum Penerangan adalah unit pelaksana teknis di lingkungan Direktorat Jenderal Informasi dan Komunikasi Publik yang berada di bawah dan bertanggungjawab kepada Direktur Jenderal Informasi dan Komunikasi Publik, secara administratif dibina oleh Sekretaris Direktorat Jenderal Informasi dan Komunikasi Publik. Hal ini diatur dan ditetapkan dalam <strong>PERMENKOMINFO NO. 05/PER/M.KOMINFO/03/2011 TAHUN 2011, LL. KEMKOMINFO: 5 HLM</strong>. Bahwa dengan ditetapkannya Peraturan Menteri Komunikasi dan Informatika ini tentang Organisasi dan Tata Kerja Kementerian Komunikasi dan Informatika, maka dipandang perlu untuk melakukan penataan organisasi dan tata kerja museum penerangan.
                </p>
            </div>
        </div>
    </div>
</div>
@endsection
