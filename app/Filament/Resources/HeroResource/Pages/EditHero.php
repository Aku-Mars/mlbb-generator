<?php

namespace App\Filament\Resources\HeroResource\Pages;

use App\Filament\Resources\HeroResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

use App\Traits\ImageUpload;
use Illuminate\Http\UploadedFile;

class EditHero extends EditRecord
{
    use ImageUpload;

    protected static string $resource = HeroResource::class;

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
            $data['icon_url'] = $this->uploadImage($data['icon_url'], 'heroes', $existingImagePath);
        }

        return $data;
    }
}
