@extends('layouts.canva')

@section('title', 'Layanan Pengaduan & Saran')

@section('content')
<div class="container py-4">
    <!-- Blue Title (Canva Page 15) -->
    <div class="d-flex justify-content-between align-items-center mb-4 flex-wrap gap-2">
        <h2 class="title-blue mb-0">Pengaduan & Saran</h2>
        <div class="d-flex gap-2">
            <a href="{{ route('complaint.span-lapor') }}" class="btn btn-sm btn-outline-danger">
                <i class="fa-solid fa-bullhorn me-1"></i> SPAN LAPOR!
            </a>
            <a href="{{ route('saran-aduan.track') }}" class="btn btn-sm btn-outline-secondary">
                <i class="fa-solid fa-magnifying-glass me-1"></i> Lacak Status Tiket
            </a>
        </div>
    </div>

    <div class="row align-items-start g-5 mb-5">
        <!-- Left: Form (Canva Page 15) -->
        <div class="col-lg-7">
            <div class="card-canva p-4 p-md-5 shadow-sm border-top border-4 border-primary">
                <h4 class="fw-bold text-dark mb-2">Formulir Aspirasi & Pengaduan</h4>
                <p class="text-secondary small mb-4">
                    Sampaikan keluhan, aspirasi, atau permohonan informasi publik Anda. Setiap laporan akan ditindaklanjuti secara resmi oleh tim pengelola.
                </p>

                @if(session('success'))
                    <div class="alert alert-canva-success mb-4">
                        <i class="fa-solid fa-circle-check me-2"></i> {{ session('success') }}
                    </div>
                @endif

                @if($errors->any())
                    <div class="alert alert-canva-danger mb-4">
                        <div class="d-flex align-items-center gap-2 mb-2 fw-bold">
                            <i class="fa-solid fa-circle-exclamation"></i>
                            <span>Terdapat kesalahan input:</span>
                        </div>
                        <ul class="mb-0 small ps-3">
                            @foreach($errors->all() as $err)
                                <li>{{ $err }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form method="POST" action="{{ route('saran-aduan.store') }}" class="form-canva">
                    @csrf

                    <!-- Nama -->
                    <div class="mb-3">
                        <label for="complaint_name" class="form-label small fw-bold text-dark">Nama Pelapor <span class="text-danger">*</span></label>
                        <input type="text" id="complaint_name" name="title" class="form-control" value="{{ old('title') }}" placeholder="Masukkan nama lengkap Anda..." required>
                    </div>

                    <!-- Nomor Telepon -->
                    <div class="mb-3">
                        <label for="complaint_phone" class="form-label small fw-bold text-dark">Nomor Telepon / WhatsApp <span class="text-danger">*</span></label>
                        <input type="tel" id="complaint_phone" name="phone" class="form-control" value="{{ old('phone') }}" placeholder="Contoh: 081234567890" required>
                    </div>

                    <!-- Email -->
                    <div class="mb-3">
                        <label for="complaint_email" class="form-label small fw-bold text-dark">Alamat Email <span class="text-danger">*</span></label>
                        <input type="email" id="complaint_email" name="email" class="form-control" value="{{ old('email') }}" placeholder="email@domain.com" required>
                        <div class="form-text">Nomor tiket aduan akan dikirimkan ke alamat email ini.</div>
                    </div>

                    <!-- Jenis & Kategori -->
                    <div class="row g-3 mb-3">
                        <div class="col-md-6">
                            <label for="complaint_type" class="form-label small fw-bold text-dark">Jenis Permohonan <span class="text-danger">*</span></label>
                            <select id="complaint_type" name="type" class="form-select" required>
                                <option value="Keluhan Pelayanan" {{ old('type') == 'Keluhan Pelayanan' ? 'selected' : '' }}>Keluhan Pelayanan</option>
                                <option value="Saran & Masukan" {{ old('type') == 'Saran & Masukan' ? 'selected' : '' }}>Saran & Masukan</option>
                                <option value="Permohonan Informasi Publik" {{ old('type') == 'Permohonan Informasi Publik' ? 'selected' : '' }}>Permohonan Informasi</option>
                                <option value="Aspirasi Koleksi" {{ old('type') == 'Aspirasi Koleksi' ? 'selected' : '' }}>Aspirasi Koleksi</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label for="complaint_category" class="form-label small fw-bold text-dark">Kategori Pelayanan <span class="text-danger">*</span></label>
                            <select id="complaint_category" name="category" class="form-select" required>
                                <option value="Fasilitas & Gedung" {{ old('category') == 'Fasilitas & Gedung' ? 'selected' : '' }}>Fasilitas & Gedung</option>
                                <option value="Pemanduan & Kuratorial" {{ old('category') == 'Pemanduan & Kuratorial' ? 'selected' : '' }}>Pemanduan & Kuratorial</option>
                                <option value="Sistem Tiket & Reservasi" {{ old('category') == 'Sistem Tiket & Reservasi' ? 'selected' : '' }}>Sistem Tiket & Reservasi</option>
                                <option value="Kebersihan & Keamanan" {{ old('category') == 'Kebersihan & Keamanan' ? 'selected' : '' }}>Kebersihan & Keamanan</option>
                                <option value="Lainnya" {{ old('category') == 'Lainnya' ? 'selected' : '' }}>Lainnya</option>
                            </select>
                        </div>
                    </div>

                    <!-- Rincian Pesan / Pengaduan -->
                    <div class="mb-4">
                        <label for="complaint_body" class="form-label small fw-bold text-dark">Rincian Pengaduan / Aspirasi <span class="text-danger">*</span></label>
                        <textarea id="complaint_body" name="body" rows="5" class="form-control" placeholder="Tuliskan secara jelas kronologi, lokasi kejadian, atau uraian saran Anda..." required>{{ old('body') }}</textarea>
                    </div>

                    <!-- Captcha -->
                    <div class="mb-4">
                        <label class="form-label small fw-bold text-dark">Kode Keamanan (Captcha) <span class="text-danger">*</span></label>
                        <div class="d-flex align-items-center gap-2 flex-wrap">
                            <img src="{{ captcha_src('mini') }}" alt="Captcha" class="border" id="captcha-img" style="height: 42px;">
                            <button type="button" class="btn btn-outline-secondary btn-refresh-captcha-canva" id="refresh-btn" onclick="refreshCaptcha()" style="height: 42px;" title="Ganti kode captcha">
                                <i class="fa-solid fa-arrows-rotate me-1" id="captcha-icon"></i> Ganti
                            </button>
                            <input type="text" name="captcha" class="form-control font-monospace text-uppercase" placeholder="Ketik 4 karakter..." style="max-width: 180px; height: 42px;" required autocomplete="off">
                        </div>
                    </div>

                    <!-- Blue Button: "Kirim Pengaduan" (Canva Page 15) -->
                    <div class="pt-2">
                        <button type="submit" class="btn-canva-primary px-4 py-3 fw-bold">
                            Kirim Pengaduan <i class="fa-solid fa-paper-plane ms-2"></i>
                        </button>
                    </div>
                </form>
            </div>
        </div>

        <!-- Right: Photo (Canva Page 15) -->
        <div class="col-lg-5">
            <div class="card-canva p-2 overflow-hidden shadow-sm mb-4">
                <img src="{{ asset('images/WebMuspenBaruImages/Pengaduan.png') }}" alt="Pengaduan Pelayanan Museum Penerangan" class="w-100 h-100" style="object-fit: cover;">
            </div>

            <!-- SPAN LAPOR Info Box -->
            <div class="card-canva p-4 shadow-sm" style="background-color: #F8FAFC;">
                <div class="d-flex align-items-center gap-3 mb-3">
                    <img src="{{ asset('images/WebMuspenBaruImages/SPANLapor.png') }}" alt="Logo SPAN LAPOR!" style="height: 38px;">
                    <div>
                        <h6 class="fw-bold text-dark mb-0">Terhubung SP4N-LAPOR!</h6>
                        <small class="text-muted">Kanal Aspirasi Nasional RI</small>
                    </div>
                </div>
                <p class="small text-secondary mb-3" style="line-height: 1.6;">
                    Anda juga dapat menyampaikan laporan pengaduan melalui portal nasional SP4N-LAPOR! yang terhubung langsung dengan kementerian dan lembaga negara.
                </p>
                <a href="{{ route('complaint.span-lapor') }}" class="link-cta-canva small fw-semibold" style="margin-top: 0;">
                    Informasi SPAN LAPOR! <i class="fa-solid fa-arrow-right-long ms-1"></i>
                </a>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    function refreshCaptcha() {
        const icon = document.getElementById('captcha-icon');
        if (icon) icon.classList.add('fa-spin');

        fetch('{{ route("refresh-captcha") }}')
            .then(res => res.json())
            .then(data => {
                const img = document.getElementById('captcha-img');
                if (img && data.captcha) {
                    img.src = data.captcha + '?' + Math.random();
                }
            })
            .catch(err => console.error('Error refreshing captcha:', err))
            .finally(() => {
                if (icon) icon.classList.remove('fa-spin');
            });
    }
</script>
@endpush
