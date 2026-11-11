<?php

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Str;

class Collection extends Model
{
    use CrudTrait;

    protected $table = 'collections';

    protected $fillable = [
        'title',
        'slug',
        'description',
        'file',
        'status',
        'category_id',
        'collection_category_id',
        'user_id',
        'registration_number',
        'registration_year',
        'inventory_number',
        'contributor',
        'bahan',
        'ukuran',
        'available',
        'available_note',
        'photos',
    ];

    protected $casts = [
        'photos' => 'array',
    ];

    protected static function booted(): void
    {
        static::saving(function (self $collection) {
            if (empty($collection->slug)) {
                $collection->slug = Str::slug($collection->title ?: 'koleksi-'.time());
            }
        });
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(CollectionCategory::class, 'collection_category_id');
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    /**
     * Get image URL with high quality fallback.
     */
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

        // Return a context-aware fallback image using authentic Museum Penerangan photos
        $fallbacks = [
            'sejarah-perfilman' => asset('images/WebMuspenBaruImages/Perfilman.png'),
            'sejarah-percetakan' => asset('images/WebMuspenBaruImages/Percetakan.png'),
            'sejarah-radio' => asset('images/WebMuspenBaruImages/Radio.png'),
            'sejarah-televisi' => asset('images/WebMuspenBaruImages/Televisi.png'),
            'sejarah-departemen-penerangan-dan-komunikasi-tradisional' => asset('images/WebMuspenBaruImages/Departemen Penerangan dan Komunikasi Tradisional.png'),
            'sejarah-fotojurnalisme-dan-jurnalisme' => asset('images/WebMuspenBaruImages/Fotojurnalisme dan Jurnalisme.png'),
        ];

        $categorySlug = $this->category?->slug ?? '';

        return $fallbacks[$categorySlug] ?? asset('images/Atraksi.jpeg');
    }
}
