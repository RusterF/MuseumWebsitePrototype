@extends('layouts.canva')

@section('title', 'Reservasi Kunjungan')

@section('content')
<div class="container py-4">
    <!-- Blue Title (Canva Page 14) -->
    <h2 class="title-blue mb-4">Reservasi</h2>

    <!-- Map Graphic (Canva Page 14) -->
    <div class="mb-3 overflow-hidden shadow-sm border" style="max-height: 480px; border-color: #E2E8F0 !important;">
        <img src="{{ asset('images/WebMuspenBaruImages/GMap.png') }}" alt="Peta Lokasi Museum Penerangan TMII" class="w-100 h-100" style="object-fit: cover;">
    </div>

    <!-- Link below map: "Lihat lokasi Museum Penerangan di Google Maps →" (Canva Page 14) -->
    <div class="text-center mb-5">
        <a href="https://maps.app.goo.gl/3q6Z1v1c" target="_blank" rel="noopener noreferrer" class="link-cta-canva fw-semibold small">
            Lihat lokasi Museum Penerangan di Google Maps <i class="fa-solid fa-arrow-right-long ms-1"></i>
        </a>
    </div>

    <!-- "Rencanakan Kunjunganmu!" Section (Canva Page 14) -->
    <div class="mb-5">
        <h3 class="title-blue mb-3">Rencanakan Kunjunganmu!</h3>
        <p class="text-secondary canva-paragraph-justify mb-4" style="line-height: 1.85; font-size: 1rem;">
            Museum Penerangan menyambut kunjungan perorangan, rombongan sekolah, instansi pemerintah, dan komunitas masyarakat umum. Layanan tiket masuk museum tidak dipungut biaya retribusi (Gratis). Untuk rombongan dengan jumlah lebih dari 20 orang, dimohon melakukan reservasi jadwal kedatangan guna mendapatkan fasilitas pemanduan edukatif secara optimal.
        </p>

        <div class="mb-4">
            <a href="{{ route('services.kunjungan-museum') }}" class="link-cta-canva fw-semibold small" style="margin-top: 0;">
                Lihat tata tertib kunjungan <i class="fa-solid fa-arrow-right-long ms-1"></i>
            </a>
        </div>

        <!-- Green Call Center Button (Canva Page 14) -->
        <div class="card-canva p-4 p-md-5 shadow-sm border-start border-4 border-success" style="background-color: #F8FAFC;">
            <div class="row align-items-center g-4">
                <div class="col-md-8">
                    <div class="badge-canva mb-2 text-success" style="background-color: #DCFCE7; border-color: #86EFAC;">
                        <i class="fa-brands fa-whatsapp me-1"></i> Layanan Reservasi Resmi
                    </div>
                    <h4 class="fw-bold text-dark mb-2">Reservasi Kunjungan via WhatsApp</h4>
                    <p class="text-secondary mb-3 small" style="line-height: 1.7;">
                        Silakan hubungi Call Center resmi Museum Penerangan untuk konfirmasi jadwal kunjungan rombongan, ketersediaan pemandu edukatif, dan informasi layanan museum.
                    </p>
                    <div class="d-flex align-items-center gap-3 text-secondary small flex-wrap">
                        <span><i class="fa-regular fa-clock text-primary me-1"></i> Buka Setiap Hari: 09.00 - 15.00 WIB</span>
                        <span><i class="fa-solid fa-phone text-success me-1"></i> +62 811 813 2121</span>
                    </div>
                </div>
                <div class="col-md-4 text-md-end">
                    <a href="https://wa.me/628118132121?text=Halo%20Admin%20Museum%20Penerangan,%20saya%20ingin%20melakukan%20Reservasi%20Kunjungan" target="_blank" rel="noopener noreferrer" class="btn btn-success px-4 py-3 fw-bold shadow d-inline-flex align-items-center gap-2" style="background-color: #22c55e; border-color: #22c55e;">
                        <i class="fa-brands fa-whatsapp fs-4"></i>
                        <span>Call Center (+62 811 813 2121)</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
