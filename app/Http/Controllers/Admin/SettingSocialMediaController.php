<?php

namespace App\Http\Controllers\Admin;

use App\Models\Setting;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class SettingSocialMediaController extends CrudController
{
    public function setup()
    {
        $this->crud->setModel(Setting::class);
        $this->crud->setRoute(config('backpack.base.route_prefix').'/setting-social-media');
        $this->crud->setEntityNameStrings('Media Sosial', 'Pengaturan Akun Media Sosial');
    }

    public function index(): View
    {
        $this->data['title'] = 'Pengaturan Media Sosial Museum';
        $this->data['breadcrumbs'] = [
            trans('backpack::crud.admin') => backpack_url('dashboard'),
            'Media Sosial' => false,
        ];

        $keys = ['facebook', 'instagram', 'youtube', 'twitter', 'tiktok'];
        $settings = [];
        foreach ($keys as $k) {
            $settings[$k] = Setting::get($k, '');
        }

        $this->data['settings'] = $settings;

        return view('admin.setting_social_media', $this->data);
    }

    public function updateSocial(Request $request): RedirectResponse
    {
        $allowedKeys = ['facebook', 'instagram', 'youtube', 'twitter', 'tiktok'];
        $inputs = $request->only($allowedKeys);

        foreach ($inputs as $key => $val) {
            Setting::updateOrCreate(
                ['key' => $key],
                ['value' => $val ? filter_var($val, FILTER_SANITIZE_URL) : null, 'name' => ucfirst($key), 'active' => 1]
            );
        }

        \Alert::success('Pengaturan tautan media sosial berhasil disimpan!')->flash();

        return redirect()->back();
    }
}
