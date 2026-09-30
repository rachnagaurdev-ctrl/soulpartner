<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CommissionSetting extends Model
{
    protected $fillable = [
        'enable_target_based_salary',
        'eligible_gender',
        'default_target',
        'commission_enabled',
        'commission_type',
        'commission_value',
        'commission_base',
        'salary_calculation_frequency',
        'requires_approval',
        'refund_before_24_hours',
        'refund_within_24_hours',
        'salary_per_booking',
        'salary_target_bonus',
    ];

    protected $casts = [
        'enable_target_based_salary' => 'boolean',
        'commission_enabled' => 'boolean',
        'requires_approval' => 'boolean',
        'eligible_gender' => 'array',
    ];
}
