@extends(backpack_view('blank'))

@section('header')
    <section class="header-operation container-fluid animated fadeIn d-flex justify-content-between align-items-baseline mb-3">
        <h1 class="text-capitalize mb-0">Statistik Pengunjung Bulanan</h1>
        <div class="text-muted small">Museum Penerangan - Monitoring & Analitik</div>
    </section>
@endsection

@section('content')
<div class="row row-deck row-cards mb-4">
    <div class="col-sm-6 col-lg-3">
        <div class="card card-sm shadow-sm border-0">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <div class="subheader">Buku Tamu Digital</div>
                </div>
                <div class="h1 mb-0 font-weight-bold text-primary">{{ number_format($guestBookCount) }}</div>
                <div class="text-muted small mt-1">Total entri buku tamu</div>
            </div>
        </div>
    </div>
    <div class="col-sm-6 col-lg-3">
        <div class="card card-sm shadow-sm border-0">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <div class="subheader">Pengunjung Offline / Kiosk</div>
                </div>
                <div class="h1 mb-0 font-weight-bold text-success">{{ number_format($offlineVisitorCount) }}</div>
                <div class="text-muted small mt-1">Total pencatatan onsite</div>
            </div>
        </div>
    </div>
    <div class="col-sm-6 col-lg-3">
        <div class="card card-sm shadow-sm border-0">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <div class="subheader">Total Reservasi Masuk</div>
                </div>
                <div class="h1 mb-0 font-weight-bold text-info">{{ number_format($totalBookings) }}</div>
                <div class="text-muted small mt-1">Permohonan kunjungan rombongan</div>
            </div>
        </div>
    </div>
    <div class="col-sm-6 col-lg-3">
        <div class="card card-sm shadow-sm border-0">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <div class="subheader">Reservasi Disetujui</div>
                </div>
                <div class="h1 mb-0 font-weight-bold text-warning">{{ number_format($approvedBookings) }}</div>
                <div class="text-muted small mt-1">Kunjungan yang telah terkonfirmasi</div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-lg-8">
        <div class="card shadow-sm border-0 mb-4">
            <div class="card-header bg-white">
                <h3 class="card-title font-weight-bold">Tren Kunjungan Bulanan (Online vs Onsite)</h3>
            </div>
            <div class="card-body">
                <canvas id="monthlyChart" height="130"></canvas>
            </div>
        </div>
    </div>
    <div class="col-lg-4">
        <div class="card shadow-sm border-0 mb-4">
            <div class="card-header bg-white">
                <h3 class="card-title font-weight-bold">Rekap Data Kunjungan Terakhir</h3>
            </div>
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-vcenter card-table table-striped mb-0">
                        <thead>
                            <tr>
                                <th>Bulan</th>
                                <th>Kategori</th>
                                <th class="text-end">Jumlah</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($monthlyStats->take(10) as $stat)
                            <tr>
                                <td class="font-weight-medium">{{ $stat->ym }}</td>
                                <td>
                                    <span class="badge {{ strtolower($stat->type) == 'onsite' ? 'bg-green-lt text-success' : 'bg-blue-lt text-primary' }}">
                                        {{ strtoupper($stat->type) }}
                                    </span>
                                </td>
                                <td class="text-end font-weight-bold">{{ number_format($stat->total) }}</td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="3" class="text-center py-3 text-muted">Belum ada data statistik kunjungan</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    document.addEventListener("DOMContentLoaded", function () {
        const stats = @json($monthlyStats);
        const months = [...new Set(stats.map(s => s.ym))].slice(0, 12).reverse();
        
        const onsiteData = months.map(m => {
            const row = stats.find(s => s.ym === m && (s.type.toUpperCase() === 'ONSITE'));
            return row ? parseInt(row.total) : 0;
        });

        const onlineData = months.map(m => {
            const row = stats.find(s => s.ym === m && (s.type.toUpperCase() === 'ONLINE'));
            return row ? parseInt(row.total) : 0;
        });

        const ctx = document.getElementById('monthlyChart').getContext('2d');
        new Chart(ctx, {
            type: 'bar',
            data: {
                labels: months,
                datasets: [
                    {
                        label: 'Pengunjung Onsite',
                        data: onsiteData,
                        backgroundColor: '#10b981',
                        borderRadius: 6,
                    },
                    {
                        label: 'Pengunjung Online',
                        data: onlineData,
                        backgroundColor: '#3b82f6',
                        borderRadius: 6,
                    }
                ]
            },
            options: {
                responsive: true,
                maintainAspectRatio: true,
                scales: {
                    y: {
                        beginAtZero: true,
                        grid: { color: '#f1f5f9' }
                    },
                    x: {
                        grid: { display: false }
                    }
                },
                plugins: {
                    legend: {
                        position: 'top',
                    }
                }
            }
        });
    });
</script>
@endsection
