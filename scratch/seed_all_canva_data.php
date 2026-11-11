<?php

require __DIR__.'/../vendor/autoload.php';
$app = require_once __DIR__.'/../bootstrap/app.php';
$kernel = $app->make(Kernel::class);
$kernel->bootstrap();

use App\Models\Article;
use App\Models\Category;
use App\Models\Collection;
use App\Models\CollectionCategory;
use App\Models\User;
use Illuminate\Contracts\Console\Kernel;

$firstUser = User::first();
$defaultUserId = $firstUser ? $firstUser->id : 1;
echo "Default User ID: {$defaultUserId}\n";

echo "=== 1. SYNCING ARTICLE CATEGORIES ===\n";
$catArtikel = Category::firstOrCreate(['slug' => 'artikel'], ['name' => 'Artikel']);
$catBerita = Category::firstOrCreate(['slug' => 'berita'], ['name' => 'Berita']);
echo "Category Artikel ID: {$catArtikel->id}\n";
echo "Category Berita ID: {$catBerita->id}\n";

echo "\n=== 2. SEEDING CANVA ARTICLES ===\n";
$articlesData = [
    [
        'title' => 'Kompak Pemuda Tak Hanya Dikenal lewat Buku Sejarah, Wayang Kulit Juga Mengangkat Kisahnya',
        'slug' => 'kompak-pemuda-tak-hanya-dikenal-lewat-buku-sejarah-wayang-kulit-juga-mengangkat-kisahnya',
        'category_id' => $catArtikel->id,
        'date' => '2026-01-01 12:08:00',
        'image' => 'WebMuspenBaruImages/PublikasiArtikel1.png',
        'status' => 1,
        'approval_status' => 'Y',
        'content' => '<p><strong>Jakarta</strong> - Sejarah perjuangan pemuda Indonesia dalam merebut kemerdekaan tidak hanya diabadikan melalui lembaran buku sejarah. Di Museum Penerangan, kisah heroik para pemuda diangkat kembali melalui pertunjukan wayang kulit yang sarat makna dan edukatif.</p><p>Pertunjukan wayang ini menyajikan narasi persatuan generasi muda dari berbagai latar belakang suku dan budaya yang bersatu untuk kemerdekaan bangsa Indonesia. Pendekatan seni tradisional ini terbukti efektif menarik minat generasi muda dalam mengapresiasi sejarah perjuangan bangsa.</p>',
    ],
    [
        'title' => 'Di Tengah Banjir Informasi Digital, Museum Penerangan Ajak Generasi Muda Belajar dari Sejarah',
        'slug' => 'di-tengah-banjir-informasi-digital-museum-penerangan-ajak-generasi-muda-belajar-dari-sejarah',
        'category_id' => $catBerita->id,
        'date' => '2026-01-01 12:07:00',
        'image' => 'WebMuspenBaruImages/PublikasiBerita1.png',
        'status' => 1,
        'approval_status' => 'Y',
        'content' => '<p><strong>Jakarta</strong> - Era keterbukaan informasi digital membawa tantangan tersendiri bagi masyarakat, khususnya generasi muda dalam menyaring informasi yang kredibel. Museum Penerangan menyelenggarakan program literasi informasi dengan mengajak para pelajar dan mahasiswa belajar dari sejarah penerangan di Indonesia.</p><p>Melalui koleksi bersejarah media massa cetak, radio, hingga televisi, pengunjung diajak memahami proses penyebaran informasi yang bertanggung jawab demi menjaga persatuan dan kesatuan bangsa.</p>',
    ],
    [
        'title' => 'Survei Kepuasan Masyarakat Museum Penerangan Triwulan I Tahun 2026 Raih Predikat Sangat Baik',
        'slug' => 'survei-kepuasan-masyarakat-museum-penerangan-triwulan-i-tahun-2026-raih-predikat-sangat-baik',
        'category_id' => $catArtikel->id,
        'date' => '2026-01-01 12:06:00',
        'image' => 'WebMuspenBaruImages/PublikasiArtikel2.png',
        'status' => 1,
        'approval_status' => 'Y',
        'content' => '<p><strong>Jakarta</strong> - Berdasarkan hasil Survei Kepuasan Masyarakat (SKM) Triwulan I Tahun 2026 yang dilaksanakan secara berkala, Museum Penerangan berhasil meraih predikat "Sangat Baik" dengan indeks kepuasan mencapai 92,45.</p><p>Capaian ini mencerminkan komitmen pengelola Museum Penerangan dalam memberikan pelayanan publik yang prima, ramah disabilitas, serta penyediaan fasilitas edukasi yang modern dan interaktif bagi seluruh pengunjung.</p>',
    ],
    [
        'title' => 'Ribuan Rakyat Memenuhi Lapangan Ikada, Apa yang Terjadi pada 19 September 1945?',
        'slug' => 'ribuan-rakyat-memenuhi-lapangan-ikada-apa-yang-terjadi-pada-19-september-1945',
        'category_id' => $catArtikel->id,
        'date' => '2026-01-01 12:05:00',
        'image' => 'WebMuspenBaruImages/PublikasiArtikel3.png',
        'status' => 1,
        'approval_status' => 'Y',
        'content' => '<p><strong>Jakarta</strong> - Peristiwa Rapat Raksasa Lapangan Ikada pada 19 September 1945 merupakan salah satu tonggak bersejarah dalam mempertahankan proklamasi kemerdekaan Republik Indonesia. Ribuan rakyat dari berbagai penjuru Jakarta berkumpul dengan penuh keberanian untuk mendengarkan pidato singkat Presiden Soekarno.</p><p>Koleksi dokumentasi fotografi dan rekaman suara di Museum Penerangan merekam momen ketegangan dan tekad bulat rakyat Indonesia dalam mempertahankan kemerdekaan meski di bawah ancaman senjata tentara Jepang.</p>',
    ],
    [
        'title' => 'Bukan Sekadar Kunjungan, Ada Cerita Gunawan Pangur di Baliknya',
        'slug' => 'bukan-sekadar-kunjungan-ada-cerita-gunawan-pangur-di-baliknya',
        'category_id' => $catBerita->id,
        'date' => '2026-01-01 12:04:00',
        'image' => 'WebMuspenBaruImages/PublikasiBerita2.png',
        'status' => 1,
        'approval_status' => 'Y',
        'content' => '<p><strong>Jakarta</strong> - Suasana haru dan inspiratif mewarnai kunjungan salah satu tokoh senior jurnalisme, Gunawan Pangur, ke Museum Penerangan. Beliau melihat kembali koleksi kamera dan alat komunikasi yang pernah digunakannya saat meliput peristiwa-peristiwa penting bangsa puluhan tahun silam.</p><p>Kunjungan ini membuktikan bahwa museum bukan sekadar tempat penyimpanan benda mati, melainkan ruang bernyawa yang menyimpan memori dan dedikasi anak bangsa dalam membangun komunikasi publik.</p>',
    ],
    [
        'title' => 'Museum Penerangan dan Langkah Baru untuk Tumbuh Bersama!',
        'slug' => 'museum-penerangan-dan-langkah-baru-untuk-tumbuh-bersama',
        'category_id' => $catArtikel->id,
        'date' => '2026-01-01 12:03:00',
        'image' => 'WebMuspenBaruImages/PublikasiArtikel4.png',
        'status' => 1,
        'approval_status' => 'Y',
        'content' => "<p><strong>Jakarta</strong> - Memasuki tahun 2026, Museum Penerangan meresmikan serangkaian pembaruan layanan dan ruang pameran edukasi baru dengan konsep inklusif dan kolaboratif. Program revitalisasi ini menitikberatkan pada partisipasi aktif komunitas, pelajar, serta pegiat sejarah dalam merancang kegiatan museum bersama.</p><p>Dengan tagline 'Tumbuh Bersama', museum bertransformasi menjadi ruang ketiga (third place) yang menyenangkan untuk belajar, berdiskusi, dan berkreasi bagi seluruh lapisan masyarakat.</p>",
    ],
    [
        'title' => 'Museum Penerangan Hadirkan Pameran Jaladri Dhvani, Menelusuri Jejak Informasi yang Berlayar di Nusantara',
        'slug' => 'museum-penerangan-hadirkan-pameran-jaladri-dhvani-menelusuri-jejak-informasi-yang-berlayar-di-nusantara',
        'category_id' => $catArtikel->id,
        'date' => '2026-01-01 12:02:00',
        'image' => 'WebMuspenBaruImages/PublikasiArtikel5.png',
        'status' => 1,
        'approval_status' => 'Y',
        'content' => '<p><strong>Jakarta</strong> - Museum Penerangan resmi membuka pameran temporer bertajuk "Jaladri Dhvani: Suara Samudra dan Jejak Informasi Nusantara". Pameran ini mengangkat sejarah bagaimana informasi disebarkan antarpulau di nusantara melalui jalur laut dan telegraf maritim sebelum era satelit.</p><p>Koleksi yang dipamerkan meliputi radio kapal tua, dokumen telegram antar-pulau, serta diorama komunikasi maritim yang sarat akan nilai historis peradaban bahari nusantara.</p>',
    ],
    [
        'title' => 'Museum Penerangan dan Museum Balai Kirti Bangun Kolaborasi Strategis',
        'slug' => 'museum-penerangan-dan-museum-balai-kirti-bangun-kolaborasi-strategis',
        'category_id' => $catBerita->id,
        'date' => '2026-01-01 12:01:00',
        'image' => 'WebMuspenBaruImages/PublikasiBerita3.png',
        'status' => 1,
        'approval_status' => 'Y',
        'content' => '<p><strong>Bogor</strong> - Museum Penerangan dan Museum Kepresidenan RI Balai Kirti menandatangani nota kesepahaman (MoU) untuk penguatan kolaborasi dalam bidang kurasi koleksi, riset sejarah kepresidenan, dan program edukasi publik terpadu.</p><p>Kerja sama strategis ini diharapkan memperluas akses masyarakat terhadap sejarah kebijakan komunikasi para Presiden Indonesia dari masa ke masa serta memperkuat sinergi antarmuseum di bawah naungan kementerian.</p>',
    ],
    [
        'title' => 'Dari Ruang Pamer ke Layar Ponsel, Begini Cara Museum Bercerita di Era Digital',
        'slug' => 'dari-ruang-pamer-ke-layar-ponsel-begini-cara-museum-bercerita-di-era-digital',
        'category_id' => $catArtikel->id,
        'date' => '2026-08-14 10:00:00',
        'image' => 'WebMuspenBaruImages/PublikasiContohArtikel.png',
        'status' => 1,
        'approval_status' => 'Y',
        'content' => '<p><strong>Jakarta</strong> - Bagaimana jika rasa penasaran terhadap koleksi bersejarah justru muncul saat seseorang sedang scrolling di ponselnya?</p>
<p>Kini mengenal sejarah tidak selalu harus dimulai dari ruang museum. Foto, video pendek, hingga cerita yang dibagikan melalui media sosial dapat menjadi pintu pertama bagi masyarakat untuk mengenal sebuah koleksi sebelum datang dan melihatnya secara langsung.</p>
<p>Hal tersebut menjadi salah satu pembahasan dalam Muspen Talk bertajuk "Dari Ruang Pamer ke Media Sosial: Seni Bercerita Sejarah di Dunia Digital" yang digelar di Museum Penerangan, Jakarta, Paduka (14/8/2026). Kegiatan ini membahas bagaimana media sosial dapat dimanfaatkan museum untuk memperluas jangkauan dan memperkenalkan koleksi kepada masyarakat, terutama generasi muda.</p>
<h5 class="fw-bold mt-4 mb-3 text-dark">Bukan Sekadar Unggah Koleksi</h5>
<p>Hadir di media sosial tidak cukup hanya dengan mengunggah foto koleksi. Museum perlu memikirkan bagaimana sebuah konten dapat membuat masyarakat berhenti scrolling dan tertarik mengetahui cerita di balik sebuah benda.</p>
<p>Dalam sesi Social Media in Tourism, dibahas bahwa konten museum perlu relevan dengan audiens, memberikan nilai, serta memiliki pendekatan visual yang menarik untuk membangkitkan fontana narasi. Media sosial tidak hanya menjadi tempat untuk menampilkan koleksi, tetapi juga menjadi ruang untuk menyampaikan nilai dan pengetahuan kepada masyarakat.</p>
<p>Pengalaman Museum Bank Indonesia (MuBI) yang dibagikan dalam Muspen Talk juga menunjukkan bahwa berbagai bentuk konten digital dapat dimanfaatkan untuk mendukung kegiatan edukasi museum. Beberapa bentuk konten yang dibahas antara lain Reels, Live Virtual Tour, dan konten interaktif melalui Instagram.</p>
<p>Pembuatan konten dapat diawali dengan melakukan brainstorming dan menentukan tujuan komunikasi. Ide tersebut kemudian dapat dikembangkan melalui beberapa pilar, seperti edukasi, koneksi, promosi, dan ruang inklusi.</p>
<p>Cerita yang dibagikan pun tidak harus selalu berasal dari koleksi. Aktivitas museum, pengalaman pengunjung, hingga orang-orang yang bekerja di balik layar juga dapat menjadi bahan untuk membuat konten.</p>
<h5 class="fw-bold mt-4 mb-3 text-dark">Satu Koleksi, Banyak Cerita</h5>
<p>Dalam satu koleksi, narasumber sekaligus content creator museum, Faisal Fadli, menekankan pentingnya menemukan sudut cerita yang dapat membangkitkan rasa penasaran masyarakat.</p>
<p>Salah satu teknik yang dibahas adalah teknik Question & Reason. Melalui hal yang terlihat dalam koleksi (sudah ada) dan langsung memberikan penjelasan panjang mengenai koleksi tersebut, museum dapat memulainya dengan pertanyaan sederhana: "Mengapa unsur/aksara ini dipilih?"</p>
<p>Pertanyaan sederhana tersebut dapat menjadi pintu masuk untuk mengajak audiens mengeksplorasi lebih jauh mengenai sejarah, konteks, dan cerita di balik koleksi.</p>
<p>Dari satu koleksi dapat lahir berbagai cerita. Kuncinya adalah bagaimana museum melihat sebuah koleksi dan menemukan sudut yang menarik untuk disampaikan kepada masyarakat.</p>
<p>Hal-hal yang membuat pengunjung penasaran ketika pertama kali melihat sebuah koleksi juga dapat menjadi sumber ide. Sesuatu yang terlihat unik, berbeda, atau tidak biasa dapat dikembangkan menjadi konten yang lebih dekat dengan pengalaman audiens.</p>
<h5 class="fw-bold mt-4 mb-3 text-dark">Semua Orang Bisa Menjadi Pembawa Cerita</h5>
<p>Keterbatasan sumber daya manusia tidak harus menjadi alasan bagi museum untuk berhenti membuat konten. Koleksi, edukator, pemandu, hingga staf museum memiliki pengetahuan dan pengalaman yang dapat diolah menjadi sebuah cerita.</p>
<p>Gagasan tersebut terangkum dalam prinsip "Everyone is a content creator". Artinya, cerita tentang museum tidak hanya menjadi tanggung jawab pengelola media sosial. Orang-orang yang bekerja di dalam museum juga memiliki sudut pandang yang dapat membantu memperkenalkan museum kepada masyarakat.</p>
<p>Yang dibutuhkan bukan hanya kemampuan membuat video atau desain, tetapi juga kemampuan menemukan cerita dari sebuah pengalaman atau hal-hal yang mungkin dianggap biasa.</p>
<h5 class="fw-bold mt-4 mb-3 text-dark">Dari Konten ke Museum</h5>
<p>Pada akhirnya, media sosial bukan sekadar tempat mengejar dance, likes, atau jumlah pengikut. Tujuan yang lebih penting adalah membuat masyarakat mengenal museum, tertarik pada ceritanya, dan terdorong untuk datang.</p>
<p>Satu video singkat mungkin hanya muncul selama beberapa detik di layar ponsel. Namun, jika cerita yang disampaikan tepat, video tersebut dapat menjadi langkah pertama seseorang untuk mengenal museum lebih jauh.</p>',
    ],
];

