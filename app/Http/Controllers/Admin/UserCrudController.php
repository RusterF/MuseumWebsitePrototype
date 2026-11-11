<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
use Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
use Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
use Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

class UserCrudController extends CrudController
{
    use CreateOperation;
    use DeleteOperation;
    use ListOperation;
    use UpdateOperation;

    public function setup()
    {
        CRUD::setModel(User::class);
        CRUD::setRoute(config('backpack.base.route_prefix').'/user');
        CRUD::setEntityNameStrings('Pengguna', 'Manajemen Pengguna & Admin');
    }

    protected function setupListOperation()
    {
        CRUD::column('id')->label('#');
        CRUD::column('name')->label('Nama Lengkap');
        CRUD::column('email')->label('Email');
        CRUD::column('created_at')->label('Terdaftar Pada')->type('datetime');
    }

    protected function setupCreateOperation()
    {
        CRUD::setValidation([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email',
            'password' => 'required|string|min:8',
        ]);

        CRUD::field('name')->label('Nama Lengkap')->type('text');
        CRUD::field('email')->label('Alamat Email')->type('email');
        CRUD::field('password')->label('Kata Sandi')->type('password');
    }

    protected function setupUpdateOperation()
    {
        $id = request()->route('id') ?? request()->input('id');

        CRUD::setValidation([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email,'.$id,
            'password' => 'nullable|string|min:8',
        ]);

        // If password is left blank on update, remove it from request to avoid overwriting with blank hash
        if (request()->has('password') && empty(request()->input('password'))) {
            request()->request->remove('password');
        }

        CRUD::field('name')->label('Nama Lengkap')->type('text');
        CRUD::field('email')->label('Alamat Email')->type('email');
        CRUD::field('password')->label('Ganti Kata Sandi (Kosongkan jika tidak diubah)')->type('password')->hint('Biarkan kosong jika tidak ingin mengubah sandi.');
    }
}
