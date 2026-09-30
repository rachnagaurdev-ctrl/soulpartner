<?php

namespace App\Filament\Resources\PartnerSalaryRequestResource\Pages;

use App\Filament\Resources\PartnerSalaryRequestResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditPartnerSalaryRequest extends EditRecord
{
    protected static string $resource = PartnerSalaryRequestResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
