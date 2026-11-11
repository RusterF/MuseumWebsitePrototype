<?php

namespace App\Http\Controllers\Admin;

use App\Models\Survey;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
use Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
use Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

class ApiSurveyCrudController extends CrudController
{
    use DeleteOperation;
    use ListOperation;
    use ShowOperation;

    public function setup()
    {
        CRUD::setModel(Survey::class);
        CRUD::setRoute(config('backpack.base.route_prefix').'/api-survey');
        CRUD::setEntityNameStrings('Survei Pengunjung', 'Survei Kepuasan Pengunjung (Digital/Online)');
    }

    protected function setupListOperation()
    {
        CRUD::column('id')->label('#');
        CRUD::column('name')->label('Nama Responden');
        CRUD::column('phone')->label('Telepon');
        CRUD::column('pameran')->label('Skor Pameran');
        CRUD::column('pemandu')->label('Skor Pemandu');
        CRUD::column('museum')->label('Skor Museum');
        CRUD::column('saran')->label('Saran / Ulasan')->limit(50);
        CRUD::column('created_at')->label('Waktu')->type('datetime');
    }
}
