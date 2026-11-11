<?php

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Model;

class CmsCategory extends Model
{
    use CrudTrait;

    protected $table = 'cms_categories';

    protected $fillable = [
        'name',
        'slug',
    ];
}
