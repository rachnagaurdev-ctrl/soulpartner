<?php

namespace App\Filament\Resources;

use App\Filament\Resources\FormSubmissionResource\Pages;
use App\Filament\Resources\FormSubmissionResource\RelationManagers;
use App\Models\FormSubmission;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class FormSubmissionResource extends Resource
{
    protected static ?string $model = FormSubmission::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('form_id')
                    ->relationship('form', 'name')
                    ->required(),
                Forms\Components\KeyValue::make('data')
                    ->columnSpanFull(),
                Forms\Components\KeyValue::make('metadata')
                    ->columnSpanFull(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('form.name')
                    ->label('Form')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('data')
                    ->label('Submission Data')
                    ->limit(50)
                    ->formatStateUsing(fn ($state) => collect($state)->map(fn($v, $k) => "$k: $v")->implode(', ')),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable(),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('form')
                    ->relationship('form', 'name'),
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function infolist(\Filament\Infolists\Infolist $infolist): \Filament\Infolists\Infolist
    {
        return $infolist
            ->schema([
                \Filament\Infolists\Components\Section::make('Submission Details')
                    ->schema([
                        \Filament\Infolists\Components\TextEntry::make('form.name')
                            ->label('Form Name'),
                        \Filament\Infolists\Components\TextEntry::make('created_at')
                            ->dateTime()
                            ->label('Submitted At'),
                        \Filament\Infolists\Components\RepeatableEntry::make('data_display')
                            ->label('Form Data')
                            ->state(function (FormSubmission $record) {
                                return collect($record->data)->map(fn($value, $key) => [
                                    'field' => \Illuminate\Support\Str::headline($key),
                                    'value' => is_array($value) ? implode(', ', $value) : $value,
                                ])->values()->toArray();
                            })
                            ->schema([
                                \Filament\Infolists\Components\TextEntry::make('field')
                                    ->weight(\Filament\Support\Enums\FontWeight::Bold),
                                \Filament\Infolists\Components\TextEntry::make('value'),
                            ])
                            ->columns(2),
                    ]),
                \Filament\Infolists\Components\Section::make('Metadata')
                    ->collapsed()
                    ->schema([
                        \Filament\Infolists\Components\KeyValueEntry::make('metadata'),
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
            'index' => Pages\ListFormSubmissions::route('/'),
        ];
    }
}
