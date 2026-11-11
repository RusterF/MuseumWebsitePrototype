<?php

namespace App\Http\Controllers\Admin;

use App\Models\TvLink;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
use Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
use Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
use Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

class TvLinkCrudController extends CrudController
{
    use CreateOperation;
    use DeleteOperation;
    use ListOperation;
    use UpdateOperation;

    public function setup()
    {
        CRUD::setModel(TvLink::class);
        CRUD::setRoute(config('backpack.base.route_prefix').'/tv-link');
        CRUD::setEntityNameStrings('Video TV Link', 'Muspen TV / Video');
    }

    protected function setupListOperation()
    {
        CRUD::column('id')->label('#');
        CRUD::column('name')->label('Judul Tayangan');
        CRUD::column('embed_link')->label('Tautan YouTube');
        CRUD::column('is_featured')->label('Featured')->type('check');
    }

    protected function setupCreateOperation()
    {
        CRUD::field('name')->label('Judul Video / Siaran')->type('text');
        CRUD::field('embed_link')->label('Tautan Video YouTube')->type('text')->hint('Contoh: https://www.youtube.com/watch?v=xxxxx');
        CRUD::field('description')->label('Deskripsi Video')->type('textarea');
        CRUD::field('is_featured')->label('Tampilkan di Beranda (Featured)')->type('checkbox');
    }

    protected function setupUpdateOperation()
    {
        $this->setupCreateOperation();
    }
}
