@extends('layouts.canva')

@section('title', 'Tanda Terima Pengaduan - Museum Penerangan')

@section('content')
<section class="section-py bg-light">
    <div class="container py-2">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <!-- Success Header -->
                <div class="success-state-canva mb-4 py-3">
                    <i class="fa-solid fa-envelope-circle-check"></i>
                    <h2>Laporan Anda Telah Diterima</h2>
                    <p>
                        Terima kasih atas partisipasi aktif Anda. Aspirasi dan masukan Anda sangat berharga bagi pemeliharaan dan peningkatan kualitas pelayanan Museum Penerangan.
                    </p>
                </div>

                <div class="card-canva p-4 p-md-5 mb-4 shadow-sm border-top border-4 border-primary" style="background-color: #FFFFFF;">
                    <div class="d-flex justify-content-between align-items-center border-bottom pb-3 mb-4 flex-wrap gap-2">
                        <div>
                            <small class="text-muted d-block text-uppercase fw-semibold" style="font-size: 0.72rem; letter-spacing: 0.08em;">Nomor Tiket Aduan Resmi</small>
                            <span class="font-monospace fs-4 fw-bold text-primary">
                                {{ $complaint->ticket_number }}
                            </span>
                        </div>
                        <div>
                            <span class="badge-canva fs-6 px-3 py-1">
                                {{ $complaint->type ?: 'ASPIRASI' }}
                            </span>
                        </div>
                    </div>

                    <div class="mb-4">
                        <small class="text-muted d-block text-uppercase fw-semibold" style="font-size: 0.72rem;">Perihal / Topik</small>
                        <h4 class="fw-bold text-dark mb-0">{{ $complaint->title }}</h4>
                    </div>

                    <div class="row g-4 mb-4 text-dark">
                        <div class="col-sm-6">
                            <small class="text-muted d-block text-uppercase fw-semibold" style="font-size: 0.72rem;">Jenis Laporan</small>
                            <span class="badge-canva mt-1">{{ $complaint->type }}</span>
                        </div>
                        <div class="col-sm-6">
                            <small class="text-muted d-block text-uppercase fw-semibold" style="font-size: 0.72rem;">Kategori Pelayanan</small>
                            <span class="fw-bold fs-6">{{ $complaint->category }}</span>
                        </div>
                        <div class="col-sm-6">
                            <small class="text-muted d-block text-uppercase fw-semibold" style="font-size: 0.72rem;">Tanggal Registrasi</small>
                            <span class="fw-semibold"><i class="fa-regular fa-calendar me-1 text-primary"></i> {{ $complaint->created_at ? $complaint->created_at->format('d M Y, H:i') : now()->format('d M Y') }} WIB</span>
                        </div>
                        <div class="col-sm-6">
                            <small class="text-muted d-block text-uppercase fw-semibold" style="font-size: 0.72rem;">Status Penanganan</small>
                            <span class="badge-canva-warning mt-1 font-monospace">DITERIMA (PROSES PENELAAHAN)</span>
                        </div>
                    </div>

                    <div class="p-3 mb-4 border" style="background-color: #F8FAFC;">
                        <small class="text-muted d-block mb-1 text-uppercase fw-semibold" style="font-size: 0.72rem;">Rincian Pesan:</small>
                        <p class="text-dark mb-0 small" style="line-height: 1.7;">{{ $complaint->body }}</p>
                    </div>

                    <div class="p-3 border small" style="background-color: #F8FAFC; color: #475569;">
                        <i class="fa-solid fa-circle-info text-primary me-1"></i>
                        Simpan nomor tiket <strong>{{ $complaint->ticket_number }}</strong>. Anda dapat menggunakannya sewaktu-waktu di halaman Lacak Status Aduan untuk memantau proses tindak lanjut.
                    </div>
                </div>

                <div class="d-flex justify-content-center gap-3 flex-wrap">
                    <a href="{{ route('saran-aduan.track', ['ticket' => $complaint->ticket_number]) }}" class="btn-canva-primary">
                        <i class="fa-solid fa-magnifying-glass me-2"></i> Pantau Status Tiket
                    </a>
                    <a href="{{ route('home') }}" class="btn-canva-outline">
                        <i class="fa-solid fa-house me-1"></i> Kembali ke Beranda
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
