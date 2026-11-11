<?php

namespace App\Http\Controllers\Admin;

use App\Models\Partner;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
use Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
use Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
use Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

class PartnerCrudController extends CrudController
{
    use CreateOperation;
    use DeleteOperation;
    use ListOperation;
    use UpdateOperation;

    public function setup()
    {
        CRUD::setModel(Partner::class);
        CRUD::setRoute(config('backpack.base.route_prefix').'/partner');
        CRUD::setEntityNameStrings('Mitra', 'Mitra & Kerjasama');
    }

    protected function setupListOperation()
    {
        CRUD::column('id')->label('#');
        CRUD::column('name')->label('Nama Instansi / Mitra');
        CRUD::column('category')->label('Kategori');
        CRUD::column('is_featured')->label('Featured')->type('check');
    }

    protected function setupCreateOperation()
    {
        CRUD::field('name')->label('Nama Lembaga / Mitra')->type('text');
        CRUD::field('category')->label('Kategori Kemitraan')->type('text')->hint('Pemerintah, Media, Pendidikan, atau Swasta');
        CRUD::field('file')->label('Logo Mitra')->type('text')->hint('Path file atau URL logo');
        CRUD::field('is_featured')->label('Tampilkan di Beranda')->type('checkbox');
    }

    protected function setupUpdateOperation()
    {
        $this->setupCreateOperation();
    }
}
