<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SalarySlab extends Model
{
    protected $fillable = [
        'minimum_target',
        'maximum_target',
        'salary_amount',
        'commission_type',
        'commission_value',
        'status',
        'effective_from',
        'effective_to',
    ];

    protected $casts = [
        'status' => 'boolean',
        'effective_from' => 'date',
        'effective_to' => 'date',
    ];
}
