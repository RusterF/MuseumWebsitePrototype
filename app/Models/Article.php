<?php

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

class Article extends Model
{
    use CrudTrait, SoftDeletes;

    protected $table = 'articles';

    protected $fillable = [
        'category_id',
        'title',
        'slug',
        'content',
        'image',
        'image2',
        'image3',
        'image4',
        'image5',
        'status',
        'date',
        'featured',
        'approval_status',
        'approval_reject_reason',
        'user_id',
    ];

    protected $casts = [
        'date' => 'date',
        'featured' => 'boolean',
    ];

    protected static function booted(): void
    {
        static::saving(function (self $article) {
            if (empty($article->slug)) {
                $article->slug = Str::slug($article->title ?: 'artikel-'.time());
            }
        });
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function comments(): HasMany
    {
        return $this->hasMany(Comment::class, 'article_id');
    }

    public function approvedComments(): HasMany
    {
        return $this->hasMany(Comment::class, 'article_id')
            ->where(function ($q) {
                $q->where('status', 'APPROVE')
                    ->orWhere('status', 'APPROVED')
                    ->orWhere('status', '1');
            });
    }

    public function reports(): HasMany
    {
        return $this->hasMany(Report::class, 'article_id');
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function getImageUrlAttribute(): string
    {
        if (! empty($this->image)) {
            if (Str::startsWith($this->image, ['http://', 'https://'])) {
                return $this->image;
            }
            if (file_exists(public_path($this->image))) {
                return asset($this->image);
            }
            if (file_exists(public_path('storage/'.$this->image))) {
                return asset('storage/'.$this->image);
            }
        }

        return 'https://images.unsplash.com/photo-1512820790803-83ca734da794?auto=format&fit=crop&w=800&q=80';
    }
}
