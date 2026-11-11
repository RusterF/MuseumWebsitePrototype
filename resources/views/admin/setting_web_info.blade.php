@extends(backpack_view('blank'))

@section('header')
    <section class="header-operation container-fluid animated fadeIn d-flex justify-content-between align-items-baseline mb-3">
        <h1 class="text-capitalize mb-0">Pengaturan Informasi Museum</h1>
        <div class="text-muted small">Kelola informasi kontak, profil, visi, misi, dan kapasitas museum</div>
    </section>
@endsection

@section('content')
<div class="card shadow-sm border-0">
    <div class="card-body">
        <form method="POST" action="{{ backpack_url('setting-web-info') }}">
            @csrf
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label font-weight-bold">Nama / Judul Situs</label>
                    <input type="text" name="site_title" class="form-control" value="{{ $settings['site_title'] ?? '' }}" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label font-weight-bold">Email Resmi</label>
                    <input type="email" name="contact_email" class="form-control" value="{{ $settings['contact_email'] ?? '' }}" required>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label font-weight-bold">Nomor Telepon / WhatsApp Resmi</label>
                    <input type="text" name="phone" class="form-control" value="{{ $settings['phone'] ?? '' }}">
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label font-weight-bold">Jam Operasional Pelayanan</label>
                    <input type="text" name="operational_hours" class="form-control" value="{{ $settings['operational_hours'] ?? 'Buka Setiap Hari: 09.00 - 15.00 WIB' }}" placeholder="Contoh: Buka Setiap Hari: 09.00 - 15.00 WIB">
                </div>
            </div>

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label font-weight-bold">Kapasitas Maksimal Pengunjung Harian</label>
                    <input type="number" name="max_visitor" class="form-control" value="{{ $settings['max_visitor'] ?? '900' }}">
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label font-weight-bold">Tautan Tur Virtual Interaktif 3D</label>
                    <input type="text" name="virtual_tour_url" class="form-control" value="{{ $settings['virtual_tour_url'] ?? '/virtual-tour' }}">
                </div>
            </div>

            <div class="mb-3">
                <label class="form-label font-weight-bold">Deskripsi Singkat (Meta / Tagline)</label>
                <textarea name="site_description" class="form-control" rows="2">{{ $settings['site_description'] ?? '' }}</textarea>
            </div>

            <div class="mb-3">
                <label class="form-label font-weight-bold">Alamat Lengkap Museum</label>
                <textarea name="address" class="form-control" rows="2">{{ $settings['address'] ?? '' }}</textarea>
            </div>

            <div class="mb-3">
                <label class="form-label font-weight-bold">Embed URL Google Maps (Iframe Source)</label>
                <input type="text" name="maps_address" class="form-control" value="{{ $settings['maps_address'] ?? '' }}" placeholder="https://www.google.com/maps/embed?...">
            </div>

            <div class="mb-3">
                <label class="form-label font-weight-bold">Tentang Museum (Sejarah & Profil)</label>
                <textarea name="about_us" class="form-control" rows="4">{{ $settings['about_us'] ?? '' }}</textarea>
            </div>

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label font-weight-bold">Visi Museum</label>
                    <textarea name="visi" class="form-control" rows="4">{{ $settings['visi'] ?? '' }}</textarea>
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label font-weight-bold">Misi Museum</label>
                    <textarea name="misi" class="form-control" rows="4">{{ $settings['misi'] ?? '' }}</textarea>
                </div>
            </div>

            <div class="mt-4 border-top pt-3 text-end">
                <button type="submit" class="btn btn-primary px-4">
                    <i class="la la-save"></i> Simpan Pengaturan 
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
