<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('membership_orders', function (Blueprint $table) {
            $table->id();
            $table->string('order_number')->unique();
            
            // Member Personal Details
            $table->string('full_name');
            $table->string('email');
            $table->string('phone', 20);
            $table->string('password')->nullable();
            $table->date('date_of_birth')->nullable();
            $table->string('gender', 30)->nullable();
            $table->string('city', 100)->nullable();
            $table->string('pincode', 20)->nullable();
            $table->string('country', 100)->default('India');
            $table->string('user_type', 50)->default('both'); // find, become, both
            
            // Membership Election Details
            $table->string('membership_plan', 50); // silver, gold, premium, yearly
            $table->string('plan_name', 100);
            $table->string('billing_period', 50)->default('3 Months');
            $table->string('matches_count', 50)->nullable();
            
            // Financial & Pricing
            $table->decimal('subtotal', 10, 2)->default(0.00);
            $table->decimal('discount_amount', 10, 2)->default(0.00);
            $table->decimal('tax_amount', 10, 2)->default(0.00);
            $table->decimal('total_amount', 10, 2)->default(0.00);
            $table->string('coupon_code', 50)->nullable();
            
            // Payment Gateway & Transaction Info
            $table->string('payment_method', 50)->default('razorpay');
            $table->string('payment_id')->nullable(); // e.g. pay_xxx
            $table->string('razorpay_order_id')->nullable();
            $table->string('razorpay_signature')->nullable();
            $table->string('payment_status', 30)->default('pending'); // pending, completed, failed, refunded
            $table->string('status', 30)->default('active'); // active, expired, cancelled
            
            $table->text('notes')->nullable();
            $table->json('metadata')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('membership_orders');
    }
};
