@extends('layouts.canva')

@section('title', 'Reservasi')

@section('content')
<div class="container py-4">
    <!-- Blue Title (Canva Page 14) -->
    <h2 class="title-blue mb-4">Reservasi</h2>

    <!-- Map Graphic (Canva Page 14) -->
    <div class="mb-3 overflow-hidden shadow-sm" style="max-height: 380px;">
        <img src="{{ asset('images/canva/reservasi_map_tmii.png') }}" alt="Peta Lokasi Museum Penerangan TMII" class="w-100 h-100" style="object-fit: cover;">
    </div>

    <!-- Link below map: "Lihat lokasi Museum Penerangan di Google Maps →" (Canva Page 14) -->
    <div class="text-center mb-5">
        <a href="https://maps.app.goo.gl/3q6Z1v1c" target="_blank" class="text-primary fw-semibold small text-decoration-none">
            Lihat lokasi Museum Penerangan di Google Maps &rarr;
        </a>
    </div>

    <!-- "Rencanakan Kunjunganmu!" Section (Canva Page 14) -->
    <div class="mb-4">
        <h3 class="title-blue mb-3">Rencanakan Kunjunganmu!</h3>
        <p class="text-secondary mb-3" style="line-height: 1.85; font-size: 0.98rem;">
            Museum Penerangan menyambut kunjungan perorangan, rombongan sekolah, instansi pemerintah, dan komunitas masyarakat umum. Layanan tiket masuk museum tidak dipungut biaya retribusi (Gratis). Untuk rombongan dengan jumlah lebih dari 20 orang, dimohon melakukan reservasi jadwal kedatangan guna mendapatkan fasilitas pemanduan edukatif secara optimal.
        </p>
        <div class="mb-3">
            <a href="{{ route('services.kunjungan-museum') }}" class="text-primary fw-semibold small text-decoration-none">
                Lihat tata tertib kunjungan &rarr;
            </a>
        </div>
        <!-- Green Call Center Button (Canva Page 14) -->
        <div class="mb-5">
            <a href="https://wa.me/628118132121" target="_blank" class="btn btn-success px-4 py-2 fw-semibold d-inline-flex align-items-center gap-2" style="border-radius: 0 !important; background-color: #22c55e; border-color: #22c55e;">
                <i class="fa-brands fa-whatsapp fs-5"></i>
                <span>Call Center (+62 811 813 2121)</span>
            </a>
        </div>
    </div>

    <hr class="my-5 text-muted opacity-25">

    <!-- Booking Form with Real-time Capacity Checker -->
    <div class="row justify-content-center mb-5">
        <div class="col-lg-9">
            <div class="card border p-4 p-md-5 bg-white shadow-sm" style="border-radius: 0 !important; border-top: 4px solid var(--canva-accent-blue) !important;">
                <h4 class="fw-bold text-dark mb-2">Formulir Pendaftaran Kunjungan</h4>
                <p class="text-secondary small mb-4">
                    Isi data kunjungan rombongan Anda untuk memperoleh e-tiket resmi.
                </p>

                @if($errors->any())
                    <div class="alert alert-danger mb-4" style="border-radius: 0 !important;">
                        <ul class="mb-0 small">
                            @foreach($errors->all() as $err)
                                <li>{{ $err }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form method="POST" action="{{ route('booking.store') }}" id="bookingForm">
                    @csrf

                    <div class="row g-3">
                        <div class="col-md-6">
                            <label class="form-label small fw-bold text-dark">Nama Penanggung Jawab (PIC) <span class="text-danger">*</span></label>
                            <input type="text" name="name" class="form-control" value="{{ old('name') }}" placeholder="Nama Lengkap" required style="border-radius: 0 !important;">
                        </div>

                        <div class="col-md-6">
                            <label class="form-label small fw-bold text-dark">Nama Lembaga / Sekolah / Instansi <span class="text-danger">*</span></label>
                            <input type="text" name="place" class="form-control" value="{{ old('place') }}" placeholder="SMA Negeri 1 Jakarta / Pribadi" required style="border-radius: 0 !important;">
                        </div>

                        <div class="col-md-6">
                            <label class="form-label small fw-bold text-dark">Alamat Email <span class="text-danger">*</span></label>
                            <input type="email" name="email" class="form-control" value="{{ old('email') }}" placeholder="email@domain.com" required style="border-radius: 0 !important;">
                        </div>

                        <div class="col-md-6">
                            <label class="form-label small fw-bold text-dark">Nomor WhatsApp / Telepon <span class="text-danger">*</span></label>
                            <input type="text" name="phone" class="form-control" value="{{ old('phone') }}" placeholder="08xxxxxxxxxx" required style="border-radius: 0 !important;">
                        </div>

                        <div class="col-md-6">
                            <label class="form-label small fw-bold text-dark">Kategori Rombongan <span class="text-danger">*</span></label>
                            <select name="category" class="form-select" required style="border-radius: 0 !important;">
                                <option value="">Pilih Kategori...</option>
                                <option value="Pelajar / Sekolah" {{ old('category') == 'Pelajar / Sekolah' ? 'selected' : '' }}>Pelajar / Sekolah</option>
                                <option value="Mahasiswa / Universitas" {{ old('category') == 'Mahasiswa / Universitas' ? 'selected' : '' }}>Mahasiswa / Universitas</option>
                                <option value="Instansi Pemerintah / Kedinasan" {{ old('category') == 'Instansi Pemerintah / Kedinasan' ? 'selected' : '' }}>Instansi Pemerintah / Kedinasan</option>
                                <option value="Komunitas / Organisasi" {{ old('category') == 'Komunitas / Organisasi' ? 'selected' : '' }}>Komunitas / Organisasi</option>
                                <option value="Umum / Keluarga" {{ old('category') == 'Umum / Keluarga' ? 'selected' : '' }}>Umum / Keluarga</option>
                            </select>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label small fw-bold text-dark">Jumlah Anggota Rombongan <span class="text-danger">*</span></label>
                            <div class="input-group">
                                <input type="number" name="visitor" min="1" max="500" class="form-control" value="{{ old('visitor', old('total_people', 1)) }}" required style="border-radius: 0 !important;">
                                <span class="input-group-text bg-light text-muted" style="border-radius: 0 !important;">Orang</span>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label small fw-bold text-dark">Tanggal Kunjungan <span class="text-danger">*</span></label>
                            <input type="date" name="date" id="visit-date-input" min="{{ date('Y-m-d', strtotime('+1 day')) }}" class="form-control" value="{{ old('date', old('visit_date', date('Y-m-d', strtotime('+2 days')))) }}" required style="border-radius: 0 !important;">
                            <div class="mt-2" id="capacity-checker-container">
                                <span id="capacity-badge" class="badge bg-light text-dark border" style="border-radius: 0 !important;">
                                    <i class="fa-solid fa-spinner fa-spin me-1"></i> Memeriksa kuota harian...
                                </span>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label small fw-bold text-dark">Sesi Waktu Kunjungan <span class="text-danger">*</span></label>
                            <select name="session_type" class="form-select" required style="border-radius: 0 !important;">
                                <option value="Sesi Pagi (09.00 - 11.30 WIB)" {{ old('session_type', old('time_slot')) == 'Sesi Pagi (09.00 - 11.30 WIB)' ? 'selected' : '' }}>Sesi Pagi (09.00 - 11.30 WIB)</option>
                                <option value="Sesi Siang (13.00 - 15.00 WIB)" {{ old('session_type', old('time_slot')) == 'Sesi Siang (13.00 - 15.00 WIB)' ? 'selected' : '' }}>Sesi Siang (13.00 - 15.00 WIB)</option>
                            </select>
                        </div>

                        <div class="col-12">
                            <label class="form-label small fw-bold text-dark">Kebutuhan Khusus / Pemandu (Opsional)</label>
                            <textarea name="notes" class="form-control" rows="3" placeholder="Ketik jika ada kebutuhan khusus..." style="border-radius: 0 !important;">{{ old('notes') }}</textarea>
                        </div>

                        <!-- Captcha -->
                        <div class="col-12">
                            <label class="form-label small fw-bold text-dark">Kode Keamanan (Captcha) <span class="text-danger">*</span></label>
                            <div class="d-flex align-items-center gap-2 flex-wrap">
                                <img src="{{ captcha_src('mini') }}" alt="Captcha" class="border" id="captcha-img" style="border-radius: 0 !important; height: 38px;">
                                <button type="button" class="btn btn-sm btn-outline-secondary" onclick="refreshCaptcha()" style="border-radius: 0 !important; height: 38px;">
                                    <i class="fa-solid fa-arrows-rotate me-1"></i> Ganti
                                </button>
                                <input type="text" name="captcha" class="form-control font-monospace text-uppercase" placeholder="Ketik 4 karakter..." style="max-width: 180px; border-radius: 0 !important;" required>
                            </div>
                        </div>

                        <div class="col-12 text-end mt-4">
                            <button type="submit" id="btn-submit-booking" class="btn btn-primary px-5 py-3 fw-bold text-uppercase" style="border-radius: 0 !important; background-color: var(--canva-accent-blue); border-color: var(--canva-accent-blue);">
                                Ajukan Reservasi Kunjungan
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    const dateInput = document.getElementById('visit-date-input');
    const badge = document.getElementById('capacity-badge');
    const submitBtn = document.getElementById('btn-submit-booking');

    function checkDailyCapacity(dateValue) {
        if (!dateValue || !badge) return;
        badge.className = 'badge bg-light text-muted border';
        badge.innerHTML = '<i class="fa-solid fa-spinner fa-spin me-1"></i> Memeriksa kuota...';

        fetch(`{{ route('api.check-capacity') }}?date=${dateValue}`)
            .then(res => res.json())
            .then(data => {
                if (data.is_available) {
                    badge.className = 'badge bg-success text-white';
                    badge.innerHTML = `<i class="fa-solid fa-circle-check me-1"></i> Sisa Kuota: <strong>${data.remaining}</strong> orang (dari ${data.max_capacity})`;
                    if (submitBtn) submitBtn.disabled = false;
                } else {
                    badge.className = 'badge bg-danger text-white';
                    badge.innerHTML = `<i class="fa-solid fa-circle-xmark me-1"></i> Kuota Penuh (${data.booked}/${data.max_capacity})`;
                    if (submitBtn) submitBtn.disabled = true;
                }
            })
            .catch(err => {
                badge.className = 'badge bg-info text-dark';
                badge.innerHTML = 'Kapasitas Harian: 900 Pengunjung';
            });
    }

    if (dateInput) {
        dateInput.addEventListener('change', function() {
            checkDailyCapacity(this.value);
        });
        checkDailyCapacity(dateInput.value);
    }

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
