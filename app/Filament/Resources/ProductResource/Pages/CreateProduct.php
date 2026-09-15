<?php

namespace App\Filament\Resources\ProductResource\Pages;

use App\Filament\Resources\ProductResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateProduct extends CreateRecord
{
    protected static string $resource = ProductResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
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
}
    