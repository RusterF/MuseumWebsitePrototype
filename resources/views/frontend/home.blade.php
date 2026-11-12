@extends('layouts.canva')

@section('title', 'Beranda')

@section('content')

<!-- ==================== 1. HERO SECTION ==================== -->
<section class="hero-canva" id="hero-section" style="background-image: url('{{ asset('images/WebMuspenBaruImages/GedungMuspen.png') }}'); background-position: center bottom !important;">
    <div class="hero-canva-overlay"></div>
    <div class="container h-100 d-flex flex-column justify-content-center">
        <div class="hero-canva-content animate-fade-in">
            <h2 class="hero-subtitle animate-fade-in-delay">Selamat Datang di</h2>
            <h1 class="hero-title animate-fade-in-delay-2">Museum Penerangan</h1>
        </div>
    </div>
</section>

<!-- ==================== 2. RENCANAKAN KUNJUNGANMU ==================== -->
<section class="section-kunjungan" id="section-kunjungan">
    <div class="container">
        <div class="row align-items-center g-4">
            <!-- Left Info -->
            <div class="col-lg-5">
                <h2 class="kunjungan-title">Rencanakan<br>Kunjunganmu!</h2>
                <div class="info-item-pill">
                    <i class="fa-solid fa-ticket"></i>
                    <span>Gratis</span>
                </div>
                <div class="info-item-pill">
                    <i class="fa-regular fa-clock"></i>
                    <span>Buka Setiap Hari, 09.00-15.00 WIB</span>
                </div>
                <div class="info-item-pill">
                    <i class="fa-solid fa-phone"></i>
                    <span>+62 811 813 2121</span>
                </div>
            </div>

            <!-- Right Cards (Kunjungan Museum & Virtual Experience - Canva Page 8 & 9) -->
            <div class="col-lg-7">
                <div class="row g-4">
                    <div class="col-sm-6">
                        <a href="{{ route('services.kunjungan-museum') }}" class="kunjungan-card">
                            <img src="{{ asset('images/WebMuspenBaruImages/RencanakanKunjunganmu1.png') }}" alt="Kunjungan Museum">
                            <div class="kunjungan-card-overlay">
                                <div class="kunjungan-card-title">Kunjungan<br>Museum</div>
                                <div class="kunjungan-card-subtitle">Menjelajahi Museum Penerangan secara langsung</div>
                            </div>
                        </a>
                    </div>
                    <div class="col-sm-6">
                        <a href="{{ route('services.virtual-experience') }}" class="kunjungan-card">
                            <img src="{{ asset('images/WebMuspenBaruImages/RencanakanKunjunganmu2.png') }}" alt="Virtual Experience">
                            <div class="kunjungan-card-overlay">
                                <div class="kunjungan-card-title"><span class="kunjungan-card-title-italic">Virtual</span><br><span class="kunjungan-card-title-italic">Experience</span></div>
                                <div class="kunjungan-card-subtitle">Menjelajahi Museum Penerangan dengan kepemanduan secara virtual</div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ==================== 3. PERJALANAN WAKTU LAYANAN INFORMASI ==================== -->
<section class="section-perjalanan">
    <div class="container">
        <div class="row align-items-center g-5">
            <div class="col-lg-5">
                <h2 class="title-blue"><span class="text-nowrap">Perjalanan Waktu Layanan</span><br><span class="text-nowrap">Informasi dan Komunikasi</span></h2>
                <p class="canva-paragraph-justify" style="font-size: 1.02rem; line-height: 1.85; color: #1E293B; text-align: justify; text-justify: inter-word;">
                    Cara manusia berkomunikasi terus berkembang seiring perubahan zaman. Museum Penerangan mengajak Anda menelusuri perjalanan layanan informasi dan komunikasi di Indonesia melalui koleksi bersejarah yang merekam perkembangan teknologi, media, dan cara masyarakat terhubung. Jelajahi kisah di balik setiap koleksi dan temukan bagaimana perjalanan komunikasi masa lalu membentuk kehidupan kita hari ini.
                </p>
            </div>
            <div class="col-lg-7">
                <img src="{{ asset('images/WebMuspenBaruImages/PerjalananWaktu.png') }}" alt="Perjalanan Waktu Layanan Informasi dan Komunikasi" class="img-rounded-canva w-100 shadow-sm" style="border: 1px solid #e2e8f0;">
            </div>
        </div>
    </div>
</section>