foreach ($articlesData as $data) {
    $data['user_id'] = $defaultUserId;
    $art = Article::updateOrCreate(
        ['slug' => $data['slug']],
        $data
    );
    echo "Saved article ID {$art->id}: {$art->title}\n";
}

echo "\n=== 3. SYNCING 12 COLLECTIONS IN CATEGORY 6 ===\n";
$cat6 = CollectionCategory::find(6);
if (! $cat6) {
    echo "Warning: CollectionCategory 6 not found!\n";
} else {
    echo "Category 6: {$cat6->name}\n";
}

$collectionsData = [
    1 => [
        'id' => 39,
        'title' => 'Kamera Foto dan Flash Kamera Jurnalis Antara',
        'slug' => 'kamera-foto-dan-flash-kamera-jurnalis-antara',
        'file' => 'WebMuspenBaruImages/KoleksiFotojurnalismedanJurnalisme1.png',
        'registration_number' => '1.135',
        'registration_year' => '1993',
        'inventory_number' => '03/FP/LPR.01/01/CJ',
        'contributor' => 'PT Kantor Berita Nasional Antara',
        'bahan' => 'Logam, Kaca, dan Plastik',
        'ukuran' => '(P : 15 cm / L : 8,5 cm / T : 11 cm)',
    ],
    2 => [
        'id' => 44,
        'title' => 'Kamera Refleks',
        'slug' => 'kamera-refleks',
        'file' => 'WebMuspenBaruImages/KoleksiFotojurnalismedanJurnalisme2.png',
        'registration_number' => '2.21',
        'registration_year' => '1993',
        'inventory_number' => 'MP.PC/PEU0097',
        'contributor' => 'FED (Felix Edmundovich Dzerzhinsky)',
        'bahan' => 'Logam Campuran, Kaca dan Kulit',
        'ukuran' => 'p: 15.5 cm, l: 8 cm, t: 9cm',
    ],
    3 => [
        'id' => 55,
        'title' => 'Koran Retnodhoemilah No. 80 Tahun II',
        'slug' => 'koran-retnodhoemilah-no-80-tahun-ii',
        'file' => 'WebMuspenBaruImages/KoleksiFotojurnalismedanJurnalisme3.png',
        'registration_number' => '1.44',
        'registration_year' => '1901',
        'inventory_number' => 'MP.PC/PER0004',
        'contributor' => 'H. Buning & Co',
        'bahan' => 'Kertas',
        'ukuran' => 'd: 36 cm, t: 27.5 cm',
    ],
    4 => [
        'id' => 81,
        'title' => 'Mesin Ketik Departemen Penerangan Tahun 1949',
        'slug' => 'mesin-ketik-departemen-penerangan-tahun-1949',
        'file' => 'WebMuspenBaruImages/KoleksiFotojurnalismedanJurnalisme4.png',
        'registration_number' => '2.32',
        'registration_year' => '1993',
        'inventory_number' => 'MP.PC/PEU0171',
        'contributor' => 'The Royal Typewriter Company',
        'bahan' => 'Besi dan Plastik',
        'ukuran' => 'p: 61 cm, l: 42 cm, t: 24 cm',
    ],
    5 => [
        'id' => 138,
        'title' => 'Pena Emas Pers',
        'slug' => 'pena-emas-pers',
        'file' => 'WebMuspenBaruImages/KoleksiFotojurnalismedanJurnalisme5.png',
        'registration_number' => '1.19',
        'registration_year' => '1993',
        'inventory_number' => 'MP.PC/PER0061',
        'contributor' => 'Dewan Pers Indonesia',
        'bahan' => 'Emas',
        'ukuran' => 'p: 3 cm, l: 3 cm, t: 0.8 cm',
    ],
    6 => [
        'id' => 56,
        'title' => 'Koran Selompret Malajoe No. 12 Tahun 1863',
        'slug' => 'koran-selompret-malajoe-no-12-tahun-1863',
        'file' => 'WebMuspenBaruImages/KoleksiFotojurnalismedanJurnalisme6.png',
        'registration_number' => '1.39',
        'registration_year' => '1863',
        'inventory_number' => 'MP.PC/PER0003',
        'contributor' => 'G.C.T. Van Dorp',
        'bahan' => 'Kertas',
        'ukuran' => 'p: 32 cm, l: 21 cm',
    ],
    7 => [
        'id' => 67,
        'title' => 'Medali Penegak Pers Pancasila',
        'slug' => 'medali-penegak-pers-pancasila',
        'file' => 'WebMuspenBaruImages/KoleksiFotojurnalismedanJurnalisme7.png',
        'registration_number' => '1.87',
        'registration_year' => '1993',
        'inventory_number' => 'MP.PC/PER0060',
        'contributor' => 'Persatuan Wartawan Indonesia (PWI)',
        'bahan' => 'Kain dan Kuningan',
        'ukuran' => 'p: 40 cm, l: 30 cm (display)',
    ],
    8 => [
        'id' => 123,
        'title' => 'Patung Dada Djamaluddin Adinegoro',
        'slug' => 'djamaluddin-adinegoro',
        'file' => 'WebMuspenBaruImages/KoleksiFotojurnalismedanJurnalisme8.png',
        'registration_number' => '1.9',
        'registration_year' => '1993',
        'inventory_number' => 'MP.PC/PEU0324f',
        'contributor' => 'Kasman K.S.',
        'bahan' => 'Perunggu',
        'ukuran' => 'p: 60 cm, l: 28 cm, t: 72 cm',
    ],
    9 => [
        'id' => 18,
        'title' => 'Dr. Wahidin Soedirohoesodo Memimpin Kantor Koran Retnodhoemilah',
        'slug' => 'dr-wahidin-soedirohoesodo-memimpin-kantor-koran-retnodhoemilah',
        'file' => 'WebMuspenBaruImages/KoleksiFotojurnalismedanJurnalisme9.png',
        'registration_number' => '1.128',
        'registration_year' => '1993',
        'inventory_number' => 'MP.PC/PEU0176',
        'contributor' => 'Kasman K.S.',
        'bahan' => 'Fiber, Kayu dan Karet',
        'ukuran' => 'p: 120 cm, l: 80 cm, t: 100 cm',
    ],
    10 => [
        'id' => 147,
        'title' => 'Piala Kalam Kencana Pers',
        'slug' => 'piala-kalam-kencana-pers',
        'file' => 'WebMuspenBaruImages/KoleksiFotojurnalismedanJurnalisme10.png',
        'registration_number' => '1.100',
        'registration_year' => '1993',
        'inventory_number' => 'MP.PC/PER0062',
        'contributor' => 'Departemen Penerangan RI',
        'bahan' => 'Kayu dan Kuningan',
        'ukuran' => 'p: 22 cm, l: 12 cm, t: 56.5 cm',
    ],
    11 => [
        'id' => 146,
        'title' => 'Piala Jurnalistik Adinegoro',
        'slug' => 'piala-jurnalistik-adinegoro',
        'file' => 'WebMuspenBaruImages/KoleksiFotojurnalismedanJurnalisme11.png',
        'registration_number' => '1.17',
        'registration_year' => '1993',
        'inventory_number' => 'MP.PC/PER0066',
        'contributor' => 'Yayasan Hadiah Jurnalistik Adinegoro',
        'bahan' => 'Plastik, Mika, Kuningan dan Kayu',
        'ukuran' => 'p: 35.5 cm, l: 15.5 cm, t: 56.5 cm',
    ],
    12 => [
        'id' => 57,
        'title' => 'Koran Warta Bodjonegoro-Syuu 18 Agustus 1945',
        'slug' => 'koran-warta-bodjonegoro-syuu-18-agustus-1945',
        'file' => 'WebMuspenBaruImages/KoleksiFotojurnalismedanJurnalisme12.png',
        'registration_number' => '1.45',
        'registration_year' => '1945',
        'inventory_number' => 'MP.PC/PER0011',
        'contributor' => 'Warta Bodjonegoro-Syuu',
        'bahan' => 'Kertas',
        'ukuran' => 'd: 27 cm, t: 39.5 cm',
    ],
];

foreach ($collectionsData as $order => $data) {
    $col = Collection::find($data['id']);
    if ($col) {
        $col->collection_category_id = 6;
        $col->file = $data['file'];
        $col->status = 'PUBLISH';
        $col->title = $data['title'];
        $col->slug = $data['slug'];
        $col->registration_number = $data['registration_number'];
        if (! empty($data['registration_year'])) {
            $col->registration_year = $data['registration_year'];
        }
        $col->inventory_number = $data['inventory_number'];
        $col->contributor = $data['contributor'];
        $col->bahan = $data['bahan'];
        $col->ukuran = $data['ukuran'];
        $col->save();
        echo "Updated Collection [$order] ID {$col->id}: {$col->title}\n";
    } else {
        echo "Collection ID {$data['id']} not found!\n";
    }
}

echo "\nDone!\n";
