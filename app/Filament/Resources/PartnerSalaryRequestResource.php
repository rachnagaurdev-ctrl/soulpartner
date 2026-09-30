<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PartnerSalaryRequestResource\Pages;
use App\Filament\Resources\PartnerSalaryRequestResource\RelationManagers;
use App\Models\PartnerSalaryRequest;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class PartnerSalaryRequestResource extends Resource
{
    protected static ?string $model = PartnerSalaryRequest::class;

    protected static ?string $navigationIcon = 'heroicon-o-user-group';

    protected static ?string $navigationGroup = 'Commission & Salary';
    
    protected static ?string $navigationLabel = 'Salary Requests';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('user_id')
                    ->relationship('user', 'name')
                    ->required(),
                Forms\Components\Select::make('request_type')
                    ->options([
                        'monthly_payroll' => 'Monthly Payroll',
                        'per_booking' => 'Per Booking Commission',
                    ])
                    ->required(),
                Forms\Components\Select::make('status')
                    ->options([
                        'pending' => 'Pending',
                        'approved' => 'Approved',
                        'rejected' => 'Rejected',
                    ])
                    ->default('pending')
                    ->required(),
                Forms\Components\Textarea::make('admin_notes')
                    ->columnSpanFull(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('user.name')->label('Partner')->searchable(),
                Tables\Columns\TextColumn::make('request_type')
                    ->formatStateUsing(fn (string $state): string => match ($state) {
                        'monthly_payroll' => 'Monthly Payroll',
                        'per_booking' => 'Per Booking',
                        default => $state,
                    }),
                Tables\Columns\BadgeColumn::make('status')
                    ->colors([
                        'warning' => 'pending',
                        'success' => 'approved',
                        'danger' => 'rejected',
                    ]),
                Tables\Columns\TextColumn::make('created_at')->dateTime(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
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
            'index' => Pages\ListPartnerSalaryRequests::route('/'),
            'create' => Pages\CreatePartnerSalaryRequest::route('/create'),
            'edit' => Pages\EditPartnerSalaryRequest::route('/{record}/edit'),
        ];
    }
}
