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
        Schema::create('commission_settings', function (Blueprint $table) {
            $table->id();
            $table->boolean('enable_target_based_salary')->default(false);
            $table->string('eligible_gender')->default('female');
            $table->integer('default_target')->default(0);
            $table->boolean('commission_enabled')->default(false);
            $table->string('commission_type')->default('percentage'); // percentage, fixed_booking, fixed_monthly
            $table->decimal('commission_value', 10, 2)->default(0);
            $table->string('commission_base')->default('booking_amount'); // booking_amount, platform_earning, partner_earning
            $table->string('salary_calculation_frequency')->default('monthly');
            $table->boolean('requires_approval')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('commission_settings');
    }
};
