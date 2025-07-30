<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Traits\ImageUpload;
use Illuminate\Http\UploadedFile;

class Hero extends Model
{
    use HasFactory, ImageUpload;

    protected $fillable = [
        'name',
        'lane',
        'icon_url',
    ];

    public function builds(): HasMany
    {
        return $this->hasMany(Build::class);
    }

    public function setIconUrlAttribute($value)
    {
        if ($value instanceof UploadedFile) {
            $this->attributes['icon_url'] = $this->uploadImage($value, 'heroes', $this->attributes['icon_url'] ?? null);
        } else {
            $this->attributes['icon_url'] = $value;
        }
    }
}
