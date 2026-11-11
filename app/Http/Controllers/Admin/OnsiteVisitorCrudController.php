<?php

namespace App\Http\Controllers\Admin;

use App\Models\Visitor;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
use Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
use Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
use Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

class OnsiteVisitorCrudController extends CrudController
{
    use CreateOperation;
    use DeleteOperation;
    use ListOperation;
    use UpdateOperation;

    public function setup()
    {
        CRUD::setModel(Visitor::class);
        CRUD::setRoute(config('backpack.base.route_prefix').'/onsite-visitor');
        CRUD::setEntityNameStrings('Pengunjung Onsite', 'Statistik Pengunjung Onsite');
    }

    protected function setupListOperation()
    {
        CRUD::addClause('where', function ($q) {
            $q->where('type', 'ONSITE')->orWhere('type', 'onsite');
        });

        CRUD::column('id')->label('#');
        CRUD::column('date')->label('Tanggal')->type('date');
        CRUD::column('amount')->label('Jumlah Pengunjung (Onsite)');
        CRUD::column('type')->label('Tipe');
    }

    protected function setupCreateOperation()
    {
        CRUD::field('date')->label('Tanggal')->type('date')->default(now()->toDateString());
        CRUD::field('amount')->label('Jumlah Pengunjung Onsite')->type('number');
        CRUD::field('type')->type('hidden')->default('ONSITE');
    }

    protected function setupUpdateOperation()
    {
        $this->setupCreateOperation();
    }
}
