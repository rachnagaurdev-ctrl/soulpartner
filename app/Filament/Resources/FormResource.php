<?php

namespace App\Filament\Resources;

use App\Filament\Resources\FormResource\Pages;
use App\Filament\Resources\FormResource\RelationManagers;
use App\Models\Form as FormModel;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class FormResource extends Resource
{
    protected static ?string $model = FormModel::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('General Information')
                    ->schema([
                        Forms\Components\Grid::make(2)
                            ->schema([
                                Forms\Components\TextInput::make('name')
                                    ->required()
                                    ->live(onBlur: true)
                                    ->afterStateUpdated(fn (Forms\Set $set, ?string $state) => $set('slug', \Illuminate\Support\Str::slug($state))),
                                Forms\Components\TextInput::make('slug')
                                    ->required()
                                    ->unique(ignoreRecord: true),
                            ]),
                        Forms\Components\Toggle::make('is_active')
                            ->default(true),
                    ]),

                Forms\Components\Section::make('Form Fields')
                    ->description('Add and arrange the fields for this form.')
                    ->schema([
                        Forms\Components\Builder::make('fields')
                            ->blocks([
                                Forms\Components\Builder\Block::make('text')
                                    ->icon('heroicon-o-pencil')
                                    ->schema([
                                        Forms\Components\TextInput::make('label')->required(),
                                        Forms\Components\TextInput::make('name')->required()->rules(['alpha_dash']),
                                        Forms\Components\TextInput::make('placeholder'),
                                        Forms\Components\Toggle::make('required'),
                                    ]),
                                Forms\Components\Builder\Block::make('email')
                                    ->icon('heroicon-o-envelope')
                                    ->schema([
                                        Forms\Components\TextInput::make('label')->required(),
                                        Forms\Components\TextInput::make('name')->required()->rules(['alpha_dash']),
                                        Forms\Components\TextInput::make('placeholder'),
                                        Forms\Components\Toggle::make('required'),
                                    ]),
                                Forms\Components\Builder\Block::make('textarea')
                                    ->icon('heroicon-o-document-text')
                                    ->schema([
                                        Forms\Components\TextInput::make('label')->required(),
                                        Forms\Components\TextInput::make('name')->required()->rules(['alpha_dash']),
                                        Forms\Components\TextInput::make('placeholder'),
                                        Forms\Components\Toggle::make('required'),
                                    ]),
                                Forms\Components\Builder\Block::make('select')
                                    ->icon('heroicon-o-list-bullet')
                                    ->schema([
                                        Forms\Components\TextInput::make('label')->required(),
                                        Forms\Components\TextInput::make('name')->required()->rules(['alpha_dash']),
                                        Forms\Components\Repeater::make('options')
                                            ->schema([
                                                Forms\Components\TextInput::make('label')->required(),
                                                Forms\Components\TextInput::make('value')->required(),
                                            ])->columns(2),
                                        Forms\Components\Toggle::make('required'),
                                    ]),
                                Forms\Components\Builder\Block::make('checkbox')
                                    ->icon('heroicon-o-check-circle')
                                    ->schema([
                                        Forms\Components\TextInput::make('label')->required(),
                                        Forms\Components\TextInput::make('name')->required()->rules(['alpha_dash']),
                                        Forms\Components\Toggle::make('required'),
                                    ]),
                            ])
                            ->collapsible()
                            ->collapsed()
                            ->cloneable()

                    ]),

                Forms\Components\Section::make('Settings')
                    ->schema([
                        Forms\Components\TextInput::make('settings.submit_button_text')
                            ->label('Submit Button Text')
                            ->default('Submit'),
                        Forms\Components\TextInput::make('settings.success_message')
                            ->label('Success Message')
                            ->default('Thank you! Your submission has been received.'),
                        Forms\Components\TextInput::make('settings.notification_emails')
                            ->label('Notification Emails')
                            ->placeholder('email1@example.com, email2@example.com')
                            ->helperText('Comma-separated list of emails to notify upon submission.'),
                        Forms\Components\RichEditor::make('settings.email_template')
                            ->label('Email Notification Template')
                            ->helperText('Use {data} to include all form fields, or {field_name} for specific fields.')
                            ->columnSpanFull(),
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('slug')
                    ->searchable(),
                Tables\Columns\IconColumn::make('is_active')
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
                Tables\Actions\Action::make('export')
                    ->label('Export')
                    ->icon('heroicon-o-arrow-down-tray')
                    ->color('info')
                    ->action(function (FormModel $record) {
                        $data = $record->only(['name', 'slug', 'fields', 'settings', 'is_active']);
                        $json = json_encode($data, JSON_PRETTY_PRINT);
                        return response()->streamDownload(function () use ($json) {
                            echo $json;
                        }, $record->slug . '.json');
                    }),
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
            'index' => Pages\ListForms::route('/'),
            'create' => Pages\CreateForm::route('/create'),
            'edit' => Pages\EditForm::route('/{record}/edit'),
        ];
    }
}
