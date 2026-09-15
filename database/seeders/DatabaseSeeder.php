<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Admin User
        \App\Models\User::create([
            'name' => 'Admin',
            'email' => 'admin@admin.com',
            'password' => \Illuminate\Support\Facades\Hash::make('password'),
        ]);

        // Default Section Types
        \App\Models\SectionType::create([
            'name' => 'Hero Section',
            'identifier' => 'hero',
            'schema' => [
                ['label' => 'Headline', 'name' => 'title', 'type' => 'text'],
                ['label' => 'Subheadline', 'name' => 'subtitle', 'type' => 'textarea'],
                ['label' => 'Button Text', 'name' => 'button_text', 'type' => 'text'],
                ['label' => 'Background Image', 'name' => 'image', 'type' => 'image'],
            ],
        ]);

        \App\Models\SectionType::create([
            'name' => 'Features Section',
            'identifier' => 'features',
            'schema' => [
                ['label' => 'Section Title', 'name' => 'title', 'type' => 'text'],
                ['label' => 'Description', 'name' => 'description', 'type' => 'textarea'],
            ],
        ]);

        // Initial Page
        \App\Models\Page::create([
            'title' => 'Welcome to Waaree CMS',
            'slug' => 'home',
            'is_published' => true,
            'content' => [
                [
                    'type' => 'hero',
                    'data' => [
                        'title' => 'Build Your Dream Website',
                        'subtitle' => 'The most flexible section-based CMS built on Laravel.',
                        'button_text' => 'Explore CMS',
                    ]
                ],
                [
                    'type' => 'features',
                    'data' => [
                        'title' => 'Powerful Capabilities',
                        'description' => 'Everything you need to manage your content effectively.',
                    ]
                ]
            ],
        ]);

        // Membership Plans
        $this->call(MembershipPlanSeeder::class);

        // Categories
        $this->call(CategorySeeder::class);
    }
}
