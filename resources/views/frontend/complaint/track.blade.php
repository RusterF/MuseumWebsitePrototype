@extends('layouts.canva')

@section('title', 'Lacak Status Pengaduan')

@section('content')
<!-- Header Banner -->
<section class="page-header-canva">
    <div class="container">
        <!-- Breadcrumb -->
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb-canva mb-3">
                <li><a href="{{ route('home') }}">Beranda</a></li>
                <li><a href="{{ route('saran-aduan.index') }}">Pengaduan</a></li>
                <li class="current">Lacak Status</li>
            </ol>
        </nav>

        <span class="badge-canva mb-2 text-uppercase fw-bold" style="background-color: rgba(255,255,255,0.12); color: #FFFFFF; border-color: rgba(255,255,255,0.25);">
            <i class="fa-solid fa-receipt me-1"></i> Monitoring Aspirasi Publik
        </span>
        <h1 class="display-5 fw-bold text-white mb-2">Lacak Status Pengaduan & Saran</h1>
        <p class="page-lead">
            Transparansi akuntabilitas penanganan keluhan, saran masyarakat, dan permohonan informasi publik di Museum Penerangan.
        </p>
    </div>
</section>

<section class="section-py bg-white">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <!-- Search Box -->
                <div class="card-canva p-4 p-md-5 mb-5 shadow-sm" style="background-color: #F8FAFC;">
                    <form method="GET" action="{{ route('saran-aduan.track') }}" class="form-canva">
                        <label for="track_ticket" class="form-label text-dark fw-bold mb-2">
                            <i class="fa-solid fa-ticket me-2 text-primary"></i> Masukkan Nomor Tiket Aduan atau Alamat Email
                        </label>
                        <div class="input-group">
                            <span class="input-group-text bg-white text-muted border-end-0">
                                <i class="fa-solid fa-hashtag"></i>
                            </span>
                            <input type="text" id="track_ticket" name="ticket" value="{{ request('ticket') }}" class="form-control border-start-0" placeholder="Contoh: ADUAN-20260929-0012 atau email@domain.com" required>
                            <button type="submit" class="btn-canva-primary px-4 fw-bold">
                                Lacak Status
                            </button>
                        </div>
                        <div class="form-text mt-2 text-muted">
                            Nomor tiket tercantum pada tanda terima pengaduan yang dikirimkan ke email Anda.
                        </div>
                    </form>
                </div>

                @if($searched)
                    @if($complaint)
                        <div class="card-canva p-4 p-md-5 shadow-sm border-top border-4 border-primary">
                            <div class="d-flex justify-content-between align-items-center border-bottom pb-3 mb-4 flex-wrap gap-2">
                                <div>
                                    <small class="text-muted d-block text-uppercase fw-semibold" style="font-size: 0.72rem; letter-spacing: 0.08em;">Nomor Tiket Resmi</small>
                                    <span class="font-monospace fs-4 fw-bold text-primary">
                                        {{ $complaint->ticket_number }}
                                    </span>
                                </div>
                                <div>
                                    <span class="badge-canva fs-6 px-3 py-2">
                                        {{ $complaint->type ?: 'PROSES' }}
                                    </span>
                                </div>
                            </div>

                            <h4 class="fw-bold mb-2 text-dark">{{ $complaint->title }}</h4>
                            <div class="text-muted small mb-4">
                                <span><i class="fa-regular fa-calendar me-1"></i> {{ $complaint->created_at ? $complaint->created_at->format('d M Y, H:i') : '' }} WIB</span>
                                <span class="ms-3"><i class="fa-solid fa-tag me-1"></i> {{ $complaint->category }}</span>
                            </div>

                            <div class="p-3 mb-4 border" style="background-color: #F8FAFC;">
                                <small class="text-muted d-block mb-1 text-uppercase fw-semibold" style="font-size: 0.72rem;">Rincian Laporan:</small>
                                <p class="text-dark mb-0 small" style="line-height: 1.7;">{{ $complaint->body }}</p>
                            </div>

                            <!-- Progress Timeline -->
                            <div class="p-4 border mb-4" style="background-color: #F8FAFC;">
                                <h6 class="fw-bold mb-3 text-dark text-uppercase" style="letter-spacing: 0.05em; font-size: 0.8rem;">
                                    Tahapan Tindak Lanjut:
                                </h6>
                                <div class="d-flex align-items-center gap-2 gap-md-3">
                                    <div class="d-flex align-items-center gap-2 text-success fw-bold small">
                                        <i class="fa-solid fa-circle-check fs-5"></i> 1. Diterima
                                    </div>
                                    <div class="flex-grow-1 border-top border-2 border-primary"></div>
                                    <div class="d-flex align-items-center gap-2 text-primary fw-bold small">
                                        <i class="fa-solid fa-arrows-rotate fa-spin fs-5"></i> 2. Penelaahan
                                    </div>
                                    <div class="flex-grow-1 border-top border-2 border-secondary border-opacity-25"></div>
                                    <div class="d-flex align-items-center gap-2 text-muted small">
                                        <i class="fa-regular fa-circle fs-5"></i> 3. Selesai
                                    </div>
                                </div>
                            </div>

                            <div class="d-flex justify-content-between align-items-center pt-3 border-top flex-wrap gap-2">
                                <span class="text-muted small">Terakhir diperbarui: {{ $complaint->updated_at ? $complaint->updated_at->diffForHumans() : 'Baru saja' }}</span>
                                <a href="{{ route('saran-aduan.index') }}" class="btn-canva-outline btn-sm">
                                    Buat Pengaduan Baru
                                </a>
                            </div>
                        </div>
                    @else
                        <div class="empty-state-canva card-canva shadow-sm">
                            <i class="fa-solid fa-circle-exclamation text-warning"></i>
                            <h3>Nomor Tiket Tidak Ditemukan</h3>
                            <p>Pastikan nomor tiket atau alamat email yang Anda masukkan sesuai saat mengajukan permohonan/pengaduan.</p>
                            <a href="{{ route('saran-aduan.index') }}" class="btn-canva-primary btn-sm">
                                <i class="fa-solid fa-plus me-1"></i> Buat Pengaduan Baru
                            </a>
                        </div>
                    @endif
                @endif
            </div>
        </div>
    </div>
</section>
@endsection
