<?php

namespace App\Filament\Resources\SpellResource\Pages;

use App\Filament\Resources\SpellResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

use App\Traits\ImageUpload;
use Illuminate\Http\UploadedFile;

class EditSpell extends EditRecord
{
    use ImageUpload;

    protected static string $resource = SpellResource::class;

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
            $data['icon_url'] = $this->uploadImage($data['icon_url'], 'spells', $existingImagePath);
        }

        return $data;
    }
}
