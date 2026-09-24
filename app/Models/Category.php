<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Models\Concerns\LogsActivity;
use Spatie\Activitylog\Support\LogOptions;

class Category extends Model
{
    use LogsActivity;

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()->logFillable()->setDescriptionForEvent(fn(string $eventName) => "Category {$eventName}");
    }

    protected $fillable = ['name', 'slug','description', 'image', 'icon', 'prices', 'min_price', 'max_price', 'hours', 'minutes', 'pricing_type'];

    public function posts()
    {
        return $this->hasMany(Post::class);
    }
}
