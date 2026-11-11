<?php

namespace App\Http\Controllers\Admin;

use App\Models\Collection;
use App\Models\CollectionCategory;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
use Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
use Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
use Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;
use Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

class CollectionCrudController extends CrudController
{
    use CreateOperation;
    use DeleteOperation;
    use ListOperation;
    use ShowOperation;
    use UpdateOperation;

    public function setup()
    {
        CRUD::setModel(Collection::class);
        CRUD::setRoute(config('backpack.base.route_prefix').'/collection');
        CRUD::setEntityNameStrings('Koleksi', 'Katalog Koleksi Museum');
    }

    protected function setupListOperation()
    {
        CRUD::column('id')->label('#');
        CRUD::addColumn([
            'name' => 'title',
            'label' => 'Nama Koleksi',
            'type' => 'text',
        ]);
        CRUD::addColumn([
            'name' => 'collection_category_id',
            'label' => 'Kategori',
            'type' => 'select',
            'entity' => 'category',
            'attribute' => 'name',
            'model' => CollectionCategory::class,
        ]);
        CRUD::column('registration_number')->label('No. Registrasi');
        CRUD::column('bahan')->label('Material / Bahan');
        CRUD::addColumn([
            'name' => 'status',
            'label' => 'Status',
            'type' => 'badge',
            'badges' => [
                'PUBLISH' => 'success',
                'DRAFT' => 'secondary',
            ],
        ]);
    }

    protected function setupCreateOperation()
    {
        CRUD::setValidation([
            'title' => 'required|string|max:255',
            'collection_category_id' => 'nullable|exists:collection_categories,id',
        ]);

        CRUD::field('title')->label('Nama Koleksi')->type('text');
        CRUD::field('slug')->label('Slug URL')->type('text');
        CRUD::addField([
            'name' => 'collection_category_id',
            'label' => 'Kategori Koleksi',
            'type' => 'select',
            'entity' => 'category',
            'attribute' => 'name',
            'model' => CollectionCategory::class,
        ]);
        CRUD::field('registration_number')->label('Nomor Registrasi')->type('text');
        CRUD::field('inventory_number')->label('Nomor Inventaris')->type('text');
        CRUD::field('registration_year')->label('Tahun Registrasi / Akuisisi')->type('text');
        CRUD::field('contributor')->label('Penyumbang / Asal Usul')->type('text');
        CRUD::field('bahan')->label('Bahan / Material')->type('text');
        CRUD::field('ukuran')->label('Ukuran / Dimensi')->type('text');
        CRUD::field('file')->label('Foto Koleksi')->type('text')->hint('Path file atau URL gambar');
        CRUD::field('description')->label('Deskripsi Sejarah & Informasi')->type('textarea');
        CRUD::field('status')->label('Status Publikasi')->type('select_from_array')->options([
            'PUBLISH' => 'Publikasikan',
            'DRAFT' => 'Draft',
        ])->default('PUBLISH');
        CRUD::field('available')->label('Status Ketersediaan')->type('select_from_array')->options([
            'TERSEDIA' => 'Tersedia di Ruang Pameran',
            'KONSERVASI' => 'Dalam Perawatan / Konservasi',
            'GUDANG' => 'Disimpan di Storage / Gudang',
        ])->default('TERSEDIA');
    }

    protected function setupUpdateOperation()
    {
        $this->setupCreateOperation();
    }
}
