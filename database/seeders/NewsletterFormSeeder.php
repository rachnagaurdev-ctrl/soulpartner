<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class NewsletterFormSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\Form::updateOrCreate(
            ['slug' => 'newsletter'],
            [
                'name' => 'Newsletter Subscription',
                'fields' => [
                    [
                        'type' => 'email',
                        'data' => [
                            'name' => 'email',
                            'label' => 'Email Address',
                            'placeholder' => 'Enter your email address',
                            'required' => true
                        ]
                    ]
                ],
                'settings' => [
                    'submit_button_text' => 'Subscribe',
                    'success_message' => 'Thank you for subscribing to our newsletter!',
                    'email_template' => '<h2>New Newsletter Subscription</h2><p>A new user has subscribed to the newsletter:</p><p><strong>Email:</strong> {email}</p><p>---</p><p>Sent from Victora CMS</p>',
                ],
                'is_active' => true
            ]
        );
    }
}
