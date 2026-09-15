<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SectionTypeResource\Pages;
use App\Filament\Resources\SectionTypeResource\RelationManagers;
use App\Models\SectionType;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Forms\Set;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class SectionTypeResource extends Resource
{
    protected static ?string $model = SectionType::class;

    protected static ?string $navigationIcon = 'heroicon-o-cog-6-tooth';

    protected static ?string $navigationGroup = 'CMS Configuration';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->required()
                    ->live(onBlur: true)
                    ->afterStateUpdated(fn (Set $set, ?string $state) => $set('identifier', str($state)->slug())),
                Forms\Components\TextInput::make('identifier')
                    ->required()
                    ->unique(ignoreRecord: true),
                Forms\Components\Repeater::make('schema')
                    ->schema([
                        Forms\Components\TextInput::make('label')->required(),
                        Forms\Components\TextInput::make('name')->required(),
                        Forms\Components\Select::make('type')
                            ->options([
                                'text' => 'Text',
                                'textarea' => 'Textarea',
                                'rich_editor' => 'Rich Editor',
                                'image' => 'Image',
                                'media' => 'Media Picker (Image/Video)',
                                'color' => 'Color Picker',
                                'reference' => 'Reference (Other Module)',
                                'repeater' => 'Repeater (List of items)',
                                'cta' => 'Call to Action (Button/Link)',
                                'document' => 'Document Upload (PDF/Doc)',
                                'options' => 'Dropdown'
                            ])
                            ->required()
                            ->live(),
                              Forms\Components\Repeater::make('select')
                                    ->schema([
                                        Forms\Components\TextInput::make('name')
                                            ->required(),
                                        Forms\Components\TextInput::make('value')
                                            ->required(),
                                    ])
                                    ->visible(fn (Forms\Get $get) => $get('type') === 'options'),
                        Forms\Components\TextInput::make('max_items')
                            ->label('Max Items (Limit)')
                            ->numeric()
                            ->visible(fn (Forms\Get $get) => $get('type') === 'repeater'),
                        Forms\Components\Select::make('reference_model')
                            ->options([
                                'App\Models\Page' => 'Pages',
                                'App\Models\SectionType' => 'Section Types',
                                'App\Models\Post' => 'Blog Posts',
                                'App\Models\User' => 'Users',
                                'other' => 'Other (Specify Class)',
                            ])
                            ->required(fn (Forms\Get $get) => $get('type') === 'reference')
                            ->visible(fn (Forms\Get $get) => $get('type') === 'reference')
                            ->live(),
                        Forms\Components\TextInput::make('custom_model')
                            ->label('Custom Model Class (e.g. App\Models\Product)')
                            ->placeholder('App\Models\YourModel')
                            ->required(fn (Forms\Get $get) => $get('reference_model') === 'other')
                            ->visible(fn (Forms\Get $get) => $get('reference_model') === 'other'),
                        Forms\Components\TextInput::make('reference_label_field')
                            ->label('Label Field (e.g., title or name)')
                            ->default('title')
                            ->required(fn (Forms\Get $get) => $get('type') === 'reference')
                            ->visible(fn (Forms\Get $get) => $get('type') === 'reference'),
                        Forms\Components\Repeater::make('sub_schema')
                            ->label('Repeater Fields')
                            ->schema([
                                Forms\Components\TextInput::make('label')->required(),
                                Forms\Components\TextInput::make('name')->required(),
                                Forms\Components\Select::make('type')
                                    ->options([
                                        'text' => 'Text',
                                        'textarea' => 'Textarea',
                                        'rich_editor' => 'Rich Editor',
                                        'image' => 'Image',
                                        'media' => 'Media Picker (Image/Video)',
                                        'color' => 'Color Picker',
                                        'reference' => 'Reference (Other Module)',
                                        'repeater' => 'Repeater (Nested List)',
                                        'cta' => 'Call to Action (Button/Link)',
                                        'document' => 'Document Upload (PDF/Doc)',
                                        'options' => 'Dropdown'
                                    ])
                                    ->required()
                                    ->live(),
                                     Forms\Components\Repeater::make('select')
                                    ->schema([
                                        Forms\Components\TextInput::make('name')
                                            ->required(),
                                        Forms\Components\TextInput::make('value')
                                            ->required(),
                                    ])
                                    ->visible(fn (Forms\Get $get) => $get('type') === 'options'),
                                  
                                Forms\Components\TextInput::make('max_items')
                                    ->label('Max Items (Limit)')
                                    ->numeric()
                                    ->visible(fn (Forms\Get $get) => $get('type') === 'repeater'),
                                Forms\Components\Select::make('reference_model')
                                    ->options([
                                        'App\Models\Page' => 'Pages',
                                        'App\Models\SectionType' => 'Section Types',
                                        'App\Models\Post' => 'Blog Posts',
                                        'App\Models\User' => 'Users',
                                        'other' => 'Other (Specify Class)',
                                    ])
                                    ->required(fn (Forms\Get $get) => $get('type') === 'reference')
                                    ->visible(fn (Forms\Get $get) => $get('type') === 'reference')
                                    ->live(),
                                Forms\Components\TextInput::make('custom_model')
                                    ->label('Custom Model Class')
                                    ->placeholder('App\Models\YourModel')
                                    ->required(fn (Forms\Get $get) => $get('reference_model') === 'other')
                                    ->visible(fn (Forms\Get $get) => $get('reference_model') === 'other'),
                                Forms\Components\TextInput::make('reference_label_field')
                                    ->label('Label Field')
                                    ->default('title')
                                    ->required(fn (Forms\Get $get) => $get('type') === 'reference')
                                    ->visible(fn (Forms\Get $get) => $get('type') === 'reference'),
                                Forms\Components\Repeater::make('sub_schema')
                                    ->label('Nested Repeater Fields')
                                    ->schema([
                                        Forms\Components\TextInput::make('label')->required(),
                                        Forms\Components\TextInput::make('name')->required(),
                                        Forms\Components\Select::make('type')
                                            ->options([
                                                'text' => 'Text',
                                                'textarea' => 'Textarea',
                                                'rich_editor' => 'Rich Editor',
                                                'image' => 'Image',
                                                'media' => 'Media Picker (Image/Video)',
                                                'color' => 'Color Picker',
                                                'reference' => 'Reference (Other Module)',
                                                'cta' => 'Call to Action (Button/Link)',
                                                'document' => 'Document Upload (PDF/Doc)',
                                                'options' => 'Dropdown'
                                            ])
                                            ->required()
                                            ->live(),
                                        Forms\Components\TextInput::make('max_items')
                                            ->label('Max Items (Limit)')
                                            ->numeric()
                                            ->visible(fn (Forms\Get $get) => $get('type') === 'repeater'),
                                        Forms\Components\Select::make('reference_model')
                                            ->options([
                                                'App\Models\Page' => 'Pages',
                                                'App\Models\SectionType' => 'Section Types',
                                                'App\Models\Post' => 'Blog Posts',
                                            ])
                                            ->required(fn (Forms\Get $get) => $get('type') === 'reference')
                                            ->visible(fn (Forms\Get $get) => $get('type') === 'reference')
                                            ->live(),
                                        Forms\Components\TextInput::make('reference_label_field')
                                            ->label('Label Field')
                                            ->default('title')
                                            ->required(fn (Forms\Get $get) => $get('type') === 'reference')
                                            ->visible(fn (Forms\Get $get) => $get('type') === 'reference'),
                                    ])
                                    ->visible(fn (Forms\Get $get) => $get('type') === 'repeater')
                                    ->columnSpanFull()
                                    ->columns(3),
                            ])
                            ->visible(fn (Forms\Get $get) => $get('type') === 'repeater')
                            ->columnSpanFull()
                            ->columns(3),
                    ])
                    ->columns(3)
                    ->columnSpanFull()
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('identifier')
                    ->searchable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\ReplicateAction::make()
                    ->before(fn ($record) => $record->identifier = $record->identifier . '_copy_' . strtolower(\Illuminate\Support\Str::random(4)))
                    ->after(fn ($replica) => $replica->save()),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListSectionTypes::route('/'),
            'create' => Pages\CreateSectionType::route('/create'),
            'edit' => Pages\EditSectionType::route('/{record}/edit'),
        ];
    }
}
