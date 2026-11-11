<?php

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Model;

class OfflineVisitor extends Model
{
    use CrudTrait;

    protected $table = 'offline_visitors';

    protected $fillable = [
        'name',
        'sex',
        'email',
        'phone',
        'subscribe',
        'age',
        'wisatawan',
        'instansi',
        'jumlah',
        'photo',
    ];
}
