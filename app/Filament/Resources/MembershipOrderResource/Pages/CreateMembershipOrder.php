<?php

namespace App\Filament\Resources\MembershipOrderResource\Pages;

use App\Filament\Resources\MembershipOrderResource;
use Filament\Resources\Pages\CreateRecord;

class CreateMembershipOrder extends CreateRecord
{
    protected static string $resource = MembershipOrderResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        if (empty($data['order_number'])) {
            $data['order_number'] = \App\Models\MembershipOrder::generateOrderNumber();
        }
        return $data;
    }
}
