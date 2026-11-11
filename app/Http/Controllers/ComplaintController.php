<?php

namespace App\Http\Controllers;

use App\Models\Complaint;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class ComplaintController extends Controller
{
    public function index(): View
    {
        return view('frontend.complaint.index');
    }

    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'title' => 'required|string|max:150',
            'instansion' => 'nullable|string|max:150',
            'email' => 'required|email|max:100',
            'phone' => 'required|string|max:25',
            'category' => 'required|string',
            'type' => 'required|string',
            'body' => 'required|string|min:10|max:2000',
            'location' => 'nullable|string|max:150',
            'captcha' => 'required|captcha',
        ], [
            'title.required' => 'Judul / Perihal aduan wajib diisi.',
            'email.required' => 'Email pelapor wajib diisi.',
            'phone.required' => 'Nomor Telepon / WhatsApp wajib diisi.',
            'category.required' => 'Kategori aduan wajib dipilih.',
            'type.required' => 'Jenis permohonan wajib dipilih.',
            'body.required' => 'Rincian pesan atau keluhan tidak boleh kosong.',
            'body.min' => 'Rincian pesan minimal 10 karakter.',
            'captcha.required' => 'Kode Captcha wajib diisi.',
            'captcha.captcha' => 'Kode Captcha salah. Silakan coba lagi.',
        ]);

        $complaint = Complaint::create([
            'title' => strip_tags($request->input('title')),
            'instansion' => strip_tags($request->input('instansion', '')),
            'email' => filter_var($request->input('email'), FILTER_SANITIZE_EMAIL),
            'phone' => strip_tags($request->input('phone')),
            'category' => $request->input('category'),
            'type' => $request->input('type'),
            'location' => strip_tags($request->input('location', '')),
            'body' => strip_tags($request->input('body')),
            'date' => now(),
        ]);

        return redirect()->route('saran-aduan.success', ['id' => $complaint->id])
            ->with('success', 'Aspirasi / Pengaduan Anda berhasil dikirim!');
    }

    public function success(int $id): View
    {
        $complaint = Complaint::findOrFail($id);

        return view('frontend.complaint.success', compact('complaint'));
    }

    public function track(Request $request): View
    {
        $complaint = null;
        $searched = false;

        if ($request->filled('ticket')) {
            $searched = true;
            $ticket = trim($request->input('ticket'));

            // Extract numeric ID if format ADUAN-YYYYMMDD-XXXX
            $id = null;
            if (preg_match('/ADUAN-\d+-(\d+)/i', $ticket, $m)) {
                $id = (int) $m[1];
            } elseif (is_numeric($ticket)) {
                $id = (int) $ticket;
            }

            $complaint = Complaint::where(function ($q) use ($ticket, $id) {
                if ($id) {
                    $q->where('id', $id);
                } else {
                    $q->where('email', $ticket)->orWhere('phone', $ticket);
                }
            })->first();
        }

        return view('frontend.complaint.track', compact('complaint', 'searched'));
    }

    /**
     * Layanan SPAN LAPOR (Canva Page 16)
     */
    public function spanLapor(): View
    {
        return view('frontend.complaint.span_lapor');
    }
}