<!-- ==================== 4. AGENDA ACARA ==================== -->
<section class="section-agenda">
    <div class="container">
        <h2 class="mb-4">Agenda Acara</h2>
        <div class="row g-4">
            <!-- Event 1: Workshop Telepon Kaleng -->
            <div class="col-lg-6">
                <a href="{{ route('events.show', 'workshop-telepon-kaleng') }}" class="agenda-card">
                    <img src="{{ asset('images/WebMuspenBaruImages/AgendaAcara1.png') }}" alt="Workshop Telepon Kaleng" class="agenda-card-img">
                    <div class="agenda-card-body">
                        <div class="agenda-card-title">Workshop Telepon Kaleng</div>
                        <div class="agenda-meta-item">
                            <i class="fa-regular fa-calendar"></i>
                            <span>Minggu, 11 Oktober 2026</span>
                        </div>
                        <div class="agenda-meta-item">
                            <i class="fa-regular fa-clock"></i>
                            <span>09.00-15.00 WIB</span>
                        </div>
                        <div class="agenda-meta-item">
                            <i class="fa-regular fa-user"></i>
                            <span>Umum</span>
                        </div>
                    </div>
                </a>
            </div>

            <!-- Event 2: Muspen Talk -->
            <div class="col-lg-6">
                <a href="{{ route('events.show', 'muspen-talk-films-and-things-we-inherit') }}" class="agenda-card">
                    <img src="{{ asset('images/WebMuspenBaruImages/AgendaAcara3.png') }}" alt="Muspen Talk" class="agenda-card-img">
                    <div class="agenda-card-body">
                        <div class="agenda-card-title">Muspen Talk - Films and Things We Inherit</div>
                        <div class="agenda-meta-item">
                            <i class="fa-regular fa-calendar"></i>
                            <span>Minggu, 11 Oktober 2026</span>
                        </div>
                        <div class="agenda-meta-item">
                            <i class="fa-regular fa-clock"></i>
                            <span>09.00-15.00 WIB</span>
                        </div>
                        <div class="agenda-meta-item">
                            <i class="fa-regular fa-user"></i>
                            <span>Undangan</span>
                        </div>
                    </div>
                </a>
            </div>

            <!-- Event 3: Muspen Try -->
            <div class="col-lg-6">
                <a href="{{ route('events.show', 'muspen-try-menjadi-reporter') }}" class="agenda-card">
                    <img src="{{ asset('images/WebMuspenBaruImages/AgendaAcara2.png') }}" alt="Muspen Try" class="agenda-card-img">
                    <div class="agenda-card-body">
                        <div class="agenda-card-title">Muspen Try - Menjadi Reporter</div>
                        <div class="agenda-meta-item">
                            <i class="fa-regular fa-calendar"></i>
                            <span>Minggu, 11 Oktober 2026</span>
                        </div>
                        <div class="agenda-meta-item">
                            <i class="fa-regular fa-clock"></i>
                            <span>09.00-15.00 WIB</span>
                        </div>
                        <div class="agenda-meta-item">
                            <i class="fa-regular fa-user"></i>
                            <span>Umum</span>
                        </div>
                    </div>
                </a>
            </div>

            <!-- Event 4: Museum Tebar Pesona -->
            <div class="col-lg-6">
                <a href="{{ route('events.show', 'museum-tebar-pesona') }}" class="agenda-card">
                    <img src="{{ asset('images/WebMuspenBaruImages/AgendaAcara4.png') }}" alt="Museum Tebar Pesona" class="agenda-card-img">
                    <div class="agenda-card-body">
                        <div class="agenda-card-title">Museum Tebar Pesona</div>
                        <div class="agenda-meta-item">
                            <i class="fa-regular fa-calendar"></i>
                            <span>Minggu, 11 Oktober 2026</span>
                        </div>
                        <div class="agenda-meta-item">
                            <i class="fa-regular fa-clock"></i>
                            <span>09.00-15.00 WIB</span>
                        </div>
                        <div class="agenda-meta-item">
                            <i class="fa-regular fa-user"></i>
                            <span>Umum</span>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>
</section>

<!-- ==================== 5. LEBIH DARI 100 KOLEKSI ==================== -->
<section class="section-koleksi">
    <div class="container">
        <div class="row align-items-center g-5">
            <div class="col-lg-6">
                <img src="{{ asset('images/WebMuspenBaruImages/LebihDari100Koleksi.png') }}" alt="Lebih dari 100 Koleksi" class="img-rounded-canva w-100 shadow-sm" style="border: 1px solid #e2e8f0; aspect-ratio: 1 / 1; object-fit: cover;">
            </div>
            <div class="col-lg-6">
                <h2 class="title-blue">Lebih dari 100 Koleksi<br>Bertema Komunikasi</h2>
                <p class="canva-paragraph-justify" style="font-size: 1.02rem; line-height: 1.85; color: #1E293B;">
                    Museum Penerangan menyimpan dan merawat ratusan koleksi artefak bersejarah yang merekam jejak evolusi layanan informasi dan komunikasi di Indonesia. Mulai dari mesin ketik dan percetakan pers pejuang kemerdekaan, pemancar radio perjuangan, kamera dan studio televisi analog perdana, hingga sarana telekomunikasi modern dan wahana interaktif digital. Setiap koleksi merefleksikan dedikasi para juru penerang dalam merajut persatuan dan mencerdaskan kehidupan bangsa.
                </p>
                <a href="{{ route('collections.index') }}" class="link-cta-canva fs-5">
                    Lihat Koleksi Museum Penerangan Lainnya <i class="fa-solid fa-arrow-right-long"></i>
                </a>
            </div>
        </div>
    </div>
