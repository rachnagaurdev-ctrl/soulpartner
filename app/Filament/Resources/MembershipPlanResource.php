<?php

namespace App\Filament\Resources;

use App\Filament\Resources\MembershipPlanResource\Pages;
use App\Models\MembershipPlan;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Forms\Set;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class MembershipPlanResource extends Resource
{
    protected static ?string $model = MembershipPlan::class;

    protected static ?string $navigationIcon = 'heroicon-o-credit-card';

    protected static ?string $navigationLabel = 'Membership Plans';

    protected static ?string $modelLabel = 'Membership Plan';

    protected static ?string $pluralModelLabel = 'Membership Plans';

    protected static ?string $navigationGroup = 'Memberships & Sales';

    protected static ?int $navigationSort = 2;

    public static function getNavigationBadge(): ?string
    {
        return (string) static::getModel()::where('is_active', true)->count();
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Plan Details')
                    ->schema([
                        Forms\Components\TextInput::make('name')
                            ->required()
                            ->maxLength(255)
                            ->live(onBlur: true)
                            ->afterStateUpdated(fn (Set $set, ?string $state) => $set('slug', str($state)->slug())),

                        Forms\Components\TextInput::make('slug')
                            ->required()
                            ->unique(ignoreRecord: true)
                            ->maxLength(255),

                        Forms\Components\TextInput::make('icon')
                            ->label('Icon (Emoji)')
                            ->placeholder('🛡️')
                            ->nullable(),

                        Forms\Components\TextInput::make('badge')
                            ->label('Badge Text')
                            ->placeholder('e.g. POPULAR, BEST VALUE')
                            ->nullable(),
                    ])->columns(2),

                Forms\Components\Section::make('Pricing & Validity')
                    ->schema([
                        Forms\Components\TextInput::make('price')
                            ->required()
                            ->numeric()
                            ->prefix('₹')
                            ->default(0),

                        Forms\Components\TextInput::make('period')
                            ->required()
                            ->placeholder('e.g. 3 Months, 1 Year')
                            ->default('3 Months'),

                        Forms\Components\TextInput::make('matches')
                            ->required()
                            ->placeholder('e.g. 25 Matches, Unlimited Matches')
                            ->default('25 Matches'),

                        Forms\Components\TextInput::make('sort_order')
                            ->numeric()
                            ->default(0)
                            ->label('Sort Order'),
                    ])->columns(2),

                Forms\Components\Section::make('Settings')
                    ->schema([
                        Forms\Components\Toggle::make('is_popular')
                            ->label('Mark as Popular')
                            ->default(false),

                        Forms\Components\Toggle::make('is_active')
                            ->label('Active (visible on site)')
                            ->default(true),
                    ])->columns(2),

                Forms\Components\Section::make('Features List')
                    ->schema([
                        Forms\Components\Repeater::make('features')
                            ->simple(
                                Forms\Components\TextInput::make('feature')
                                    ->placeholder('e.g. Browse verified profiles')
                                    ->required()
                            )
                            ->label('Plan Features')
                            ->addActionLabel('Add Feature')
                            ->reorderable()
                            ->collapsible(),
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('sort_order')
                    ->label('#')
                    ->sortable()
                    ->width(50),

                Tables\Columns\TextColumn::make('icon')
                    ->label('Icon'),

                Tables\Columns\TextColumn::make('name')
                    ->searchable()
                    ->sortable(),

                Tables\Columns\TextColumn::make('slug')
                    ->searchable(),

                Tables\Columns\TextColumn::make('price')
                    ->money('inr')
                    ->sortable(),

                Tables\Columns\TextColumn::make('period')
                    ->label('Validity'),

                Tables\Columns\TextColumn::make('matches')
                    ->label('Matches'),

                Tables\Columns\TextColumn::make('badge')
                    ->badge()
                    ->color('warning')
                    ->placeholder('—'),

                Tables\Columns\IconColumn::make('is_popular')
                    ->label('Popular')
                    ->boolean(),

                Tables\Columns\IconColumn::make('is_active')
                    ->label('Active')
                    ->boolean(),

                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->defaultSort('sort_order')
            ->filters([
                Tables\Filters\TernaryFilter::make('is_active')
                    ->label('Status')
                    ->trueLabel('Active Only')
                    ->falseLabel('Inactive Only'),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index'  => Pages\ListMembershipPlans::route('/'),
            'create' => Pages\CreateMembershipPlan::route('/create'),
            'edit'   => Pages\EditMembershipPlan::route('/{record}/edit'),
        ];
    }
}
