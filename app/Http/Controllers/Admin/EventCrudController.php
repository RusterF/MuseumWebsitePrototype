<?php

namespace App\Http\Controllers\Admin;

use App\Models\Event;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
use Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
use Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
use Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;
use Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

class EventCrudController extends CrudController
{
    use CreateOperation;
    use DeleteOperation;
    use ListOperation;
    use ShowOperation;
    use UpdateOperation;

    public function setup()
    {
        CRUD::setModel(Event::class);
        CRUD::setRoute(config('backpack.base.route_prefix').'/event');
        CRUD::setEntityNameStrings('Event & Acara', 'Agenda Event');
    }

    protected function setupListOperation()
    {
        CRUD::column('id')->label('#');
        CRUD::column('name')->label('Nama Event');
        CRUD::column('date')->label('Mulai')->type('datetime');
        CRUD::column('end_date')->label('Selesai')->type('datetime');
        CRUD::column('max_visitor')->label('Kuota Pengunjung');
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
            'name' => 'required|string|max:255',
            'date' => 'nullable|date',
            'max_visitor' => 'nullable|integer|min:1',
        ]);

        CRUD::field('name')->label('Nama Event / Acara')->type('text');
        CRUD::field('slug')->label('Slug URL')->type('text');
        CRUD::field('date')->label('Tanggal & Jam Mulai')->type('datetime');
        CRUD::field('end_date')->label('Tanggal & Jam Selesai')->type('datetime');
        CRUD::field('max_visitor')->label('Kapasitas Maksimal (Orang)')->type('number')->default(100);
        CRUD::field('type')->label('Tipe Acara')->type('select_from_array')->options([
            'EXHIBITION' => 'Pameran Khusus',
            'PERFORMANCE' => 'Pertunjukan / Talkshow',
            'WORKSHOP' => 'Workshop / Edukasi',
            'SEMINAR' => 'Seminar / Diskusi Publik',
        ])->default('EXHIBITION');
        CRUD::field('status')->label('Status Publikasi')->type('select_from_array')->options([
            'PUBLISH' => 'Publikasikan',
            'DRAFT' => 'Draft',
        ])->default('PUBLISH');
        CRUD::field('file')->label('Banner / Poster Acara')->type('text')->hint('Path file atau URL poster');
        CRUD::field('description')->label('Deskripsi Lengkap Acara')->type('textarea');
    }

    protected function setupUpdateOperation()
    {
        $this->setupCreateOperation();
    }
}
