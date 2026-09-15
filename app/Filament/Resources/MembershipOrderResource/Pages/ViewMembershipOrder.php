<?php

namespace App\Filament\Resources\MembershipOrderResource\Pages;

use App\Filament\Resources\MembershipOrderResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewMembershipOrder extends ViewRecord
{
    protected static string $resource = MembershipOrderResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
