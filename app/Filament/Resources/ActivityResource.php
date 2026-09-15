<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ActivityResource\Pages;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Spatie\Activitylog\Models\Activity;

class ActivityResource extends Resource
{
    protected static ?string $model = Activity::class;

    protected static ?string $navigationIcon = 'heroicon-o-clipboard-document-list';
    protected static ?string $navigationGroup = 'CMS Configuration';
    protected static ?string $navigationLabel = 'Activity Logs';
    protected static ?int $navigationSort = 10;

    public static function canCreate(): bool
    {
        return false;
    }

    public static function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\TextInput::make('log_name')->label('Log'),
            Forms\Components\TextInput::make('description')->label('Event'),
            Forms\Components\TextInput::make('subject_type')->label('Module'),
            Forms\Components\TextInput::make('subject_id')->label('Record ID'),
                Forms\Components\KeyValue::make('properties.attributes')
                    ->label('Changed Values')
                    ->columnSpanFull(),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('causer.name')
                    ->label('User')
                    ->default('System')
                    ->icon('heroicon-m-user-circle')
                    ->searchable(),

                Tables\Columns\BadgeColumn::make('description')
                    ->label('Event')
                    ->colors([
                        'success' => fn ($state) => str_contains(strtolower($state), 'created'),
                        'warning' => fn ($state) => str_contains(strtolower($state), 'updated'),
                        'danger'  => fn ($state) => str_contains(strtolower($state), 'deleted'),
                    ]),

                Tables\Columns\TextColumn::make('subject_type')
                    ->label('Module')
                    ->formatStateUsing(fn (?string $state) => $state ? class_basename($state) : '-')
                    ->badge()
                    ->color('gray'),

                Tables\Columns\TextColumn::make('subject_id')
                    ->label('Record ID'),

                Tables\Columns\TextColumn::make('created_at')
                    ->label('Time')
                    ->dateTime('M d, Y H:i')
                    ->sortable(),
            ])
            ->defaultSort('created_at', 'desc')
            ->filters([
                Tables\Filters\SelectFilter::make('description')
                    ->label('Event Type')
                    ->options([
                        'Page created'      => 'Page Created',
                        'Page updated'      => 'Page Updated',
                        'Page deleted'      => 'Page Deleted',
                        'Post created'      => 'Post Created',
                        'Post updated'      => 'Post Updated',
                        'Client created'    => 'Client Created',
                        'Category created'  => 'Category Created',
                    ]),
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListActivities::route('/'),
            'view'  => Pages\ViewActivity::route('/{record}'),
        ];
    }
}
