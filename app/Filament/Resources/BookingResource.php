<?php

namespace App\Filament\Resources;

use App\Filament\Resources\BookingResource\Pages;
use App\Filament\Resources\BookingResource\RelationManagers;
use App\Models\Booking;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class BookingResource extends Resource
{
    protected static ?string $model = Booking::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('user_id')
                    ->relationship('user', 'name')
                    ->label('Client')
                    ->required(),
                Forms\Components\Select::make('partner_id')
                    ->relationship('partner', 'name')
                    ->label('Partner')
                    ->required(),
                Forms\Components\Select::make('category_id')
                    ->relationship('category', 'name')
                    ->label('Service')
                    ->required(),
                Forms\Components\DatePicker::make('booking_date')
                    ->required(),
                Forms\Components\TimePicker::make('booking_time')
                    ->label('Start Time/Time')
                    ->required(),
                Forms\Components\TimePicker::make('end_time')
                    ->label('End Time'),
                Forms\Components\TextInput::make('amount')
                    ->numeric()
                    ->prefix('₹')
                    ->required(),
                Forms\Components\Select::make('status')
                    ->options([
                        'pending' => 'Pending',
                        'confirmed' => 'Confirmed',
                        'cancelled' => 'Cancelled',
                        'completed' => 'Completed',
                    ])
                    ->default('pending')
                    ->required(),
                Forms\Components\TextInput::make('payment_id')
                    ->label('Razorpay Payment ID'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('user.name')->label('Client')->sortable()->searchable(),
                Tables\Columns\TextColumn::make('partner.name')->label('Partner')->sortable()->searchable(),
                Tables\Columns\TextColumn::make('category.name')->label('Service')->sortable()->searchable(),
                Tables\Columns\TextColumn::make('booking_date')->date()->sortable(),
                Tables\Columns\TextColumn::make('booking_time')->label('Start/Time')->time()->sortable(),
                Tables\Columns\TextColumn::make('end_time')->label('End Time')->time()->sortable(),
                Tables\Columns\TextColumn::make('amount')->money('INR')->sortable(),
                Tables\Columns\TextColumn::make('commission_amount')
                    ->label('Commission')
                    ->getStateUsing(function ($record) {
                        $settings = \App\Models\CommissionSetting::first();
                        if (!$settings || $settings->commission_value <= 0) return 0;
                        
                        $isCommissionBased = $record->partner && !$record->partner->is_salary_based;
                        if (!$isCommissionBased) return 0;

                        if ($settings->commission_value <= 100) {
                            return ($record->amount * $settings->commission_value) / 100;
                        }
                        return $settings->commission_value;
                    })
                    ->money('INR'),
                Tables\Columns\TextColumn::make('payable_amount')
                    ->label('Payable Amount')
                    ->getStateUsing(function ($record) {
                        $settings = \App\Models\CommissionSetting::first();
                        if (!$settings) return $record->amount;

                        $isCommissionBased = $record->partner && !$record->partner->is_salary_based;
                        
                        if (!$isCommissionBased) {
                            return (float) $settings->salary_per_booking;
                        }

                        $commission = 0;
                        if ($settings->commission_value > 0) {
                            if ($settings->commission_value <= 100) {
                                $commission = ($record->amount * $settings->commission_value) / 100;
                            } else {
                                $commission = $settings->commission_value;
                            }
                        }
                        $payable = $record->amount - $commission;
                        return $payable > 0 ? $payable : 0;
                    })
                    ->money('INR')
                    ->color('success'),
                Tables\Columns\BadgeColumn::make('is_bonus_paid')
                    ->label('Bonus Status')
                    ->getStateUsing(function ($record) {
                        $isCommissionBased = $record->partner && !$record->partner->is_salary_based;
                        if ($isCommissionBased) return 'N/A';
                        
                        return $record->is_bonus_paid ? 'Paid' : 'Pending';
                    })
                    ->colors([
                        'secondary' => 'N/A',
                        'success' => 'Paid',
                        'warning' => 'Pending',
                    ]),
                Tables\Columns\BadgeColumn::make('status')
                    ->colors([
                        'warning' => 'pending',
                        'success' => fn ($state) => in_array($state, ['confirmed', 'completed']),
                        'danger' => 'cancelled',
                    ]),
                Tables\Columns\TextColumn::make('payment_id')->label('Payment ID')->searchable(),
                Tables\Columns\TextColumn::make('created_at')->dateTime()->sortable()->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\Action::make('cancel_details')
                    ->label('Cancel Reason')
                    ->icon('heroicon-o-eye')
                    ->color('danger')
                    ->visible(fn ($record) => strtolower($record->status) === 'cancelled')
                    ->modalHeading('Cancellation Details')
                    ->modalSubmitAction(false)
                    ->modalCancelActionLabel('Close')
                    ->form([
                        Forms\Components\Placeholder::make('cancelled_by')
                            ->label('Cancelled By')
                            ->content(fn ($record) => $record->user ? $record->user->name . ' (Client)' : 'Unknown'),
                        Forms\Components\Textarea::make('cancel_reason')
                            ->label('Reason for Cancellation')
                            ->disabled(),
                        Forms\Components\Placeholder::make('refund_details')
                            ->label('Refund Details')
                            ->content(function ($record) {
                                $transaction = \App\Models\WalletTransaction::where('user_id', $record->user_id)
                                    ->where('description', 'like', '%cancelled booking #' . $record->id . '%')
                                    ->first();
                                if ($transaction) {
                                    return '₹' . number_format($transaction->amount, 2) . ' refunded to client wallet. (' . $transaction->description . ')';
                                }
                                return 'No refund processed.';
                            }),
                    ])
                    ->fillForm(fn ($record) => [
                        'cancel_reason' => $record->cancel_reason ?: 'No reason provided.'
                    ]),
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
            'index' => Pages\ListBookings::route('/'),
            'create' => Pages\CreateBooking::route('/create'),
            'edit' => Pages\EditBooking::route('/{record}/edit'),
        ];
    }
}
