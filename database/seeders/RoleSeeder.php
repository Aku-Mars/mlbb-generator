<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Role::create(['name' => 'super-admin']);
        Role::create(['name' => 'admin']);
        Role::create(['name' => 'user']);

        Role::create(['name' => 'Tank']);
        Role::create(['name' => 'Fighter']);
        Role::create(['name' => 'Assassin']);
        Role::create(['name' => 'Mage']);
        Role::create(['name' => 'Marksman']);
        Role::create(['name' => 'Support']);
    }
}