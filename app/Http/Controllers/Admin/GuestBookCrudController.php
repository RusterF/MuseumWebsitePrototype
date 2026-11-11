<?php

namespace App\Http\Controllers\Admin;

use App\Models\GuestBook;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
use Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
use Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

class GuestBookCrudController extends CrudController
{
    use DeleteOperation;
    use ListOperation;
    use ShowOperation;

    public function setup()
    {
        CRUD::setModel(GuestBook::class);
        CRUD::setRoute(config('backpack.base.route_prefix').'/guest-book');
        CRUD::setEntityNameStrings('Buku Tamu', 'Buku Tamu Digital');
    }

    protected function setupListOperation()
    {
        CRUD::column('id')->label('#');
        CRUD::column('name')->label('Nama Pengunjung');
        CRUD::column('origin')->label('Kota Asal / Asal Instansi');
        CRUD::column('group_name')->label('Nama Rombongan');
        CRUD::column('group_member_total')->label('Jumlah Rombongan');
        CRUD::column('visitor_type')->label('Jenis Tamu');
        CRUD::column('category')->label('Kategori');
        CRUD::column('no_whatsapp')->label('WhatsApp');
        CRUD::column('created_at')->label('Waktu Kehadiran')->type('datetime');
    }
}
