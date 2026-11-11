<?php

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Partner extends Model
{
    use CrudTrait;

    protected $table = 'partners';

    protected $fillable = [
        'name',
        'file',
        'category',
        'is_featured',
    ];

    protected $casts = [
        'is_featured' => 'boolean',
    ];

    public function getLogoUrlAttribute(): string
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

        return 'https://ui-avatars.com/api/?name='.urlencode($this->name).'&background=f1f5f9&color=1e293b&size=200';
    }
}
