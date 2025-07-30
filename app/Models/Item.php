<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use App\Traits\ImageUpload;
use Illuminate\Http\UploadedFile;

class Item extends Model
{
    use HasFactory, ImageUpload;

    protected $fillable = [
        'name',
        'category',
        'icon_url',
    ];

    public function builds(): BelongsToMany
    {
        return $this->belongsToMany(Build::class, 'build_item');
    }

    public function setIconUrlAttribute($value)
    {
        if ($value instanceof UploadedFile) {
            $this->attributes['icon_url'] = $this->uploadImage($value, 'items', $this->attributes['icon_url'] ?? null);
        } else {
            $this->attributes['icon_url'] = $value;
        }
    }
}
