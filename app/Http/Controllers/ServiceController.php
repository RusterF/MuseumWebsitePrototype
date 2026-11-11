<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;

class ServiceController extends Controller
{
    /**
     * Layanan Kunjungan Museum (Canva Page 8 & Google Doc #5.1)
     */
    public function kunjunganMuseum(): View
    {
        return view('frontend.services.kunjungan_museum');
    }

    /**
     * Layanan Kunjungan Daring Kelompok / Virtual Experience (Canva Page 9 & Google Doc #5.2)
     */
    public function virtualExperience(): View
    {
        return view('frontend.services.virtual_experience');
    }

    /**
     * Layanan Peminjaman Bangunan & Koleksi (Canva Page 10 & Google Doc #5.3 & #5.4)
     */
    public function peminjaman(): View
    {
        return view('frontend.services.peminjaman');
    }

    /**
     * Layanan Penelitian Ilmiah Individu dan Kelompok (Canva Page 11 & Google Doc #5.5)
     */
    public function penelitian(): View
    {
        return view('frontend.services.penelitian');
    }

    /**
     * Layanan Perpustakaan (Canva Page 12 & Google Doc #5.6)
     */
    public function perpustakaan(): View
    {
        return view('frontend.services.perpustakaan');
    }
}
