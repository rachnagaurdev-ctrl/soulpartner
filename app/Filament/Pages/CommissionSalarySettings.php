<?php

namespace App\Filament\Pages;

use Filament\Pages\Page;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Form;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Repeater;
use App\Models\CommissionSetting;
use App\Models\SalarySlab;
use Filament\Notifications\Notification;
use Filament\Actions\Action;

class CommissionSalarySettings extends Page implements HasForms
{
    use InteractsWithForms;

    protected static ?string $navigationIcon = 'heroicon-o-cog';
    
    protected static ?string $navigationGroup = 'Commission & Salary';
    
    protected static ?string $navigationLabel = 'Commission Settings';
    
    protected static string $view = 'filament.pages.commission-salary-settings';

    public ?array $data = [];

    public function mount(): void
    {
        $settings = CommissionSetting::first() ?? CommissionSetting::create([]);
        $data = $settings->toArray();
        $this->form->fill($data);
    }

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('Salary Settings')
                    ->schema([
                        Select::make('eligible_gender')
                            ->multiple()
                            ->options([
                                'female' => 'Female',
                                'male' => 'Male',
                            ])
                            ->default(['female']),
                    ])->columns(1),

                Section::make('Salary Settings (Monthly-Based)')
                    ->schema([
                        TextInput::make('salary_per_booking')
                            ->label('Amount Per Booking (₹)')
                            ->numeric()
                            ->default(0)
                            ->required(),
                        TextInput::make('default_target')
                            ->label('Monthly Target (Number of Bookings)')
                            ->numeric()
                            ->default(0)
                            ->required(),
                        TextInput::make('salary_target_bonus')
                            ->label('Bonus Amount on Target Completion (₹) per booking')
                            ->numeric()
                            ->default(0)
                            ->required(),
                    ])->columns(3),

                Section::make('Commission Settings')
                    ->schema([
                        // Toggle::make('commission_enabled') is removed as requested
                        // Select::make('commission_type') is removed as requested
                        // Select::make('commission_base') is removed as requested
                        TextInput::make('commission_value')
                            ->numeric()
                            ->label('Commission Value (Per Booking)')
                            ->default(0)
                            ->columnSpanFull(),
                    ]),

                Section::make('Cancellation & Refund Policy')
                    ->schema([
                        TextInput::make('refund_before_24_hours')
                            ->numeric()
                            ->label('Refund % (If cancelled > 24 hours before booking)')
                            ->default(100)
                            ->minValue(0)
                            ->maxValue(100),
                        TextInput::make('refund_within_24_hours')
                            ->numeric()
                            ->label('Refund % (If cancelled <= 24 hours before booking)')
                            ->default(50)
                            ->minValue(0)
                            ->maxValue(100),
                    ])->columns(2),
            ])
            ->statePath('data');
    }

    public function save(): void
    {
        $settings = CommissionSetting::first();
        $state = $this->form->getState();
        
        $settings->update($state);

        Notification::make()
            ->title('Settings Saved Successfully')
            ->success()
            ->send();
    }
}
