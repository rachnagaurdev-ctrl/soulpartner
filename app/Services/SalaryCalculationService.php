<?php

namespace App\Services;

use App\Models\User;
use App\Models\Booking;
use App\Models\MonthlySalaryRecord;
use App\Models\SalarySlab;
use App\Models\CommissionSetting;
use Carbon\Carbon;

class SalaryCalculationService
{
    public function calculateForMonth($month, $year)
    {
        $settings = CommissionSetting::first();

        if (!$settings || !$settings->enable_target_based_salary) {
            return;
        }

        $eligibleGenders = $settings->eligible_gender ?? [];

        if (empty($eligibleGenders)) {
            return;
        }

        $eligibleUsers = User::whereIn('gender', $eligibleGenders)->get();

        foreach ($eligibleUsers as $user) {
            $this->calculateForUser($user, $month, $year, $settings);
        }
    }

    public function calculateForUser(User $user, $month, $year, CommissionSetting $settings)
    {
        $startDate = Carbon::create($year, $month, 1)->startOfMonth();
        $endDate = Carbon::create($year, $month, 1)->endOfMonth();

        $completedBookingsCount = Booking::where('user_id', $user->id) // Assuming booking belongs to user or partner
            ->where('status', 'completed')
            ->whereBetween('created_at', [$startDate, $endDate])
            ->count();

        $target = $settings->default_target;

        $achievementPercentage = $target > 0 ? ($completedBookingsCount / $target) * 100 : 0;

        $salarySlab = SalarySlab::where('status', true)
            ->where('minimum_target', '<=', $completedBookingsCount)
            ->where(function ($query) use ($completedBookingsCount) {
                $query->whereNull('maximum_target')
                      ->orWhere('maximum_target', '>=', $completedBookingsCount);
            })->first();

        $baseSalary = $salarySlab ? $salarySlab->salary_amount : 0;
        
        $commissionAmount = 0;
        $commissionType = null;
        if ($settings->commission_enabled) {
            // Placeholder logic for commission
            $commissionAmount = $this->calculateCommission($user, $completedBookingsCount, $settings, $salarySlab);
            $commissionType = $settings->commission_type;
        }

        $totalSalary = $baseSalary + $commissionAmount;

        MonthlySalaryRecord::updateOrCreate(
            [
                'user_id' => $user->id,
                'month' => $month,
                'year' => $year,
            ],
            [
                'target' => $target,
                'completed_bookings' => $completedBookingsCount,
                'achievement_percentage' => $achievementPercentage,
                'salary_slab_id' => $salarySlab ? $salarySlab->id : null,
                'base_salary' => $baseSalary,
                'commission_type' => $commissionType,
                'commission_amount' => $commissionAmount,
                'total_salary' => $totalSalary,
                'status' => 'Calculated',
            ]
        );
    }

    private function calculateCommission(User $user, $bookingsCount, CommissionSetting $settings, $slab)
    {
        // Add detailed commission logic here
        if ($settings->commission_type === 'fixed_monthly') {
            return $settings->commission_value;
        }
        
        if ($settings->commission_type === 'fixed_booking') {
            return $settings->commission_value * $bookingsCount;
        }

        // Percentage based on revenue, etc.
        return 0;
    }
}
