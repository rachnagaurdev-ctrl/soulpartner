<?php

namespace App\Filament\Resources;

use App\Filament\Resources\MembershipOrderResource\Pages;
use App\Models\MembershipOrder;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Infolists;
use Filament\Infolists\Infolist;

class MembershipOrderResource extends Resource
{
    protected static ?string $model = MembershipOrder::class;

    protected static ?string $navigationIcon = 'heroicon-o-identification';

    protected static ?string $navigationLabel = 'Membership Orders';

    protected static ?string $modelLabel = 'Membership Order';

    protected static ?string $pluralModelLabel = 'Membership Orders';

    protected static ?string $navigationGroup = 'Memberships & Sales';

    protected static ?int $navigationSort = 1;

    public static function getNavigationBadge(): ?string
    {
        return (string) static::getModel()::count();
    }

    public static function getNavigationBadgeColor(): ?string
    {
        return 'primary';
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Customer Personal Details')
                    ->description('Registration information provided by the member')
                    ->schema([
                        Forms\Components\TextInput::make('full_name')
                            ->label('Full Name')
                            ->required()
                            ->maxLength(255),
                        Forms\Components\TextInput::make('email')
                            ->email()
                            ->required()
                            ->maxLength(255),
                        Forms\Components\TextInput::make('phone')
                            ->tel()
                            ->required()
                            ->maxLength(20),
                        Forms\Components\DatePicker::make('date_of_birth')
                            ->label('Date of Birth'),
                        Forms\Components\Select::make('gender')
                            ->options([
                                'male' => 'Male',
                                'female' => 'Female',
                                'other' => 'Other',
                            ]),
                        Forms\Components\Select::make('user_type')
                            ->label('Purpose / Role')
                            ->options([
                                'find' => 'Find a KoPartner',
                                'become' => 'Become a KoPartner',
                                'both' => 'Both (Find & Become)',
                            ])
                            ->default('both')
                            ->required(),
                        Forms\Components\TextInput::make('city')
                            ->maxLength(100),
                        Forms\Components\TextInput::make('pincode')
                            ->maxLength(20),
                        Forms\Components\TextInput::make('country')
                            ->default('India')
                            ->maxLength(100),
                    ])
                    ->columns(3),

                Forms\Components\Section::make('Membership Plan Election')
                    ->description('Selected subscription package and matching allowance')
                    ->schema([
                        Forms\Components\Select::make('membership_plan')
                            ->label('Plan Tier')
                            ->options([
                                'silver' => 'Silver (₹399 / 3 Months)',
                                'gold' => 'Gold (₹699 / 3 Months)',
                                'premium' => 'Premium (₹999 / 3 Months)',
                                'yearly' => 'Premium Yearly (₹2,999 / 1 Year)',
                            ])
                            ->required(),
                        Forms\Components\TextInput::make('plan_name')
                            ->label('Plan Name Display')
                            ->required(),
                        Forms\Components\TextInput::make('billing_period')
                            ->default('3 Months'),
                        Forms\Components\TextInput::make('matches_count')
                            ->label('Allowed Matches'),
                    ])
                    ->columns(2),

                Forms\Components\Section::make('Order Pricing & Amounts')
                    ->schema([
                        Forms\Components\TextInput::make('order_number')
                            ->label('Order Number')
                            ->disabled()
                            ->dehydrated(false),
                        Forms\Components\TextInput::make('subtotal')
                            ->numeric()
                            ->prefix('₹')
                            ->default(0.00),
                        Forms\Components\TextInput::make('discount_amount')
                            ->numeric()
                            ->prefix('₹')
                            ->default(0.00),
                        Forms\Components\TextInput::make('tax_amount')
                            ->numeric()
                            ->prefix('₹')
                            ->default(0.00),
                        Forms\Components\TextInput::make('total_amount')
                            ->numeric()
                            ->prefix('₹')
                            ->required(),
                        Forms\Components\TextInput::make('coupon_code')
                            ->maxLength(50),
                    ])
                    ->columns(3),

                Forms\Components\Section::make('Payment Gateway & Status')
                    ->schema([
                        Forms\Components\TextInput::make('payment_method')
                            ->default('razorpay'),
                        Forms\Components\TextInput::make('payment_id')
                            ->label('Razorpay Payment ID'),
                        Forms\Components\TextInput::make('razorpay_order_id')
                            ->label('Razorpay Order ID'),
                        Forms\Components\Select::make('payment_status')
                            ->options([
                                'pending' => 'Pending',
                                'completed' => 'Completed / Paid',
                                'failed' => 'Failed',
                                'refunded' => 'Refunded',
                            ])
                            ->default('completed')
                            ->required(),
                        Forms\Components\Select::make('status')
                            ->label('Membership Status')
                            ->options([
                                'active' => 'Active',
                                'expired' => 'Expired',
                                'cancelled' => 'Cancelled',
                            ])
                            ->default('active')
                            ->required(),
                        Forms\Components\Toggle::make('auto_renew')
                            ->label('Auto-Renewal Enabled')
                            ->helperText('Member opted in to automatic plan renewal')
                            ->default(false)
                            ->inline(false),
                        Forms\Components\Textarea::make('notes')
                            ->columnSpanFull(),
                    ])
                    ->columns(3),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('order_number')
                    ->label('Order #')
                    ->searchable()
                    ->sortable()
                    ->copyable()
                    ->weight('bold')
                    ->color('primary'),

                Tables\Columns\TextColumn::make('full_name')
                    ->label('Customer')
                    ->searchable()
                    ->sortable()
                    ->description(fn (MembershipOrder $record): string => "{$record->email} • {$record->phone}"),

                Tables\Columns\TextColumn::make('membership_plan')
                    ->label('Plan')
                    ->badge()
                    ->color(fn (string $state): string => match (strtolower($state)) {
                        'silver' => 'gray',
                        'gold' => 'warning',
                        'premium' => 'info',
                        'yearly' => 'success',
                        default => 'primary',
                    })
                    ->formatStateUsing(fn ($state) => ucfirst($state)),

                Tables\Columns\TextColumn::make('total_amount')
                    ->label('Amount Paid')
                    ->money('INR', locale: 'en_IN')
                    ->sortable()
                    ->weight('bold'),

                Tables\Columns\TextColumn::make('payment_status')
                    ->label('Payment')
                    ->badge()
                    ->color(fn (string $state): string => match (strtolower($state)) {
                        'completed' => 'success',
                        'pending' => 'warning',
                        'failed' => 'danger',
                        'refunded' => 'info',
                        default => 'gray',
                    })
                    ->formatStateUsing(fn ($state) => ucfirst($state)),

                Tables\Columns\IconColumn::make('auto_renew')
                    ->label('Auto-Renew')
                    ->boolean()
                    ->trueIcon('heroicon-o-arrow-path')
                    ->falseIcon('heroicon-o-x-mark')
                    ->trueColor('success')
                    ->falseColor('gray')
                    ->toggleable(isToggledHiddenByDefault: false),

                Tables\Columns\TextColumn::make('user_type')
                    ->label('Purpose')
                    ->badge()
                    ->formatStateUsing(fn ($state) => match ($state) {
                        'find' => 'Find Partner',
                        'become' => 'Become Partner',
                        'both' => 'Both (Find & Earn)',
                        default => ucfirst($state ?? 'All'),
                    })
                    ->color('gray'),

                Tables\Columns\TextColumn::make('city')
                    ->searchable()
                    ->toggleable(isToggledHiddenByDefault: false),

                Tables\Columns\TextColumn::make('payment_id')
                    ->label('Transaction ID')
                    ->searchable()
                    ->toggleable(isToggledHiddenByDefault: true),

                Tables\Columns\TextColumn::make('created_at')
                    ->label('Date')
                    ->dateTime('M d, Y h:i A')
                    ->sortable(),
            ])
            ->defaultSort('created_at', 'desc')
            ->filters([
                Tables\Filters\SelectFilter::make('membership_plan')
                    ->options([
                        'silver' => 'Silver',
                        'gold' => 'Gold',
                        'premium' => 'Premium',
                        'yearly' => 'Premium Yearly',
                    ]),
                Tables\Filters\SelectFilter::make('payment_status')
                    ->options([
                        'completed' => 'Completed',
                        'pending' => 'Pending',
                        'failed' => 'Failed',
                        'refunded' => 'Refunded',
                    ]),
                Tables\Filters\SelectFilter::make('user_type')
                    ->options([
                        'find' => 'Find a Partner',
                        'become' => 'Become a Partner',
                        'both' => 'Both',
                    ]),
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
            ]);
    }

    public static function infolist(Infolist $infolist): Infolist
    {
        return $infolist
            ->schema([
                Infolists\Components\Section::make('Order Summary')
                    ->schema([
                        Infolists\Components\TextEntry::make('order_number')
                            ->label('Order Number')
                            ->weight('bold')
                            ->copyable(),
                        Infolists\Components\TextEntry::make('payment_status')
                            ->label('Payment Status')
                            ->badge()
                            ->color(fn (string $state): string => match (strtolower($state)) {
                                'completed' => 'success',
                                'pending' => 'warning',
                                'failed' => 'danger',
                                default => 'gray',
                            }),
                        Infolists\Components\TextEntry::make('total_amount')
                            ->label('Total Amount Paid')
                            ->money('INR', locale: 'en_IN')
                            ->weight('bold'),
                        Infolists\Components\TextEntry::make('created_at')
                            ->label('Order Date & Time')
                            ->dateTime('d M Y, h:i A'),
                    ])
                    ->columns(4),

                Infolists\Components\Section::make('Member Registration Details')
                    ->schema([
                        Infolists\Components\TextEntry::make('full_name')
                            ->label('Full Name')
                            ->weight('bold'),
                        Infolists\Components\TextEntry::make('email')
                            ->label('Email Address')
                            ->copyable(),
                        Infolists\Components\TextEntry::make('phone')
                            ->label('Mobile Number')
                            ->copyable(),
                        Infolists\Components\TextEntry::make('gender')
                            ->label('Gender')
                            ->formatStateUsing(fn ($state) => ucfirst($state ?? 'N/A')),
                        Infolists\Components\TextEntry::make('date_of_birth')
                            ->label('Date of Birth')
                            ->date('d M Y'),
                        Infolists\Components\TextEntry::make('user_type')
                            ->label('Selected Purpose ("I want to")')
                            ->formatStateUsing(fn ($state) => match ($state) {
                                'find' => 'Find a KoPartner',
                                'become' => 'Become a KoPartner',
                                'both' => 'Both (Find & Become)',
                                default => $state,
                            })
                            ->badge(),
                        Infolists\Components\TextEntry::make('city')
                            ->label('City'),
                        Infolists\Components\TextEntry::make('pincode')
                            ->label('Pincode'),
                        Infolists\Components\TextEntry::make('country')
                            ->label('Country'),
                    ])
                    ->columns(3),

                Infolists\Components\Section::make('Membership Election Details')
                    ->schema([
                        Infolists\Components\TextEntry::make('plan_name')
                            ->label('Elected Plan Name')
                            ->weight('bold'),
                        Infolists\Components\TextEntry::make('membership_plan')
                            ->label('Plan Tier')
                            ->badge(),
                        Infolists\Components\TextEntry::make('billing_period')
                            ->label('Billing Validity Period'),
                        Infolists\Components\TextEntry::make('matches_count')
                            ->label('Matches Allotted'),
                    ])
                    ->columns(4),

                Infolists\Components\Section::make('Payment & Financial Details')
                    ->schema([
                        Infolists\Components\TextEntry::make('subtotal')
                            ->label('Subtotal')
                            ->money('INR', locale: 'en_IN'),
                        Infolists\Components\TextEntry::make('discount_amount')
                            ->label('Discount')
                            ->money('INR', locale: 'en_IN'),
                        Infolists\Components\TextEntry::make('tax_amount')
                            ->label('Tax (GST)')
                            ->money('INR', locale: 'en_IN'),
                        Infolists\Components\TextEntry::make('total_amount')
                            ->label('Final Total Paid')
                            ->money('INR', locale: 'en_IN')
                            ->weight('bold'),
                        Infolists\Components\TextEntry::make('payment_method')
                            ->label('Payment Method')
                            ->formatStateUsing(fn ($state) => strtoupper($state ?? 'Razorpay')),
                        Infolists\Components\TextEntry::make('payment_id')
                            ->label('Razorpay Payment ID / Ref')
                            ->copyable(),
                        Infolists\Components\TextEntry::make('coupon_code')
                            ->label('Coupon Applied'),
                        Infolists\Components\IconEntry::make('auto_renew')
                            ->label('Auto-Renewal')
                            ->boolean()
                            ->trueIcon('heroicon-o-arrow-path')
                            ->falseIcon('heroicon-o-x-mark')
                            ->trueColor('success')
                            ->falseColor('gray'),
                        Infolists\Components\TextEntry::make('notes')
                            ->label('Admin Notes')
                            ->columnSpanFull(),
                    ])
                    ->columns(4),
            ]);
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListMembershipOrders::route('/'),
            'create' => Pages\CreateMembershipOrder::route('/create'),
            'view' => Pages\ViewMembershipOrder::route('/{record}'),
            'edit' => Pages\EditMembershipOrder::route('/{record}/edit'),
        ];
    }
}
