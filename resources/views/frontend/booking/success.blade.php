@extends('layouts.canva')

@section('title', 'Tanda Terima E-Tiket Reservasi - Museum Penerangan')

@section('content')
<section class="section-py bg-light">
    <div class="container py-2">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <!-- Success Header -->
                <div class="success-state-canva mb-4 py-3">
                    <i class="fa-solid fa-circle-check"></i>
                    <h2>Permohonan Reservasi Berhasil Diajukan</h2>
                    <p>
                        Tanda terima registrasi kunjungan Anda telah diterbitkan. Simpan Kode Booking berikut untuk ditunjukkan ke petugas di lobi utama atau untuk memeriksa status persetujuan.
                    </p>
                </div>

                <!-- E-Ticket Card -->
                <div class="card-canva p-4 p-md-5 mb-4 position-relative shadow-sm border-top border-4 border-primary" id="e-ticket-card" style="background-color: #FFFFFF;">
                    <div class="d-flex flex-wrap justify-content-between align-items-center border-bottom pb-4 mb-4 gap-3">
                        <div class="d-flex align-items-center gap-3">
                            <img src="{{ asset('images/color-logo.png') }}" alt="Logo Museum Penerangan" style="height: 48px; width: auto; object-fit: contain;">
                            <div>
                                <h5 class="mb-0 fw-bold text-dark text-uppercase" style="letter-spacing: 0.05em;">E-TIKET RESERVASI KUNJUNGAN</h5>
                                <small class="text-muted">Museum Penerangan &bull; Taman Mini Indonesia Indah</small>
                            </div>
                        </div>
                        <div class="text-md-end">
                            <small class="text-muted d-block text-uppercase fw-semibold" style="font-size: 0.72rem; letter-spacing: 0.08em;">Kode Akses</small>
                            <span class="badge-canva font-monospace fs-5 px-3 py-1">
                                {{ $booking->booking_code }}
                            </span>
                        </div>
                    </div>

                    <div class="row g-4 mb-4 text-dark">
                        <div class="col-sm-6">
                            <small class="text-muted d-block text-uppercase fw-semibold" style="font-size: 0.72rem;">Nama PIC / Pemohon</small>
                            <span class="fw-bold fs-6">{{ $booking->name }}</span>
                        </div>
                        <div class="col-sm-6">
                            <small class="text-muted d-block text-uppercase fw-semibold" style="font-size: 0.72rem;">Instansi / Sekolah / Komunitas</small>
                            <span class="fw-bold fs-6">{{ $booking->place }}</span>
                        </div>
                        <div class="col-sm-6">
                            <small class="text-muted d-block text-uppercase fw-semibold" style="font-size: 0.72rem;">Tanggal Kunjungan</small>
                            <span class="fw-bold fs-6 text-primary">
                                <i class="fa-regular fa-calendar me-1"></i>
                                {{ $booking->date ? $booking->date->format('l, d F Y') : '-' }}
                            </span>
                        </div>
                        <div class="col-sm-6">
                            <small class="text-muted d-block text-uppercase fw-semibold" style="font-size: 0.72rem;">Sesi Waktu Kunjungan</small>
                            <span class="fw-bold fs-6">{{ $booking->session_type }}</span>
                        </div>
                        <div class="col-sm-6">
                            <small class="text-muted d-block text-uppercase fw-semibold" style="font-size: 0.72rem;">Jumlah Rombongan</small>
                            <span class="fw-bold fs-6">{{ $booking->visitor }} Orang</span>
                        </div>
                        <div class="col-sm-6">
                            <small class="text-muted d-block text-uppercase fw-semibold" style="font-size: 0.72rem;">Status Verifikasi</small>
                            <div>
                                @if($booking->approval_status == 'APPROVED')
                                    <span class="badge-canva-success fs-6 px-3 py-1">
                                        <i class="fa-solid fa-circle-check me-1"></i> DISETUJUI
                                    </span>
                                @elseif($booking->approval_status == 'REJECTED')
                                    <span class="badge-canva-danger fs-6 px-3 py-1">
                                        <i class="fa-solid fa-circle-xmark me-1"></i> TIDAK DISETUJUI
                                    </span>
                                @else
                                    <span class="badge-canva-warning fs-6 px-3 py-1">
                                        <i class="fa-solid fa-clock me-1"></i> MENUNGGU VERIFIKASI
                                    </span>
                                @endif
                            </div>
                        </div>
                    </div>

                    @if($booking->event)
                        <div class="p-3 mb-4 border" style="background-color: #F8FAFC;">
                            <small class="text-muted d-block fw-semibold">Agenda Kegiatan Terkait:</small>
                            <strong class="text-dark">{{ $booking->event->name }}</strong>
                        </div>
                    @endif

                    <div class="p-3 border small" style="background-color: #F8FAFC; color: #475569;">
                        <i class="fa-solid fa-circle-info text-primary me-1"></i>
                        Tunjukkan kode reservasi digital ini kepada petugas penerima tamu di lobi utama Museum Penerangan. Tiket masuk museum adalah <strong>Gratis / Bebas Biaya</strong>.
                    </div>
                </div>

                <!-- Action Buttons -->
                <div class="d-flex flex-wrap justify-content-center gap-3">
                    <button type="button" class="btn-canva-outline" onclick="window.print()">
                        <i class="fa-solid fa-print me-2"></i> Cetak Dokumen E-Tiket
                    </button>
                    <a href="{{ route('booking.create') }}" class="btn-canva-primary">
                        <i class="fa-solid fa-arrow-left me-2"></i> Kembali ke Layanan Reservasi
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
