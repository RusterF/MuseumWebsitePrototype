<?php

namespace App\Http\Controllers\Admin;

use App\Models\Article;
use App\Models\Comment;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
use Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
use Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;
use Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;
use Illuminate\Http\RedirectResponse;

class CommentCrudController extends CrudController
{
    use DeleteOperation;
    use ListOperation;
    use ShowOperation;
    use UpdateOperation;

    public function setup()
    {
        CRUD::setModel(Comment::class);
        CRUD::setRoute(config('backpack.base.route_prefix').'/comment');
        CRUD::setEntityNameStrings('Komentar', 'Moderasi Komentar Artikel');
    }

    protected function setupListOperation()
    {
        CRUD::column('id')->label('#');
        CRUD::column('name')->label('Nama Pengirim');
        CRUD::column('email')->label('Email');
        CRUD::addColumn([
            'name' => 'article_id',
            'label' => 'Artikel',
            'type' => 'select',
            'entity' => 'article',
            'attribute' => 'title',
            'model' => Article::class,
        ]);
        CRUD::column('body')->label('Isi Komentar')->limit(60);
        CRUD::addColumn([
            'name' => 'status',
            'label' => 'Status Moderasi',
            'type' => 'badge',
            'badges' => [
                'APPROVE' => 'success',
                'APPROVED' => 'success',
                'REJECT' => 'danger',
                'PENDING' => 'warning',
            ],
        ]);
        CRUD::column('created_at')->label('Waktu Dikirim')->type('datetime');
        CRUD::addButtonFromModelFunction('line', 'moderate_btn', 'renderModerationButtons', 'beginning');
    }

    public function approve(int $id): RedirectResponse
    {
        $comment = Comment::findOrFail($id);
        $comment->update(['status' => 'APPROVE']);
        \Alert::success('Komentar disetujui untuk tayang.')->flash();

        return redirect()->back();
    }

    public function reject(int $id): RedirectResponse
    {
        $comment = Comment::findOrFail($id);
        $comment->update(['status' => 'REJECT']);
        \Alert::warning('Komentar disembunyikan/ditolak.')->flash();

        return redirect()->back();
    }

    protected function setupUpdateOperation()
    {
        CRUD::field('name')->label('Nama Pengirim')->type('text');
        CRUD::field('email')->label('Email')->type('email');
        CRUD::field('body')->label('Isi Komentar')->type('textarea');
        CRUD::field('status')->label('Status Moderasi')->type('select_from_array')->options([
            'APPROVE' => 'Setujui (Tayang di Web)',
            'REJECT' => 'Tolak / Sembunyikan',
            'PENDING' => 'Pending Review',
        ]);
    }
}
