<?php

namespace App\Http\Controllers\Admin;

use App\Models\Booking;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
use Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;
use Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;
use Illuminate\Http\RedirectResponse;

class ReservationApprovalCrudController extends CrudController
{
    use ListOperation;
    use ShowOperation;
    use UpdateOperation;

    public function setup()
    {
        CRUD::setModel(Booking::class);
        CRUD::setRoute(config('backpack.base.route_prefix').'/reservation-approval');
        CRUD::setEntityNameStrings('Persetujuan Reservasi', 'Persetujuan Reservasi Kunjungan');
    }

    protected function setupListOperation()
    {
        CRUD::addClause('orderBy', 'date', 'desc');

        CRUD::column('id')->label('#');
        CRUD::column('name')->label('Nama Pemohon');
        CRUD::column('place')->label('Instansi / Sekolah');
        CRUD::column('visitor')->label('Jumlah Rombongan');
        CRUD::column('date')->label('Tanggal Rencana')->type('datetime');
        CRUD::column('session_type')->label('Sesi');
        CRUD::addColumn([
            'name' => 'approval_status',
            'label' => 'Status',
            'type' => 'badge',
            'badges' => [
                'APPROVED' => 'success',
                'REJECTED' => 'danger',
                'PENDING' => 'warning',
            ],
        ]);

        // Add custom approval action buttons
        CRUD::addButtonFromModelFunction('line', 'approve_btn', 'renderApproveButton', 'beginning');
    }

    public function approve(int $id): RedirectResponse
    {
        $booking = Booking::findOrFail($id);
        $booking->update(['approval_status' => 'APPROVED']);
        \Alert::success('Reservasi berhasil disetujui!')->flash();

        return redirect()->back();
    }

    public function reject(int $id): RedirectResponse
    {
        $booking = Booking::findOrFail($id);
        $booking->update(['approval_status' => 'REJECTED']);
        \Alert::warning('Reservasi telah ditolak.')->flash();

        return redirect()->back();
    }

    protected function setupUpdateOperation()
    {
        CRUD::field('approval_status')->label('Status Approval')->type('select_from_array')->options([
            'PENDING' => 'Pending Review',
            'APPROVED' => 'Setujui Permohonan (APPROVED)',
            'REJECTED' => 'Tolak Permohonan (REJECTED)',
        ]);
    }
}
