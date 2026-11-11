@extends('layouts.canva')

@section('title', 'Pengaduan')

@section('content')
<div class="container py-4">
    <!-- Blue Title (Canva Page 15) -->
    <h2 class="title-blue mb-4">Pengaduan</h2>

    <div class="row align-items-start g-5 mb-5">
        <!-- Left: Form (Canva Page 15) -->
        <div class="col-lg-7">
            @if(session('success'))
                <div class="alert alert-success mb-4" style="border-radius: 0 !important;">
                    {{ session('success') }}
                </div>
            @endif

            @if($errors->any())
                <div class="alert alert-danger mb-4" style="border-radius: 0 !important;">
                    <ul class="mb-0 small">
                        @foreach($errors->all() as $err)
                            <li>{{ $err }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form method="POST" action="{{ route('saran-aduan.store') }}">
                @csrf

                <!-- Nama -->
                <div class="mb-3">
                    <label class="form-label small fw-bold text-dark">Nama</label>
                    <input type="text" name="title" class="form-control" value="{{ old('title') }}" placeholder="...." required style="border-radius: 0 !important; background-color: #f8fafc; border-color: #e2e8f0;">
                </div>

                <!-- Nomor Telepon -->
                <div class="mb-3">
                    <label class="form-label small fw-bold text-dark">Nomor Telepon</label>
                    <input type="text" name="phone" class="form-control" value="{{ old('phone') }}" placeholder="...." required style="border-radius: 0 !important; background-color: #f8fafc; border-color: #e2e8f0;">
                </div>

                <!-- Email -->
                <div class="mb-3">
                    <label class="form-label small fw-bold text-dark">Email</label>
                    <input type="email" name="email" class="form-control" value="{{ old('email') }}" placeholder="...." required style="border-radius: 0 !important; background-color: #f8fafc; border-color: #e2e8f0;">
                </div>

                <!-- Jenis & Kategori -->
                <div class="row g-3 mb-3">
                    <div class="col-md-6">
                        <label class="form-label small fw-bold text-dark">Jenis Permohonan</label>
                        <select name="type" class="form-select" required style="border-radius: 0 !important; background-color: #f8fafc; border-color: #e2e8f0;">
                            <option value="Keluhan Pelayanan" {{ old('type') == 'Keluhan Pelayanan' ? 'selected' : '' }}>Keluhan Pelayanan</option>
                            <option value="Saran & Masukan" {{ old('type') == 'Saran & Masukan' ? 'selected' : '' }}>Saran & Masukan</option>
                            <option value="Permohonan Informasi Publik" {{ old('type') == 'Permohonan Informasi Publik' ? 'selected' : '' }}>Permohonan Informasi</option>
                            <option value="Aspirasi Koleksi" {{ old('type') == 'Aspirasi Koleksi' ? 'selected' : '' }}>Aspirasi Koleksi</option>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label small fw-bold text-dark">Kategori</label>
                        <select name="category" class="form-select" required style="border-radius: 0 !important; background-color: #f8fafc; border-color: #e2e8f0;">
                            <option value="Fasilitas & Gedung">Fasilitas & Gedung</option>
                            <option value="Pemanduan & Kuratorial">Pemanduan & Kuratorial</option>
                            <option value="Sistem Tiket & Reservasi">Sistem Tiket & Reservasi</option>
                            <option value="Kebersihan & Keamanan">Kebersihan & Keamanan</option>
                            <option value="Lainnya">Lainnya</option>
                        </select>
                    </div>
                </div>

                <!-- Rincian Pesan / Pengaduan -->
                <div class="mb-4">
                    <label class="form-label small fw-bold text-dark">Rincian Pengaduan</label>
                    <textarea name="body" rows="6" class="form-control" placeholder="...." required style="border-radius: 0 !important; background-color: #f8fafc; border-color: #e2e8f0;">{{ old('body') }}</textarea>
                </div>

                <!-- Captcha -->
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

                <!-- Blue Button: "Kirim Pengaduan" (Canva Page 15) -->
                <div>
                    <button type="submit" class="btn btn-primary px-4 py-2 fw-semibold" style="border-radius: 0 !important; background-color: var(--canva-accent-blue); border-color: var(--canva-accent-blue);">
                        Kirim Pengaduan <i class="fa-solid fa-paper-plane ms-2"></i>
                    </button>
                </div>
            </form>
        </div>

        <!-- Right: Photo (Canva Page 15) -->
        <div class="col-lg-5">
            <div class="overflow-hidden shadow-sm" style="border: 1px solid #e2e8f0; border-radius: 0 !important;">
                <img src="{{ asset('images/WebMuspenBaruImages/Pengaduan.png') }}" alt="Pengaduan Pelayanan Museum Penerangan" class="w-100 h-100" style="object-fit: cover; border-radius: 0 !important;">
            </div>
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
