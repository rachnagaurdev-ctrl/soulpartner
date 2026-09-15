<?php

namespace App\Filament\Resources\MembershipOrderResource\Pages;

use App\Filament\Resources\MembershipOrderResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditMembershipOrder extends EditRecord
{
    protected static string $resource = MembershipOrderResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
        ];
    }
}
