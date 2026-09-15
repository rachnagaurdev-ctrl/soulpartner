<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MembershipOrder extends Model
{
    use HasFactory;

    protected $table = 'membership_orders';

    protected $fillable = [
        'order_number',
        'full_name',
        'email',
        'phone',
        'password',
        'date_of_birth',
        'gender',
        'city',
        'pincode',
        'country',
        'user_type',
        'membership_plan',
        'plan_name',
        'billing_period',
        'matches_count',
        'subtotal',
        'discount_amount',
        'tax_amount',
        'total_amount',
        'coupon_code',
        'referral_code',
        'payment_method',
        'payment_id',
        'razorpay_order_id',
        'razorpay_signature',
        'payment_status',
        'status',
        'auto_renew',
        'notes',
        'metadata',
    ];

    protected $casts = [
        'date_of_birth' => 'date',
        'subtotal' => 'decimal:2',
        'discount_amount' => 'decimal:2',
        'tax_amount' => 'decimal:2',
        'total_amount' => 'decimal:2',
        'auto_renew' => 'boolean',
        'metadata' => 'array',
    ];

    /**
     * Helper to generate unique order number
     */
    public static function generateOrderNumber(): string
    {
        return 'SM-' . date('Ymd') . '-' . strtoupper(substr(uniqid(), -5));
    }
}
