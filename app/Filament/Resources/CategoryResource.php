<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CategoryResource\Pages;
use App\Filament\Resources\CategoryResource\RelationManagers;
use App\Models\Category;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Forms\Set;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class CategoryResource extends Resource
{
    protected static ?string $model = Category::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->required()
                    ->live(onBlur: true)
                    ->afterStateUpdated(fn (Set $set, ?string $state) => $set('slug', str($state)->slug())),
                Forms\Components\TextInput::make('slug')
                    ->required()
                    ->unique(ignoreRecord: true),
                Forms\Components\Select::make('pricing_type')
                    ->options([
                        'hourly' => 'Hourly',
                        'package' => 'Package',
                    ])
                    ->default('hourly')
                    ->required(),
                Forms\Components\FileUpload::make('image')
                    ->image()
                    ->directory('categories')
                    ->nullable(),
                Forms\Components\TextInput::make('icon')
                    ->nullable(),
                Forms\Components\TextInput::make('prices')
                    ->numeric()
                    ->prefix('₹')
                    ->nullable(),
                Forms\Components\TextInput::make('hours')
                    ->numeric()
                    ->nullable(),
                Forms\Components\TextInput::make('minutes')
                    ->numeric()
                    ->nullable(),
                Forms\Components\Textarea::make('description')
                    ->rows(3),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('image'),
                Tables\Columns\TextColumn::make('name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('pricing_type')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('prices')
                    ->money('inr')
                    ->sortable(),
                Tables\Columns\TextColumn::make('hours')
                    ->sortable(),
                Tables\Columns\TextColumn::make('minutes')
                    ->sortable(),
                Tables\Columns\TextColumn::make('slug')
                    ->searchable(),
                Tables\Columns\TextColumn::make('description')
                    ->limit(50),
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
                Tables\Actions\ReplicateAction::make()
                    ->before(fn ($record) => $record->slug = $record->slug . '-copy')
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
            'index' => Pages\ListCategories::route('/'),
            'create' => Pages\CreateCategory::route('/create'),
            'edit' => Pages\EditCategory::route('/{record}/edit'),
        ];
    }
}
