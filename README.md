<p align="center">
  <img src="public/images/black-logo.png" alt="Logo Museum Penerangan" width="280">
</p>

<h1 align="center">Portal Museum Penerangan RI</h1>

<p align="center">
  <strong>Sistem Informasi Manajemen, Reservasi Kunjungan, Galeri Artefak Bersejarah, dan Tur Virtual 3D</strong><br>
  Museum Penerangan &bull; Direktorat Jenderal Informasi dan Komunikasi Publik &bull; Kementerian Komunikasi dan Digital Republik Indonesia
</p>

<p align="center">
  <img src="https://img.shields.io/badge/Laravel-11.x-FF2D20?style=for-the-badge&logo=laravel&logoColor=white" alt="Laravel 11">
  <img src="https://img.shields.io/badge/PHP-8.5-777BB4?style=for-the-badge&logo=php&logoColor=white" alt="PHP 8.5">
  <img src="https://img.shields.io/badge/Backpack_CMS-v6-1E293B?style=for-the-badge&logo=laravel&logoColor=white" alt="Backpack CMS">
  <img src="https://img.shields.io/badge/Bootstrap-5.3-7952B3?style=for-the-badge&logo=bootstrap&logoColor=white" alt="Bootstrap 5">
  <img src="https://img.shields.io/badge/Three.js-3D_360%C2%B0-000000?style=for-the-badge&logo=threedotjs&logoColor=white" alt="Three.js">
</p>

---

## 🏛️ Tentang Proyek

**Museum Penerangan (Muspen)** berlokasi di Taman Mini Indonesia Indah (TMII), Jakarta Timur. Diresmikan pada tanggal 20 April 1993 oleh Presiden Soeharto atas prakarsa Ibu Hj. Tien Soeharto, museum ini merupakan pusat pelestarian sejarah media komunikasi massa, penyiaran radio kemerdekaan, pertelevisian, pers nasional, hingga transformasi era telekomunikasi digital Nusantara.

---

## 🌟 Fitur Utama Website

### 1. Halaman Publik (Frontend)

* **Beranda Interaktif (Home Portal)**
  * *Hero Banner* dengan latar belakang foto fasad gedung dan menara pemancar museum (`frontbuilding.jpg`).
  * *British Museum Visit Essentials Strip*: Jam operasional (09.00 - 15.00 WIB), tiket bebas biaya (gratis), dan lokasi TMII.
  * Ringkasan statistik pengunjung portal online & pengunjung onsite TMII secara real-time.
  * *Exhibition Highlights*: Showcase wahana autentik (*Garis Waktu Layanan Informasi, Mengenal KOMINFO, Proyektor Bioskop Klasik*).
  * Highlight koleksi artefak pilihan, agenda acara mendatang, dan artikel sejarah terbaru.

* **Katalog Koleksi Artefak Bersejarah (`/collections`)**
  * Eksplorasi artefak media komunikasi (Radio, Televisi, Pers, Percetakan, Sinematografi/Perfilman, dan Fotojurnalistik).
  * Filter pencarian berdasarkan nama, kategori, nomor registrasi, dan tahun akuisisi.
  * Halaman detail koleksi dilengkapi spesifikasi fisik (bahan, dimensi, tahun), foto resolusi tinggi, narasi sejarah, dan rekomendasi koleksi terkait.

* **Tur Virtual 3D 360° Interaktif (`/virtual-tour`)**
  * Engine visual 3D berbasis **Three.js** dengan proyeksi bola (*Sphere Projection*) dan navigasi kamera sudut bebas 360°.
  * Multi-zona eksplorasi: *Lobby Utama, Garis Waktu Informasi, Galeri Perfilman Bioskop, Zona Mengenal KOMINFO, dan Satelit Palapa*.
  * *Interactive Hotspot Markers*: Titik klik pada objek artefak dengan popup kartu informasi detail.
  * Kontrol navigasi lengkap: Putar otomatis (*Auto Rotate*), efek audio latar (*Ambient Sound*), dan mode layar penuh (*Fullscreen*).

* **Sistem Reservasi Kunjungan & Validasi Kapasitas (`/booking`)**
  * Formulir registrasi kunjungan untuk individu, keluarga, maupun rombongan instansi/sekolah.
  * Pengecekan kuota kapasitas pengunjung harian secara real-time melalui REST API (`/api/check-capacity`).
  * Penerbitan **E-Tiket Reservasi Resmi** dengan *Kode Booking Unik* dan *QR Code Access Pass*.
  * Halaman Pelacak Tiket (`/booking/check`) untuk memeriksa status persetujuan (*Pending, Disetujui, Ditolak*).

