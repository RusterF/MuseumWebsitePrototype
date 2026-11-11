<?php

namespace App\Http\Controllers\Admin;

use App\Models\OfflineSurvey;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
use Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
use Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

class OfflineSurveyCrudController extends CrudController
{
    use DeleteOperation;
    use ListOperation;
    use ShowOperation;

    public function setup()
    {
        CRUD::setModel(OfflineSurvey::class);
        CRUD::setRoute(config('backpack.base.route_prefix').'/offline-survey');
        CRUD::setEntityNameStrings('Survei Offline', 'Hasil Survei Kepuasan Offline');
    }

    protected function setupListOperation()
    {
        CRUD::column('guest_id')->label('ID Tamu');
        CRUD::column('pameran')->label('Nilai Pameran (1-5)');
        CRUD::column('pemandu')->label('Nilai Pemandu (1-5)');
        CRUD::column('museum')->label('Nilai Museum (1-5)');
        CRUD::column('saran')->label('Saran / Masukan')->limit(50);
        CRUD::column('created_at')->label('Waktu Survei')->type('datetime');
    }
}
