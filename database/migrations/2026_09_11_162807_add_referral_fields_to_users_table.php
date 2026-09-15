<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\User;
use Illuminate\Support\Str;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('referral_code')->nullable()->unique();
            $table->unsignedBigInteger('referred_by')->nullable();
            $table->decimal('wallet_balance', 10, 2)->default(0);

            $table->foreign('referred_by')->references('id')->on('users')->onDelete('set null');
        });

        // Generate referral codes for existing users
        $users = User::all();
        foreach ($users as $user) {
            $user->referral_code = strtoupper(Str::random(8));
            $user->save();
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropForeign(['referred_by']);
            $table->dropColumn(['referral_code', 'referred_by', 'wallet_balance']);
        });
    }
};
