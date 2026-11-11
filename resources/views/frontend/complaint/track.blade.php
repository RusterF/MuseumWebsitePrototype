@extends('layouts.canva')

@section('title', 'Lacak Status Pengaduan - Museum Penerangan')

@section('content')
<!-- Header Banner (British Museum Institutional Style) -->
<section class="page-header-clean">
    <div class="container">
        <div class="section-badge"><i class="fa-solid fa-receipt me-2"></i> Monitoring Aspirasi Publik</div>
        <h1 class="page-title">Lacak Status Pengaduan & Saran</h1>
        <p class="page-lead">
            Transparansi akuntabilitas penanganan keluhan, saran masyarakat, dan permohonan informasi publik di Museum Penerangan.
        </p>
    </div>
</section>

<section class="py-5" style="background-color: var(--muspen-bg-base);">
    <div class="container py-3">
        <div class="row justify-content-center">
            <div class="col-lg-7">
                <!-- Search Box -->
                <div class="muspen-card p-4 p-md-5 mb-5" style="background-color: var(--muspen-bg-surface); border: 1px solid var(--muspen-border);">
                    <form method="GET" action="{{ route('saran-aduan.track') }}">
                        <label class="form-label text-white fw-semibold mb-2">
                            <i class="fa-solid fa-ticket me-2 text-white-50"></i> Nomor Tiket Aduan / Email Pelapor
                        </label>
                        <div class="input-group">
                            <span class="input-group-text text-white-50" style="background-color: #06111E; border-color: var(--muspen-border); border-right: none;">
                                <i class="fa-solid fa-hashtag"></i>
                            </span>
                            <input type="text" name="ticket" value="{{ request('ticket') }}" class="form-control" placeholder="Contoh: ADUAN-20260929-0012 atau email@domain.com" required style="background-color: #06111E; color: #FFFFFF; border-color: var(--muspen-border); border-left: none;">
                            <button type="submit" class="btn btn-primary px-4 fw-bold">Lacak Status</button>
                        </div>
                    </form>
                </div>

                @if($searched)
                    @if($complaint)
                        <div class="muspen-card p-4 p-md-5" style="background-color: var(--muspen-bg-card); border: 1px solid var(--muspen-border-strong);">
                            <div class="d-flex justify-content-between align-items-center border-bottom pb-3 mb-4" style="border-color: var(--muspen-border) !important;">
                                <div>
                                    <small class="text-white-50 d-block text-uppercase" style="font-size: 0.7rem; letter-spacing: 0.1em;">Nomor Registrasi Tiket</small>
                                    <span class="font-monospace fs-5 fw-bold text-white">
                                        {{ $complaint->ticket_number }}
                                    </span>
                                </div>
                                <div>
                                    <span class="badge font-monospace px-3 py-2 fs-6" style="background-color: rgba(255,255,255,0.12); color: #FFFFFF; border: 1px solid var(--muspen-border);">
                                        {{ $complaint->type ?: 'PROSES' }}
                                    </span>
                                </div>
                            </div>

                            <h3 class="fw-bold mb-2 text-white" style="font-family: var(--muspen-font-serif);">{{ $complaint->title }}</h3>
                            <div class="text-white-50 small mb-4">
                                <span><i class="fa-regular fa-calendar me-1"></i> {{ $complaint->created_at ? $complaint->created_at->format('d M Y, H:i') : '' }} WIB</span>
                                <span class="ms-3"><i class="fa-solid fa-tag me-1"></i> {{ $complaint->category }}</span>
                            </div>

                            <div class="p-3 mb-4 rounded-1" style="background-color: #06111E; border: 1px solid var(--muspen-border);">
                                <small class="text-white-50 d-block mb-1 text-uppercase" style="font-size: 0.75rem; letter-spacing: 0.05em;">Rincian Laporan:</small>
                                <p class="text-white mb-0 small" style="line-height: 1.7;">{{ $complaint->body }}</p>
                            </div>

                            <!-- Progress Timeline -->
                            <div class="p-4 rounded-1" style="background-color: rgba(255,255,255,0.03); border: 1px solid var(--muspen-border);">
                                <h6 class="fw-bold mb-3 text-white text-uppercase" style="letter-spacing: 0.08em; font-size: 0.8rem;">Tahapan Tindak Lanjut:</h6>
                                <div class="d-flex align-items-center gap-3">
                                    <div class="d-flex align-items-center gap-2 text-white fw-bold small">
                                        <i class="fa-solid fa-circle-check fs-5"></i> 1. Diterima
                                    </div>
                                    <div class="flex-grow-1 border-top" style="border-color: rgba(255,255,255,0.4) !important;"></div>
                                    <div class="d-flex align-items-center gap-2 text-white fw-bold small">
                                        <i class="fa-solid fa-arrows-rotate fa-spin fs-5"></i> 2. Penelaahan
                                    </div>
                                    <div class="flex-grow-1 border-top" style="border-color: rgba(255,255,255,0.15) !important;"></div>
                                    <div class="d-flex align-items-center gap-2 text-white-50 small">
                                        <i class="fa-regular fa-circle fs-5"></i> 3. Selesai
                                    </div>
                                </div>
                            </div>
                        </div>
                    @else
                        <div class="muspen-card text-center p-5" style="background-color: var(--muspen-bg-card); border: 1px solid var(--muspen-border);">
                            <i class="fa-solid fa-circle-exclamation fa-2x mb-3 text-white-50"></i>
                            <h4 class="fw-bold text-white mb-2" style="font-family: var(--muspen-font-serif);">Nomor Tiket Tidak Ditemukan</h4>
                            <p class="mb-0 text-white-50">Pastikan nomor tiket atau alamat email yang Anda masukkan sesuai saat mengajukan permohonan/pengaduan.</p>
                        </div>
                    @endif
                @endif
            </div>
        </div>
    </div>
</section>
@endsection
