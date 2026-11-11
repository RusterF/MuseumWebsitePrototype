@extends('layouts.canva')

@section('title', 'Tanda Terima Pengaduan - Museum Penerangan')

@section('content')
<section class="py-5" style="background-color: var(--muspen-bg-base);">
    <div class="container py-4">
        <div class="row justify-content-center">
            <div class="col-lg-7">
                <div class="text-center mb-5">
                    <div class="d-inline-flex align-items-center justify-content-center text-white mb-3" style="width: 76px; height: 76px; background-color: var(--muspen-bg-card); border: 2px solid #FFFFFF; border-radius: 50%;">
                        <i class="fa-solid fa-envelope-circle-check fs-2"></i>
                    </div>
                    <h2 class="page-title mb-2">Laporan Anda Telah Diterima</h2>
                    <p class="text-white-50 mx-auto" style="max-width: 580px;">
                        Terima kasih atas partisipasi aktif Anda. Aspirasi dan masukan Anda sangat berharga bagi pemeliharaan dan peningkatan kualitas pelayanan Museum Penerangan.
                    </p>
                </div>

                <div class="muspen-card p-4 p-md-5 mb-4" style="background-color: var(--muspen-bg-card); border: 1px solid var(--muspen-border-strong);">
                    <div class="d-flex justify-content-between align-items-center border-bottom pb-3 mb-4" style="border-color: var(--muspen-border) !important;">
                        <span class="small text-white-50 text-uppercase" style="letter-spacing: 0.08em;">Nomor Tiket Aduan Resmi</span>
                        <span class="badge font-monospace fs-6 px-3 py-1" style="background-color: #FFFFFF; color: #06111E;">
                            {{ $complaint->ticket_number }}
                        </span>
                    </div>

                    <div class="mb-4">
                        <small class="text-white-50 d-block text-uppercase" style="font-size: 0.75rem; letter-spacing: 0.05em;">Perihal / Topik</small>
                        <h4 class="fw-bold text-white mb-0" style="font-family: var(--muspen-font-serif);">{{ $complaint->title }}</h4>
                    </div>

                    <div class="row g-3 mb-4 text-white">
                        <div class="col-sm-6">
                            <small class="text-white-50 d-block text-uppercase" style="font-size: 0.75rem; letter-spacing: 0.05em;">Jenis Laporan</small>
                            <span class="badge mt-1" style="background-color: rgba(255,255,255,0.08); color: #FFFFFF; border: 1px solid var(--muspen-border);">{{ $complaint->type }}</span>
                        </div>
                        <div class="col-sm-6">
                            <small class="text-white-50 d-block text-uppercase" style="font-size: 0.75rem; letter-spacing: 0.05em;">Kategori Pelayanan</small>
                            <span class="fw-bold fs-6">{{ $complaint->category }}</span>
                        </div>
                        <div class="col-sm-6">
                            <small class="text-white-50 d-block text-uppercase" style="font-size: 0.75rem; letter-spacing: 0.05em;">Tanggal Registrasi</small>
                            <span><i class="fa-regular fa-calendar me-1 text-white-50"></i> {{ $complaint->created_at ? $complaint->created_at->format('d M Y, H:i') : now()->format('d M Y') }} WIB</span>
                        </div>
                        <div class="col-sm-6">
                            <small class="text-white-50 d-block text-uppercase" style="font-size: 0.75rem; letter-spacing: 0.05em;">Status Penanganan</small>
                            <span class="badge mt-1" style="background: rgba(255,255,255,0.12); color: #FFFFFF; font-family: monospace;">DITERIMA (PROSES)</span>
                        </div>
                    </div>

                    <div class="p-3 mb-3 rounded-1" style="background-color: #06111E; border: 1px solid var(--muspen-border);">
                        <small class="text-white-50 d-block mb-1 text-uppercase" style="font-size: 0.75rem; letter-spacing: 0.05em;">Rincian Pesan:</small>
                        <p class="text-white mb-0 small" style="line-height: 1.7;">{{ $complaint->body }}</p>
                    </div>

                    <div class="p-3 rounded-1 small" style="background-color: rgba(255,255,255,0.04); border: 1px solid var(--muspen-border); color: #CBD5E1;">
                        <i class="fa-solid fa-circle-info text-white me-1"></i>
                        Simpan nomor tiket <strong>{{ $complaint->ticket_number }}</strong>. Anda dapat menggunakannya sewaktu-waktu di halaman Lacak Status Aduan.
                    </div>
                </div>

                <div class="d-flex justify-content-center gap-3">
                    <a href="{{ route('saran-aduan.track', ['ticket' => $complaint->ticket_number]) }}" class="btn btn-primary">
                        <i class="fa-solid fa-magnifying-glass me-2"></i> Pantau Status Tiket
                    </a>
                    <a href="{{ route('home') }}" class="btn btn-outline-white">
                        Kembali ke Beranda
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
