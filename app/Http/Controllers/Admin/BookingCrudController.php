<?php

namespace App\Http\Controllers\Admin;

use App\Models\Booking;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
use Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
use Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
use Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;
use Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

class BookingCrudController extends CrudController
{
    use CreateOperation;
    use DeleteOperation;
    use ListOperation;
    use ShowOperation;
    use UpdateOperation;

    public function setup()
    {
        CRUD::setModel(Booking::class);
        CRUD::setRoute(config('backpack.base.route_prefix').'/booking');
        CRUD::setEntityNameStrings('Reservasi', 'Daftar Reservasi Kunjungan');
    }

    protected function setupListOperation()
    {
        CRUD::column('id')->label('#');
        CRUD::column('name')->label('Nama Pemesan / PIC');
        CRUD::column('place')->label('Instansi / Sekolah');
        CRUD::column('visitor')->label('Jumlah Rombongan');
        CRUD::column('date')->label('Tanggal Kunjungan')->type('datetime');
        CRUD::column('session_type')->label('Sesi');
        CRUD::addColumn([
            'name' => 'approval_status',
            'label' => 'Status Approval',
            'type' => 'badge',
            'badges' => [
                'APPROVED' => 'success',
                'REJECTED' => 'danger',
                'PENDING' => 'warning',
            ],
        ]);
    }

    protected function setupCreateOperation()
    {
        CRUD::field('name')->label('Nama Pemesan / PIC')->type('text');
        CRUD::field('place')->label('Asal Lembaga / Instansi / Sekolah')->type('text');
        CRUD::field('email')->label('Email PIC')->type('email');
        CRUD::field('phone')->label('Nomor Telepon / WhatsApp')->type('text');
        CRUD::field('visitor')->label('Jumlah Pengunjung')->type('number');
        CRUD::field('date')->label('Tanggal & Jam Rencana Kunjungan')->type('datetime');
        CRUD::field('session_type')->label('Sesi Kunjungan')->type('select_from_array')->options([
            'Pagi (09.00 - 11.30 WIB)' => 'Pagi (09.00 - 11.30 WIB)',
            'Siang (13.00 - 15.00 WIB)' => 'Siang (13.00 - 15.00 WIB)',
        ]);
        CRUD::field('category')->label('Kategori Kunjungan')->type('select_from_array')->options([
            'Kelompok Belajar / Sekolah' => 'Kelompok Belajar / Sekolah',
            'Instansi Pemerintah / BUMN' => 'Instansi Pemerintah / BUMN',
            'Komunitas / Umum' => 'Komunitas / Umum',
            'Sewa Tempat / Ruangan' => 'Sewa Tempat / Ruangan',
        ]);
        CRUD::field('approval_status')->label('Status Approval')->type('select_from_array')->options([
            'PENDING' => 'Menunggu Review (Pending)',
            'APPROVED' => 'Disetujui (Approved)',
            'REJECTED' => 'Ditolak (Rejected)',
        ])->default('PENDING');
    }

    protected function setupUpdateOperation()
    {
        $this->setupCreateOperation();
    }
}
