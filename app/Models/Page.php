<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
   
    protected $fillable = [
        'title', 'slug', 'content', 'is_published',
        'meta_title', 'meta_description', 'meta_keywords', 'og_image'
    ];

    protected $casts = [
        'content' => 'array',
        'is_published' => 'boolean',
    ];

    protected static function booted()
    {
        static::saved(function ($page) {
            \Illuminate\Support\Facades\Cache::forget('page_' . $page->slug);
            \Illuminate\Support\Facades\Cache::forget('page_root'); // Always clear root as it might be affected
        });

        static::deleted(function ($page) {
            \Illuminate\Support\Facades\Cache::forget('page_' . $page->slug);
        });
    }
}
