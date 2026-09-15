<?php

namespace App\Filament\Resources\PageResource\Pages;

use App\Filament\Resources\PageResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreatePage extends CreateRecord
{
    protected static string $resource = PageResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        if (isset($data['content']) && is_array($data['content'])) {
            foreach ($data['content'] as &$block) {
                if ($block['type'] === 'section') {
                    $sectionTypeId = $block['data']['section_type_id'] ?? null;
                    if ($sectionTypeId) {
                        $sectionType = \App\Models\SectionType::find($sectionTypeId);
                        if ($sectionType && is_array($sectionType->schema)) {
                            $block['data']['data'] = PageResource::filterDataBySchema($block['data']['data'] ?? [], $sectionType->schema);
                        }
                    }
                }
            }
        }
        return $data;
    }
}
