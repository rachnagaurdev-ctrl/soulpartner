<?php

namespace Database\Seeders;

use App\Models\MembershipPlan;
use Illuminate\Database\Seeder;

class MembershipPlanSeeder extends Seeder
{
    /**
     * Seed the default membership plans (mirroring the previous hardcoded data).
     */
    public function run(): void
    {
        $plans = [
            [
                'name'       => 'Silver Plan',
                'slug'       => 'silver',
                'price'      => 399.00,
                'period'     => '3 Months',
                'matches'    => '25 Matches',
                'icon'       => '🛡️',
                'badge'      => null,
                'is_popular' => false,
                'is_active'  => true,
                'sort_order' => 1,
                'features'   => [
                    'Browse verified profiles',
                    'Basic intelligent matching',
                    'End-to-end secure chat',
                    'Email support',
                ],
            ],
            [
                'name'       => 'Gold Plan',
                'slug'       => 'gold',
                'price'      => 699.00,
                'period'     => '3 Months',
                'matches'    => '50 Matches',
                'icon'       => '🏆',
                'badge'      => 'POPULAR',
                'is_popular' => true,
                'is_active'  => true,
                'sort_order' => 2,
                'features'   => [
                    'All Silver features included',
                    'Advanced personality matching',
                    'Higher profile visibility (2x)',
                    'Priority customer support',
                ],
            ],
            [
                'name'       => 'Premium Plan',
                'slug'       => 'premium',
                'price'      => 999.00,
                'period'     => '3 Months',
                'matches'    => '100 Matches',
                'icon'       => '💎',
                'badge'      => null,
                'is_popular' => false,
                'is_active'  => true,
                'sort_order' => 3,
                'features'   => [
                    'All Gold features included',
                    'Premium top-tier matching',
                    'Priority profile spotlight (5x)',
                    'Dedicated companion concierge',
                ],
            ],
            [
                'name'       => 'Premium Yearly',
                'slug'       => 'yearly',
                'price'      => 2999.00,
                'period'     => '1 Year',
                'matches'    => 'Unlimited Matches',
                'icon'       => '🎁',
                'badge'      => 'BEST VALUE',
                'is_popular' => false,
                'is_active'  => true,
                'sort_order' => 4,
                'features'   => [
                    'Valid until you find your match',
                    'Unlimited companion matches',
                    'VIP Concierge & 24/7 dedicated support',
                    '50% Refund Guarantee if unmatched (as per policy)',
                ],
            ],
        ];

        foreach ($plans as $plan) {
            MembershipPlan::updateOrCreate(
                ['slug' => $plan['slug']],
                $plan
            );
        }

        $this->command->info('✅ Membership plans seeded successfully!');
    }
}
