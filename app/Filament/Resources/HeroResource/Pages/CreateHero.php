<?php

namespace App\Filament\Resources\HeroResource\Pages;

use App\Filament\Resources\HeroResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

use App\Traits\ImageUpload;
use Illuminate\Http\UploadedFile;

class CreateHero extends CreateRecord
{
    use ImageUpload;

    protected static string $resource = HeroResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        if (isset($data['icon_url']) && $data['icon_url'] instanceof UploadedFile) {
            $data['icon_url'] = $this->uploadImage($data['icon_url'], 'heroes');
        }

        return $data;
    }
}
