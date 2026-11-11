<?php

namespace App\Http\Controllers\Admin;

use App\Models\Gallery;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
use Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
use Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
use Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

class GalleryCrudController extends CrudController
{
    use CreateOperation;
    use DeleteOperation;
    use ListOperation;
    use UpdateOperation;

    public function setup()
    {
        CRUD::setModel(Gallery::class);
        CRUD::setRoute(config('backpack.base.route_prefix').'/gallery');
        CRUD::setEntityNameStrings('Galeri', 'Galeri Foto');
    }

    protected function setupListOperation()
    {
        CRUD::column('id')->label('#');
        CRUD::column('title')->label('Judul Galeri');
        CRUD::column('file')->label('File / URL');
        CRUD::column('created_at')->label('Dibuat Pada')->type('datetime');
    }

    protected function setupCreateOperation()
    {
        CRUD::field('title')->label('Judul Foto / Dokumentasi')->type('text');
        CRUD::field('file')->label('Foto / Berkas')->type('text')->hint('Path file atau URL');
        CRUD::field('embed_link')->label('Tautan Video / Embed (Opsional)')->type('text');
        CRUD::field('description')->label('Keterangan / Kapsi')->type('textarea');
    }

    protected function setupUpdateOperation()
    {
        $this->setupCreateOperation();
    }
}
