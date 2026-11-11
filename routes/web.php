<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\CollectionController;
use App\Http\Controllers\ComplaintController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\GuestBookController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\SurveyController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes - Museum Penerangan (Muspen)
|--------------------------------------------------------------------------
*/

// 1. Landing Page
Route::get('/', [HomeController::class, 'index'])->name('home');

// 2. Profile Museum
Route::get('/about-us', [AboutController::class, 'aboutUs'])->name('about-us');
Route::get('/tentang', [AboutController::class, 'aboutUs'])->name('tentang');
Route::get('/vision-mission', [AboutController::class, 'visionMission'])->name('vision-mission');
Route::get('/organization-structure', [AboutController::class, 'organizationStructure'])->name('organization-structure');
Route::get('/teams', [AboutController::class, 'teams'])->name('teams');
Route::get('/partners', [AboutController::class, 'partners'])->name('partners');
Route::get('/contact', [AboutController::class, 'contact'])->name('contact');

// 3. Collections
Route::get('/collections', [CollectionController::class, 'index'])->name('collections.index');
Route::get('/koleksi', [CollectionController::class, 'index'])->name('koleksi');
Route::get('/collections/perpustakaan', [CollectionController::class, 'library'])->name('collections.library');
Route::get('/collections/{slug}', [CollectionController::class, 'show'])->name('collections.show');
Route::get('/koleksi/{slug}', [CollectionController::class, 'show']);

// 4. Articles & Forum (Publikasi - Canva Pages 6 & 7)
Route::get('/forum', [ArticleController::class, 'index'])->name('forum.index');
Route::get('/forum/{slug}', [ArticleController::class, 'show'])->name('forum.show');
Route::get('/publikasi', [ArticleController::class, 'index'])->name('publikasi.index');
Route::get('/publikasi/{slug}', [ArticleController::class, 'show'])->name('publikasi.show');
Route::post('/forum/{slug}/comment', [ArticleController::class, 'storeComment'])
    ->middleware('throttle:3,1')
    ->name('forum.comment.store');
Route::post('/forum/{id}/report', [ArticleController::class, 'storeReport'])
    ->middleware('throttle:3,1')
    ->name('forum.report.store');

// 6. Events & Agenda
Route::get('/events', [EventController::class, 'index'])->name('events.index');
Route::get('/events/{slug}', [EventController::class, 'show'])->name('events.show');

// 7. Booking & Services (Layanan Muspen - Canva Pages 8-12 & Google Doc #5)
Route::get('/layanan/kunjungan-museum', [ServiceController::class, 'kunjunganMuseum'])->name('services.kunjungan-museum');
Route::get('/layanan/virtual-experience', [ServiceController::class, 'virtualExperience'])->name('services.virtual-experience');
Route::get('/layanan/peminjaman', [ServiceController::class, 'peminjaman'])->name('services.peminjaman');
Route::get('/layanan/penelitian', [ServiceController::class, 'penelitian'])->name('services.penelitian');
Route::get('/layanan/perpustakaan', [ServiceController::class, 'perpustakaan'])->name('services.perpustakaan');

Route::get('/booking', [BookingController::class, 'create'])->name('booking.create');
Route::get('/api/check-capacity', [BookingController::class, 'checkCapacity'])->name('api.check-capacity');
Route::post('/booking', [BookingController::class, 'store'])
    ->middleware('throttle:3,1')
    ->name('booking.store');
Route::get('/booking/success/{id}', [BookingController::class, 'success'])->name('booking.success');
Route::get('/booking/check', [BookingController::class, 'check'])->name('booking.check');

// 8. Digital Guest Book
Route::get('/guest-book', [GuestBookController::class, 'index'])->name('guest-book.index');
Route::post('/guest-book', [GuestBookController::class, 'store'])
    ->middleware('throttle:3,1')
    ->name('guest-book.store');

// 9. Complaints & Suggestions
Route::get('/saran-aduan', [ComplaintController::class, 'index'])->name('saran-aduan.index');
Route::get('/saran-aduan/span-lapor', [ComplaintController::class, 'spanLapor'])->name('complaint.span-lapor');
Route::post('/saran-aduan', [ComplaintController::class, 'store'])
    ->middleware('throttle:3,1')
    ->name('saran-aduan.store');
Route::get('/saran-aduan/success/{id}', [ComplaintController::class, 'success'])->name('saran-aduan.success');
Route::get('/saran-aduan/track', [ComplaintController::class, 'track'])->name('saran-aduan.track');

// 10. Satisfaction Survey
Route::get('/survey', [SurveyController::class, 'create'])->name('survey.create');
Route::post('/survey', [SurveyController::class, 'store'])
    ->middleware('throttle:3,1')
    ->name('survey.store');

// Captcha Refresh API
Route::get('/refresh-captcha', function () {
    return response()->json([
        'captcha' => captcha_src('mini'),
    ]);
})->name('refresh-captcha');
