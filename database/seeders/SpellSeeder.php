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
        ];

        foreach ($spells as $spell) {
            Spell::create($spell);
        }
    }
}