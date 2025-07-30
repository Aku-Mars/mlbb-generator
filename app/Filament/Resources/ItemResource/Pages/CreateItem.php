<?php

namespace App\Filament\Resources\ItemResource\Pages;

use App\Filament\Resources\ItemResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

use App\Traits\ImageUpload;
use Illuminate\Http\UploadedFile;

class CreateItem extends CreateRecord
{
    use ImageUpload;

    protected static string $resource = ItemResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        if (isset($data['icon_url']) && $data['icon_url'] instanceof UploadedFile) {
            $data['icon_url'] = $this->uploadImage($data['icon_url'], 'items');
        }

        return $data;
    }
}
