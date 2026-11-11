<?php

namespace App\Http\Controllers;

use App\Models\Survey;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class SurveyController extends Controller
{
    public function create(): View
    {
        return view('frontend.survey');
    }

    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => 'required|string|max:100',
            'phone' => 'nullable|string|max:25',
            'pameran' => 'required|integer|between:1,5',
            'pemandu' => 'required|integer|between:1,5',
            'museum' => 'required|integer|between:1,5',
            'saran' => 'nullable|string|max:1000',
            'captcha' => 'required|captcha',
        ], [
            'name.required' => 'Nama responden wajib diisi.',
            'pameran.required' => 'Penilaian pameran wajib diisi.',
            'pemandu.required' => 'Penilaian pemandu wajib diisi.',
            'museum.required' => 'Penilaian fasilitas museum wajib diisi.',
            'captcha.required' => 'Kode Captcha wajib diisi.',
            'captcha.captcha' => 'Kode Captcha salah.',
        ]);

        Survey::create([
            'name' => strip_tags($request->input('name')),
            'phone' => strip_tags($request->input('phone', '')),
            'pameran' => (int) $request->input('pameran'),
            'pemandu' => (int) $request->input('pemandu'),
            'museum' => (int) $request->input('museum'),
            'saran' => strip_tags($request->input('saran', '')),
        ]);

        return redirect()->route('survey.create')
            ->with('success', 'Terima kasih atas partisipasi Anda dalam survei kepuasan Museum Penerangan!');
    }
}
