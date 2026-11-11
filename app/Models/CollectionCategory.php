<?php

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

class CollectionCategory extends Model
{
    use CrudTrait, SoftDeletes;

    protected $table = 'collection_categories';

    protected $fillable = [
        'parent_id',
        'lft',
        'rgt',
        'depth',
        'name',
        'slug',
    ];

    protected static function booted(): void
    {
        static::saving(function (self $category) {
            if (empty($category->slug)) {
                $category->slug = Str::slug($category->name ?: 'kategori-'.time());
            }
        });
    }

    public function collections(): HasMany
    {
        return $this->hasMany(Collection::class, 'collection_category_id');
    }
}