* **Buku Tamu Digital (`/guest-book`)**
  * Pencatatan presensi digital bagi pengunjung fisik maupun daring lengkap dengan asal institusi/daerah dan pesan kesan kunjungan.
  * Dilengkapi pengaman Captcha anti-spam.

* **Layanan Aspirasi, Saran & Pengaduan / PPID (`/saran-aduan`)**
  * Saluran keterbukaan informasi publik dan aduan masyarakat.
  * Setiap laporan otomatis mendapatkan *Kode Tiket Aduan Unik* (contoh: `ADU-20260930-XXXX`).
  * Pelacakan status tindak lanjut aduan secara transparan (`/saran-aduan/track`).

* **Survei Indeks Kepuasan Masyarakat / IKM (`/survey`)**
  * Pengukuran kepuasan layanan publik mencakup 4 indikator utama: Kualitas Informasi Koleksi, Keramahan Edukator/Pemandu, Fasilitas & Kebersihan, serta Kemudahan Reservasi.

* **Agenda Acara & Pameran (`/events`)**
  * Informasi jadwal pameran temporer, workshop edukasi, dan webinar literasi digital.
  * Status event dinamis (*Mendatang, Sedang Berlangsung, Selesai*).

* **Forum & Artikel Sejarah (`/forum`)**
  * Artikel edukatif mendalam mengenai peristiwa bersejarah komunikasi Indonesia.
  * Kolom komentar publik dengan moderasi dan fitur pelaporan komentar tidak pantas.

* **Profil Lembaga & Informasi Terpadu**
  * Profil Lengkap & Sejarah (`/about-us`)
  * Visi, Misi, & Tugas Pokok (`/vision-mission`)
  * Struktur Organisasi (`/organization-structure`)
  * Tim Kurator, Edukator & Pengelola (`/teams`)
  * Mitra & Lembaga Kolaborasi (`/partners`)
  * Kontak Resmi, Akses Transportasi LRT/Tol & Peta Google Maps TMII (`/contact`)

---

### 2. Panel Admin CMS (Backpack for Laravel)

Akses dashboard petugas dan pengelola museum di `/admin`:

* **Dashboard & Visitor Intelligence**
  * Grafik Tren Kunjungan Bulanan (*ApexCharts*) terintegrasi.
  * Ringkasan cepat total koleksi, event aktif, reservasi menunggu persetujuan, dan aduan baru.
* **Manajemen Reservasi & Persetujuan Kunjungan**
  * Tinjau detail permohonan rombongan, jumlah peserta, kontak PIC, dan surat pengantar.
  * Aksi 1-klik untuk *Approve* (Setujui) atau *Reject* (Tolak) dengan alasan.
* **Manajemen Koleksi & Kategori**: CRUD lengkap data artefak, upload foto, deskripsi sejarah, dan kategori.
* **Manajemen Event & Berita**: Publikasi agenda pameran dan artikel sejarah.
* **Moderasi Komentar & Aduan**: Penanganan aduan warga PPID dan tinjauan laporan komentar.
* **Buku Tamu & Survei IKM**: Rekapitulasi data pengunjung dan grafik kepuasan masyarakat.
* **Statistik Pengunjung**: Pencatatan pengunjung fisik harian (*Onsite*) dan pengunjung portal daring (*Online*).
* **Ekspor & Laporan**: Fitur unduh rekap data pengunjung dan operasional museum.
* **Pengaturan Web & Sosial Media**: Kelola kontak resmi, jam buka, kapasitas harian, tautan tur 3D, dan kanal media sosial resmi.
* **Manajemen Pengguna & Hak Akses**: Pengelolaan akun administrator dan staf museum.

---

## 🛠️ Arsitektur & Teknologi

