@extends(backpack_view('blank'))

@php
    $collectionCount = \App\Models\Collection::count();
    $categoryCount = \App\Models\CollectionCategory::count();

    $articleCount = \App\Models\Article::count();
    $publishedArticles = \App\Models\Article::where(function ($q) {
        $q->where('approval_status', 'Y')->orWhereNull('approval_status');
    })->count();

    $eventCount = \App\Models\Event::count();
    $activeEvents = \App\Models\Event::where('status', 'PUBLISH')->count();

    $bookingCount = \App\Models\Booking::count();
    $pendingBookings = \App\Models\Booking::where('approval_status', 'PENDING')->count();

    $complaintCount = \App\Models\Complaint::count();
    $pendingComments = \App\Models\Comment::where('status', 'PENDING')->count();
    $pendingReports = \App\Models\Report::where('status', 'PENDING')->count();

    // Data Pengaturan yang terhubung langsung ke Frontend
    $address = \App\Models\Setting::get('address', 'Taman Mini Indonesia Indah, Jl. Pintu 2 TMII, Jakarta Timur');
    $phone = \App\Models\Setting::get('phone', '08118132121');
    $email = \App\Models\Setting::get('contact_email', 'museumpenerangan@gmail.com');
    $hours = \App\Models\Setting::get('operational_hours', 'Buka Setiap Hari: 09.00 - 15.00 WIB');
@endphp

@section('header')
    <section class="header-operation container-fluid animated fadeIn d-flex justify-content-between align-items-baseline mb-3">
        <h1 class="text-capitalize mb-0">Dashboard Manajemen Museum Penerangan</h1>
        <div class="text-muted small">Panel CMS & Layanan Terpadu yang Terhubung dengan Frontend</div>
    </section>
@endsection

@section('content')
<!-- Ringkasan Modul Utama Frontend -->
<div class="row row-cards mb-4">
    <!-- 1. Koleksi Museum -->
    <div class="col-sm-6 col-lg-3">
        <div class="card card-sm shadow-sm border-0 border-start border-primary border-4 h-100">
            <div class="card-body">
                <div class="d-flex align-items-center justify-content-between">
                    <div class="subheader text-uppercase font-weight-bold text-primary">Koleksi Museum</div>
                    <i class="la la-archive text-primary" style="font-size: 1.5rem;"></i>
                </div>
                <div class="h1 mb-0 font-weight-bold text-dark">{{ number_format($collectionCount) }}</div>
                <div class="text-muted small mt-1">
                    {{ $categoryCount }} Kategori artefak aktif di web
                </div>
            </div>
            <div class="card-footer bg-light py-2 px-3 border-0">
                <a href="{{ backpack_url('collection') }}" class="small text-primary font-weight-bold text-decoration-none">
                    Kelola Koleksi &rarr;
                </a>
            </div>
        </div>
    </div>

    <!-- 2. Publikasi & Berita -->
    <div class="col-sm-6 col-lg-3">
        <div class="card card-sm shadow-sm border-0 border-start border-success border-4 h-100">
            <div class="card-body">
                <div class="d-flex align-items-center justify-content-between">
                    <div class="subheader text-uppercase font-weight-bold text-success">Publikasi & Berita</div>
                    <i class="la la-newspaper-o text-success" style="font-size: 1.5rem;"></i>
                </div>
                <div class="h1 mb-0 font-weight-bold text-dark">{{ number_format($articleCount) }}</div>
                <div class="text-muted small mt-1">
                    {{ $publishedArticles }} Artikel aktif di Beranda & Web
                </div>
            </div>
            <div class="card-footer bg-light py-2 px-3 border-0">
                <a href="{{ backpack_url('article') }}" class="small text-success font-weight-bold text-decoration-none">
                    Kelola Artikel &rarr;
                </a>
            </div>
        </div>
    </div>

    <!-- 3. Agenda Acara (Event) -->
    <div class="col-sm-6 col-lg-3">
        <div class="card card-sm shadow-sm border-0 border-start border-info border-4 h-100">
            <div class="card-body">
                <div class="d-flex align-items-center justify-content-between">
                    <div class="subheader text-uppercase font-weight-bold text-info">Agenda Acara (Event)</div>
                    <i class="la la-calendar text-info" style="font-size: 1.5rem;"></i>
                </div>
                <div class="h1 mb-0 font-weight-bold text-dark">{{ number_format($eventCount) }}</div>
                <div class="text-muted small mt-1">
                    <span class="badge bg-success-lt text-success font-weight-bold">{{ $activeEvents }} Aktif di Beranda</span>
                </div>
            </div>
            <div class="card-footer bg-light py-2 px-3 border-0">
                <a href="{{ backpack_url('event') }}" class="small text-info font-weight-bold text-decoration-none">
                    Kelola Agenda &rarr;
                </a>
            </div>
        </div>
    </div>

    <!-- 4. Reservasi Kunjungan -->
    <div class="col-sm-6 col-lg-3">
        <div class="card card-sm shadow-sm border-0 border-start border-warning border-4 h-100">
            <div class="card-body">
                <div class="d-flex align-items-center justify-content-between">
                    <div class="subheader text-uppercase font-weight-bold text-warning">Reservasi Kunjungan</div>
                    <i class="la la-ticket text-warning" style="font-size: 1.5rem;"></i>
                </div>
                <div class="h1 mb-0 font-weight-bold text-dark">{{ number_format($bookingCount) }}</div>
                <div class="text-muted small mt-1">
                    @if($pendingBookings > 0)
                        <span class="badge bg-danger-lt text-danger font-weight-bold">{{ $pendingBookings }} Menunggu Approval</span>
                    @else
                        <span class="text-muted">Semua permohonan diproses</span>
                    @endif
                </div>
            </div>
            <div class="card-footer bg-light py-2 px-3 border-0">
                <a href="{{ backpack_url('reservation-approval') }}" class="small text-warning font-weight-bold text-decoration-none">
                    Persetujuan Reservasi &rarr;
                </a>
            </div>
        </div>
    </div>
