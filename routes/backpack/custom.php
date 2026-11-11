<?php

use App\Http\Controllers\Admin\CommentCrudController;
use App\Http\Controllers\Admin\MonthlyVisitorChartCrudController;
use App\Http\Controllers\Admin\ReservationApprovalCrudController;
use App\Http\Controllers\Admin\SettingSocialMediaController;
use App\Http\Controllers\Admin\SettingWebInfoController;
use Illuminate\Support\Facades\Route;

// --------------------------
// Custom Backpack Routes
// --------------------------
// This route file is loaded automatically by Backpack\CRUD.
// Routes you generate using Backpack\Generators will be placed here.

Route::group([
    'prefix' => config('backpack.base.route_prefix', 'admin'),
    'as' => 'admin.',
    'middleware' => array_merge(
        (array) config('backpack.base.web_middleware', 'web'),
        (array) config('backpack.base.middleware_key', 'admin')
    ),
    'namespace' => 'App\Http\Controllers\Admin',
], function () { // custom admin routes
    // 1. Content Management (CMS)
    Route::crud('article', 'ArticleCrudController');
    Route::crud('cms-category', 'CmsCategoryCrudController');
    Route::crud('cms-tag', 'CmsTagCrudController');
    Route::crud('collection', 'CollectionCrudController');
    Route::crud('collection-category', 'CollectionCategoryCrudController');
    Route::crud('event', 'EventCrudController');
    Route::crud('gallery', 'GalleryCrudController');
    Route::crud('tv-link', 'TvLinkCrudController');
    Route::crud('team', 'TeamCrudController');
    Route::crud('partner', 'PartnerCrudController');

    // 2. Reservation Management & Approvals
    Route::crud('booking', 'BookingCrudController');
    Route::crud('reservation-approval', 'ReservationApprovalCrudController');
    Route::post('reservation-approval/{id}/approve', [ReservationApprovalCrudController::class, 'approve'])->name('reservation-approval.approve');
    Route::post('reservation-approval/{id}/reject', [ReservationApprovalCrudController::class, 'reject'])->name('reservation-approval.reject');

    // 3. Moderation & Communication
    Route::crud('comment', 'CommentCrudController');
    Route::post('comment/{id}/approve', [CommentCrudController::class, 'approve'])->name('comment.approve');
    Route::post('comment/{id}/reject', [CommentCrudController::class, 'reject'])->name('comment.reject');
    Route::crud('report', 'ReportCrudController');
    Route::crud('complaint', 'ComplaintCrudController');
    Route::crud('guest-book', 'GuestBookCrudController');

    // 4. Visitor Statistics & Surveys
    Route::crud('online-visitor', 'OnlineVisitorCrudController');
    Route::crud('onsite-visitor', 'OnsiteVisitorCrudController');
    Route::crud('offline-visitor', 'OfflineVisitorCrudController');
    Route::get('monthly-visitor-chart', [MonthlyVisitorChartCrudController::class, 'index'])->name('monthly-visitor-chart');
    Route::crud('offline-survey', 'OfflineSurveyCrudController');
    Route::crud('api-survey', 'ApiSurveyCrudController');

    // 5. Settings & User Management
    Route::get('setting-web-info', [SettingWebInfoController::class, 'index'])->name('setting-web-info.index');
    Route::post('setting-web-info', [SettingWebInfoController::class, 'updateSettings'])->name('setting-web-info.update');
    Route::get('setting-social-media', [SettingSocialMediaController::class, 'index'])->name('setting-social-media.index');
    Route::post('setting-social-media', [SettingSocialMediaController::class, 'updateSocial'])->name('setting-social-media.update');
    Route::crud('user', 'UserCrudController');
}); // this should be the absolute last line of this file

/**
 * DO NOT ADD ANYTHING HERE.
 */
