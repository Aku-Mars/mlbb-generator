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
            ['name' => 'Magic Shoes', 'category' => 'boots'],
            ['name' => 'Arcane Boots', 'category' => 'boots'],
            ['name' => 'Demon Shoes', 'category' => 'boots'],

            // Physical
            ['name' => 'Blade of Despair', 'category' => 'physical'],
            ['name' => 'Endless Battle', 'category' => 'physical'],
            ['name' => 'Berserker\'s Fury', 'category' => 'physical'],
            ['name' => 'Haas\'s Claws', 'category' => 'physical'],
            ['name' => 'Malefic Roar', 'category' => 'physical'],
            ['name' => 'Sea Halberd', 'category' => 'physical'],
            ['name' => 'Bloodlust Axe', 'category' => 'physical'],
            ['name' => 'Hunter Strike', 'category' => 'physical'],
            ['name' => 'War Axe', 'category' => 'physical'],
            ['name' => 'Windtalker', 'category' => 'physical'],
            ['name' => 'Scarlet Phantom', 'category' => 'physical'],
            ['name' => 'Demon Hunter Sword', 'category' => 'physical'],
            ['name' => 'Corrosion Scythe', 'category' => 'physical'],
            ['name' => 'Golden Staff', 'category' => 'physical'],
            ['name' => 'Rose Gold Meteor', 'category' => 'physical'],
            ['name' => 'Blade of the Heptaseas', 'category' => 'physical'],

            // Mage
            ['name' => 'Holy Crystal', 'category' => 'mage'],
            ['name' => 'Blood Wings', 'category' => 'mage'],
            ['name' => 'Genius Wand', 'category' => 'mage'],
            ['name' => 'Lightning Truncheon', 'category' => 'mage'],
            ['name' => 'Divine Glaive', 'category' => 'mage'],
            ['name' => 'Clock of Destiny', 'category' => 'mage'],
            ['name' => 'Ice Queen Wand', 'category' => 'mage'],
            ['name' => 'Concentrated Energy', 'category' => 'mage'],
            ['name' => 'Glowing Wand', 'category' => 'mage'],
            ['name' => 'Enchanted Talisman', 'category' => 'mage'],
            ['name' => 'Fleeting Time', 'category' => 'mage'],
            ['name' => 'Necklace of Durance', 'category' => 'mage'],
            ['name' => 'Winter Truncheon', 'category' => 'mage'],
            ['name' => 'Calamity Reaper', 'category' => 'mage'],
            ['name' => 'Shadow Twinblades', 'category' => 'mage'],

            // Tank
            ['name' => 'Antique Cuirass', 'category' => 'tank'],
            ['name' => 'Immortality', 'category' => 'tank'],
            ['name' => 'Athena\'s Shield', 'category' => 'tank'],
            ['name' => 'Dominance Ice', 'category' => 'tank'],
            ['name' => 'Blade Armor', 'category' => 'tank'],
            ['name' => 'Brute Force Breastplate', 'category' => 'tank'],
            ['name' => 'Cursed Helmet', 'category' => 'tank'],
            ['name' => 'Guardian Helmet', 'category' => 'tank'],
            ['name' => 'Oracle', 'category' => 'tank'],
            ['name' => 'Radiant Armor', 'category' => 'tank'],
            ['name' => 'Thunder Belt', 'category' => 'tank'],
            ['name' => 'Twilight Armor', 'category' => 'tank'],
            ['name' => 'Queen\'s Wings', 'category' => 'tank'],
        ];

        foreach ($items as $item) {
            Item::create($item);
        }
    }
}