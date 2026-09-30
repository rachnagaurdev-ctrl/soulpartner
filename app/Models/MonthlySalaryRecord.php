<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MonthlySalaryRecord extends Model
{
    protected $fillable = [
        'user_id',
        'month',
        'year',
        'target',
        'completed_bookings',
        'achievement_percentage',
        'salary_slab_id',
        'base_salary',
        'commission_type',
        'commission_amount',
        'total_salary',
        'status',
        'payment_date',
        'payment_reference',
        'admin_notes',
    ];

    protected $casts = [
        'payment_date' => 'date',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function salarySlab()
    {
        return $this->belongsTo(SalarySlab::class);
    }
}
