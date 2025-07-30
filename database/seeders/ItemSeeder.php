<?php

namespace Database\Seeders;

use App\Models\Item;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $items = [
            // Boots
            ['name' => 'Swift Boots', 'category' => 'boots'],
            ['name' => 'Warrior Boots', 'category' => 'boots'],
            ['name' => 'Tough Boots', 'category' => 'boots'],

            // Physical
            ['name' => 'Blade of Despair', 'category' => 'physical'],
            ['name' => 'Endless Battle', 'category' => 'physical'],
            ['name' => 'Berserker\'s Fury', 'category' => 'physical'],

            // Mage
            ['name' => 'Holy Crystal', 'category' => 'mage'],
            ['name' => 'Blood Wings', 'category' => 'mage'],
            ['name' => 'Genius Wand', 'category' => 'mage'],

            // Tank
            ['name' => 'Antique Cuirass', 'category' => 'tank'],
            ['name' => 'Immortality', 'category' => 'tank'],
            ['name' => 'Athena\'s Shield', 'category' => 'tank'],
        ];

        foreach ($items as $item) {
            Item::create($item);
        }
    }
}