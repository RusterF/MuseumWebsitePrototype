@extends(backpack_view('blank'))

@php
    $collectionCount = \App\Models\Collection::count();
    $articleCount = \App\Models\Article::count();
    $guestBookCount = \App\Models\GuestBook::count();
    $bookingCount = \App\Models\Booking::count();
    $pendingBookings = \App\Models\Booking::where('approval_status', 'PENDING')->count();
    $complaintCount = \App\Models\Complaint::count();
@endphp

@section('header')
    <section class="header-operation container-fluid animated fadeIn d-flex justify-content-between align-items-baseline mb-3">
        <h1 class="text-capitalize mb-0">Dashboard Manajemen Museum Penerangan</h1>
        <div class="text-muted small">Selamat datang di Panel CMS & Layanan Terpadu Museum Penerangan</div>
    </section>
@endsection

@section('content')
<div class="row row-cards mb-4">
    <div class="col-sm-6 col-lg-3">
        <div class="card card-sm shadow-sm border-0 border-start border-primary border-4">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <div class="subheader text-uppercase font-weight-bold">Koleksi Museum</div>
                </div>
                <div class="h1 mb-0 font-weight-bold text-primary">{{ number_format($collectionCount) }}</div>
                <div class="text-muted small mt-1">Artefak radio, TV, pers, & komunikasi</div>
            </div>
        </div>
    </div>
    <div class="col-sm-6 col-lg-3">
        <div class="card card-sm shadow-sm border-0 border-start border-success border-4">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <div class="subheader text-uppercase font-weight-bold">Artikel & Berita</div>
                </div>
                <div class="h1 mb-0 font-weight-bold text-success">{{ number_format($articleCount) }}</div>
                <div class="text-muted small mt-1">Publikasi edukasi & sejarah penerangan</div>
            </div>
        </div>
    </div>
    <div class="col-sm-6 col-lg-3">
        <div class="card card-sm shadow-sm border-0 border-start border-info border-4">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <div class="subheader text-uppercase font-weight-bold">Buku Tamu Digital</div>
                </div>
                <div class="h1 mb-0 font-weight-bold text-info">{{ number_format($guestBookCount) }}</div>
                <div class="text-muted small mt-1">Pengunjung terdaftar onsite & online</div>
            </div>
        </div>
    </div>
    <div class="col-sm-6 col-lg-3">
        <div class="card card-sm shadow-sm border-0 border-start border-warning border-4">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <div class="subheader text-uppercase font-weight-bold">Reservasi Kunjungan</div>
                </div>
                <div class="h1 mb-0 font-weight-bold text-warning">{{ number_format($bookingCount) }}</div>
                <div class="text-muted small mt-1">
                    @if($pendingBookings > 0)
                        <span class="badge bg-danger-lt text-danger font-weight-bold">{{ $pendingBookings }} Menunggu Approval</span>
                    @else
                        Semua reservasi terkonfirmasi
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-lg-8">
        <div class="card shadow-sm border-0 mb-4">
            <div class="card-header bg-white d-flex justify-content-between align-items-center">
                <h3 class="card-title font-weight-bold mb-0">Akses Cepat Pengelolaan Sistem</h3>
            </div>
            <div class="card-body">
                <div class="row g-3">
                    <div class="col-md-4">
                        <a href="{{ backpack_url('reservation-approval') }}" class="card card-link card-stacked text-decoration-none p-3 border text-center h-100 bg-light">
                            <i class="la la-check-circle text-success" style="font-size: 2.5rem;"></i>
                            <div class="font-weight-bold mt-2 text-dark">Persetujuan Reservasi</div>
                            <div class="text-muted small mt-1">Verifikasi pengajuan rombongan</div>
                        </a>
                    </div>
                    <div class="col-md-4">
                        <a href="{{ backpack_url('collection') }}" class="card card-link card-stacked text-decoration-none p-3 border text-center h-100 bg-light">
                            <i class="la la-archive text-primary" style="font-size: 2.5rem;"></i>
                            <div class="font-weight-bold mt-2 text-dark">Katalog Koleksi</div>
                            <div class="text-muted small mt-1">Kelola data artefak & sejarah</div>
                        </a>
                    </div>
                    <div class="col-md-4">
                        <a href="{{ backpack_url('monthly-visitor-chart') }}" class="card card-link card-stacked text-decoration-none p-3 border text-center h-100 bg-light">
                            <i class="la la-line-chart text-info" style="font-size: 2.5rem;"></i>
                            <div class="font-weight-bold mt-2 text-dark">Grafik Pengunjung</div>
                            <div class="text-muted small mt-1">Statistik bulanan online/onsite</div>
                        </a>
                    </div>
                    <div class="col-md-4">
                        <a href="{{ backpack_url('comment') }}" class="card card-link card-stacked text-decoration-none p-3 border text-center h-100 bg-light">
                            <i class="la la-comments text-success" style="font-size: 2.5rem;"></i>
                            <div class="font-weight-bold mt-2 text-dark">Moderasi Komentar</div>
                            <div class="text-muted small mt-1">Review feedback artikel publik</div>
                        </a>
                    </div>
                    <div class="col-md-4">
                        <a href="{{ backpack_url('complaint') }}" class="card card-link card-stacked text-decoration-none p-3 border text-center h-100 bg-light">
                            <i class="la la-bullhorn text-danger" style="font-size: 2.5rem;"></i>
                            <div class="font-weight-bold mt-2 text-dark">Saran & Pengaduan</div>
                            <div class="text-muted small mt-1">Tindak lanjut aspirasi masyarakat</div>
                        </a>
                    </div>
                    <div class="col-md-4">
                        <a href="{{ backpack_url('setting-web-info') }}" class="card card-link card-stacked text-decoration-none p-3 border text-center h-100 bg-light">
                            <i class="la la-cog text-warning" style="font-size: 2.5rem;"></i>
                            <div class="font-weight-bold mt-2 text-dark">Pengaturan Museum</div>
                            <div class="text-muted small mt-1">Profil, visi misi, & jam buka</div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-4">
        <div class="card shadow-sm border-0 mb-4">
            <div class="card-header bg-white">
                <h3 class="card-title font-weight-bold mb-0">Informasi Singkat Museum</h3>
            </div>
            <div class="card-body">
                <p class="text-muted mb-2">
                    <strong>Alamat:</strong><br>
                    Taman Mini Indonesia Indah (TMII), Jakarta Timur
                </p>
                <p class="text-muted mb-2">
                    <strong>Telepon / WA:</strong><br>
                    08118132121
                </p>
                <p class="text-muted mb-2">
                    <strong>Email:</strong><br>
                    Muspen@Kominfo.com
                </p>
                <div class="d-grid gap-2 mt-3">
                    <a href="{{ url('/') }}" target="_blank" class="btn btn-outline-primary">
                        <i class="la la-external-link"></i> Buka Portal Publik
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
