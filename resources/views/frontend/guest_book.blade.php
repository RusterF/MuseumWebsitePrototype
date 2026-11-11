@extends('layouts.canva')

@section('title', 'Buku Tamu Digital - Museum Penerangan')

@section('content')
<!-- Header Banner (British Museum Institutional Style) -->
<section class="page-header-clean">
    <div class="container">
        <div class="section-badge"><i class="fa-solid fa-pen-nib me-2"></i> Registrasi Kehadiran</div>
        <h1 class="page-title">Buku Tamu Digital</h1>
        <p class="page-lead">
            Pencatatan resmi kehadiran pengunjung onsite di TMII maupun pengunjung virtual online Museum Penerangan.
        </p>
    </div>
</section>

<!-- Stats Counters -->
<section class="py-4" style="background-color: var(--muspen-bg-surface); border-bottom: 1px solid var(--muspen-border);">
    <div class="container">
        <div class="row g-3 text-center">
            <div class="col-sm-6">
                <div class="p-3" style="background-color: var(--muspen-bg-card); border: 1px solid var(--muspen-border); border-radius: 4px;">
                    <small class="text-white-50 d-block text-uppercase fw-semibold" style="letter-spacing: 0.08em; font-size: 0.75rem;">Pengunjung Tercatat Hari Ini</small>
                    <span class="fs-1 fw-bold text-white font-monospace" style="font-family: var(--muspen-font-serif);">{{ number_format($todayCount) }}</span>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="p-3" style="background-color: var(--muspen-bg-card); border: 1px solid var(--muspen-border); border-radius: 4px;">
                    <small class="text-white-50 d-block text-uppercase fw-semibold" style="letter-spacing: 0.08em; font-size: 0.75rem;">Total Presensi Buku Tamu</small>
                    <span class="fs-1 fw-bold text-white font-monospace" style="font-family: var(--muspen-font-serif);">{{ number_format($totalCount) }}</span>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="py-5" style="background-color: var(--muspen-bg-base);">
    <div class="container py-3">
        <div class="row g-5">
            <!-- Form Left -->
            <div class="col-lg-7">
                <div class="muspen-card p-4 p-md-5" style="background-color: var(--muspen-bg-card); border: 1px solid var(--muspen-border-strong);">
                    <h3 class="fw-bold mb-2 text-white" style="font-family: var(--muspen-font-serif);">Formulir Presensi Kehadiran</h3>
                    <p class="text-white-50 small mb-4">
                        Silakan mengisi biodata kunjungan Anda. Formulir ini terlindungi oleh <strong>Server-side Captcha</strong> dan <strong>Rate Limiting</strong>.
                    </p>

                    <form method="POST" action="{{ route('guest-book.store') }}">
                        @csrf
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label class="form-label small fw-semibold text-white">Nama Lengkap / PIC <span class="text-danger">*</span></label>
                                <input type="text" name="name" class="form-control" value="{{ old('name') }}" placeholder="Nama Lengkap" required>
                            </div>

                            <div class="col-md-6">
                                <label class="form-label small fw-semibold text-white">Kota Asal / Asal Instansi <span class="text-danger">*</span></label>
                                <input type="text" name="origin" class="form-control" value="{{ old('origin') }}" placeholder="Contoh: Bandung / Universitas Indonesia" required>
                            </div>

                            <div class="col-md-6">
                                <label class="form-label small fw-semibold text-white">Alamat Email <span class="text-danger">*</span></label>
                                <input type="email" name="email" class="form-control" value="{{ old('email') }}" placeholder="email@domain.com" required>
                            </div>

                            <div class="col-md-6">
                                <label class="form-label small fw-semibold text-white">Nomor Telepon / WhatsApp <span class="text-danger">*</span></label>
                                <input type="text" name="phone" class="form-control" value="{{ old('phone') }}" placeholder="08xxxxxxxxxx" required>
                            </div>

                            <div class="col-md-6">
                                <label class="form-label small fw-semibold text-white">Jenis Kunjungan <span class="text-danger">*</span></label>
                                <select name="visitor_type" class="form-select" required>
                                    <option value="ONLINE" {{ old('visitor_type') == 'ONLINE' ? 'selected' : '' }}>Pengunjung Virtual / Website (Online)</option>
                                    <option value="ONSITE" {{ old('visitor_type') == 'ONSITE' ? 'selected' : '' }}>Pengunjung Langsung di TMII (Onsite)</option>
                                </select>
                            </div>

                            <div class="col-md-6">
                                <label class="form-label small fw-semibold text-white">Kategori Pengunjung <span class="text-danger">*</span></label>
                                <select name="category" class="form-select" required>
                                    <option value="Umum" {{ old('category') == 'Umum' ? 'selected' : '' }}>Masyarakat Umum / Perorangan</option>
                                    <option value="Pelajar / Mahasiswa" {{ old('category') == 'Pelajar / Mahasiswa' ? 'selected' : '' }}>Pelajar / Mahasiswa</option>
                                    <option value="Instansi Pemerintah" {{ old('category') == 'Instansi Pemerintah' ? 'selected' : '' }}>Instansi Pemerintah / Kedinasan</option>
                                    <option value="Komunitas / Organisasi" {{ old('category') == 'Komunitas / Organisasi' ? 'selected' : '' }}>Komunitas / Organisasi</option>
                                    <option value="Keluarga" {{ old('category') == 'Keluarga' ? 'selected' : '' }}>Keluarga</option>
                                </select>
                            </div>

                            <div class="col-md-6">
                                <label class="form-label small fw-semibold text-white">Jumlah Anggota Rombongan <span class="text-danger">*</span></label>
                                <input type="number" name="group_member_total" min="1" max="500" class="form-control" value="{{ old('group_member_total', 1) }}" required>
                            </div>

                            <div class="col-12">
                                <label class="form-label small fw-semibold text-white">Pesan, Kesan, atau Harapan untuk Muspen</label>
                                <textarea name="subs" class="form-control" rows="3" placeholder="Tuliskan pengalaman atau pesan Anda saat mengunjungi Museum Penerangan...">{{ old('subs') }}</textarea>
                            </div>

                            <!-- Captcha Box -->
                            <div class="col-12 mt-3">
                                <label class="form-label small fw-semibold text-white">Kode Verifikasi Keamanan <span class="text-danger">*</span></label>
                                <div class="captcha-wrapper">
                                    <img src="{{ captcha_src('mini') }}" alt="Captcha" class="captcha-img rounded" style="background: #FFFFFF;">
                                    <button type="button" class="btn-refresh-captcha" onclick="refreshCaptcha(this)">
                                        <i class="fa-solid fa-arrows-rotate me-1"></i> Ganti
                                    </button>
                                    <input type="text" name="captcha" class="form-control font-monospace text-uppercase" placeholder="Ketik 4 huruf..." style="max-width: 170px;" required>
                                </div>
                            </div>

                            <div class="col-12 text-end mt-4">
                                <button type="submit" class="btn btn-primary btn-lg px-5">
                                    <i class="fa-solid fa-check me-2"></i> Kirim Presensi
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Recent Visitors Right -->
            <div class="col-lg-5">
                <div class="muspen-card p-4 p-md-5" style="background-color: var(--muspen-bg-surface); border: 1px solid var(--muspen-border);">
                    <h4 class="fw-bold mb-3 border-bottom pb-3 text-white d-flex align-items-center justify-content-between" style="border-color: var(--muspen-border) !important; font-family: var(--muspen-font-serif);">
                        <span><i class="fa-solid fa-clock-rotate-left me-2 text-white-50"></i> Pengunjung Terkini</span>
                        <span class="badge" style="background: rgba(255,255,255,0.08); font-size: 0.75rem;">Live Feed</span>
                    </h4>

                    <div class="visitor-stream" style="max-height: 520px; overflow-y: auto;">
                        @forelse($recentGuests as $guest)
                            <div class="p-3 mb-3" style="background-color: #06111E; border: 1px solid var(--muspen-border); border-radius: 4px;">
                                <div class="d-flex justify-content-between align-items-center mb-1">
                                    <span class="fw-bold text-white">{{ $guest->name }}</span>
                                    <span class="badge" style="background: rgba(255,255,255,0.12); color: #FFFFFF; font-size: 0.7rem; letter-spacing: 0.05em;">
                                        {{ $guest->visitor_type }}
                                    </span>
                                </div>
                                <div class="small text-white-50 mb-2">
                                    <span><i class="fa-solid fa-location-dot me-1"></i> {{ $guest->origin }}</span>
                                    @if($guest->group_member_total > 1)
                                        <span class="ms-2"><i class="fa-solid fa-users me-1"></i> {{ $guest->group_member_total }} Orang</span>
                                    @endif
                                </div>
                                @if($guest->subs)
                                    <p class="small mb-1 fst-italic ps-2" style="color: #CBD5E1; border-left: 2px solid #FFFFFF;">
                                        "{{ Str::limit($guest->subs, 120) }}"
                                    </p>
                                @endif
                                <div class="text-white-50 small mt-2" style="font-size: 0.7rem;">
                                    {{ $guest->created_at ? $guest->created_at->diffForHumans() : '' }}
                                </div>
                            </div>
                        @empty
                            <p class="text-white-50 text-center py-4 small">Belum ada data buku tamu hari ini.</p>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
