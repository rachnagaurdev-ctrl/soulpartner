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
        Schema::create('salary_slabs', function (Blueprint $table) {
            $table->id();
            $table->integer('minimum_target')->default(0);
            $table->integer('maximum_target')->nullable(); // null means unlimited
            $table->decimal('salary_amount', 10, 2)->default(0);
            $table->string('commission_type')->nullable(); // percentage, fixed_booking, fixed_monthly
            $table->decimal('commission_value', 10, 2)->default(0);
            $table->boolean('status')->default(true);
            $table->date('effective_from')->nullable();
            $table->date('effective_to')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('salary_slabs');
    }
};
