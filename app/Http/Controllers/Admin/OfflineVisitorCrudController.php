<?php

namespace App\Http\Controllers\Admin;

use App\Models\OfflineVisitor;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
use Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
use Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
use Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

class OfflineVisitorCrudController extends CrudController
{
    use CreateOperation;
    use DeleteOperation;
    use ListOperation;
    use UpdateOperation;

    public function setup()
    {
        CRUD::setModel(OfflineVisitor::class);
        CRUD::setRoute(config('backpack.base.route_prefix').'/offline-visitor');
        CRUD::setEntityNameStrings('Pengunjung Offline', 'Data Pengunjung Offline (Form Kiosk)');
    }

    protected function setupListOperation()
    {
        CRUD::column('id')->label('#');
        CRUD::column('name')->label('Nama Pengunjung');
        CRUD::column('instansi')->label('Instansi / Sekolah');
        CRUD::column('jumlah')->label('Jumlah Rombongan');
        CRUD::column('wisatawan')->label('Kategori Wisatawan');
        CRUD::column('phone')->label('Telepon / WA');
        CRUD::column('created_at')->label('Waktu Kunjungan')->type('datetime');
    }

    protected function setupCreateOperation()
    {
        CRUD::field('name')->label('Nama Lengkap')->type('text');
        CRUD::field('instansi')->label('Instansi / Sekolah / Asal')->type('text');
        CRUD::field('jumlah')->label('Jumlah Orang / Rombongan')->type('number');
        CRUD::field('wisatawan')->label('Jenis Wisatawan')->type('select_from_array')->options([
            'Nusantara' => 'Wisatawan Nusantara (Domestik)',
            'Mancanegara' => 'Wisatawan Mancanegara (Asing)',
        ]);
        CRUD::field('email')->label('Email')->type('email');
        CRUD::field('phone')->label('No. Telepon')->type('text');
        CRUD::field('age')->label('Kelompok Usia')->type('text');
    }

    protected function setupUpdateOperation()
    {
        $this->setupCreateOperation();
    }
}
