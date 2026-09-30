<?php

namespace App\Filament\Resources\MonthlySalaryRecordResource\Pages;

use App\Filament\Resources\MonthlySalaryRecordResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditMonthlySalaryRecord extends EditRecord
{
    protected static string $resource = MonthlySalaryRecordResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
