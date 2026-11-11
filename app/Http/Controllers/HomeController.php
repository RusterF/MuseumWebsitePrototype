<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Collection;
use App\Models\Event;
use App\Models\GuestBook;
use App\Models\Partner;
use App\Models\Setting;
use App\Models\TvLink;
use App\Models\Visitor;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(Request $request): View
    {
        $heroTitle = 'Museum Penerangan';
        $heroSubtitle = 'Jelajahi sejarah masa lalu, masa kini, dan masa depan penerangan serta komunikasi bangsa Indonesia di Taman Mini Indonesia Indah.';
        $featuredCollections = collect();
        $upcomingEvents = collect();
        $latestArticles = collect();
        $partners = collect();
        $tvLinks = collect();
        $totalCollections = 100;
        $totalArticles = 0;
        $totalGuestBooks = 0;
        $totalOnlineVisitors = 0;
        $totalOnsiteVisitors = 0;

        try {
            // Simple visitor tracking
            $today = now()->toDateString();
            $todayVisitor = Visitor::firstOrCreate(
                ['date' => $today, 'type' => 'ONLINE'],
                ['amount' => 0]
            );
            $todayVisitor->increment('amount');

            $heroTitle = Setting::get('site_title', 'Museum Penerangan');
            $heroSubtitle = Setting::get('site_description', $heroSubtitle);

            $featuredCollections = Collection::with('category')
                ->where('status', 'PUBLISH')
                ->inRandomOrder()
                ->limit(6)
                ->get();

            $upcomingEvents = Event::where('status', 'PUBLISH')
                ->where('date', '>=', now()->subMonths(12))
                ->orderBy('date', 'asc')
                ->limit(4)
                ->get();

            $latestArticles = Article::with('category')
                ->where(function ($q) {
                    $q->where('approval_status', 'Y')->orWhereNull('approval_status');
                })
                ->orderBy('date', 'desc')
                ->limit(4)
                ->get();

            $partners = Partner::orderBy('id', 'asc')->get();
            $tvLinks = TvLink::orderBy('is_featured', 'desc')->limit(4)->get();

            $totalCollections = Collection::count();
            $totalArticles = Article::count();
            $totalGuestBooks = GuestBook::count();

            $driver = \DB::connection()->getDriverName();
            $castExpr = $driver === 'sqlite' ? 'CAST(amount AS INTEGER)' : 'CAST(amount AS UNSIGNED)';

            $totalOnlineVisitors = (int) Visitor::where('type', 'ONLINE')
                ->selectRaw("SUM({$castExpr}) as total")
                ->value('total');

            $totalOnsiteVisitors = (int) Visitor::where('type', 'ONSITE')
                ->selectRaw("SUM({$castExpr}) as total")
                ->value('total');
        } catch (\Throwable $e) {
            // Graceful fallback if database connection is pending
            \Log::info('Database connection not ready on homepage, falling back to static view data: '.$e->getMessage());
        }

        return view('frontend.home', compact(
            'heroTitle',
            'heroSubtitle',
            'featuredCollections',
            'upcomingEvents',
            'latestArticles',
            'partners',
            'tvLinks',
            'totalCollections',
            'totalArticles',
            'totalGuestBooks',
            'totalOnlineVisitors',
            'totalOnsiteVisitors'
        ));
    }
}
