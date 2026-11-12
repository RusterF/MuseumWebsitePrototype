@extends('layouts.canva')

@section('title', 'Tentang Museum Penerangan')

@section('content')
<div class="container py-4">
    <!-- Top Hero Image: Facade of Museum Penerangan (Canva Page 2) -->
    <figure class="mb-4">
        <img src="{{ asset('images/WebMuspenBaruImages/GedungMuspenTentang.png') }}" alt="Gedung Museum Penerangan" class="img-fluid w-100 shadow-sm" style="max-height: 440px; object-fit: cover; object-position: center bottom;">
        <figcaption class="text-end text-muted small mt-2">Gedung Museum Penerangan, Taman Mini Indonesia Indah</figcaption>
    </figure>

    <hr class="my-4 text-muted opacity-25">

    <!-- 1. Profil Museum Penerangan (Canva Page 2) -->
    <div class="mb-5">
        <h2 class="title-blue mb-4">Profil Museum Penerangan</h2>
        <div class="about-profil-text text-dark canva-paragraph-justify" style="font-size: 1.02rem; line-height: 1.85;">
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

    <!-- 2. Perjalanan Waktu Layanan Informasi dan Komunikasi (Canva Page 2) -->
    <div class="mb-5">
        <h2 class="title-blue mb-4">Perjalanan Waktu Layanan Informasi dan Komunikasi</h2>

        <!-- Milestone 1: Tahun 1945 -->
        <div class="card-canva p-4 p-md-5 mb-4 shadow-sm" style="background-color: #FFFFFF;">
            <div class="row align-items-center g-4">
                <div class="col-lg-5 col-md-6">
                    <div class="overflow-hidden border shadow-sm" style="border-color: #E2E8F0 !important;">
                        <img src="{{ asset('images/WebMuspenBaruImages/SejarahMuseumPenerangan1.png') }}" alt="Rapat Raksasa Lapangan Ikada 1945" class="img-fluid w-100" style="height: 260px; object-fit: cover;">
                    </div>
                </div>
                <div class="col-lg-7 col-md-6">
                    <h4 class="fw-bold text-dark mb-3" style="font-size: 1.3rem; line-height: 1.4;">
                        Penyebaran Informasi dan Perjuangan Kedaulatan Bangsa
                    </h4>
                    <p class="about-sejarah-text text-dark canva-paragraph-justify mb-0" style="font-size: 1.02rem; line-height: 1.85;">
                        Gagasan pendirian museum bertema komunikasi di Indonesia bermula dari kesadaran mendalam akan peranan vital informasi dan media dalam menjaga kedaulatan bangsa. Peristiwa bersejarah seperti Rapat Raksasa di Lapangan Ikada 19 September 1945 dan siaran radio perjuangan membuktikan bahwa penyebaran berita yang cepat dan akurat adalah kunci kemerdekaan Indonesia.
                    </p>
                </div>
            </div>
        </div>

        <!-- Milestone 2: Tahun 1993 -->
        <div class="card-canva p-4 p-md-5 shadow-sm" style="background-color: #FFFFFF;">
            <div class="row align-items-center g-4">
                <div class="col-lg-7 col-md-6">
                    <h4 class="fw-bold text-dark mb-3" style="font-size: 1.3rem; line-height: 1.4;">
                        Peresmian Museum Penerangan di TMII Jakarta
                    </h4>
                    <p class="about-sejarah-text text-dark canva-paragraph-justify mb-0" style="font-size: 1.02rem; line-height: 1.85;">
                        Pada tanggal <strong>20 April 1993</strong>, bertepatan dengan HUT TMII ke-18, Presiden Republik Indonesia Ke-2, <strong>H.M. Soeharto</strong>, atas prakarsa Ibu <strong>Hj. Tien Soeharto</strong>, meresmikan Museum Penerangan untuk umum. Gedung museum dirancang dengan arsitektur berbentuk lidah api obor obelisk dan bintang bertransmisi, merefleksikan kobaran semangat juru penerang yang senantiasa menerangi pemikiran masyarakat nusantara dari Sabang sampai Merauke.
                    </p>
                </div>
                <div class="col-lg-5 col-md-6">
                    <div class="overflow-hidden border shadow-sm" style="border-color: #E2E8F0 !important;">
                        <img src="{{ asset('images/WebMuspenBaruImages/SejarahMuseumPenerangan2.png') }}" alt="Mobil Penerangan Departemen Penerangan" class="img-fluid w-100" style="height: 260px; object-fit: cover;">
                    </div>
                </div>
            </div>
        </div>
    </div>

    <hr class="my-5 text-muted opacity-25">

    <!-- 3. Struktur Organisasi (Canva Page 2) -->
    <div class="mb-5">
        <h2 class="title-blue mb-4">Struktur Organisasi</h2>

        <!-- Top: Kepala Museum -->
        <div class="text-center mb-5">
            <div class="d-inline-block text-center">
                <img src="{{ asset('images/WebMuspenBaruImages/Rizki Andono Prakoso.png') }}" alt="Rizki Andono Prakoso" style="height: 290px; width: auto; object-fit: contain;" class="img-fluid mb-3">
                <h4 class="fw-bold mb-1 text-dark" style="font-size: 1.35rem;">Rizki Andono Prakoso</h4>
                <div class="fw-semibold text-primary" style="font-size: 1.05rem;">Kepala Museum Penerangan</div>
            </div>
        </div>

        <!-- Bottom: 3 Pejabat Tim Kerja -->
        <div class="row g-4 text-center justify-content-center">
            <!-- 1. Yuliah -->
            <div class="col-md-4 col-sm-6 mb-3">
                <div class="d-inline-block text-center">
                    <img src="{{ asset('images/WebMuspenBaruImages/Yuliah.png') }}" alt="Yuliah" style="height: 270px; width: auto; object-fit: contain;" class="img-fluid mb-3">
                    <h5 class="fw-bold mb-1 text-dark" style="font-size: 1.2rem;">Yuliah</h5>
                    <div class="fw-semibold text-primary" style="font-size: 0.95rem;">Kepala Sub Bagian Tata Usaha</div>
                </div>
            </div>

            <!-- 2. Yuri Arief Waspodo -->
            <div class="col-md-4 col-sm-6 mb-3">
                <div class="d-inline-block text-center">
                    <img src="{{ asset('images/WebMuspenBaruImages/Yuri Arief Waspodo.png') }}" alt="Yuri Arief Waspodo" style="height: 270px; width: auto; object-fit: contain;" class="img-fluid mb-3">
                    <h5 class="fw-bold mb-1 text-dark" style="font-size: 1.2rem;">Yuri Arief Waspodo</h5>
                    <div class="fw-semibold text-primary" style="font-size: 0.95rem;">Ketua Tim Pengelolaan Koleksi</div>
                </div>
            </div>

            <!-- 3. Vetri Ridha Bhineka -->
            <div class="col-md-4 col-sm-6 mb-3">
                <div class="d-inline-block text-center">
                    <img src="{{ asset('images/WebMuspenBaruImages/Vetri Ridha Bhineka.png') }}" alt="Vetri Ridha Bhineka" style="height: 270px; width: auto; object-fit: contain;" class="img-fluid mb-3">
                    <h5 class="fw-bold mb-1 text-dark" style="font-size: 1.2rem;">Vetri Ridha Bhineka</h5>
                    <div class="fw-semibold text-primary" style="font-size: 0.95rem;">Ketua Tim Pelayanan Publik</div>
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
                <img src="{{ asset('images/color-logo.png') }}" alt="Muspen - Saksi Perubahan Generasi" class="img-fluid" style="max-height: 130px; object-fit: contain;">
            </div>
            <div class="col-md-8">
                <div class="card-canva p-4 shadow-sm">
                    <div class="mb-3">
                        <h5 class="fw-bold mb-2 text-dark"><i class="fa-solid fa-compass text-primary me-2"></i> Visi</h5>
                        <p class="fst-italic mb-0 text-dark ps-4 border-start border-3 border-primary" style="font-size: 1.05rem;">
                            “Menjadi SMART Museum yang edukatif, inklusif, dan inovatif.”
                        </p>
                    </div>
                    <hr class="my-3 text-muted opacity-25">
                    <div>
                        <h5 class="fw-bold mb-2 text-dark"><i class="fa-solid fa-bullseye text-primary me-2"></i> Misi</h5>
                        <ol class="ps-3 mb-0 text-dark" style="line-height: 1.85;">
                            <li>Mewujudkan tata kelola kelembagaan museum yang berintegritas, akuntabel, dan berkelanjutan.</li>
                            <li>Mengelola dan melestarikan koleksi sejarah komunikasi bangsa secara profesional dan berstandar internasional.</li>
                            <li>Meningkatkan kualitas pelayanan publik prima yang berorientasi pada kepuasan pengunjung.</li>
                            <li>Memperluas jejaring kolaborasi dan kemitraan strategis untuk pengembangan pengetahuan komunikasi publik.</li>
                        </ol>
                    </div>
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
                <p class="about-maklumat-text text-dark canva-paragraph-justify mb-3" style="font-size: 1.02rem; line-height: 1.85;">
                    Dalam rangka mewujudkan penyelenggaraan pelayanan publik sesuai dengan asas penyelenggaraan pemerintahan yang baik dan guna mewujudkan kepastian hak dan kewajiban berbagai pihak yang terkait dengan penyelenggaraan pelayanan, Museum Penerangan menyusun sebuah pernyataan kesanggupan penyelenggara dalam melaksanakan pelayanan sesuai dengan standar pelayanan atau maklumat pelayanan.
                </p>
                <a href="{{ asset('images/WebMuspenBaruImages/GedungMuspenTentang.png') }}" target="_blank" rel="noopener noreferrer" class="link-cta-canva fw-bold" style="font-size: 0.95rem;">
                    Unduh Dokumen Maklumat Pelayanan <i class="fa-solid fa-arrow-right-long ms-1"></i>
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
                <p class="about-asosiasi-text text-dark canva-paragraph-justify mb-0" style="font-size: 1.02rem; line-height: 1.85;">
                    Museum Penerangan adalah unit pelaksana teknis di lingkungan Direktorat Jenderal Informasi dan Komunikasi Publik yang berada di bawah dan bertanggungjawab kepada Direktur Jenderal Informasi dan Komunikasi Publik, secara administratif dibina oleh Sekretaris Direktorat Jenderal Informasi dan Komunikasi Publik. Hal ini diatur dan ditetapkan dalam <strong>PERMENKOMINFO NO. 05/PER/M.KOMINFO/03/2011 TAHUN 2011, LL. KEMKOMINFO: 5 HLM</strong>. Bahwa dengan ditetapkannya Peraturan Menteri Komunikasi dan Informatika ini tentang Organisasi dan Tata Kerja Kementerian Komunikasi dan Informatika, maka dipandang perlu untuk melakukan penataan organisasi dan tata kerja museum penerangan.
                </p>
            </div>
        </div>
    </div>
</div>
@endsection