| Komponen | Teknologi yang Digunakan |
| :--- | :--- |
| **Framework Backend** | [Laravel 11.x](https://laravel.com/) (PHP 8.5) |
| **Admin Panel / CMS** | [Backpack for Laravel v6](https://backpackforlaravel.com/) (Theme Tabler) |
| **Database** | MySQL / SQLite (Eloquent ORM & Migrations) |
| **Styling & UI** | Vanilla CSS (`muspen.css`), [Bootstrap 5.3](https://getbootstrap.com/), [FontAwesome 6](https://fontawesome.com/) |
| **Tipografi** | *Playfair Display* (British Museum Serif) & *Plus Jakarta Sans* |
| **Engine 3D 360°** | [Three.js](https://threejs.org/) (Sphere Geometry & Panorama Mapping) |
| **Keamanan & Validasi** | CSRF Token, [Mews Captcha](https://github.com/mewebstudio/captcha), Rate Limiting |
| **Formater Kode** | Laravel Pint |

---

## 🚀 Panduan Instalasi & Menjalankan Website

### Persyaratan Sistem
* PHP `>= 8.2` (Rekomendasi PHP 8.3 / 8.5)
* Composer
* Web Server (Apache / Nginx / PHP Built-in Server)
* Database MySQL atau SQLite

### Langkah-Langkah Instalasi

1. **Buka Folder Proyek**:
   ```bash
   cd c:\Users\LENOVO\Projects\webmuspenlite
   ```

2. **Install Dependensi PHP**:
   ```bash
   composer install
   ```

3. **Konfigurasi Environment (`.env`)**:
   Salin `.env.example` ke `.env` (jika belum ada) dan sesuaikan konfigurasi database:
   ```env
   APP_NAME="Museum Penerangan"
   APP_ENV=local
   APP_KEY=
   APP_DEBUG=true
   APP_URL=http://127.0.0.1:8000

   DB_CONNECTION=sqlite
   # Atau jika menggunakan MySQL:
   # DB_CONNECTION=mysql
   # DB_HOST=127.0.0.1
   # DB_PORT=3306
   # DB_DATABASE=webmuspenlite
   # DB_USERNAME=root
   # DB_PASSWORD=
   ```

4. **Generate Application Key**:
   ```bash
   php artisan key:generate
   ```

5. **Jalankan Migrasi & Database Seeder**:
   ```bash
   php artisan migrate --seed
   ```

6. **Buat Symlink Storage**:
   ```bash
   php artisan storage:link
   ```

7. **Jalankan Server Lokal**:
   ```bash
   php artisan serve
   ```
   Buka browser dan akses:
   * **Portal Publik**: [http://127.0.0.1:8000](http://127.0.0.1:8000)
   * **Panel Admin CMS**: [http://127.0.0.1:8000/admin](http://127.0.0.1:8000/admin)

---

## 📂 Struktur Direktori Utama

```text
webmuspenlite/
├── app/
│   ├── Http/
│   │   └── Controllers/
│   │       ├── Admin/              # CRUD Controller Backpack Admin Panel
│   │       ├── AboutController.php # Controller Halaman Profil & Info
│   │       ├── ArticleController.php
│   │       ├── BookingController.php
│   │       ├── CollectionController.php
│   │       ├── ComplaintController.php
│   │       ├── GuestBookController.php
│   │       ├── HomeController.php
│   │       ├── SurveyController.php
│   │       └── VirtualTourController.php
│   └── Models/                     # Eloquent Models (Collection, Booking, dll.)
├── config/
│   └── backpack/                   # Konfigurasi Backpack UI & Base
├── database/
│   ├── migrations/                 # Skema Tabel Database
│   └── seeders/                    # Data Dummy Koleksi, Kategori, User
├── public/
│   ├── css/
│   │   └── muspen.css              # Design System Resmi Museum Penerangan
│   └── images/
│       ├── frontbuilding.jpg       # Foto Fasad Gedung Utama TMII
│       ├── TimelapseLayananInformasi.jpg # Galeri Garis Waktu Sejarah
│       ├── MengenalKominfo.jpg     # Wahana Interaktif Edukasi
│       ├── Atraksi.jpeg            # Artefak Proyektor Film Bioskop
│       ├── black-logo.png          # Logo Gelap / Putih untuk Navbar & Footer
│       └── color-logo.png          # Logo Berwarna untuk Admin & Kop
├── resources/
│   └── views/
│       ├── admin/                  # Custom Views Admin Dashboard
│       ├── frontend/               # Blade Views Halaman Publik
│       ├── layouts/
│       │   └── app.blade.php       # Layout Utama Header & Footer
│       └── vendor/backpack/        # Kustomisasi Auth Layout Backpack
└── routes/
    ├── web.php                     # Route Halaman Publik & API
    └── backpack/
        └── custom.php              # Route Admin Backpack
```

---

## 🔒 Keamanan & Praktik Terbaik

* **Perlindungan Injeksi & XSS**: Menggunakan Blade templating escape syntax `{{ }}` dan Eloquent Parameter Binding.
* **Keamanan Formulir Publik**: Dilengkapi token `@csrf` dan verifikasi visual Captcha pada buku tamu, survei, komentar, dan reservasi.
* **Privasi Data Pengunjung**: Pelacakan tiket dan aduan dilindungi nomor registrasi unik tanpa mengekspos data pribadi sensitif secara terbuka.

---

## 📄 Hak Cipta & Lisensi

Hak Cipta &copy; 2026 **Museum Penerangan** - Direktorat Jenderal Informasi dan Komunikasi Publik, Kementerian Komunikasi dan Digital Republik Indonesia.
Didistribusikan untuk kepentingan edukasi, pelestarian sejarah, dan pelayanan publik.
