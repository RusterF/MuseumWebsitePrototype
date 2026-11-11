<?php

namespace App\Http\Controllers\Admin;

use App\Models\CollectionCategory;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
use Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
use Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
use Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

class CollectionCategoryCrudController extends CrudController
{
    use CreateOperation;
    use DeleteOperation;
    use ListOperation;
    use UpdateOperation;

    public function setup()
    {
        CRUD::setModel(CollectionCategory::class);
        CRUD::setRoute(config('backpack.base.route_prefix').'/collection-category');
        CRUD::setEntityNameStrings('Kategori Koleksi', 'Kategori Koleksi');
    }

    protected function setupListOperation()
    {
        CRUD::column('id')->label('#');
        CRUD::column('name')->label('Nama Kategori Koleksi');
        CRUD::column('slug')->label('Slug');
    }

    protected function setupCreateOperation()
    {
        CRUD::field('name')->label('Nama Kategori')->type('text');
        CRUD::field('slug')->label('Slug URL')->type('text');
    }

    protected function setupUpdateOperation()
    {
        $this->setupCreateOperation();
    }
}
