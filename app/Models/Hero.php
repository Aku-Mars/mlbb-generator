<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use App\Models\Role; // Use the correct Role model

class Hero extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'lane',
        'icon_url',
    ];

    public function roles(): BelongsToMany
    {
        return $this->belongsToMany(Role::class, 'hero_role');
    }
}