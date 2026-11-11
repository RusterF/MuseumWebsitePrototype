{{-- Menu Items with Dropdown Grouping for Museum Penerangan Admin Panel --}}

<!-- 1. Dashboard Utama -->
<li class="nav-item">
    <a class="nav-link {{ request()->routeIs('backpack.dashboard') ? 'active' : '' }}" href="{{ backpack_url('dashboard') }}">
        <i class="la la-dashboard nav-icon text-primary"></i> <span>Dashboard Utama</span>
    </a>
</li>

<!-- 2. Statistik & Kunjungan -->
@php
    $statsActive = request()->is('admin/monthly-visitor-chart*') || 
                   request()->is('admin/online-visitor*') || 
                   request()->is('admin/onsite-visitor*') || 
                   request()->is('admin/offline-visitor*');
@endphp
<li class="nav-item dropdown {{ $statsActive ? 'active' : '' }}">
    <a class="nav-link dropdown-toggle {{ $statsActive ? 'active' : '' }}" href="#menu-stats" data-bs-toggle="dropdown" data-bs-auto-close="false" role="button" aria-expanded="{{ $statsActive ? 'true' : 'false' }}">
        <i class="la la-line-chart nav-icon text-info"></i> <span>Statistik Kunjungan</span>
    </a>
    <div class="dropdown-menu {{ $statsActive ? 'show' : '' }}">
        <a class="dropdown-item {{ request()->is('admin/monthly-visitor-chart*') ? 'active' : '' }}" href="{{ backpack_url('monthly-visitor-chart') }}">
            <i class="la la-area-chart nav-icon text-primary me-2"></i> <span>Grafik Bulanan</span>
        </a>
        <a class="dropdown-item {{ request()->is('admin/online-visitor*') ? 'active' : '' }}" href="{{ backpack_url('online-visitor') }}">
            <i class="la la-globe nav-icon text-info me-2"></i> <span>Pengunjung Online</span>
        </a>
        <a class="dropdown-item {{ request()->is('admin/onsite-visitor*') ? 'active' : '' }}" href="{{ backpack_url('onsite-visitor') }}">
            <i class="la la-building nav-icon text-success me-2"></i> <span>Pengunjung Onsite TMII</span>
        </a>
        <a class="dropdown-item {{ request()->is('admin/offline-visitor*') ? 'active' : '' }}" href="{{ backpack_url('offline-visitor') }}">
            <i class="la la-tablet nav-icon text-warning me-2"></i> <span>Pengunjung Kiosk Offline</span>
        </a>
    </div>
</li>

<!-- 3. Koleksi & Pameran -->
@php
    $collectionActive = request()->is('admin/collection*') || 
                        request()->is('admin/collection-category*') || 
                        request()->is('admin/gallery*') || 
                        request()->is('admin/tv-link*');
@endphp
<li class="nav-item dropdown {{ $collectionActive ? 'active' : '' }}">
    <a class="nav-link dropdown-toggle {{ $collectionActive ? 'active' : '' }}" href="#menu-collections" data-bs-toggle="dropdown" data-bs-auto-close="false" role="button" aria-expanded="{{ $collectionActive ? 'true' : 'false' }}">
        <i class="la la-archive nav-icon text-primary"></i> <span>Koleksi & Pameran</span>
    </a>
    <div class="dropdown-menu {{ $collectionActive ? 'show' : '' }}">
        <a class="dropdown-item {{ request()->is('admin/collection') || request()->is('admin/collection/*') ? 'active' : '' }}" href="{{ backpack_url('collection') }}">
            <i class="la la-cube nav-icon text-primary me-2"></i> <span>Katalog Artefak</span>
        </a>
        <a class="dropdown-item {{ request()->is('admin/collection-category*') ? 'active' : '' }}" href="{{ backpack_url('collection-category') }}">
            <i class="la la-folder nav-icon me-2"></i> <span>Kategori Koleksi</span>
        </a>
        <a class="dropdown-item {{ request()->is('admin/gallery*') ? 'active' : '' }}" href="{{ backpack_url('gallery') }}">
            <i class="la la-image nav-icon me-2"></i> <span>Galeri Foto</span>
        </a>
        <a class="dropdown-item {{ request()->is('admin/tv-link*') ? 'active' : '' }}" href="{{ backpack_url('tv-link') }}">
            <i class="la la-video-camera nav-icon text-danger me-2"></i> <span>Muspen TV / Video</span>
        </a>
    </div>
</li>