</section>

<!-- ==================== 6. PUBLIKASI TERBARU ==================== -->
<section class="section-publikasi">
    <div class="container">
        <div class="d-flex justify-content-between align-items-center mb-4 flex-wrap gap-2">
            <h2 class="title-blue mb-0">Publikasi Terbaru</h2>
            <a href="{{ route('publikasi.index') }}" class="link-cta-canva" style="margin-top: 0;">
                Lihat Artikel Lainnya <i class="fa-solid fa-arrow-right-long"></i>
            </a>
        </div>

        <div class="row g-4">
            <!-- Card 1 -->
            <div class="col-lg-3 col-md-6">
                <a href="{{ route('publikasi.show', 'museum-penerangan-hadirkan-pameran-jaladri-dhvani-menelusuri-jejak-informasi-yang-berlayar-di-nusantara') }}" class="article-card-canva">
                    <img src="{{ asset('images/WebMuspenBaruImages/Publikasi3.png') }}" alt="Jaladri Dhvani" class="article-card-img">
                    <div class="article-card-body">
                        <div class="article-meta-badge">Artikel &bull; 1 Januari 2026</div>
                        <div class="article-card-title">Museum Penerangan Hadirkan Pameran Jaladri Dhvani, Menelusuri Jejak Informasi yang Berlayar di Nusantara</div>
                        <div class="article-read-more">Baca selengkapnya <i class="fa-solid fa-arrow-right-long ms-1"></i></div>
                    </div>
                </a>
            </div>

            <!-- Card 2 -->
            <div class="col-lg-3 col-md-6">
                <a href="{{ route('publikasi.show', 'museum-penerangan-dan-museum-balai-kirti-bangun-kolaborasi-strategis') }}" class="article-card-canva">
                    <img src="{{ asset('images/WebMuspenBaruImages/Publikasi1.png') }}" alt="Balai Kirti" class="article-card-img">
                    <div class="article-card-body">
                        <div class="article-meta-badge">Berita &bull; 1 Januari 2026</div>
                        <div class="article-card-title">Museum Penerangan dan Museum Balai Kirti Bangun Kolaborasi Strategis</div>
                        <div class="article-read-more">Baca selengkapnya <i class="fa-solid fa-arrow-right-long ms-1"></i></div>
                    </div>
                </a>
            </div>

            <!-- Card 3 -->
            <div class="col-lg-3 col-md-6">
                <a href="{{ route('publikasi.show', 'survei-kepuasan-masyarakat-museum-penerangan-triwulan-i-tahun-2026-raih-predikat-sangat-baik') }}" class="article-card-canva">
                    <img src="{{ asset('images/WebMuspenBaruImages/Publikasi2.png') }}" alt="Survei Kepuasan" class="article-card-img">
                    <div class="article-card-body">
                        <div class="article-meta-badge">Artikel &bull; 1 Januari 2026</div>
                        <div class="article-card-title">Survei Kepuasan Masyarakat Museum Penerangan Triwulan I Tahun 2026 Raih Predikat Sangat Baik</div>
                        <div class="article-read-more">Baca selengkapnya <i class="fa-solid fa-arrow-right-long ms-1"></i></div>
                    </div>
                </a>
            </div>

            <!-- Card 4 -->
            <div class="col-lg-3 col-md-6">
                <a href="{{ route('publikasi.show', 'layar-tancap-dalam-sejarah-komunikasi-dan-perfilman-indonesia') }}" class="article-card-canva">
                    <img src="{{ asset('images/WebMuspenBaruImages/Publikasi4.png') }}" alt="Layar Tancap" class="article-card-img">
                    <div class="article-card-body">
                        <div class="article-meta-badge">Artikel &bull; 1 Januari 2026</div>
                        <div class="article-card-title">Layar Tancap dalam Sejarah Komunikasi dan Perfilman Indonesia</div>
                        <div class="article-read-more">Baca selengkapnya <i class="fa-solid fa-arrow-right-long ms-1"></i></div>
                    </div>
                </a>
            </div>
        </div>
    </div>
</section>

@endsection
