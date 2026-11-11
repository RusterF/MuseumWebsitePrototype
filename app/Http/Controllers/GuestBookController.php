<?php

namespace App\Http\Controllers;

use App\Models\GuestBook;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class GuestBookController extends Controller
{
    public function index(): View
    {
        $todayCount = GuestBook::whereDate('created_at', now()->toDateString())->count();
        $totalCount = GuestBook::count();

        $recentGuests = GuestBook::orderBy('created_at', 'desc')
            ->limit(10)
            ->get();

        return view('frontend.guest_book', compact('todayCount', 'totalCount', 'recentGuests'));
    }

    public function store(Request $request): RedirectResponse
    {
        // Support frontend phone / no_whatsapp interchangeably
        if (! $request->filled('no_whatsapp') && $request->filled('phone')) {
            $request->merge(['no_whatsapp' => $request->input('phone')]);
        }
        if (! $request->filled('phone') && $request->filled('no_whatsapp')) {
            $request->merge(['phone' => $request->input('no_whatsapp')]);
        }
        if (! $request->filled('category')) {
            $request->merge(['category' => 'Umum']);
        }

        $request->validate([
            'name' => 'required|string|max:100',
            'origin' => 'required|string|max:150',
            'email' => 'nullable|email|max:100',
            'no_whatsapp' => 'nullable|string|max:25',
            'visitor_type' => 'required|string',
            'category' => 'required|string|max:100',
            'group_member_total' => 'required|integer|min:1',
            'group_name' => 'nullable|string|max:150',
            'captcha' => 'required|captcha',
        ], [
            'name.required' => 'Nama lengkap / perwakilan wajib diisi.',
            'origin.required' => 'Kota asal atau instansi wajib diisi.',
            'visitor_type.required' => 'Tipe kunjungan (Onsite / Online) wajib dipilih.',
            'category.required' => 'Kategori pengunjung wajib dipilih.',
            'group_member_total.required' => 'Jumlah anggota rombongan wajib diisi.',
            'captcha.required' => 'Kode Captcha wajib diisi.',
            'captcha.captcha' => 'Kode Captcha yang dimasukkan salah.',
        ]);

        GuestBook::create([
            'name' => strip_tags($request->input('name')),
            'origin' => strip_tags($request->input('origin')),
            'email' => filter_var($request->input('email'), FILTER_SANITIZE_EMAIL),
            'no_whatsapp' => strip_tags($request->input('no_whatsapp', '')),
            'visitor_type' => $request->input('visitor_type'),
            'category' => $request->input('category'),
            'group_name' => strip_tags($request->input('group_name', '')),
            'group_member_total' => $request->input('group_member_total'),
            'subs' => strip_tags($request->input('subs', '')),
        ]);

        return redirect()->route('guest-book.index')
            ->with('success', 'Terima kasih telah mengisi buku tamu digital Museum Penerangan!');
    }
}
