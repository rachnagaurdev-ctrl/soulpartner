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
        \Illuminate\Support\Facades\DB::table('commission_settings')->update(['eligible_gender' => '["female"]']);
        Schema::table('commission_settings', function (Blueprint $table) {
            $table->json('eligible_gender')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('commission_settings', function (Blueprint $table) {
            $table->string('eligible_gender')->default('female')->change();
        });
    }
};
