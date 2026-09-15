<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PageResource\Pages;
use App\Filament\Resources\PageResource\RelationManagers;
use App\Models\Page;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Forms\Set;
use Awcodes\Curator\Components\Forms\CuratorPicker;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Traits\HasDynamicFields;

class PageResource extends Resource
{
    use HasDynamicFields;

    protected static ?string $model = Page::class;

    protected static ?string $navigationIcon = 'heroicon-o-document-text';

    protected static ?string $navigationGroup = 'Content Management';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Group::make()
                    ->schema([
                        Forms\Components\Section::make()
                            ->schema([
                                Forms\Components\TextInput::make('title')
                                    ->required()
                                    ->live(onBlur: true)
                                    ->afterStateUpdated(fn (Set $set, ?string $state) => $set('slug', str($state)->slug())),
                                Forms\Components\TextInput::make('slug')
                                    ->required()
                                    ->unique(ignoreRecord: true),
                            ]),
                        
                        Forms\Components\Section::make('Page Content')
                            ->schema([
                                Forms\Components\Builder::make('content')
                                    ->blocks([
                                        Forms\Components\Builder\Block::make('section')
                                            ->label('Dynamic Section')
                                            ->schema([
                                                Forms\Components\Select::make('section_type_id')
                                                    ->label('Select Section Type')
                                                    ->options(\App\Models\SectionType::all()->pluck('name', 'id'))
                                                    ->live()
                                                    ->afterStateUpdated(fn (Set $set) => $set('data', []))
                                                    ->required(),
                                                Forms\Components\Placeholder::make('section_description')
                                                    ->content(fn ($get) => \App\Models\SectionType::find($get('section_type_id'))?->name ?? 'Choose a section type to see fields'),
                                                Forms\Components\Grid::make(1)
                                                    ->schema(function (Forms\Get $get) {
                                                        $sectionTypeId = $get('section_type_id');
                                                        if (! $sectionTypeId) return [];
                                                        $sectionType = \App\Models\SectionType::find($sectionTypeId);
                                                        if (! $sectionType || ! is_array($sectionType->schema)) return [];
                                                        return self::generateFields($sectionType->schema, 'data');
                                                    }),
                                            ]),
                                        
                                        Forms\Components\Builder\Block::make('global_section')
                                            ->label('Reusable (Global) Section')
                                            ->schema([
                                                Forms\Components\Select::make('global_section_id')
                                                    ->label('Select Global Section')
                                                    ->options(\App\Models\GlobalSection::all()->pluck('name', 'id'))
                                                    ->required()
                                                    ->hint('Edits here will reflect across all pages using this section.'),
                                            ]),
                                    ])
                                    ->collapsible()
                                    ->collapsed(),
                            ]),
                    ])
                    ->columnSpan(['lg' => 2]),

                Forms\Components\Group::make()
                    ->schema([
                        Forms\Components\Section::make('Status')
                            ->schema([
                                Forms\Components\Toggle::make('is_published')
                                    ->required()
                                    ->onColor('success')
                                    ->offColor('danger'),
                            ]),

                        Forms\Components\Section::make('SEO & Social Media')
                            ->collapsible()
                            ->schema([
                                Forms\Components\TextInput::make('meta_title')
                                    ->placeholder('Defaults to page title'),
                                Forms\Components\Textarea::make('meta_description')
                                    ->rows(3),
                                Forms\Components\TextInput::make('meta_keywords'),
                                CuratorPicker::make('og_image')
                                    ->label('Social Share Image')
                                    ->buttonLabel('Select / Change Image')
                                    ->nullable(),
                            ]),
                    ])
                    ->columnSpan(['lg' => 1]),
            ])
            ->columns(3);
    }

    public static function getDynamicBlocks(): array
    {
        if (! \Illuminate\Support\Facades\Schema::hasTable('section_types')) {
            return [];
        }

        $sectionTypes = \App\Models\SectionType::all();
        $blocks = [];

        foreach ($sectionTypes as $sectionType) {
            $blocks[] = Forms\Components\Builder\Block::make($sectionType->identifier)
                ->label($sectionType->name)
                ->schema(static::generateFields($sectionType->schema));
        }

        $blocks[] = Forms\Components\Builder\Block::make('global_section')
            ->label('⭐ Reusable Global Section')
            ->schema([
                Forms\Components\Select::make('global_section_id')
                    ->label('Select Global Section')
                    ->options(fn () => \App\Models\GlobalSection::pluck('name', 'id'))
                    ->required()
                    ->searchable(),
            ]);

        return $blocks;
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('title')
                    ->searchable(),
                Tables\Columns\TextColumn::make('slug')
                    ->searchable(),
                Tables\Columns\IconColumn::make('is_published')
                    ->boolean(),
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
                    ->before(fn ($record) => $record->slug = $record->slug . '-copy-' . strtolower(\Illuminate\Support\Str::random(4)))
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
            'index' => Pages\ListPages::route('/'),
            'create' => Pages\CreatePage::route('/create'),
            'edit' => Pages\EditPage::route('/{record}/edit'),
        ];
    }
}
