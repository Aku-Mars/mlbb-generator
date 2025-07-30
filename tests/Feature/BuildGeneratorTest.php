<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Services\BuildGeneratorService;
use App\Models\Hero;
use App\Models\Item;
use App\Models\Spell;
use App\Models\User;

class BuildGeneratorTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();
        $this->seed(); // Seed the database with initial data
    }

    public function test_it_generates_a_valid_build()
    {
        $user = User::factory()->create();
        $hero = Hero::first();
        $service = new BuildGeneratorService();

        $build = $service->generate(['hero_id' => $hero->id], $user);

        $this->assertNotNull($build);
        $this->assertEquals($hero->id, $build->hero_id);
        $this->assertNotNull($build->spell_id);
        $this->assertCount(6, $build->items);

        // Check for exactly one boots item
        $bootsCount = $build->items->where('category', 'boots')->count();
        $this->assertEquals(1, $bootsCount);
    }
}
