<?php

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Model;

class TvLink extends Model
{
    use CrudTrait;

    protected $table = 'tv_links';

    protected $fillable = [
        'name',
        'description',
        'embed_link',
        'is_featured',
    ];

    protected $casts = [
        'is_featured' => 'boolean',
    ];

    /**
     * Get embeddable YouTube URL.
     */
    public function getEmbedUrlAttribute(): string
    {
        $link = $this->embed_link ?? '';
        if (preg_match('/(?:youtu\.be\/|youtube\.com\/(?:embed\/|v\/|watch\?v=|watch\?.+&v=))([\w-]{11})/', $link, $matches)) {
            return 'https://www.youtube.com/embed/'.$matches[1];
        }

        return $link;
    }
}
