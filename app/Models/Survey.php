<?php

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Survey extends Model
{
    use CrudTrait;

    protected $table = 'surveys';

    protected $fillable = [
        'guest_book_id',
        'name',
        'phone',
        'pameran',
        'pemandu',
        'museum',
        'saran',
    ];

    public function guestBook(): BelongsTo
    {
        return $this->belongsTo(GuestBook::class, 'guest_book_id');
    }
}
