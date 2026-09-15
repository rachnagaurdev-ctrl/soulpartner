<?php

namespace App\Filament\Resources\MembershipOrderResource\Pages;

use App\Filament\Resources\MembershipOrderResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListMembershipOrders extends ListRecords
{
    protected static string $resource = MembershipOrderResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()
                ->label('New Order / Member'),
        ];
    }
}
