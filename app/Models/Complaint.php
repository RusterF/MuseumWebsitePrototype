<?php

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Model;

class Complaint extends Model
{
    use CrudTrait;

    protected $table = 'complaints';

    protected $fillable = [
        'title',
        'email',
        'phone',
        'body',
        'date',
        'location',
        'instansion',
        'category',
        'file',
        'type',
    ];

    protected $casts = [
        'date' => 'datetime',
    ];

    public function getTicketNumberAttribute(): string
    {
        return 'ADUAN-'.date('Ymd', strtotime($this->created_at ?? now())).'-'.str_pad((string) $this->id, 4, '0', STR_PAD_LEFT);
    }
}