<!-- 4. Reservasi & Event -->
@php
    $reservationActive = request()->is('admin/reservation-approval*') || 
                         request()->is('admin/booking*') || 
                         request()->is('admin/event*');
@endphp
<li class="nav-item dropdown {{ $reservationActive ? 'active' : '' }}">
    <a class="nav-link dropdown-toggle {{ $reservationActive ? 'active' : '' }}" href="#menu-reservations" data-bs-toggle="dropdown" data-bs-auto-close="false" role="button" aria-expanded="{{ $reservationActive ? 'true' : 'false' }}">
        <i class="la la-ticket nav-icon text-warning"></i> <span>Reservasi & Event</span>
    </a>
    <div class="dropdown-menu {{ $reservationActive ? 'show' : '' }}">
        <a class="dropdown-item {{ request()->is('admin/reservation-approval*') ? 'active' : '' }}" href="{{ backpack_url('reservation-approval') }}">
            <i class="la la-check-circle nav-icon text-success me-2"></i> <span>Approval Reservasi</span>
        </a>
        <a class="dropdown-item {{ request()->is('admin/booking*') ? 'active' : '' }}" href="{{ backpack_url('booking') }}">
            <i class="la la-id-card nav-icon text-info me-2"></i> <span>Data Kunjungan</span>
        </a>
        <a class="dropdown-item {{ request()->is('admin/event*') ? 'active' : '' }}" href="{{ backpack_url('event') }}">
            <i class="la la-calendar nav-icon text-warning me-2"></i> <span>Agenda Event</span>
        </a>
    </div>
</li>

<!-- 5. Artikel & Publikasi -->
@php
    $articleActive = request()->is('admin/article*') || 
                     request()->is('admin/cms-category*') || 
                     request()->is('admin/cms-tag*');
@endphp
<li class="nav-item dropdown {{ $articleActive ? 'active' : '' }}">
    <a class="nav-link dropdown-toggle {{ $articleActive ? 'active' : '' }}" href="#menu-articles" data-bs-toggle="dropdown" data-bs-auto-close="false" role="button" aria-expanded="{{ $articleActive ? 'true' : 'false' }}">
        <i class="la la-newspaper-o nav-icon text-success"></i> <span>Artikel & Publikasi</span>
    </a>
    <div class="dropdown-menu {{ $articleActive ? 'show' : '' }}">
        <a class="dropdown-item {{ request()->is('admin/article*') ? 'active' : '' }}" href="{{ backpack_url('article') }}">
            <i class="la la-file-text nav-icon text-primary me-2"></i> <span>Artikel Sejarah</span>
        </a>
        <a class="dropdown-item {{ request()->is('admin/cms-category*') ? 'active' : '' }}" href="{{ backpack_url('cms-category') }}">
            <i class="la la-tags nav-icon me-2"></i> <span>Kategori Artikel</span>
        </a>
        <a class="dropdown-item {{ request()->is('admin/cms-tag*') ? 'active' : '' }}" href="{{ backpack_url('cms-tag') }}">
            <i class="la la-tag nav-icon me-2"></i> <span>Tag Artikel</span>
        </a>
    </div>
</li>

<!-- 6. Pelayanan & Aspirasi -->
@php
    $serviceActive = request()->is('admin/guest-book*') || 
                     request()->is('admin/complaint*') || 
                     request()->is('admin/comment*') || 
                     request()->is('admin/report*') || 
                     request()->is('admin/api-survey*') || 
                     request()->is('admin/offline-survey*');
