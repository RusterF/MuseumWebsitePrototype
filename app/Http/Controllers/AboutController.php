<?php

namespace App\Http\Controllers;

use App\Models\Partner;
use App\Models\Setting;
use App\Models\Team;
use Illuminate\Contracts\View\View;

class AboutController extends Controller
{
    public function aboutUs(): View
    {
        $aboutText = Setting::get('about_us', 'Museum Penerangan diresmikan oleh Presiden Soeharto pada 20 April 1993 di Taman Mini Indonesia Indah (TMII) Jakarta.');
        $address = Setting::get('address', 'Taman Mini Indonesia Indah, Jl. Pintu 2 TMII, Pondok Gede, Jakarta Timur');
        $phone = Setting::get('phone', '08118132121');
        $email = Setting::get('contact_email', 'Muspen@Kominfo.com');

        return view('frontend.about_us', compact('aboutText', 'address', 'phone', 'email'));
    }

    public function visionMission(): View
    {
        $visi = Setting::get('visi', 'Menjadi Museum Smart dan Komunikatif yang melestarikan dan mengedukasi sejarah komunikasi bangsa Indonesia.');
        $misi = Setting::get('misi', "1. Melakukan pengelolaan koleksi yang berstandar nasional dan internasional.\n2. Memberikan layanan edukasi dan informasi sejarah serta perkembangan media komunikasi.\n3. Mengembangkan teknologi digital interaktif dalam penyajian informasi museum.");

        return view('frontend.vision_mission', compact('visi', 'misi'));
    }

    public function organizationStructure(): View
    {
        $teams = Team::all();

        return view('frontend.organization_structure', compact('teams'));
    }

    public function teams(): View
    {
        $teams = Team::all();

        return view('frontend.teams', compact('teams'));
    }

    public function partners(): View
    {
        $partners = Partner::all();

        return view('frontend.partners', compact('partners'));
    }

    public function contact(): View
    {
        $address = Setting::get('address', 'Taman Mini Indonesia Indah, Jl. Pintu 2 TMII, Jakarta Timur');
        $phone = Setting::get('phone', '08118132121');
        $email = Setting::get('contact_email', 'Muspen@Kominfo.com');
        $operationalHours = Setting::get('operational_hours', 'Buka Setiap Hari: 09.00 - 15.00 WIB');
        $maps = Setting::get('maps_address', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3965.728881709309!2d106.8973719!3d-6.3006208!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69ed5a7114bbfd%3A0xe54ef7bf8be7091!2sMuseum%20Penerangan!5e0!3m2!1sid!2sid!4v1657000000000!5m2!1sid!2sid');

        return view('frontend.contact', compact('address', 'phone', 'email', 'operationalHours', 'maps'));
    }
}
