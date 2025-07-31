<?php

namespace Database\Seeders;

use App\Models\Spell;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SpellSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $spells = [
            ['name' => 'Flicker'],
            ['name' => 'Execute'],
            ['name' => 'Retribution'],
            ['name' => 'Inspire'],
            ['name' => 'Purify'],
            ['name' => 'Aegis'],
            ['name' => 'Flameshot'],
            ['name' => 'Sprint'],
            ['name' => 'Vengeance'],
            ['name' => 'Petrify'],
            ['name' => 'Revitalize'],
            ['name' => 'Iron Wall'], // Assuming this is a valid spell, if not, it can be removed.
        ];

        foreach ($spells as $spell) {
            Spell::create($spell);
        }
    }
}