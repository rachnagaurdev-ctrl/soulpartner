<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SectionType extends Model
{
    protected $fillable = ['name', 'identifier', 'schema'];

    protected $casts = [
        'schema' => 'array',
    ];
}
