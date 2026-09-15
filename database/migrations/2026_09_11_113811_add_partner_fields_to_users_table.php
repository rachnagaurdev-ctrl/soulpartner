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
        Schema::table('users', function (Blueprint $table) {
            $table->string('height')->nullable();
            $table->string('religion')->nullable();
            $table->json('languages')->nullable();
            $table->string('preferred_location')->nullable();
            $table->string('available_from')->nullable();
            $table->string('available_time')->nullable();
            $table->json('interests')->nullable();
            $table->json('looking_for')->nullable();
            $table->json('profile_photos')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn([
                'height',
                'religion',
                'languages',
                'preferred_location',
                'available_from',
                'available_time',
                'interests',
                'looking_for',
                'profile_photos'
            ]);
        });
    }
};
