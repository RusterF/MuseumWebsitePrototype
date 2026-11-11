<?php

namespace App\Http\Controllers\Admin;

use App\Models\Booking;
use App\Models\GuestBook;
use App\Models\OfflineVisitor;
use App\Models\Visitor;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\DB;

class MonthlyVisitorChartCrudController extends CrudController
{
    public function setup()
    {
        $this->crud->setModel(Visitor::class);
        $this->crud->setRoute(config('backpack.base.route_prefix').'/monthly-visitor-chart');
        $this->crud->setEntityNameStrings('Grafik Pengunjung', 'Dashboard Statistik Pengunjung Bulanan');
    }

    public function index(): View
    {
        $this->data['title'] = 'Dashboard Statistik & Grafik Pengunjung Bulanan';
        $this->data['breadcrumbs'] = [
            trans('backpack::crud.admin') => backpack_url('dashboard'),
            'Statistik Pengunjung' => false,
        ];

        // Monthly visitor totals
        $driver = DB::connection()->getDriverName();
        $dateExpr = $driver === 'sqlite' ? "strftime('%Y-%m', date)" : 'DATE_FORMAT(date, "%Y-%m")';
        $castExpr = $driver === 'sqlite' ? 'CAST(amount AS INTEGER)' : 'CAST(amount AS UNSIGNED)';

        $monthlyStats = DB::table('visitors')
            ->selectRaw("{$dateExpr} as ym, type, SUM({$castExpr}) as total")
            ->whereNotNull('date')
            ->groupBy('ym', 'type')
            ->orderBy('ym', 'desc')
            ->limit(24)
            ->get();

        $guestBookCount = GuestBook::count();
        $offlineVisitorCount = OfflineVisitor::count();
        $totalBookings = Booking::count();
        $approvedBookings = Booking::where('approval_status', 'APPROVED')->count();

        $this->data['monthlyStats'] = $monthlyStats;
        $this->data['guestBookCount'] = $guestBookCount;
        $this->data['offlineVisitorCount'] = $offlineVisitorCount;
        $this->data['totalBookings'] = $totalBookings;
        $this->data['approvedBookings'] = $approvedBookings;

        return view('admin.monthly_visitor_chart', $this->data);
    }
}
