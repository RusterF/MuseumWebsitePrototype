<?php

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Model;

class CmsTag extends Model
{
    use CrudTrait;

    protected $table = 'cms_tags';

    protected $fillable = [
        'name',
        'slug',
    ];
}
