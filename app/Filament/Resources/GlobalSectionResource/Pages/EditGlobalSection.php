<?php

namespace App\Filament\Resources\GlobalSectionResource\Pages;

use App\Filament\Resources\GlobalSectionResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditGlobalSection extends EditRecord
{
    protected static string $resource = GlobalSectionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }

    protected function mutateFormDataBeforeSave(array $data): array
    {
        $sectionTypeId = $data['section_type_id'] ?? null;
        if ($sectionTypeId) {
            $sectionType = \App\Models\SectionType::find($sectionTypeId);
            if ($sectionType && is_array($sectionType->schema)) {
                $data['data'] = GlobalSectionResource::filterDataBySchema($data['data'] ?? [], $sectionType->schema);
            }
        }
        return $data;
    }
}
