<?php

namespace App\Filament\Resources;

use App\Filament\Resources\WithdrawalRequestResource\Pages;
use App\Models\WithdrawalRequest;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class WithdrawalRequestResource extends Resource
{
    protected static ?string $model = WithdrawalRequest::class;

    protected static ?string $navigationIcon = 'heroicon-o-banknotes';
    protected static ?string $navigationGroup = 'Financial';
    protected static ?string $navigationLabel = 'Withdrawals';

    public static function canCreate(): bool
    {
        return false;
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('user_id')
                    ->relationship('user', 'name')
                    ->searchable()
                    ->required(),
                Forms\Components\TextInput::make('amount')
                    ->required()
                    ->numeric()
                    ->prefix('₹'),
                Forms\Components\TextInput::make('account_details')
                    ->label('UPI ID')
                    ->required()
                    ->maxLength(100),
                Forms\Components\Select::make('status')
                    ->options([
                        'pending' => 'Pending',
                        'approved' => 'Approved',
                        'rejected' => 'Rejected',
                    ])
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('user.name')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('amount')
                    ->money('inr')
                    ->sortable(),
                Tables\Columns\TextColumn::make('account_details')
                    ->label('UPI ID')
                    ->searchable(),
                Tables\Columns\TextColumn::make('status')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'pending' => 'warning',
                        'approved' => 'success',
                        'rejected' => 'danger',
                        default => 'gray',
                    }),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('status')
                    ->options([
                        'pending' => 'Pending',
                        'approved' => 'Approved',
                        'rejected' => 'Rejected',
                    ]),
            ])
            ->actions([
                Tables\Actions\Action::make('approve_and_pay')
                    ->label('Approve & Pay')
                    ->icon('heroicon-o-check-circle')
                    ->color('success')
                    ->requiresConfirmation()
                    ->modalHeading('Process Razorpay Payout')
                    ->modalDescription('Are you sure you want to approve this withdrawal and transfer the amount to the user\'s UPI ID via RazorpayX?')
                    ->visible(fn (WithdrawalRequest $record): bool => $record->status === 'pending')
                    ->action(function (WithdrawalRequest $record) {
                        $key = env('RAZORPAY_KEY_ID');
                        $secret = env('RAZORPAY_KEY_SECRET');
                        $accountNumber = env('RAZORPAYX_ACCOUNT_NUMBER');
                        
                        if (!$key || !$secret || !$accountNumber) {
                            \Filament\Notifications\Notification::make()
                                ->title('Configuration Error')
                                ->body('Razorpay credentials or Account Number are missing in .env')
                                ->danger()
                                ->send();
                            return;
                        }

                        try {
                            if (env('RAZORPAYX_MODE') === 'test') {
                                // Bypass API calls in test mode
                                $record->update(['status' => 'approved']);
                                
                                \Filament\Notifications\Notification::make()
                                    ->title('Test Payout Successful')
                                    ->body('Request approved in test mode (API bypassed).')
                                    ->success()
                                    ->send();
                                return;
                            }

                            $user = $record->user;
                            $amountInPaise = $record->amount * 100;

                            // 1. Create Contact
                            $contactResp = \Illuminate\Support\Facades\Http::withoutVerifying()->withBasicAuth($key, $secret)
                                ->post('https://api.razorpay.com/v1/contacts', [
                                    'name' => $user->name,
                                    'email' => $user->email,
                                    'contact' => $user->phone ?? '9999999999',
                                    'type' => 'vendor',
                                    'reference_id' => (string) $user->id,
                                ]);
                                
                            if (!$contactResp->successful()) throw new \Exception('Failed to create Contact: ' . $contactResp->body());
                            $contactId = $contactResp->json('id');

                            // 2. Create Fund Account
                            $fundResp = \Illuminate\Support\Facades\Http::withoutVerifying()->withBasicAuth($key, $secret)
                                ->post('https://api.razorpay.com/v1/fund_accounts', [
                                    'contact_id' => $contactId,
                                    'account_type' => 'vpa',
                                    'vpa' => ['address' => $record->account_details],
                                ]);

                            if (!$fundResp->successful()) throw new \Exception('Failed to create Fund Account: ' . $fundResp->body());
                            $fundAccountId = $fundResp->json('id');

                            // 3. Payout
                            $payoutResp = \Illuminate\Support\Facades\Http::withoutVerifying()->withBasicAuth($key, $secret)
                                ->post('https://api.razorpay.com/v1/payouts', [
                                    'account_number' => $accountNumber,
                                    'fund_account_id' => $fundAccountId,
                                    'amount' => $amountInPaise,
                                    'currency' => 'INR',
                                    'mode' => 'UPI',
                                    'purpose' => 'payout',
                                    'queue_if_low_balance' => true,
                                    'reference_id' => 'WD_' . $record->id . '_' . uniqid(),
                                    'narration' => 'Wallet Withdrawal',
                                ]);

                            if (!$payoutResp->successful()) throw new \Exception('Payout failed: ' . $payoutResp->body());
                            
                            $record->update(['status' => 'approved']);
                            
                            \Filament\Notifications\Notification::make()
                                ->title('Payout Successful')
                                ->body('Money has been transferred via RazorpayX.')
                                ->success()
                                ->send();

                        } catch (\Exception $e) {
                            \Illuminate\Support\Facades\Log::error('Admin Payout Error: ' . $e->getMessage());
                            \Filament\Notifications\Notification::make()
                                ->title('Payout Failed')
                                ->body($e->getMessage())
                                ->danger()
                                ->send();
                        }
                    }),
                Tables\Actions\Action::make('reject')
                    ->label('Reject')
                    ->icon('heroicon-o-x-circle')
                    ->color('danger')
                    ->requiresConfirmation()
                    ->form([
                        Forms\Components\Textarea::make('reason')
                            ->label('Reason for Rejection')
                            ->required(),
                    ])
                    ->visible(fn (WithdrawalRequest $record): bool => $record->status === 'pending')
                    ->action(function (array $data, WithdrawalRequest $record) {
                        $record->update(['status' => 'rejected']);
                        
                        $user = $record->user;
                        $user->wallet_balance += $record->amount;
                        $user->save();

                        \App\Models\WalletTransaction::create([
                            'user_id' => $user->id,
                            'amount' => $record->amount,
                            'type' => 'credit',
                            'description' => "Refund for rejected withdrawal. Reason: " . $data['reason'],
                        ]);

                        \Filament\Notifications\Notification::make()
                            ->title('Request Rejected')
                            ->body('Request rejected and amount refunded to user wallet.')
                            ->success()
                            ->send();
                    }),
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
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
            'index' => Pages\ManageWithdrawalRequests::route('/'),
        ];
    }
}
