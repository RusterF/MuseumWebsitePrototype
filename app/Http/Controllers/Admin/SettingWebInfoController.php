<?php

namespace App\Http\Controllers\Admin;

use App\Models\Setting;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class SettingWebInfoController extends CrudController
{
    public function setup()
    {
        $this->crud->setModel(Setting::class);
        $this->crud->setRoute(config('backpack.base.route_prefix').'/setting-web-info');
        $this->crud->setEntityNameStrings('Informasi Museum', 'Pengaturan Profil Museum');
    }

    public function index(): View
    {
        $this->data['title'] = 'Pengaturan Informasi & Profil Museum';
        $this->data['breadcrumbs'] = [
            trans('backpack::crud.admin') => backpack_url('dashboard'),
            'Pengaturan Web' => false,
        ];

        $keys = [
            'site_title', 'site_description', 'contact_email', 'phone',
            'operational_hours', 'address', 'maps_address', 'max_visitor',
            'about_us', 'visi', 'misi', 'virtual_tour_url',
        ];

        $settings = [];
        foreach ($keys as $k) {
            $settings[$k] = Setting::get($k, '');
        }

        $this->data['settings'] = $settings;

        return view('admin.setting_web_info', $this->data);
    }

    public function updateSettings(Request $request): RedirectResponse
    {
        $allowedKeys = [
            'site_title', 'site_description', 'contact_email', 'phone',
            'operational_hours', 'address', 'maps_address', 'max_visitor',
            'about_us', 'visi', 'misi', 'virtual_tour_url',
        ];

        $inputs = $request->only($allowedKeys);

        foreach ($inputs as $key => $val) {
            Setting::updateOrCreate(
                ['key' => $key],
                ['value' => is_string($val) ? strip_tags($val, '<p><br><strong><em><a><ul><ol><li>') : $val, 'name' => ucwords(str_replace('_', ' ', $key)), 'active' => 1]
            );
        }

        \Alert::success('Pengaturan profil museum berhasil disimpan!')->flash();

        return redirect()->back();
    }
}
