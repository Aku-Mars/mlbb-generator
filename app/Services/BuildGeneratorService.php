<?php

namespace App\Services;

use App\Models\Hero;
use App\Models\Item;
use App\Models\Spell;
use App\Models\Build;
use App\Models\User;

class BuildGeneratorService
{
    public function generate(array $filters = [], User $user = null): ?Build
    {
        // Logika untuk memilih hero berdasarkan filter
        $hero = $this->selectHero($filters);
        if (!$hero) {
            return null; // Atau throw exception jika hero tidak ditemukan
        }

        // Logika untuk memilih spell secara acak
        $spell = $this->selectSpell();
        if (!$spell) {
            return null; // Atau throw exception jika spell tidak ditemukan
        }

        // Logika untuk memilih item (1 boots, 5 non-boots)
        $items = $this->selectItems();
        if (count($items) !== 6) {
            return null; // Pastikan 6 item terpilih
        }

        // Simpan build ke database
        $build = $this->saveBuild($hero, $spell, $items, $user);

        return $build;
    }

    protected function selectHero(array $filters): ?Hero
    {
        $query = Hero::query();

        if (isset($filters['lane'])) {
            $query->where('lane', $filters['lane']);
        }
        if (isset($filters['hero_id'])) {
            $query->where('id', $filters['hero_id']);
        }

        return $query->inRandomOrder()->first();
    }

    protected function selectSpell(): ?Spell
    {
        return Spell::inRandomOrder()->first();
    }

    protected function selectItems(): array
    {
        $boots = Item::where('category', 'boots')->inRandomOrder()->first();
        $nonBoots = Item::where('category', '!=', 'boots')
                        ->inRandomOrder()
                        ->limit(5)
                        ->get();

        $items = [];
        if ($boots) {
            $items[] = $boots;
        }
        $items = array_merge($items, $nonBoots->all());

        return $items;
    }

    protected function saveBuild(Hero $hero, Spell $spell, array $items, ?User $user): Build
    {
        $build = new Build([
            'hero_id' => $hero->id,
            'spell_id' => $spell->id,
            'user_id' => $user ? $user->id : null, // Jika ada user, simpan user_id
            'challenge_name' => null, // Bisa diisi nanti jika ada fitur challenge
        ]);
        $build->save();

        // Attach items to the build
        $build->items()->attach(collect($items)->pluck('id'));

        return $build;
    }
}
