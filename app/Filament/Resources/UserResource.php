<?php

namespace App\Filament\Resources;

use App\Filament\Resources\UserResource\Pages;
use App\Models\User;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Filters\TernaryFilter;
use Illuminate\Database\Eloquent\Builder;

class UserResource extends Resource
{
    protected static ?string $model = User::class;

    protected static ?string $navigationIcon = 'heroicon-o-users';

    protected static ?string $navigationLabel = 'Members';

    protected static ?string $navigationGroup = 'User Management';

    protected static ?int $navigationSort = 1;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Grid::make(3)
                    ->schema([
                        // Left Column (Takes up 2/3 space or 1/2 space? Let's use 2 and 1)
                        Forms\Components\Grid::make(1)
                            ->columnSpan(['lg' => 2])
                            ->schema([
                                Forms\Components\Section::make('Profile Photos')
                                    ->description('Add clear and recent photos. You can upload up to 8 photos.')
                                    ->schema([
                                        Forms\Components\FileUpload::make('profile_image')
                                            ->label('Primary Profile Image')
                                            ->image()
                                            ->directory('profiles')
                                            ->imageEditor()
                                            ->nullable(),
                                        Forms\Components\FileUpload::make('profile_photos')
                                            ->label('Gallery Photos')
                                            ->image()
                                            ->multiple()
                                            ->directory('profiles')
                                            ->panelLayout('grid')
                                            ->reorderable()
                                            ->appendFiles()
                                            ->nullable(),
                                    ])->columns(2),

                                Forms\Components\Section::make('Basic Information')
                                    ->schema([
                                        Forms\Components\TextInput::make('name')->label('Full Name')->required()->maxLength(255),
                                        Forms\Components\TextInput::make('height')->label('Height')->maxLength(255),
                                        Forms\Components\DatePicker::make('dob')->label('Date of Birth')->maxDate(now()->subYears(18)),
                                        Forms\Components\TextInput::make('religion')->label('Religion')->maxLength(255),
                                        Forms\Components\Select::make('gender')->label('Gender')->options([
                                            'male'   => 'Male',
                                            'female' => 'Female',
                                            'other'  => 'Other',
                                        ]),
                                        Forms\Components\Select::make('languages')->label('Language(s)')->multiple()->options([
                                            'Hindi' => 'Hindi',
                                            'English' => 'English',
                                            'Punjabi' => 'Punjabi',
                                            'Bengali' => 'Bengali',
                                            'Marathi' => 'Marathi',
                                            'Telugu' => 'Telugu',
                                            'Tamil' => 'Tamil',
                                            'Urdu' => 'Urdu',
                                            'Gujarati' => 'Gujarati',
                                            'Kannada' => 'Kannada',
                                            'Malayalam' => 'Malayalam',
                                            'Odia' => 'Odia',
                                        ]),
                                    ])->columns(2),

                                Forms\Components\Section::make('Location & Availability')
                                    ->schema([
                                        Forms\Components\TextInput::make('preferred_location')->label('Preferred Location')->maxLength(255),
                                        Forms\Components\Fieldset::make('Availability Schedule')
                                            ->schema(function () {
                                                $days = ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun'];
                                                $fields = [];
                                                foreach ($days as $day) {
                                                    $fields[] = Forms\Components\Grid::make(3)->schema([
                                                        Forms\Components\Checkbox::make("availability.{$day}.active")->label($day),
                                                        Forms\Components\TimePicker::make("availability.{$day}.from")->label('From')->seconds(false),
                                                        Forms\Components\TimePicker::make("availability.{$day}.to")->label('To')->seconds(false),
                                                    ]);
                                                }
                                                return $fields;
                                            })
                                            ->columnSpanFull(),
                                    ])->columns(2),
                            ]),

                        // Right Column (Takes up 1/3 space)
                        Forms\Components\Grid::make(1)
                            ->columnSpan(['lg' => 1])
                            ->schema([
                                Forms\Components\Section::make('About Me')
                                    ->description('Tell people about yourself.')
                                    ->schema([
                                        Forms\Components\Textarea::make('bio')->label('Bio')->rows(4)->columnSpanFull(),
                                    ]),

                                Forms\Components\Section::make('Interests & Hobbies')
                                    ->schema([
                                        Forms\Components\TagsInput::make('interests')->label('Interests (Type and press enter)'),
                                    ]),

                                Forms\Components\Section::make('Looking For')
                                    ->schema([
                                        Forms\Components\TextInput::make('looking_for')->label('Kind of partner')->maxLength(255),
                                        Forms\Components\Select::make('iwantto')->label('Role')->options([
                                            'hire'   => 'Hire a Partner',
                                            'become' => 'Become a Partner',
                                            'both'   => 'Both',
                                        ]),
                                    ]),

                                Forms\Components\Section::make('Other Details & Contact')
                                    ->schema([
                                        Forms\Components\Select::make('category')
                                            ->label('My Categories')
                                            ->multiple()
                                            ->options(\App\Models\Category::pluck('name', 'slug'))
                                            ->afterStateHydrated(function (Forms\Components\Select $component, $state) {
                                                if (is_string($state)) {
                                                    $component->state(explode(',', $state));
                                                }
                                            })
                                            ->dehydrateStateUsing(fn ($state) => is_array($state) ? implode(',', $state) : $state)
                                            ->columnSpanFull(),
                                        // Forms\Components\TextInput::make('price_per_hour')->label('Price Per Hour (₹)')->numeric()->prefix('₹'),
                                        Forms\Components\TextInput::make('email')->email()->required()->unique(ignoreRecord: true)->maxLength(255),
                                        Forms\Components\TextInput::make('phone')->tel()->maxLength(20),
                                        Forms\Components\TextInput::make('city')->label('City')->maxLength(100),
                                        Forms\Components\TextInput::make('pincode')->label('Pincode')->maxLength(20),
                                        Forms\Components\TextInput::make('country')->label('Country')->maxLength(100),
                                    ])->columns(2),

                                Forms\Components\Section::make('Account Security & Status')
                                    ->schema([
                                        Forms\Components\Toggle::make('is_active')->label('Active')->default(true),
                                        Forms\Components\Toggle::make('is_verified')->label('Verified')->default(false),
                                        // Forms\Components\Toggle::make('is_admin')->label('Admin User')->default(false),
                                        Forms\Components\TextInput::make('password')->password()->dehydrated(fn ($state) => filled($state))->required(fn (string $context): bool => $context === 'create')->label('Password')->columnSpanFull(),
                                    ])->columns(2),
                            ]),
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('profile_image')
                    ->label('Photo')
                    ->circular()
                    ->defaultImageUrl(fn ($record) => 'https://ui-avatars.com/api/?name=' . urlencode($record->name) . '&background=d80b76&color=fff&size=80'),

                Tables\Columns\TextColumn::make('name')
                    ->searchable()
                    ->sortable(),

                Tables\Columns\TextColumn::make('email')
                    ->searchable()
                    ->sortable(),
                    
                Tables\Columns\ToggleColumn::make('is_active')
                    ->label('Active (Unblocked)'),
                    
                Tables\Columns\ToggleColumn::make('is_verified')
                    ->label('Verified'),

                Tables\Columns\BadgeColumn::make('email_verified_at')
                    ->label('Email Verified')
                    ->formatStateUsing(fn ($state) => $state ? '✓ ' . \Carbon\Carbon::parse($state)->format('d M Y') : 'Not Verified')
                    ->colors([
                        'success' => fn ($state) => $state !== null,
                        'warning' => fn ($state) => $state === null,
                    ]),

                Tables\Columns\TextColumn::make('phone')
                    ->searchable(),

                Tables\Columns\TextColumn::make('dob')
                    ->label('Age')
                    ->formatStateUsing(fn ($state) => $state ? \Carbon\Carbon::parse($state)->age . ' yrs' : '-')
                    ->sortable(),

                Tables\Columns\BadgeColumn::make('gender')
                    ->colors([
                        'primary' => 'male',
                        'success' => 'female',
                        'warning' => 'other',
                    ]),

                Tables\Columns\TextColumn::make('city')
                    ->searchable(),

                Tables\Columns\BadgeColumn::make('iwantto')
                    ->label('Role')
                    ->colors([
                        'warning' => 'hire',
                        'success' => 'become',
                        'primary' => 'both',
                    ]),

                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime('d M Y')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                SelectFilter::make('gender')
                    ->options([
                        'male'   => 'Male',
                        'female' => 'Female',
                        'other'  => 'Other',
                    ]),
                SelectFilter::make('iwantto')
                    ->label('Role')
                    ->options([
                        'hire'   => 'Hire a Partner',
                        'become' => 'Become a Partner',
                        'both'   => 'Both',
                    ]),
                TernaryFilter::make('is_active')
                    ->label('Active Users'),
                TernaryFilter::make('is_verified')
                    ->label('Verified Users'),
                TernaryFilter::make('email_verified_at')
                    ->label('Email Verified')
                    ->nullable(),
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ])
            ->defaultSort('created_at', 'desc');
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index'  => Pages\ListUsers::route('/'),
            'create' => Pages\CreateUser::route('/create'),
            'view'   => Pages\ViewUser::route('/{record}'),
            'edit'   => Pages\EditUser::route('/{record}/edit'),
        ];
    }

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery();
    }
}
