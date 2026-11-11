<?php

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use CrudTrait;

    protected $table = 'settings';

    protected $fillable = [
        'key',
        'name',
        'description',
        'value',
        'field',
        'active',
    ];

    /**
     * In-memory cache for loaded settings to optimize performance.
     *
     * @var array<string, ?string>
     */
    protected static array $runtimeCache = [];

    protected static function booted(): void
    {
        static::creating(function (self $setting) {
            if (empty($setting->field)) {
                $setting->field = json_encode(['name' => 'value', 'label' => 'Value', 'type' => 'text']);
            }
            if ($setting->active === null) {
                $setting->active = 1;
            }
        });

        static::saved(function () {
            static::$runtimeCache = [];
        });

        static::deleted(function () {
            static::$runtimeCache = [];
        });
    }

    /**
     * Helper to get setting value by key with runtime caching.
     */
    public static function get(string $key, ?string $default = null): ?string
    {
        if (array_key_exists($key, static::$runtimeCache)) {
            return static::$runtimeCache[$key] ?? $default;
        }

        $setting = static::where('key', $key)->first();
        if ($setting && $setting->value !== null && $setting->value !== '') {
            static::$runtimeCache[$key] = $setting->value;

            return $setting->value;
        }

        static::$runtimeCache[$key] = null;

        return $default;
    }
}
