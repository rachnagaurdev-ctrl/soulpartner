<?php

namespace App\Filament\Resources\ProductResource\Pages;

use App\Filament\Resources\ProductResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditProduct extends EditRecord
{
    protected static string $resource = ProductResource::class;

    protected function mutateFormDataBeforeSave(array $data): array
    {
        if (!empty($data['content'])) {
            foreach ($data['content'] as $key => $section) {
                $sectionTypeId = $section['section_type_id'] ?? null;
                if ($sectionTypeId) {
                    $sectionType = \App\Models\SectionType::find($sectionTypeId);
                    if ($sectionType && is_array($sectionType->schema)) {
                        $data['content'][$key]['data'] = ProductResource::filterDataBySchema($section['data'] ?? [], $sectionType->schema);
                    }
                }
            }
        }
        return $data;
    }

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
