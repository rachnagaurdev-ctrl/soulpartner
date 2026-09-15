<?php

namespace App\Filament\Resources;

use App\Filament\Resources\GlobalSectionResource\Pages;
use App\Filament\Resources\GlobalSectionResource\RelationManagers;
use App\Models\GlobalSection;
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

class GlobalSectionResource extends Resource
{
    use HasDynamicFields;

    protected static ?string $model = GlobalSection::class;

    protected static ?string $navigationIcon = 'heroicon-o-square-3-stack-3d';

    protected static ?string $navigationGroup = 'Content Management';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->required(),
                Forms\Components\Select::make('section_type_id')
                    ->relationship('sectionType', 'name')
                    ->required()
                    ->live()
                    ->afterStateUpdated(fn (Set $set) => $set('data', [])),
                
                Forms\Components\Group::make()
                    ->schema(function (Forms\Get $get) {
                        $sectionTypeId = $get('section_type_id');
                        if (! $sectionTypeId) return [];

                        $sectionType = \App\Models\SectionType::find($sectionTypeId);
                        if (! $sectionType) return [];

                        return static::generateFields($sectionType->schema, 'data');
                    })
                    ->columnSpanFull()
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('sectionType.name')
                    ->label('Type')
                    ->sortable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\ReplicateAction::make(),
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
            'index' => Pages\ListGlobalSections::route('/'),
            'create' => Pages\CreateGlobalSection::route('/create'),
            'edit' => Pages\EditGlobalSection::route('/{record}/edit'),
        ];
    }
}
