<?php

namespace App\Http\Controllers\Admin;

use App\Models\Article;
use App\Models\Category;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
use Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
use Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
use Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;
use Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

class ArticleCrudController extends CrudController
{
    use CreateOperation;
    use DeleteOperation;
    use ListOperation;
    use ShowOperation;
    use UpdateOperation;

    public function setup()
    {
        CRUD::setModel(Article::class);
        CRUD::setRoute(config('backpack.base.route_prefix').'/article');
        CRUD::setEntityNameStrings('Artikel', 'Artikel & Berita');
    }

    protected function setupListOperation()
    {
        CRUD::column('id')->label('#');
        CRUD::addColumn([
            'name' => 'title',
            'label' => 'Judul Artikel',
            'type' => 'text',
        ]);
        CRUD::addColumn([
            'name' => 'category_id',
            'label' => 'Kategori',
            'type' => 'select',
            'entity' => 'category',
            'attribute' => 'name',
            'model' => Category::class,
        ]);
        CRUD::addColumn([
            'name' => 'date',
            'label' => 'Tanggal',
            'type' => 'date',
        ]);
        CRUD::addColumn([
            'name' => 'status',
            'label' => 'Status',
            'type' => 'check',
        ]);
        CRUD::addColumn([
            'name' => 'approval_status',
            'label' => 'Approval',
            'type' => 'badge',
            'badges' => [
                'Y' => 'success',
                'N' => 'danger',
                'P' => 'warning',
            ],
        ]);
    }

    protected function setupCreateOperation()
    {
        CRUD::setValidation([
            'title' => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
        ]);

        CRUD::field('title')->label('Judul Artikel')->type('text');
        CRUD::field('slug')->label('Slug URL')->type('text')->hint('Kosongkan untuk otomatis');
        CRUD::addField([
            'name' => 'category_id',
            'label' => 'Kategori',
            'type' => 'select',
            'entity' => 'category',
            'attribute' => 'name',
            'model' => Category::class,
        ]);
        CRUD::field('date')->label('Tanggal Publikasi')->type('date')->default(now()->toDateString());
        CRUD::field('content')->label('Isi Artikel')->type('textarea');
        CRUD::field('image')->label('Foto / Banner Utama')->type('text')->hint('Path file atau URL gambar');
        CRUD::field('featured')->label('Jadikan Berita Utama (Featured)')->type('checkbox');
        CRUD::field('approval_status')->label('Status Approval')->type('select_from_array')->options([
            'Y' => 'Disetujui (Approved)',
            'P' => 'Pending Review',
            'N' => 'Ditolak (Rejected)',
        ])->default('Y');
    }

    protected function setupUpdateOperation()
    {
        $this->setupCreateOperation();
    }
}
