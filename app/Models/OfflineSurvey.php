<?php

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Model;

class OfflineSurvey extends Model
{
    use CrudTrait;

    protected $table = 'offline_surveys';

    protected $primaryKey = 'guest_id';

    public $incrementing = false;

    protected $fillable = [
        'guest_id',
        'pameran',
        'pemandu',
        'museum',
        'saran',
    ];
}
