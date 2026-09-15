<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            [
                'name'        => 'Movie Partner',
                'description' => 'Watch together, share laughs',
                'icon'        => '🎬',
                'prices'      => 4500,
                'hours'       => 3,
                'minutes'     => 30,
            ],
            [
                'name'        => 'In-Person Meeting',
                'description' => 'Face-to-face meeting and conversation',
                'icon'        => '🤝',
                'prices'      => 2000,
                'hours'       => 1,
                'minutes'     => 0,
            ],
            [
                'name'        => 'Elder Care',
                'description' => 'Senior assistance & daily support',
                'icon'        => '👴',
                'prices'      => 1000,
                'hours'       => 1,
                'minutes'     => 0,
            ],
            [
                'name'        => 'Hangingout',
                'description' => 'Casual social time together',
                'icon'        => '😊',
                'prices'      => 1500,
                'hours'       => 1,
                'minutes'     => 0,
            ],
            [
                'name'        => 'Clubbing',
                'description' => 'Nightlife & party assistance',
                'icon'        => '🎉',
                'prices'      => 4500,
                'hours'       => 3,
                'minutes'     => 0,
            ],
            [
                'name'        => 'Shopping Buddy',
                'description' => 'Groceries, errands, or shopping',
                'icon'        => '🛍️',
                'prices'      => 2000,
                'hours'       => 1,
                'minutes'     => 0,
            ],
            [
                'name'        => 'Medical Support',
                'description' => 'Hospital & appointment assistance',
                'icon'        => '🏥',
                'prices'      => 2000,
                'hours'       => 1,
                'minutes'     => 0,
            ],
            [
                'name'        => 'Domestic Help',
                'description' => 'Light support & organizing',
                'icon'        => '🏠',
                'prices'      => 2000,
                'hours'       => 1,
                'minutes'     => 0,
            ],
            [
                'name'        => 'Travel Partner',
                'description' => 'Explore and travel together',
                'icon'        => '✈️',
                'prices'      => 2000,
                'hours'       => 1,
                'minutes'     => 0,
            ],
            [
                'name'        => 'Event Partner',
                'description' => 'Event & Party Assistance',
                'icon'        => '🎭',
                'prices'      => 2000,
                'hours'       => 1,
                'minutes'     => 0,
            ],
            [
                'name'        => 'City Tour Partner',
                'description' => 'Explore City',
                'icon'        => '🚴',
                'prices'      => 2000,
                'hours'       => 1,
                'minutes'     => 0,
            ],
            [
                'name'        => 'Gaming Partner (Physical)',
                'description' => 'Play & Fun',
                'icon'        => '🎮',
                'prices'      => 1800,
                'hours'       => 1,
                'minutes'     => 0,
            ],
            [
                'name'        => 'Concert Partner',
                'description' => 'Enjoy & Laught',
                'icon'        => '🎸',
                'prices'      => 2000,
                'hours'       => 1,
                'minutes'     => 0,
            ],
            [
                'name'        => 'Coffee Partner',
                'description' => 'Enjoy Coffee',
                'icon'        => '☕',
                'prices'      => 1500,
                'hours'       => 1,
                'minutes'     => 0,
            ],
            [
                'name'        => 'Cafe & Food Partner',
                'description' => 'Outing with Yummy Food',
                'icon'        => '🍕',
                'prices'      => 2000,
                'hours'       => 1,
                'minutes'     => 0,
            ],
            [
                'name'        => 'Professional Networking Partner',
                'description' => 'Business Discussion, Startup Brainstorming',
                'icon'        => '💼',
                'prices'      => 1500,
                'hours'       => 1,
                'minutes'     => 0,
            ],
        ];

        foreach ($categories as $cat) {
            Category::updateOrCreate(
                ['slug' => Str::slug($cat['name'])],
                array_merge($cat, ['slug' => Str::slug($cat['name'])])
            );
        }
    }
}