</div>

<!-- Moderasi & Saran Pengunjung (Alert Ringkas) -->
<div class="row mb-4">
    <div class="col-md-6 mb-3 mb-md-0">
        <div class="card shadow-sm border-0 border-start border-danger border-3 p-3 bg-white h-100">
            <div class="d-flex align-items-center justify-content-between">
                <div>
                    <h5 class="mb-1 fw-bold text-dark"><i class="la la-bullhorn text-danger me-1"></i> Saran & Pengaduan Masyarakat</h5>
                    <div class="text-muted small">Total <strong>{{ number_format($complaintCount) }}</strong> aspirasi diterima via formulir web & SPAN LAPOR.</div>
                </div>
                <a href="{{ backpack_url('complaint') }}" class="btn btn-sm btn-outline-danger">
                    Buka Aduan
                </a>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="card shadow-sm border-0 border-start border-secondary border-3 p-3 bg-white h-100">
            <div class="d-flex align-items-center justify-content-between">
                <div>
                    <h5 class="mb-1 fw-bold text-dark"><i class="la la-comments text-primary me-1"></i> Umpan Balik & Moderasi Publik</h5>
                    <div class="text-muted small">
                        <strong>{{ $pendingComments }}</strong> Komentar pending & <strong>{{ $pendingReports }}</strong> Laporan konten perlu ditinjau.
                    </div>
                </div>
                <div class="d-flex gap-1">
                    <a href="{{ backpack_url('comment') }}" class="btn btn-sm btn-outline-primary" title="Moderasi Komentar">
                        Komentar
                    </a>
                    <a href="{{ backpack_url('report') }}" class="btn btn-sm btn-outline-secondary" title="Laporan Konten">
                        Laporan
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Menu Akses Cepat & Profil Frontend -->
<div class="row">
    <!-- Akses Cepat Pengelolaan Sistem -->
    <div class="col-lg-8">
        <div class="card shadow-sm border-0 mb-4">
            <div class="card-header bg-white d-flex justify-content-between align-items-center">
                <h3 class="card-title font-weight-bold mb-0">Akses Cepat Pengelolaan Sistem (Frontend)</h3>
            </div>
            <div class="card-body">
                <div class="row g-3">
                    <div class="col-md-4">
                        <a href="{{ backpack_url('reservation-approval') }}" class="card card-link card-stacked text-decoration-none p-3 border text-center h-100 bg-light">
                            <i class="la la-check-circle text-success" style="font-size: 2.2rem;"></i>
                            <div class="font-weight-bold mt-2 text-dark">Persetujuan Reservasi</div>
                            <div class="text-muted small mt-1">Verifikasi rombongan pengunjung</div>
                        </a>
                    </div>
                    <div class="col-md-4">
                        <a href="{{ backpack_url('collection') }}" class="card card-link card-stacked text-decoration-none p-3 border text-center h-100 bg-light">
                            <i class="la la-archive text-primary" style="font-size: 2.2rem;"></i>
                            <div class="font-weight-bold mt-2 text-dark">Katalog Koleksi</div>
                            <div class="text-muted small mt-1">Kelola data artefak & kategori</div>
                        </a>
                    </div>
                    <div class="col-md-4">
                        <a href="{{ backpack_url('event') }}" class="card card-link card-stacked text-decoration-none p-3 border text-center h-100 bg-light">
                            <i class="la la-calendar text-info" style="font-size: 2.2rem;"></i>
                            <div class="font-weight-bold mt-2 text-dark">Agenda Event</div>
                            <div class="text-muted small mt-1">Jadwal pameran & talkshow</div>
                        </a>
                    </div>
                    <div class="col-md-4">
                        <a href="{{ backpack_url('article') }}" class="card card-link card-stacked text-decoration-none p-3 border text-center h-100 bg-light">
                            <i class="la la-newspaper-o text-primary" style="font-size: 2.2rem;"></i>
                            <div class="font-weight-bold mt-2 text-dark">Artikel & Berita</div>
                            <div class="text-muted small mt-1">Tulis dan terbitkan publikasi</div>
                        </a>
                    </div>
                    <div class="col-md-4">
                        <a href="{{ backpack_url('complaint') }}" class="card card-link card-stacked text-decoration-none p-3 border text-center h-100 bg-light">
                            <i class="la la-bullhorn text-danger" style="font-size: 2.2rem;"></i>
                            <div class="font-weight-bold mt-2 text-dark">Saran & Pengaduan</div>
                            <div class="text-muted small mt-1">Tindak lanjut aspirasi masyarakat</div>
                        </a>
                    </div>
                    <div class="col-md-4">
                        <a href="{{ backpack_url('comment') }}" class="card card-link card-stacked text-decoration-none p-3 border text-center h-100 bg-light">
                            <i class="la la-comments text-success" style="font-size: 2.2rem;"></i>
                            <div class="font-weight-bold mt-2 text-dark">Moderasi Komentar</div>
                            <div class="text-muted small mt-1">Review feedback artikel pembaca</div>
                        </a>
                    </div>
                    <div class="col-md-4">
                        <a href="{{ backpack_url('report') }}" class="card card-link card-stacked text-decoration-none p-3 border text-center h-100 bg-light">
                            <i class="la la-flag text-danger" style="font-size: 2.2rem;"></i>
                            <div class="font-weight-bold mt-2 text-dark">Laporan Konten</div>
                            <div class="text-muted small mt-1">Tindak lanjut spam/pelanggaran</div>
                        </a>
                    </div>
                    <div class="col-md-4">
                        <a href="{{ backpack_url('monthly-visitor-chart') }}" class="card card-link card-stacked text-decoration-none p-3 border text-center h-100 bg-light">
                            <i class="la la-line-chart text-info" style="font-size: 2.2rem;"></i>
                            <div class="font-weight-bold mt-2 text-dark">Grafik Pengunjung</div>
                            <div class="text-muted small mt-1">Statistik online web & onsite</div>
                        </a>
                    </div>
                    <div class="col-md-4">
                        <a href="{{ backpack_url('setting-web-info') }}" class="card card-link card-stacked text-decoration-none p-3 border text-center h-100 bg-light">
                            <i class="la la-cog text-warning" style="font-size: 2.2rem;"></i>
                            <div class="font-weight-bold mt-2 text-dark">Pengaturan Museum</div>
                            <div class="text-muted small mt-1">Sinkronisasi kontak, jam, & medsos</div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Tautan Langsung ke Halaman Frontend & Informasi Kontak -->
    <div class="col-lg-4">
        <!-- Informasi Kontak Terhubung -->
        <div class="card shadow-sm border-0 mb-4">
            <div class="card-header bg-white d-flex justify-content-between align-items-center">
                <h3 class="card-title font-weight-bold mb-0">Informasi Profil Museum (Aktif)</h3>
                <a href="{{ backpack_url('setting-web-info') }}" class="badge bg-primary-lt text-primary text-decoration-none" title="Ubah Pengaturan">Ubah</a>
            </div>
            <div class="card-body">
                <p class="text-muted mb-2">
                    <strong>Alamat Terpasang di Footer:</strong><br>
                    {{ strip_tags($address) }}
                </p>
                <p class="text-muted mb-2">
                    <strong>Telepon / WhatsApp:</strong><br>
                    {{ strip_tags($phone) }}
                </p>
                <p class="text-muted mb-2">
                    <strong>Email Resmi:</strong><br>
                    {{ strip_tags($email) }}
                </p>
                <p class="text-muted mb-0">
                    <strong>Jam Operasional:</strong><br>
                    {{ strip_tags($hours) }}
                </p>
            </div>
        </div>

        <!-- Pintasan Langsung Halaman Frontend -->
        <div class="card shadow-sm border-0 mb-4">
            <div class="card-header bg-white">
                <h3 class="card-title font-weight-bold mb-0">Tautan Langsung Halaman Web</h3>
            </div>
            <div class="card-body p-2">
                <div class="list-group list-group-flush">
                    <a href="{{ url('/') }}" target="_blank" class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">
                        <span><i class="la la-home text-primary me-2"></i> Beranda Publik</span>
                        <i class="la la-external-link text-muted"></i>
                    </a>
                    <a href="{{ route('collections.index') }}" target="_blank" class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">
                        <span><i class="la la-cube text-primary me-2"></i> Halaman Koleksi</span>
                        <i class="la la-external-link text-muted"></i>
                    </a>
                    <a href="{{ route('publikasi.index') }}" target="_blank" class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">
                        <span><i class="la la-file-text text-success me-2"></i> Halaman Publikasi & Berita</span>
                        <i class="la la-external-link text-muted"></i>
                    </a>
                    <a href="{{ route('events.index') }}" target="_blank" class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">
                        <span><i class="la la-calendar text-info me-2"></i> Agenda Acara (Events)</span>
                        <i class="la la-external-link text-muted"></i>
                    </a>
                    <a href="{{ route('booking.create') }}" target="_blank" class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">
                        <span><i class="la la-ticket text-warning me-2"></i> Formulir Reservasi Publik</span>
                        <i class="la la-external-link text-muted"></i>
                    </a>
                    <a href="{{ route('saran-aduan.index') }}" target="_blank" class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">
                        <span><i class="la la-bullhorn text-danger me-2"></i> Saran & SPAN LAPOR</span>
                        <i class="la la-external-link text-muted"></i>
                    </a>
                    <a href="{{ route('about-us') }}" target="_blank" class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">
                        <span><i class="la la-institution text-secondary me-2"></i> Profil & Sejarah Museum</span>
                        <i class="la la-external-link text-muted"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
