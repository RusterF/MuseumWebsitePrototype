@extends('layouts.canva')

@section('title', 'Cek Status Reservasi Kunjungan - Museum Penerangan')

@section('content')
<!-- Header Banner (British Museum Institutional Style) -->
<section class="page-header-clean">
    <div class="container">
        <div class="section-badge"><i class="fa-solid fa-magnifying-glass me-2"></i> Layanan Tiket & Reservasi</div>
        <h1 class="page-title">Pengecekan Status Reservasi</h1>
        <p class="page-lead">
            Ketikkan Kode Booking resmi atau alamat email PIC untuk memeriksa status verifikasi kunjungan rombongan Anda di Museum Penerangan.
        </p>
    </div>
</section>

<section class="py-5" style="background-color: var(--muspen-bg-base);">
    <div class="container py-3">
        <div class="row justify-content-center">
            <div class="col-lg-7">
                <!-- Search Box -->
                <div class="muspen-card p-4 p-md-5 mb-5" style="background-color: var(--muspen-bg-surface); border: 1px solid var(--muspen-border);">
                    <form method="GET" action="{{ route('booking.check') }}">
                        <label class="form-label text-white fw-semibold mb-2" style="font-size: 0.95rem;">
                            <i class="fa-solid fa-ticket me-2 text-white-50"></i> Masukkan Kode Booking / Email PIC
                        </label>
                        <div class="input-group">
                            <span class="input-group-text text-white-50" style="background-color: #06111E; border-color: var(--muspen-border); border-right: none;">
                                <i class="fa-solid fa-hashtag"></i>
                            </span>
                            <input type="text" name="query" value="{{ request('query') }}" class="form-control" placeholder="Contoh: MP-20260929-0099 atau email@domain.com" required style="background-color: #06111E; color: #FFFFFF; border-color: var(--muspen-border); border-left: none;">
                            <button type="submit" class="btn btn-primary px-4 fw-bold">
                                <i class="fa-solid fa-arrow-right me-1"></i> Periksa
                            </button>
                        </div>
                    </form>
                </div>

                <!-- Result Card -->
                @if($searched)
                    @if($booking)
                        <div class="muspen-card p-4 p-md-5" style="background-color: var(--muspen-bg-card); border: 1px solid var(--muspen-border-strong);">
                            <div class="d-flex justify-content-between align-items-center border-bottom pb-3 mb-4" style="border-color: var(--muspen-border) !important;">
                                <div>
                                    <small class="text-white-50 d-block text-uppercase" style="font-size: 0.7rem; letter-spacing: 0.1em;">Kode Reservasi</small>
                                    <span class="font-monospace fs-5 fw-bold text-white">
                                        {{ $booking->booking_code }}
                                    </span>
                                </div>
                                <div>
                                    <span class="badge {{ $booking->approval_status == 'APPROVED' ? 'bg-success text-white' : ($booking->approval_status == 'REJECTED' ? 'bg-danger text-white' : 'bg-warning text-dark') }} font-monospace px-3 py-2 fs-6">
                                        {{ $booking->approval_status ?: 'MENUNGGU VERIFIKASI' }}
                                    </span>
                                </div>
                            </div>

                            <div class="row g-3 mb-4 text-white">
                                <div class="col-sm-6">
                                    <small class="text-white-50 d-block">Nama Pemesan / PIC:</small>
                                    <span class="fw-bold fs-6">{{ $booking->name }}</span>
                                </div>
                                <div class="col-sm-6">
                                    <small class="text-white-50 d-block">Instansi / Asal:</small>
                                    <span class="fw-bold fs-6">{{ $booking->place }}</span>
                                </div>
                                <div class="col-sm-6">
                                    <small class="text-white-50 d-block">Tanggal Kunjungan:</small>
                                    <span class="fw-bold fs-6 text-white">
                                        <i class="fa-regular fa-calendar me-1 text-white-50"></i> {{ $booking->date ? $booking->date->format('l, d F Y') : '-' }}
                                    </span>
                                </div>
                                <div class="col-sm-6">
                                    <small class="text-white-50 d-block">Sesi Waktu Kunjungan:</small>
                                    <span class="fw-bold fs-6">{{ $booking->session_type }}</span>
                                </div>
                                <div class="col-sm-6">
                                    <small class="text-white-50 d-block">Jumlah Rombongan:</small>
                                    <span class="fw-bold fs-6">{{ $booking->visitor }} Orang</span>
                                </div>
                                <div class="col-sm-6">
                                    <small class="text-white-50 d-block">Kategori Delegasi:</small>
                                    <span class="fw-bold fs-6">{{ $booking->category }}</span>
                                </div>
                            </div>

                            @if($booking->approval_status == 'APPROVED')
                                <div class="p-3 mb-4 d-flex align-items-center gap-3" style="background-color: rgba(16, 185, 129, 0.15); border: 1px solid rgba(16, 185, 129, 0.4); border-radius: 4px; color: #FFFFFF;">
                                    <i class="fa-solid fa-circle-check fs-2 text-success"></i>
                                    <div>
                                        <strong class="d-block mb-1">Reservasi Anda Telah Disetujui!</strong>
                                        <div class="small opacity-75">Silakan hadir sesuai jadwal dan sesi yang ditentukan. Tunjukkan bukti ini kepada petugas front-office Museum Penerangan TMII.</div>
                                    </div>
                                </div>
                            @elseif($booking->approval_status == 'REJECTED')
                                <div class="p-3 mb-4 d-flex align-items-center gap-3" style="background-color: rgba(239, 68, 68, 0.15); border: 1px solid rgba(239, 68, 68, 0.4); border-radius: 4px; color: #FFFFFF;">
                                    <i class="fa-solid fa-circle-xmark fs-2 text-danger"></i>
                                    <div>
                                        <strong class="d-block mb-1">Permohonan Belum Dapat Disetujui</strong>
                                        <div class="small opacity-75">Mohon maaf, kuota pada tanggal/sesi tersebut telah penuh atau terjadi bentrok jadwal kedinasan. Silakan mengajukan pada tanggal lain.</div>
                                    </div>
                                </div>
                            @else
                                <div class="p-3 mb-4 d-flex align-items-center gap-3" style="background-color: rgba(245, 158, 11, 0.15); border: 1px solid rgba(245, 158, 11, 0.4); border-radius: 4px; color: #FFFFFF;">
                                    <i class="fa-solid fa-clock-rotate-left fs-2 text-warning"></i>
                                    <div>
                                        <strong class="d-block mb-1">Sedang Dalam Proses Peninjauan Petugas</strong>
                                        <div class="small opacity-75">Permohonan reservasi Anda sedang dalam antrean verifikasi tim kurasi dan administrasi Museum Penerangan. Mohon periksa kembali secara berkala.</div>
                                    </div>
                                </div>
                            @endif

                            <div class="d-flex justify-content-end gap-2 mt-4 pt-3 border-top" style="border-color: var(--muspen-border) !important;">
                                <a href="{{ route('booking.success', $booking->id) }}" class="btn btn-outline-white btn-sm">
                                    <i class="fa-solid fa-ticket me-1"></i> Buka E-Tiket Lengkap
                                </a>
                            </div>
                        </div>
                    @else
                        <div class="muspen-card text-center p-5" style="background-color: var(--muspen-bg-card); border: 1px solid var(--muspen-border);">
                            <i class="fa-solid fa-magnifying-glass fa-2x mb-3 text-white-50"></i>
                            <h4 class="fw-bold text-white mb-2" style="font-family: var(--muspen-font-serif);">Data Reservasi Tidak Ditemukan</h4>
                            <p class="mb-0 text-white-50">Pastikan Kode Booking atau email PIC yang Anda masukkan sudah sesuai saat pendaftaran permohonan.</p>
                        </div>
                    @endif
                @endif
            </div>
        </div>
    </div>
</section>
@endsection
