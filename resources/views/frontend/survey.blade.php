@extends('layouts.canva')

@section('title', 'Survei Kepuasan Pengunjung')

@section('content')
<div class="container py-4">
    <!-- Blue Title (Canva Page 13) -->
    <h2 class="title-blue mb-4">Survei Kepuasan Pengunjung</h2>

    <!-- Top Banner: Children Walking in Front of Fountain (Canva Page 13) -->
    <div class="mb-5 overflow-hidden shadow-sm" style="max-height: 450px; border: 1px solid #e2e8f0; border-radius: 0 !important;">
        <img src="{{ asset('images/WebMuspenBaruImages/SurveiKepuasanPengunjung.png') }}" alt="Survei Kepuasan Pengunjung Museum Penerangan" class="w-100 h-100" style="object-fit: cover; border-radius: 0 !important;">
    </div>

    <!-- Survey Form (Canva Page 13) -->
    <div class="row justify-content-center">
        <div class="col-lg-8">
            @if(session('success'))
                <div class="alert alert-success d-flex align-items-center mb-4" style="border-radius: 0 !important;">
                    <i class="fa-solid fa-circle-check fs-4 me-3 text-success"></i>
                    <div>
                        <strong>Berhasil Dikirim!</strong> {{ session('success') }}
                    </div>
                </div>
            @endif

            <form method="POST" action="{{ route('survey.store') }}">
                @csrf

                <!-- Nama -->
                <div class="mb-3">
                    <label class="form-label small fw-bold text-dark">Nama</label>
                    <input type="text" name="name" class="form-control" value="{{ old('name') }}" placeholder="...." required style="border-radius: 0 !important; background-color: #f8fafc; border-color: #e2e8f0;">
                </div>

                <!-- Nomor Telepon -->
                <div class="mb-3">
                    <label class="form-label small fw-bold text-dark">Nomor Telepon</label>
                    <input type="text" name="phone" class="form-control" value="{{ old('phone') }}" placeholder="...." style="border-radius: 0 !important; background-color: #f8fafc; border-color: #e2e8f0;">
                </div>

                <!-- Rating 1: Pameran -->
                <div class="mb-3">
                    <label class="form-label small fw-bold text-dark">Kualitas Materi Koleksi & Daya Tarik Pameran</label>
                    <div class="p-2 border bg-light d-flex gap-4 align-items-center" style="border-radius: 0 !important; border-color: #e2e8f0;">
                        @for($i = 1; $i <= 5; $i++)
                            <div class="form-check form-check-inline m-0">
                                <input class="form-check-input" type="radio" name="pameran" id="pameran_{{ $i }}" value="{{ $i }}" {{ old('pameran', 5) == $i ? 'checked' : '' }} required>
                                <label class="form-check-label text-dark small fw-semibold" for="pameran_{{ $i }}">
                                    {{ $i }} <i class="fa-solid fa-star text-warning"></i>
                                </label>
                            </div>
                        @endfor
                    </div>
                </div>

                <!-- Rating 2: Pemandu -->
                <div class="mb-3">
                    <label class="form-label small fw-bold text-dark">Keramahan & Kejelasan Edukasi Pemandu</label>
                    <div class="p-2 border bg-light d-flex gap-4 align-items-center" style="border-radius: 0 !important; border-color: #e2e8f0;">
                        @for($i = 1; $i <= 5; $i++)
                            <div class="form-check form-check-inline m-0">
                                <input class="form-check-input" type="radio" name="pemandu" id="pemandu_{{ $i }}" value="{{ $i }}" {{ old('pemandu', 5) == $i ? 'checked' : '' }} required>
                                <label class="form-check-label text-dark small fw-semibold" for="pemandu_{{ $i }}">
                                    {{ $i }} <i class="fa-solid fa-star text-warning"></i>
                                </label>
                            </div>
                        @endfor
                    </div>
                </div>

                <!-- Rating 3: Fasilitas Museum -->
                <div class="mb-3">
                    <label class="form-label small fw-bold text-dark">Kenyamanan Fasilitas & Lingkungan Museum</label>
                    <div class="p-2 border bg-light d-flex gap-4 align-items-center" style="border-radius: 0 !important; border-color: #e2e8f0;">
                        @for($i = 1; $i <= 5; $i++)
                            <div class="form-check form-check-inline m-0">
                                <input class="form-check-input" type="radio" name="museum" id="museum_{{ $i }}" value="{{ $i }}" {{ old('museum', 5) == $i ? 'checked' : '' }} required>
                                <label class="form-check-label text-dark small fw-semibold" for="museum_{{ $i }}">
                                    {{ $i }} <i class="fa-solid fa-star text-warning"></i>
                                </label>
                            </div>
                        @endfor
                    </div>
                </div>

                <!-- Saran / Masukan (Textarea) -->
                <div class="mb-4">
                    <label class="form-label small fw-bold text-dark">Saran & Masukan</label>
                    <textarea name="saran" rows="5" class="form-control" placeholder="...." style="border-radius: 0 !important; background-color: #f8fafc; border-color: #e2e8f0;">{{ old('saran') }}</textarea>
                </div>

                <!-- Captcha Verification -->
                <div class="mb-4">
                    <label class="form-label small fw-bold text-dark">Kode Keamanan (Captcha) <span class="text-danger">*</span></label>
                    <div class="d-flex align-items-center gap-2 flex-wrap">
                        <img src="{{ captcha_src('mini') }}" alt="Captcha" class="border" id="captcha-img" style="border-radius: 0 !important; height: 38px;">
                        <button type="button" class="btn btn-sm btn-outline-secondary" onclick="refreshCaptcha()" style="border-radius: 0 !important; height: 38px;">
                            <i class="fa-solid fa-arrows-rotate me-1"></i> Ganti
                        </button>
                        <input type="text" name="captcha" class="form-control font-monospace text-uppercase" placeholder="Ketik 4 karakter..." style="max-width: 180px; border-radius: 0 !important;" required>
                    </div>
                </div>

                <!-- Submit Button: "Kirim Survei" (Canva Page 13) -->
                <div class="text-end mb-5">
                    <button type="submit" class="btn btn-primary px-4 py-2 fw-semibold" style="border-radius: 0 !important; background-color: var(--canva-accent-blue); border-color: var(--canva-accent-blue);">
                        Kirim Survei <i class="fa-solid fa-paper-plane ms-2"></i>
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    function refreshCaptcha() {
        fetch('{{ route("refresh-captcha") }}')
            .then(res => res.json())
            .then(data => {
                const img = document.getElementById('captcha-img');
                if (img) img.src = data.captcha;
            });
    }
</script>
@endpush
