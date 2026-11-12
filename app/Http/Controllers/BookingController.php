<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Event;
use App\Models\Setting;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    public function create(Request $request): View
    {
        $events = Event::where('status', 'PUBLISH')
            ->where('date', '>=', now())
            ->get();

        $selectedEventId = $request->query('event_id');
        $maxDailyQuota = (int) Setting::get('max_visitor', '900');

        return view('frontend.booking.create', compact('events', 'selectedEventId', 'maxDailyQuota'));
    }

    /**
     * Real-time API capacity check endpoint.
     */
    public function checkCapacity(Request $request): JsonResponse
    {
        $date = $request->query('date', now()->toDateString());
        $maxDailyQuota = (int) Setting::get('max_visitor', '900');

        $bookedVisitors = (int) Booking::whereDate('date', $date)
            ->where(function ($q) {
                $q->whereNull('approval_status')
                    ->orWhere('approval_status', 'APPROVED')
                    ->orWhere('approval_status', 'PENDING');
            })
            ->sum('visitor');

        $remaining = max(0, $maxDailyQuota - $bookedVisitors);

        return response()->json([
            'date' => $date,
            'max_capacity' => $maxDailyQuota,
            'booked' => $bookedVisitors,
            'remaining' => $remaining,
            'is_available' => $remaining > 0,
            'status_label' => $remaining > 0 ? "Tersedia ({$remaining} slot sisa)" : 'Kapasitas Penuh',
        ]);
    }

    public function store(Request $request): RedirectResponse
    {
        // Support frontend input aliases gracefully
        if (! $request->filled('date') && $request->filled('visit_date')) {
            $request->merge(['date' => $request->input('visit_date')]);
        }
        if (! $request->filled('visitor') && $request->filled('total_people')) {
            $request->merge(['visitor' => $request->input('total_people')]);
        }
        if (! $request->filled('session_type') && $request->filled('time_slot')) {
            $request->merge(['session_type' => $request->input('time_slot')]);
        }

        $request->validate([
            'name' => 'required|string|max:100',
            'place' => 'required|string|max:150',
            'email' => 'required|email|max:100',
            'phone' => 'required|string|max:25',
            'visitor' => 'required|integer|min:1|max:500',
            'date' => 'required|date|after_or_equal:today',
            'session_type' => 'required|string',
            'category' => 'required|string',
            'event_id' => 'nullable|exists:events,id',
            'captcha' => 'required|captcha',
        ], [
            'name.required' => 'Nama PIC / Pemesan wajib diisi.',
            'place.required' => 'Nama Instansi, Sekolah, atau Komunitas wajib diisi.',
            'email.required' => 'Email PIC wajib diisi.',
            'email.email' => 'Format email tidak valid.',
            'phone.required' => 'Nomor Telepon / WhatsApp wajib diisi.',
            'visitor.required' => 'Jumlah rombongan wajib diisi.',
            'visitor.min' => 'Jumlah rombongan minimal 1 orang.',
            'visitor.max' => 'Untuk rombongan lebih dari 500 orang, silakan hubungi pengelola langsung.',
            'date.required' => 'Tanggal rencana kunjungan wajib dipilih.',
            'date.after_or_equal' => 'Tanggal kunjungan tidak boleh di masa lampau.',
            'session_type.required' => 'Sesi kunjungan wajib dipilih.',
            'category.required' => 'Kategori kunjungan wajib dipilih.',
            'captcha.required' => 'Kode keamanan Captcha wajib diisi.',
            'captcha.captcha' => 'Kode Captcha yang Anda masukkan tidak sesuai.',
        ]);

        $requestedDate = $request->input('date');
        $requestedVisitors = (int) $request->input('visitor');
        $maxDailyQuota = (int) Setting::get('max_visitor', '900');

        $bookedVisitors = (int) Booking::whereDate('date', $requestedDate)
            ->where(function ($q) {
                $q->whereNull('approval_status')
                    ->orWhere('approval_status', 'APPROVED')
                    ->orWhere('approval_status', 'PENDING');
            })
            ->sum('visitor');

        $remaining = max(0, $maxDailyQuota - $bookedVisitors);
        if ($requestedVisitors > $remaining) {
            return redirect()->back()
                ->withInput()
                ->withErrors(['visitor' => "Kapasitas harian museum tidak mencukupi untuk tanggal tersebut. Sisa kuota tersedia: {$remaining} pengunjung."]);
        }

        $booking = Booking::create([
            'name' => strip_tags($request->input('name')),
            'place' => strip_tags($request->input('place')),
            'email' => filter_var($request->input('email'), FILTER_SANITIZE_EMAIL),
            'phone' => strip_tags($request->input('phone')),
            'visitor' => $requestedVisitors,
            'date' => $requestedDate,
            'session_type' => $request->input('session_type'),
            'category' => $request->input('category'),
            'event_id' => $request->input('event_id'),
            'type' => 'ONSITE',
            'approval_status' => 'PENDING',
        ]);

        return redirect()->route('booking.success', ['id' => $booking->id])
            ->with('success', 'Permohonan reservasi Anda berhasil diajukan!');
    }

    public function success(int $id): View
    {
        $booking = Booking::with('event')->findOrFail($id);

        return view('frontend.booking.success', compact('booking'));
    }
}
