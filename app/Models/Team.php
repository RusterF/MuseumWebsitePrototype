<?php

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Team extends Model
{
    use CrudTrait;

    protected $table = 'teams';

    protected $fillable = [
        'name',
        'title',
        'photo',
        'category',
    ];

    public function getPhotoUrlAttribute(): string
    {
        if (! empty($this->photo)) {
            if (Str::startsWith($this->photo, ['http://', 'https://'])) {
                return $this->photo;
            }
            if (file_exists(public_path($this->photo))) {
                return asset($this->photo);
            }
            if (file_exists(public_path('storage/'.$this->photo))) {
                return asset('storage/'.$this->photo);
            }
        }

        return 'https://ui-avatars.com/api/?name='.urlencode($this->name).'&background=0b132b&color=c5a059&size=200';
    }
}
