<?php

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Model;

class Visitor extends Model
{
    use CrudTrait;

    protected $table = 'visitors';

    protected $fillable = [
        'date',
        'amount',
        'type',
    ];

    protected $casts = [
        'date' => 'date',
    ];
}
