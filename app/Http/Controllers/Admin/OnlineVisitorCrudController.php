<?php

namespace App\Http\Controllers\Admin;

use App\Models\Visitor;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
use Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
use Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
use Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

class OnlineVisitorCrudController extends CrudController
{
    use CreateOperation;
    use DeleteOperation;
    use ListOperation;
    use UpdateOperation;

    public function setup()
    {
        CRUD::setModel(Visitor::class);
        CRUD::setRoute(config('backpack.base.route_prefix').'/online-visitor');
        CRUD::setEntityNameStrings('Pengunjung Online', 'Statistik Pengunjung Online');
    }

    protected function setupListOperation()
    {
        CRUD::addClause('where', function ($q) {
            $q->where('type', 'ONLINE')->orWhere('type', 'online');
        });

        CRUD::column('id')->label('#');
        CRUD::column('date')->label('Tanggal')->type('date');
        CRUD::column('amount')->label('Jumlah Pengunjung (Online)');
        CRUD::column('type')->label('Tipe');
    }

    protected function setupCreateOperation()
    {
        CRUD::field('date')->label('Tanggal')->type('date')->default(now()->toDateString());
        CRUD::field('amount')->label('Jumlah Pengunjung Online')->type('number');
        CRUD::field('type')->type('hidden')->default('ONLINE');
    }

    protected function setupUpdateOperation()
    {
        $this->setupCreateOperation();
    }
}
