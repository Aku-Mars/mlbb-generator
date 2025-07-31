<?php

namespace Database\Seeders;

use App\Models\Hero;
use Spatie\Permission\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class HeroSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $heroes = [
            // Tanks
            ['name' => 'Tigreal', 'lane' => 'roam', 'roles' => ['Tank']],
            ['name' => 'Akai', 'lane' => 'roam', 'roles' => ['Tank']],
            ['name' => 'Franco', 'lane' => 'roam', 'roles' => ['Tank']],
            ['name' => 'Minotaur', 'lane' => 'roam', 'roles' => ['Tank', 'Support']],
            ['name' => 'Lolita', 'lane' => 'roam', 'roles' => ['Tank', 'Support']],
            ['name' => 'Johnson', 'lane' => 'roam', 'roles' => ['Tank']],
            ['name' => 'Gatotkaca', 'lane' => 'exp', 'roles' => ['Tank', 'Fighter']],
            ['name' => 'Hylos', 'lane' => 'roam', 'roles' => ['Tank']],
            ['name' => 'Uranus', 'lane' => 'exp', 'roles' => ['Tank']],
            ['name' => 'Belerick', 'lane' => 'roam', 'roles' => ['Tank']],
            ['name' => 'Khufra', 'lane' => 'roam', 'roles' => ['Tank']],
            ['name' => 'Esmeralda', 'lane' => 'exp', 'roles' => ['Tank', 'Mage']],
            ['name' => 'Atlas', 'lane' => 'roam', 'roles' => ['Tank']],
            ['name' => 'Barats', 'lane' => 'jungle', 'roles' => ['Tank', 'Fighter']],
            ['name' => 'Gloo', 'lane' => 'exp', 'roles' => ['Tank']],
            ['name' => 'Edith', 'lane' => 'roam', 'roles' => ['Tank', 'Marksman']],
            ['name' => 'Fredrinn', 'lane' => 'jungle', 'roles' => ['Tank', 'Fighter']],

            // Fighters
            ['name' => 'Balmond', 'lane' => 'jungle', 'roles' => ['Fighter']],
            ['name' => 'Bane', 'lane' => 'exp', 'roles' => ['Fighter']],
            ['name' => 'Zilong', 'lane' => 'exp', 'roles' => ['Fighter', 'Assassin']],
            ['name' => 'Alucard', 'lane' => 'jungle', 'roles' => ['Fighter', 'Assassin']],
            ['name' => 'Freya', 'lane' => 'exp', 'roles' => ['Fighter']],
            ['name' => 'Chou', 'lane' => 'exp', 'roles' => ['Fighter']],
            ['name' => 'Sun', 'lane' => 'exp', 'roles' => ['Fighter']],
            ['name' => 'Alpha', 'lane' => 'jungle', 'roles' => ['Fighter']],
            ['name' => 'Ruby', 'lane' => 'exp', 'roles' => ['Fighter']],
            ['name' => 'Lapu-Lapu', 'lane' => 'exp', 'roles' => ['Fighter']],
            ['name' => 'Argus', 'lane' => 'exp', 'roles' => ['Fighter']],
            ['name' => 'Jawhead', 'lane' => 'jungle', 'roles' => ['Fighter']],
            ['name' => 'Martis', 'lane' => 'jungle', 'roles' => ['Fighter']],
            ['name' => 'Kaja', 'lane' => 'roam', 'roles' => ['Fighter', 'Support']],
            ['name' => 'Aldous', 'lane' => 'exp', 'roles' => ['Fighter']],
            ['name' => 'Leomord', 'lane' => 'exp', 'roles' => ['Fighter']],
            ['name' => 'Thamuz', 'lane' => 'exp', 'roles' => ['Fighter']],
            ['name' => 'Minsitthar', 'lane' => 'exp', 'roles' => ['Fighter']],
            ['name' => 'Badang', 'lane' => 'exp', 'roles' => ['Fighter']],
            ['name' => 'Guinevere', 'lane' => 'jungle', 'roles' => ['Fighter', 'Mage']],
            ['name' => 'Terizla', 'lane' => 'exp', 'roles' => ['Fighter']],
            ['name' => 'X.Borg', 'lane' => 'exp', 'roles' => ['Fighter']],
            ['name' => 'Dyrroth', 'lane' => 'exp', 'roles' => ['Fighter']],
            ['name' => 'Silvanna', 'lane' => 'exp', 'roles' => ['Fighter', 'Mage']],
            ['name' => 'Paquito', 'lane' => 'exp', 'roles' => ['Fighter']],
            ['name' => 'Phoveus', 'lane' => 'exp', 'roles' => ['Fighter']],
            ['name' => 'Aulus', 'lane' => 'jungle', 'roles' => ['Fighter']],
            ['name' => 'Yin', 'lane' => 'exp', 'roles' => ['Fighter']],
            ['name' => 'Julian', 'lane' => 'jungle', 'roles' => ['Fighter', 'Mage']],
            ['name' => 'Arlott', 'lane' => 'exp', 'roles' => ['Fighter']],
            ['name' => 'Cici', 'lane' => 'exp', 'roles' => ['Fighter']],

            // Assassins
            ['name' => 'Saber', 'lane' => 'jungle', 'roles' => ['Assassin']],
            ['name' => 'Karina', 'lane' => 'jungle', 'roles' => ['Assassin', 'Mage']],
            ['name' => 'Fanny', 'lane' => 'jungle', 'roles' => ['Assassin']],
            ['name' => 'Hayabusa', 'lane' => 'jungle', 'roles' => ['Assassin']],
            ['name' => 'Natalia', 'lane' => 'roam', 'roles' => ['Assassin']],
            ['name' => 'Lancelot', 'lane' => 'jungle', 'roles' => ['Assassin']],
            ['name' => 'Helcurt', 'lane' => 'jungle', 'roles' => ['Assassin']],
            ['name' => 'Gusion', 'lane' => 'jungle', 'roles' => ['Assassin', 'Mage']],
            ['name' => 'Selena', 'lane' => 'roam', 'roles' => ['Assassin', 'Mage']],
            ['name' => 'Hanzo', 'lane' => 'jungle', 'roles' => ['Assassin']],
            ['name' => 'Ling', 'lane' => 'jungle', 'roles' => ['Assassin']],
            ['name' => 'Benedetta', 'lane' => 'jungle', 'roles' => ['Assassin']],
            ['name' => 'Aamon', 'lane' => 'jungle', 'roles' => ['Assassin', 'Mage']],
            ['name' => 'Joy', 'lane' => 'jungle', 'roles' => ['Assassin', 'Mage']],
            ['name' => 'Nolan', 'lane' => 'jungle', 'roles' => ['Assassin']],

            // Mages
            ['name' => 'Nana', 'lane' => 'mid', 'roles' => ['Mage', 'Support']],
            ['name' => 'Eudora', 'lane' => 'mid', 'roles' => ['Mage']],
            ['name' => 'Gord', 'lane' => 'mid', 'roles' => ['Mage']],
            ['name' => 'Alice', 'lane' => 'mid', 'roles' => ['Mage']],
            ['name' => 'Cyclops', 'lane' => 'mid', 'roles' => ['Mage']],
            ['name' => 'Vexana', 'lane' => 'mid', 'roles' => ['Mage']],
            ['name' => 'Harley', 'lane' => 'jungle', 'roles' => ['Mage', 'Assassin']],
            ['name' => 'Odette', 'lane' => 'mid', 'roles' => ['Mage']],
            ['name' => 'Zhask', 'lane' => 'mid', 'roles' => ['Mage']],
            ['name' => 'Pharsa', 'lane' => 'mid', 'roles' => ['Mage']],
            ['name' => 'Valir', 'lane' => 'mid', 'roles' => ['Mage']],
            ['name' => 'Chang\'e', 'lane' => 'mid', 'roles' => ['Mage']],
            ['name' => 'Vale', 'lane' => 'mid', 'roles' => ['Mage']],
            ['name' => 'Lunox', 'lane' => 'mid', 'roles' => ['Mage']],
            ['name' => 'Harith', 'lane' => 'mid', 'roles' => ['Mage']],
            ['name' => 'Lylia', 'lane' => 'mid', 'roles' => ['Mage']],
            ['name' => 'Cecilion', 'lane' => 'mid', 'roles' => ['Mage']],
            ['name' => 'Luo Yi', 'lane' => 'mid', 'roles' => ['Mage']],
            ['name' => 'Yve', 'lane' => 'mid', 'roles' => ['Mage']],
            ['name' => 'Valentina', 'lane' => 'mid', 'roles' => ['Mage']],
            ['name' => 'Xavier', 'lane' => 'mid', 'roles' => ['Mage']],
            ['name' => 'Novaria', 'lane' => 'mid', 'roles' => ['Mage']],
            ['name' => 'Kagura', 'lane' => 'mid', 'roles' => ['Mage']],

            // Marksmen
            ['name' => 'Miya', 'lane' => 'gold', 'roles' => ['Marksman']],
            ['name' => 'Bruno', 'lane' => 'gold', 'roles' => ['Marksman']],
            ['name' => 'Clint', 'lane' => 'gold', 'roles' => ['Marksman']],
            ['name' => 'Layla', 'lane' => 'gold', 'roles' => ['Marksman']],
            ['name' => 'Moskov', 'lane' => 'gold', 'roles' => ['Marksman']],
            ['name' => 'Roger', 'lane' => 'jungle', 'roles' => ['Marksman', 'Fighter']],
            ['name' => 'Karrie', 'lane' => 'gold', 'roles' => ['Marksman']],
            ['name' => 'Irithel', 'lane' => 'gold', 'roles' => ['Marksman']],
            ['name' => 'Lesley', 'lane' => 'gold', 'roles' => ['Marksman']],
            ['name' => 'Hanabi', 'lane' => 'gold', 'roles' => ['Marksman']],
            ['name' => 'Claude', 'lane' => 'gold', 'roles' => ['Marksman']],
            ['name' => 'Granger', 'lane' => 'jungle', 'roles' => ['Marksman']],
            ['name' => 'Wanwan', 'lane' => 'gold', 'roles' => ['Marksman']],
            ['name' => 'Popol and Kupa', 'lane' => 'gold', 'roles' => ['Marksman', 'Support']],
            ['name' => 'Brody', 'lane' => 'gold', 'roles' => ['Marksman']],
            ['name' => 'Beatrix', 'lane' => 'gold', 'roles' => ['Marksman']],
            ['name' => 'Natan', 'lane' => 'gold', 'roles' => ['Marksman', 'Mage']],
            ['name' => 'Melissa', 'lane' => 'gold', 'roles' => ['Marksman']],
            ['name' => 'Ixia', 'lane' => 'gold', 'roles' => ['Marksman']],

            // Supports
            ['name' => 'Rafaela', 'lane' => 'roam', 'roles' => ['Support']],
            ['name' => 'Estes', 'lane' => 'roam', 'roles' => ['Support']],
            ['name' => 'Diggie', 'lane' => 'roam', 'roles' => ['Support']],
            ['name' => 'Angela', 'lane' => 'roam', 'roles' => ['Support']],
            ['name' => 'Faramis', 'lane' => 'roam', 'roles' => ['Support', 'Mage']],
            ['name' => 'Carmilla', 'lane' => 'roam', 'roles' => ['Support']],
            ['name' => 'Mathilda', 'lane' => 'roam', 'roles' => ['Support', 'Assassin']],
            ['name' => 'Floryn', 'lane' => 'roam', 'roles' => ['Support']],
        ];

        foreach ($heroes as $heroData) {
            $hero = Hero::create(['name' => $heroData['name'], 'lane' => $heroData['lane']]);
            $roles = Role::whereIn('name', $heroData['roles'])->get();
            $hero->roles()->attach($roles->pluck('id'));
        }
    }
}