<?php

namespace App\Http\Controllers\Admin;

use App\Models\Article;
use App\Models\Report;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
use Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
use Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;
use Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

class ReportCrudController extends CrudController
{
    use DeleteOperation;
    use ListOperation;
    use ShowOperation;
    use UpdateOperation;

    public function setup()
    {
        CRUD::setModel(Report::class);
        CRUD::setRoute(config('backpack.base.route_prefix').'/report');
        CRUD::setEntityNameStrings('Laporan Konten', 'Laporan Spam & Pelanggaran');
    }

    protected function setupListOperation()
    {
        CRUD::column('id')->label('#');
        CRUD::addColumn([
            'name' => 'article_id',
            'label' => 'Artikel Terkait',
            'type' => 'select',
            'entity' => 'article',
            'attribute' => 'title',
            'model' => Article::class,
        ]);
        CRUD::column('reason')->label('Alasan Pelaporan');
        CRUD::addColumn([
            'name' => 'status',
            'label' => 'Status Tindak Lanjut',
            'type' => 'badge',
            'badges' => [
                'RESOLVED' => 'success',
                'DISMISSED' => 'secondary',
                'PENDING' => 'warning',
            ],
        ]);
        CRUD::column('created_at')->label('Tanggal Lapor')->type('datetime');
    }

    protected function setupUpdateOperation()
    {
        CRUD::field('reason')->label('Alasan Pelaporan')->type('text');
        CRUD::field('status')->label('Status Tindak Lanjut')->type('select_from_array')->options([
            'PENDING' => 'Belum Ditindaklanjuti',
            'RESOLVED' => 'Selesai Ditindaklanjuti (Resolved)',
            'DISMISSED' => 'Abaikan / Bukan Pelanggaran (Dismissed)',
        ]);
    }
}
