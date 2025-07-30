<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Build extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'hero_id',
        'spell_id',
        'challenge_name',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function hero(): BelongsTo
    {
        return $this->belongsTo(Hero::class);
    }

    public function spell(): BelongsTo
    {
        return $this->belongsTo(Spell::class);
    }

    public function items(): BelongsToMany
    {
        return $this->belongsToMany(Item::class, 'build_item');
    }
}
