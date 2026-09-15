<?php

namespace App\Traits;

use App\Models\Page;
use App\Models\Post;
use App\Models\SectionType;
use Awcodes\Curator\Components\Forms\CuratorPicker;
use Filament\Forms;

trait HasDynamicFields
{
    public static function generateFields(array $schema, $prefix = ''): array
    {
        $fields = [];
        foreach ($schema as $fieldSchema) {
            $fieldName = $prefix ? "{$prefix}.{$fieldSchema['name']}" : $fieldSchema['name'];
            $fields[] = match ($fieldSchema['type']) {
                'text' => Forms\Components\TextInput::make($fieldName)->label($fieldSchema['label']),
                'textarea' => Forms\Components\Textarea::make($fieldName)->label($fieldSchema['label']),
                'rich_editor' => Forms\Components\RichEditor::make($fieldName)->label($fieldSchema['label']),
                'image' => CuratorPicker::make($fieldName)->label($fieldSchema['label'])->buttonLabel('Select / Change Image')->nullable(),
                'media' => CuratorPicker::make($fieldName)->label($fieldSchema['label'])->buttonLabel('Select / Change Media')->nullable(),
                'color' => Forms\Components\ColorPicker::make($fieldName)->label($fieldSchema['label']),
                'options' => Forms\Components\Select::make($fieldName)
                            ->options(
                                collect($fieldSchema['select'] ?? [])
                                ->pluck('name','value')
                                ->toArray()
                            )
                            ->searchable(),
                'reference' => Forms\Components\Select::make($fieldName)
                    ->label($fieldSchema['label'])
                    ->options(function() use ($fieldSchema) {
                        $modelClass = $fieldSchema['reference_model'] ?? null;
                        if ($modelClass === 'other') { $modelClass = $fieldSchema['custom_model'] ?? null; }
                        $labelField = $fieldSchema['reference_label_field'] ?? 'name';
                        if ($modelClass && class_exists($modelClass)) {
                            try { return $modelClass::pluck($labelField, 'id')->toArray(); } catch (\Exception $e) { return []; }
                        }
                        return [];
                    })
                    ->searchable(),
                'repeater' => Forms\Components\Repeater::make($fieldName)
                    ->label($fieldSchema['label'])
                    ->schema(static::generateFields($fieldSchema['sub_schema'] ?? []))
                    ->maxItems($fieldSchema['max_items'] ?? null)
                    ->columnSpanFull(),
                'cta' => Forms\Components\Fieldset::make($fieldSchema['label'])
                    ->statePath($fieldName)
                    ->schema([
                        Forms\Components\TextInput::make('label')
                            ->label('Button Text')
                            ->required(),
                        Forms\Components\Select::make('url_type')
                            ->label('Link Type')
                            ->options([
                                'internal' => 'Internal Link',
                                'external' => 'External Link',
                            ])
                            ->default('internal')
                            ->live()
                            ->required(),
                        Forms\Components\Select::make('internal_url')
                            ->label('Select Internal Page')
                            ->options(function () {
                                $options = [];
                                if (class_exists(Page::class)) {
                                    $pages = Page::where('is_published', true)->get();
                                    foreach ($pages as $page) {
                                        $options["/" . ltrim($page->slug, '/')] = "Page: " . $page->title;
                                    }
                                }
                                if (class_exists(Post::class)) {
                                    $posts = Post::whereNotNull('published_at')->where('published_at', '<=', now())->get();
                                    foreach ($posts as $post) {
                                        $options["/blog/" . ltrim($post->slug, '/')] = "Blog: " . $post->title;
                                    }
                                }
                                return $options;
                            })
                            ->searchable()
                            ->visible(fn (Forms\Get $get) => $get('url_type') === 'internal')
                            ->required(fn (Forms\Get $get) => $get('url_type') === 'internal'),
                        Forms\Components\TextInput::make('external_url')
                            ->label('External URL')
                            ->url()
                            ->visible(fn (Forms\Get $get) => $get('url_type') === 'external')
                            ->required(fn (Forms\Get $get) => $get('url_type') === 'external'),
                        Forms\Components\Select::make('target')
                            ->label('Open In')
                            ->options([
                                '_self' => 'Same Window',
                                '_blank' => 'New Tab',
                            ])
                            ->default('_self')
                            ->required(),
                    ])
                    ->columns(2),
                'document' => Forms\Components\FileUpload::make($fieldName)
                    ->label($fieldSchema['label'])
                    ->directory('documents')
                    ->visibility('public')
                    ->openable()
                    ->downloadable()
                    ->nullable(),
                default => Forms\Components\TextInput::make($fieldName)->label($fieldSchema['label']),
            };
        }
        return $fields;
    }

    public static function filterDataBySchema(array $data, array $schema): array
    {
        $filtered = [];
        foreach ($schema as $fieldSchema) {
            $name = $fieldSchema['name'];
            if (isset($data[$name])) {
                if ($fieldSchema['type'] === 'repeater' && is_array($data[$name])) {
                    $subSchema = $fieldSchema['sub_schema'] ?? [];
                    $filtered[$name] = array_map(fn($item) => static::filterDataBySchema($item, $subSchema), $data[$name]);
                } elseif ($fieldSchema['type'] === 'cta' && is_array($data[$name])) {
                    // CTA is a fieldset, so it has its own subfields but they are fixed
                    $filtered[$name] = array_intersect_key($data[$name], array_flip(['label', 'url_type', 'internal_url', 'external_url', 'target']));
                } else {
                    $filtered[$name] = $data[$name];
                }
            }
        }
        return $filtered;
    }
}
