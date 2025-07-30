<?php

namespace App\Filament\Resources\SpellResource\Pages;

use App\Filament\Resources\SpellResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

use App\Traits\ImageUpload;
use Illuminate\Http\UploadedFile;

class CreateSpell extends CreateRecord
{
    use ImageUpload;

    protected static string $resource = SpellResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        if (isset($data['icon_url']) && $data['icon_url'] instanceof UploadedFile) {
            $data['icon_url'] = $this->uploadImage($data['icon_url'], 'spells');
        }

        return $data;
    }
}
