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
        Schema::table('commission_settings', function (Blueprint $table) {
            $table->decimal('salary_per_booking', 10, 2)->default(0);
            $table->decimal('salary_target_bonus', 10, 2)->default(0);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('commission_settings', function (Blueprint $table) {
            $table->dropColumn(['salary_per_booking', 'salary_target_bonus']);
        });
    }
};
