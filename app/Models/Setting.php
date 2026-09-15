<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    protected $fillable = ['key', 'value'];

    /**
     * Get a setting value by key with optional default.
     */
    public static function get(string $key, $default = null)
    {
        return \Illuminate\Support\Facades\Cache::remember('setting_' . $key, 86400, function () use ($key, $default) {
            $setting = static::where('key', $key)->first();
            if (!$setting) return $default;

            $decoded = json_decode($setting->value, true);
            return (json_last_error() === JSON_ERROR_NONE) ? $decoded : $setting->value;
        });
    }

    /**
     * Set a setting value by key.
     */
    public static function set(string $key, $value): void
    {
        \Illuminate\Support\Facades\Cache::forget('setting_' . $key);
        
        static::updateOrCreate(
            ['key' => $key],
            ['value' => is_array($value) ? json_encode($value) : $value]
        );
    }
}
