@extends('layouts.canva')

@section('title', 'Tanda Terima E-Tiket Reservasi - Museum Penerangan')

@section('content')
<section class="py-5" style="background-color: var(--muspen-bg-base);">
    <div class="container py-4">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <!-- Success Header -->
                <div class="text-center mb-5">
                    <div class="d-inline-flex align-items-center justify-content-center text-white mb-3" style="width: 76px; height: 76px; background-color: var(--muspen-bg-card); border: 2px solid #FFFFFF; border-radius: 50%;">
                        <i class="fa-solid fa-check fs-2"></i>
                    </div>
                    <h2 class="page-title mb-2">Permohonan Reservasi Berhasil Diajukan</h2>
                    <p class="text-white-50 mx-auto" style="max-width: 600px;">
                        Tanda terima registrasi kunjungan Anda telah diterbitkan. Simpan Kode Booking berikut untuk ditunjukkan ke resepsionis front-office atau mengecek status persetujuan.
                    </p>
                </div>

                <!-- E-Ticket Card (British Museum Admission Style) -->
                <div class="muspen-card p-4 p-md-5 mb-4 position-relative" id="e-ticket-card" style="background-color: var(--muspen-bg-card); border: 1px solid var(--muspen-border-strong);">
                    <div class="d-flex flex-wrap justify-content-between align-items-center border-bottom pb-4 mb-4" style="border-color: var(--muspen-border) !important;">
                        <div class="d-flex align-items-center gap-3">
                            <img src="{{ asset('images/black-logo.png') }}" alt="Logo Museum Penerangan" style="height: 42px; width: auto; object-fit: contain;">
                            <div>
                                <h5 class="mb-0 fw-bold text-white text-uppercase" style="letter-spacing: 0.08em; font-family: var(--muspen-font-serif);">E-TIKET RESERVASI KUNJUNGAN</h5>
                                <small class="text-white-50">Museum Penerangan • Taman Mini Indonesia Indah</small>
                            </div>
                        </div>
                        <div class="text-end mt-3 mt-md-0">
                            <small class="text-white-50 d-block text-uppercase" style="font-size: 0.7rem; letter-spacing: 0.1em;">Kode Akses</small>
                            <span class="badge font-monospace fs-5 px-3 py-1" style="background-color: #FFFFFF; color: #06111E;">
                                {{ $booking->booking_code }}
                            </span>
                        </div>
                    </div>

                    <div class="row g-4 mb-4 text-white">
                        <div class="col-sm-6">
                            <small class="text-white-50 d-block text-uppercase" style="font-size: 0.75rem; letter-spacing: 0.05em;">Nama PIC / Pemohon</small>
                            <span class="fw-bold fs-6">{{ $booking->name }}</span>
                        </div>
                        <div class="col-sm-6">
                            <small class="text-white-50 d-block text-uppercase" style="font-size: 0.75rem; letter-spacing: 0.05em;">Instansi / Sekolah / Komunitas</small>
                            <span class="fw-bold fs-6">{{ $booking->place }}</span>
                        </div>
                        <div class="col-sm-6">
                            <small class="text-white-50 d-block text-uppercase" style="font-size: 0.75rem; letter-spacing: 0.05em;">Tanggal Kunjungan</small>
                            <span class="fw-bold fs-6 text-white">
                                <i class="fa-regular fa-calendar me-1 text-white-50"></i>
                                {{ $booking->date ? $booking->date->format('l, d F Y') : '-' }}
                            </span>
                        </div>
                        <div class="col-sm-6">
                            <small class="text-white-50 d-block text-uppercase" style="font-size: 0.75rem; letter-spacing: 0.05em;">Sesi Waktu Kunjungan</small>
                            <span class="fw-bold fs-6">{{ $booking->session_type }}</span>
                        </div>
                        <div class="col-sm-6">
                            <small class="text-white-50 d-block text-uppercase" style="font-size: 0.75rem; letter-spacing: 0.05em;">Jumlah Rombongan</small>
                            <span class="fw-bold fs-6">{{ $booking->visitor }} Orang</span>
                        </div>
                        <div class="col-sm-6">
                            <small class="text-white-50 d-block text-uppercase" style="font-size: 0.75rem; letter-spacing: 0.05em;">Status Verifikasi</small>
                            <span class="badge {{ $booking->approval_status == 'APPROVED' ? 'bg-success text-white' : ($booking->approval_status == 'REJECTED' ? 'bg-danger text-white' : 'bg-warning text-dark') }} font-monospace px-3 py-1">
                                {{ $booking->approval_status ?: 'MENUNGGU VERIFIKASI (PENDING)' }}
                            </span>
                        </div>
                    </div>

                    @if($booking->event)
                        <div class="p-3 mb-4 rounded-1" style="background-color: #06111E; border: 1px solid var(--muspen-border);">
                            <small class="text-white-50 d-block">Kegiatan Terkait:</small>
                            <strong class="text-white">{{ $booking->event->name }}</strong>
                        </div>
                    @endif

                    <div class="p-3 rounded-1 small" style="background-color: rgba(255,255,255,0.04); border: 1px solid var(--muspen-border); color: #CBD5E1;">
                        <i class="fa-solid fa-circle-info text-white me-1"></i>
                        Tunjukkan kode reservasi digital ini kepada petugas penerima tamu di lobi utama Museum Penerangan. Tiket masuk museum adalah <strong>Gratis / Bebas Biaya</strong>.
                    </div>
                </div>

                <!-- Action Buttons -->
                <div class="d-flex flex-wrap justify-content-center gap-3">
                    <button type="button" class="btn btn-outline-white" onclick="window.print()">
                        <i class="fa-solid fa-print me-2"></i> Cetak Dokumen E-Tiket
                    </button>
                    <a href="{{ route('booking.check', ['query' => $booking->booking_code]) }}" class="btn btn-primary">
                        <i class="fa-solid fa-magnifying-glass me-2"></i> Cek Status Reservasi
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
