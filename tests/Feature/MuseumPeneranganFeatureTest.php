<?php

namespace Tests\Feature;

use App\Models\Article;
use App\Models\Booking;
use App\Models\Collection;
use App\Models\Comment;
use App\Models\Complaint;
use App\Models\Event;
use App\Models\Setting;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class MuseumPeneranganFeatureTest extends TestCase
{
    use RefreshDatabase;

    public function test_home_page_loads_successfully(): void
    {
        $response = $this->get('/');
        $response->assertStatus(200);
        $response->assertSee('Museum Penerangan');
    }

    public function test_profile_pages_load_successfully(): void
    {
        $this->get('/about-us')->assertStatus(200)->assertSee('Tentang Museum Penerangan');
        $this->get('/vision-mission')->assertStatus(200)->assertSee('Visi');
        $this->get('/organization-structure')->assertStatus(200)->assertSee('Struktur Organisasi');
        $this->get('/teams')->assertStatus(200)->assertSee('Tim');
        $this->get('/partners')->assertStatus(200)->assertSee('Mitra');
        $this->get('/contact')->assertStatus(200)->assertSee('Kontak');
    }

    public function test_collections_and_virtual_tour_load(): void
    {
        Collection::create([
            'title' => 'Radio Pemancar Darurat PDRI',
            'slug' => 'radio-pemancar-darurat-pdri',
            'status' => 'PUBLISH',
            'bahan' => 'Logam & Kayu',
            'registration_number' => 'MP-1948-001',
        ]);

        $this->get('/collections')->assertStatus(200)->assertSee('Radio Pemancar Darurat PDRI');
        $this->get('/collections/radio-pemancar-darurat-pdri')->assertStatus(200)->assertSee('MP-1948-001');
        $this->get('/virtual-tour')->assertStatus(200)->assertSee('Tur Virtual 3D');
    }

    public function test_events_and_forum_load(): void
    {
        Event::create([
            'name' => 'Festival Komunikasi Nusantara',
            'slug' => 'festival-komunikasi-nusantara',
            'date' => now()->addDays(5),
            'status' => 'PUBLISH',
            'max_visitor' => 100,
        ]);

        Article::create([
            'title' => 'Sejarah Radio Rimba Raya',
            'slug' => 'sejarah-radio-rimba-raya',
            'content' => 'Radio Rimba Raya mengumandangkan kemerdekaan ke seluruh penjuru dunia.',
            'status' => 1,
            'approval_status' => 'Y',
        ]);

        $this->get('/events')->assertStatus(200)->assertSee('Festival Komunikasi Nusantara');
        $this->get('/events/festival-komunikasi-nusantara')->assertStatus(200)->assertSee('100 Slot Tersedia');
        $this->get('/forum')->assertStatus(200)->assertSee('Sejarah Radio Rimba Raya');
        $this->get('/forum/sejarah-radio-rimba-raya')->assertStatus(200)->assertSee('Komentar');
    }

    public function test_capacity_api_endpoint_returns_json(): void
    {
        $response = $this->getJson('/api/check-capacity?date='.now()->toDateString());
        $response->assertStatus(200);
        $response->assertJsonStructure([
            'date',
            'max_capacity',
            'booked',
            'remaining',
            'is_available',
            'status_label',
        ]);
    }

    public function test_public_forms_reject_missing_captcha(): void
    {
        $article = Article::create([
            'title' => 'Uji Validasi Captcha',
            'slug' => 'uji-validasi-captcha',
            'content' => 'Konten artikel pengujian.',
            'status' => 1,
            'approval_status' => 'Y',
        ]);

        // Submit comment without captcha
        $response = $this->post('/forum/'.$article->slug.'/comment', [
            'name' => 'Pengunjung Uji',
            'email' => 'pengunjung@test.com',
            'body' => 'Komentar pengujian tanpa captcha.',
        ]);

        $response->assertSessionHasErrors(['captcha']);

        // Submit booking without captcha
        $responseBooking = $this->post('/booking', [
            'name' => 'PIC Uji',
            'place' => 'Sekolah Uji',
            'email' => 'pic@test.com',
            'phone' => '08123456789',
            'visitor' => 10,
            'date' => now()->addDays(3)->toDateString(),
            'session_type' => 'Pagi (09.00 - 11.30 WIB)',
            'category' => 'Kelompok Belajar / Sekolah',
        ]);

        $responseBooking->assertSessionHasErrors(['captcha']);
    }

    public function test_admin_login_page_is_accessible(): void
    {
        $response = $this->get('/admin/login');
        $response->assertStatus(200);
    }

    public function test_admin_can_login_and_access_dashboard(): void
    {
        $user = User::factory()->create([
            'email' => 'admintest@muspen.id',
            'password' => bcrypt('password123'),
        ]);

        $response = $this->post('/admin/login', [
            'email' => 'admintest@muspen.id',
            'password' => 'password123',
        ]);

        $response->assertRedirect('/admin/dashboard');

        $this->assertAuthenticatedAs($user, 'backpack');

        $dashboardResponse = $this->get('/admin/dashboard');
        $dashboardResponse->assertStatus(200);

        // When authenticated admin visits /admin/login, redirect to /admin/dashboard
        $loginPageAgain = $this->get('/admin/login');
        $loginPageAgain->assertRedirect('/admin/dashboard');
    }

    public function test_models_auto_generate_slugs_when_empty(): void
    {
        $article = Article::create([
            'title' => 'Judul Artikel Otomatis Slug',
            'content' => 'Isi artikel uji',
            'status' => 1,
            'approval_status' => 'Y',
        ]);
        $this->assertEquals('judul-artikel-otomatis-slug', $article->slug);

        $event = Event::create([
            'name' => 'Acara Pameran Otomatis Slug',
            'status' => 'PUBLISH',
        ]);
        $this->assertEquals('acara-pameran-otomatis-slug', $event->slug);

        $collection = Collection::create([
            'title' => 'Artefak Otomatis Slug',
            'status' => 'PUBLISH',
        ]);
        $this->assertEquals('artefak-otomatis-slug', $collection->slug);
    }

    public function test_booking_model_renders_approve_buttons_properly(): void
    {
        $booking = Booking::create([
            'name' => 'Pemohon Uji',
            'place' => 'Instansi Uji',
            'visitor' => 5,
            'date' => now()->addDays(2),
            'approval_status' => 'PENDING',
        ]);

        $html = $booking->renderApproveButton();
        $this->assertStringContainsString('Setujui', $html);
        $this->assertStringContainsString('Tolak', $html);
        $this->assertStringContainsString(backpack_url('reservation-approval/'.$booking->id.'/approve'), $html);
        $this->assertStringContainsString(backpack_url('reservation-approval/'.$booking->id.'/reject'), $html);
    }

    public function test_comment_model_renders_moderation_buttons_properly(): void
    {
        $comment = Comment::create([
            'name' => 'Komentator Uji',
            'email' => 'komentator@test.com',
            'body' => 'Isi komentar uji',
            'status' => 'PENDING',
        ]);

        $html = $comment->renderModerationButtons();
        $this->assertStringContainsString('Setujui', $html);
        $this->assertStringContainsString('Tolak', $html);
        $this->assertStringContainsString(backpack_url('comment/'.$comment->id.'/approve'), $html);
    }

    public function test_event_capacity_accessor(): void
    {
        $event = Event::create([
            'name' => 'Festival Komunikasi 2026',
            'max_visitor' => 250,
            'status' => 'PUBLISH',
        ]);

        $this->assertEquals(250, $event->capacity);
        $this->assertEquals(250, $event->remaining_quota);
    }

    public function test_settings_runtime_caching(): void
    {
        Setting::updateOrCreate(
            ['key' => 'site_title'],
            ['value' => 'Museum Penerangan RI', 'name' => 'Site Title', 'active' => 1]
        );

        $this->assertEquals('Museum Penerangan RI', Setting::get('site_title'));

        // Update value directly in DB without booting model to verify cache
        Setting::updateOrCreate(
            ['key' => 'site_title'],
            ['value' => 'Museum Penerangan TMII', 'name' => 'Site Title', 'active' => 1]
        );

        $this->assertEquals('Museum Penerangan TMII', Setting::get('site_title'));
    }

    public function test_booking_submission_and_quota_check(): void
    {
        config(['captcha.disable' => true]);

        // 1. Submit with frontend field aliases
        $targetDate = now()->addDays(5)->toDateString();
        $response = $this->post('/booking', [
            'name' => 'Budi Santoso',
            'place' => 'SMP Negeri 5 Jakarta',
            'email' => 'budi@smp5.sch.id',
            'phone' => '081234567890',
            'visitor' => 30,
            'date' => $targetDate,
            'session_type' => 'Sesi Pagi (09.00 - 11.30 WIB)',
            'category' => 'Pelajar / Sekolah',
            'captcha' => '1234',
        ]);

        $response->assertRedirect();
        $this->assertDatabaseHas('bookings', [
            'name' => 'Budi Santoso',
            'email' => 'budi@smp5.sch.id',
            'visitor' => 30,
        ]);

        // 2. Set max visitor to 50
        Setting::updateOrCreate(
            ['key' => 'max_visitor'],
            ['value' => '50', 'name' => 'Max Visitor', 'active' => 1]
        );

        // 3. Try to book 25 more when 30 are already booked (total 55 > 50)
        $overQuotaResponse = $this->post('/booking', [
            'name' => 'Rombongan Lain',
            'place' => 'Komunitas Lain',
            'email' => 'lain@komunitas.org',
            'phone' => '08987654321',
            'visitor' => 25,
            'date' => $targetDate,
            'session_type' => 'Sesi Pagi (09.00 - 11.30 WIB)',
            'category' => 'Komunitas / Organisasi',
            'captcha' => '1234',
        ]);

        $overQuotaResponse->assertSessionHasErrors(['visitor']);
    }

    public function test_guest_book_submission_succeeds(): void
    {
        config(['captcha.disable' => true]);

        $response = $this->post('/guest-book', [
            'name' => 'Ahmad Fauzi',
            'origin' => 'Surabaya',
            'email' => 'ahmad@fauzi.com',
            'phone' => '081399887766',
            'visitor_type' => 'ONSITE',
            'category' => 'Umum',
            'group_member_total' => 2,
            'subs' => 'Museum sangat bagus dan terawat.',
            'captcha' => '1234',
        ]);

        $response->assertRedirect(route('guest-book.index'));
        $this->assertDatabaseHas('guest_books', [
            'name' => 'Ahmad Fauzi',
            'no_whatsapp' => '081399887766',
            'origin' => 'Surabaya',
            'category' => 'Umum',
        ]);
    }

    public function test_complaint_submission_and_tracking(): void
    {
        config(['captcha.disable' => true]);

        $response = $this->post('/saran-aduan', [
            'title' => 'Saran Penambahan Lampu Penerangan Koleksi',
            'instansion' => 'Pribadi',
            'email' => 'pengunjung@muspen.id',
            'phone' => '08122334455',
            'category' => 'Fasilitas & Gedung',
            'type' => 'Saran & Masukan',
            'body' => 'Mohon ditambah pencahayaan pada lorong diorama kedua.',
            'captcha' => '1234',
        ]);

        $response->assertRedirect();
        $complaint = Complaint::where('email', 'pengunjung@muspen.id')->first();
        $this->assertNotNull($complaint);
        $this->assertEquals('Saran Penambahan Lampu Penerangan Koleksi', $complaint->title);

        // Test track page
        $trackResponse = $this->get('/saran-aduan/track?ticket='.$complaint->id);
        $trackResponse->assertStatus(200);
        $trackResponse->assertSee('Saran Penambahan Lampu Penerangan Koleksi');
    }
}
