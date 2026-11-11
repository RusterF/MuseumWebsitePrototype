<?php

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Model;

class GuestBook extends Model
{
    use CrudTrait;

    protected $table = 'guest_books';

    protected $fillable = [
        'visitor_type',
        'age',
        'tourist',
        'name',
        'sex',
        'no_whatsapp',
        'email',
        'group_name',
        'group_member_total',
        'category',
        'school',
        'origin',
        'subs',
        'image_url',
    ];
}
