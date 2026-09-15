<?php

namespace App\Filament\Resources\FormResource\Pages;

use App\Filament\Resources\FormResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListForms extends ListRecords
{
    protected static string $resource = FormResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
            Actions\Action::make('import')
                ->label('Import Form')
                ->color('gray')
                ->icon('heroicon-o-arrow-up-tray')
                ->form([
                    \Filament\Forms\Components\FileUpload::make('file')
                        ->label('JSON File')
                        ->acceptedFileTypes(['application/json'])
                        ->disk('public')
                        ->directory('form-imports')
                        ->required(),
                ])
                ->action(function (array $data) {
                    $filePath = storage_path('app/public/' . $data['file']);
                    
                    if (!file_exists($filePath)) {
                        \Filament\Notifications\Notification::make()
                            ->title('File not found.')
                            ->danger()
                            ->send();
                        return;
                    }

                    $fileContent = file_get_contents($filePath);
                    $json = json_decode($fileContent, true);
                    
                    if ($json) {
                        // Ensure unique slug
                        $originalSlug = $json['slug'];
                        $slug = $originalSlug;
                        $count = 1;
                        while (\App\Models\Form::where('slug', $slug)->exists()) {
                            $slug = $originalSlug . '-' . $count++;
                        }
                        $json['slug'] = $slug;

                        \App\Models\Form::create($json);
                        
                        \Filament\Notifications\Notification::make()
                            ->title('Form imported successfully.')
                            ->success()
                            ->send();
                    } else {
                        \Filament\Notifications\Notification::make()
                            ->title('Invalid JSON file.')
                            ->danger()
                            ->send();
                    }

                    // Clean up
                    unlink($filePath);
                }),
        ];
    }
}
