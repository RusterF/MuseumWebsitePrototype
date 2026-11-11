<?php

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Str;

class Event extends Model
{
    use CrudTrait;

    protected $table = 'events';

    protected $fillable = [
        'name',
        'slug',
        'description',
        'date',
        'end_date',
        'file',
        'type',
        'status',
        'max_visitor',
    ];

    protected $casts = [
        'date' => 'datetime',
        'end_date' => 'datetime',
        'max_visitor' => 'integer',
    ];

    protected static function booted(): void
    {
        static::saving(function (self $event) {
            if (empty($event->slug)) {
                $event->slug = Str::slug($event->name ?: 'event-'.time());
            }
        });
    }

    public function bookings(): HasMany
    {
        return $this->hasMany(Booking::class, 'event_id');
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

        return 'https://images.unsplash.com/photo-1540575467063-178a50c2df87?auto=format&fit=crop&w=800&q=80';
    }

    public function getCapacityAttribute(): int
    {
        return $this->max_visitor ?: 100;
    }

    public function getRegisteredVisitorsCountAttribute(): int
    {
        return (int) $this->bookings()
            ->where(function ($q) {
                $q->whereNull('approval_status')
                    ->orWhere('approval_status', 'APPROVED')
                    ->orWhere('approval_status', 'PENDING')
                    ->orWhere('approval_status', 'pending');
            })
            ->sum('visitor');
    }

    public function getRemainingQuotaAttribute(): int
    {
        $max = $this->capacity;
        $remaining = $max - $this->registered_visitors_count;

        return max(0, $remaining);
    }
}
