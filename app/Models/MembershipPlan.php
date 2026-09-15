<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MembershipPlan extends Model
{
    use HasFactory;

    protected $table = 'membership_plans';

    protected $fillable = [
        'name',
        'slug',
        'price',
        'period',
        'matches',
        'icon',
        'badge',
        'is_popular',
        'is_active',
        'sort_order',
        'features',
    ];

    protected $casts = [
        'price'      => 'decimal:2',
        'is_popular' => 'boolean',
        'is_active'  => 'boolean',
        'features'   => 'array',
    ];

    /**
     * Scope for active plans ordered by sort_order.
     */
    public function scopeActive($query)
    {
        return $query->where('is_active', true)->orderBy('sort_order');
    }

    /**
     * Convert plan to the array format used by CheckoutController / checkout.blade.php
     */
    public function toCheckoutArray(): array
    {
        return [
            'id'       => $this->slug,
            'name'     => $this->name,
            'price'    => (float) $this->price,
            'period'   => $this->period,
            'matches'  => $this->matches,
            'badge'    => $this->badge,
            'icon'     => $this->icon ?? '🛡️',
            'popular'  => $this->is_popular,
            'features' => $this->features ?? [],
        ];
    }
}
