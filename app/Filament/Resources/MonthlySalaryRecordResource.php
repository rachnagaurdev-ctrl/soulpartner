<?php

namespace App\Filament\Resources;

use App\Filament\Resources\MonthlySalaryRecordResource\Pages;
use App\Filament\Resources\MonthlySalaryRecordResource\RelationManagers;
use App\Models\MonthlySalaryRecord;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class MonthlySalaryRecordResource extends Resource
{
    protected static ?string $model = MonthlySalaryRecord::class;

    protected static ?string $navigationIcon = 'heroicon-o-banknotes';
    
    protected static ?string $navigationGroup = 'Commission & Salary';
    
    protected static ?string $navigationLabel = 'Monthly Payroll';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('user_id')
                    ->relationship('user', 'name', function (Builder $query) {
                        $settings = \App\Models\CommissionSetting::first();
                        $eligibleGenders = $settings ? (is_array($settings->eligible_gender) ? $settings->eligible_gender : json_decode($settings->eligible_gender, true)) : ['female'];
                        if (empty($eligibleGenders)) $eligibleGenders = ['female']; // Fallback
                        $query->whereIn('iwantto', ['become', 'both'])
                              ->whereIn('gender', $eligibleGenders);
                    })
                    ->label('Partner (Salary Eligible)')
                    ->searchable()
                    ->required(),
                Forms\Components\TextInput::make('month')
                    ->required()
                    ->numeric(),
                Forms\Components\TextInput::make('year')
                    ->required()
                    ->numeric(),
                Forms\Components\TextInput::make('target')
                    ->required()
                    ->numeric(),
                Forms\Components\TextInput::make('completed_bookings')
                    ->required()
                    ->numeric(),
                Forms\Components\TextInput::make('achievement_percentage')
                    ->numeric(),
                Forms\Components\Select::make('salary_slab_id')
                    ->relationship('salarySlab', 'id'),
                Forms\Components\TextInput::make('base_salary')
                    ->numeric(),
                Forms\Components\TextInput::make('commission_type'),
                Forms\Components\TextInput::make('commission_amount')
                    ->numeric(),
                Forms\Components\TextInput::make('total_salary')
                    ->numeric(),
                Forms\Components\Select::make('status')
                    ->options([
                        'Pending' => 'Pending',
                        'Calculated' => 'Calculated',
                        'Approved' => 'Approved',
                        'Paid' => 'Paid',
                        'Hold' => 'Hold',
                        'Rejected' => 'Rejected',
                    ])
                    ->default('Pending'),
                Forms\Components\DatePicker::make('payment_date'),
                Forms\Components\TextInput::make('payment_reference'),
                Forms\Components\Textarea::make('admin_notes')
                    ->columnSpanFull(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('user.name')->label('Partner')->searchable(),
                Tables\Columns\TextColumn::make('month')->sortable(),
                Tables\Columns\TextColumn::make('year')->sortable(),
                Tables\Columns\TextColumn::make('target'),
                Tables\Columns\TextColumn::make('completed_bookings')->label('Completed'),
                Tables\Columns\TextColumn::make('achievement_percentage')->label('Achieved %'),
                Tables\Columns\TextColumn::make('total_salary')->money('inr')->sortable(),
                Tables\Columns\BadgeColumn::make('status')
                    ->colors([
                        'primary' => 'Calculated',
                        'warning' => 'Pending',
                        'success' => 'Paid',
                        'danger' => 'Rejected',
                    ]),
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
            'index' => Pages\ListMonthlySalaryRecords::route('/'),
            'create' => Pages\CreateMonthlySalaryRecord::route('/create'),
            'edit' => Pages\EditMonthlySalaryRecord::route('/{record}/edit'),
        ];
    }
}
