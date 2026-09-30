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
        Schema::create('monthly_salary_records', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->integer('month');
            $table->integer('year');
            $table->integer('target')->default(0);
            $table->integer('completed_bookings')->default(0);
            $table->decimal('achievement_percentage', 5, 2)->default(0);
            $table->unsignedBigInteger('salary_slab_id')->nullable();
            $table->decimal('base_salary', 10, 2)->default(0);
            $table->string('commission_type')->nullable();
            $table->decimal('commission_amount', 10, 2)->default(0);
            $table->decimal('total_salary', 10, 2)->default(0);
            $table->string('status')->default('Pending'); // Pending, Calculated, Approved, Paid, Hold, Rejected
            $table->date('payment_date')->nullable();
            $table->string('payment_reference')->nullable();
            $table->text('admin_notes')->nullable();
            $table->timestamps();

            $table->unique(['user_id', 'month', 'year']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('monthly_salary_records');
    }
};