@endphp
<li class="nav-item dropdown {{ $serviceActive ? 'active' : '' }}">
    <a class="nav-link dropdown-toggle {{ $serviceActive ? 'active' : '' }}" href="#menu-services" data-bs-toggle="dropdown" data-bs-auto-close="false" role="button" aria-expanded="{{ $serviceActive ? 'true' : 'false' }}">
        <i class="la la-bullhorn nav-icon text-danger"></i> <span>Pelayanan & Aspirasi</span>
    </a>
    <div class="dropdown-menu {{ $serviceActive ? 'show' : '' }}">
        <a class="dropdown-item {{ request()->is('admin/guest-book*') ? 'active' : '' }}" href="{{ backpack_url('guest-book') }}">
            <i class="la la-book nav-icon text-info me-2"></i> <span>Buku Tamu Digital</span>
        </a>
        <a class="dropdown-item {{ request()->is('admin/complaint*') ? 'active' : '' }}" href="{{ backpack_url('complaint') }}">
            <i class="la la-bullhorn nav-icon text-danger me-2"></i> <span>Saran & Pengaduan</span>
        </a>
        <a class="dropdown-item {{ request()->is('admin/comment*') ? 'active' : '' }}" href="{{ backpack_url('comment') }}">
            <i class="la la-comments nav-icon text-success me-2"></i> <span>Moderasi Komentar</span>
        </a>
        <a class="dropdown-item {{ request()->is('admin/report*') ? 'active' : '' }}" href="{{ backpack_url('report') }}">
            <i class="la la-flag nav-icon text-danger me-2"></i> <span>Laporan Konten / Spam</span>
        </a>
        <a class="dropdown-item {{ request()->is('admin/api-survey*') ? 'active' : '' }}" href="{{ backpack_url('api-survey') }}">
            <i class="la la-smile-o nav-icon text-warning me-2"></i> <span>Survei IKM Online</span>
        </a>
        <a class="dropdown-item {{ request()->is('admin/offline-survey*') ? 'active' : '' }}" href="{{ backpack_url('offline-survey') }}">
            <i class="la la-check-square-o nav-icon me-2"></i> <span>Survei IKM Offline</span>
        </a>
    </div>
</li>

<!-- 7. Kelembagaan & Mitra -->
@php
    $institutionActive = request()->is('admin/team*') || 
                         request()->is('admin/partner*');
@endphp
<li class="nav-item dropdown {{ $institutionActive ? 'active' : '' }}">
    <a class="nav-link dropdown-toggle {{ $institutionActive ? 'active' : '' }}" href="#menu-institution" data-bs-toggle="dropdown" data-bs-auto-close="false" role="button" aria-expanded="{{ $institutionActive ? 'true' : 'false' }}">
        <i class="la la-users nav-icon text-secondary"></i> <span>Kelembagaan & Mitra</span>
    </a>
    <div class="dropdown-menu {{ $institutionActive ? 'show' : '' }}">
        <a class="dropdown-item {{ request()->is('admin/team*') ? 'active' : '' }}" href="{{ backpack_url('team') }}">
            <i class="la la-id-badge nav-icon me-2"></i> <span>Tim Pengelola</span>
        </a>
        <a class="dropdown-item {{ request()->is('admin/partner*') ? 'active' : '' }}" href="{{ backpack_url('partner') }}">
            <i class="la la-handshake-o nav-icon me-2"></i> <span>Mitra & Kerjasama</span>
        </a>
    </div>
</li>

<!-- 8. Pengaturan Website -->
@php
    $settingsActive = request()->is('admin/setting-web-info*') || 
                      request()->is('admin/setting-social-media*') || 
                      request()->is('admin/user*');
@endphp
<li class="nav-item dropdown {{ $settingsActive ? 'active' : '' }}">
    <a class="nav-link dropdown-toggle {{ $settingsActive ? 'active' : '' }}" href="#menu-settings" data-bs-toggle="dropdown" data-bs-auto-close="false" role="button" aria-expanded="{{ $settingsActive ? 'true' : 'false' }}">
        <i class="la la-cog nav-icon text-primary"></i> <span>Pengaturan Sistem</span>
    </a>
    <div class="dropdown-menu {{ $settingsActive ? 'show' : '' }}">
        <a class="dropdown-item {{ request()->is('admin/setting-web-info*') ? 'active' : '' }}" href="{{ backpack_url('setting-web-info') }}">
            <i class="la la-sliders nav-icon text-primary me-2"></i> <span>Profil & Info Museum</span>
        </a>
        <a class="dropdown-item {{ request()->is('admin/setting-social-media*') ? 'active' : '' }}" href="{{ backpack_url('setting-social-media') }}">
            <i class="la la-share-alt nav-icon text-info me-2"></i> <span>Media Sosial</span>
        </a>
        <a class="dropdown-item {{ request()->is('admin/user*') ? 'active' : '' }}" href="{{ backpack_url('user') }}">
            <i class="la la-user-secret nav-icon text-warning me-2"></i> <span>Manajemen Admin</span>
        </a>
    </div>
</li>

<!-- 9. Link Web Publik -->
<li class="nav-item mt-3 pt-2 border-top border-secondary border-opacity-25">
    <a class="nav-link" href="{{ url('/') }}" target="_blank" title="Buka website publik di tab baru">
        <i class="la la-external-link nav-icon text-info"></i> <span>Lihat Web Publik ↗</span>
    </a>
</li>
