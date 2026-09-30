<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class CalculateSalaryBonus extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'salary:calculate-bonus {--month=} {--year=}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Calculate and add bonus to wallet for salary-based partners who met their target.';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $settings = \App\Models\CommissionSetting::first();
        if (!$settings) {
            $this->error("Commission settings not found.");
            return;
        }

        $target = $settings->default_target;
        $bonusPerBooking = $settings->salary_target_bonus;

        if ($target <= 0 || $bonusPerBooking <= 0) {
            $this->info("Target or Bonus amount is not set (values are 0). Skipping.");
            return;
        }

        $month = $this->option('month') ?: now()->subMonth()->month;
        $year = $this->option('year') ?: now()->subMonth()->year;

        // Get salary based partners
        $partners = \App\Models\User::where('is_admin', false)->where('is_salary_based', true)->get();

        $this->info("Checking targets for " . count($partners) . " salary-based partners for {$month}/{$year}...");

        foreach ($partners as $partner) {
            $bookingsCount = \App\Models\Booking::where('partner_id', $partner->id)
                ->where('status', 'completed')
                ->where('is_bonus_paid', false)
                ->whereMonth('created_at', $month)
                ->whereYear('created_at', $year)
                ->count();

            if ($bookingsCount >= $target) {
                // "per booking example booking * bonus"
                $totalBonus = $bookingsCount * $bonusPerBooking;
                
                $partner->wallet_balance += $totalBonus;
                $partner->save();

                \App\Models\WalletTransaction::create([
                    'user_id' => $partner->id,
                    'amount' => $totalBonus,
                    'type' => 'credit',
                    'description' => "Target completion bonus for {$month}/{$year} ({$bookingsCount} bookings)",
                ]);

                \App\Models\Booking::where('partner_id', $partner->id)
                    ->where('status', 'completed')
                    ->where('is_bonus_paid', false)
                    ->whereMonth('created_at', $month)
                    ->whereYear('created_at', $year)
                    ->update(['is_bonus_paid' => true]);

                $this->info("Added ₹{$totalBonus} bonus to {$partner->name} (Target: {$target}, Completed: {$bookingsCount}).");
            } else {
                $this->info("{$partner->name} did not meet target (Target: {$target}, Completed: {$bookingsCount}).");
            }
        }
        $this->info("Salary bonus calculation completed for {$month}/{$year}.");
    }
}
