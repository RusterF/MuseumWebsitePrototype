<?php

namespace App\Http\Controllers\Admin;

use App\Models\Tag;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
use Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
use Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
use Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

class CmsTagCrudController extends CrudController
{
    use CreateOperation;
    use DeleteOperation;
    use ListOperation;
    use UpdateOperation;

    public function setup()
    {
        CRUD::setModel(Tag::class);
        CRUD::setRoute(config('backpack.base.route_prefix').'/cms-tag');
        CRUD::setEntityNameStrings('Tag CMS', 'Tag CMS');
    }

    protected function setupListOperation()
    {
        CRUD::column('id')->label('#');
        CRUD::column('name')->label('Nama Tag');
        CRUD::column('slug')->label('Slug');
    }

    protected function setupCreateOperation()
    {
        CRUD::field('name')->label('Nama Tag')->type('text');
        CRUD::field('slug')->label('Slug URL')->type('text');
    }

    protected function setupUpdateOperation()
    {
        $this->setupCreateOperation();
    }
}
