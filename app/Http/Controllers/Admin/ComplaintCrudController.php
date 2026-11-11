<?php

namespace App\Http\Controllers\Admin;

use App\Models\Complaint;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
use Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
use Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;
use Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

class ComplaintCrudController extends CrudController
{
    use DeleteOperation;
    use ListOperation;
    use ShowOperation;
    use UpdateOperation;

    public function setup()
    {
        CRUD::setModel(Complaint::class);
        CRUD::setRoute(config('backpack.base.route_prefix').'/complaint');
        CRUD::setEntityNameStrings('Saran & Pengaduan', 'Saran & Pengaduan Masyarakat');
    }

    protected function setupListOperation()
    {
        CRUD::column('id')->label('#');
        CRUD::column('title')->label('Perihal / Judul');
        CRUD::column('email')->label('Email');
        CRUD::column('phone')->label('Telepon');
        CRUD::column('category')->label('Kategori');
        CRUD::column('type')->label('Jenis (Saran/Keluhan)');
        CRUD::column('created_at')->label('Tanggal Masuk')->type('datetime');
    }

    protected function setupShowOperation()
    {
        CRUD::column('id')->label('ID Tiket');
        CRUD::column('title')->label('Perihal / Subjek');
        CRUD::column('category')->label('Kategori');
        CRUD::column('type')->label('Jenis Pengaduan');
        CRUD::column('email')->label('Email Pengirim');
        CRUD::column('phone')->label('No. Telepon');
        CRUD::column('instansion')->label('Instansi / Lembaga');
        CRUD::column('location')->label('Lokasi Kejadian');
        CRUD::column('body')->label('Isi Pesan Aduan');
        CRUD::column('file')->label('Lampiran Berkas');
        CRUD::column('created_at')->label('Diterima Pada')->type('datetime');
    }

    protected function setupUpdateOperation()
    {
        CRUD::field('title')->label('Perihal / Subjek')->type('text');
        CRUD::field('category')->label('Kategori')->type('text');
        CRUD::field('type')->label('Status / Tindak Lanjut')->type('select_from_array')->options([
            'TERKIRIM' => 'Diterima',
            'PROSES' => 'Sedang Diproses',
            'SELESAI' => 'Selesai Ditindaklanjuti',
        ]);
        CRUD::field('body')->label('Isi Aduan / Keterangan')->type('textarea');
    }
}
