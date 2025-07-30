<?php

namespace App\Traits;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;

trait ImageUpload
{
    /**
     * Handle the upload and conversion of an image to WebP format.
     *
     * @param \Illuminate\Http\UploadedFile $file
     * @param string $path
     * @param string|null $existingImagePath
     * @return string
     */
    public function uploadImage(UploadedFile $file, string $path, ?string $existingImagePath = null): string
    {
        // If there's an existing image, delete it first.
        if ($existingImagePath && Storage::disk('public')->exists($existingImagePath)) {
            Storage::disk('public')->delete($existingImagePath);
        }

        // Create an image manager instance with GD driver
        $manager = new ImageManager(new Driver());

        // Read the uploaded image
        $image = $manager->read($file);

        // Encode the image to WebP format
        $encodedImage = $image->toWebp(90); // 90 is the quality, can be adjusted

        // Generate a unique name for the image
        $imageName = uniqid() . '.webp';
        $storagePath = $path . '/' . $imageName;

        // Save the image to the public storage
        Storage::disk('public')->put($storagePath, (string) $encodedImage);

        return $storagePath;
    }
}
