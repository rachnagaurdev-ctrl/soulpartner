<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FormSectionTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\SectionType::updateOrCreate(
            ['identifier' => 'form'],
            [
                'name' => 'Form Section',
                'schema' => [
                    ['name' => 'title', 'label' => 'Title', 'type' => 'text'],
                    ['name' => 'subtitle', 'label' => 'Subtitle', 'type' => 'text'],
                    ['name' => 'description', 'label' => 'Description', 'type' => 'rich_editor'],
                    [
                        'name' => 'form_id', 
                        'label' => 'Select Form', 
                        'type' => 'reference', 
                        'reference_model' => \App\Models\Form::class,
                        'reference_label_field' => 'name'
                    ],
                    ['name' => 'section_id', 'label' => 'Section HTML ID', 'type' => 'text'],
                ]
            ]
        );
    }
}
