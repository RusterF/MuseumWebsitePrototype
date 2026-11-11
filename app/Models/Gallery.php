<?php

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Str;

class Gallery extends Model
{
    use CrudTrait;

    protected $table = 'galleries';

    protected $fillable = [
        'title',
        'description',
        'file',
        'user_id',
        'category_id',
        'embed_link',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function getImageUrlAttribute(): string
    {
        if (! empty($this->file)) {
            if (Str::startsWith($this->file, ['http://', 'https://'])) {
                return $this->file;
            }
            if (file_exists(public_path($this->file))) {
                return asset($this->file);
            }
            if (file_exists(public_path('storage/'.$this->file))) {
                return asset('storage/'.$this->file);
            }
        }

        return 'https://images.unsplash.com/photo-1579783900882-c0d3dad7b119?auto=format&fit=crop&w=800&q=80';
    }
}
