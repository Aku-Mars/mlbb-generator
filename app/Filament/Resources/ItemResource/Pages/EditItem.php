<?php

namespace App\Filament\Resources\ItemResource\Pages;

use App\Filament\Resources\ItemResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

use App\Traits\ImageUpload;
use Illuminate\Http\UploadedFile;

class EditItem extends EditRecord
{
    use ImageUpload;

    protected static string $resource = ItemResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }

    protected function mutateFormDataBeforeSave(array $data): array
    {
        if (isset($data['icon_url']) && $data['icon_url'] instanceof UploadedFile) {
            $existingImagePath = $this->getRecord()->icon_url;
            $data['icon_url'] = $this->uploadImage($data['icon_url'], 'items', $existingImagePath);
        }

        return $data;
    }
}
