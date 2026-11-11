@extends(backpack_view('blank'))

@section('header')
    <section class="header-operation container-fluid animated fadeIn d-flex justify-content-between align-items-baseline mb-3">
        <h1 class="text-capitalize mb-0">Tautan Media Sosial Resmi</h1>
        <div class="text-muted small">Kelola link akun media sosial resmi Museum Penerangan</div>
    </section>
@endsection

@section('content')
<div class="card shadow-sm border-0">
    <div class="card-body">
        <form method="POST" action="{{ backpack_url('setting-social-media') }}">
            @csrf
            <div class="mb-3">
                <label class="form-label font-weight-bold">
                    <i class="la la-instagram text-danger"></i> Instagram URL
                </label>
                <input type="url" name="instagram" class="form-control" value="{{ $settings['instagram'] ?? '' }}" placeholder="https://www.instagram.com/museumpenerangan">
            </div>

            <div class="mb-3">
                <label class="form-label font-weight-bold">
                    <i class="la la-youtube text-danger"></i> YouTube Channel URL
                </label>
                <input type="url" name="youtube" class="form-control" value="{{ $settings['youtube'] ?? '' }}" placeholder="https://www.youtube.com/c/MuspenTV">
            </div>

            <div class="mb-3">
                <label class="form-label font-weight-bold">
                    <i class="la la-facebook text-primary"></i> Facebook Page URL
                </label>
                <input type="url" name="facebook" class="form-control" value="{{ $settings['facebook'] ?? '' }}" placeholder="https://www.facebook.com/MuseumPenerangan/">
            </div>

            <div class="mb-3">
                <label class="form-label font-weight-bold">
                    <i class="la la-twitter text-info"></i> Twitter / X Profile URL
                </label>
                <input type="url" name="twitter" class="form-control" value="{{ $settings['twitter'] ?? '' }}" placeholder="https://twitter.com/muspenerangan">
            </div>

            <div class="mb-3">
                <label class="form-label font-weight-bold">
                    <i class="la la-music text-dark"></i> TikTok URL
                </label>
                <input type="url" name="tiktok" class="form-control" value="{{ $settings['tiktok'] ?? '' }}" placeholder="https://www.tiktok.com/@muspenerangan">
            </div>

            <div class="mt-4 border-top pt-3 text-end">
                <button type="submit" class="btn btn-primary px-4">
                    <i class="la la-save"></i> Simpan Tautan Media Sosial
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
