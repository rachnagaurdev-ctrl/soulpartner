<?php

namespace App\Filament\Resources\GlobalSectionResource\Pages;

use App\Filament\Resources\GlobalSectionResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListGlobalSections extends ListRecords
{
    protected static string $resource = GlobalSectionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
