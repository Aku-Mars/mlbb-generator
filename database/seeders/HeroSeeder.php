<?php

namespace Database\Seeders;

use App\Models\Hero;
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
            ['name' => 'Miya', 'lane' => 'gold'],
            ['name' => 'Balmond', 'lane' => 'jungle'],
            ['name' => 'Tigreal', 'lane' => 'roam'],
            ['name' => 'Eudora', 'lane' => 'mid'],
            ['name' => 'Zilong', 'lane' => 'exp'],
        ];

        foreach ($heroes as $hero) {
            Hero::create($hero);
        }
    }
}