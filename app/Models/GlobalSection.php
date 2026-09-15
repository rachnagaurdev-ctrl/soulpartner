<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GlobalSection extends Model
{
    protected $fillable = ['name', 'section_type_id', 'data'];

    protected $casts = [
        'data' => 'array',
    ];

    public function sectionType()
    {
        return $this->belongsTo(SectionType::class);
    }
}
