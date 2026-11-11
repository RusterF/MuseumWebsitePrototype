<?php

namespace App\Http\Controllers\Admin;

use App\Models\Team;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
use Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
use Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
use Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

class TeamCrudController extends CrudController
{
    use CreateOperation;
    use DeleteOperation;
    use ListOperation;
    use UpdateOperation;

    public function setup()
    {
        CRUD::setModel(Team::class);
        CRUD::setRoute(config('backpack.base.route_prefix').'/team');
        CRUD::setEntityNameStrings('Anggota Tim', 'Profil Tim & Pengelola');
    }

    protected function setupListOperation()
    {
        CRUD::column('id')->label('#');
        CRUD::column('name')->label('Nama Lengkap');
        CRUD::column('title')->label('Jabatan');
        CRUD::column('category')->label('Bidang / Unit');
    }

    protected function setupCreateOperation()
    {
        CRUD::field('name')->label('Nama Lengkap')->type('text');
        CRUD::field('title')->label('Jabatan')->type('text');
        CRUD::field('category')->label('Divisi / Kelompok Kerja')->type('text');
        CRUD::field('photo')->label('Foto Profil')->type('text')->hint('Path file atau URL');
    }

    protected function setupUpdateOperation()
    {
        $this->setupCreateOperation();
    }
}
